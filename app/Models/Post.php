<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = "posts";

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'desc', 'post_icon', 'deleted_at'];

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' ,'id');

    }
}
