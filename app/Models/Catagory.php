<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'name'
    ];

    public function subcatagories()
    {
        return $this->hasMany(Subcatagory::class);
    }

    public function subcatagoriesWithPtypes()
    {
        return $this->subcatagories->with('ptypes');
    }
}
