<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'content', 'researcher_id'];

    public function researcher()
    {
        return $this->belongsTo(Researchers::class, 'researcher_id');
    }

    public function references()
    {
        return $this->hasMany(References::class,'article_id');
      
    }
    
}
