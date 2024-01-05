<?php

namespace App\Services\Interfaces;
interface IRoleService
{
    public function GetAllRoles();
    public function GetRoleById($id);
    public function UpdateRole($id, array $data);
    public function CreateRole(array $data);
    public function DeleteRole($id);
}

?>