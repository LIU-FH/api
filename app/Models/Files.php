<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends BaseModel
{
    use SoftDeletes;

    protected $table = 'files';

    protected $fillable = [
        'name',
        'type',
        'size',
        'path',
    ];
}
