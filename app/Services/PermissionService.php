<?php
namespace App\Services;

use Spatie\Permission\Models\Permission;
use App\Services\Interfaces\IPermissionService;
use Illuminate\Support\Facades\Validator;

class PermissionService implements IPermissionService
{
    public function GetAllPermission()
    {
        return Permission::all();
    }

    public function CreatePermission(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required',
            ])->validate();
            
            $permission = Permission::create($data);
            
            session()->flash('success', 'Permission created successfully');

            return $permission;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create permission: ' . $e->getMessage());
        }
    }
    
    public function GetPermissionById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Permission ID cannot be null.');
        }

        $permission = Permission::findOrFail($id);

        if (!$permission)
        {
            throw new \RuntimeException('Permission not found.');
        }

        return $permission;
    }

    public function UpdatePermission($id, array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required',
            ])->validate();
            
            $permission = $this->GetPermissionById($id);
            $permission->update($data);
            
            session()->flash('success', 'Permission updated successfully');

            return $permission;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update permission: ' . $e->getMessage());
        }
    }

    public function DeletePermission($id)
    {
        try
        {
            $permission = $this->GetPermissionById($id);
            $permission->delete();
            session()->flash('success', 'Permission deleted successfully');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to delete permission: ' . $e->getMessage());
        }
    }
}

?>