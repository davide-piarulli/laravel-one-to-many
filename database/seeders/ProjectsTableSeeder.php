<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
// importo il Faker e lo installo con composer require fakerphp/faker --dev
use Faker\Generator as Faker;
use App\Functions\Helper;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 60; $i++) {
            $new_project = new Project;
            $new_project->title = $faker->word(9, true);
            $new_project->slug = Helper::createSlug($new_project->title, new Project());
            $new_project->type = $faker->word();
            $new_project->link = $faker->url();
            $new_project->description = $faker->paragraph(8, true);
            // dump($new_project);
            $new_project->save();
        }
    }
}
