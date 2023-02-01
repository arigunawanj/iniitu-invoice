<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Barang;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Barang::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){

            // insert data ke table barang menggunakan Faker
          DB::table('barangs')->insert([
            'kode_barang' => $faker->randomnumber,
            'nama_barang' => $faker->name,
            'harga' => $faker->randomNumber(5, true),
            'harga_dollar' => $faker->randomNumber(5, true),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
        }
    }
}
