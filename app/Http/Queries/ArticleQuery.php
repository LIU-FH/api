<?php


namespace App\Http\Queries;

use App\Models\Articles;
use Spatie\QueryBuilder\QueryBuilder;

class ArticleQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Articles::query());

        $this->allowedFields('id', 'title', 'tags', 'category_id', 'content', 'topic_id', 'image', 'description', 'created_at', 'updated_at')
            ->allowedIncludes('topic', 'category')
            ->allowedFilters(['title','category_id','topic_id', 'tags'])
            ->allowedSorts(['id', 'created_at', 'updated_at']);
    }
}
