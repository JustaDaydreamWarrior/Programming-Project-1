<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Table for Job Seekers
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->primary('id');
            //User details
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('state');
            $table->string('city');
            $table->integer('experience');
            $table->integer('education');

            // User's skills
            $table->boolean('java');
            $table->boolean('c');
            $table->boolean('c#');
            $table->boolean('c++');
            $table->boolean('php');
            $table->boolean('html');
            $table->boolean('css');
            $table->boolean('python');
            $table->boolean('javascript');
            $table->boolean('sql');
            $table->boolean('unix');
            $table->boolean('windows');
            $table->boolean('windowsServer');
            $table->boolean('macOS');
            $table->boolean('linux');
            $table->boolean('bash');
            $table->boolean('ciscoSystems');
            $table->boolean('microsoftOffice');
            $table->boolean('ruby');
            $table->boolean('powershell');
            $table->boolean('rust');
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
