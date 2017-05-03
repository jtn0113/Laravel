<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VoteTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();

		for($i = 0; $i <= 100; $i++) {
			$vote = new \App\Models\Vote();
			$vote->user_id = \App\User::all()->random()->id;
			$vote->post_id = \App\Models\Post::all()->random()->id;
			$vote->vote = $faker->numberBetween(0, 1);
			$vote->save();
		}
	}
}