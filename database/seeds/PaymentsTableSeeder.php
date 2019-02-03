<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'user_id' => (1),
            'type' => ('card'),
            'total' => (150),
            'currency' => ('USD'),
            'description' => (str_random(50)),
            'created_at' => ('2019-02-04 07:01:02'),

        ]);
    }
}
