<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class CreateUserProfiles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('user_profiles');
        $table->addColumn('user_id', 'integer')
              ->addColumn('sex', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'comment' => '性别'])
              ->addColumn('age', 'integer')
              ->addColumn('city', 'string')
              ->create();
    }
}
