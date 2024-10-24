<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendEmail() {
        try {
           $toEmailAddress = "hezekiah.munene@strathmore.edu";
           $welcomeMessage = "Thank you for creating an account in our restaurant";
           $response = Mail::to($toEmailAddress)->send(new RegisterMail($welcomeMessage));
           dd($response);
        }catch(Exception $e) {
            Log::error("Unable to send email ".$e->getMessage());
        }
    }
}
