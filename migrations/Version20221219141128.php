<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221219141128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panier_mangas (panier_id INT NOT NULL, mangas_id INT NOT NULL, INDEX IDX_37882631F77D927C (panier_id), INDEX IDX_37882631DDC4978F (mangas_id), PRIMARY KEY(panier_id, mangas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panier_mangas ADD CONSTRAINT FK_37882631F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_mangas ADD CONSTRAINT FK_37882631DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier_mangas DROP FOREIGN KEY FK_37882631F77D927C');
        $this->addSql('ALTER TABLE panier_mangas DROP FOREIGN KEY FK_37882631DDC4978F');
        $this->addSql('DROP TABLE panier_mangas');
    }
}
