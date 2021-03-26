<?php

namespace App;

use Faker\Factory;
use Envms\FluentPDO\Query;
use PDO;
use PDOException;

require_once __DIR__.'/../vendor/autoload.php';

try {
    $pdo = new PDO("mysql:dbname=laravel", 'homestead', 'secret', [PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"]);
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

$fluent = new Query($pdo);
$faker = Factory::create('zh_CN');

// 生成用户
for ($x = 0; $x <= 10000; $x++) {
    $user = ['name' => $faker->name , 'email' =>  $faker->email, 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'];
    $fluent->insertInto('users')->values($user)->execute();
    $id = $pdo->lastInsertId();

    // 用户附加信息
    $userProfile = [
        'user_id' => $id,
        'age' => $faker->numberBetween(18, 50),
        'sex' => $faker->numberBetween(1, 2),
        'province' => $faker->state,
        'city' => $faker->city,
        'district' => $faker->area
    ];
    $fluent->insertInto('user_profiles')->values($userProfile)->execute();
    echo $user['name'].'   生成'.PHP_EOL;
}

// 生成公司
for ($i = 0; $i <= 10; $i++) {
    $grades = [
        'name' => $faker->company
    ];
    $fluent->insertInto('grades')->values($grades)->execute();
    echo $grades['name'].'  生成'.PHP_EOL;
}

$fluent->close();