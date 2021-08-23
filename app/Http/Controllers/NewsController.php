<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //выводим список новостей
    public function index()
    {
        $news = News::all();
        return view ('news.index', [
            'newsList' => $news,
        ]);
    }

    //выводим одну новость по id
    public function show(News $news)
    {
        return view('news.show',[
        'news' => $news,
        ]);
    }
}
