<?php

namespace App\Http\Controllers\Admin;

use App\Filedocs;
use App\Http\Requests\Admin\FiledocsRequest;
use Illuminate\Support\Facades\App;

class FiledocsController extends MainAdminController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        return view('admin.admin.documents.filedocs.create', ['documentId' => $id]);
    }

    /**
     * @param FiledocsRequest $filedocsRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(FiledocsRequest $filedocsRequest)
    {
        $data = [
            'body' => $filedocsRequest->body,
            'name' => $filedocsRequest->name,
            'document_id' => $filedocsRequest->id,
        ];

        $newFile = Filedocs::create($data);

        if (!$newFile instanceof Filedocs) {
            flash('Oops! Something went wrong. Document was not created.')->error();
            return back();
        }

        return redirect(route('documents.index'))->with('success', 'Document was successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = Filedocs::find($id);
        return view('admin.admin.documents.filedocs.edit', compact('id', 'file'));
    }

    /**
     * @param FiledocsRequest $filedocsRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FiledocsRequest $filedocsRequest, $id)
    {
        $file = Filedocs::find($id);
        $data = [
            'name' => $filedocsRequest->name,
            'body' => $filedocsRequest->body,
        ];

        $file->update($data);
        return redirect()->route('documents.index');

    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $documents = Filedocs::find($id);
        $documents->delete();
        return redirect()->back();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function pdf($id)
    {
        $file = Filedocs::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(
            '<center><h1>'. $file->name .'</h1></center>'.
            '<center><h2>'. $file->body .'</h2></center>'
        );
        return $pdf->stream();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function download($id)
    {
        $file = Filedocs::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(
            '<center><h1>'. $file->name .'</h1></center>'.
            '<center><h2>'. $file->body .'</h2></center>'
        );
        return $pdf->download($file->name . '.pdf');

    }
}
