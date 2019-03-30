<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 1;$i <= 10;$i++){
        App\ToDos::create([
          'description' => str_random(42),
          'user_id' => 1,
        ]);
      }

      for ($i = 1;$i <= 10;$i++){
        App\ToDos::create([
          'description' => str_random(42),
          'user_id' => 2,
        ]);
      }

      for ($i = 1;$i <= 10;$i++){
        App\ToDos::create([
          'description' => str_random(42),
          'user_id' => 3,
        ]);
      }

      for ($i = 1;$i <= 10;$i++){
        App\ToDos::create([
          'description' => str_random(42),
          'user_id' => 4,
        ]);
      }
    }
}
