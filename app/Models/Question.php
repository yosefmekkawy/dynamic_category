<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'label', 'type', 'options', 'is_required'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'options' => 'array',
    ];
}
