-- update_production_db.sql

-- 1. Add description column to blog_posts if it doesn't exist
-- Note: MySQL 5.7+ doesn't support IF NOT EXISTS for columns easily in one line without procedure, 
-- but running this ADD COLUMN will just error if it exists which is fine for manual run, 
-- OR we can assume it doesn't exist based on the error.
ALTER TABLE `blog_posts` ADD COLUMN `description` TEXT AFTER `title`;

-- 2. Create blog_post_images table if it doesn't exist (used for gallery)
CREATE TABLE IF NOT EXISTS `blog_post_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `blog_post_images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
