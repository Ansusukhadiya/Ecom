<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\District;
use App\Models\User;
use App\Models\Excel;
use App\Models\Taluk;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;

class SurveyController extends Controller
{

    public function excel()
    {
        return view('excelform');
    }
    public function excelpost(Request $request)
    {
        $filename = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('excel'), $filename);

        $Excel = (new Fastexcel)->import(public_path("excel/$filename"), function ($line) {

            $district = District::firstOrNew(['name' => $line['District']]);
            $district->save();
            $taluk = Taluk::firstOrNew(['name' => $line['Taluk']]);
            $taluk->district_id = $district->id;
            $taluk->save();
            return Village::create([
                'name' => $line['Village'],
                'district_id' => $district->id,
                'taluk_id' => $taluk->id
            ]);
        });
        return 'success';
    }

    public function survey()
    {
        // dd(session()->get('car'));
        if (session()->has('car')) {
            // session()->forget('car');
            return view('survey');
        }
        session()->put('car', 'rishabh');
        return view('survey');
    }
    public function surveyform(Request $request)
    {

        if (session()->get('car') == 'rishabh') {

            $taluk = Taluk::where('district_id', '=', $request->district)->get();
            $district = District::find($request->district);
            session()->put('district_name', $district->name);
            session()->put('district_id', $district->id);
            session()->put('car', 'ansu');
            // dd($taluk);
            return view('survey', compact('taluk'));
        }
        if (session()->get('car') == 'ansu') {

            $village = Village::where('taluk_id', '=', $request->taluk)->get();
            $taluk = Taluk::find($request->taluk);
            session()->put('taluk_name', $taluk->name);
            session()->put('taluk_id', $taluk->id);
            session()->put('car', 'aradana');
            // // dd($taluk);
            // dd("jhjhj");
            return view('survey', compact('village'));
        }
        if (session()->get('car') == 'aradana') {
            // dd(session()->get('taluk_id'));
            $detail = new Detail();

            $detail->name = $request->name;
            $detail->age = $request->age;
            $detail->dob = $request->dob;
            $detail->gender = $request->gender;
            $detail->blood = $request->blood;
            $detail->marital = $request->marital;
            $detail->religion = $request->religion;
            $detail->caste = $request->caste;
            $detail->mobile = $request->mobile;
            $detail->hname = $request->hname;
            $detail->hnumber = $request->hnumber;
            $detail->district_id = session()->get('district_id');
            $detail->taluk_id = session()->get('taluk_id');
            $detail->village_id = $request->village_id;
            $detail->birth_place = $request->birth_place;
            $detail->pwd = $request->pwd;
            $detail->income = $request->income;
            $detail->education = $request->education;
            $detail->aadhar = $request->aadhar;
            // dd($request->all());

            $detail->save();
            // dd($taluk);
            session()->forget('car');
            return redirect(route('survey'));
        }

        //   dd($request->all());

        // return view('survey', compact('details'));
    }
    public function surveyage()
    {
        return view('age');
    }
    public function surveyagee(Request $request)
    {
        $dt = Detail::where('age', "=>", $request->n1)->where('age', "<=", $request->n2)->get();
        dd($dt);
        return view('age', ['dt' => $dt]);

        // $age=Detail::where(function ($agefind) {
        //     $query->where('gender', 'Male')
        //         ->where('age', '>=', 18);
        // Where(function($query) {
        //     $query->where('gender', 'Female')
        //         ->where('age', '>=', 65);
        // })

    }
    public function bloodget()
    {

            return view('bloodgroup');
    }
    public function bloodpost(Request $request)
    {

    }
}
