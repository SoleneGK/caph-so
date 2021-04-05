<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405195309 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO user(email, roles, password) VALUES ('solene.garda.krebs@gmail.com', '[\"ROLE_ADMIN\1]', '\$argon2id\$v=19\$m=65536,t=4,p=1\$U2NoVlJDeGtYdkQ1MVQzZQ\$K9QMU7AocYwr+Qftq7P7RF/gICbNIQiRBtOkoLy6jAw')");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql("DELETE FROM user WHERE email='solene.garda.krebs@gmail.com'");
    }
}
