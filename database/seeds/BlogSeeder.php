<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*for($i=1; $i<=500; $i++)
        {
            DB::table('blog')->insert([
                'title' => Str::random(15),
                'description' => Str::random(30),
                'author' => Str::random(10),
                'created_date' => date('Y-m-d'),
                'image' => 'slide-'.$i.'.jpg'
            ]);
        }*/

        DB::table('blog')->truncate();
        factory(App\Blog::class, 700)->create();
    }
}
