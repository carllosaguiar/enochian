<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312155353 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arcane (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image LONGBLOB NOT NULL, description VARCHAR(255) NOT NULL, letter VARCHAR(255) NOT NULL, spiritual_plane VARCHAR(255) NOT NULL, mental_plane VARCHAR(255) NOT NULL, physical_plane VARCHAR(255) NOT NULL, transcendent_axiom VARCHAR(255) NOT NULL, astrological_association VARCHAR(255) NOT NULL, in_general VARCHAR(255) NOT NULL, `right` VARCHAR(255) NOT NULL, reverse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE arcane');
    }
}
