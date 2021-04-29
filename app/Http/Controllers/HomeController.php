<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
       
        return view('home');
    }
    public function payemnt($id)
    {
        $email = base64_decode($id);
        $user = User::where('email',$email)->first();
        if($user){
            if($user->is_paid ==  1){
                echo "Already paid";
            }else{
                return view('payemnt', compact('id'));
            }
            
        }else{
            echo "User not found";
        }
        
    }
    public function paid(Request $request)
    {
        $data = $request->all();
        $email = base64_decode($data['id']);
        $user = User::where('email',$email)->first();
        
        if($user){
            
            $qr = \QrCode::format('png')->size(300)->generate($user->email);
            $file_name = time().rand(99,999).'Qr_document.png';
            $output_file = '/qr-code/' .$file_name;
            Storage::disk('public')->put($output_file, $qr);
            Mail::send('emails.payment', ['name'=> $user->name, 'email'=> $user->email, 'qr'=>$output_file], function ($message)use ($user)  {
                $message->subject('Payment Success');
                $message->from('dhalisanjay13@gmail.com');
            
                $message->to($user->email);
            });
            $user->is_paid =  1;
            $user->qr_code =  $file_name;
            $user->save();
            return redirect()->route('home');
        }else{
            echo "User not found";
        }
       
    }

}
