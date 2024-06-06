<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'ti@limaocravo.net')->first()){
            User::create([
                'name'=> 'Jessica',
                'email' => 'ti@limaocravo.net',
                'password' => Hash::make('12345a',['rounds' => 12]),
            ]);


        }
        if(!User::where('email', 'alessandro@limaocravo.net')->first()){
            User::create([
                'name'=> 'Alessandro',
                'email' => 'alessandro@limaocravo.net',
                'password' => Hash::make('12345a',['rounds' => 12]),
            ]);


        }
        if(!User::where('email', 'bruno@bfervilha.com.br')->first()){
            User::create([
                'name'=> 'Bruno',
                'email' => 'bruno@bfervilha.com.br',
                'password' => Hash::make('12345a',['rounds' => 12]),
            ]);


        }
        if(!User::where('email', 'junior@limaocravo.net')->first()){
            User::create([
                'name'=> 'Junior',
                'email' => 'junior@limaocravo.net',
                'password' => Hash::make('12345a',['rounds' => 12]),
            ]);


        }
    }
}
