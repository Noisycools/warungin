<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'nama'      => $faker->name,
                'alamat'    => $faker->address,
                'email'     => $faker->email,
                'no_tlp'    => $faker->phoneNumber,
                'username'  => $faker->userName,
                'password'  => $faker->password
            ];
            $this->db->table('customer')->insert($data);
        }
        // Simple Queries
        // $this->db->query("INSERT INTO customer (nama, alamat, email, no_tlp, username) VALUES(:nama:, :alamat:, :email:, :no_tlp:, :username:)", $data);

        // Using Query Builder
    }
}
