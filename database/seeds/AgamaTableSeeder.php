<?php

use Illuminate\Database\Seeder;
use App\Agama;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('agama')->delete();

    	$agama = [
    		['agama' => 'Islam'],
    		['agama' => 'Kristen'],
    		['agama' => 'Khatolik'],
    		['agama' => 'Hindu'],
    		['agama' => 'Budha']
    	];

    	foreach ($agama as $loop) {
    		Agama::create($loop);
    	}
    }
}
