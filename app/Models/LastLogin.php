<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastLogin extends Model
{
    use HasFactory;
    protected $table = 'last_logins';
    protected $fillable = [
        'user_id',
        'last_login',
        'user_ip',
    ];

    // associate the user_id with the user table
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
