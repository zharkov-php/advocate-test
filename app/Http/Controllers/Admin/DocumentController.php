<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Filedocs;
use App\Http\Requests\Admin\DocumentRequest;
use Illuminate\Http\Request;

class DocumentController extends MainAdminController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $documents = Document::select('id', 'name')->orderBy('id','DESC')->paginate(10);
        return view('admin.admin.documents.index', compact('documents'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.admin.documents.create');
    }


    /**
     * @param DocumentRequest $documentRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DocumentRequest $documentRequest)
    {

        $newDocument = Document::create([
            'name' => $documentRequest->name,
        ]);

        if(!$newDocument instanceof Document){
            flash('Oops! Something went wrong. Document was not created.')->error();
            return back();
        }

        return redirect(route('documents.index'))->with('success', 'Document was successfully created!');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $document = Document::find($id);
        $filedocs = Filedocs::select('id', 'name', 'body', 'document_id')->where('document_id', '=', $id)->get();
        return view('admin.admin.documents.show', compact('document', 'filedocs', 'id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $documents = Document::find($id);
        $documents->delete();
        return redirect()->route('documents.index');
    }
}
