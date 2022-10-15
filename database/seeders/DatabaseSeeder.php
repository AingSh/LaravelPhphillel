<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\Tag;
use Illuminate\Database\Seeder;
use  \App\Models\User;
use  \App\Models\Category;
use  \App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //делаем 10 рандомных юзеров и засовываем их в проперти
        $users = User::factory(10)->create();

        //делаем 25 рандомных категорий и засовываем их в проперти
        $categories = Category::factory(25)->create();

        //делаем 100 постов рандомных постов и засовываем их в проперти при этом еще и юзер+категории добавляем
        $posts = Post::factory(100)->make()->each(function ($post) use ($users, $categories) {
            $post->user_id = $users->random()->id;
            $post->category_id = $categories->random()->id;
            $post->save();
        });


        //делаем 20 тегов  и добавляем рандомные посты
        $tags = Tag::factory(100)->create();
        $posts->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(rand(2, 5))->pluck('id'));
        });

    }
}

