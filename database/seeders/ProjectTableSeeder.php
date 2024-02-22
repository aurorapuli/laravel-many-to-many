<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project :: factory()
            -> count(50)
            -> make()
            -> each(function($project) {

            $type = Type :: inRandomOrder() -> first();
            $project -> type() -> associate($type);

            $project -> save();
        });
    }
}
