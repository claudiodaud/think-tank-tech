<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }
    

    public function index()
    {
        
        return  [
                    'unreadNotifications' => auth()->user()->unreadNotifications,
                    'readNotifications' => auth()->user()->readNotifications
                ];
    }

    
    public function read($id)
    {
        DatabaseNotification::find($id)->markAsRead();
        return true;
    }

    
    public function unread($id)
    {
        DatabaseNotification::find($id)->markAsUnread();
        return true;
    }

    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();
        return true;
    }


    
}
