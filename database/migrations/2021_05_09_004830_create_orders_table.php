<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sewing_client_id')->constrained('sewing_clients')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->date('due_date')->nullable();
            $table->integer('amount');
            $table->integer('paid')->default(0);
            $table->string('note');
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_sewing_client_id_foreign');
        });
        Schema::dropIfExists('orders');
    }
}
