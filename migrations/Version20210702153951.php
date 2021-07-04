<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210702153951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shooting_client (shooting_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_82AE1FC86A498DE6 (shooting_id), INDEX IDX_82AE1FC819EB6921 (client_id), PRIMARY KEY(shooting_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shooting_client ADD CONSTRAINT FK_82AE1FC86A498DE6 FOREIGN KEY (shooting_id) REFERENCES shooting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shooting_client ADD CONSTRAINT FK_82AE1FC819EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE shooting_client');
    }
}
