<?php


namespace App\Http\Queries;

use App\Models\Articles;
use App\Models\Sheatsheets;
use Spatie\QueryBuilder\QueryBuilder;

class SheatsheetQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Sheatsheets::query());

        $this->allowedFields('id', 'title', 'tags', 'pic', 'desc', 'created_at', 'updated_at')
            ->allowedFilters(['title', 'tags', "desc"])
            ->allowedSorts(['id', 'created_at', 'updated_at']);
    }
}
