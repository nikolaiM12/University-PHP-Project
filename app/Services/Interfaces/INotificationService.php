<?php

namespace App\Services\Interfaces;
interface INotificationService
{
    public function GetAllNotifications();
    public function CreateNotification(array $data);
    public function GetNotificationById($id);
    public function UpdateNotification($id, array $data);
    public function DeleteNotification($id);
}

?>