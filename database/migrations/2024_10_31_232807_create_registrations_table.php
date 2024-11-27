<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('phone');
            $table->string('passport');
            $table->enum('type', ['hajj', 'umrah', 'work']);
            $table->enum('status', ['pending', 'approved', 'canceled'])->default('pending');
            $table->decimal('amount', 10, 2)->nullable(); // Add amount field, nullable for non-approved records
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
