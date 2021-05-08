<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('funerals', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birth_place')->nullable();
            $table->date('birth_date');
            $table->string('death_place')->nullable();
            $table->date('death_date');
            $table->string('father_name')->nullable();
            $table->string('mother_full_name')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->integer('expenses')->default(0);
            $table->integer('meals_number')->default(0);
            $table->text('contributors')->nullable();
            $table->text('moderators')->nullable();
            $table->string('note')->nullable();
            $table->string('national_number')->nullable();
            $table->string('serial_number')->nullable();
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
        Schema::dropIfExists('funerals');
    }
}
