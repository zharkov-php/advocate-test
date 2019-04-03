<?php

namespace App\Http\Controllers\Admin;

use App\Filedocs;
use App\Http\Requests\Admin\FiledocsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiledocsController extends Controller
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
}
