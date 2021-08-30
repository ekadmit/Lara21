<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application\|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    //вывод всех записей
    public function index()
    {

        $newsList = News::with('category')->paginate(config('paginate.admin.news'));
        return view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    //создание новой сущности - поста
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create',[
        'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    //сохранение записи
    public function store(StoreNewsRequest $request)
    {

        $news = News::create( $request->validated());
        if($news) {
            return redirect()->route('admin.news.index') -> with ('success', __('messages.admin.news.create.success'));
        }
        return back()-> withInput()->with('error', __('messages.admin.news.create.fail'));

    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    //отображение конкретной сущности
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    //отображает форму изменения сущности
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\RedirectResponse
     */

    //изменяет сущность
    public function update(UpdateNewsRequest $request, News $news)
    {

        $news = $news->fill(
            $request->validated())->save();

        if($news) {
            return redirect()->route('admin.news.index') -> with ('success', __('messages.admin.news.update.success'));
        }
        return back()-> withInput()->with('error', __('messages.admin.news.update.fail'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */

    //удаляет сущность
    public function destroy(Request $request, News $news)
    {
        if($request->ajax()) {
        try{
            $news -> delete();
            return response()->json('ok');
        } catch(\Exeption $e) {
            \Log::error($e->getMessage());

            return response()->json('error', 400);

        }
    }
    }
}
