<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function storeTag(Request $request)
    {
        Tag::create($request->all());
        return back()->with('success','Tag Added Successfully');
    }
}
