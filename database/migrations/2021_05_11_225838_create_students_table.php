<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->double('academic_average_1')->nullable();
            $table->double('academic_average_2')->nullable();
            $table->double('academic_average_3')->nullable();
            $table->double('honor_rate')->nullable();
            $table->double('memorization_level')->nullable();
            $table->string('birth_place')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('father_name')->nullable();
            $table->string('father_job')->nullable();
            $table->string('mother_full_name')->nullable();
            $table->string('phone_number');
            $table->string('address')->nullable();
            $table->date('enter_date')->nullable();
            $table->date('leave_date')->nullable();
            $table->string('education_level')->nullable();
            $table->string('memorizing_level')->nullable();
            $table->string('behaviors')->nullable();
            $table->integer('type');
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
        Schema::dropIfExists('students');
    }
}
