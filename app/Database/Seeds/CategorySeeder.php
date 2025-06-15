<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Teknologi'],
            ['name' => 'Olahraga'],
            ['name' => 'Hiburan'],
            ['name' => 'Bisnis'],
            ['name' => 'Sains'],
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}
