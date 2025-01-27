<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    use HasFactory;
    protected $fillable = ['fieldName'];

    public function researchers()
    {
        return $this->hasMany(Researchers::class,'field_id');
    }
}
