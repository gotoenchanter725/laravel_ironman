<?php

use App\BlogPost;
use App\PostComment;
use App\User;
use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Interactive database seeding
        $commentCount = (int) $this->command->ask('How many comments would you like to create?', 150);
        $posts = BlogPost::all();
        $users = User::all();
        factory(PostComment::class, $commentCount)->make()->each(function ($comment) use ($posts, $users) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
