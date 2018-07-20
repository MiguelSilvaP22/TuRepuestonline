<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('Contacto.index');
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Mail::raw($request->mensje ."\r \r \r". "fono: ".$request->fono . "\r".$request->nombre, function($message)
        {
            $message->subject('Contacto');
            $message->from(config('mail.from.address'), config("app.name"));
            $message->to('miguiixx@gmail.com');
        });

        return redirect('/');

    }
}
