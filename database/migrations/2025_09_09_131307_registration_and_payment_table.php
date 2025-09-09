<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('unique_number');
            $table->timestamp('registration_date');
            $table->enum('status', ['Pending_payment', 'Paid', 'Cancelled', 'Refunded']);
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id')->nullable();
            $table->string('midtrans_order_id')->nullable()->unique();
            $table->decimal('gross_amount', 10, 2);
            $table->string('payment_method')->nullable();
            $table->enum('transaction_status', ['Pending', 'Settlement', 'Expire', 'Cancel', 'Deny']);
            $table->timestamp('transaction_time')->nullable();
            $table->string('currency')->default('IDR');
            $table->json('json_response')->nullable();
            $table->timestamps();
        });

        // Tambah foreign key setelah kedua tabel dibuat
        Schema::table('registrations', function (Blueprint $table) {
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign(['payment_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['registration_id']);
        });

        Schema::dropIfExists('payments');
        Schema::dropIfExists('registrations');
    }
};
