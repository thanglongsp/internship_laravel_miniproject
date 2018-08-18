<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     	//$this->call(slideSeeder::class);
     	//$this->call(userSeeder::class);
     	//$this->call(matchSeeder::class);
    	$this->call(billSeeder::class);
    }
}

/**
* 
*/
class slideSeeder extends Seeder
{
	public function run(){
		DB::table('slide')->insert([
			['id'=>1,'banner'=>'banner1.jpg'],
			['id'=>2,'banner'=>'banner2.jpg'],
			['id'=>3,'banner'=>'banner3.jpg'],
			['id'=>4,'banner'=>'banner4.jpg']
		]);
	}
}

class userSeeder extends Seeder
{
	public function run(){
		DB::table('users')->insert([
			['id'=>1,'name'=>'thanglong1','password'=>bcrypt('thanglong1'),'email'=>'thanglong1@gmail.com','role'=>2,'apc'=>5000],
			['id'=>2,'name'=>'thanglong2','password'=>bcrypt('thanglong2'),'email'=>'thanglong2@gmail.com','role'=>1,'apc'=>5000],
			['id'=>3,'name'=>'thanglong3','password'=>bcrypt('thanglong3'),'email'=>'thanglong3@gmail.com','role'=>1,'apc'=>5000],
			['id'=>4,'name'=>'thanglong4','password'=>bcrypt('thanglong4'),'email'=>'thanglong4@gmail.com','role'=>1,'apc'=>5000]
		]);
	}
}

class matchSeeder extends Seeder
{
	public function run(){
		DB::table('matches')->insert([
			['id'=>1,'team1'=>'Uruguay','team2'=>'Phap','banner'=>'banner1.jpg','start_time'=>'2018-07-4 06:00:00','end_time'=>'2018-07-4 17:00:00','time_play'=>'2018-07-4 21:00:00','ratio_1_win'=>3,'ratio_1_lose'=>2,'ratio_equal'=>1,'status'=>1],
			['id'=>2,'team1'=>'Brazil','team2'=>'Bi','banner'=>'banner2.jpg','start_time'=>'2018-07-5 06:00:00','end_time'=>'2018-07-4 17:00:00','time_play'=>'2018-07-4 21:00:00','ratio_1_win'=>3,'ratio_1_lose'=>2,'ratio_equal'=>1,'status'=>0],
			['id'=>3,'team1'=>'Thuy Dien','team2'=>'Anh','banner'=>'banner3.jpg','start_time'=>'2018-07-6 06:00:00','end_time'=>'2018-07-4 17:00:00','time'=>'2018-07-4 21:00:00','ratio_1_win'=>3,'ratio_1_lose'=>2,'ratio_equal'=>1,'status'=>0],
			['id'=>4,'team1'=>'Nga','team2'=>'Croatia','banner'=>'banner4.jpg','start_time'=>'2018-07-7 06:00:00','end_time'=>'2018-07-4 17:00:00','time'=>'2018-07-4 21:00:00','ratio_1_win'=>3,'ratio_1_lose'=>2,'ratio_equal'=>1,'status'=>0]
		]);
	}
}

class billSeeder extends Seeder
{
	public function run(){
		DB::table('bills')->insert([
			['id'=>1,'match_id'=>1,'user_id'=>1,'bets'=>100,'result'=>0],
			['id'=>2,'match_id'=>1,'user_id'=>2,'bets'=>100,'result'=>1],
			['id'=>3,'match_id'=>1,'user_id'=>3,'bets'=>100,'result'=>0],
			['id'=>4,'match_id'=>1,'user_id'=>4,'bets'=>100,'result'=>2]

		]);
	}
}