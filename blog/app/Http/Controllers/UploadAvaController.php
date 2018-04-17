<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UploadAvaController extends Controller
{
    public $fileName;

    public $path;

    public function upload (Request $request)
    {
        $file = $request->file('ava');

        $this->fileName = $file->getClientOriginalName();

        $this->path = $file->getRealPath();

        Storage::putFile('avas', new File('/storage/app/public'), $filename);
    }
}
