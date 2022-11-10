<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcatagory extends Model
{
    use HasFactory;
    protected $fillable = ['catagory_id', 'name'];

    public function ptypes()
    {
        return $this->hasMany(Ptype::class);
    }

    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }
}
