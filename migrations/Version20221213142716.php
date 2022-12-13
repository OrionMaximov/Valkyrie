<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213142716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bande_d (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, tome VARCHAR(255) NOT NULL, serie INT NOT NULL, isbn BIGINT NOT NULL, quantite INT NOT NULL, tarif DOUBLE PRECISION NOT NULL, etat TINYINT(1) NOT NULL, prix DOUBLE PRECISION NOT NULL, pervers TINYINT(1) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comics (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, tome VARCHAR(255) NOT NULL, serie INT NOT NULL, isbn BIGINT NOT NULL, quantite INT NOT NULL, tarif DOUBLE PRECISION NOT NULL, etat TINYINT(1) NOT NULL, prix DOUBLE PRECISION NOT NULL, pervers TINYINT(1) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bande_d');
        $this->addSql('DROP TABLE comics');
    }
}
