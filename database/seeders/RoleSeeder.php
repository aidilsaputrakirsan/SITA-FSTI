<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['mahasiswa', 'dosen', 'tendik', 'koorpro'];
        
        foreach ($roles as $roleName) {
            // Cek apakah role sudah ada sebelum membuatnya
            if (!Role::where('name', $roleName)->exists()) {
                Role::create(['name' => $roleName]);
            }
        }
    }
}