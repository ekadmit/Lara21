<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ContactController extends Controller
{
    //отображает форму
     public function index()
     {
         return view('feedback',);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //обрабатывает и отправляет данные
    public function store(Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string'],
            'comment'=> ['required', 'string']

        ]);

      return response('Ваша форма отправлена', 200);

    }

}
