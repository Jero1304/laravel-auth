<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $post = new Post();
            $post->title = $faker->unique()->sentence($faker->numberBetween(3,5));
            $post->content = $faker->optional()->text(200);
            $post->slug = Str::slug($post->title,'-') ;
            $post->save();
        }
    }
}
