<?php


use Faker\Factory;
use Phinx\Seed\AbstractSeed;

class ShopSeeder extends AbstractSeed
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
        for ($i = 0; $i < 50000 ; $i++) {
            $data[] = [
                'name'     => '我是-'.$faker->name.'-商品',
                'price'   => $faker->randomFloat(2, 2, 100),
                'num' => $faker->numberBetween(1, 50)
            ];
        }
        $this->insert('shops', $data);
    }
}
