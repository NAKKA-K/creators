<?php

use Illuminate\Database\Seeder;

class SkillTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_tags')->insert([
            ['name' => 'web'],
            ['name' => 'ゲーム'],
            ['name' => 'デザイン'],
            ['name' => '3DCG']
        ]);
    }
}
