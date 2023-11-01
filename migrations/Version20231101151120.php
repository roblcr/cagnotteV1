<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231101151120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cagnotte_user (cagnotte_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_44318D8C15105EB8 (cagnotte_id), INDEX IDX_44318D8CA76ED395 (user_id), PRIMARY KEY(cagnotte_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cagnotte_user ADD CONSTRAINT FK_44318D8C15105EB8 FOREIGN KEY (cagnotte_id) REFERENCES cagnotte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cagnotte_user ADD CONSTRAINT FK_44318D8CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cagnotte_user DROP FOREIGN KEY FK_44318D8C15105EB8');
        $this->addSql('ALTER TABLE cagnotte_user DROP FOREIGN KEY FK_44318D8CA76ED395');
        $this->addSql('DROP TABLE cagnotte_user');
    }
}
