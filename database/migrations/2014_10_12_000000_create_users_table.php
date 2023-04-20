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
        Schema::create('users', function (Blueprint $table) {
            $table->id();


            $table->string('first_name');
            $table->string('phone');
            $table->string('surname');
            $table->string('next_of_kin_phone');
            $table->string('next_of_kin_name');
            $table->string('address');
            $table->string('state_of_origin');
            $table->string('reg_no')->unique();
            $table->string('department');
            $table->string('campus')->default('ifite');
            $table->string('gender');
            $table->string('passport');
            $table->boolean('type')->default(true);
            $table->string('email')->unique();
            $table->string('password');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
};
