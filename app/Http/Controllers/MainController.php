<?php

namespace App\Http\Controllers;

use App\Document;
use App\Filedocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $documents = Document::select('id', 'name')->orderBy('id','DESC')->paginate(10);
        return view('main.welcome', compact('documents'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        $filedocs = Filedocs::select('id', 'name', 'body', 'document_id')->where('document_id', '=', $id)->get();
        return view('main.show', compact('document', 'filedocs', 'id'));

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
