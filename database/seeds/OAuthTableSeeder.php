<?php

use Illuminate\Database\Seeder;

class OAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('oauth_clients')->insert([
            'id' => 'appid1',
            'secret' => 'secret',
            'name' => 'test',
            'created_at' => '03/02/2016',
            'updated_at' => '03/02/2016'
        ]);
    }
}
