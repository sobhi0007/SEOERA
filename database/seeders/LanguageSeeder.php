<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Language::create([
            'title' => 'English',
            'slogan'=>'en',
            'image'=>'uploads/language/en.png'
        ]);

        Language::create([
            'title' => 'Arabic',
            'slogan'=>'ar',
            'image'=>'uploads/language/ar.png'
        ]);

        Language::create([
            'title' => 'Spanish',
            'slogan'=>'sp',
            'image'=>'uploads/language/sp.png'
        ]);
    }
}
