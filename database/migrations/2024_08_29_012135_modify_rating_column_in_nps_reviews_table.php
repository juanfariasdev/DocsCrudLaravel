<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRatingColumnInNpsReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nps_reviews', function (Blueprint $table) {
            $table->tinyInteger('rating')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nps_reviews', function (Blueprint $table) {
            $table->tinyInteger('rating')->unsigned()->nullable(false)->change();
        });
    }
}
