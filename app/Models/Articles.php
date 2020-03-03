<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends BaseModel
{
    use SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'type',
        'title',
        'pic',
        'tags',
        'content',
        'desc',
        'status',
    ];

    public function setContentAttribute($value)
    {
        return json_encode($value);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value);
    }

    public function setTagsAttribute($value)
    {
        return is_array($value) ? implode(',', $value) : $value;
    }

    public function getTagsAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }
}
