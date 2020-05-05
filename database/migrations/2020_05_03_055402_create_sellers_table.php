<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('businessName');
            $table->text('description')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName')->nullable();
            $table->string('businessLogo')->nullable();
            $table->string('profilePicture')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneNumber')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->decimal('long', 11, 8)->nullable();
            $table->decimal('lat', 10, 8)->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
