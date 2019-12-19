<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 *
 * @author Gabriel Anhaia <gabriel@gmail.com>
 */
class Product extends Model
{
    use SoftDeletes;
}
