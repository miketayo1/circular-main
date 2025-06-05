<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents= DB::table('users')
        ->join('documents', 'users.id', '=', 'documents.user_id')// joining the contacts table , where user_id and contact_user_id are same
        ->select('documents.*', 'users.name', 'users.email')
        ->distinct()
        ->orderBy('created_at', 'desc')
        ->paginate(20);
        // dd($documents);
       
     
        return view('documents.index')->with('documents', $documents);
    }

    public function home()
    {
        if(isset(Auth::User()->name)){
            return redirect('dashboard');
        }
        
        return view('home');
    }

    // public function postSearch(Request $request){
        
        
    //     $validated  = $request->validate([
    //         'search' => 'required',
    //     ]);

    //     $query = $request->input('search');
    //     if(!$query){
    //         return redirect('/');
    //     }
       
    //     $results = Document::where(DB::raw("CONCAT(filename, ' ', 'body') "),'LIKE', "%{$query}%")
    //     ->orWhere('body', 'LIKE', "%{$query}%")
    //     ->orWhere('filename', 'LIKE', "%{$query}%")
    //     ->paginate(20);

    //     return view('results')->with('results', $results)->with('query', $query);
    // }

    public function result ()
    {
        $query = request()->search;
        if(!$query){
            return redirect('/');
        }
        return view('results');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view ('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated  = $request->validate([
            'document' => 'required',
            'name' => 'required',
            'body' => 'required',
            'section' => 'required',
        ]);
        
        $uploadedFile = $request->file('document');
        $uploadedFile->move('documents', $uploadedFile->getClientOriginalName());
        $file_name = $uploadedFile->getClientOriginalName();

        $document = new Document();
        $document->filename = $request->name;
        $document->path = $file_name;
        $document->keyword=$request->keyword;
        $document->body = $request->body;
        $document->category = $request->section;


        $document->user_id = Auth::User()->id;
        $document->save();
        
       return back()->withStatus('Document successfully uploaded');
    }

    public function download(Request $request, $file) {
       
        $files  = response()->download(public_path('documents/' . $file));
        return $files;
    }

    public function view(Request $request, $id) {

        $data = Document::where('path', $id)->first();
        
        return view('documents.open')->with('data',$data);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Document::where('id', $id)->delete();
        return back()->withStatus('file Deleted.');    
    }

    // public function test(Request $request){
        
      
    //     return view('test');
        
    // }
}
