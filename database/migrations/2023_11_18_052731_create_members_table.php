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
        Schema::create('members', function (Blueprint $table) {
            $table->id('mid');
            $table->string('mname');
            $table->string('memail');
            $table->string('maddress');
            $table->string('mphone');
            $table->string('mimage')->nullable();
            $table->string('mgender');
            $table->string('mpassword');
            $table->string('mstatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
