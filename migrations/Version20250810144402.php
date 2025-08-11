<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250810144402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE formations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE formations (id INT NOT NULL, titre VARCHAR(255) NOT NULL, objectifs TEXT DEFAULT NULL, modalite VARCHAR(255) DEFAULT NULL, duree_heures INT DEFAULT NULL, cas_pratiques INT DEFAULT NULL, test_validation BOOLEAN NOT NULL, prix NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, datenaissance DATE NOT NULL, diplome VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('ALTER TABLE utilisateur ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE utilisateur ALTER username SET NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER password SET NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER nom SET NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER nom TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE utilisateur ALTER prenom SET NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER prenom TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE utilisateur ALTER datenaissance SET NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3F85E0677 ON utilisateur (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE formations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP TABLE formations');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3F85E0677');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3E7927C74');
        $this->addSql('CREATE SEQUENCE utilisateur_id_seq');
        $this->addSql('SELECT setval(\'utilisateur_id_seq\', (SELECT MAX(id) FROM utilisateur))');
        $this->addSql('ALTER TABLE utilisateur ALTER id SET DEFAULT nextval(\'utilisateur_id_seq\')');
        $this->addSql('ALTER TABLE utilisateur ALTER username DROP NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER password DROP NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER nom DROP NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER nom TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE utilisateur ALTER prenom DROP NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ALTER prenom TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE utilisateur ALTER datenaissance DROP NOT NULL');
    }
}
