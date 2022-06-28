<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [ 
    //     'title',
    //     'body'
    // ];
        public function isOwn() {
            return Auth::check() && $this->user_id == Auth::id();
        }
        public function user() {
            return $this->belongsTo(User::class);
        }
    protected $guarded = [];
}
