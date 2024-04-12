<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class categorie_post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'categorie_id',
    ];

    

}
