<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124141628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE apprenants ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cm ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE formateur ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD profils_id INT DEFAULT NULL, ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3B9881AFB FOREIGN KEY (profils_id) REFERENCES profils (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3B9881AFB ON utilisateur (profils_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur DROP relation');
        $this->addSql('ALTER TABLE apprenants DROP relation');
        $this->addSql('ALTER TABLE cm DROP relation');
        $this->addSql('ALTER TABLE formateur DROP relation');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3B9881AFB');
        $this->addSql('DROP INDEX IDX_1D1C63B3B9881AFB ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP profils_id, DROP relation');
    }
}
