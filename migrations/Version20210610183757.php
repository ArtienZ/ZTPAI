<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610183757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kid ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE kid ADD CONSTRAINT FK_4523887C9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4523887C9D86650F ON kid (user_id_id)');
        $this->addSql('ALTER TABLE therapist ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE therapist ADD CONSTRAINT FK_C3D632F9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C3D632F9D86650F ON therapist (user_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE kid DROP CONSTRAINT FK_4523887C9D86650F');
        $this->addSql('DROP INDEX IDX_4523887C9D86650F');
        $this->addSql('ALTER TABLE kid DROP user_id_id');
        $this->addSql('ALTER TABLE therapist DROP CONSTRAINT FK_C3D632F9D86650F');
        $this->addSql('DROP INDEX UNIQ_C3D632F9D86650F');
        $this->addSql('ALTER TABLE therapist DROP user_id_id');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74');
    }
}
