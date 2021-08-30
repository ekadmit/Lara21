<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExportRequest;
use App\Http\Requests\UpdateExportRequest;
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
    public function store(StoreExportRequest $request)
    {

        $export = Export::create($request->validated());
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
    public function update(UpdateExportRequest $request, Export $export)
    {

        $export = $export->fill(
            $request->validated())->save();

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
    public function destroy(Request $request, Export $export)
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
