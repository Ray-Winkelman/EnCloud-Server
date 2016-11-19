<?php

namespace EnCloud\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use EnCloud\User\UserFile;

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
        $contents = File::get($request->file->getPathName());

        $encrypted = Crypt::encrypt($contents);

        $file = new UserFile();
        $file->contents = $encrypted;
        $file->filename = $request->file->getFilename();
        $file->save();
    }

    public function get(UserFile $file)
    {
        $decrypted = Crypt::decrypt($file->contents);

        $temp_file = tempnam(sys_get_temp_dir(), 'Tmp');

        $bytes_written = File::put($temp_file, $decrypted);

        if ($bytes_written !== false)
        {
            return response()->file($temp_file);
        }

        return 0;
    }

    public function put(Request $request)
    {
//        $flights = UserFile::where('active', 1)
//                             ->orderBy('name', 'desc')
//                             ->take(10)
//                             ->get();
        return 0;
    }

    public function delete(Request $request)
    {
        return 0;
    }
}
