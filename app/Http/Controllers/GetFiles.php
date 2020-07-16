<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetFiles extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function photo($fileName)
    {
        $image = Storage::get('photos/' . $fileName);
        return response($image)->header('Content-Type', 'image');
    }
}
