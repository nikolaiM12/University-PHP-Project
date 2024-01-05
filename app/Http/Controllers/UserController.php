<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Services\Interfaces\IUserService;
use App\Services\Interfaces\IPermissionService;
use App\Services\Interfaces\IRoleService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected IUserService $userService;
    protected IPermissionService $permissionService;
    protected IRoleService $roleService;

    public function __construct(IUserService $userService, IPermissionService $permissionService, IRoleService $roleService) 
    {
        $this->userService = $userService;
        $this->permissionService = $permissionService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $user = $this->userService->GetAllUsers();
        $permission = $this->permissionService->GetAllPermission();
        $role = $this->roleService->GetAllRoles();
        return view('user.index', compact('user', 'permission', 'role'))->with('page', request()->input('page'));
    }

    public function create()
    {
        $role = $this->roleService->GetAllRoles();
        return view('user.create', ['role' => $role]);
    }

    public function store(Request $request)
    {
        $user = $this->userService->CreateUser($request->all());
        return redirect()->route('user.index')->with('success', 'Profile created successfully');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function postProfile(Request $request, $id)
    {
        $user = $this->userService->UpdateProfile($id, $request->all());
        return redirect()->back();
    }

    public function getPassword()
    {
        return view('profile.password');
    }

    public function postPassword(Request $request)
    {
        $userId = auth()->user()->id;
        $newPassword = $request->input('newpassword');
        $user = $this->userService->UpdatePassword($userId, $newPassword);
        return redirect()->back();
    }

    public function changePhoto()
    {
        return view('profile.changePhoto');
    }

    public function imageUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imageUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) 
        {
            $arr = ["status" => 400, "msg" => $validator->errors()->first(), "result" => []];
        } 
        else 
        {
            $uploadResult = $this->userService->UploadProfilePhoto(Auth::user(), $request->base64image);

            if (isset($uploadResult['error'])) 
            {
                return response()->json(['error' => $uploadResult['error']], 400);
            }

            session()->flash('success', 'Crop Image Uploaded Successfully');
            return redirect()->route('user.index');
        }
    }

    public function destroy($id)
    {
        $user = $this->userService->DeleteUser($id);
        return redirect()->route('user.index', compact('user'))->with('success', 'Profile deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $role = $this->roleService->GetAllRoles();
        $permission = $this->permissionService->GetAllPermission();
        $user = $this->userService->SearchUsers($query);
        return view('user.index', compact('user', 'role', 'permission'));
    }
}




