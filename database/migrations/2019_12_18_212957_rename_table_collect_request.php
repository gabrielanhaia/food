<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class RenameTableCollectRequest
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class RenameTableCollectRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('collection_requests', 'collect_requests');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('collection_requests', 'collection_requests');
    }
}
