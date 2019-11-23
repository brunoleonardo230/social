<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::firstOrCreate(['email'=>'admin@admin.com'],[
            'name' => 'Administrador',
            'cpf' => '12345678900',
            'address' => 'Rua 1, Casa 1, São Luis - Ma',
            'password' => bcrypt('123456'),
            'active' => 1,
        ]);

        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->saveMany(factory(App\Post::class, 2)->make());
        });
    }
}
