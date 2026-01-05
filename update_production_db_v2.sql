-- update_production_db_v2.sql

-- 1. Ensure the parent table uses InnoDB (Required for Foreign Keys)
ALTER TABLE blog_posts ENGINE=InnoDB;

-- 2. Create the images table WITHOUT the foreign key first
-- This ensures the table exists so the invalid 500 error stops happening.
CREATE TABLE IF NOT EXISTS `blog_post_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Attempt to add the Foreign Key
-- If this fails, it's okay for now - the site will still work.
-- It typically fails if there is a mismatch between id types or data issues.
SET @exist := (SELECT COUNT(*) FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_NAME = 'blog_post_images' AND CONSTRAINT_NAME = 'blog_post_images_ibfk_1' AND TABLE_SCHEMA = DATABASE());
SET @sql := IF (@exist > 0, 'SELECT "Constraint exists"', 'ALTER TABLE `blog_post_images` ADD CONSTRAINT `blog_post_images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- 4. Re-run description add just in case it failed before
-- (Wrapped in procedure logic to avoid duplicate column errors isn't easy in simple SQL on all DBs, 
-- but we can just use the simple line. If it errors saying "Column exists", that is GOOD.)
-- UNCOMMENT THE LINE BELOW IF YOU STILL GET 'Unknown column description' ERROR:
-- ALTER TABLE `blog_posts` ADD COLUMN `description` TEXT AFTER `title`;
