<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'hoge1',
                'body' => 'test1'
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'hoge2',
                'body' => 'test2'
            ],
            [
                'user_id' => 3,
                'category_id' => 1,
                'title' => 'hoge3',
                'body' => 'test3'
            ]
        
        ]);
    }
}
