<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Mail;
use Cartalyst\Sentinel\Checkpoints\Swift_TransportException;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        try{
            // $user = Sentinel::registerAndActivate($request->all());
        $user = Sentinel::register($request->all());

        $activation = Activation::create($user);
        $role = Sentinel::findRoleBySlug('manager');

        $role->users()->attach($user);

        $this->sendEmail($user, $activation->code);
        return redirect('/');
        }catch(Swift_TransportException $e){
            return redirect()->back()->with(['error' => 'Ga ada koneksi.']);   
        }
    }
    // Temporary Email
    private function sendEmail($user, $code)
    {
            Mail::send('emails.activation', [
                'user' => $user,
                'code' => $code
            ], function($message)use($user) {
                $message->to($user->email);
    
                $message->subject("Hallo $user->first_name, activate your email");
            });
        }
}