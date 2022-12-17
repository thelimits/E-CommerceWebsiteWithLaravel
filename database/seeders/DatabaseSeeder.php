<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Member;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Member::create([
            'name' => 'Prambudi',
            'email' => 'Prambudi@gmail.com',
            'password' => bcrypt('Herbowo1234567'),
            'Phone' => '0858789658',
            'Address'=> 'Jalan Kebahagiaan'
        ]);

        Member::create([
            'name' => 'Kevin Wijaya',
            'email' => 'Kevin@gmail.com',
            'password' => bcrypt('Herbowo1234567'),
            'Phone' => '0858245658',
            'Address'=> 'Jalan Kebahagiaan'
        ]);

        Member::create([
            'name' => 'Prambudi Herbowo',
            'email' => 'Prambudi150.Admin_Boutique@gmail.com',
            'password' => bcrypt('Herbowo1234567'),
            'Phone' => '0858789658',
            'Address'=> 'Jalan Kebahagiaan'
        ]);

        Barang::create([
            'Nama_Barang' => 'Black Short',
            'Harga_Barang' => 55000,
            'Image' => 'images/BlackShort.jpg',
            'Description' => 'Suitable for anyone, Size: L',
            'Stock' => 10
        ]);
        Barang::create([
            'Nama_Barang' => 'Blue Short',
            'Harga_Barang' => 55000,
            'Image' => 'images/BlueShort.jpg',
            'Description' => 'Suitable for anyone, Size: L',
            'Stock' => 10
        ]);
        Barang::create([
            'Nama_Barang' => 'Brown T-Shirt',
            'Harga_Barang' => 55000,
            'Image' => 'images/BrownT-Shirt.jpg',
            'Description' => 'Suitable for anyone, Size: L',
            'Stock' => 10
        ]);
        Barang::create([
            'Nama_Barang' => 'Cotton Shirt',
            'Harga_Barang' => 60000,
            'Image' => 'images/CottonShirt.jpg',
            'Description' => 'Suitable for anyone, Size: XL',
            'Stock' => 5
        ]);
        Barang::create([
            'Nama_Barang' => 'Maroon Hoodie',
            'Harga_Barang' => 70000,
            'Image' => 'images/MaroonHoodie.jpg',
            'Description' => 'Suitable for anyone, Size: M',
            'Stock' => 3
        ]);
        Barang::create([
            'Nama_Barang' => 'Purple Skirt',
            'Harga_Barang' => 40000,
            'Image' => 'images/PurpleSkirt.jpg',
            'Description' => 'Suitable for Woman, Size: M',
            'Stock' => 3
        ]);
        Barang::create([
            'Nama_Barang' => 'Red Jacket',
            'Harga_Barang' => 120000,
            'Image' => 'images/RedJacket.jpg',
            'Description' => 'Suitable for Kids, Size: S',
            'Stock' => 1
        ]);
        Barang::create([
            'Nama_Barang' => 'White T-Shirt',
            'Harga_Barang' => 55000,
            'Image' => 'images/WhiteT-Shirt.jpg',
            'Description' => 'Suitable for Male, Size: S',
            'Stock' => 5
        ]);
        Barang::create([
            'Nama_Barang' => 'White T-Shirt',
            'Harga_Barang' => 60000,
            'Image' => 'images/YellowT-Shirt.jpg',
            'Description' => 'Suitable for Male, Size: S',
            'Stock' => 5
        ]);
    }
}
