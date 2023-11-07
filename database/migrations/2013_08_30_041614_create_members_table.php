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
        // membuat file migration dan mmodel
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 65);
            $table->char('gender', 1);
            $table->char('phone_number', 15);
            $table->text('address');
            $table->string('email', 65);
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
        Schema::dropIfExists('members');
    }
};
