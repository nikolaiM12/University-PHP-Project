<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\INotificationService;
use App\Services\Interfaces\IUserService;

class NotificationController extends Controller
{
    protected INotificationService $notificationService;
    protected IUserService $userService;

    public function __construct(INotificationService $notificationService, IUserService $userService)
    {
        $this->notificationService = $notificationService;
        $this->userService = $userService;
    }

    public function index()
    {
        $notification = $this->notificationService->GetAllNotifications();
        return view('notification.index', compact("notification"))->with('page', request()->input('page'));
    }

    public function create()
    {
        $notification = $this->notificationService->GetAllNotifications();
        $user = $this->userService->GetAllUsers();
        return view('notification.create', ['user' => $user, 'notification' => $notification]);
    }

    public function store(Request $request)
    {
        $notification = $this->notificationService->CreateNotification($request->all());
        return redirect()->route('notification.index')->with('success', 'Notification created successfully');
    }

    public function show($id)
    {
        $notification = $this->notificationService->GetNotificationById($id);       
        return view('notification.show', compact('notification'));
    }

    public function edit($id)
    {
        $notification = $this->notificationService->GetNotificationById($id);
        $user = $this->userService->GetAllUsers();
        return view('notification.edit', ['notification' => $notification, 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $notification = $this->notificationService->UpdateNotification($id, $request->all());
        return redirect()->route('notification.index')->with('success', 'Notification updated successfully');
    }

    public function delete($id)
    {
        $notification = $this->notificationService->GetNotificationById($id);
        return view('notification.delete', compact('notification'));
    }

    public function destroy($id)
    {
        $notification = $this->notificationService->DeleteNotification($id);
        return redirect()->route('notification.index', compact('notification'))->with('success', 'Notification deleted successfully');
    }
}
