<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BaseModel extends Model
{
    public static function findByCache($id)
    {
        return Cache::rememberForever('archive', function () use ($id) {
            return self::where('id', $id)->first();
        });
    }
}
