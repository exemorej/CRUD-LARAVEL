<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use App\Models\Record;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::create([
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'johndoe@gmail.com'
        ]);

        Record::create([
            'fname' => 'Jane',
            'lname' => 'Doe',
            'email' => 'janedoe@gmail.com'
        ]);
    }
}
