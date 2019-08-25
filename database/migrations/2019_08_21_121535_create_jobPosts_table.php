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
    public function up()
    {
        
        // $ php artisan make:migration add_xxx_column_to_bbb_table --table=bbb
        Schema::create('jobPosts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('organisation');
            $table->double('estSalary');
            $table->string('email');
            $table->mediumText('description');
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
        Schema::dropIfExists('jobPosts');
    }
}
