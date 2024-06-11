<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('link');
            $table->date('transaction_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('transaction_number')->unique()->default(DB::raw(random_int(10000000, 99999999)));
            $table->unsignedBigInteger('paket_id');
            $table->integer('qty');
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('total_price', 10, 2);
            $table->decimal('bayar', 10, 2);
            $table->decimal('kembalian', 10, 2);
            $table->timestamps();

            // Assuming there is a table 'pakets' for the paket_id foreign key
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
