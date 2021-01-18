<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Email;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all()->toArray();
        return view('email.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
       return view('email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request, Email $email)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'text' => 'required']);


        $email = Email::create($request->all());
        $email->save();
        return redirect()->route('email.create')->with('success','Your message was sent!');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $email = Email::find($id);
        $email->delete();
        return back();
    }


    public function getData($id) {
        $arr['data'] = Email::orderBy('id', 'asc')->get();
        echo json_encode($arr);
        exit;
    }
}
