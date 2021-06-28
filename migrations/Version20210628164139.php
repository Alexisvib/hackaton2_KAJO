<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628164139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rocket (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rocket_skill (rocket_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_7185E85FC57537DF (rocket_id), INDEX IDX_7185E85F5585C142 (skill_id), PRIMARY KEY(rocket_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, on_fiverr TINYINT(1) NOT NULL, on_linked_in TINYINT(1) NOT NULL, photo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (user_source INT NOT NULL, user_target INT NOT NULL, INDEX IDX_F7129A803AD8644E (user_source), INDEX IDX_F7129A80233D34C1 (user_target), PRIMARY KEY(user_source, user_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_skill (user_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_BCFF1F2FA76ED395 (user_id), INDEX IDX_BCFF1F2F5585C142 (skill_id), PRIMARY KEY(user_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_rocket (user_id INT NOT NULL, rocket_id INT NOT NULL, INDEX IDX_ABEBA023A76ED395 (user_id), INDEX IDX_ABEBA023C57537DF (rocket_id), PRIMARY KEY(user_id, rocket_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rocket_skill ADD CONSTRAINT FK_7185E85FC57537DF FOREIGN KEY (rocket_id) REFERENCES rocket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rocket_skill ADD CONSTRAINT FK_7185E85F5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_skill ADD CONSTRAINT FK_BCFF1F2FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_skill ADD CONSTRAINT FK_BCFF1F2F5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_rocket ADD CONSTRAINT FK_ABEBA023A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_rocket ADD CONSTRAINT FK_ABEBA023C57537DF FOREIGN KEY (rocket_id) REFERENCES rocket (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rocket_skill DROP FOREIGN KEY FK_7185E85FC57537DF');
        $this->addSql('ALTER TABLE user_rocket DROP FOREIGN KEY FK_ABEBA023C57537DF');
        $this->addSql('ALTER TABLE rocket_skill DROP FOREIGN KEY FK_7185E85F5585C142');
        $this->addSql('ALTER TABLE user_skill DROP FOREIGN KEY FK_BCFF1F2F5585C142');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A803AD8644E');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80233D34C1');
        $this->addSql('ALTER TABLE user_skill DROP FOREIGN KEY FK_BCFF1F2FA76ED395');
        $this->addSql('ALTER TABLE user_rocket DROP FOREIGN KEY FK_ABEBA023A76ED395');
        $this->addSql('DROP TABLE rocket');
        $this->addSql('DROP TABLE rocket_skill');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('DROP TABLE user_skill');
        $this->addSql('DROP TABLE user_rocket');
    }
}
