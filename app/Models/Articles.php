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
        'desc',
        'status',
    ];

    public function setTagsAttribute($value)
    {
        return is_array($value) ? implode(',', $value) : $value;
    }

    public function getTagsAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }
}
