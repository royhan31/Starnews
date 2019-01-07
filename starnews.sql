-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: starnews
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `slug` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (17,'Kriminal','Kriminal','2019-01-05 19:20:25','2019-01-06 18:03:33'),(18,'Politik','Politik','2019-01-05 19:26:21','2019-01-06 18:03:23'),(19,'Artis','Artis','2019-01-06 18:03:44','2019-01-07 08:21:40'),(22,'Umum','Umum','2019-01-07 06:42:54','2019-01-07 06:42:54');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

--
-- Table structure for table `posts`
--

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Izzatur Royhan','royhan@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,'2019-01-05 14:59:33','2019-01-05 14:59:33');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;


DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `content` longtext,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_posts` (`user_id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,'Nurhadi-Aldo: Dari tukang pijat sampai jadi pasangan capres 2019','Nurhadi-Aldo-Dari-tukang-pijat-sampai-jadi-pasangan-capres-2019','     Beberapa pekan terakhir ini, para pengguna media sosial mungkin sulit menghindar dari pasangan calon presiden bernama Nurhadi-Aldo.Sekilas, poster Nurhadi-Aldo tampak seperti pasangan politikus yang sungguh-sungguh ingin memikat para pemilih: dua pria setengah baya bersongkok, dengan nama partai dan slogan kampanye.','nurhadi-aldo-poster.jpg',18,1,'2019-01-06 15:05:27','2019-01-06 20:31:03'),(8,'Polisi Sebut Vanessa Angel Pasang Tarif Rp 80 Juta Sekali Kencan','Polisi-Sebut-Vanessa-Angel-Pasang-Tarif-Rp-80-Juta-Sekali-Kencan',' Wakil Direktur Reserse Kriminal Khusus (Wadirreskrimsus) Polda Jatim AKBP Arman Asmara Syarifuddin mengungkapkan, pihaknya mengamankan dua orang manajemen artis yang diduga sebagai mucikari. Sementara dua orang lainnya berinisial VA dan AF diamankan ke Polda Jatim. Namun, empat orang yang diamankan masih diamankan dan diperiksa sebagai saksi.','whq1pwrovcmksgtexpca.jpg',19,1,'2019-01-07 05:55:59','2019-01-07 05:56:34'),(9,'Singel terbaru Band Kufaku mendapat banyak pujian dari seluruh indonesia','Singel-terbaru-Band-Kufaku-mendapat-banyak-pujian-dari-seluruh-indonesia','Cakram padat itu bersampul warna krim dengan gambar penyanyi solo maupun grup band di bagian depan. Ada Raisa, Tommy Kagangan, Teuku Wisnu dan Shireen Sungkar, Ran, Dewi Sandra featuring Alam Urbach, Mahirs Band, dan Ada Band.Di antara deretan penyanyi dan grup band yang sudah tenar itu, ada juga gambar dan nama Kufaku dalam album berjudul&nbsp;Soundtract Terbaik 2019.Di bagian belakang cover album kompilasi, tersusun judul lagu dan penyanyi yang mengisi album produksi Universal Music Indonesia dan MD Music itu. Ada 14 deretan lagu dan Kufaku dengan lagunyan yang berjudul Terlanjur menempati track ke-14. Album itu sudah diedarkan tiga bulan lalu.”Sudah bisa didapatkan di toko-toko CD. Di album itu kami satu-satunya yang dari daerah dan belum begitu dikenal,” ujar Bobby Rian setengah berpromosi.Kufaku band atau biasa disebut Kufaku saja adalah grup band asal Batam. Jadi tak salah, jika mereka belum dikenal secara nasional.','DoO2sUFVAAAp752.jpg',19,1,'2019-01-07 06:05:00','2019-01-07 06:05:00'),(10,'Seorang pria menikahi tiang','Seorang-pria-menikahi-tiang','Seorang pria menikahi tiang','Pole_Star.png',22,1,'2019-01-07 07:31:17','2019-01-07 07:31:17');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` longtext,
  `post_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_comment` (`post_id`),
  CONSTRAINT `fk_comment` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (2,'Prieyudha Akadita S','royhan@gmail.com','hahahahaha','khlhlkhlh',5,'2019-01-07 05:07:58'),(3,'Prieyudha Akadita S','ydhnwb@gmail.com','hahahahaha','hahahahahaha',5,'2019-01-07 05:08:55'),(4,'Prieyudha Akadita S','royhan@gmail.com','hahahahaha','hahahahahahaha',NULL,'2019-01-07 05:13:17'),(5,'Prieyudha Akadita S','ydhnwb@gmail.com','hahahahaha','hahahahahaahha',5,'2019-01-07 05:18:18'),(6,'Prieyudha Akadita S','ydhnwb@gmail.com','Bagus','Aku jadi pengen kencan sama dia',8,'2019-01-07 06:45:15'),(7,'Royhan','royhan@gmail.com','alert(&amp;#39;hack&amp;#39;)','alert(&amp;#39;hack&amp;#39;)',10,'2019-01-07 07:32:50'),(8,'Prieyudha Akadita S','ydhnwb@gmail.com','alert(&amp;#39;hack&amp;#39;)','alert(&amp;#39;hack&amp;#39;)',8,'2019-01-07 08:54:51');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-07 22:59:34
