<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('registration_open_date');
            $table->dateTime('registration_close_date');
            $table->string('location');
            $table->decimal('price', 10, 2);
            $table->integer('max_participants')->nullable();
            $table->integer('current_participants')->default(0);
            $table->enum('status', ['Draft', 'Published', 'Archived', 'Cancelled'])->default('Draft');
            $table->string('poster_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
