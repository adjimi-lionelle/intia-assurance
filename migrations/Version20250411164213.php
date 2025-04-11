<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250411164213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE surccusale (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD surccusale_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD CONSTRAINT FK_8D93D6497E7141EE FOREIGN KEY (surccusale_id) REFERENCES surccusale (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D93D6497E7141EE ON user (surccusale_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6497E7141EE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE surccusale
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_8D93D6497E7141EE ON `user`
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` DROP surccusale_id
        SQL);
    }
}
