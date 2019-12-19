<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CollectRequest
 * @package App\Models
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CollectRequest extends Model
{
    use SoftDeletes;

    /** @var array $fillable */
    protected $fillable = [
        'id_product',
        'status',
        'name_responsible',
        'collection_start_time',
        'collection_end_time',
        'description'
    ];
}
