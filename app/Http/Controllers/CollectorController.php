<?php

namespace App\Http\Controllers;

use App\Http\Queries\CollectorQuery;
use App\Http\Requests\CollectorRequest;
use App\Http\Resources\CollectorResource;
use App\Models\Collectors;

class CollectorController extends Controller
{
    public function index(CollectorQuery $query)
    {
        $list = $query->paginate();
        return CollectorResource::collection($list);
    }

    public function store(CollectorRequest $request, Collectors $Collectors)
    {
        $Collectors->fill($request->all());
        $Collectors->user_id = 1;
        $Collectors->save();
        return new CollectorResource($Collectors);
    }

    public function update($id, CollectorRequest $request)
    {
        $Collectors = Collectors::find($id);
        $Collectors->update($request->all());
        return new CollectorResource($Collectors);
    }

    public function destroy($id)
    {
        $note = Collectors::find($id);
        $note->delete();
        return response(null, 204);
    }

    public function forceDestroy($id)
    {
        $note = Collectors::onlyTrashed()->find($id);
        $note->forceDelete();
        return response(null, 204);
    }
}
