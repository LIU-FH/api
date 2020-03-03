<?php


namespace App\Http\Controllers;

use App\Http\Queries\SheatsheetQuery;
use App\Http\Requests\SheatsheetRequest;
use App\Http\Resources\SheatsheetResource;
use App\Models\Sheatsheets;

class SheatsheetController extends Controller
{
    public function index(SheatsheetQuery $query)
    {
        $list = $query->paginate();
        return SheatsheetResource::collection($list);
    }

    public function store(SheatsheetRequest $request, Sheatsheets $Sheatsheets)
    {
        $Sheatsheets->fill($request->all());
        $Sheatsheets->user_id = 1;
        $Sheatsheets->save();
        return new SheatsheetResource($Sheatsheets);
    }

    public function update($id, SheatsheetRequest $request)
    {
        $Sheatsheets = Sheatsheets::find($id);
        $Sheatsheets->update($request->all());
        return new SheatsheetResource($Sheatsheets);
    }

    public function destroy($id)
    {
        $note = Sheatsheets::find($id);
        $note->delete();
        return response(null, 204);
    }

    public function forceDestroy($id)
    {
        $note = Sheatsheets::onlyTrashed()->find($id);
        $note->forceDelete();
        return response(null, 204);
    }
}
