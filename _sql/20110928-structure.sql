-- MySQL dump 10.13  Distrib 5.5.14, for osx10.6 (i386)
--
-- Host: localhost    Database: communitybible
-- ------------------------------------------------------
-- Server version	5.5.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  KEY `page_id_idxfk` (`page_id`),
  CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `event_who` varchar(255) DEFAULT NULL,
  `event_what` text,
  `event_date` int(11) unsigned DEFAULT NULL,
  `event_end` int(11) unsigned DEFAULT NULL,
  `event_where` varchar(255) DEFAULT NULL,
  `event_cost` decimal(10,2) DEFAULT NULL,
  `registration_url` varchar(255) DEFAULT '0',
  `tags` text,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('inactive','active') DEFAULT 'inactive',
  `date_published` int(11) unsigned DEFAULT NULL,
  `date_expired` int(11) unsigned DEFAULT '0',
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_6` (`user_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events_tags`
--

DROP TABLE IF EXISTS `events_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events_tags` (
  `tags_id` int(11) unsigned NOT NULL,
  `event_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`tags_id`,`event_id`),
  KEY `event_id_idxfk` (`event_id`),
  CONSTRAINT `events_tags_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  CONSTRAINT `events_tags_ibfk_1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events_tags`
--

LOCK TABLES `events_tags` WRITE;
/*!40000 ALTER TABLE `events_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `events_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  CONSTRAINT `images_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navs`
--

DROP TABLE IF EXISTS `navs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `nav_title` varchar(255) DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_7` (`user_id`),
  CONSTRAINT `navs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navs`
--

LOCK TABLES `navs` WRITE;
/*!40000 ALTER TABLE `navs` DISABLE KEYS */;
/*!40000 ALTER TABLE `navs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  KEY `user_id_idxfk_8` (`user_id`),
  KEY `nav_id_idxfk` (`nav_id`),
  CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `podcasts`
--

DROP TABLE IF EXISTS `podcasts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `podcasts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `speaker_id` int(11) unsigned DEFAULT NULL,
  `podcast_title` varchar(255) DEFAULT NULL,
  `podcast_author` varchar(255) DEFAULT NULL,
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
  `keywords` varchar(255) DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_3` (`user_id`),
  KEY `speaker_id_idxfk` (`speaker_id`),
  CONSTRAINT `podcasts_ibfk_2` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`),
  CONSTRAINT `podcasts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `podcasts`
--

LOCK TABLES `podcasts` WRITE;
/*!40000 ALTER TABLE `podcasts` DISABLE KEYS */;
INSERT INTO `podcasts` VALUES (7,1,1,'Robert Emmitt','CBC Productions','www.com','asdfasdf fdsa f','asdfadf','asdf','asdf','webmaster@communitybible.com','http://www.cbcmediasite.com/media/images/cbc.jpg','Community Bible Church San Antonio','http://www.communitybible.com',144,144,'http://www.cbcmediasite.com/media/images/cbc.jpg','Christianity','qq','asdf','asdfa, asdf, asdf, adsf',1317069171,1317132337);
/*!40000 ALTER TABLE `podcasts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'login','Login privileges, granted after account confirmation'),(2,'admin','Administrative user, has access to everything.'),(3,'editor','Editor has right to edit and update. Not to create or delete.'),(4,'developer','Developer has all access even above admin.');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_users` (
  `user_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id_idxfk` (`role_id`),
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_users`
--

LOCK TABLES `roles_users` WRITE;
/*!40000 ALTER TABLE `roles_users` DISABLE KEYS */;
INSERT INTO `roles_users` VALUES (1,1),(1,2),(1,3),(1,4);
/*!40000 ALTER TABLE `roles_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sermons`
--

DROP TABLE IF EXISTS `sermons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sermons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `lightcast_id` int(11) unsigned DEFAULT NULL,
  `podcast_id` int(11) unsigned DEFAULT NULL,
  `speaker_id` int(11) unsigned DEFAULT NULL,
  `sermon_title` varchar(255) DEFAULT NULL,
  `description` text,
  `file_size` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `cupertino` int(2) unsigned DEFAULT '0',
  `lightcast_location` varchar(255) DEFAULT NULL,
  `lightcast_code` varchar(255) DEFAULT NULL,
  `mp3_file` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `status` enum('inactive','active') DEFAULT 'active',
  `date_sermon` int(11) unsigned DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_4` (`user_id`),
  KEY `sermons_ibfk_1` (`podcast_id`),
  KEY `sermons_ibfk_2` (`speaker_id`),
  CONSTRAINT `sermons_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `sermons_ibfk_2` FOREIGN KEY (`podcast_id`) REFERENCES `podcasts` (`id`),
  CONSTRAINT `sermons_ibfk_3` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sermons`
--

LOCK TABLES `sermons` WRITE;
/*!40000 ALTER TABLE `sermons` DISABLE KEYS */;
INSERT INTO `sermons` VALUES (1,NULL,30331,7,1,'Romans: Predestination and Free Will','Romans: Predestination and Free Will April 25, 2010','145443026','1989',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDMzMSZla2V5PTNmZWNjYTU5JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDMzMSZla2V5PTNmZWNjYTU5JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1272376784,1317218717,NULL),(2,NULL,30541,7,1,'Romans: God\'s will for your life','Romans: God\'s will for your life May 2, 2010','139368179','1952',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDU0MSZla2V5PTFmYWZjZGY3JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDU0MSZla2V5PTFmYWZjZGY3JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1273003894,1317218717,NULL),(3,NULL,30632,7,1,'Mothers Day','Mothers Day May 09, 2010','149767663','2066',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDYzMiZla2V5PTM2NGYxNjk1JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDYzMiZla2V5PTM2NGYxNjk1JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1273433203,1317218717,NULL),(4,NULL,30930,7,1,'Respecting Authority ','Respecting Authority May 17, 2010','129713336','1786',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDkzMCZla2V5PTQ5MjFhNTM3JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMDkzMCZla2V5PTQ5MjFhNTM3JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1274127939,1317218717,NULL),(5,NULL,31125,7,1,'Community Bible Church\'s 20th Anniversary ','Community Bible Church\'s 20th Anniversary May 23, 2010','175705723','2409',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTEyNSZla2V5PTFiMWY2MWJkJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTEyNSZla2V5PTFiMWY2MWJkJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1274804065,1317218717,NULL),(6,NULL,31510,7,1,'Romans: The Dangers of Criticism','Romans: The Dangers of Criticism','151986274','2090',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTUxMCZla2V5PWVjMDU1ZWRiJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTUxMCZla2V5PWVjMDU1ZWRiJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1275945874,1317218717,NULL),(7,NULL,31746,7,1,'Romans: \"Church\"','Romans: \"Church\" June 13, 2010','163322540','2254',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTc0NiZla2V5PTdkN2U3Y2JlJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTc0NiZla2V5PTdkN2U3Y2JlJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1276618638,1317218717,NULL),(8,NULL,31937,7,1,'Good Ain\'t Good Enough','Good Ain\'t Good Enough June 20, 2010','192630514','2636',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTkzNyZla2V5PTg4NmU2Y2VjJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMTkzNyZla2V5PTg4NmU2Y2VjJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1277226800,1317218717,NULL),(9,NULL,32123,7,1,'Through the Darkness','Through the Darkness June 27, 2010','157013726','2167',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjEyMyZla2V5PTM2MmNlNmExJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjEyMyZla2V5PTM2MmNlNmExJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1277756430,1317218717,NULL),(10,NULL,32272,7,1,'Through the Darkness: Steps 3&4','Through the Darkness: Steps 3&4 July 04, 2010','122596655','1689',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjI3MiZla2V5PTkxYWMwNDhlJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjI3MiZla2V5PTkxYWMwNDhlJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1278453242,1317218717,NULL),(11,NULL,32375,7,1,'Through the Darkness: Steps 5, 6, and 7','Through the Darkness: Steps 5, 6, and 7 July 11, 2010','138012484','1886',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjM3NSZla2V5PWEzYTNjOGE5JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjM3NSZla2V5PWEzYTNjOGE5JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1278945999,1317218717,NULL),(12,NULL,32874,7,1,'Through the Darkness: Step 12 Help Somebody ','Through the Darkness: Step 12 Help Somebody  August 1, 2010','115456209','1613',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjg3NCZla2V5PTQxOTI1ZTUzJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMjg3NCZla2V5PTQxOTI1ZTUzJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1280763665,1317218717,NULL),(13,NULL,33354,7,1,'Transformer: Lessons from the life of Daniel','Transformer: Lessons from the life of Daniel, August 22,2010','141240935','1937',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzM1NCZla2V5PTEzMzI5OTU0JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzM1NCZla2V5PTEzMzI5OTU0JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1283177213,1317218717,NULL),(14,NULL,33518,7,1,'Plain James: The Power of Our Words','Plain James: The Power of Our Words August 29, 2010','116938521','1600',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzUxOCZla2V5PWM0ZmZhZTA0JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzUxOCZla2V5PWM0ZmZhZTA0JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1283185120,1317218717,NULL),(15,NULL,33758,7,1,'Facing the Impossible','Facing the Impossible September 5, 2010','150443539','2074',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzc1OCZla2V5PWI1ZTZlNThhJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzc1OCZla2V5PWI1ZTZlNThhJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1283955753,1317218717,NULL),(16,NULL,33950,7,1,'Stand Up','Stand Up September 12, 2010','150793935','1936',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzk1MCZla2V5PTE2YmU0OTAxJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zMzk1MCZla2V5PTE2YmU0OTAxJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1284494154,1317218717,NULL),(17,NULL,34097,7,1,'Crisis Pregnancy','Crisis Pregnancy September 19, 2010','110203948','1547',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNDA5NyZla2V5PTI2MzBhYTA0JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNDA5NyZla2V5PTI2MzBhYTA0JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1285077104,1317218717,NULL),(18,NULL,34634,7,1,'Greatest lesson on success','September 26, 2010','340194896','2028',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNDYzNCZla2V5PTkwZThmMjZmJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNDYzNCZla2V5PTkwZThmMjZmJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1286830265,1317218717,NULL),(19,NULL,34511,7,1,'Crisis of Partying','October 3, 2010','185878574','2335',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNDUxMSZla2V5PTU2ZmRiNTgzJmNoPTIw','<object  width=\"640\" height=\"380\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNDUxMSZla2V5PTU2ZmRiNTgzJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1286830719,1317218717,NULL),(20,NULL,35085,7,1,'Suicide Awareness','October 24, 2010','158116142','1893',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTA4NSZla2V5PTlkZmY5NDQ2JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTA4NSZla2V5PTlkZmY5NDQ2JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1288215443,1317218717,NULL),(21,NULL,35322,7,1,'Prophecy Proves There is a God','October 31, 2010','166193206','2136',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTMyMiZla2V5PTM5M2FjZmIxJmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTMyMiZla2V5PTM5M2FjZmIxJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1289069559,1317218717,NULL),(22,NULL,35443,7,1,'Prophecy Proves there is a God: Part 2','November 7, 2010','149379716','2056',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTQ0MyZla2V5PTVlNjgzZTg4JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTQ0MyZla2V5PTVlNjgzZTg4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1289433159,1317218717,NULL),(23,NULL,35624,7,1,'Glory Of Jesus','November 14, 2010','121844813','1939',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTYyNCZla2V5PTFhZTIyZDNiJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTYyNCZla2V5PTFhZTIyZDNiJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1290109862,1317218717,NULL),(24,NULL,35834,7,1,'Divine Appointments and Demonic Distractions','November 21, 2010','170172154','2216',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTgzNCZla2V5PTExZGIzNjk4JmNoPTIw','<object  width=\"576\" height=\"340\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTgzNCZla2V5PTExZGIzNjk4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1290886551,1317218717,NULL),(25,NULL,35938,7,1,'The Book of Life','November 28, 2010','136777737','2487',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTkzOCZla2V5PTQ4MGYyMmM1JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNTkzOCZla2V5PTQ4MGYyMmM1JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1291215631,1317218717,NULL),(26,NULL,36121,7,1,'Resurrection of the Dead','December 5, 2010','139092040','2286',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjEyMSZla2V5PTkzNmYxZmNkJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjEyMSZla2V5PTkzNmYxZmNkJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1292268867,1317218717,NULL),(27,NULL,36452,7,1,'Life is Full of Surprises','December 20, 2010','137627571','2061',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjQ1MiZla2V5PTU5NTI5MzY3JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjQ1MiZla2V5PTU5NTI5MzY3JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1292999493,1317218717,NULL),(28,NULL,36719,7,1,'A Child Is Born: Prince of Peace','December 26, 2010','117266703','1866',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjcxOSZla2V5PWFhZjkyMjUzJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjcxOSZla2V5PWFhZjkyMjUzJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1294094727,1317218717,NULL),(29,NULL,36776,7,1,'The life of Christ: Change','January 2, 2011','113865848','1735',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjc3NiZla2V5PTQyNjY1ZTM5JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjc3NiZla2V5PTQyNjY1ZTM5JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1294243050,1317218717,NULL),(30,NULL,36972,7,1,'The life of Christ: Family','January 9, 2011','143583486','2357',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjk3MiZla2V5PTVjNmZkNjc4JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNjk3MiZla2V5PTVjNmZkNjc4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1296061404,1317218717,NULL),(31,NULL,37068,7,1,'The Life of Christ: Temptation','January 16, 2011','139506846','2214',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzA2OCZla2V5PTI2M2IzNGZjJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzA2OCZla2V5PTI2M2IzNGZjJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1296061450,1317218717,NULL),(32,NULL,37356,7,1,'The Power of Your Story','January 23, 2011','125050757','1856',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzM1NiZla2V5PTljYzQ0MmE1JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzM1NiZla2V5PTljYzQ0MmE1JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1296061460,1317218717,NULL),(33,NULL,37516,7,1,'Rejection','January 30, 2011','106955450','1805',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzUxNiZla2V5PTExMjFhMDQ4JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzUxNiZla2V5PTExMjFhMDQ4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1296629284,1317218717,NULL),(34,NULL,37650,7,1,'Healing','February 6, 2011','162400797','2469',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzY1MCZla2V5PWMxOGU1ZTY1JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzY1MCZla2V5PWMxOGU1ZTY1JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1297120810,1317218717,NULL),(35,NULL,37844,7,1,'Phillip Williams: The worst day of your Life','February 13, 2011','113068474','1663',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzg0NCZla2V5PTliZWVjMzZmJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzg0NCZla2V5PTliZWVjMzZmJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1297882628,1317218717,NULL),(36,NULL,37950,7,1,'Nick Vujicic','Feburary 20, 2011','204918107','3339',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzk1MCZla2V5PWE5ZjI4MjAwJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zNzk1MCZla2V5PWE5ZjI4MjAwJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1298336588,1317218717,NULL),(37,NULL,38208,7,1,'Overwhelmed by Grace','February 26, 2011','154611992','2236',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODIwOCZla2V5PWJiYTkxMTc4JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODIwOCZla2V5PWJiYTkxMTc4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1299090018,1317218717,NULL),(38,NULL,38330,7,1,'12 Ordinary People','12 Ordinary People\n\nMarch 6, 2011','137373601','2144',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODMzMCZla2V5PWYxYzNkOWQ1JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODMzMCZla2V5PWYxYzNkOWQ1JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1299540924,1317218717,NULL),(39,NULL,38483,7,1,'The BE Attitudes','March 13, 2011','140872159','2121',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODQ4MyZla2V5PTJiZTIyMTA0JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODQ4MyZla2V5PTJiZTIyMTA0JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1300199737,1317218717,NULL),(40,NULL,38650,7,1,'Love Revolution: Superior Love','March 21, 2011','180014419','2531',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODY1MCZla2V5PTcyNjU0ZGJkJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODY1MCZla2V5PTcyNjU0ZGJkJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1300767561,1317218717,NULL),(41,NULL,38845,7,1,'Human Relation 101','March 27, 2011','131705388','2034',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODg0NSZla2V5PTg5N2M5YTUzJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zODg0NSZla2V5PTg5N2M5YTUzJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1301523764,1317218717,NULL),(42,NULL,39021,7,1,'Worry','April 3, 2011','139319820','1973',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTAyMSZla2V5PTcyNDMxYjQ2JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTAyMSZla2V5PTcyNDMxYjQ2JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1302118302,1317218717,NULL),(43,NULL,39160,7,1,'Judging Others','March 9, 2011','126475226','1881',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTE2MCZla2V5PWE0YjczOTVkJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTE2MCZla2V5PWE0YjczOTVkJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1302836938,1317218717,NULL),(44,NULL,39317,7,1,'Palm Sunday: Jesus on a donkey','April 17, 2011','126322799','1709',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTMxNyZla2V5PTM2MTdmYmRkJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTMxNyZla2V5PTM2MTdmYmRkJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1303324698,1317218717,NULL),(45,NULL,39647,7,1,'The Carp of Life','April 30, 2011','144023643','1789',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTY0NyZla2V5PTgzYzFkM2U4JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTY0NyZla2V5PTgzYzFkM2U4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1304369606,1317218717,NULL),(46,NULL,39648,7,1,'Faith That Lifts Your Life','May 01, 2011','165531506','2121',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTY0OCZla2V5PTFkM2RhMjNjJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTY0OCZla2V5PTFkM2RhMjNjJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1304369898,1317218717,NULL),(47,NULL,39848,7,1,'Courageous Mothers','May 8, 2011','132665191','1730',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTg0OCZla2V5PWM5MWEyNmI2JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD0zOTg0OCZla2V5PWM5MWEyNmI2JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1304959975,1317218717,NULL),(48,NULL,40061,7,1,'se7en deadly sins','May 15, 2011','118226113','1579',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00MDA2MSZla2V5PWI3ZDBlZDliJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00MDA2MSZla2V5PWI3ZDBlZDliJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1305652436,1317218717,NULL),(49,NULL,46197,7,1,'Forgive First','May 22, 2011','115675177','1493',1,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjE5NyZla2V5PTk1ZGM1NGZiJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjE5NyZla2V5PTk1ZGM1NGZiJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1306252465,1317218717,NULL),(50,NULL,46338,7,1,'Taking it to the Next Level','May 29, 2011','98310982','1256',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjMzOCZla2V5PTc4NWYxNzI0JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjMzOCZla2V5PTc4NWYxNzI0JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1306858874,1317218717,NULL),(51,NULL,46539,7,1,'Help Somebody','June 6, 2011','146652759','1933',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjUzOSZla2V5PTk3OWIzNGZkJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjUzOSZla2V5PTk3OWIzNGZkJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1307476515,1317218717,NULL),(52,NULL,46694,7,1,'International Justice Mission: The Unfamiliar Passions of God','June 11, 2011','183056116','2573',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjY5NCZla2V5PTYwMjNiMWVjJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NjY5NCZla2V5PTYwMjNiMWVjJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1308146454,1317218717,NULL),(53,NULL,46844,7,1,'Fathers','June 19, 2011','148103743','1999',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00Njg0NCZla2V5PTMwODQzNDdmJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00Njg0NCZla2V5PTMwODQzNDdmJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1308681586,1317218717,NULL),(54,NULL,46978,7,1,'Six Questions for Spiritual Leaders','June 26, 2011','175467110','2250',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00Njk3OCZla2V5PWI5MzVjMDdhJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00Njk3OCZla2V5PWI5MzVjMDdhJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1309273404,1317218717,NULL),(55,NULL,47154,7,1,'Retirement?','July 2,2011','154246032','2139',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzE1NCZla2V5PTg3NDNkNWZmJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzE1NCZla2V5PTg3NDNkNWZmJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1309979210,1317218717,NULL),(56,NULL,47260,7,1,'Last Chance','July 10,2011','133882933','2057',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzI2MCZla2V5PWE1N2YxOWQwJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzI2MCZla2V5PWE1N2YxOWQwJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1310480021,1317218717,NULL),(57,NULL,47407,7,1,'RSVP','July 17,2011','123409305','1848',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzQwNyZla2V5PTk4N2E0ZmIyJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzQwNyZla2V5PTk4N2E0ZmIyJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1311080997,1317218717,NULL),(58,NULL,47522,7,1,'The Prodigal Son','July 24, 2011','122758935','1790',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzUyMiZla2V5PTVjN2UwNDY2JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzUyMiZla2V5PTVjN2UwNDY2JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1311607972,1317218717,NULL),(59,NULL,47719,7,1,'Money, Heaven & Hell','July 31,2011','133060149','1843',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzcxOSZla2V5PTNkOTE4NmM4JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00NzcxOSZla2V5PTNkOTE4NmM4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1312230506,1317218717,NULL),(60,NULL,47895,7,1,'Ken Freeman: Real Faith','August 7, 2011','183128357','2654',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00Nzg5NSZla2V5PTI1MzM5MzM5JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00Nzg5NSZla2V5PTI1MzM5MzM5JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1312840777,1317218717,NULL),(61,NULL,48108,7,1,'Who is Jesus?','August 13, 2011','154901001','2130',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODEwOCZla2V5PThlM2QzODJjJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODEwOCZla2V5PThlM2QzODJjJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1313590680,1317218717,NULL),(62,NULL,48300,7,1,'The Holy Spirit','August 21, 2011','126359379','1704',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODMwMCZla2V5PTM2ZDQzODIyJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODMwMCZla2V5PTM2ZDQzODIyJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1314128164,1317218717,NULL),(63,NULL,48463,7,1,'Henry Cloud','Ingredients for Growth\n\nAugust 28, 2011','165223684','2215',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODQ2MyZla2V5PWEwY2EzNjMzJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODQ2MyZla2V5PWEwY2EzNjMzJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1314896488,1317218717,NULL),(64,NULL,48601,7,1,'God\'s Miraculous Plan of Economy','September 4, 2011','167049008','2314',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODYwMSZla2V5PTc2MmFhY2FkJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODYwMSZla2V5PTc2MmFhY2FkJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1315413890,1317218717,NULL),(65,NULL,48729,7,1,'Pruning','September 11, 2011','176533064','2428',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODcyOSZla2V5PTkyOWIzYThlJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODcyOSZla2V5PTkyOWIzYThlJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1315934870,1317218717,NULL),(66,NULL,48896,7,1,'The Lord\'s Other Prayer','September 18, 2011','162467574','2139',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODg5NiZla2V5PWE4MTBmYmM4JmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00ODg5NiZla2V5PWE4MTBmYmM4JmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1316532602,1317218717,NULL),(67,NULL,49061,7,1,'Bad Day?','September 25, 2011','121601236','1843',0,'http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00OTA2MSZla2V5PWZhNjRjMTJlJmNoPTIw','<object  width=\"576\" height=\"344\" ><param name=\"movie\" value=\"http://cbcmedia.lightcastmedia.com/embed/dT0zMDczJnZpZD00OTA2MSZla2V5PWZhNjRjMTJlJmNoPTIw\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"Flashvars\" value=\"autoStart=1\"',NULL,NULL,'active',1317131880,1317218717,NULL);
/*!40000 ALTER TABLE `sermons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(11) unsigned NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_active_idx` (`last_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `speakers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `console_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idxfk_2` (`user_id`),
  CONSTRAINT `speakers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speakers`
--

LOCK TABLES `speakers` WRITE;
/*!40000 ALTER TABLE `speakers` DISABLE KEYS */;
INSERT INTO `speakers` VALUES (1,1,1779185131,'Robert Emmitt','Senior Pastor','robert',1317062134,NULL);
/*!40000 ALTER TABLE `speakers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `date_created` int(11) unsigned DEFAULT NULL,
  `date_modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_1` (`user_id`),
  CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urls`
--

DROP TABLE IF EXISTS `urls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  CONSTRAINT `urls_ibfk_2` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`),
  CONSTRAINT `urls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urls`
--

LOCK TABLES `urls` WRITE;
/*!40000 ALTER TABLE `urls` DISABLE KEYS */;
/*!40000 ALTER TABLE `urls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` int(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `user_id_idxfk_5` (`user_id`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tokens`
--

LOCK TABLES `user_tokens` WRITE;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Isaac','Castillo','icastillo@cbcmail.org','icemancast','b7b21e48597cd6f3ac98d3d5de1524893035677f9ea2aae5be87b787c589e884',11,1317215913,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-28  9:31:00
