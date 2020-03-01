<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends BaseModel
{
    use SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'pic',
        'tags',
        'url',
        'description',
        'status',
    ];

    public function getTagsAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }
}
