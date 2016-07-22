<?php

use Illuminate\Database\Seeder;

class ProjectTableNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CodeProject\Entities\Client::truncate();
        factory(CodeProject\Entities\ProjectNote::class, 50)->create();
    }
}
