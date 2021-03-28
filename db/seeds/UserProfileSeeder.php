<?php


use Faker\Factory;
use Phinx\Seed\AbstractSeed;

class UserProfileSeeder extends AbstractSeed
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
        // count 条数
//        $fetch = $this->query("select count('*') FROM users");
//
//        $count = $fetch->fetch()[0];
//
//        // 设置每一页 一万条 计算出一共多少页
//        $limit = 100000;
//        $pages = ceil($count/$limit); // 总页数
//
//
        $faker = Factory::create('zh_CN');
        $data = [];
//
//        // 循环页数
//        for ($i = 0; $i <= $pages; $i++ ) {
//            $a = $i * $limit;
//            $users = $this->fetchAll("SELECT id FROM users limit $a, $limit  ");
//            $ids = array_column($users, 'id');
//            foreach ($ids  as $id) {
//                $data[] = [
//                    'user_id'  => $id,
//                    'sex' => $faker->numberBetween(1, 2),
//                    'age'    => $faker->numberBetween(18, 30),
//                    'city'  => $faker->city,
//                ];
//            }
//            $this->insert('user_profiles', $data);
//        }

        $users = $this->fetchAll("SELECT id FROM users");
        $ids = array_column($users, 'id');
        foreach ($ids  as $id) {
            $data[] = [
                'user_id'  => $id,
                'sex' => $faker->numberBetween(1, 2),
                'age'    => $faker->numberBetween(18, 30),
                'city'  => $faker->city,
            ];
        }
        $this->insert('user_profiles', $data);
    }
}
