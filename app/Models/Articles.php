<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends BaseModel
{
    use SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'pic',
        'tags',
        'content',
        'desc',
        'status',
    ];

    public function getContentAttribute($value)
    {
        return json_decode($value);
    }

    public function getTagsAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }
}
