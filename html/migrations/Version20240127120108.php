<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240127120108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE api_keys_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE api_keys (id INT NOT NULL, api_user_id UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9579321F4A50A7F2 ON api_keys (api_user_id)');
        $this->addSql('COMMENT ON COLUMN api_keys.api_user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE api_keys ADD CONSTRAINT FK_9579321F4A50A7F2 FOREIGN KEY (api_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE api_keys_id_seq CASCADE');
        $this->addSql('ALTER TABLE api_keys DROP CONSTRAINT FK_9579321F4A50A7F2');
        $this->addSql('DROP TABLE api_keys');
    }
}
