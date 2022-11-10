<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptype extends Model
{
    use HasFactory;

    protected $fillable = ['catagory_id', 'subcatagory_id', 'name'];

    public function subcatagory()
    {
        return $this->belongsTo(Subcatagory::class);
    }
}
