<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
  public function store()
  {
    $message = request()->validate([
      'name'  => 'required',
      'email' => 'required|email',
      'subject' => 'required|min:3',
      'content' => 'required|min:3',
    ]
/*     , [
      'name.required' => __('I need your name')
    ] */
    );

    Mail::to('agatha@tmp.com')->queue(new MessageReceived($message));

    //return new MessageReceived($message);

    return back()->with('status', 'Recibimos su mensaje, le responderemos en 24 horas.');
  }
}