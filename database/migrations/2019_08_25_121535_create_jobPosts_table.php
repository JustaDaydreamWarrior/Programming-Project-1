<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Table for job listings
    public function up()
    {

        // $ php artisan make:migration add_xxx_column_to_bbb_table --table=bbb

        Schema::create('jobposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Job Information
            $table->string('title');
            $table->string('organisation');
            $table->integer('estSalary');
            $table->string('email');
            $table->string('state');
            $table->string('city');

            //Required Education and Experience
            $table->integer('minEdu');
            $table->integer('minExp');

            // Skills that a job listing may have as a requirement/preference.
            $table->boolean('java');
            $table->boolean('c');
            $table->boolean('csharp');
            $table->boolean('cplus');
            $table->boolean('php');
            $table->boolean('html');
            $table->boolean('css');
            $table->boolean('python');
            $table->boolean('javascript');
            $table->boolean('sql');
            $table->boolean('unix');
            $table->boolean('windows10');
            $table->boolean('windows7');
            $table->boolean('windowsOld');
            $table->boolean('windowsServer');
            $table->boolean('macOS');
            $table->boolean('linux');
            $table->boolean('android');
            $table->boolean('iOS');
            $table->boolean('bash');
            $table->boolean('ciscoSystems');
            $table->boolean('microsoftOffice');
            $table->boolean('ruby');
            $table->boolean('powershell');
            $table->boolean('rust');
            $table->boolean('adobe');
            $table->boolean('cloud');

            $table->mediumText('description');

            $table->timestamps();

            //Reference to employer table. An a single employer is attached to a job listing as a foreign key. To be completed once employer login/registration is done.
//            $table->uuid('empID');
//            $table->foreign('empID')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobposts');
    }
}
