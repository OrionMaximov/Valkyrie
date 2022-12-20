<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216084743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
       // $this->addSql('CREATE TABLE order_book (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, order_ref_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_86149926F347EFB (produit_id), INDEX IDX_86149926E238517C (order_ref_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
       // $this->addSql('ALTER TABLE order_book ADD CONSTRAINT FK_86149926F347EFB FOREIGN KEY (produit_id) REFERENCES panier (id)');
       // $this->addSql('ALTER TABLE order_book ADD CONSTRAINT FK_86149926E238517C FOREIGN KEY (order_ref_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       // $this->addSql('ALTER TABLE order_book DROP FOREIGN KEY FK_86149926F347EFB');
       // $this->addSql('ALTER TABLE order_book DROP FOREIGN KEY FK_86149926E238517C');
      //  $this->addSql('DROP TABLE `order`');
       // $this->addSql('DROP TABLE order_book');
    }
}
