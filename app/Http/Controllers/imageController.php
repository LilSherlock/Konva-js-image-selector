<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImageRequest;
use Illuminate\Http\File;
class imageController extends Controller
{
    public function index() {
        return view('dx');
    }

    public function store(StoreImageRequest $request) {

        if($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->input('name') . '.' . $extension;
            $file->move('images', $filename);
        }
        image::create([
            'name' => $request->input('name'),
            'image' => $filename,
            'categoria' => 'jejej',
        ]);

        return back();
    }
}
