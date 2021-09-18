<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->delete();

        $tags = [
            ['id' => 1, 'name' => 'iOS','created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Soccer','created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Windows','created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'DJs','created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'BBQ','created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'iPhone 13','created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Mountans','created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'BWM','created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Call of Duty','created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Hackers','created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Development','created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Shopping','created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'Groove','created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Money','created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'Savings','created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'name' => 'Votes','created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'Durban','created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'City','created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'name' => 'Healthy','created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'name' => 'Drinks','created_at' => now(), 'updated_at' => now()],
        ];

        Tag::insert($tags);
    }
}
