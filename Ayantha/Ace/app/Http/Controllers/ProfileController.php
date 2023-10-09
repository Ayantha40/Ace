<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('cus_id', $user->id)->get();
        $orderCount = Order::where('cus_id', $user->id)->count();
        $unpaidOrders = Order::where('cus_id', $user->id)->where('status', 'Pending')->count();
        $cancelledOrders = Order::where('cus_id', $user->id)->where('status', 'Cancelled')->count();
        $paidOrders = Order::where('cus_id', $user->id)->where('status', 'Paid')->count();
        $selectedbranch = Session::get('selectedBranch');
        $branch = Branch::find($selectedbranch);
        return view('profile.profile', compact('user','orders','orderCount','unpaidOrders','cancelledOrders','paidOrders','branch'));
    }

    public function edit()
    {
        // Add code to show the profile edit form
    }
    
    public function destroy()
    {
        // Add code to delete the user's profile
    }
}
