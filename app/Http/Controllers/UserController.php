<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
       $rent_logs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
       return view('profile',['rent_logs' => $rent_logs]);
    }

    public function index()
    {
       $users = User::where('role_id', 2)->where('status','active')->get(); //kecuali admin
       return view('user',['users'=>$users]);
    }

    public function register()
    {
      $registeredUser = User::where('status', 'inactive')->where('role_id', 2)->get();
      return view('registered-user',['registeredUsers'=>$registeredUser]);
    }

    public function detail($slug)
    {
      $user = User::where('slug', $slug)->first();
      $rent_logs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
      return view('user-detail',['user'=>$user, 'rent_logs' => $rent_logs]);

    }

    public function approve($slug)
    {
      $user = User::where('slug', $slug)->first();
      $user->status ='Active';
      $user->save();

      return redirect('users-detail/'.$slug)->with('status', 'User Approved Sucessfully');

    }

    public function delete($slug)
    {
       $user = User::where('slug',$slug)->first();
       return view('user-delete',['user' => $user]);
    }

    public function destroy($slug)
    {
      $user = User::where('slug',$slug)->first();
      $user->delete();
      return redirect('users')->with('status', 'User Deleted Sucessfully');
    }

    public function deleted()
    {
       $deletedUsers = User::onlyTrashed()->get();
        return view('users-deleted-list',['deletedUsers' => $deletedUsers]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug',$slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User Unbanned Sucessfully');
    }
}
