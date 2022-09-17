<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table= "posts";

    protected $fillable = ['first_name', 'last_name', 'contact_num', 'user_name', 'email', 'select_company', 'user_type'];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
