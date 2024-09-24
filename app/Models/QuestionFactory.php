<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionFactory extends Model
{
    use HasFactory;

    public static function create(string $type, array $data)
    {
        switch ($type) {
            case 'text':
                return new TextQuestion($data);
            case 'select':
                return new SelectQuestion($data);
            case 'date':
                return new DataQuestion($data);
            default:

        }
    }
}
