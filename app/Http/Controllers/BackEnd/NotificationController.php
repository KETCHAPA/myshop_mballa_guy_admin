<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::where('isRead', '1')->orderBy('date', 'ASC')->take(3)->get();
        return $notifications;
    }

    public function read($id) {
        $notification = Notification::find($id);
        $notification->isRead = 0;
        $notification->save();
        return $notification;
    }
}
