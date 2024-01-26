<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119104117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE state_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE state_relation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE state (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A393D2FB5E237E06 ON state (name)');
        $this->addSql('CREATE TABLE state_relation (id INT NOT NULL, previous_state_id INT NOT NULL, next_state_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5D7A21EE1A3324C5 ON state_relation (previous_state_id)');
        $this->addSql('CREATE INDEX IDX_5D7A21EE3DC2702F ON state_relation (next_state_id)');
        $this->addSql('ALTER TABLE state_relation ADD CONSTRAINT FK_5D7A21EE1A3324C5 FOREIGN KEY (previous_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE state_relation ADD CONSTRAINT FK_5D7A21EE3DC2702F FOREIGN KEY (next_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD state_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB255D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_527EDB255D83CC1 ON task (state_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB255D83CC1');
        $this->addSql('DROP SEQUENCE state_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE state_relation_id_seq CASCADE');
        $this->addSql('ALTER TABLE state_relation DROP CONSTRAINT FK_5D7A21EE1A3324C5');
        $this->addSql('ALTER TABLE state_relation DROP CONSTRAINT FK_5D7A21EE3DC2702F');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE state_relation');
        $this->addSql('DROP INDEX IDX_527EDB255D83CC1');
        $this->addSql('ALTER TABLE task DROP state_id');
    }
}
