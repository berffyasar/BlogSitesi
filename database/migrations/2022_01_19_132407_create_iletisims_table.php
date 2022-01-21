<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIletisimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iletisims', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('surname');
            $table->text('phone');
            $table->text('mail');
            $table->integer('okundu')->default(0);
            $table->longText('message');
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
        Schema::dropIfExists('iletisims');
    }
}
