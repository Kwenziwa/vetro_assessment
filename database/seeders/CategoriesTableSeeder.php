<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->delete();

        $categories = [
            ['id' => 1, 'name' => 'Finance','created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Sports','created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Business','created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'WordPress','created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Books','created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Tech','created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Music','created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Cars','created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Movies','created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Games','created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Current Events','created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Entertainment','created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'Fashion','created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Lifestyle','created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'DIY','created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'name' => 'Politics','created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'Parenting','created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'Pets','created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'name' => 'Fitness','created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'name' => 'Moms','created_at' => now(), 'updated_at' => now()],
        ];

        Category::insert($categories);
    }
}
