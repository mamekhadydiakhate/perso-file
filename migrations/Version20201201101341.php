<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201101341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT NOT NULL, profil_sorti_id INT DEFAULT NULL, INDEX IDX_32EB52E8B37C4ED5 (profil_sorti_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apprenants (id INT NOT NULL, statut VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cm (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8B37C4ED5 FOREIGN KEY (profil_sorti_id) REFERENCES profil_sorti (id)');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenants ADD CONSTRAINT FK_C71C2982BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cm ADD CONSTRAINT FK_3C0A377EBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formateur ADD CONSTRAINT FK_ED767E4FBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE administrateur_promos ADD CONSTRAINT FK_BCCD97EE7EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formateur_groupe ADD CONSTRAINT FK_2C668E09155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupecompetence ADD CONSTRAINT FK_89DC1A55298C354B FOREIGN KEY (gerer_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE user ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur_promos DROP FOREIGN KEY FK_BCCD97EE7EE5403C');
        $this->addSql('ALTER TABLE groupecompetence DROP FOREIGN KEY FK_89DC1A55298C354B');
        $this->addSql('ALTER TABLE formateur_groupe DROP FOREIGN KEY FK_2C668E09155D8F51');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE apprenants');
        $this->addSql('DROP TABLE cm');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('ALTER TABLE user DROP type');
    }
}
