<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tree_orders', function (Blueprint $table) {
            $table->id(); // Primary key for tree_orders

            // Foreign key to users table
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id') // Assuming 'id' is the primary key of your users table
                ->on('users')
                ->onDelete('cascade');

            // Foreign key to trees table
            $table->unsignedBigInteger('tree_id');
            $table->foreign('tree_id')
                ->references('treeid') // References the custom primary key of the trees table
                ->on('trees')
                ->onDelete('cascade');

            $table->integer('amount')->default(1); // Jumlah pohon yang diorder
            $table->decimal('total_price', 10, 5); // Total harga untuk order ini (amount * treeprice saat diorder)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tree_orders');
    }
};