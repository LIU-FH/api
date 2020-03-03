<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Sheatsheets extends BaseModel
{
    use SoftDeletes;

    protected $table = 'cheatsheets';

    protected $fillable = [
        'title',
        'pic',
        'tags',
        'desc',
        'content',
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
