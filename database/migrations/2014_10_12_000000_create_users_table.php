<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName')->nullable();
            $table->string('profilePicture')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phoneNumber')->unique();
            $table->string('address')->nullable();
            $table->decimal('long', 11, 8)->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
//            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
