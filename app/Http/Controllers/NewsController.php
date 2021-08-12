<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //выводим список новостей
    public function index()
    {
        return view ('news.index', [
            'newsList' => $this->newsList,
        ]);
    }

    //выводим одну новость по id
    public function show(int $id)
    {
        $newsList = [];
        foreach ($this->newsList as $news){
            if($news['id'] === $id){
                $newsList[] = $news;
            }
        }

        if(empty($newsList)){
            abort('404');
        }


        return view('news.show',[
        'id' => $id,
        ]);
    }
}
