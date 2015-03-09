
<?php
use App\User;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder {
	public function run() {
		User::create([
			'isadmin' => 1,
			'cover' => 'http://wecourse.qiniudn.com/640.png',
			'password' => Hash::make('admin'),
			'name' => 'admin',
		]);

		User::create([
			'ispartner' => 1,
			'email' => '376300248@qq.com',
			'password' => Hash::make('admin'),
			'name' => 'witwave',
		]);
	}
}