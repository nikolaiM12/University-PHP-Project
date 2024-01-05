<?php
namespace App\Services;

use App\Models\Notification;
use App\Services\Interfaces\INotificationService;
use Illuminate\Support\Facades\Validator;

class NotificationService implements INotificationService
{
    public function GetAllNotifications()
    {
        return Notification::with('user')->get();
    }

    public function CreateNotification(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'user_id' => 'required',
                'message' => 'required',
                'read_at' => 'required',
            ])->validate();
            
            $notification = Notification::create($data);
            
            session()->flash('success', 'Notification created successfully');

            return $notification;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create notification: ' . $e->getMessage());
        }
    }

    public function GetNotificationById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Notification ID cannot be null.');
        }

        $notification = Notification::findOrFail($id);

        if (!$notification)
        {
            throw new \RuntimeException('Notification not found.');
        }

        return $notification;
    }

    public function UpdateNotification($id, array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'user_id' => 'required',
                'message' => 'required',
                'read_at' => 'required',
            ])->validate();
            
            $notification = $this->GetNotificationById($id);
            $notification->update($data);

            session()->flash('success', 'Notification updated successfully');

            return $notification;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update notification: ' . $e->getMessage());
        }
    }

    public function DeleteNotification($id)
    {
        try
        {
            $notification = $this->GetNotificationById($id);
            $notification->delete();
            session()->flash('success', 'Notification deleted successfully');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to delete notification: ' . $e->getMessage());
        }
    }
}

?>