<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments("id");

            $table->integer("id_user")->unsigned();
            $table->foreign("id_user")->references('id')->on('user')->onDelete('cascade')->onUpdate("cascade");

            $table->integer("id_produto")->unsigned();
            $table->foreign("id_produto")->references('id')->on('produto')->onDelete('cascade')->onUpdate("cascade");

            $table->integer("quantidade");

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
        Schema::dropIfExists('compras');
    }
}
