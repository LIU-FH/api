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
        $list = $query->paginate();
        return FileResource::collection($list);
    }

    public function store(Request $request)
    {
        $items = [];
        foreach ($request->files->keys() as $key) {
            $file = $request->file($key);
            $path = 'assets/file/' . date("y/m/d", time());
            $items[] = [
                "path" => $path,
                "name" => $file->getClientOriginalName(),
                "size" => $file->getSize(),
                "type" => $file->getType()
            ];
            $file->store("public/" . $path);
        }
        Files::create($items);
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
