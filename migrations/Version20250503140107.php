<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250503140107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE store (id SERIAL NOT NULL, name INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pos ADD store_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pos ADD CONSTRAINT FK_80D9E6ACB092A811 FOREIGN KEY (store_id) REFERENCES store (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_80D9E6ACB092A811 ON pos (store_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pos DROP CONSTRAINT FK_80D9E6ACB092A811
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE store
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_80D9E6ACB092A811
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE pos DROP store_id
        SQL);
    }
}
