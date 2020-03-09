<?php


namespace App\Http\Controllers;

use App\Http\Queries\ArticleQuery;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Articles;

class ArticleController extends Controller
{
    public function index(ArticleQuery $query)
    {
        $list = $query->paginate();
        return ArticleResource::collection($list);
    }
    public function doc()
    {
        $list = Articles::where('type', 2)->get();
        $data = [];
        foreach ($list as $item) {
            if (!isset($data[$item->tags[0]])) {
                $data[$item->tags[0]]['title'] = $item->tags[0];
            }
            $data[$item->tags[0]]['children'][] = $item;
        }
        return response($data, 200);
    }

    public function store(ArticleRequest $request, Articles $articles)
    {
        $all = $request->all();
        $all['content'] = json_encode($all['content']);
        $all['tags'] = is_array($all['tags']) ? implode(',', $all['tags']) : $all['tags'];
        $articles->fill($all);
        $articles->user_id = 1;
        $articles->save();
        return new ArticleResource($articles);
    }

    public function update($id, ArticleRequest $request)
    {
        $all = $request->all();
        $all['content'] = json_encode($all['content']);
        $all['tags'] = is_array($all['tags']) ? implode(',', $all['tags']) : $all['tags'];
        $articles = Articles::find($id);
        $articles->update($all);
        return new ArticleResource($articles);
    }

    public function destroy($id)
    {
        $note = Articles::find($id);
        $note->delete();
        return response(null, 204);
    }

    public function forceDestroy($id)
    {
        $note = Articles::onlyTrashed()->find($id);
        $note->forceDelete();
        return response(null, 204);
    }
}
