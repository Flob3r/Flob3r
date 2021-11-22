<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122140513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendrier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_cours VARCHAR(255) NOT NULL, date_start DATE NOT NULL, time_start TIME NOT NULL, date_end DATE NOT NULL, time_end TIME NOT NULL)');
        $this->addSql('CREATE TABLE calendrier_intervenant (calendrier_id INTEGER NOT NULL, intervenant_id INTEGER NOT NULL, PRIMARY KEY(calendrier_id, intervenant_id))');
        $this->addSql('CREATE INDEX IDX_90A8BACBFF52FC51 ON calendrier_intervenant (calendrier_id)');
        $this->addSql('CREATE INDEX IDX_90A8BACBAB9A1716 ON calendrier_intervenant (intervenant_id)');
        $this->addSql('CREATE TABLE calendrier_matiere (calendrier_id INTEGER NOT NULL, matiere_id INTEGER NOT NULL, PRIMARY KEY(calendrier_id, matiere_id))');
        $this->addSql('CREATE INDEX IDX_73CE739BFF52FC51 ON calendrier_matiere (calendrier_id)');
        $this->addSql('CREATE INDEX IDX_73CE739BF46CD258 ON calendrier_matiere (matiere_id)');
        $this->addSql('CREATE TABLE intervenant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, specialite VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_intervenant_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, duree INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_9014574ADE94FEFF ON matiere (fk_intervenant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE calendrier');
        $this->addSql('DROP TABLE calendrier_intervenant');
        $this->addSql('DROP TABLE calendrier_matiere');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('DROP TABLE matiere');
    }
}
