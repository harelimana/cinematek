<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180611182850 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, films_id INT DEFAULT NULL, nom VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_835033F8939610EE (films_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, acteurs_id INT DEFAULT NULL, genres_id INT DEFAULT NULL, affiche_id INT NOT NULL, titre VARCHAR(100) NOT NULL, resume LONGTEXT DEFAULT NULL, date_sortie DATETIME DEFAULT NULL, production VARCHAR(45) NOT NULL, realisateur VARCHAR(45) DEFAULT NULL, INDEX IDX_8244BE2271A27AFC (acteurs_id), INDEX IDX_8244BE226A3B2603 (genres_id), UNIQUE INDEX UNIQ_8244BE2248A60577 (affiche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) DEFAULT NULL, date_naissance DATETIME DEFAULT NULL, date_deces DATETIME DEFAULT NULL, image VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affiche (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(45) NOT NULL, image VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F8939610EE FOREIGN KEY (films_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2271A27AFC FOREIGN KEY (acteurs_id) REFERENCES acteur (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE226A3B2603 FOREIGN KEY (genres_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2248A60577 FOREIGN KEY (affiche_id) REFERENCES affiche (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE226A3B2603');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F8939610EE');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE2271A27AFC');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE2248A60577');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE acteur');
        $this->addSql('DROP TABLE affiche');
    }
}
