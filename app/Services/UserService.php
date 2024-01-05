<?php
namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Constants\SqlQueriesConstant;

class UserService implements IUserService
{
    public function GetAllUsers()
    {
        return User::all();
    }

    public function CreateUser(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required', 
                'photo' => 'profile.jpg',
                'role' => 'required'
            ])->validate();
        
            $user = User::create($data);

            if(isset($data['permissions']))
            {
                $user->syncPermission($data['permissions']);
            }

            if (isset($data['role'])) 
            {
                $user->assignRole($data['role']);
            }

            session()->flash('success', 'Profile created successfully');
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create profile: ' . $e->getMessage());
        }
    }
    
    public function GetUserById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('User ID cannot be null.');
        }

        $user = User::findOrFail($id);

        if (!$user)
        {
            throw new \RuntimeException('User not found.');
        }

        return $user;
    }

    public function UpdateProfile($id, array $data)
    {
        try
        {
            $data = Validator::make($data,[
                'name' => 'required',
                'email' => 'required',
            ])->validate();

            $user = $this->GetUserById($id);
            $user->update($data);
            session()->flash('success', 'Profile successfully updated');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }

    public function UpdatePassword($id, $newPassword)
    {
        try
        {
            $user = $this->GetUserById($id);
    
            $user->update([
                'password' => Hash::make($newPassword)
            ]);
    
            session()->flash('success', 'Password has been changed successfully');
        }
        catch(\Exception $e)
        {   
            session()->flash('error', 'Failed to change password: ' . $e->getMessage());
        }
        
    }    

    public function DeleteUser($id)
    {
        try
        {
            $user = $this->GetUserById($id);
            $user->delete();
            session()->flash('success', 'Profile successfully deleted');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to delete profile: ' . $e->getMessage());
        }
    }

    public function SearchUsers($query)
    {
        $searchQuery = SqlQueriesConstant::SEARCH_USERS;

        $result = User::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', '%' . $query . '%')
              ->orWhere('email', 'LIKE', '%' . $query . '%');
            })
            ->get();

        if ($result->isEmpty()) 
        {
            throw new \RuntimeException('No users found matching the search criteria.');
        }

        return $result;
    }


    public function UploadProfilePhoto($user, $imageData)
    {
        try 
        {
            $image_parts = explode(";base64,", $imageData);
            $mime_type_parts = explode(":", $image_parts[0]);
            $mime_type = $mime_type_parts[1];
            $allowed_formats = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

            if (!in_array($mime_type, $allowed_formats)) 
            {
                return ['error' => 'Unsupported image format'];
            }

            $extension = pathinfo($user->photo, PATHINFO_EXTENSION);
            $filename = time() . '.' . $extension;

            Storage::disk('uploads')->put($filename, base64_decode($image_parts[1]));

            $user->update(['photo' => $filename]);

            return ['success' => 'Crop Image Uploaded Successfully'];
        } 
        catch (\Exception $ex) 
        {
            return ['error' => 'Failed to upload image'];
        }
    }
}

?>