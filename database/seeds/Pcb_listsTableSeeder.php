<?php

use Illuminate\Database\Seeder;

class Pcb_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Pcb_list::class, 50)->create();
    }
}
