<?php

namespace App\Services\Interfaces;
interface IUserService
{
    public function GetAllUsers();
    public function CreateUser(array $data);
    public function GetUserById($id);
    public function UpdateProfile($id, array $data);
    public function UpdatePassword($id, $newPassword);
    public function DeleteUser($id);
    public function SearchUsers($query);
    public function UploadProfilePhoto($user, $imageData);
}

?>