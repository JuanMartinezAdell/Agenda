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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');

            $table->foreignId('organization_id')->constrained();
            $table->foreignId('position_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('location_id')->constrained();

            $table->string('phone');
            $table->string('short_phone');
            $table->string('phone_code');
            $table->string('email');
            $table->string('alias');

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
        Schema::dropIfExists('contacts');
    }
};
