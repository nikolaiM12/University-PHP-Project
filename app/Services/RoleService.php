<?php
namespace App\Services;

use Spatie\Permission\Models\Role;
use App\Services\Interfaces\IRoleService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RoleService implements IRoleService
{
    public function GetAllRoles()
    {
        return Role::all();
    }

    public function CreateRole(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required|string|unique:roles',
                'permissions' => 'nullable'
            ])->validate();
        
            $role = Role::create($data);

            if(isset($data['permissions']))
            {
                $role->givePermissionTo($data['permissions']);
            }

            session()->flash('success', 'Role created successfully');
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create role: ' . $e->getMessage());
        }
    }
    
    public function GetRoleById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Role ID cannot be null.');
        }

        $role = Role::findOrFail($id);

        if (!$role)
        {
            throw new \RuntimeException('Role not found.');
        }

        return $role;
    }

    public function UpdateRole($id, array $data)
    {
        try
        {
            $role = $this->GetRoleById($id);

            Log::info('Data before validation: ' . json_encode($data));

            $data = Validator::make($data, [
                'name' => 'required|string|unique:roles,name,' . $role->id,
                'permissions' => 'nullable|array'
            ])->validate();

            $role->update($data);
            
            if (!isset($data['permissions'])) 
            {
                $data['permissions'] = [];
            }
            
            if(isset($data['permissions']))
            {
                $role->syncPermissions($data['permissions']);
            }

            session()->flash('success', 'Role updated successfully');
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update role: ' . $e->getMessage());
        }
    }

    public function DeleteRole($id)
    {
        try
        {
            $role = $this->GetRoleById($id);
            $role->delete();
            session()->flash('success', 'Role deleted successfully');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to delete role: ' . $e->getMessage());
        }
    }
}

?>