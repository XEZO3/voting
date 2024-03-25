<?php

use App\Models\Competitors;
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
        Schema::create('votelogs', function (Blueprint $table) {
            $table->id();
            $table->string("fingerprint")->unique();
            $table->foreignIdFor(Competitors::class)->constrained()->onUpdate('cascade')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votelogs');
    }
};
