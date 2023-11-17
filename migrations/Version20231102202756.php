<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102202756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE admins_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP TABLE admins');
        $this->addSql('DROP TABLE product');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE admins_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE admins (id INT NOT NULL, name VARCHAR(40) NOT NULL, password VARCHAR(200) NOT NULL, creation_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(50) NOT NULL, descrip TEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, path_img VARCHAR(255) DEFAULT NULL, categ VARCHAR(60) NOT NULL, promo_bool BOOLEAN NOT NULL, promo_price DOUBLE PRECISION DEFAULT NULL, creation_date DATE DEFAULT NULL, ending_date DATE DEFAULT NULL, promo_value INT DEFAULT NULL, PRIMARY KEY(id))');
    }
}
