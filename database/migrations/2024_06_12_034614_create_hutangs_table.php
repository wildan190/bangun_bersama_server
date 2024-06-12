<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hutangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('transaction_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('transaction_number')->unique()->default(DB::raw(random_int(10000000, 99999999)));
            $table->unsignedBigInteger('paket_id');
            $table->integer('qty');
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('total_price', 10, 2);
            $table->decimal('bayar', 10, 2);
            $table->decimal('due_date_payment', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hutangs');
    }
};
