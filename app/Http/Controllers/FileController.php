<?php


namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index($type)
    {
        return response(Cache::get("assets-" . $type, []), 200);
    }

    public function store(Request $request)
    {
        foreach ($request->files->keys() as $key) {
            $file = $request->file($key);
            switch ($key) {
                case "md":
                    $path = 'public/assets/md';
                    $file->storeAs($path, $file->getClientOriginalName());
                    Cache::forever("assets-md", Storage::allFiles($path));
                    break;
                default:
                    $path = 'public/assets/file/' . date("y/m", time());
                    $file->store($path);
                    Cache::forever("assets-file", Storage::allFiles($path));
                    break;
            }
        }
        return response(null, 200);
    }

    public function destroy($id)
    {
        return response(null, 204);
    }
}
