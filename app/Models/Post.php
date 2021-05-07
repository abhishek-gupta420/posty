<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'body'
    ];
    public function likedBy(User $user){
        return $this->likes->contains('user_id',$user->id);    // laravel collection method
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(like::class);
    }

    // public function ownedBy(User $user){
    //   //  return $user->id===$this->user_id;
    // }
}
