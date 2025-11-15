<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update existing enum values
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('superadmin', 'admin', 'user', 'pekerja') DEFAULT 'user'");
        
        // Update admin@sigap.id to superadmin
        DB::table('users')
            ->where('email', 'admin@sigap.id')
            ->update(['role' => 'superadmin']);
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('user', 'pekerja') DEFAULT 'user'");
    }
};

