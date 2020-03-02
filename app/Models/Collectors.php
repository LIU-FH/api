<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Collectors extends BaseModel
{
    use SoftDeletes;

    protected $table = 'collectors';

    protected $fillable = [
        'title',
        'pic',
        'tags',
        'url',
        'desc',
        'github',
        'website',
        'example',
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
