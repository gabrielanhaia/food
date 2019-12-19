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
        'status',
        'name_responsible',
        'collection_start_time',
        'collection_end_time',
        'description'
    ];

    /**
     * List of products on an order request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            CollectRequestProduct::class,
            'id_collect_request',
            'id_product',
            'id',
            'id'
        )->withPivot([
            'quantity',
            'unit_of_measurement',
            'note'
        ]);
    }
}
