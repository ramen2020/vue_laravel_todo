<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'person_in_charge',
    ];
}
