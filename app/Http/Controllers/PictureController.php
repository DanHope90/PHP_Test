<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;
use Illuminate\Cache\DatabaseStore;

class PictureController extends Controller
{
    /**
     * Display a listing of all submitted dogs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();

        return view('index', ['pictures' => $pictures]);
    }

    /**
     * Show the form for uploading a new dog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Handle the form submission and save the uploaded dog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validates the image input 
       $request->validate([
            'name' =>'required',
            'image' =>'required|mimes:jpg,png,jpeg|max:5048' 
        ]);

        //saves image as variable $file // saves the original files name $originName
        //gets the form input name $petName // saves the pictures model to database
        $file = $request->image;
        $originName = $file->hashName();
        $petName = $request->get('name');
        $picture = new Picture(['name' => $petName, 'file_path' => $originName]);
        $picture->save();

        //requst paths to public
        $request->image->move(storage_path('app/public/'),  $originName);

       return redirect('/');

    }

    /**
     * Upvote a dog by ID
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upvote(Request $request, Picture $picture)
    {
        //here I want to increment the votes then save to db
        // when user clciksupvote button the the image vote increments by +1
        // it saves to db then redirects back hompage
        $picture->votes++;
        $picture->save();
        return redirect('/');
    }
}
