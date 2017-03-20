-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB-1~xenial

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,1,'this is my comment'),(2,7,1,'This is my first Comment');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `post_head` varchar(64) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius, dui vel tincidunt luctus, tortor eros lacinia urna, eget bibendum nunc ligula a massa. Integer urna augue, efficitur id arcu eget, venenatis aliquet nisi. Quisque ex arcu, iaculis in auctor vel, elementum tristique sem. Maecenas laoreet tellus id molestie semper. Sed eget arcu quis ligula pellentesque viverra. Ut eget ipsum vitae nunc ultricies tincidunt. Duis pellentesque venenatis sapien a fermentum. In malesuada enim ante, quis malesuada ex scelerisque vel. Phasellus ante dui, interdum sit amet faucibus eu, vulputate vitae sem. Nulla in tellus pharetra, facilisis mi tempus, cursus sapien. Sed magna ipsum, consectetur ac fermentum posuere, tempus eu felis. Phasellus aliquam semper efficitur. Mauris tincidunt non orci iaculis tincidunt. Morbi in luctus felis. Sed eget turpis facilisis, pulvinar mi sed, lobortis risus. Nunc gravida vel justo vel varius.'),(2,1,'Paragraph','Integer maximus sodales dictum. Ut libero lacus, pretium in nunc quis, venenatis hendrerit mauris. Duis vitae elit nec risus tincidunt eleifend. Integer sed semper sem. Duis enim ante, ullamcorper at nibh eu, suscipit ullamcorper nisl. Sed volutpat viverra finibus. Fusce neque lectus, laoreet vel interdum ut, bibendum in lorem. Morbi lectus odio, interdum in viverra a, eleifend sed lacus. Aliquam et enim in eros semper aliquam. Vestibulum sed commodo nisl, et finibus erat. Integer aliquam euismod orci in dignissim. Vestibulum ipsum diam, dictum ut libero ut, consequat consequat tellus. Sed consequat tortor vel felis luctus pulvinar. Fusce volutpat quam velit, ut venenatis eros egestas ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lacinia consequat vestibulum.'),(3,1,'Sed odio libero','Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla cursus mi vitae convallis sollicitudin. In hac habitasse platea dictumst. Nam consequat rhoncus nulla, in ullamcorper neque placerat quis. Nunc efficitur facilisis quam. Nunc id lacinia metus. Duis ut ullamcorper nulla, sit amet congue justo. Mauris mi ante, laoreet vel mollis sed, dapibus non felis. Aenean at mi sit amet diam molestie consectetur. Maecenas ut orci augue. Vestibulum mattis nisl vel arcu imperdiet venenatis. Aliquam erat volutpat.'),(4,1,'Donec ac imperdiet justo','Ac placerat sem. Integer convallis nisi vel commodo accumsan. Praesent sed lectus ornare, ultrices nisi sodales, volutpat orci. Mauris molestie varius maximus. Aenean finibus scelerisque ipsum, eu rutrum risus rutrum eu. Quisque volutpat rutrum odio, sodales aliquam nunc gravida at. Cras quis enim non tellus sodales posuere. Donec ut porttitor purus. Nunc suscipit ante at commodo auctor. Ut sit amet justo magna.\r\n\r\nAenean ultricies, velit pharetra scelerisque commodo, enim sem facilisis massa, at vulputate neque ante id nisi. Sed accumsan risus at laoreet rutrum. Phasellus sodales neque mauris, eu fermentum augue efficitur id. Nullam pulvinar, magna sodales gravida aliquet, velit justo consequat nibh, id ultricies diam ex ac leo. Praesent malesuada nulla tellus, eget cursus nisi condimentum eu. Duis vel tincidunt odio, et rutrum tellus. Integer dolor arcu, tempus quis placerat vel, tincidunt at eros.\r\n\r\nInteger et elit sit amet velit gravida vulputate. Nullam egestas rutrum enim, ut placerat sem condimentum vitae. In hac habitasse platea dictumst. Pellentesque vel arcu quis elit mollis luctus et ut nisl. Cras tristique turpis eget diam bibendum rutrum. Aliquam tristique magna quis nunc porta congue. Integer at risus efficitur, porttitor turpis in, aliquet quam. Duis efficitur, risus ac faucibus feugiat, nulla nisl efficitur nulla, a blandit mi metus nec risus. Vivamus faucibus posuere sapien, a mollis metus aliquam in. Integer scelerisque metus sit amet nulla sagittis, nec volutpat neque vehicula. Curabitur blandit risus et sodales tincidunt. Ut est dui, eleifend sit amet consequat id, dignissim sed erat. Proin sollicitudin ipsum quis mi consequat, non lacinia nulla posuere. Maecenas mattis interdum sagittis. Curabitur semper est eu elit pulvinar blandit.'),(5,1,'dolorem ipsum ','Proin porta nulla eget elit condimentum porttitor. Vivamus eu ante nunc. Donec nec pellentesque justo. Quisque mollis diam vel lorem interdum tempor ac ac purus. Nunc efficitur nulla eu viverra pretium. Donec massa orci, laoreet eget orci vitae, vestibulum blandit massa. Curabitur rhoncus, nisi eu posuere mattis, dui turpis pharetra orci, quis volutpat augue nibh a eros. Aliquam volutpat eros magna, at euismod nisl venenatis a.<br>\r\n\r\n\r\n\r\n\r\n\r\n\r\nVivamus a odio vel justo consequat gravida. Nunc ornare semper tempor. Nam vel mauris sodales, varius ante laoreet, malesuada urna. Proin purus nibh, varius non metus a, consequat porttitor felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed fermentum porttitor dignissim. Fusce posuere nunc quis ex rutrum, ac ultrices justo tincidunt.'),(6,1,'Fusce posuere','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id nunc est. Mauris porttitor elementum purus, non tempor ante. Praesent placerat mi tellus, id vehicula ipsum iaculis vel. Ut congue ultricies ipsum vitae blandit. Donec aliquam lectus consectetur, egestas risus eget, malesuada lorem. Nullam non risus sed magna sagittis gravida. Sed lobortis a nunc et dignissim. Etiam tincidunt quis orci nec lacinia. Sed porta vulputate tortor id lacinia. Vestibulum justo libero, bibendum sit amet arcu at, imperdiet lacinia tellus. Nulla vitae eros vitae nunc dapibus condimentum. Duis commodo turpis libero.\r\n<br>\r\nSuspendisse potenti. Maecenas at fermentum ante. Phasellus in euismod lacus. Integer imperdiet, metus a laoreet facilisis, nisl risus fringilla quam, condimentum faucibus odio massa vel odio. Etiam placerat fringilla tincidunt. Donec hendrerit quis ligula vel dictum. Ut ullamcorper magna a mollis cursus. Nam fermentum finibus tincidunt. Mauris ultrices tincidunt risus ut scelerisque. Cras vel aliquet lectus. Pellentesque mollis suscipit lectus quis dapibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas vulputate nibh neque, eget congue odio ultricies ut. Praesent egestas neque ut venenatis sollicitudin. Nunc a ipsum vel quam consequat rutrum sit amet ut urna. Donec suscipit tincidunt tortor, sed dignissim erat tempor eu.'),(7,1,'Hello World','Sed suscipit fermentum risus, eget porta ipsum. Maecenas ullamcorper, mi semper auctor scelerisque, odio nibh pellentesque neque, ut egestas sem nisl blandit sapien. Pellentesque id ante ut dui fermentum pharetra ut vel neque. Etiam vitae consequat felis. Suspendisse potenti. Nam urna diam, tincidunt non condimentum a, ullamcorper vitae metus. Mauris faucibus turpis at luctus ornare.\r\n\r\nOrci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed libero dui, hendrerit at quam et, pretium interdum sem. Donec ac vestibulum ligula, nec aliquet erat. Donec pellentesque dui turpis, ut rhoncus massa lobortis nec. In lobortis felis lorem, non pellentesque sem mattis vel. Pellentesque a pharetra lectus, et vulputate urna. Aliquam felis magna, aliquam vel odio et, ullamcorper pulvinar augue. Morbi facilisis magna diam. Aliquam ac eros commodo, interdum sapien et, varius quam. Nullam accumsan dignissim lorem, sit amet varius sapien porttitor sodales. Aenean porta enim leo, non sollicitudin odio hendrerit nec. Mauris velit urna, porttitor nec nisl eget, condimentum vehicula ex. Morbi suscipit, felis pharetra pharetra vestibulum, mauris sapien mollis nulla, eget sodales mi arcu at ipsum.');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2017-03-20 11:44:59
