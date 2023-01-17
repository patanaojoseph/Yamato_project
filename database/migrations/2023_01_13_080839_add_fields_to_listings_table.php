<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger("beds");
            $table->unsignedTinyInteger("baths");
            $table->unsignedTinyInteger("kitchen");
            $table->unsignedTinyInteger("dinning");
            $table->unsignedSmallInteger('area');

            $table->tinyText('city');
            $table->tinyText('code');
            $table->tinyText('street');
            $table->tinyText('street_no');

            $table->unsignedInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('listings', [
            'beds', 'baths', 'kitchen', 'dinning', 'area', 'city', 'code', 'street', 'street_no', 'price'
        ]);
    }
};
