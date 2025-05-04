<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250503144857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE roles (id SERIAL NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE role_user (roles_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(roles_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_332CA4DD38C751C4 ON role_user (roles_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_332CA4DDA76ED395 ON role_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DD38C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" ADD roles_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" ADD CONSTRAINT FK_8D93D64938C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D93D64938C751C4 ON "user" (roles_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" DROP CONSTRAINT FK_8D93D64938C751C4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user DROP CONSTRAINT FK_332CA4DD38C751C4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE role_user DROP CONSTRAINT FK_332CA4DDA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE roles
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE role_user
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_8D93D64938C751C4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" DROP roles_id
        SQL);
    }
}
