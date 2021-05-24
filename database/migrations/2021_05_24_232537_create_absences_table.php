<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->morphs('absenceable');
            $table->string('reason')->nullable();
            $table->foreignId('group_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null')
                ->onUpdate('set null');
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
        Schema::table('absences',function (Blueprint $table){
           $table->dropForeign('absences_group_id_foreign');
        });
        Schema::dropIfExists('absences');
    }
}
