<?php

namespace EnCloud\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use EnCloud\User\UserFile;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = UserFile::orderBy('updated_at', 'desc')->paginate(15);

        return view('files')->with('files', $files);
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'max:10240',
        ]);

        if ($validator->fails()) {
            return redirect('home')->with('error', 'Uploads can\'t exceed 10mb. :(');
        }

        $contents = File::get($_FILES['file']['tmp_name']);

        $encrypted = Crypt::encrypt($contents);

        $file = new UserFile();
        $file->contents = $encrypted;
        $file->filename = $_FILES['file']['name'];
        $file->type = $_FILES['file']['type'];
        $file->size = $_FILES['file']['size'];
        $file->save();

        return redirect('home')->with('status', 'Success. :)');
    }

    public function get(UserFile $file)
    {
        $decrypted = Crypt::decrypt($file->contents);

        $path = sys_get_temp_dir() . '/' . $file->filename;

        if(file_exists($path))
        {
            unlink($path);
        }

        $bytes_written = File::put($path, $decrypted);

        if ($bytes_written !== false)
        {
            return response()->download($path);
        }

        return 0;
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
