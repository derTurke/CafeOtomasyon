<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("company_name",75)->nullable();
            $table->string("brand_name",75)->nullable();
            $table->string("sicil_no",50)->nullable();
            $table->string("vergi_no",20)->nullable();
            $table->string("vergi_dairesi",75)->nullable();
            $table->string("mersis_no",30)->nullable();
            $table->text("address")->nullable();
            $table->string("phone",25)->nullable();
            $table->string("fax",25)->nullable();
            $table->string("email",75)->nullable();
            $table->string("facebook",50)->nullable();
            $table->string("twitter",50)->nullable();
            $table->string("instagram",50)->nullable();
            $table->string("linkedin",50)->nullable();
            $table->text("kvkk")->nullable();

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
        Schema::dropIfExists('settings');
    }
}
