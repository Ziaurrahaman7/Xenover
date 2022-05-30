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
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('favicon');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('facebook');
            $table->string('youtube')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('map')->nullable();
            $table->string('copyright')->nullable();
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
        Schema::dropIfExists('sitesettings');
    }
};
