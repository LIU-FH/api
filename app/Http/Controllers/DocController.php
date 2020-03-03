<?php


namespace App\Http\Controllers;

use App\Http\Queries\DocQuery;
use App\Http\Requests\DocRequest;
use App\Http\Resources\DocResource;
use App\Models\Docs;

class DocController extends Controller
{
    public function index(DocQuery $query)
    {
        $list = $query->paginate();
        return DocResource::collection($list);
    }

    public function store(DocRequest $request, Docs $Docs)
    {
        $Docs->fill($request->all());
        $Docs->user_id = 1;
        $Docs->save();
        return new DocResource($Docs);
    }

    public function update($id, DocRequest $request)
    {
        $Docs = Docs::find($id);
        $Docs->update($request->all());
        return new DocResource($Docs);
    }

    public function destroy($id)
    {
        $note = Docs::find($id);
        $note->delete();
        return response(null, 204);
    }

    public function forceDestroy($id)
    {
        $note = Docs::onlyTrashed()->find($id);
        $note->forceDelete();
        return response(null, 204);
    }
}
