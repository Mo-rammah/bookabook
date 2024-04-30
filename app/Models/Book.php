<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'author', 'publisher', 'language', 'year', 'genres',  'description'];

  public function scopeFilter($query, array $filters)
  {

    if ($filters['genre'] ?? false) {
      $query->where('genres', 'like', '%' . request('genre') . '%');
    }

    if ($filters['search'] ?? false) {
      $query->where('title', 'like', '%' . request('search') . '%')
        ->orwhere('description', 'like', '%' . request('search') . '%')
        ->orwhere('genres', 'like', '%' . request('search') . '%');
    }
  }
}
