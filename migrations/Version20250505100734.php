<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250505100734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user DROP CONSTRAINT fk_332ca4dd38c751c4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user DROP CONSTRAINT fk_332ca4dda76ed395
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE role_user
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE role_user (roles_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(roles_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_332ca4dda76ed395 ON role_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_332ca4dd38c751c4 ON role_user (roles_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user ADD CONSTRAINT fk_332ca4dd38c751c4 FOREIGN KEY (roles_id) REFERENCES roles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user ADD CONSTRAINT fk_332ca4dda76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }
}
