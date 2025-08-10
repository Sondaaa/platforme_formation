<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250809222858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE societe ALTER adresse DROP NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER contact DROP NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER fax DROP NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER email DROP NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER logo DROP NOT NULL');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE societe ALTER adresse SET NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER contact SET NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER fax SET NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER email SET NOT NULL');
    $this->addSql('ALTER TABLE societe ALTER logo SET NOT NULL');
    }
}
