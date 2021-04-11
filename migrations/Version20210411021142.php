<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411021142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabala ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabala ADD CONSTRAINT FK_B0376950A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B0376950A76ED395 ON cabala (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabala DROP FOREIGN KEY FK_B0376950A76ED395');
        $this->addSql('DROP INDEX UNIQ_B0376950A76ED395 ON cabala');
        $this->addSql('ALTER TABLE cabala DROP user_id');
    }
}
