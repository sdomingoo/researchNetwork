<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    use HasFactory;
    
    protected $fillable = ['description', 'article_id'];

    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
    
}

