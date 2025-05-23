-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel_sitasi
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bimbingans`
--

DROP TABLE IF EXISTS `bimbingans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bimbingans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_bimbingan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_bimbingan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bimbingans_user_id_foreign` (`user_id`),
  CONSTRAINT `bimbingans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bimbingans`
--

LOCK TABLES `bimbingans` WRITE;
/*!40000 ALTER TABLE `bimbingans` DISABLE KEYS */;
INSERT INTO `bimbingans` VALUES (1,6,'2025-04-20','5','Makan','Kenyang','Approved','2025-04-20 14:30:20','2025-04-20 14:30:45');
/*!40000 ALTER TABLE `bimbingans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosens`
--

DROP TABLE IF EXISTS `dosens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosens`
--

LOCK TABLES `dosens` WRITE;
/*!40000 ALTER TABLE `dosens` DISABLE KEYS */;
INSERT INTO `dosens` VALUES (1,'Aidil Saputra Kirsan','aidil@lecturer.itk.ac.id','100320240',5,'2025-04-20 14:13:58','2025-04-20 14:13:58'),(2,'Aidil Dosen 1','aidil@dosen1.com','98',7,'2025-04-20 14:28:06','2025-04-20 14:28:06'),(3,'Aidil Dosen 2','aidil@dosen2.com','87',8,'2025-04-20 14:28:07','2025-04-20 14:28:07'),(4,'Aidil Dosen 3','aidil@dosen3.com','65',9,'2025-04-20 14:28:07','2025-04-20 14:28:07');
/*!40000 ALTER TABLE `dosens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_sempros`
--

DROP TABLE IF EXISTS `jadwal_sempros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jadwal_sempros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `periode_id` bigint unsigned NOT NULL,
  `pengajuan_ta_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `penguji_1` bigint unsigned DEFAULT NULL,
  `penguji_2` bigint unsigned DEFAULT NULL,
  `tanggal_sempro` date DEFAULT NULL,
  `waktu_mulai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_selesai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_sempros_periode_id_foreign` (`periode_id`),
  KEY `jadwal_sempros_user_id_foreign` (`user_id`),
  CONSTRAINT `jadwal_sempros_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jadwal_sempros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_sempros`
--

LOCK TABLES `jadwal_sempros` WRITE;
/*!40000 ALTER TABLE `jadwal_sempros` DISABLE KEYS */;
INSERT INTO `jadwal_sempros` VALUES (1,1,1,6,8,9,'2025-04-20','22:43','23:44','E102','2025-04-20 14:44:12','2025-04-20 14:53:56');
/*!40000 ALTER TABLE `jadwal_sempros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_ta`
--

DROP TABLE IF EXISTS `jadwal_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jadwal_ta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `periode_id` bigint unsigned NOT NULL,
  `pengajuan_ta_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `waktu_mulai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_selesai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_ta_periode_id_foreign` (`periode_id`),
  KEY `jadwal_ta_user_id_foreign` (`user_id`),
  CONSTRAINT `jadwal_ta_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jadwal_ta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_ta`
--

LOCK TABLES `jadwal_ta` WRITE;
/*!40000 ALTER TABLE `jadwal_ta` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `katalogs`
--

DROP TABLE IF EXISTS `katalogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `katalogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstrak` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `katalogs`
--

LOCK TABLES `katalogs` WRITE;
/*!40000 ALTER TABLE `katalogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `katalogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswas`
--

DROP TABLE IF EXISTS `mahasiswas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswas`
--

LOCK TABLES `mahasiswas` WRITE;
/*!40000 ALTER TABLE `mahasiswas` DISABLE KEYS */;
INSERT INTO `mahasiswas` VALUES (2,'Aidil Mahasiswa','123456','aidil@mahasiswa.com',NULL,6,'2025-04-20 14:23:22','2025-04-20 14:23:22');
/*!40000 ALTER TABLE `mahasiswas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_04_27_092344_create_bimbingans_table',1),(6,'2024_04_27_110857_create_permission_tables',1),(7,'2024_05_05_200400_create_periodes_table',1),(8,'2024_05_05_200503_create_sempros_table',1),(9,'2024_05_10_115526_create_dosens_table',1),(10,'2024_05_10_115533_create_mahasiswas_table',1),(11,'2024_05_10_231307_create_pengajuan_t_a_s_table',1),(12,'2024_05_10_231337_create_riwayat_pengajuans_table',1),(13,'2024_05_12_223457_create_notifikasis_table',1),(14,'2024_05_15_012154_create_riwayat_pendaftaran_sempros_table',1),(15,'2024_05_16_004223_create_jadwal_sempros_table',1),(16,'2024_05_18_013758_create_sidang_t_a_s_table',1),(17,'2024_05_18_014305_create_riwayat_pendaftaran_sidang_t_a_s_table',1),(18,'2024_05_18_175934_create_jadwal_t_a_s_table',1),(19,'2024_05_18_233346_create_penilaian_sidang_tas_table',1),(20,'2024_05_19_003118_create_penilaian_sempros_table',1),(21,'2024_05_19_214542_create_referensis_table',1),(22,'2024_05_20_003123_create_katalogs_table',1),(23,'2024_05_20_045825_create_prosedurs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(4,'App\\Models\\User',4),(2,'App\\Models\\User',5),(1,'App\\Models\\User',6),(2,'App\\Models\\User',7),(2,'App\\Models\\User',8),(2,'App\\Models\\User',9);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifikasis`
--

DROP TABLE IF EXISTS `notifikasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifikasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `from_id` bigint unsigned DEFAULT NULL,
  `to_id` bigint unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` json NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasis`
--

LOCK TABLES `notifikasis` WRITE;
/*!40000 ALTER TABLE `notifikasis` DISABLE KEYS */;
INSERT INTO `notifikasis` VALUES (1,6,5,'notifikasi','{\"message\": \"mengajukan judul TA\", \"user_id\": 6}',1,'2025-04-20 14:28:42','2025-04-23 00:27:21'),(2,6,7,'notifikasi','{\"message\": \"mengajukan judul TA\", \"user_id\": 6}',1,'2025-04-20 14:28:42','2025-04-20 14:48:05'),(3,5,6,'judul-disetujui','{\"status\": \"setuju\", \"message\": \"Menyetujui Judul Anda\", \"pengajuan_id\": \"1\"}',1,'2025-04-20 14:29:16','2025-04-22 07:34:02'),(4,6,5,'pengajuan-bimbingan','{\"status\": \"pengajuan-bimbingan\", \"message\": \"Menambahkan data bimbingan\"}',1,'2025-04-20 14:30:20','2025-04-23 00:27:21'),(5,5,6,'bimbingan-disetujui','{\"status\": \"setuju\", \"message\": \"Bimbingan telah di setujui\", \"bimbingan_id\": \"1\"}',1,'2025-04-20 14:30:45','2025-04-22 07:34:02'),(6,5,6,'seminar-proposal-disetujui','{\"status\": \"setuju\", \"message\": \"mengizinkan untuk Seminar Proposal\"}',1,'2025-04-20 14:38:25','2025-04-22 07:34:02'),(7,6,5,'notifikasi','{\"message\": \"telah mendaftar Seminar Proposal\", \"user_id\": 6, \"sempro_id\": 1}',1,'2025-04-20 14:38:29','2025-04-23 00:27:21'),(8,6,7,'notifikasi','{\"message\": \"telah mendaftar Seminar Proposal\", \"user_id\": 6, \"sempro_id\": 1}',1,'2025-04-20 14:38:29','2025-04-20 14:48:05'),(9,6,NULL,'tendik-seminar-proposal','{\"message\": \"telah mendaftar Seminar Proposal\", \"user_id\": 6, \"sempro_id\": 1, \"periode_id\": 1}',1,'2025-04-20 14:38:29','2025-04-23 03:38:50'),(10,3,6,'tendik-terima-sempro','{\"message\": \"menerima berkas seminar proposal anda\", \"user_id\": 3}',1,'2025-04-20 14:40:11','2025-04-22 07:34:02'),(11,3,6,'tendik-jadwal-sempro','{\"message\": \"telah menetapkan jadwal Seminar Proposal Anda\", \"user_id\": 3, \"jadwal_id\": 1}',1,'2025-04-20 14:44:12','2025-04-22 07:34:02'),(12,5,6,'penilaian-sempro','{\"status\": \"setuju\", \"message\": \"memberikan nilai pada Seminar Proposal anda\"}',1,'2025-04-20 14:46:58','2025-04-22 07:34:02'),(13,5,6,'revisi-seminar-disetujui','{\"status\": \"setuju\", \"message\": \"menyetujui hasil revisi Seminar Proposal anda\"}',1,'2025-04-20 14:47:06','2025-04-22 07:34:02'),(14,7,6,'seminar-proposal-disetujui','{\"status\": \"setuju\", \"message\": \"mengizinkan untuk Seminar Proposal\"}',1,'2025-04-20 14:48:13','2025-04-22 07:34:02'),(15,7,6,'penilaian-sempro','{\"status\": \"setuju\", \"message\": \"memberikan nilai pada Seminar Proposal anda\"}',1,'2025-04-20 14:48:26','2025-04-22 07:34:02'),(16,7,6,'revisi-seminar-disetujui','{\"status\": \"setuju\", \"message\": \"menyetujui hasil revisi Seminar Proposal anda\"}',1,'2025-04-20 14:48:34','2025-04-22 07:34:02'),(17,8,6,'penilaian-sempro','{\"status\": \"setuju\", \"message\": \"memberikan nilai pada Seminar Proposal anda\"}',1,'2025-04-20 14:49:30','2025-04-22 07:34:02'),(18,9,6,'penilaian-sempro','{\"status\": \"setuju\", \"message\": \"memberikan nilai pada Seminar Proposal anda\"}',1,'2025-04-20 14:51:07','2025-04-22 07:34:02'),(19,9,6,'revisi-seminar-disetujui','{\"status\": \"setuju\", \"message\": \"menyetujui hasil revisi Seminar Proposal anda\"}',1,'2025-04-20 14:51:09','2025-04-22 07:34:02');
/*!40000 ALTER TABLE `notifikasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_ta`
--

DROP TABLE IF EXISTS `pengajuan_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengajuan_ta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mahasiswa_id` bigint unsigned NOT NULL,
  `pembimbing_1` bigint unsigned NOT NULL,
  `pembimbing_2` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve_pembimbing1` tinyint(1) NOT NULL DEFAULT '0',
  `approve_pembimbing2` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengajuan_ta_mahasiswa_id_foreign` (`mahasiswa_id`),
  CONSTRAINT `pengajuan_ta_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_ta`
--

LOCK TABLES `pengajuan_ta` WRITE;
/*!40000 ALTER TABLE `pengajuan_ta` DISABLE KEYS */;
INSERT INTO `pengajuan_ta` VALUES (1,'Judul ABCDE','IoT',2,5,7,'Dalam Proses Pengajuan',1,1,'2025-04-20 14:28:42','2025-04-20 14:48:13');
/*!40000 ALTER TABLE `pengajuan_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian_sempros`
--

DROP TABLE IF EXISTS `penilaian_sempros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penilaian_sempros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sempro_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `media_presentasi` double NOT NULL DEFAULT '0',
  `komunikasi` double NOT NULL DEFAULT '0',
  `penguasaan_materi` double NOT NULL DEFAULT '0',
  `isi_laporan_ta` double NOT NULL DEFAULT '0',
  `struktur_penulisan` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian_sempros`
--

LOCK TABLES `penilaian_sempros` WRITE;
/*!40000 ALTER TABLE `penilaian_sempros` DISABLE KEYS */;
INSERT INTO `penilaian_sempros` VALUES (1,1,5,80,80,70,90,90,'2025-04-20 14:46:58','2025-04-20 14:46:58'),(2,1,7,85,90,80,90,85,'2025-04-20 14:48:26','2025-04-20 14:48:26'),(3,1,8,90,87,86,80,80,'2025-04-20 14:49:30','2025-04-20 14:49:30'),(4,1,9,99,90,90,98,89,'2025-04-20 14:51:07','2025-04-20 14:51:07');
/*!40000 ALTER TABLE `penilaian_sempros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian_sidang_tas`
--

DROP TABLE IF EXISTS `penilaian_sidang_tas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penilaian_sidang_tas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sidang_ta_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `media_presentasi` double NOT NULL DEFAULT '0',
  `komunikasi` double NOT NULL DEFAULT '0',
  `penguasaan_materi` double NOT NULL DEFAULT '0',
  `isi_laporan_ta` double NOT NULL DEFAULT '0',
  `struktur_penulisan` double NOT NULL DEFAULT '0',
  `sikap_kinerja` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian_sidang_tas`
--

LOCK TABLES `penilaian_sidang_tas` WRITE;
/*!40000 ALTER TABLE `penilaian_sidang_tas` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaian_sidang_tas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodes`
--

DROP TABLE IF EXISTS `periodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periodes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelombang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nonactive',
  `is_tampilkan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodes`
--

LOCK TABLES `periodes` WRITE;
/*!40000 ALTER TABLE `periodes` DISABLE KEYS */;
INSERT INTO `periodes` VALUES (1,'Gasal','1','2','Sempro','Active',1,'2025-04-20 14:36:48','2025-04-20 14:46:17');
/*!40000 ALTER TABLE `periodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prosedurs`
--

DROP TABLE IF EXISTS `prosedurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prosedurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prosedurs`
--

LOCK TABLES `prosedurs` WRITE;
/*!40000 ALTER TABLE `prosedurs` DISABLE KEYS */;
INSERT INTO `prosedurs` VALUES (1,'Judul Prosedur TA','<p>apa saja</p>','2025-04-22 07:34:35','2025-04-22 07:34:35');
/*!40000 ALTER TABLE `prosedurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referensis`
--

DROP TABLE IF EXISTS `referensis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `referensis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `bidang_minat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_tersedia` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referensis`
--

LOCK TABLES `referensis` WRITE;
/*!40000 ALTER TABLE `referensis` DISABLE KEYS */;
/*!40000 ALTER TABLE `referensis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_pendaftaran_sempros`
--

DROP TABLE IF EXISTS `riwayat_pendaftaran_sempros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_pendaftaran_sempros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengajuan_ta_id` bigint unsigned NOT NULL,
  `sempro_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `riwayat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_pendaftaran_sempros_pengajuan_ta_id_foreign` (`pengajuan_ta_id`),
  KEY `riwayat_pendaftaran_sempros_sempro_id_foreign` (`sempro_id`),
  KEY `riwayat_pendaftaran_sempros_user_id_foreign` (`user_id`),
  CONSTRAINT `riwayat_pendaftaran_sempros_pengajuan_ta_id_foreign` FOREIGN KEY (`pengajuan_ta_id`) REFERENCES `pengajuan_ta` (`id`) ON DELETE CASCADE,
  CONSTRAINT `riwayat_pendaftaran_sempros_sempro_id_foreign` FOREIGN KEY (`sempro_id`) REFERENCES `sempros` (`id`) ON DELETE CASCADE,
  CONSTRAINT `riwayat_pendaftaran_sempros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_pendaftaran_sempros`
--

LOCK TABLES `riwayat_pendaftaran_sempros` WRITE;
/*!40000 ALTER TABLE `riwayat_pendaftaran_sempros` DISABLE KEYS */;
INSERT INTO `riwayat_pendaftaran_sempros` VALUES (1,1,NULL,5,'Seminar Proposal Diizinkan','mengizinkan untuk mendaftar seminar proposal','Disetujui Seminar Proposal','2025-04-20 14:38:25','2025-04-20 14:38:25'),(2,1,1,6,'Mendaftar Seminar Proposal','telah mendaftar seminar proposal','Proses Pendaftaran','2025-04-20 14:38:29','2025-04-20 14:38:29'),(3,1,1,3,'Menerima berkas Seminar Proposal','Berkas Seminar Proposal Disetujui','Terima Seminar Proposal','2025-04-20 14:40:11','2025-04-20 14:40:11'),(4,1,1,3,'Jadwal Seminar Proposal','telah menetapkan jadwal Seminar Proposal Anda','Jadwal Seminar Proposal','2025-04-20 14:44:12','2025-04-20 14:44:12'),(5,1,1,5,'Penilaian Telah Diberikan','memberikan nilai pada Seminar Proposal anda','Seminar Proposal Dinilai','2025-04-20 14:46:58','2025-04-20 14:46:58'),(6,1,1,5,'Lembar Revisi Disetujui','menyetujui hasil revisi seminar proposal anda','Lembar Revisi Seminar Proposal Disetujui','2025-04-20 14:47:06','2025-04-20 14:47:06'),(7,1,1,7,'Seminar Proposal Diizinkan','mengizinkan untuk mendaftar seminar proposal','Disetujui Seminar Proposal','2025-04-20 14:48:13','2025-04-20 14:48:13'),(8,1,1,7,'Penilaian Telah Diberikan','memberikan nilai pada Seminar Proposal anda','Seminar Proposal Dinilai','2025-04-20 14:48:26','2025-04-20 14:48:26'),(9,1,1,7,'Lembar Revisi Disetujui','menyetujui hasil revisi seminar proposal anda','Lembar Revisi Seminar Proposal Disetujui','2025-04-20 14:48:34','2025-04-20 14:48:34'),(10,1,1,8,'Penilaian Telah Diberikan','memberikan nilai pada Seminar Proposal anda','Seminar Proposal Dinilai','2025-04-20 14:49:30','2025-04-20 14:49:30'),(11,1,1,9,'Penilaian Telah Diberikan','memberikan nilai pada Seminar Proposal anda','Seminar Proposal Dinilai','2025-04-20 14:51:07','2025-04-20 14:51:07'),(12,1,1,9,'Lembar Revisi Disetujui','menyetujui hasil revisi seminar proposal anda','Lembar Revisi Seminar Proposal Disetujui','2025-04-20 14:51:09','2025-04-20 14:51:09');
/*!40000 ALTER TABLE `riwayat_pendaftaran_sempros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_pendaftaran_sidang_ta`
--

DROP TABLE IF EXISTS `riwayat_pendaftaran_sidang_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_pendaftaran_sidang_ta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengajuan_ta_id` bigint unsigned NOT NULL,
  `sidang_ta_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `riwayat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_pendaftaran_sidang_ta_pengajuan_ta_id_foreign` (`pengajuan_ta_id`),
  KEY `riwayat_pendaftaran_sidang_ta_sidang_ta_id_foreign` (`sidang_ta_id`),
  KEY `riwayat_pendaftaran_sidang_ta_user_id_foreign` (`user_id`),
  CONSTRAINT `riwayat_pendaftaran_sidang_ta_pengajuan_ta_id_foreign` FOREIGN KEY (`pengajuan_ta_id`) REFERENCES `pengajuan_ta` (`id`) ON DELETE CASCADE,
  CONSTRAINT `riwayat_pendaftaran_sidang_ta_sidang_ta_id_foreign` FOREIGN KEY (`sidang_ta_id`) REFERENCES `sidang_ta` (`id`) ON DELETE CASCADE,
  CONSTRAINT `riwayat_pendaftaran_sidang_ta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_pendaftaran_sidang_ta`
--

LOCK TABLES `riwayat_pendaftaran_sidang_ta` WRITE;
/*!40000 ALTER TABLE `riwayat_pendaftaran_sidang_ta` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_pendaftaran_sidang_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_pengajuans`
--

DROP TABLE IF EXISTS `riwayat_pengajuans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_pengajuans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengajuan_ta_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `riwayat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_pengajuans_pengajuan_ta_id_foreign` (`pengajuan_ta_id`),
  KEY `riwayat_pengajuans_user_id_foreign` (`user_id`),
  CONSTRAINT `riwayat_pengajuans_pengajuan_ta_id_foreign` FOREIGN KEY (`pengajuan_ta_id`) REFERENCES `pengajuan_ta` (`id`) ON DELETE CASCADE,
  CONSTRAINT `riwayat_pengajuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_pengajuans`
--

LOCK TABLES `riwayat_pengajuans` WRITE;
/*!40000 ALTER TABLE `riwayat_pengajuans` DISABLE KEYS */;
INSERT INTO `riwayat_pengajuans` VALUES (1,1,6,'Mengajukan Judul',NULL,'Dalam Proses Pengajuan','2025-04-20 14:28:42','2025-04-20 14:28:42'),(2,1,5,'Menyetujui Judul',NULL,'Disetujui Pembimbing','2025-04-20 14:29:16','2025-04-20 14:29:16');
/*!40000 ALTER TABLE `riwayat_pengajuans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'mahasiswa','web','2025-04-20 03:15:19','2025-04-20 03:15:19'),(2,'dosen','web','2025-04-20 03:15:19','2025-04-20 03:15:19'),(3,'tendik','web','2025-04-20 03:15:19','2025-04-20 03:15:19'),(4,'koorpro','web','2025-04-20 03:15:19','2025-04-20 03:15:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sempros`
--

DROP TABLE IF EXISTS `sempros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sempros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `periode_id` bigint unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `form_ta_012` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_plagiasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on_process',
  `revisi_pembimbing_1` tinyint(1) NOT NULL DEFAULT '0',
  `revisi_pembimbing_2` tinyint(1) NOT NULL DEFAULT '0',
  `revisi_penguji_1` tinyint(1) NOT NULL DEFAULT '0',
  `revisi_penguji_2` tinyint(1) NOT NULL DEFAULT '0',
  `approve_pembimbing_1` tinyint(1) NOT NULL DEFAULT '0',
  `approve_pembimbing_2` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sempros_user_id_foreign` (`user_id`),
  KEY `sempros_periode_id_foreign` (`periode_id`),
  CONSTRAINT `sempros_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sempros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sempros`
--

LOCK TABLES `sempros` WRITE;
/*!40000 ALTER TABLE `sempros` DISABLE KEYS */;
INSERT INTO `sempros` VALUES (1,6,1,'2025-04-20','uploads/sempro/jhov3FnKpzLziTBKUR9dQOPGvfCQefmBVpT8rTYe.pdf','uploads/sempro/L3PmuYlBaFoA4JjM5CO8iWyixvEQoHGorpERbuUh.pdf','uploads/sempro/BTKtUaJZVlnpppXuaAFZSnwjBQmzGaORx7LuO0QD.pdf','Diterima',1,1,0,1,0,0,'2025-04-20 14:38:29','2025-04-20 14:51:09');
/*!40000 ALTER TABLE `sempros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sidang_ta`
--

DROP TABLE IF EXISTS `sidang_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sidang_ta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `periode_id` bigint unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `lembar_revisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `draft_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_plagiasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on_process',
  `revisi_pembimbing_1` tinyint(1) NOT NULL DEFAULT '0',
  `revisi_pembimbing_2` tinyint(1) NOT NULL DEFAULT '0',
  `revisi_penguji_1` tinyint(1) NOT NULL DEFAULT '0',
  `revisi_penguji_2` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sidang_ta_user_id_foreign` (`user_id`),
  KEY `sidang_ta_periode_id_foreign` (`periode_id`),
  CONSTRAINT `sidang_ta_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sidang_ta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sidang_ta`
--

LOCK TABLES `sidang_ta` WRITE;
/*!40000 ALTER TABLE `sidang_ta` DISABLE KEYS */;
/*!40000 ALTER TABLE `sidang_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User Mahasiswa','mahasiswa','mahasiswa@example.com',NULL,'$2y$10$8FdOVOeMxv5f4ZuWOx032OlsfOfeEbxl3WVACVKOJE4KXB/XN/rgK',NULL,NULL,NULL,'2025-04-20 03:15:19','2025-04-20 03:15:19'),(2,'User Dosen','dosen','dosen@example.com',NULL,'$2y$10$FOfOz4pFrxNppj07TTbBDua3fEPikOeu0dex3l9oRROlP4LAqi1wi',NULL,NULL,NULL,'2025-04-20 03:15:19','2025-04-20 03:15:19'),(3,'User Tenaga Kependidikan','tendik','tendik@example.com',NULL,'$2y$10$TeToXcuVx8V8zTL.17dOAu3WW7RE4yyNTodcTc.nTUsSyGgFBWIxu',NULL,NULL,NULL,'2025-04-20 03:15:19','2025-04-20 03:15:19'),(4,'User Koordinator Program Studi','koorpro','koorpro@example.com',NULL,'$2y$10$6OYyn/rBrqSU3CxInPDT8u2jyCJ4aRVwn2awF5ZBJULzhiBmi9c3C',NULL,NULL,NULL,'2025-04-20 03:15:19','2025-04-20 03:15:19'),(5,'Aidil Saputra Kirsan','aidil@lecturer.itk.ac.id','aidil@lecturer.itk.ac.id',NULL,'$2y$10$ogMLwAAPESRxCuo1bC24Qup06/N1ArYdcsH0lzqJoyFb9o4WpjxyK',NULL,'sitasiitk/uploads/signature/Q4e726EH2ii4bqwxayPlJoz0psAlZbeg4fkl0cX6.jpg',NULL,'2025-04-20 14:13:58','2025-04-20 14:24:45'),(6,'Aidil Mahasiswa','aidil@mahasiswa.com','aidil@mahasiswa.com',NULL,'$2y$10$x.Vk27oP1v9NI/HUIeZBE.B22E0r6r3/ESSBRChfhJ50QMaQP4kHO',NULL,NULL,NULL,'2025-04-20 14:23:22','2025-04-20 14:23:22'),(7,'Aidil Dosen 1','aidil@dosen1.com','aidil@dosen1.com',NULL,'$2y$10$4IM6LFK4GP35h1ZLvlQMH.WyKWOJ2EodaDt5diyWRThlnj8xswGL.',NULL,NULL,NULL,'2025-04-20 14:28:06','2025-04-20 14:28:06'),(8,'Aidil Dosen 2','aidil@dosen2.com','aidil@dosen2.com',NULL,'$2y$10$j28zBokdlAPMp1fuhxe3GekDvG6KJuj4mToK5otiPS69gCY86jYyW',NULL,NULL,NULL,'2025-04-20 14:28:07','2025-04-20 14:28:07'),(9,'Aidil Dosen 3','aidil@dosen3.com','aidil@dosen3.com',NULL,'$2y$10$u834DoVyl/J1bQsZ00Ff0O8nmEwxHV5tnMUUHoe3U/jx2IFN1YnAu',NULL,NULL,NULL,'2025-04-20 14:28:07','2025-04-20 14:28:07');
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

-- Dump completed on 2025-05-03 21:58:10
