<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index');
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);

        //  Get the filename WITH the extension. (filename.ext)
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //  Get the filename WITHOUT the extension. (filename)
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //  Get the extension WITHOUT the filename. (ext)
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //  Create a new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //  Upload the image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        return $path;

    }
}
