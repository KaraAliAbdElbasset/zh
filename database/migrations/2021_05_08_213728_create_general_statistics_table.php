<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('general_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birth_place')->nullable();
            $table->date('birth_date');
            $table->string('father_name')->nullable();
            $table->string('mother_full_name')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('address')->nullable();
            $table->string('phone_number');
            $table->string('qualification')->nullable();
            $table->string('job')->nullable();
            $table->string('job_address')->nullable();
            $table->string('social_status')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('general_statistics');
    }
}
