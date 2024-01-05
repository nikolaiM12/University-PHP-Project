<?php

namespace App\Services\Interfaces;
interface IPermissionService
{
    public function GetAllPermission();
    public function CreatePermission(array $data);
    public function GetPermissionById($id);
    public function UpdatePermission($id, array $data);
    public function DeletePermission($id);
}

?>