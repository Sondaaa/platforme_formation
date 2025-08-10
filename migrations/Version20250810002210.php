<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250810002210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create utilisateur table with username, email, roles, password, isActive, nom, prenom, datenaissance, diplome';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE utilisateur (
    id SERIAL NOT NULL,
    username VARCHAR(180) DEFAULT NULL,
    email VARCHAR(255) NOT NULL,
    roles JSON NOT NULL,
    password VARCHAR(255) DEFAULT NULL,
    is_active BOOLEAN NOT NULL,
    nom VARCHAR(255) DEFAULT NULL,
    prenom VARCHAR(255) DEFAULT NULL,
    datenaissance DATE DEFAULT NULL,
    diplome VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY(id)
)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE utilisateur');
    }
}
