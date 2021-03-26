<?php


use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Factory::create('zh_CN');
        $data = [];
        for ($i = 0; $i < 100000; $i++) {
            $data[] = [
                'name'     => $faker->name,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'email'    => $faker->email,
                'created'  => date('Y-m-d H:i:s'),
            ];
        }
        $this->insert('users', $data);
    }
}
