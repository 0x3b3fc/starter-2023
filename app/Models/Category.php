<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @property mixed $status
 * @property mixed $name
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];
}
