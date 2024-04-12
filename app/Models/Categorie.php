<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTomany;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function post()
    {
      return $this->belongsToMany(Post::class);
    }
  }

    

