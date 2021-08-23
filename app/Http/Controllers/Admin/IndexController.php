<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //вызывается, когда объект класса вызывается, как строка
    public function __invoke(Request $request)
    {
          //return response('Hello', 400); //возвращаем текст со статусом
          //return response()->json($this->newsList, 200); //вернули данные в формате json
          //return response()->download('robots.txt'); //отдали файл на скачивание

        $category = Category::all();
        $news = News::all();

        return view('admin.index',
            [
            'countNews' => count($news),
            'countCategories' =>count($category)
        ]
        );
    }
}
