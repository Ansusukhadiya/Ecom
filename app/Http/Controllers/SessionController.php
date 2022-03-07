<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\District;
use App\Models\Taluk;
use App\Models\Village;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function bloodget()
    {

        if (session()->has('car')) {
            //  dd(session()->get('car'));
            // session()->forget('car');

            return view('blood');
        }
        //  dd(session()->get('car'));
        session()->put('car', 'rishabh');

        return view('blood');
    }
    public function bloodpost(Request $request)
    {

        if (session()->get('car') == 'rishabh') {
            //  dd($request->all());


            $taluk = Taluk ::where('district_id', '=', $request->district)->get();
            $district = District::find($request->district);
            session()->put('district_name', $district->name);
            session()->put('district_id', $district->id);
            session()->put('car', 'ansu');
            return view('blood', compact('taluk'));
        }
        if (session()->get('car') == 'ansu') {
            $village = Village::where('taluk_id', '=', $request->taluk)->get();
            $taluk = Taluk::find($request->taluk);
            session()->put('taluk_name', $taluk->name);
            session()->put('taluk_id', $taluk->id);
            session()->put('car', 'aradhana');
            return view('blood', compact('village'));
        }

        if (session()->get('car') == 'aradhana') {
            // dd(session()->get('car'));
            $user_names = Detail::distinct()->get(['blood']);
            session()->put('car', 'ammu');
            return view('blood',compact('user_names'));
          

        }

        if (session()->get('car') == 'ammu') {
            // dd(session()->get('car'));
            $abcd = Detail::distinct()->get(['gender']);
            session()->put('car', 'anzu');
            return view('blood',compact('abcd'));

        }
        if (session()->get('car') == 'anzu'){
            // dd(session()->get('car'));
            $annsu = Detail::where('blood', '=', $request->blood )->where('gender', '=', $request->gender )->get();
            return view('blood',compact('annsu'));

        }

    }
}
