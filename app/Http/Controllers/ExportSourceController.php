<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class ExportSourceController extends Controller
{
    public function index()
    {
        return view('export');
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
            'email' =>['required', 'email'],
            'comment'=> ['required', 'string']

        ]);

        $info = json_encode($request->all());

        file_put_contents(public_path('files/file.txt', $info));
        return response('Ваша форма отправлена', 200);

    }

}
