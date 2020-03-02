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

    public function store(ArticleRequest $request, Articles $articles)
    {
        $articles->fill($request->all());
        $articles->user_id = 1;
        $articles->save();
        return new ArticleResource($articles);
    }

    public function update($id, ArticleRequest $request)
    {
        $articles = Articles::find($id);
        $articles->update($request->all());
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
