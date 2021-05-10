<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class imageTableController extends Controller
{
    public function index() {
        $planes = image::all();
        return view('xd', ['images' => $planes]);
    }

    public function edit($id) {
        $image = image::find($id);
        return view('edit', ['images' => $image]);
    }

    public function update(Request $request, $id) {
        $image = image::find($id);

        $image->name = $request->input('name');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->input('name') . '.' . $extension;
            $file->move('images', $filename);
            $image->image = $filename;
        }
        $image->save();

        return redirect('/s3b4st14npage')->with('images', $image);
    }

    public function delete($id) {
        $image = image::find($id);
        $filename = json_decode($image);

        $image->delete();
        if(File::exists(public_path('images/'.$filename->image))){
            File::delete(public_path('images/'.$filename->image));
        }else{

        }
        return redirect('/s3b4st14npage')->with('images', $image);
    }
}
