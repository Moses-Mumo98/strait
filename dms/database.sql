CREATE DATABASE  IF NOT EXISTS `acdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `acdb`;
-- MySQL dump 10.13  Distrib 5.6.22, for osx10.8 (x86_64)
--
-- Host: localhost    Database: acdb
-- ------------------------------------------------------
-- Server version	5.6.39

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
-- Table structure for table `odm_access_log`
--

DROP TABLE IF EXISTS `odm_access_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_access_log` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` enum('A','B','C','V','D','M','X','I','O','Y','R') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_access_log`
--

LOCK TABLES `odm_access_log` WRITE;
/*!40000 ALTER TABLE `odm_access_log` DISABLE KEYS */;
INSERT INTO `odm_access_log` VALUES (1,2,'2018-02-12 12:32:04','A'),(1,1,'2018-02-12 12:33:23','Y'),(2,2,'2018-02-12 12:42:09','A'),(3,2,'2018-02-12 13:45:22','A'),(3,2,'2018-02-12 13:55:36','D'),(1,2,'2018-02-12 13:57:14','V'),(3,2,'2018-02-12 13:57:53','R'),(2,2,'2018-02-12 13:58:12','Y'),(1,2,'2018-02-12 15:41:09','V'),(3,2,'2018-02-12 15:45:00','R'),(4,2,'2018-02-12 15:51:14','A'),(4,2,'2018-02-12 15:51:26','R'),(3,2,'2018-02-12 15:53:15','X'),(4,2,'2018-02-12 15:53:15','X'),(5,2,'2018-02-12 15:55:35','A'),(5,2,'2018-02-12 15:55:43','R'),(5,2,'2018-02-12 15:59:48','X'),(1,4,'2018-02-12 16:14:13','V'),(1,4,'2018-02-12 16:14:26','O'),(1,4,'2018-02-12 16:14:26','D'),(1,4,'2018-02-12 16:15:13','I'),(1,4,'2018-02-12 16:15:34','Y'),(6,3,'2018-02-12 16:42:16','A'),(6,3,'2018-02-12 16:42:34','Y'),(7,2,'2018-02-13 15:56:36','A'),(7,4,'2018-02-13 15:57:15','D'),(7,2,'2018-02-13 15:57:57','Y'),(7,2,'2018-02-13 15:58:27','O'),(7,2,'2018-02-13 15:58:27','D'),(7,2,'2018-02-13 15:58:52','I'),(7,2,'2018-02-13 15:58:59','Y'),(8,2,'2018-02-13 19:09:53','A'),(8,2,'2018-02-13 19:11:47','Y'),(8,2,'2018-02-13 19:11:56','D'),(9,2,'2018-02-13 19:15:56','A'),(9,2,'2018-02-13 19:17:07','Y'),(10,3,'2018-02-13 19:21:00','A'),(11,4,'2018-02-13 19:23:06','A'),(11,2,'2018-02-13 19:23:49','V'),(11,2,'2018-02-13 19:24:14','O'),(11,2,'2018-02-13 19:24:14','D'),(11,2,'2018-02-13 19:24:55','I'),(11,2,'2018-02-13 19:25:30','Y'),(2,2,'2018-02-13 19:27:17','X'),(12,7,'2018-02-13 19:58:00','A'),(10,1,'2018-02-13 19:58:59','Y'),(12,1,'2018-02-13 19:58:59','Y'),(12,2,'2018-02-13 19:59:22','O'),(12,2,'2018-02-13 19:59:22','D'),(12,2,'2018-02-13 19:59:32','I'),(12,4,'2018-02-13 19:59:57','Y'),(12,4,'2018-02-13 20:00:14','M'),(13,7,'2018-02-13 20:12:08','A'),(13,4,'2018-02-13 20:13:45','Y'),(13,4,'2018-02-13 20:13:55','M'),(14,3,'2018-02-15 12:03:20','A'),(14,8,'2018-02-15 12:06:05','Y');
/*!40000 ALTER TABLE `odm_access_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_admin`
--

DROP TABLE IF EXISTS `odm_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_admin` (
  `id` int(11) unsigned DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_admin`
--

LOCK TABLES `odm_admin` WRITE;
/*!40000 ALTER TABLE `odm_admin` DISABLE KEYS */;
INSERT INTO `odm_admin` VALUES (1,1),(2,0),(3,0),(4,1),(5,1),(6,0),(7,0),(8,0);
/*!40000 ALTER TABLE `odm_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_category`
--

DROP TABLE IF EXISTS `odm_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_category`
--

LOCK TABLES `odm_category` WRITE;
/*!40000 ALTER TABLE `odm_category` DISABLE KEYS */;
INSERT INTO `odm_category` VALUES (1,'SOP'),(2,'Training Manual'),(3,'Letter'),(4,'Presentation');
/*!40000 ALTER TABLE `odm_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_data`
--

DROP TABLE IF EXISTS `odm_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category` int(11) unsigned NOT NULL DEFAULT '0',
  `owner` int(11) unsigned DEFAULT NULL,
  `realname` varchar(255) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT '',
  `status` smallint(6) DEFAULT NULL,
  `department` smallint(6) unsigned DEFAULT NULL,
  `default_rights` tinyint(4) DEFAULT NULL,
  `publishable` tinyint(4) DEFAULT NULL,
  `reviewer` int(11) unsigned DEFAULT NULL,
  `reviewer_comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_idx` (`id`,`owner`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `publishable` (`publishable`),
  KEY `description` (`description`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_data`
--

LOCK TABLES `odm_data` WRITE;
/*!40000 ALTER TABLE `odm_data` DISABLE KEYS */;
INSERT INTO `odm_data` VALUES (1,3,2,'114764__5.PDF','2018-02-12 12:32:04','Test file','test',0,2,0,1,4,'To= Author(s);Subject=;Comments=;'),(6,3,3,'114732_INSPE_2.PDF','2018-02-12 16:42:16','test vino','test vino',0,3,0,1,3,'To= Author(s);Subject=;Comments=;'),(2,3,2,'138311__2.PDF','2018-02-12 12:42:09','test2','test2',0,2,0,2,2,'To= Author(s);Subject=;Comments=;'),(3,3,2,'114732__1.PDF','2018-02-12 13:45:22','test3','test3',0,2,0,2,2,'To=Author(s);Subject=;Comments=;'),(4,3,2,'137814__4.PDF','2018-02-12 15:51:14','test4','4',0,2,0,2,2,'To=Author(s);Subject=;Comments=;'),(5,3,2,'137814__4.PDF','2018-02-12 15:55:35','test5','test5',0,2,0,2,2,'To=Author(s);Subject=;Comments=;'),(7,3,2,'test3.PDF','2018-02-13 15:56:36','test2','',0,2,0,1,2,'To= Author(s);Subject=;Comments=;'),(8,2,2,'test5.PDF','2018-02-13 19:09:53','bank statement','',0,2,0,1,2,'To= Author(s);Subject=;Comments=;'),(9,1,2,'test9.PDF','2018-02-13 19:15:56','HMRC','',0,2,0,1,2,'To= Author(s);Subject=;Comments=;'),(10,3,3,'test11.PDF','2018-02-13 19:21:00','','',0,3,0,1,1,'To= Author(s);Subject=;Comments=;'),(11,3,4,'test13.PDF','2018-02-13 19:23:06','please sign','',0,2,0,1,2,'To= Author(s);Subject=;Comments=checked;'),(12,3,7,'test11.PDF','2018-02-13 19:58:00','companies house','',0,2,0,1,4,'To= Author(s);Subject=;Comments=;'),(13,4,7,'test7.PDF','2018-02-13 20:12:08','','',0,2,0,1,4,'To= Author(s);Subject=;Comments=;'),(14,3,3,'test4.PDF','2018-02-15 12:03:20','test vino','',0,3,0,1,8,'To= Author(s);Subject=;Comments=;');
/*!40000 ALTER TABLE `odm_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_department`
--

DROP TABLE IF EXISTS `odm_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_department`
--

LOCK TABLES `odm_department` WRITE;
/*!40000 ALTER TABLE `odm_department` DISABLE KEYS */;
INSERT INTO `odm_department` VALUES (4,'DESAUR AND CO'),(2,'ANU CONSULTING LIMITED'),(3,'VINO CONSULTING LIMITED'),(5,'PARAM TECHNOLOGIES');
/*!40000 ALTER TABLE `odm_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_dept_perms`
--

DROP TABLE IF EXISTS `odm_dept_perms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_dept_perms` (
  `fid` int(11) unsigned DEFAULT NULL,
  `dept_id` int(11) unsigned DEFAULT NULL,
  `rights` tinyint(4) NOT NULL DEFAULT '0',
  KEY `rights` (`rights`),
  KEY `dept_id` (`dept_id`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_dept_perms`
--

LOCK TABLES `odm_dept_perms` WRITE;
/*!40000 ALTER TABLE `odm_dept_perms` DISABLE KEYS */;
INSERT INTO `odm_dept_perms` VALUES (1,2,1),(1,2,-1),(2,2,4),(2,2,-1),(3,2,1),(3,2,0),(4,2,1),(4,2,0),(5,2,1),(5,2,0),(6,2,0),(6,4,0),(6,3,4),(7,2,1),(7,4,-1),(7,3,-1),(8,2,1),(8,4,-1),(8,3,-1),(9,2,1),(9,4,-1),(9,3,-1),(10,2,-1),(10,4,-1),(10,3,1),(11,2,-1),(11,4,1),(11,3,-1),(12,3,-1),(12,5,-1),(12,4,3),(12,2,3),(13,3,-1),(13,5,-1),(13,4,1),(13,2,-1),(14,2,-1),(14,4,-1),(14,5,-1),(14,3,1);
/*!40000 ALTER TABLE `odm_dept_perms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_dept_reviewer`
--

DROP TABLE IF EXISTS `odm_dept_reviewer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_dept_reviewer` (
  `dept_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_dept_reviewer`
--

LOCK TABLES `odm_dept_reviewer` WRITE;
/*!40000 ALTER TABLE `odm_dept_reviewer` DISABLE KEYS */;
INSERT INTO `odm_dept_reviewer` VALUES (2,1),(2,2),(3,3),(2,7),(5,6),(5,7),(4,8),(3,8);
/*!40000 ALTER TABLE `odm_dept_reviewer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_filetypes`
--

DROP TABLE IF EXISTS `odm_filetypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_filetypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_filetypes`
--

LOCK TABLES `odm_filetypes` WRITE;
/*!40000 ALTER TABLE `odm_filetypes` DISABLE KEYS */;
INSERT INTO `odm_filetypes` VALUES (1,'image/gif',1),(2,'text/html',1),(3,'text/plain',1),(4,'application/pdf',1),(5,'image/pdf',1),(6,'application/x-pdf',1),(7,'application/msword',1),(8,'image/jpeg',1),(9,'image/pjpeg',1),(10,'image/png',1),(11,'application/msexcel',1),(12,'application/msaccess',1),(13,'text/richtxt',1),(14,'application/mspowerpoint',1),(15,'application/octet-stream',1),(16,'application/x-zip-compressed',1),(17,'application/x-zip',1),(18,'application/zip',1),(19,'image/tiff',1),(20,'image/tif',1),(21,'application/vnd.ms-powerpoint',1),(22,'application/vnd.ms-excel',1),(23,'application/vnd.openxmlformats-officedocument.presentationml.presentation',1),(24,'application/vnd.openxmlformats-officedocument.wordprocessingml.document',1),(25,'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',1),(26,'application/vnd.oasis.opendocument.chart',1),(27,'application/vnd.oasis.opendocument.chart-template',1),(28,'application/vnd.oasis.opendocument.formula',1),(29,'application/vnd.oasis.opendocument.formula-template',1),(30,'application/vnd.oasis.opendocument.graphics',1),(31,'application/vnd.oasis.opendocument.graphics-template',1),(32,'application/vnd.oasis.opendocument.image',1),(33,'application/vnd.oasis.opendocument.image-template',1),(34,'application/vnd.oasis.opendocument.presentation',1),(35,'application/vnd.oasis.opendocument.presentation-template',1),(36,'application/vnd.oasis.opendocument.spreadsheet',1),(37,'application/vnd.oasis.opendocument.spreadsheet-template',1),(38,'application/vnd.oasis.opendocument.text',1),(39,'application/vnd.oasis.opendocument.text-master',1),(40,'application/vnd.oasis.opendocument.text-template',1),(41,'application/vnd.oasis.opendocument.text-web',1),(42,'text/csv',1),(43,'audio/mpeg',0),(44,'image/x-dwg',1),(45,'image/x-dfx',1),(46,'drawing/x-dwf',1),(47,'image/svg',1),(48,'video/3gpp',1);
/*!40000 ALTER TABLE `odm_filetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_log`
--

DROP TABLE IF EXISTS `odm_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_log` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(25) DEFAULT NULL,
  `note` text,
  `revision` varchar(255) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `modified_on` (`modified_on`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_log`
--

LOCK TABLES `odm_log` WRITE;
/*!40000 ALTER TABLE `odm_log` DISABLE KEYS */;
INSERT INTO `odm_log` VALUES (1,'2018-02-12 12:32:04','van','Initial import','0'),(2,'2018-02-12 12:42:09','van','Initial import','current'),(3,'2018-02-12 13:45:22','van','Initial import','current'),(4,'2018-02-12 15:51:14','van','Initial import','current'),(5,'2018-02-12 15:55:35','van','Initial import','current'),(1,'2018-02-12 16:15:13','vishan','','current'),(6,'2018-02-12 16:42:16','siva','Initial import','current'),(7,'2018-02-13 15:56:36','van','Initial import','0'),(7,'2018-02-13 15:58:52','van','','current'),(8,'2018-02-13 19:09:53','van','Initial import','current'),(9,'2018-02-13 19:15:56','van','Initial import','current'),(10,'2018-02-13 19:21:00','siva','Initial import','current'),(11,'2018-02-13 19:23:06','vishan','Initial import','0'),(11,'2018-02-13 19:24:55','van','Signed ','current'),(12,'2018-02-13 19:58:00','amalia','Initial import','0'),(12,'2018-02-13 19:59:32','van','','current'),(13,'2018-02-13 20:12:08','amalia','Initial import','current'),(14,'2018-02-15 12:03:20','siva','Initial import','current');
/*!40000 ALTER TABLE `odm_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_odmsys`
--

DROP TABLE IF EXISTS `odm_odmsys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_odmsys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_name` varchar(16) DEFAULT NULL,
  `sys_value` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_odmsys`
--

LOCK TABLES `odm_odmsys` WRITE;
/*!40000 ALTER TABLE `odm_odmsys` DISABLE KEYS */;
INSERT INTO `odm_odmsys` VALUES (1,'version','1.3.0');
/*!40000 ALTER TABLE `odm_odmsys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_rights`
--

DROP TABLE IF EXISTS `odm_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_rights` (
  `RightId` tinyint(4) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_rights`
--

LOCK TABLES `odm_rights` WRITE;
/*!40000 ALTER TABLE `odm_rights` DISABLE KEYS */;
INSERT INTO `odm_rights` VALUES (0,'none'),(1,'view'),(-1,'forbidden'),(2,'read'),(3,'write'),(4,'admin');
/*!40000 ALTER TABLE `odm_rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_settings`
--

DROP TABLE IF EXISTS `odm_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `validation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_settings`
--

LOCK TABLES `odm_settings` WRITE;
/*!40000 ALTER TABLE `odm_settings` DISABLE KEYS */;
INSERT INTO `odm_settings` VALUES (1,'debug','False','(True/False) - Default=False - Debug the installation (not working)','bool'),(2,'demo','False','(True/False) This setting is for a demo installation, where random people will be all loggging in as the same username/password like \"demo/demo\". This will keep users from removing files, users, etc.','bool'),(3,'authen','mysql','(Default = mysql) Currently only MySQL authentication is supported',''),(4,'title','Desaur Document Repository','This is the browser window title','maxsize=255'),(5,'site_mail','root@localhost','The email address of the administrator of this site','email|maxsize=255|req'),(6,'root_id','1','This variable sets the root user id.  The root user will be able to access all files and have authority for everything.','num|req'),(7,'dataDir','/Library/WebServer/Documents/opendocman/data/','location of file repository. This should ideally be outside the Web server root. Make sure the server has permissions to read/write files to this folder!. (Examples: Linux - /var/www/document_repository/ : Windows - c:/document_repository/','maxsize=255'),(8,'max_filesize','5000000','Set the maximum file upload size','num|maxsize=255'),(9,'revision_expiration','90','This var sets the amount of days until each file needs to be revised,  assuming that there are 30 days in a month for all months.','num|maxsize=255'),(10,'file_expired_action','1','Choose an action option when a file is found to be expired The first two options also result in sending email to reviewer  (1) Remove from file list until renewed (2) Show in file list but non-checkoutable (3) Send email to reviewer only (4) Do Nothing','num'),(11,'authorization','True','True or False. If set True, every document must be reviewed by an admin before it can go public. To disable set to False. If False, all newly added/checked-in documents will immediately be listed','bool'),(12,'allow_signup','False','Should we display the sign-up link?','bool'),(13,'allow_password_reset','False','Should we allow users to reset their forgotten password?','bool'),(14,'try_nis','False','Attempt NIS password lookups from YP server?','bool'),(15,'theme','tweeter','Which theme to use?',''),(16,'language','english','Set the default language (english, spanish, turkish, etc.). Local users may override this setting. Check include/language folder for languages available','alpha|req'),(17,'base_url','http://localhost/opendocman','Set this to the url of the site. No need for trailing \"/\" here','url'),(18,'max_query','500','Set this to the maximum number of rows you want to be returned in a file listing.','num');
/*!40000 ALTER TABLE `odm_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_udf`
--

DROP TABLE IF EXISTS `odm_udf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_udf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(50) DEFAULT NULL,
  `display_name` varchar(16) DEFAULT NULL,
  `field_type` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_udf`
--

LOCK TABLES `odm_udf` WRITE;
/*!40000 ALTER TABLE `odm_udf` DISABLE KEYS */;
/*!40000 ALTER TABLE `odm_udf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_user`
--

DROP TABLE IF EXISTS `odm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `department` int(11) unsigned DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `pw_reset_code` char(32) DEFAULT NULL,
  `can_add` tinyint(1) DEFAULT '1',
  `can_checkin` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_user`
--

LOCK TABLES `odm_user` WRITE;
/*!40000 ALTER TABLE `odm_user` DISABLE KEYS */;
INSERT INTO `odm_user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',2,'5555551212','kansar1976@gmail.com','User','Admin','',1,1),(2,'van','a0e70be9e8f538282678aecf1ecc1f43',2,'3724897238947','kansar1976@gmail.com','Saravanan','Kanagaraju',NULL,1,1),(3,'siva','104827e490dbbdbd83866776079d2cd0',3,'623453532414','sivakumar.vedaguiry@gmail.com','Sivakumar','Vedaguiry',NULL,1,1),(4,'vishan','56a1f48cb753f04418de8ff11731d3ea',4,'3748237499','vishan@desaurandco.com','Vishan','Subramaniam',NULL,1,1),(5,'sysuser','8a3bd444432e63c50668b1800a2cadea',2,'5555551212','admin@desaurandco.com','User2','Admin','',1,1),(6,'sridhar','b3cfc62901450c772a6126b85c4c5fea',5,'34897842','sridhar@dshfkjs.com','Jakkula','Sridhar',NULL,1,1),(7,'amalia','4e5e038025fc95fc75128c172c7149a7',4,'423','amalia@sdhfkjshf.com','Dobra','Amalia',NULL,1,1),(8,'betty','d445873ad087dffe49a620ffdef73ab1',4,'374982437','betty@ueiweru.com','Something','Betty',NULL,1,1);
/*!40000 ALTER TABLE `odm_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odm_user_perms`
--

DROP TABLE IF EXISTS `odm_user_perms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odm_user_perms` (
  `fid` int(11) unsigned DEFAULT NULL,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `rights` tinyint(4) NOT NULL DEFAULT '0',
  KEY `user_perms_idx` (`fid`,`uid`,`rights`),
  KEY `fid` (`fid`),
  KEY `uid` (`uid`),
  KEY `rights` (`rights`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odm_user_perms`
--

LOCK TABLES `odm_user_perms` WRITE;
/*!40000 ALTER TABLE `odm_user_perms` DISABLE KEYS */;
INSERT INTO `odm_user_perms` VALUES (1,1,4),(1,2,4),(2,1,4),(2,2,4),(3,2,4),(4,2,4),(5,2,4),(6,3,4),(7,2,4),(8,2,4),(9,2,4),(10,3,4),(11,4,4),(12,2,3),(12,4,4),(12,7,4),(13,4,4),(13,7,4),(14,3,4);
/*!40000 ALTER TABLE `odm_user_perms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_assignments`
--

DROP TABLE IF EXISTS `ts_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_assignments` (
  `proj_id` int(11) NOT NULL DEFAULT '0',
  `username` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`proj_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_assignments`
--

LOCK TABLES `ts_assignments` WRITE;
/*!40000 ALTER TABLE `ts_assignments` DISABLE KEYS */;
INSERT INTO `ts_assignments` VALUES (1,'van'),(2,'van'),(3,'admin');
/*!40000 ALTER TABLE `ts_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_client`
--

DROP TABLE IF EXISTS `ts_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_client` (
  `client_id` int(8) NOT NULL AUTO_INCREMENT,
  `organisation` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `address1` varchar(127) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `state` varchar(80) DEFAULT NULL,
  `country` char(2) DEFAULT NULL,
  `postal_code` varchar(13) DEFAULT NULL,
  `contact_first_name` varchar(127) DEFAULT NULL,
  `contact_last_name` varchar(127) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `contact_email` varchar(127) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `fax_number` varchar(20) DEFAULT NULL,
  `gsm_number` varchar(20) DEFAULT NULL,
  `http_url` varchar(127) DEFAULT NULL,
  `address2` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_client`
--

LOCK TABLES `ts_client` WRITE;
/*!40000 ALTER TABLE `ts_client` DISABLE KEYS */;
INSERT INTO `ts_client` VALUES (1,'No Client','This is required, do not edit or delete this client record','','','','','','','','','','','','','',''),(2,'ANU CONSULTING LIMITED','ANU CONSULTING LIMITED','4 BARRY FARMS','LEICESTER','L','UK','LE1 1AA','Saravanan','Kanagaraju','van','','','','','','');
/*!40000 ALTER TABLE `ts_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_config`
--

DROP TABLE IF EXISTS `ts_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_config` (
  `config_set_id` int(1) NOT NULL DEFAULT '0',
  `version` varchar(32) NOT NULL DEFAULT '1.2.1',
  `headerhtml` mediumtext NOT NULL,
  `bodyhtml` mediumtext NOT NULL,
  `footerhtml` mediumtext NOT NULL,
  `errorhtml` mediumtext NOT NULL,
  `bannerhtml` mediumtext NOT NULL,
  `tablehtml` mediumtext NOT NULL,
  `locale` varchar(127) DEFAULT NULL,
  `timezone` varchar(127) DEFAULT NULL,
  `timeformat` enum('12','24') NOT NULL DEFAULT '12',
  `weekstartday` tinyint(4) NOT NULL DEFAULT '0',
  `useLDAP` tinyint(4) NOT NULL DEFAULT '0',
  `LDAPScheme` varchar(32) DEFAULT NULL,
  `LDAPHost` varchar(255) DEFAULT NULL,
  `LDAPPort` int(11) DEFAULT NULL,
  `LDAPBaseDN` varchar(255) DEFAULT NULL,
  `LDAPUsernameAttribute` varchar(255) DEFAULT NULL,
  `LDAPSearchScope` enum('base','sub','one') NOT NULL DEFAULT 'base',
  `LDAPFilter` varchar(255) DEFAULT NULL,
  `LDAPProtocolVersion` varchar(255) DEFAULT '3',
  `LDAPBindUsername` varchar(255) DEFAULT '',
  `LDAPBindPassword` varchar(255) DEFAULT '',
  PRIMARY KEY (`config_set_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_config`
--

LOCK TABLES `ts_config` WRITE;
/*!40000 ALTER TABLE `ts_config` DISABLE KEYS */;
INSERT INTO `ts_config` VALUES (1,'1.2.1','<META name=\"description\" content=\"Timesheet.php Employee/Contractor Timesheets\">\r\n<link href=\"css/timesheet.css\" rel=\"stylesheet\" type=\"text/css\">','link=\"#004E8A\" vlink=\"#171A42\"','<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\r\n<tr><td style=\"background-color: #000788; padding: 3;\" class=\"bottom_bar_text\" align=\"center\">\r\n\r\n<span style=\"font-size: 9px;\"><b>Page generated %time% %date% (%timezone% time)</b></span>\r\n\r\n</td></tr></table>','<TABLE border=0 cellpadding=5 width=\"100%\">\r\n<TR><TD><FONT size=\"+2\" color=\"red\">%errormsg%</FONT></TD></TR></TABLE>\r\n<P>Please go <A href=\"javascript:history.back()\">Back</A> and try again.</P>','<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr>\r\n<td colspan=\"2\" background=\"images/timesheet_background_pattern.gif\"><img src=\"images/timesheet_banner.gif\"></td></tr><tr>\r\n\r\n<td style=\"background-color: #F2F3FF; padding: 3;\">%commandmenu%</td>\r\n<td style=\"background-color: #F2F3FF; padding: 3;\" align=\"right\" width=\"145\" valign=\"top\">You are logged in as %username%</td>\r\n</tr><td colspan=\"2\" height=\"1\" style=\"background-color: #758DD6;\"><img src=\"images/spacer.gif\" width=\"1\" height=\"1\"></td></tr>\r\n</table>','','en_GB','UK/London','12',1,0,'ldap','watson',389,'dc=watson','cn','base','','3','','');
/*!40000 ALTER TABLE `ts_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_note`
--

DROP TABLE IF EXISTS `ts_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_note` (
  `note_id` int(6) NOT NULL AUTO_INCREMENT,
  `proj_id` int(8) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subject` varchar(127) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `to_contact` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_note`
--

LOCK TABLES `ts_note` WRITE;
/*!40000 ALTER TABLE `ts_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `ts_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_project`
--

DROP TABLE IF EXISTS `ts_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_project` (
  `proj_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL DEFAULT '1970-01-01',
  `deadline` date NOT NULL DEFAULT '0000-00-00',
  `http_link` varchar(127) DEFAULT NULL,
  `proj_status` enum('Pending','Started','Suspended','Complete') NOT NULL DEFAULT 'Pending',
  `proj_leader` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_project`
--

LOCK TABLES `ts_project` WRITE;
/*!40000 ALTER TABLE `ts_project` DISABLE KEYS */;
INSERT INTO `ts_project` VALUES (2,'GDPR',2,'GDPR project','2018-02-17','2018-03-31','','Started','admin');
/*!40000 ALTER TABLE `ts_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_task`
--

DROP TABLE IF EXISTS `ts_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(127) NOT NULL DEFAULT '',
  `description` text,
  `assigned` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `started` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `suspended` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `completed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Pending','Assigned','Started','Suspended','Complete') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_task`
--

LOCK TABLES `ts_task` WRITE;
/*!40000 ALTER TABLE `ts_task` DISABLE KEYS */;
INSERT INTO `ts_task` VALUES (2,3,'Default Task','','2018-02-17 03:37:00','2018-02-17 03:37:00','0000-00-00 00:00:00','0000-00-00 00:00:00','Started'),(4,2,'Design','design','2018-02-17 03:48:00','2018-02-17 03:48:00','0000-00-00 00:00:00','0000-00-00 00:00:00','Started');
/*!40000 ALTER TABLE `ts_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_task_assignments`
--

DROP TABLE IF EXISTS `ts_task_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_task_assignments` (
  `task_id` int(8) NOT NULL DEFAULT '0',
  `username` varchar(32) NOT NULL DEFAULT '',
  `proj_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`task_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_task_assignments`
--

LOCK TABLES `ts_task_assignments` WRITE;
/*!40000 ALTER TABLE `ts_task_assignments` DISABLE KEYS */;
INSERT INTO `ts_task_assignments` VALUES (1,'van',1),(2,'admin',3),(4,'van',1);
/*!40000 ALTER TABLE `ts_task_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_times`
--

DROP TABLE IF EXISTS `ts_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_times` (
  `uid` varchar(32) NOT NULL DEFAULT '',
  `start_time` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trans_num` int(11) NOT NULL AUTO_INCREMENT,
  `proj_id` int(11) NOT NULL DEFAULT '1',
  `task_id` int(11) NOT NULL DEFAULT '1',
  `log_message` varchar(255) DEFAULT NULL,
  UNIQUE KEY `trans_num` (`trans_num`),
  KEY `uid` (`uid`,`trans_num`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_times`
--

LOCK TABLES `ts_times` WRITE;
/*!40000 ALTER TABLE `ts_times` DISABLE KEYS */;
INSERT INTO `ts_times` VALUES ('admin','2018-02-17 03:44:00','2018-02-17 03:45:00',1,-1,-1,'test'),('admin','2018-02-17 03:44:00','2018-02-17 03:45:00',2,-1,-1,'test'),('admin','2018-02-17 03:45:00','2018-02-17 03:45:00',3,-1,-1,'test'),('admin','2018-02-17 18:07:00','0000-00-00 00:00:00',4,-1,-1,NULL);
/*!40000 ALTER TABLE `ts_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ts_user`
--

DROP TABLE IF EXISTS `ts_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_user` (
  `username` varchar(32) NOT NULL DEFAULT '',
  `level` int(11) NOT NULL DEFAULT '0',
  `password` varchar(41) NOT NULL DEFAULT '',
  `allowed_realms` varchar(20) NOT NULL DEFAULT '.*',
  `first_name` varchar(64) NOT NULL DEFAULT '',
  `last_name` varchar(64) NOT NULL DEFAULT '',
  `email_address` varchar(63) NOT NULL DEFAULT '',
  `phone` varchar(31) NOT NULL DEFAULT '',
  `bill_rate` decimal(8,2) NOT NULL DEFAULT '0.00',
  `time_stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `status` enum('IN','OUT') NOT NULL DEFAULT 'OUT',
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`username`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ts_user`
--

LOCK TABLES `ts_user` WRITE;
/*!40000 ALTER TABLE `ts_user` DISABLE KEYS */;
INSERT INTO `ts_user` VALUES ('admin',10,'d033e22ae348aeb5660fc2140aec35850c4da997','.*','Timesheet','Admin','','',0.00,'0000-00-00 00:00:00.000000','OUT',1),('van',1,'e24088f8b54761a0123fd980bab84da2e2a4750c','.*','Saravanan','Kanagaraju','kansar1976@gmail.com','3472487623',0.00,'0000-00-00 00:00:00.000000','OUT',2);
/*!40000 ALTER TABLE `ts_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'acdb'
--

--
-- Dumping routines for database 'acdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-18 11:22:49
