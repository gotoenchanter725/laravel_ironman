<?php

use App\User;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Interactive database seeding
        $postCount = (int) $this->command->ask('How many blog posts would you like to create?', 20);

        // model relation inside seeder
        $users = User::all(); // get all the users list
        factory(App\BlogPost::class, $postCount)->make()
            ->each(
                function ($post) use ($users) {
                    $post->user_id = $users->random()->id;
                    $post->save();
                });
    }
}
