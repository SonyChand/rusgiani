<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'maps',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function packages()
    {
        return $this->hasMany(TourPackage::class);
    }
}
