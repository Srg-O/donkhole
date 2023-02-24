<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //100件のテストユーザーを登録する 
        for( $cnt = 1; $cnt <= 100; $cnt++ ) { 
            \DB::table('entries')->insert([
                'name'          => 'テストユーザー' . $cnt,
                'email'         => 'test' .$cnt . '@example.com',
                'zip'           => 1234567,
                'prefecture'    => rand(1,48),
                'address'       => $cnt.'市'.$cnt.'町',
                'building'      => $cnt.'町ビル'.$cnt.'号室',
                'gender'        => rand(0,2),
                'image' 		=> '',
                'tel' 			=> rand(111111111111,999999999999),
                'message' 	    => $cnt.'人目のユーザー',
                'created_at' => now(),
				'updated_at' => now()
            ]);
        }
    }
}