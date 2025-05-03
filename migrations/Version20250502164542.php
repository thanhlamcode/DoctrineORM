<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250502164542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE attendance_record (id SERIAL NOT NULL, pos_id INT DEFAULT NULL, timestamp TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_311E849541085FAE ON attendance_record (pos_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE attendance_record ADD CONSTRAINT FK_311E849541085FAE FOREIGN KEY (pos_id) REFERENCES pos (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE attendance_record DROP CONSTRAINT FK_311E849541085FAE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE attendance_record
        SQL);
    }
}
