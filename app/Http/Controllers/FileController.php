<?php


namespace App\Http\Controllers;

use App\Http\Queries\FileQuery;
use App\Http\Resources\FileResource;
use App\Jobs\File\GitPushQueue;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FileController extends Controller
{
    public function index(FileQuery $query)
    {
        $list = $query->paginate(100);
        return FileResource::collection($list);
    }

    public function store(Request $request)
    {
        foreach ($request->files->keys() as $key) {
            $file = $request->file($key);
            $fileInfo = pathinfo($file->getClientOriginalName());
            $url = $file->storeAs("public/assets/" . date("ym/d", time()), md5($fileInfo['filename']) . '.' . $fileInfo['extension']);
            Files::create([
                "user_id" => 1,
                "path" => str_replace('public/', '', $url),
                "name" => $fileInfo['filename'],
                "size" => $file->getSize(),
                "type" => $fileInfo['extension'],
            ]);
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
        $file = Files::find($id);
        $file->delete();
        return response(null, 204);
    }
}
