# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.52)
# Database: communitybible
# Generation Time: 2011-06-06 14:26:06 -0500
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `page_id` int(11) unsigned DEFAULT NULL,
  `content_title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `status` enum('draft','published','pending','archive') DEFAULT 'draft',
  `sort` int(5) unsigned DEFAULT '0',
  `date_published` int(11) unsigned DEFAULT NULL,
  `date_expired` int(11) unsigned DEFAULT '0',
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_7` (`user_id`),
  KEY `page_id_idxfk` (`page_id`),
  CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `contents_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `registration_url` varchar(255) DEFAULT '0',
  `tags` text,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('inactive','active') DEFAULT 'inactive',
  `date_event` int(11) unsigned DEFAULT NULL,
  `date_eventend` int(11) unsigned DEFAULT NULL,
  `date_published` int(11) unsigned DEFAULT NULL,
  `date_expired` int(11) unsigned DEFAULT '0',
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_4` (`user_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`,`user_id`,`event_title`,`image`,`description`,`registration_url`,`tags`,`slug`,`status`,`date_event`,`date_eventend`,`date_published`,`date_expired`,`date_created`,`date_modified`)
VALUES
	(1,NULL,'test','','description','','test, this out','mancation','active',1306519200,NULL,1306472400,0,1306186222,NULL),
	(2,NULL,'test','','description','','test, this out','mancation','active',1306519200,NULL,1306472400,0,1306186266,NULL),
	(3,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306186526,NULL),
	(4,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306186668,NULL),
	(5,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306186866,NULL),
	(6,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187194,NULL),
	(7,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187230,NULL),
	(8,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187448,NULL),
	(9,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187504,NULL),
	(10,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187541,NULL),
	(11,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187646,NULL),
	(12,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187657,NULL),
	(13,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187698,NULL),
	(14,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187733,NULL),
	(15,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306187810,NULL),
	(16,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306188725,NULL),
	(17,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306188734,NULL),
	(18,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306188866,NULL),
	(19,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306188887,NULL),
	(20,NULL,'test 2','','womens event','','tag 1, tag 2, tag 3','women','inactive',1306857600,NULL,1306904400,0,1306188911,NULL),
	(21,NULL,'test event','','adfa fadf','','1 tag, 2 tag, 3 tag','women','inactive',1306512000,NULL,1306818000,0,1306355383,NULL),
	(22,NULL,'test event','','adfa fadf','','1 tag, 2 tag, 3 tag','women','inactive',1306512000,NULL,1306818000,0,1306355587,NULL),
	(23,NULL,'test event','','adfa fadf','','1 tag, 2 tag, 3 tag','women','inactive',1306512000,NULL,1306818000,0,1306355825,NULL);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `page_id` int(11) unsigned DEFAULT NULL,
  `image_title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `type` enum('banner','header') DEFAULT NULL,
  `status` enum('inactive','active') DEFAULT NULL,
  `sort` int(5) unsigned DEFAULT NULL,
  `date_published` int(11) unsigned DEFAULT NULL,
  `date_expired` int(11) unsigned DEFAULT '0',
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_8` (`user_id`),
  KEY `page_id_idxfk_1` (`page_id`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `images_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table navs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `navs`;

CREATE TABLE `navs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `nav_title` varchar(255) DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_5` (`user_id`),
  CONSTRAINT `navs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `nav_id` int(11) unsigned DEFAULT NULL,
  `head_code` varchar(255) DEFAULT NULL,
  `description` text,
  `slug` varchar(255) DEFAULT NULL,
  `browser_title` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','pending','archive') DEFAULT 'draft',
  `date_published` int(11) unsigned DEFAULT NULL,
  `date_expired` int(11) unsigned DEFAULT '0',
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `user_id_idxfk_6` (`user_id`),
  KEY `nav_id_idxfk` (`nav_id`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table podcasts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `podcasts`;

CREATE TABLE `podcasts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text,
  `subtitle` varchar(255) DEFAULT NULL,
  `summary` text,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_title` varchar(255) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `image_width` int(5) unsigned DEFAULT '144',
  `image_height` int(5) unsigned DEFAULT '144',
  `image_itunes` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `category_itunes` varchar(255) DEFAULT NULL,
  `subcategory_itunes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_2` (`user_id`),
  CONSTRAINT `podcasts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table roles_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles_users`;

CREATE TABLE `roles_users` (
  `role_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_id_idxfk_1` (`user_id`),
  CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sermons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sermons`;

CREATE TABLE `sermons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `lightcast_id` int(11) unsigned DEFAULT NULL,
  `podcast_id` int(11) unsigned DEFAULT NULL,
  `speaker_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `file_size` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `cupertino` int(2) unsigned DEFAULT '0',
  `lightcast_location` varchar(255) DEFAULT NULL,
  `lightcast_code` varchar(255) DEFAULT NULL,
  `mp3_file` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `date_sermon` int(11) unsigned DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_3` (`user_id`),
  KEY `sermons_ibfk_1` (`podcast_id`),
  KEY `sermons_ibfk_2` (`speaker_id`),
  CONSTRAINT `sermons_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `sermons_ibfk_2` FOREIGN KEY (`podcast_id`) REFERENCES `podcasts` (`id`),
  CONSTRAINT `sermons_ibfk_3` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(11) unsigned NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_active_idx` (`last_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table speakers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `speakers`;

CREATE TABLE `speakers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`,`user_id`,`keyword`,`date_created`,`date_modified`)
VALUES
	(1,NULL,'tag 1, tag 2, tag 3',NULL,NULL);

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags_events`;

CREATE TABLE `tags_events` (
  `event_id` int(11) unsigned NOT NULL DEFAULT '0',
  `tag_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_id`,`event_id`),
  KEY `event_id_idxfk` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `tags_events` WRITE;
/*!40000 ALTER TABLE `tags_events` DISABLE KEYS */;
INSERT INTO `tags_events` (`event_id`,`tag_id`)
VALUES
	(23,1),
	(23,2),
	(23,3);

/*!40000 ALTER TABLE `tags_events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table urls
# ------------------------------------------------------------

DROP TABLE IF EXISTS `urls`;

CREATE TABLE `urls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `nav_id` int(11) unsigned DEFAULT NULL,
  `url_title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` enum('inactive','active') DEFAULT NULL,
  `sort` int(5) unsigned DEFAULT NULL,
  `date_published` int(11) unsigned DEFAULT NULL,
  `date_expired` int(11) unsigned DEFAULT '0',
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_9` (`user_id`),
  KEY `nav_id_idxfk_1` (`nav_id`),
  CONSTRAINT `urls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `urls_ibfk_2` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `f1_id` int(11) unsigned DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `logins` int(11) unsigned DEFAULT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
