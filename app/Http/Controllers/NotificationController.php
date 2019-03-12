<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationController extends Controller
{
    public function index() {
        $user = Auth::user();
        $notifications = $user->notifications;
        return ['success' => true, 'notifications' => $notifications];
    }

    public function getUnreadNotifications() {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
        return ['success' => true, 'notifications' => $notifications];
    }

    public function markAsRead() {
        $user = Auth::user();
        $markAsRead = $user->unreadNotifications->markAsRead();
        return ['success' => true];
    }

}
