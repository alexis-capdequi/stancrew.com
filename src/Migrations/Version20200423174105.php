<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200423174105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, publication_date DATETIME NOT NULL, comment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE music (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, publication_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE musique');
        $this->addSql('DROP TABLE photo');
        $this->addSql('ALTER TABLE concert ADD title VARCHAR(255) NOT NULL, ADD adress VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD postcodes VARCHAR(255) NOT NULL, DROP titre, DROP adresse, DROP ville, DROP code_postal, CHANGE lien_reservation reservation_link VARCHAR(255) DEFAULT NULL, CHANGE commentaire comment LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE mail ADD object VARCHAR(255) NOT NULL, ADD sender VARCHAR(255) NOT NULL, DROP objet, DROP mail_expediteur, CHANGE telephone_expediteur phone INT DEFAULT NULL, CHANGE date_envoi sending_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE video ADD title VARCHAR(255) NOT NULL, ADD link VARCHAR(255) NOT NULL, DROP titre, DROP lien, CHANGE date_publication publication_date DATETIME NOT NULL, CHANGE categorie_videos type LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE musique (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_publication DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_publication DATETIME NOT NULL, commentaire LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE music');
        $this->addSql('ALTER TABLE concert ADD titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD ville VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD code_postal INT NOT NULL, DROP title, DROP adress, DROP city, DROP postcodes, CHANGE reservation_link lien_reservation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE comment commentaire LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mail ADD objet VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mail_expediteur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP object, DROP sender, CHANGE phone telephone_expediteur INT DEFAULT NULL, CHANGE sending_date date_envoi DATETIME NOT NULL');
        $this->addSql('ALTER TABLE video ADD titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD lien VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP title, DROP link, CHANGE publication_date date_publication DATETIME NOT NULL, CHANGE type categorie_videos LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
