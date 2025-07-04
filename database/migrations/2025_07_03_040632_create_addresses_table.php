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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Ini akan membuat 'id' sebagai primary key auto-increment
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->string('recipient_name');
            $table->string('phone_number')->nullable();
            $table->string('street_address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->text('other_details')->nullable(); // Untuk "Other Details"
            $table->string('label')->nullable(); // Untuk "Home", "Work", dll.
            $table->boolean('is_default')->default(false); // Untuk menandai alamat default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};