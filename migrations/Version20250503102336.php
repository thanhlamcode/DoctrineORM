<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250503102336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE posconfig (id SERIAL NOT NULL, pos_id INT DEFAULT NULL, timezone VARCHAR(255) NOT NULL, is24_hour_format BOOLEAN NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A7A9210541085FAE ON posconfig (pos_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE posconfig ADD CONSTRAINT FK_A7A9210541085FAE FOREIGN KEY (pos_id) REFERENCES pos (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE posconfig DROP CONSTRAINT FK_A7A9210541085FAE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE posconfig
        SQL);
    }
}
