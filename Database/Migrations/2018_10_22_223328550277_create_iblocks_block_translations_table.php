<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIblocksBlockTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iblocks__block_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('block_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['block_id', 'locale']);
            $table->foreign('block_id')->references('id')->on('iblocks__blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iblocks__block_translations', function (Blueprint $table) {
            $table->dropForeign(['block_id']);
        });
        Schema::dropIfExists('iblocks__block_translations');
    }
}
