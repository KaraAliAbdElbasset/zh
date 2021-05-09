<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('client_name');
            $table->integer('amount');
            $table->date('date');
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
        Schema::table('invoices', function (Blueprint $table) {

            $table->dropForeign('invoices_club_id_foreign');
        });
        Schema::dropIfExists('invoices');
    }
}
