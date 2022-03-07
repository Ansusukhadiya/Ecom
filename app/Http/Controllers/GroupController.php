<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    // public function tableget(){
    //     return view('table');
    // }
    public function groupget()
    {
        // return "hi";
        $sort = Detail::distinct()->get(['blood']);
        // dd($sort);
        return view('listblood', compact('sort'));
    }

    public function grouppost(Request $request)
    {
        $gender = Detail::where('gender', '=', $request->gender)->where('blood', '=', $request->blood)->get();
        return view('table')->with(['gender'=> $gender]);
    }
    public function dash(){
        return view('Admin.dashboard');
    }
}
