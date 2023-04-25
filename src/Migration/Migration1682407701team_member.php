<?php declare(strict_types=1);

namespace FullstackTestTasks\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1682407701team_member extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1682407701;
    }

    public function update(Connection $connection): void
    {
        $connection->executeUpdate('
            CREATE TABLE IF NOT EXISTS `team_member` (
              `id`                BINARY(16) NOT NULL,
              `name`              VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `background_media_id`   BINARY(16) NOT NULL,
              `profile_media_id`   BINARY(16) NOT NULL,
              `position`          VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `text`              LONGTEXT COLLATE utf8mb4_unicode_ci NOT NULL,
              `created_at`        DATETIME(3) NOT NULL,
              `updated_at`        DATETIME(3) NULL,
              PRIMARY KEY (`id`),
              CONSTRAINT `fk.background_media` FOREIGN KEY (`background_media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
              CONSTRAINT `fk.profile_media` FOREIGN KEY (`profile_media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
