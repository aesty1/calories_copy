<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'calories',
        'user_id',
        'carbohydrates',
        'protein',
        'fats',
        'water',
        'date',
        'workout_calories'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('male', 'gram');
    }
}
