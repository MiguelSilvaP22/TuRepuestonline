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
        \Mail::raw($request->mensje ."\r \r \r". "fono: ".$request->fono . "\r".$request->nombre.  "\r".$request->correo_electronico, function($message)
        {
            $message->subject('Contacto');
            $message->from(config('mail.from.address'), config("app.name"));
            $message->to('Richardinacap.cf@gmail.com');
        
        });

        return redirect('/'); 
    }

    public function membresia(){
        return view('membresia');
    }


    public function registro()
    {
        return view('Contacto.registro');
    }
}
