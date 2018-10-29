<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181023142542 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ro (id INT AUTO_INCREMENT NOT NULL, zastavenia_text_fab VARCHAR(255) NOT NULL, zastavenia_int_fab INT NOT NULL, udrzba_text VARCHAR(255) NOT NULL, udrzba_int INT NOT NULL, logistika_text VARCHAR(255) NOT NULL, logistika_int INT NOT NULL, saturacia_text VARCHAR(255) NOT NULL, saturacia_int INT NOT NULL, nedostatok_text VARCHAR(255) NOT NULL, nedostatok_int INT NOT NULL, teoreticka_vyroba DOUBLE PRECISION NOT NULL, pocet_vyrobenych INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ro');
    }
}
