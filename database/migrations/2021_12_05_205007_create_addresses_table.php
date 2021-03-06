<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('user_id');
            $table->string('header',100)->nullable();
            $table->text('address')->nullable();
            $table->string('building_no',25)->nullable();
            $table->string('floor',25)->nullable();
            $table->string('apartment_no',25)->nullable();
            $table->string('specification',150)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('addresses');
    }
}
