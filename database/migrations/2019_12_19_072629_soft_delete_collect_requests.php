<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class SoftDeleteCollectRequests
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class SoftDeleteCollectRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collect_requests', function (Blueprint $table) {
            $table->softDeletes();
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
            $table->dropSoftDeletes();
        });
    }
}
