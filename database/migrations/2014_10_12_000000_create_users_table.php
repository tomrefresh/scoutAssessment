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
        Schema::create('users_dev', function (Blueprint $table) {
            $table->mediumInteger('id', 8)->unsigned()->autoIncrement();
            $table->string('username', 30)->nullable();
            $table->string('email', 50)->nullable()->unique('idx_email');
            $table->char('password', 60)->nullable();
            $table->string('mobile')->nullable()->unique('idx_mobile');
            $table->string('name', 30)->nullable();
            $table->string('surname', 30)->nullable();
            $table->string('job_title')->nullable();
            $table->text('bio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_dev');
    }
}
