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
        /*
        Schema::connection('sqlite_additives')->create('additives', function (Blueprint $table) {
            $table->id();
            $table-> string("e_code");
            $table-> string("title");
            $table-> text("info");
            $table-> string("e_type");
            $table -> unsignedInteger("halal_status");
            $table -> unsignedInteger("favourite");
            $table -> unsignedInteger("health_rating");
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additives');
    }
};
