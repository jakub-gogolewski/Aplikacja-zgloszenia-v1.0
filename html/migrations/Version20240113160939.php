<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240113160939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE task_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE task (id INT NOT NULL, creator_id UUID NOT NULL, assigned_id UUID DEFAULT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(4096) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_527EDB2561220EA6 ON task (creator_id)');
        $this->addSql('CREATE INDEX IDX_527EDB25E1501A05 ON task (assigned_id)');
        $this->addSql('COMMENT ON COLUMN task.creator_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN task.assigned_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2561220EA6 FOREIGN KEY (creator_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25E1501A05 FOREIGN KEY (assigned_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE task_id_seq CASCADE');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB2561220EA6');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25E1501A05');
        $this->addSql('DROP TABLE task');
    }
}
