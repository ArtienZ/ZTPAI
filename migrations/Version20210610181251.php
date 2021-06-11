<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609122005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE exercises_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE kid_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE roles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE therapist_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_exercises_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE exercises (id INT NOT NULL, name VARCHAR(100) NOT NULL, path VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE kid (id INT NOT NULL, therapist VARCHAR(255) DEFAULT NULL, parent_name VARCHAR(100) NOT NULL, parent_surname VARCHAR(100) NOT NULL, diagnosis_files VARCHAR(255) DEFAULT NULL, age VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE roles (id INT NOT NULL, type VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE therapist (id INT NOT NULL, specialization VARCHAR(100) NOT NULL, account_number VARCHAR(255) DEFAULT NULL, hourly_rate VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, name VARCHAR(100) NOT NULL, surname VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone VARCHAR(9) NOT NULL, photo VARCHAR(255) DEFAULT NULL, role INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users_exercises (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users_exercises_user (users_exercises_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(users_exercises_id, user_id))');
        $this->addSql('CREATE INDEX IDX_FB560D6849BE56C6 ON users_exercises_user (users_exercises_id)');
        $this->addSql('CREATE INDEX IDX_FB560D68A76ED395 ON users_exercises_user (user_id)');
        $this->addSql('CREATE TABLE users_exercises_exercises (users_exercises_id INT NOT NULL, exercises_id INT NOT NULL, PRIMARY KEY(users_exercises_id, exercises_id))');
        $this->addSql('CREATE INDEX IDX_EC54FB6649BE56C6 ON users_exercises_exercises (users_exercises_id)');
        $this->addSql('CREATE INDEX IDX_EC54FB661AFA70CA ON users_exercises_exercises (exercises_id)');
        $this->addSql('ALTER TABLE users_exercises_user ADD CONSTRAINT FK_FB560D6849BE56C6 FOREIGN KEY (users_exercises_id) REFERENCES users_exercises (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_exercises_user ADD CONSTRAINT FK_FB560D68A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_exercises_exercises ADD CONSTRAINT FK_EC54FB6649BE56C6 FOREIGN KEY (users_exercises_id) REFERENCES users_exercises (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_exercises_exercises ADD CONSTRAINT FK_EC54FB661AFA70CA FOREIGN KEY (exercises_id) REFERENCES exercises (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users_exercises_exercises DROP CONSTRAINT FK_EC54FB661AFA70CA');
        $this->addSql('ALTER TABLE users_exercises_user DROP CONSTRAINT FK_FB560D68A76ED395');
        $this->addSql('ALTER TABLE users_exercises_user DROP CONSTRAINT FK_FB560D6849BE56C6');
        $this->addSql('ALTER TABLE users_exercises_exercises DROP CONSTRAINT FK_EC54FB6649BE56C6');
        $this->addSql('DROP SEQUENCE exercises_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE kid_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE roles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE therapist_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE users_exercises_id_seq CASCADE');
        $this->addSql('DROP TABLE exercises');
        $this->addSql('DROP TABLE kid');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE therapist');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE users_exercises');
        $this->addSql('DROP TABLE users_exercises_user');
        $this->addSql('DROP TABLE users_exercises_exercises');
    }
}
