<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project; //model
use Faker\Generator as Faker; //faker
use Illuminate\Support\Str; //str

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Ciclo
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project(); //nuovo progetto
            $newProject->title = $faker->unique()->sentence($faker->numberBetween(3, 5)); //titolo
            $newProject->client = $faker->word(); //cliente
            $newProject->description = $faker->text(200); //descrizione
            $newProject->url = $faker->url(); //url
            $newProject->slug = Str::slug($newProject->title, "-"); //slug
            $newProject->save(); //salvo i dati
        }
    }
}
