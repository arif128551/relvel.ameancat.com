<?php

namespace App\Http\Controllers;

use App\Models\CareerRole;
use Illuminate\Http\Request;

class CareerRoleController extends Controller
{
    public function career_roles(){
        return view('admin.career_roles');
    }
    public function career_roles_store(Request $request){
        $request->validate([
            'role_type'=>'required',
            'role_name'=>'required',
        ]);

        CareerRole::create([
            'role_type' => $request['role_type'],
            'role_name' => $request['role_name'],
        ]);
        return back()->with('success','Career Role Added Successfully');
    }
}
