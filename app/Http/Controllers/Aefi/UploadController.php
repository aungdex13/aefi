<?php

namespace App\Http\Controllers\Aefi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller

{
    function index()
    {
     return view('AEFI.Apps.upload');
    }

    function upload(Request $request)
    {
     $this->validate($request, [
      'other_instruction_1'  => 'required|image|mimes:jpg,png,gif|max:2048'
     ]);

     $image = $request->file('other_instruction_1');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();

     $image->move(public_path('images'), $new_name);
     return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }
}
