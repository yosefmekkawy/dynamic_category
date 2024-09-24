<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataQuestion extends Question
{
    use HasFactory;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->type = 'data';
    }
}
