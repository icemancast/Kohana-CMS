# ************************************************************
# Sequel Pro SQL dump
# Version 3348
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.1.52)
# Database: communitybible
# Generation Time: 2011-07-21 10:22:38 -0500
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
  KEY `user_id_idxfk_8` (`user_id`),
  KEY `page_id_idxfk` (`page_id`),
  CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `contents_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;

INSERT INTO `contents` (`id`, `user_id`, `page_id`, `content_title`, `content`, `status`, `sort`, `date_published`, `date_expired`, `date_created`, `date_modified`)
VALUES
	(1,NULL,1,'Test Content','This is the content that I am using.','published',1,1310014800,0,1310138342,NULL);

/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;


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
  KEY `user_id_idxfk_5` (`user_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table events_tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events_tags`;

CREATE TABLE `events_tags` (
  `tags_id` int(11) unsigned NOT NULL,
  `event_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`tags_id`,`event_id`),
  KEY `event_id_idxfk` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



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
  KEY `user_id_idxfk_9` (`user_id`),
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
  KEY `user_id_idxfk_6` (`user_id`),
  CONSTRAINT `navs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `navs` WRITE;
/*!40000 ALTER TABLE `navs` DISABLE KEYS */;

INSERT INTO `navs` (`id`, `user_id`, `nav_title`, `date_created`, `date_modified`)
VALUES
	(1,NULL,'Main Navigation',1310138026,NULL);

/*!40000 ALTER TABLE `navs` ENABLE KEYS */;
UNLOCK TABLES;


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
  KEY `user_id_idxfk_7` (`user_id`),
  KEY `nav_id_idxfk` (`nav_id`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `user_id`, `parent_id`, `nav_id`, `head_code`, `description`, `slug`, `browser_title`, `page_title`, `status`, `date_published`, `date_expired`, `date_created`, `date_modified`)
VALUES
	(1,NULL,0,1,'','','slug-slug','Community Bible Church 2','Community Bible Church 3','published',1310014800,0,1310138278,NULL);

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


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
  KEY `user_id_idxfk_1` (`user_id`),
  CONSTRAINT `podcasts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `description`)
VALUES
	(1,'login','Login privileges, granted after account confirmation'),
	(2,'admin','Administrative user, has access to everything.'),
	(3,'editor','Editor has right to edit and update. Not to create or delete.'),
	(4,'developer','Developer has all access even above admin.');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles_users`;

CREATE TABLE `roles_users` (
  `user_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`),
  CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `roles_users` WRITE;
/*!40000 ALTER TABLE `roles_users` DISABLE KEYS */;

INSERT INTO `roles_users` (`user_id`, `role_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4);

/*!40000 ALTER TABLE `roles_users` ENABLE KEYS */;
UNLOCK TABLES;


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
  KEY `user_id_idxfk_2` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



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
  KEY `user_id_idxfk_10` (`user_id`),
  KEY `nav_id_idxfk_1` (`nav_id`),
  CONSTRAINT `urls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `urls_ibfk_2` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `urls` WRITE;
/*!40000 ALTER TABLE `urls` DISABLE KEYS */;

INSERT INTO `urls` (`id`, `user_id`, `nav_id`, `url_title`, `url`, `status`, `sort`, `date_published`, `date_expired`, `date_created`, `date_modified`)
VALUES
	(1,NULL,1,'About Us',' ','active',1,1310014800,0,1310138072,NULL);

/*!40000 ALTER TABLE `urls` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_tokens`;

CREATE TABLE `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` int(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `f1_id` int(11) unsigned DEFAULT NULL,
  `first_name` varchar(127) DEFAULT NULL,
  `last_name` varchar(127) DEFAULT NULL,
  `email` varchar(127) NOT NULL,
  `username` varchar(127) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `logins` int(11) unsigned NOT NULL DEFAULT '0',
  `last_login` int(11) unsigned DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `uniq_email` (`email`),
  UNIQUE KEY `uniq_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `f1_id`, `first_name`, `last_name`, `email`, `username`, `password`, `logins`, `last_login`, `image`)
VALUES
	(1,NULL,NULL,NULL,'icastillo@cbcmail.org','icemancast','b7b21e48597cd6f3ac98d3d5de1524893035677f9ea2aae5be87b787c589e884',9,1311195283,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
