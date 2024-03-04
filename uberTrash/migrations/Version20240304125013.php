<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304125013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order2 ADD category2_id INT DEFAULT NULL, ADD status2_id INT DEFAULT NULL, ADD billing2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order2 ADD CONSTRAINT FK_E4F48CE88ACF47B4 FOREIGN KEY (category2_id) REFERENCES category2 (id)');
        $this->addSql('ALTER TABLE order2 ADD CONSTRAINT FK_E4F48CE87162BA4C FOREIGN KEY (status2_id) REFERENCES status2 (id)');
        $this->addSql('ALTER TABLE order2 ADD CONSTRAINT FK_E4F48CE8B73E96A2 FOREIGN KEY (billing2_id) REFERENCES billing2 (id)');
        $this->addSql('CREATE INDEX IDX_E4F48CE88ACF47B4 ON order2 (category2_id)');
        $this->addSql('CREATE INDEX IDX_E4F48CE87162BA4C ON order2 (status2_id)');
        $this->addSql('CREATE INDEX IDX_E4F48CE8B73E96A2 ON order2 (billing2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order2 DROP FOREIGN KEY FK_E4F48CE88ACF47B4');
        $this->addSql('ALTER TABLE order2 DROP FOREIGN KEY FK_E4F48CE87162BA4C');
        $this->addSql('ALTER TABLE order2 DROP FOREIGN KEY FK_E4F48CE8B73E96A2');
        $this->addSql('DROP INDEX IDX_E4F48CE88ACF47B4 ON order2');
        $this->addSql('DROP INDEX IDX_E4F48CE87162BA4C ON order2');
        $this->addSql('DROP INDEX IDX_E4F48CE8B73E96A2 ON order2');
        $this->addSql('ALTER TABLE order2 DROP category2_id, DROP status2_id, DROP billing2_id');
    }
}
