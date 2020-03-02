<?php


namespace App\Http\Controllers;

use App\Jobs\File\GitPushQueue;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return response([
            'md' => Cache::get("assets-md", []),
            'file' => Cache::get("assets-file", []),
        ], 200);
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

    public function push()
    {
        $activeKey = "git-push-active";
        $active = Cache::get($activeKey);
        if ($active) {
            Cache::put($activeKey, $active + 1, 300);
        } else {
            Cache::put($activeKey, 1, 300);
            GitPushQueue::dispatch();
        }
        return response(null, 200);
    }

    public function pushLast()
    {
        return response(Cache::get('git-push-last'), 200);
    }

    public function destroy($id)
    {
        return response(null, 204);
    }
}
