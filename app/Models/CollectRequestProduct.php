<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class CollectRequestProduct
 * @package App\Models
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CollectRequestProduct extends Pivot
{
    /** @var string $table Custom table name. */
    protected $table = 'collect_request_product';
}
