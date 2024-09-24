<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectQuestion extends Question
{
    use HasFactory;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->type = 'select';
        $this->options = $data['options'] ?? [];
    }
}
