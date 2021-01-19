<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Image::all()->toArray();

        return view('gallery.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create', [
            'action' => route('gallery.store'),
            'method' => 'post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        $item = Image::create($request->all());
        if ($request->hasFile('filename')) {
            $request->file('filename')->store('public/images');

            // ensure every image has a different name
            $file_name = $request->file('filename')->hashName();

            // save new image $file_name to database
            $item->update(['filename' => $file_name]);
        }
        return redirect()->route('gallery.index');

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {

        $image = Image::find($id);
        return view('gallery.edit', [
            'action' => route('gallery.update', $image->id),
            'method' => 'put',
            'model' => $image
        ]);
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
        $image = Image::find($id);

        if ($image->filename != '') {
            $path = public_path().'/storage/images';

            //upload new file
            $file = $request->filename;
            $filenameReal = $file->getClientOriginalName();
            $file->move($path, $filenameReal);

            //for update in table
            $image->update(['filename' => $filenameReal, 'title' =>  $request->get('title'), 'text' =>  $request->get('text')]);

        }
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect()->route('gallery.index');
    }
}
