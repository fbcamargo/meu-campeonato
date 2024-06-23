<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert some stuff
        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'admin@domain.example',
                "password" => Hash::make('Mudar123')
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
