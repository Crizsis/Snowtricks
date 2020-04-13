<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200407212642 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trick ADD img_docs LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD video_docs LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD slug_name VARCHAR(55) NOT NULL, DROP cover, DROP images');
        $this->addSql('ALTER TABLE user ADD nick_name VARCHAR(50) NOT NULL, ADD reset_token VARCHAR(255) DEFAULT NULL, ADD picture TINYTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trick ADD cover VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD images LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', DROP img_docs, DROP video_docs, DROP slug_name');
        $this->addSql('ALTER TABLE user DROP nick_name, DROP reset_token, DROP picture');
    }
}
