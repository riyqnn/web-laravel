<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $fillable = ['user_id', 'film_id', 'content' , 'point'];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
