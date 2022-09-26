<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = "user_profiles";
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'gender', 'address', 'profile_photo', 'birth_date'];

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' ,'id');

    }

    /**
     * timestamps
     *
     * @var bool
     */
    public $timestamps = false;
}
