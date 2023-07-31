<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->json('full_name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('organization_id');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('organization_id')->references('id')->on('organizations');
        });

        DB::statement('CREATE INDEX email_index ON users (email) USING HASH');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
