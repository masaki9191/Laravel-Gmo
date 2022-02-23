<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'type' => 0,
            'username' => 'admin',
            'name' => "admin",
            'furigana' => "admin",
            'address' => "admin",
            'postalcode' => "admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('admin12345'),
        ]);
        User::create([
            'type' => 0,
            'username' => 'admin1',
            'name' => "admin1",
            'furigana' => "admin1",
            'address' => "admin",
            'postalcode' => "admin",
            'email' => "admin1@admin.com",
            'password' => bcrypt('admin12345'),
            'introducer_id' => 1
        ]);
        User::create([
            'type' => 0,
            'username' => 'admin2',
            'name' => "admin2",
            'furigana' => "admin2",
            'address' => "admin",
            'postalcode' => "admin",
            'email' => "admin2@admin.com",
            'password' => bcrypt('admin12345'),
            'introducer_id' => 1
        ]);
        User::create([
            'type' => 0,
            'username' => 'admin3',
            'name' => "admin3",
            'furigana' => "admin3",
            'address' => "admin",
            'postalcode' => "admin",
            'email' => "admin3@admin.com",
            'password' => bcrypt('admin12345'),
            'introducer_id' => 1
        ]);

        $vals = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k" ];
        for ($i=0; $i <count($vals) ; $i++) { 
            $val = $vals[$i];
            User::create([
                'type' => 1,
                'username' =>  $val,
                'name' =>  $val,
                'furigana' =>  $val,
                'address' =>  $val,
                'postalcode' =>  $val,
                'email' => $val.$val.$val."@".$val.$val.$val.".com",
                'password' => bcrypt($val.$val.$val.$val.'1111'),
                'introducer_id' => 2
            ]);
        }

    }
}
