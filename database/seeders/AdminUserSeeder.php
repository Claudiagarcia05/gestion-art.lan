<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class AdminUserSeeder extends Seeder {
        public function run(): void {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            
            $this->command->info('Usuario admin creado correctamente.');
        }
    }