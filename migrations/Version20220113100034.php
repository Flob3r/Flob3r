<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113100034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_90A8BACBFF52FC51');
        $this->addSql('DROP INDEX IDX_90A8BACBAB9A1716');
        $this->addSql('CREATE TEMPORARY TABLE __temp__calendrier_intervenant AS SELECT calendrier_id, intervenant_id FROM calendrier_intervenant');
        $this->addSql('DROP TABLE calendrier_intervenant');
        $this->addSql('CREATE TABLE calendrier_intervenant (calendrier_id INTEGER NOT NULL, intervenant_id INTEGER NOT NULL, PRIMARY KEY(calendrier_id, intervenant_id), CONSTRAINT FK_90A8BACBFF52FC51 FOREIGN KEY (calendrier_id) REFERENCES calendrier (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_90A8BACBAB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO calendrier_intervenant (calendrier_id, intervenant_id) SELECT calendrier_id, intervenant_id FROM __temp__calendrier_intervenant');
        $this->addSql('DROP TABLE __temp__calendrier_intervenant');
        $this->addSql('CREATE INDEX IDX_90A8BACBFF52FC51 ON calendrier_intervenant (calendrier_id)');
        $this->addSql('CREATE INDEX IDX_90A8BACBAB9A1716 ON calendrier_intervenant (intervenant_id)');
        $this->addSql('DROP INDEX IDX_73CE739BFF52FC51');
        $this->addSql('DROP INDEX IDX_73CE739BF46CD258');
        $this->addSql('CREATE TEMPORARY TABLE __temp__calendrier_matiere AS SELECT calendrier_id, matiere_id FROM calendrier_matiere');
        $this->addSql('DROP TABLE calendrier_matiere');
        $this->addSql('CREATE TABLE calendrier_matiere (calendrier_id INTEGER NOT NULL, matiere_id INTEGER NOT NULL, PRIMARY KEY(calendrier_id, matiere_id), CONSTRAINT FK_73CE739BFF52FC51 FOREIGN KEY (calendrier_id) REFERENCES calendrier (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_73CE739BF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO calendrier_matiere (calendrier_id, matiere_id) SELECT calendrier_id, matiere_id FROM __temp__calendrier_matiere');
        $this->addSql('DROP TABLE __temp__calendrier_matiere');
        $this->addSql('CREATE INDEX IDX_73CE739BFF52FC51 ON calendrier_matiere (calendrier_id)');
        $this->addSql('CREATE INDEX IDX_73CE739BF46CD258 ON calendrier_matiere (matiere_id)');
        $this->addSql('DROP INDEX IDX_9014574ADE94FEFF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id, fk_intervenant_id, intitule, duree FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_intervenant_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL COLLATE BINARY, duree INTEGER NOT NULL, CONSTRAINT FK_9014574ADE94FEFF FOREIGN KEY (fk_intervenant_id) REFERENCES intervenant (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO matiere (id, fk_intervenant_id, intitule, duree) SELECT id, fk_intervenant_id, intitule, duree FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
        $this->addSql('CREATE INDEX IDX_9014574ADE94FEFF ON matiere (fk_intervenant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_90A8BACBFF52FC51');
        $this->addSql('DROP INDEX IDX_90A8BACBAB9A1716');
        $this->addSql('CREATE TEMPORARY TABLE __temp__calendrier_intervenant AS SELECT calendrier_id, intervenant_id FROM calendrier_intervenant');
        $this->addSql('DROP TABLE calendrier_intervenant');
        $this->addSql('CREATE TABLE calendrier_intervenant (calendrier_id INTEGER NOT NULL, intervenant_id INTEGER NOT NULL, PRIMARY KEY(calendrier_id, intervenant_id))');
        $this->addSql('INSERT INTO calendrier_intervenant (calendrier_id, intervenant_id) SELECT calendrier_id, intervenant_id FROM __temp__calendrier_intervenant');
        $this->addSql('DROP TABLE __temp__calendrier_intervenant');
        $this->addSql('CREATE INDEX IDX_90A8BACBFF52FC51 ON calendrier_intervenant (calendrier_id)');
        $this->addSql('CREATE INDEX IDX_90A8BACBAB9A1716 ON calendrier_intervenant (intervenant_id)');
        $this->addSql('DROP INDEX IDX_73CE739BFF52FC51');
        $this->addSql('DROP INDEX IDX_73CE739BF46CD258');
        $this->addSql('CREATE TEMPORARY TABLE __temp__calendrier_matiere AS SELECT calendrier_id, matiere_id FROM calendrier_matiere');
        $this->addSql('DROP TABLE calendrier_matiere');
        $this->addSql('CREATE TABLE calendrier_matiere (calendrier_id INTEGER NOT NULL, matiere_id INTEGER NOT NULL, PRIMARY KEY(calendrier_id, matiere_id))');
        $this->addSql('INSERT INTO calendrier_matiere (calendrier_id, matiere_id) SELECT calendrier_id, matiere_id FROM __temp__calendrier_matiere');
        $this->addSql('DROP TABLE __temp__calendrier_matiere');
        $this->addSql('CREATE INDEX IDX_73CE739BFF52FC51 ON calendrier_matiere (calendrier_id)');
        $this->addSql('CREATE INDEX IDX_73CE739BF46CD258 ON calendrier_matiere (matiere_id)');
        $this->addSql('DROP INDEX IDX_9014574ADE94FEFF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id, fk_intervenant_id, intitule, duree FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fk_intervenant_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, duree INTEGER NOT NULL)');
        $this->addSql('INSERT INTO matiere (id, fk_intervenant_id, intitule, duree) SELECT id, fk_intervenant_id, intitule, duree FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
        $this->addSql('CREATE INDEX IDX_9014574ADE94FEFF ON matiere (fk_intervenant_id)');
    }
}
