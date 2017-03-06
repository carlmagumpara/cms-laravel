<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->firstname = "Carl Anthony";
        $user->lastname = "Magumpara";
        $user->bio = "Pogi Lang Po ako";
        $user->email = "magumparacarlanthony@gmail.com";
        $user->password = crypt("09071995","");
        $user->save();
    }
}
