<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends BaseModel
{
    use SoftDeletes;

    protected $table = 'files';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'size',
        'path',
    ];

    public function getPathAttribute($value)
    {
        return str_replace('assets', 'https://raw.githubusercontent.com/LIU-FH/assets/master', $value);
    }
}
