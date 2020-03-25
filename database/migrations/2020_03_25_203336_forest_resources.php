<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForestResources extends Migration
{
    const RESOURCES = 'forest_resources';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::RESOURCES, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wood_specie_id');
            $table->unsignedBigInteger('timber_class_id');
            $table->unsignedBigInteger('bonitet_id');
            $table->unsignedInteger('forest_fund');
            $table->unsignedInteger('wood_stock');

            $table->unique(
                ['wood_specie_id','timber_class_id','bonitet_id'],
                'wood_specie_timber_class_bonitet');
            $table->index('timber_class_id');
            $table->index('bonitet_id');

            $table->foreign('wood_specie_id')
                ->references('id')->on('wood_specie');
            $table->foreign('timber_class_id')
                ->references('id')->on('timber_class');
            $table->foreign('bonitet_id')
                ->references('id')->on('bonitet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::RESOURCES);
    }
}
