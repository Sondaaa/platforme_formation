<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250813113240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE training_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE matiere_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE piece_joint_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE piece_joint (id INT NOT NULL, id_formation INT NOT NULL, titre VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, fichier VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8F46FD6CC0759D98 ON piece_joint (id_formation)');
        $this->addSql('ALTER TABLE piece_joint ADD CONSTRAINT FK_8F46FD6CC0759D98C0759D98 FOREIGN KEY (id_formation) REFERENCES formations (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('ALTER TABLE formations ALTER photo TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE formations ALTER video TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE service ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE service ALTER updated_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN service.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN service.updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE piece_joint_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE training_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE matiere_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, datenaissance DATE NOT NULL, diplome VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d649e7927c74 ON "user" (email)');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d649f85e0677 ON "user" (username)');
        $this->addSql('CREATE TABLE training (id INT NOT NULL, titre VARCHAR(255) NOT NULL, objectifs TEXT DEFAULT NULL, modalite VARCHAR(255) DEFAULT NULL, duree_heures INT DEFAULT NULL, cas_pratiques INT DEFAULT NULL, test_validation BOOLEAN DEFAULT NULL, prix NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE matiere (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE piece_joint DROP CONSTRAINT FK_8F46FD6CC0759D98C0759D98');
        $this->addSql('DROP TABLE piece_joint');
        $this->addSql('CREATE SEQUENCE service_id_seq');
        $this->addSql('SELECT setval(\'service_id_seq\', (SELECT MAX(id) FROM service))');
        $this->addSql('ALTER TABLE service ALTER id SET DEFAULT nextval(\'service_id_seq\')');
        $this->addSql('ALTER TABLE service ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE service ALTER updated_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN service.created_at IS NULL');
        $this->addSql('COMMENT ON COLUMN service.updated_at IS NULL');
        $this->addSql('ALTER TABLE formations ALTER photo TYPE TEXT');
        $this->addSql('ALTER TABLE formations ALTER video TYPE TEXT');
    }
}
