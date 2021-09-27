<?php

namespace App\Http\Controllers;

use App\Http\Requests\Records\CreateRecordsRequest;
use App\Http\Requests\Records\UpdateRecordsRequest;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('records.index')->with('records', Record::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecordsRequest $request)
    {
        //
        // dd($request);
        Record::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
        ]);

        session()->flash('success', 'User created successfully!');
        return redirect(route('records.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
        return view('records.create')->with('record', $record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordsRequest $request, Record $record)
    {
        //
        $record->fname = $request->fname;
        $record->lname = $request->lname;
        $record->email = $request->email;
        $record->save();

        session()->flash('success', 'Changes Saved!');
        return redirect(route('records.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
        $record->delete();
        session()->flash('success', 'User deleted successfully!');
        return redirect(route('records.index'));
    }
}
