<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Likeable;
    protected $fillable = [
        'title',
        'content',
        'user'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
