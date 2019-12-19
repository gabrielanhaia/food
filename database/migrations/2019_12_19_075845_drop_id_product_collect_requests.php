<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class DropIdProductCollectRequests
 *
 * @author Gabriel <anhaia.gabriel@gmail.com>
 */
class DropIdProductCollectRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collect_requests', function (Blueprint $table) {
            $table->dropForeign('fk_collection_requests_id_product');
            $table->dropColumn('id_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collect_requests', function (Blueprint $table) {
            $table->bigInteger('id_product')->unsigned()->nullable(false)->after('id');
        });
    }
}
