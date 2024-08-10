<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use Hasfactory;

    protected $table = 'Genre';

    protected $fillable = ['nama'];

    public function listFilm() {
        return $this->hasMany(Film::class, 'genre_id');
    }

}