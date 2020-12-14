<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203105156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8B37C4ED5');
        $this->addSql('DROP INDEX IDX_32EB52E8B37C4ED5 ON administrateur');
        $this->addSql('ALTER TABLE administrateur DROP profil_sorti_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur ADD profil_sorti_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8B37C4ED5 FOREIGN KEY (profil_sorti_id) REFERENCES profil_sorti (id)');
        $this->addSql('CREATE INDEX IDX_32EB52E8B37C4ED5 ON administrateur (profil_sorti_id)');
    }
}
