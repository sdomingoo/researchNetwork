<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researchers extends Model
{
    use HasFactory;
    protected $fillable = ['firstName','lastName','email','password'];

    public function field()
    {
        return $this->belongsTo(Fields::class,'field_id');
    }
}
