<?php


namespace App\Http\Queries;

use App\Models\Articles;
use Spatie\QueryBuilder\QueryBuilder;

class ArticleQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Articles::query());

        $this->allowedFields('id', 'title', 'tags', 'pic', 'desc', 'created_at', 'updated_at')
            ->allowedFilters(['title', 'tags', "desc"])
            ->allowedSorts(['id', 'created_at', 'updated_at']);
    }
}
