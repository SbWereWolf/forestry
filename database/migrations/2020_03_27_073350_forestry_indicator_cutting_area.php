<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForestryIndicatorCuttingArea extends Migration
{
    const INDICATOR = 'forestry_indicator';
    const AREA = 'cutting_area';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::INDICATOR, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wood_specie_id');
            $table->unsignedDecimal('avrg_bonitet',6,2);
            $table->unsignedDecimal('avrg_wood_stock',6,2);
            $table->unsignedDecimal('avrg_class',6,2);
            $table->unsignedDecimal('avrg_increase',6,2);
            $table->unsignedDecimal('operational_fund',6,2);
            $table->unsignedDecimal(
                'operational_volume',6,2);
            $table->unsignedDecimal(
                'economical_section_high',6,2);
            $table->unsignedDecimal(
                'economical_section_low',6,2);

            $table->unique(['wood_specie_id']);

            $table->foreign('wood_specie_id')
                ->references('id')->on('wood_specie');
        });
        Schema::create(self::AREA, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wood_specie_id');
            $table->unsignedDecimal('ripeness',6,2);
            $table->unsignedDecimal('first_age',6,2);
            $table->unsignedDecimal('second_age',6,2);
            $table->unsignedDecimal('avrg_increase',6,2);
            $table->unsignedDecimal('substance',6,2);
            $table->unsignedDecimal('cutting_turnover',6,2);

            $table->unique(['wood_specie_id']);

            $table->foreign('wood_specie_id')
                ->references('id')->on('wood_specie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::INDICATOR);
        Schema::dropIfExists(self::AREA);
    }
}
