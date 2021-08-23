<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Export;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $exportList = Export::paginate(config('paginate.admin.export'));
        return view('admin.export.index', [
            'exportList' => $exportList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $export = Export::all();
        return view('admin.export.create',[
            'export' => $export
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string'],
        ]);

        $data = $request->only(['id', 'name', 'phone', 'email', 'information', 'status']);
        $export = Export::create($data);
        if($export) {
            return redirect()->route('admin.export.index') -> with ('success', 'Новость успешно добавлена');
        }
        return back()-> withInput()->with('error', 'Не удалось создать новость.');


    }

    /**
     * Display the specified resource.
     *
     * @param  Export $export
     * @return \Illuminate\Http\Response
     */
    public function show(Export $export)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Export $export
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Export $export)
    {
        $export = Export::all();
        return view('admin.export.edit', [
            'export' => $export,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Export $export
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Export $export)
    {
        $request -> validate([
            'name' => ['required', 'string'],
        ]);

        $export = $export->fill(
            $request->only(['id', 'name', 'phone', 'email', 'information', 'status']))->save();

        if($export) {
            return redirect()->route('admin.export.index') -> with ('success', 'Данные выгрузки успешно изменены');
        }
        return back()-> withInput()->with('error', 'Не удалось изменить данные выгрузки.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Export $export
     * @return \Illuminate\Http\Response
     */
    public function destroy(Export $export)
    {
        //
    }
}
