<?php


namespace App\Http\Queries;

use App\Models\Articles;
use App\Models\Collectors;
use Spatie\QueryBuilder\QueryBuilder;

class CollectorQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Collectors::query());

        $this->allowedFields('id', 'title', 'tags', 'pic', 'desc', 'github', 'website', 'example', 'created_at', 'updated_at')
            ->allowedFilters(['title', 'tags', "desc"])
            ->allowedSorts(['id', 'created_at', 'updated_at']);
    }
}
