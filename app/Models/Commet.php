<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commet extends Model
{
    use HasFactory;

    protected $fillable =[
        'comment',
        'user_id',
        'post_id',


    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
