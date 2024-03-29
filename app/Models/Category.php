<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //to get the posts under a single category
    public function categoryPost()
    {
        return $this->hasMany(CategoryPost::class);
    }
}
