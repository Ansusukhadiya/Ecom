<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PDF;

class PdfController extends Controller
{
    // public function pdfget()
    // {
    //     $data = [
    //         'title' => 'Welcome to pdf.com',
    //         'date' => date('m/d/Y')
    //     ];

    //     $pdf = PDF::loadView('newpdf', $data);

    //     return $pdf->download('display.pdf');
    // }
    public function pdfmail()
    {
        $data["email"] = "ansusukhadiya.04@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('newpdf', $data);

        Mail::send('newpdf', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });

        //  $value = [
        //     'name' => "ansusukhadiya.04@gmail.com",
        //     'title' => "from Ansu",
        //     'body'=>"This is a Demo",
        // ];
        // $pdf = PDF::loadView('newpdf', $value);
        // Mail::send('pdf', $value, function ($message) use ($value ,$pdf) {
        //     $message->to($value['email'], 'Torc')->subject('Welcome') ->attachData($pdf->output(), "text.pdf");
        // });

        // dd('Mail sent successfully');
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
        Mail::send('mail', $value, function ($message) use ($value) {
            $message->to($value['email'], 'Torc')->subject('Welcome');
        });
        $user->save();
        return "success";
    }
}
