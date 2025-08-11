<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250811225843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE formations ADD COLUMN photo TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE formations ADD COLUMN video TEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE formations ADD COLUMN photo TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE formations ADD COLUMN video TEXT DEFAULT NULL');
    }
}
