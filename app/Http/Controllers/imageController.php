<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;

class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        if($request->hasFile('file1'))
        {
            foreach($request->file('file1') as $file){
            
            //get filename with extension 
            $filenamewithextension=$file->getClientOriginalName();

            //get filename without extension
            $filename=pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //Get file extension
            $extension=$file->getClientOriginalExtension();

            //file to store
            $filenametostore=$filename.'_'.uniqueid().'.'.$extension;

            Storage::put('public/images/'.$filenametostore,fopen($file,'r+'));
            Storage::put('public/images/thumbnail/'.$filenametostore,fopen($file,'r+'));

            //Resize image here
            $thumbnailpath=public_path('storage/file1/thumbnail/'.$filenametostore);
            $img=Image::make($thumbnailpath)->resize(400,150,function($constraint)
            {
                $constraint->aspectRatio();
            });

            $img->save($thumbnailpath);
        }
        return redirect('image')->with('status','images uploaded successfully.');
    }
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
