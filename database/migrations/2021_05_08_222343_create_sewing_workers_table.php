<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewingWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sewing_workers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('birth_place')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_full_name')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('address')->nullable();
            $table->string('phone_number');
            $table->string('qualification')->nullable();
            $table->date('work_start_date')->nullable();
            $table->date('work_end_date')->nullable();
            $table->integer('salary')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sewing_workers');
    }
}
