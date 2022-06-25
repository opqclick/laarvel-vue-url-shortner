<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = "links";

    protected $fillable = [
        'code',
        'link'
    ];

    public function setCodeAttribute()
    {
        $this->attributes['code'] = $this->random_code(6);
    }

    public static function random_code($length)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
    }
}
