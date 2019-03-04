<?php
use Migrations\AbstractMigration;

class AddShortDescription extends AbstractMigration
{

    public function up()
    {
        $this->table('questions')
            ->changeColumn('questions', 'string', [
                'null' => false, 'length' => 1024,
            ])
            ->addColumn('short_description', 'string', [
                'null' => false, 'length' => 50,
                'after' => 'questions',
            ])
            ->addColumn('pivot_type', 'integer', [
                'null' => true,
                'after' => 'short_description',
            ])
            ->update();
    }

    public function down()
    {

        $this->table('questions')
            ->changeColumn('questions', 'string', [
                'null' => false, 'length' => 255,
            ])
            ->removeColumn('short_description')
            ->removeColumn('pivot_type')
            ->update();
    }
}
