<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181023141703 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dochadzka (id INT AUTO_INCREMENT NOT NULL, suma_pracovnikov_monitor INT NOT NULL, suma_pracovnikov_operator INT NOT NULL, pn_lekar_monitor INT NOT NULL, pn_lekar_operator INT NOT NULL, dovolenka_nv_monitor INT NOT NULL, dovolenka_nv_operator INT NOT NULL, ine_monitor INT NOT NULL, ine_operator INT NOT NULL, skolenie_monitor INT NOT NULL, skolenie_operator INT NOT NULL, pozicany_monitor INT NOT NULL, pozicany_operator INT NOT NULL, vypozicany_monitor INT NOT NULL, vypozicany_operator INT NOT NULL, nadcas_2_zmeny_monitor INT NOT NULL, nadcas_2_zmeny_operator INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dochadzka');
    }
}
