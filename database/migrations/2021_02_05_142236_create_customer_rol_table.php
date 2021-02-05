<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_rol', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('rol_id')->references('id')->on('rols')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->foreign('customer_id')->references('id')->on('customers')
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
        Schema::dropIfExists('customer_rol');
    }
}
