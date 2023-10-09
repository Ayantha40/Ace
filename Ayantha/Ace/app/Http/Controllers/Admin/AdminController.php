<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $customers = User::where('is_admin', 0)->get();
        return view('admin.index',compact('customers'));
    }

    public function search(Request $request){
 
        if($request->ajax()){
 
            $data=User::where('id','like','%'.$request->search.'%')
            ->orwhere('name','like','%'.$request->search.'%')
            ->orwhere('email','like','%'.$request->search.'%')->get();
 
            $output='';
            if(count($data)>0){
                $output ='
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact </th>
                        <th scope="col">Address</th>
                    </tr>
                    </thead>
                    <tbody>';
                        foreach($data as $row){
                            $output .='
                            <tr class="user-row" data-user-id="' . $row->id . '">
                            <th scope="row">'.$row->id.'</th>
                            <td>'.$row->name.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->mobile.'</td>
                            <td>'.$row->address.'</td>
                            </tr>
                            ';
                        }
                $output .= '
                    </tbody>
                    </table>';
            }
            else{
                $output .='No results';
            }
            return $output;
        }
    }
    public function getUserDetails($id)
{
    $user = User::find($id);
    return view('admin.user-details', compact('user'));
}

}
