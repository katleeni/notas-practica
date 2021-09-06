<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Details;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Note::all();
        return view('/indexNotes',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNote(Request $request){
        $request->validate([
            'note_name'=>'required',
            'description'=>'required'
        ]);
        $newNote=new Note;
        $newNote->note_name=$request->note_name;
        $newNote->description=$request->description;
        $newNote->save();
        return back()->with('message','Nota registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $detail=Note::findOrFail($id);
        return view('details',compact('detail'));
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
    public function editNote(Request $request,$id){
        $request->validate([
            'note_name'=>'required',
            'description'=>'required'
        ]);
        $updateNote=Note::findOrFail($id);
        $updateNote->note_name=$request->note_name;
        $updateNote->description=$request->description;
        $updateNote->save();
        return back()->with('message', ('Nota actualizada'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $deleteNote=Note::findOrFail($id);
        $deleteNote->delete();
        return back()->with('message','Nota eliminada');
    }
}
