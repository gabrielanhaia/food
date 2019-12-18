<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTableCollectionRequests
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CreateTableCollectionRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_product')->unsigned()->nullable(false);
            $table->enum('status', ['PENDING', 'APPROVED', 'COLLECTED']);
            $table->text('description');
            $table->string('name_responsible');
            $table->dateTime('collection_start_time');
            $table->dateTime('collection_end_time');
            $table->timestamps();
        });

        Schema::table('collection_requests', function (Blueprint $table) {
            $table->foreign('id_product', 'fk_collection_requests')
                ->references('id')
                ->on('products')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_requests');
    }
}
