<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CollectRequest
 * @package App\Models
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CollectRequest extends Model
{
    /** @var array $fillable */
    protected $fillable = [
        'id_product',
        'status',
        'quantity',
        'unit_of_measurement',
        'name_responsible',
        'collection_start_time',
        'collection_end_time',
        'description'
    ];
}
