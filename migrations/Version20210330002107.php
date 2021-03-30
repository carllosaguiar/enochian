<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330002107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabala ADD birth_cabal INT NOT NULL, ADD tonic_day INT NOT NULL, ADD event_day INT NOT NULL, DROP year_of_birth_cabal, DROP tonic_of_the_day, DROP event_of_the_day');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabala ADD year_of_birth_cabal INT NOT NULL, ADD tonic_of_the_day INT NOT NULL, ADD event_of_the_day INT NOT NULL, DROP birth_cabal, DROP tonic_day, DROP event_day');
    }
}
