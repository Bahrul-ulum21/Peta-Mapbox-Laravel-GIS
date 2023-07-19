<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'long'=>'113.71591228653898',
            'lat'=>'-7.025888562440926',
            'title'=>'Pasar Ganding',
            'description'=>'Pasar Ganding Sumenep adalah salah satu pasar tradisional yang terletak di Kabupaten Sumenep, Provinsi Jawa Timur, Indonesia. Pasar ini merupakan pusat perdagangan dan kegiatan ekonomi masyarakat di daerah Sumenep.',
            'image'=>'45aa430cbc9e845a0170c7a69a2a2a36.jpg',
        ]);
    }
}
