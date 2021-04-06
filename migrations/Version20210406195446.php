<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406195446 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX search_slug ON article');
        $this->addSql('ALTER TABLE article CHANGE publication_date publication_date DATETIME NOT NULL');
        $this->addSql('CREATE INDEX search_slug ON article (slug)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX search_slug ON article');
        $this->addSql('ALTER TABLE article CHANGE publication_date publication_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE INDEX search_slug ON article (slug(768))');
    }
}
