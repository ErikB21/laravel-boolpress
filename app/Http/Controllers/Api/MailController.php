<?php

namespace App\Http\Controllers\Api;

use App\Email;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'mail' => 'required|email',
            'message' => 'required' 
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newLead = new Email();
        $newLead->fill($data);
        $newLead->save();
        
        Mail::to('erikborgo.20@gmail.com')->send(new SendMail($newLead));

        return response()->json([
            'success' => true
        ]);
    }
}
