<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Whoops\Run;
use Illuminate\Support\Str;
use PDF;

class LoginController extends Controller
{
    public function home()
    {
        return view('User.home');
    }

    public function register()
    {
        if (Auth::user()) {
            // return "hi";
            return redirect(route('dashboard'));
        } else {
            return view('User.register');
        }
    }
    public function registerform(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        // dd($user);
        $value = [
            'name' => $request->name,
            'email' => $request->email,
            'body'=> "This is a Demo",
        ];
        $pdf = PDF::loadView('newpdf', $value);
        // Mail::send('mail', $value, function ($message) use ($value) {
        //     $message->to($value['email'], 'Torc')->subject('Welcome')->attachData($pdf->output(), "text.pdf"
        // });
        Mail::send('mail', $value, function($message)use($value, $pdf) {
            $message->to($value["email"], $value["email"])
                    ->subject($value["body"])
                    ->attachData($pdf->output(), "text.pdf");
        });


        $user->save();
        return "success";
    }


    public function login()
    {
        if (Auth::user()) {
            // return "ok good";
            return redirect(route('dash'));
        } else {
            return view('User.login');
        }
    }
    public function loginform(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return "ok bei";
            return redirect(route('dash'));
        }
        abort(404);
    }
    public function dashboard()
    {
        if (Auth::user()->role == "admin") {
            return view('Admin.dashboard');
        }
        if (Auth::user()->role == "datanalyst") {
            return view('Admin.dashboard');
        }
        abort(404);
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
    public function dash()
    {
        return view('Admin.dashboard');
    }
    public function forgetpw()
    {
        return view('forgetpassword');
    }
    public function forgetpwpost(Request $request)
    {
        $abc = User::where('email', $request->email)->first();
        $uuid = Str::uuid()->toString();
        if ($abc) {
            $value = [
                'email' => $request->email,
                'uuid' => $uuid,
            ];
            Mail::send('passwordmail', $value, function ($message) use ($value) {
                $message->to($value['email'], 'reset')->subject('Password Reset');
            });

            $abc->uuid = $uuid;
            $abc->save();
            return "yes";
        } else {
            return "wrong entry";
        }
    }

    public function pwreset($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        if ($user) {
            return view('newpassword');
        }
        abort(404);
    }

    public function pwresetpost(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        $user->password = Hash::make($request->password);
        $user->uuid = null;
        $user->update();
        return redirect(route('login'));
    }
}
 