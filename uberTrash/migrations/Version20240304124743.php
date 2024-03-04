<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304124743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order2 ADD type2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order2 ADD CONSTRAINT FK_E4F48CE8AD1A0C0F FOREIGN KEY (type2_id) REFERENCES type2 (id)');
        $this->addSql('CREATE INDEX IDX_E4F48CE8AD1A0C0F ON order2 (type2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order2 DROP FOREIGN KEY FK_E4F48CE8AD1A0C0F');
        $this->addSql('DROP INDEX IDX_E4F48CE8AD1A0C0F ON order2');
        $this->addSql('ALTER TABLE order2 DROP type2_id');
    }
}
