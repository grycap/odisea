<?php
use Illuminate\Database\Seeder;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $user = new App\User;

        $user->name = 'testApp';
        $user->email = 'test-android@cuidum.com';
        $user->password = Hash::make('cu1dum');
        $user->save();

    }
}