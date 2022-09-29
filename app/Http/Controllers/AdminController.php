<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vcard;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        if(!auth()->user()->is_admin){
            return redirect()->route('home');
        }
        $users = User::all();
        $notifications = [];
        $notificationCount = 0;
        foreach ($users as $user) {
            if($user->notification == 1){
                $notifications[] = $user->name;
                $notificationCount++;
            }
        }
        return view("admin.dashboard",['users' => $users , "notifications" => $notifications , 'count'=>$notificationCount]);
    }

    public function activate($id ,Request $request)
    {
        $user = User::find($id);
        $name = $user->name;
        $User_Update = User::where("id", $id)->update(["is_active" => 1]);
        $request->session()->flash('activate',$name.'\'s Account Activated');
        return redirect()->route('dashboard');
    }

    public function deactivate($id ,Request $request)
    {
        $user = User::find($id);
        $name = $user->name;
        $User_Update = User::where("id", $id)->update(["is_active" => 0]);
        $request->session()->flash('activate',$name.'\'s Account Deactivated');
        return redirect()->route('dashboard');
    }

    public function limit($id, Request $request)
    {
        $user = User::find($id);
        $name = $user->name;
        $limit = $request->limit;
        $User_Update = User::where("id", $id)->update(["limit" => $limit]);
        $request->session()->flash('status',$name.'\'s Limit Upgraded');
        return redirect()->route('dashboard');
    }

    public function clear()
    {
        $users = User::all();
        foreach ($users as $user)
        {
            if($user->notification == 1){
                $id = $user->id;
                $clear= User::where("id", $id)->update(["notification" => 0]);
            }
        }    
        return redirect()->route('dashboard');
    }
    
    public function vcard()
    {
        if(!auth()->user()->is_admin){
            return redirect()->route('home');
        }
        $vcards = Vcard::all();
        $emails=[];
        $notifications = [];
        $notificationCount = 0;
        foreach ($vcards as $vcard) {
            $emails[]=$vcard->user->email;
            if($vcard->user->notification == 1){
                $notifications[] = $vcard->user->name;
                $notificationCount++;
            }
        }
        return view('admin.admin_view',['vcards'=>$vcards,'emails'=>$emails,"notifications" => $notifications , 'count'=>$notificationCount]);
    }

    public function changeTheme($color,$text)
    {
        $id = auth()->id();
        User::where("id", $id)->update(["color" => $color,'text'=>$text]);
        return back();
    }

}

