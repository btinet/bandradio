<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901042709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_type (id INT AUTO_INCREMENT NOT NULL, template_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_41BCBAEC5DA0FB8 (template_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, menu_type_id INT DEFAULT NULL, pages_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, slug VARCHAR(128) NOT NULL, weight INT DEFAULT NULL, UNIQUE INDEX UNIQ_7D053A93989D9B62 (slug), INDEX IDX_7D053A934D97912D (menu_type_id), INDEX IDX_7D053A93401ADD27 (pages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_4491A767989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, block_header_primary_id INT DEFAULT NULL, block_header_secondary_id INT DEFAULT NULL, block_header_tertiary_id INT DEFAULT NULL, block_header_quaternary_id INT DEFAULT NULL, block_body_primary_id INT DEFAULT NULL, block_body_secondary_id INT DEFAULT NULL, block_body_tertiary_id INT DEFAULT NULL, block_body_quaternary_id INT DEFAULT NULL, block_sidebar_primary_id INT DEFAULT NULL, block_sidebar_secondary_id INT DEFAULT NULL, block_sidebar_tertiary_id INT DEFAULT NULL, block_sidebar_quaternary_id INT DEFAULT NULL, block_footer_primary_id INT DEFAULT NULL, block_footer_secondary_id INT DEFAULT NULL, block_footer_tertiary_id INT DEFAULT NULL, block_footer_quaternary_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, is_published TINYINT(1) DEFAULT NULL, content LONGTEXT DEFAULT NULL, has_custom_content TINYINT(1) DEFAULT NULL, slug VARCHAR(128) NOT NULL, is_frontpage TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_140AB620989D9B62 (slug), INDEX IDX_140AB6207977D837 (block_header_primary_id), INDEX IDX_140AB6201D6CD2F7 (block_header_secondary_id), INDEX IDX_140AB620C9BF9F6A (block_header_tertiary_id), INDEX IDX_140AB6207C355AF9 (block_header_quaternary_id), INDEX IDX_140AB620F1131D5B (block_body_primary_id), INDEX IDX_140AB6203F2A4807 (block_body_secondary_id), INDEX IDX_140AB6208D33D6DC (block_body_tertiary_id), INDEX IDX_140AB620C1AAEE7F (block_body_quaternary_id), INDEX IDX_140AB620D12426A7 (block_sidebar_primary_id), INDEX IDX_140AB62036282FA5 (block_sidebar_secondary_id), INDEX IDX_140AB62039185FD0 (block_sidebar_tertiary_id), INDEX IDX_140AB620F97B2EDC (block_sidebar_quaternary_id), INDEX IDX_140AB6204721BE94 (block_footer_primary_id), INDEX IDX_140AB6203C97C7E6 (block_footer_secondary_id), INDEX IDX_140AB620865E3B5E (block_footer_tertiary_id), INDEX IDX_140AB62016A4811E (block_footer_quaternary_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, content_type_id INT DEFAULT NULL, templates_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, content LONGTEXT DEFAULT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, is_published TINYINT(1) DEFAULT NULL, image_caption VARCHAR(255) DEFAULT NULL, image_alt_text VARCHAR(255) DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_5A8A6C8D989D9B62 (slug), INDEX IDX_5A8A6C8D1A445520 (content_type_id), INDEX IDX_5A8A6C8D22CE5C94 (templates_id), INDEX IDX_5A8A6C8DB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_5ACE3AF04B89032C (post_id), INDEX IDX_5ACE3AF0BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE template (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view (id INT AUTO_INCREMENT NOT NULL, view_types_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, slug VARCHAR(128) NOT NULL, number_of_posts INT DEFAULT NULL, sort_posts_by VARCHAR(255) DEFAULT NULL, order_by VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_FEFDAB8E989D9B62 (slug), INDEX IDX_FEFDAB8ED3F37540 (view_types_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view_content_type (view_id INT NOT NULL, content_type_id INT NOT NULL, INDEX IDX_4DD77B531518C7 (view_id), INDEX IDX_4DD77B51A445520 (content_type_id), PRIMARY KEY(view_id, content_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view_tag (view_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_6D5E9D1B31518C7 (view_id), INDEX IDX_6D5E9D1BBAD26311 (tag_id), PRIMARY KEY(view_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, template VARCHAR(255) DEFAULT NULL, slug VARCHAR(128) NOT NULL, has_title TINYINT(1) DEFAULT NULL, has_description TINYINT(1) DEFAULT NULL, has_content TINYINT(1) DEFAULT NULL, has_image TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_72649B75989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_type ADD CONSTRAINT FK_41BCBAEC5DA0FB8 FOREIGN KEY (template_id) REFERENCES template (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A934D97912D FOREIGN KEY (menu_type_id) REFERENCES menu_type (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93401ADD27 FOREIGN KEY (pages_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6207977D837 FOREIGN KEY (block_header_primary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6201D6CD2F7 FOREIGN KEY (block_header_secondary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620C9BF9F6A FOREIGN KEY (block_header_tertiary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6207C355AF9 FOREIGN KEY (block_header_quaternary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620F1131D5B FOREIGN KEY (block_body_primary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6203F2A4807 FOREIGN KEY (block_body_secondary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6208D33D6DC FOREIGN KEY (block_body_tertiary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620C1AAEE7F FOREIGN KEY (block_body_quaternary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620D12426A7 FOREIGN KEY (block_sidebar_primary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB62036282FA5 FOREIGN KEY (block_sidebar_secondary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB62039185FD0 FOREIGN KEY (block_sidebar_tertiary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620F97B2EDC FOREIGN KEY (block_sidebar_quaternary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6204721BE94 FOREIGN KEY (block_footer_primary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6203C97C7E6 FOREIGN KEY (block_footer_secondary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620865E3B5E FOREIGN KEY (block_footer_tertiary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB62016A4811E FOREIGN KEY (block_footer_quaternary_id) REFERENCES view (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D1A445520 FOREIGN KEY (content_type_id) REFERENCES content_type (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D22CE5C94 FOREIGN KEY (templates_id) REFERENCES template (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DB03A8386 FOREIGN KEY (created_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE post_tag ADD CONSTRAINT FK_5ACE3AF04B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_tag ADD CONSTRAINT FK_5ACE3AF0BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view ADD CONSTRAINT FK_FEFDAB8ED3F37540 FOREIGN KEY (view_types_id) REFERENCES view_type (id)');
        $this->addSql('ALTER TABLE view_content_type ADD CONSTRAINT FK_4DD77B531518C7 FOREIGN KEY (view_id) REFERENCES view (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_content_type ADD CONSTRAINT FK_4DD77B51A445520 FOREIGN KEY (content_type_id) REFERENCES content_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_tag ADD CONSTRAINT FK_6D5E9D1B31518C7 FOREIGN KEY (view_id) REFERENCES view (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_tag ADD CONSTRAINT FK_6D5E9D1BBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D1A445520');
        $this->addSql('ALTER TABLE view_content_type DROP FOREIGN KEY FK_4DD77B51A445520');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A934D97912D');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93401ADD27');
        $this->addSql('ALTER TABLE post_tag DROP FOREIGN KEY FK_5ACE3AF04B89032C');
        $this->addSql('ALTER TABLE post_tag DROP FOREIGN KEY FK_5ACE3AF0BAD26311');
        $this->addSql('ALTER TABLE view_tag DROP FOREIGN KEY FK_6D5E9D1BBAD26311');
        $this->addSql('ALTER TABLE content_type DROP FOREIGN KEY FK_41BCBAEC5DA0FB8');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D22CE5C94');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DB03A8386');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6207977D837');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6201D6CD2F7');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620C9BF9F6A');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6207C355AF9');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620F1131D5B');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6203F2A4807');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6208D33D6DC');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620C1AAEE7F');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620D12426A7');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB62036282FA5');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB62039185FD0');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620F97B2EDC');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6204721BE94');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6203C97C7E6');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620865E3B5E');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB62016A4811E');
        $this->addSql('ALTER TABLE view_content_type DROP FOREIGN KEY FK_4DD77B531518C7');
        $this->addSql('ALTER TABLE view_tag DROP FOREIGN KEY FK_6D5E9D1B31518C7');
        $this->addSql('ALTER TABLE view DROP FOREIGN KEY FK_FEFDAB8ED3F37540');
        $this->addSql('DROP TABLE content_type');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_type');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE template');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE view');
        $this->addSql('DROP TABLE view_content_type');
        $this->addSql('DROP TABLE view_tag');
        $this->addSql('DROP TABLE view_type');
    }
}
