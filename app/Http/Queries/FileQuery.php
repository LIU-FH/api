<?php


namespace App\Http\Queries;

use App\Models\Articles;
use App\Models\Files;
use Spatie\QueryBuilder\QueryBuilder;

class FileQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Files::query());

        $this->allowedFields('id', 'name', 'path', 'type', 'size', 'created_at', 'updated_at')
            ->allowedFilters(['name', 'path'])
            ->allowedSorts(['created_at', 'updated_at']);
    }
}
