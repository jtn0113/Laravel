<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();

		for($i = 0; $i <= 100; $i++) {
			$post = new \App\Models\Post();
			$post->title = $faker->catchPhrase;
			$post->url = $faker->url;
			$post->content = $faker->bs;
			$post->created_by = \App\User::all()->random()->id;
			$post->save();
		}
	}
}