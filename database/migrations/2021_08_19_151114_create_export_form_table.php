<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_table', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('phone', 191)->nullable();
            $table->string('email',200)->nullable();
            $table->enum('status',['PENDING', 'ACTIVE', 'FINISHED'])->default('PENDING');
            $table->text('information')->nullable();
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
        Schema::dropIfExists('export_table');
    }
}
