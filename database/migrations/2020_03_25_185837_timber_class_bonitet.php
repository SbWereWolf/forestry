<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TimberClassBonitet extends Migration
{
    const TIMBER = 'timber_class';
    const BONITET = 'bonitet';

    const TITLE = 'title';
    const CODE = 'code';
    const REMARK = 'remark';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TIMBER, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string(self::TITLE);
            $table->unsignedInteger(self::CODE)->unique();
            $table->string(self::REMARK)->nullable();
        });

        Schema::create(self::BONITET, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string(self::TITLE);
            $table->unsignedInteger(self::CODE)->unique();
            $table->string(self::REMARK)->nullable();
        });

        DB::beginTransaction();

        $names=[];
        $names[1]='Первый';
        $names[2]='Второй';
        $names[3]='Третий';
        $names[4]='Четвертый';
        $names[5]='Пятый';
        $names[6]='Шестой';
        $names[7]='Седьмой';
        $names[8]='Восьмой';

        for ($number = 1; $number <= 8; $number++) {
            DB::table(self::TIMBER)->insert([
                self::TITLE => $names[$number],
                self::CODE => $number,
            ]);
        }
        for ($number = 1; $number <= 6; $number++) {
            DB::table(self::BONITET)->insert([
                self::TITLE => $names[$number],
                self::CODE => $number,
            ]);
        }

        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TIMBER);
        Schema::dropIfExists(self::BONITET);
    }
}
