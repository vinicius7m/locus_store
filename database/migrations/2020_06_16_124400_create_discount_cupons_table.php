<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_cupons', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('locator')->unique();
            $table->decimal('discount', 6,2)->default(0);
            $table->enum('discount_mode', ['value', 'perc'])->default('perc');
            $table->decimal('limit', 6,2)->default(0);
            $table->enum('limit_mode', ['value','quantity'])->default('quantity');
            $table->dateTime('dthr_validade');
            $table->enum('ativo', ['S', 'N'])->default('S');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_cupons');
    }
}
