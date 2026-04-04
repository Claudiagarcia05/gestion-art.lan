<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\User;

    class AdminUserSeeder extends Seeder {
        public function run(): void {
            $admin = User::firstOrCreate(
                ['email' => 'admin@test.com'],
                ['name' => 'Admin', 'password' => 'password']
            );

            if (is_null($admin->email_verified_at)) {
                $admin->forceFill(['email_verified_at' => now()])->save();
            }
            
            $this->command->info('Usuario admin creado correctamente.');
        }
    }