<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('files');
    }

    public function post(Request $request)
    {
        $filename = $request->file;
        $contents = File::get($filename);
        $encrypted = Crypt::encrypt($contents);

        $file = new File($encrypted);
        $file->save();
    }

    public function put(Request $request)
    {
        return 0;
    }

    public function delete(Request $request)
    {
        return 0;
    }
}
