<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('configuration_id')->nullable();
            $table->string('nameUser');
            $table->string('nameComplete');
            $table->string('email');
            $table->string('phone');
            $table->string('age');
            $table->string('dateBirth')->nullable();
            $table->foreign('configuration_id')->references('id')->on('configurations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
