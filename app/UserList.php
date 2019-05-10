<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'user_list';

    protected $guarded = [];

    // public function project()
    // {
    //     return $this->belongTo(User::class);
    // }

    public $timestamps = false;
}
