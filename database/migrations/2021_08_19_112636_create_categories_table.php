<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //выполняет, когда создаем новые таблицы (накатываем миграции)
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->text('description')->nullable(); //значит, по умолчанию null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // при откате (когда хотим изменить)
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
