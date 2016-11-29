<?php

use Illuminate\Database\Seeder;

class OAuthClientsSeeder extends Seeder
{
	public function run()
	{
		DB::table('oauth_clients')->insert(array(
			'client_id' => "movilAndroid",
			'client_secret' => "passAndroid",
			'redirect_uri' => "http://www.cuidum.com/",
		));
	}
}