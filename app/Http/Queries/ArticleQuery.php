<?php


namespace App\Http\Queries;

use App\Models\Articles;
use Spatie\QueryBuilder\QueryBuilder;

class ArticleQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Articles::query());

        $this->allowedFields('id', 'type', 'title', 'tags', 'pic', 'desc', 'content', 'created_at', 'updated_at')
            ->allowedFilters(['title', 'tags', "desc",'type','status'])
            ->allowedSorts(['created_at', 'updated_at']);
    }
}
