<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190404175607 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add a description field to the task table';
    }

    public function up(Schema $schema) : void
    {
        // add a description field
        $table = $schema->getTable('task');
        $table->addColumn('description', 'string', [ 'length' => 255, 'notnull' => false ]);
    }

    public function down(Schema $schema) : void
    {
        // drop description field
        $table = $schema->getTable('task');
        $table->dropColumn('description');
    }
}
