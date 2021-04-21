<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210420190001 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabala CHANGE birth_cabala birth_cabala LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE inner_urgency inner_urgency INT DEFAULT NULL, CHANGE fundamental_tonic fundamental_tonic INT DEFAULT NULL, CHANGE tonic_day tonic_day INT DEFAULT NULL, CHANGE event_day event_day INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabala CHANGE birth_cabala birth_cabala LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE inner_urgency inner_urgency INT NOT NULL, CHANGE fundamental_tonic fundamental_tonic INT NOT NULL, CHANGE tonic_day tonic_day INT NOT NULL, CHANGE event_day event_day INT NOT NULL');
    }
}
