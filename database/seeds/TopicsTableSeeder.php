<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\User;
use App\Category;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Topic::class)->times(100)->create();
    }

}

