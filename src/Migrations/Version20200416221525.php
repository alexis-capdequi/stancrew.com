<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416221525 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CDB631FB5');
        $this->addSql('DROP TABLE categorie_videos');
        $this->addSql('DROP INDEX IDX_7CC7DA2CDB631FB5 ON video');
        $this->addSql('ALTER TABLE video ADD categorie_videos LONGTEXT DEFAULT NULL, DROP categorie_videos_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie_videos (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE video ADD categorie_videos_id INT DEFAULT NULL, DROP categorie_videos');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CDB631FB5 FOREIGN KEY (categorie_videos_id) REFERENCES categorie_videos (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2CDB631FB5 ON video (categorie_videos_id)');
    }
}
