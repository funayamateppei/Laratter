<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // ブラックリストの場合
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    // ホワイトリストの場合
    // protected $fillable = [
    //     'tweet',
    //     'description'
    // ];

    // データをDBからとって、updated_atでOrder By
    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
