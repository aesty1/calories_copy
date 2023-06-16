<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'calories',
        'carbohydrates',
        'protein',
        'fats',
    ];

    public function histories() {
        return $this->belongsToMany(History::class)->withPivot('male', 'gram');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
