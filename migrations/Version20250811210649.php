<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250811210649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
         $this->addSql('CREATE TABLE service (
            id SERIAL PRIMARY KEY,
            titre VARCHAR(255) NOT NULL,
            photo VARCHAR(255) DEFAULT NULL,
            description TEXT DEFAULT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            user_id INT NOT NULL
        )');

        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_SERVICE_USER FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        // Table Matiere
        $this->addSql('CREATE TABLE matiere (
            id SERIAL PRIMARY KEY,
            nom VARCHAR(255) NOT NULL,
            description TEXT DEFAULT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            user_id INT NOT NULL
        )');

        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_MATIERE_USER FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
  
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
 $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE matiere');
    }
}
