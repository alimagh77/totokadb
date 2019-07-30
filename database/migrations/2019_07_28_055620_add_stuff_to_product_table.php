<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStuffToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->integer('quality')->nullable();
            $table->integer('value')->nullable();
            $table->text('use')->nullable();
            $table->integer('pack')->nullable();
            $table->float('valueEco')->nullable();
            $table->string('ability')->nullable();
            $table->string('capacity')->nullable();
            $table->text('supplies')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
