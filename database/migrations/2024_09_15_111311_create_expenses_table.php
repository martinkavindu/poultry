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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('payee');
            $table->string('category');
            $table->string('notes')->nullable();
            $table->date('date');
            $table->boolean('does_not_repeat')->default(true);
            $table->boolean('is_recurring')->default(false);
            $table->enum('status', ['Cleared', 'Uncleared', 'Void']); 
            $table->decimal('amount', 10, 2); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
