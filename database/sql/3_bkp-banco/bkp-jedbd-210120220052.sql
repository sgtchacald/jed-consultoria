-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: jedbd
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.21.10.1

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
-- Table structure for table `jed_modulos`
--

DROP TABLE IF EXISTS `jed_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jed_modulos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(40) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `indstatus` varchar(100) NOT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  `dtedicao` timestamp NULL DEFAULT NULL,
  `dtexclusao` timestamp NULL DEFAULT NULL,
  `usucriou` int DEFAULT NULL,
  `usueditou` int DEFAULT NULL,
  `usuexcluiu` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jed_modulos`
--

LOCK TABLES `jed_modulos` WRITE;
/*!40000 ALTER TABLE `jed_modulos` DISABLE KEYS */;
INSERT INTO `jed_modulos` VALUES (1,'SITE','Site','A','2022-01-15 18:11:04','2022-01-15 19:45:04','2022-01-15 18:18:52',1,1,1),(2,'SISTEMA','Sistema','A','2022-01-15 19:31:04','2022-01-15 19:45:16',NULL,1,1,NULL),(3,'PAGINA_PRINCIPAL','P??gina Principal','A','2022-01-16 00:24:33','2022-01-16 00:24:33',NULL,1,NULL,NULL),(4,'Contato','Contato','A','2022-01-18 22:50:14','2022-01-18 22:50:14',NULL,1,NULL,NULL),(5,'SOBRE_A_EMPRESA','Sobre a Empresa','A','2022-01-18 22:52:45','2022-01-18 22:52:45',NULL,1,NULL,NULL),(6,'COLABORADOR','Colaborador','A','2022-01-18 23:07:41','2022-01-18 23:07:41',NULL,1,NULL,NULL),(7,'REDES_SOCIAIS','Redes Sociais','A','2022-01-19 00:47:25','2022-01-19 00:47:25',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `jed_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jed_parametros_globais`
--

DROP TABLE IF EXISTS `jed_parametros_globais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jed_parametros_globais` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(40) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `unidade` char(1) NOT NULL,
  `valor` text NOT NULL,
  `modulopai_id` int NOT NULL,
  `modulo_id` int DEFAULT NULL,
  `indstatus` varchar(1) NOT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  `dtedicao` timestamp NULL DEFAULT NULL,
  `dtexclusao` timestamp NULL DEFAULT NULL,
  `usucriou` int DEFAULT NULL,
  `usueditou` int DEFAULT NULL,
  `usuexcluiu` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jed_parametros_globais`
--

LOCK TABLES `jed_parametros_globais` WRITE;
/*!40000 ALTER TABLE `jed_parametros_globais` DISABLE KEYS */;
INSERT INTO `jed_parametros_globais` VALUES (1,'TITULO_GERAL','Titulo do site','Titulo do site','T','J&D Consultoria',1,NULL,'A','2022-01-18 21:35:14','2022-01-21 05:09:43',NULL,1,1,NULL),(2,'PI_SLIDE_SHOW_TITULO','Titulo do Slide Show p??gina principal','Titulo do Slide Show da p??gina principal','T','JED  <br> Consultoria',1,3,'A','2022-01-18 22:03:26','2022-01-18 22:03:26',NULL,1,NULL,NULL),(3,'PI_SLIDE_SHOW_SUBTITULO','Subt??tulo do Slide Show p??gina principal','Subt??tulo do Slide Show p??gina principal','T','Assessoria Cont??bil',1,3,'A','2022-01-18 22:04:39','2022-01-18 22:04:39',NULL,1,NULL,NULL),(4,'PI_SOBRE_TITULO','T??tulo Sobre','T??tulo Sobre','T','Sobre N??s',1,3,'A','2022-01-18 22:06:14','2022-01-18 22:06:14',NULL,1,NULL,NULL),(5,'PI_SOBRE_TEXTO','Texto sobre a empresa J&D Consultoria','Texto detalhado sobre a empresa J&D Consultoria','T','Somos uma empresa de consultoria em gest??o empresarial e planejamento tribut??rio que tamb??m presta servi??os de assessoria cont??bil, c??lculo cont??bil pericial, imposto de renda pessoa f??sica, aposentadoria e emiss??o de certificado digital.',1,3,'A','2022-01-18 22:07:12','2022-01-18 22:07:12',NULL,1,NULL,NULL),(6,'PI_SOBRE_TEXTO_NEGRITO','Texto sobre a empresa J&D Consultoria em negrito','Texto detalhado sobre a empresa J&D Consultoria em negrito a ser mostrado ap??s o par??metro PI_SOBRE_TEXTO','T','Estamos no mercado desde 2018 e o nosso objetivo ?? o de levar servi??os de excel??ncia, buscando sempre a satisfa????o dos nossos clientes.',1,3,'A','2022-01-18 22:09:30','2022-01-18 22:09:30',NULL,1,NULL,NULL),(7,'MVV_TITULO','T??tulo Miss??o, Vis??o, Valores','T??tulo Miss??o, Vis??o, Valores','T','Nossos Pilares',1,3,'A','2022-01-18 22:10:44','2022-01-18 22:10:44',NULL,1,NULL,NULL),(8,'MVV_SUBTITULO','Subtitulo Miss??o, Vis??o, Valores','Subtitulo Miss??o, Vis??o, Valores','T','Miss??o, Vis??o e Valores',1,3,'A','2022-01-18 22:14:28','2022-01-18 22:14:28',NULL,1,NULL,NULL),(9,'MVV_MISSAO_ICONE','Icone da Miss??o','Icone da Miss??o','T','#',1,3,'A','2022-01-18 22:16:13','2022-01-18 22:16:13',NULL,1,NULL,NULL),(10,'MVV_MISSAO_TITULO','T??tulo da Miss??o','T??tulo da Miss??o','T','Miss??o',1,3,'A','2022-01-18 22:17:05','2022-01-18 22:17:05',NULL,1,NULL,NULL),(11,'MVV_MISSAO_TEXTO','Texto da Miss??o','Texto da Miss??o','T','Ser  refer??ncia  em  efici??ncia  nos  servi??os  prestados  aos  clientes, colaboradores, fornecedores e sociedade, de forma sustent??vel.',1,3,'A','2022-01-18 22:19:32','2022-01-18 22:19:32',NULL,1,NULL,NULL),(12,'MVV_VISAO_ICONE','??cone da Vis??o','??cone da Vis??o','T','#',1,3,'A','2022-01-18 22:20:45','2022-01-18 22:20:45',NULL,1,NULL,NULL),(13,'MVV_VISAO_TITULO','T??tulo da Vis??o','T??tulo da Vis??o','T','Vis??o',1,3,'A','2022-01-18 22:22:03','2022-01-18 22:22:03',NULL,1,NULL,NULL),(14,'MVV_VISAO_TEXTO','Texto da Vis??o','Texto da Vis??o','T','Oferecer  produtos  e  servi??os  com  atendimento  diferenciado,  sendo reconhecida pela inova????o e excel??ncia pelos seus clientes tendo como objetivo central o capital humano.',1,3,'A','2022-01-18 22:22:34','2022-01-18 22:22:34',NULL,1,NULL,NULL),(15,'MVV_VALORES_ICONE','Icone de Valores','Icone de Valores','T','#',1,3,'A','2022-01-18 22:35:21','2022-01-18 22:35:21',NULL,1,NULL,NULL),(16,'MVV_VALORES_TITULO','T??tulo de valores','T??tulo de valores','T','Valores',1,3,'A','2022-01-18 22:36:15','2022-01-18 22:36:15',NULL,1,NULL,NULL),(17,'MVV_VALORES_TEXTO','Texto de valores','Texto de valores','T','Trabalho  em  equipe,  ??tica  e  respeito,  Transpar??ncia,  Diversidade,  e Qualidade.',1,3,'A','2022-01-18 22:38:11','2022-01-18 22:38:11',NULL,1,NULL,NULL),(18,'PI_QTD_ANOS_EMPRESA','Quantidade de anos de empresa','Quantidade de anos de empresa','N','03',1,3,'A','2022-01-18 22:40:22','2022-01-18 22:40:22',NULL,1,NULL,NULL),(19,'PI_QTD_SV_PRESTADOS_A_ANTERIOR','Quantidade de Servi??os prestados no ano anterior','Quantidade de Servi??os prestados no ano anterior','N','500',1,3,'A','2022-01-18 22:42:01','2022-01-18 22:42:01',NULL,1,NULL,NULL),(20,'PI_QTD_PARCEIROS','Quantidade de Parceiros','Quantidade de Parceiros','N','05',1,3,'A','2022-01-18 22:42:44','2022-01-18 22:42:44',NULL,1,NULL,NULL),(21,'PI_QTD_COLABORADORES','Quantidade de Colaboradores','Quantidade de Colaboradores','N','03',1,3,'A','2022-01-18 22:43:44','2022-01-18 22:43:44',NULL,1,NULL,NULL),(22,'PI_TITULO_DEPOIMENTOS','Titulo Depoimentos','Titulo Depoimentos','T','Depoimentos.',1,3,'A','2022-01-18 22:45:00','2022-01-18 22:45:00',NULL,1,NULL,NULL),(23,'PI_SUBTITULO_DEPOIMENTOS','Subt??tulo Depoimentos','Subt??tulo Depoimentos','T','O que dizem sobre n??s',1,3,'A','2022-01-18 22:46:25','2022-01-18 22:46:25',NULL,1,NULL,NULL),(24,'PI_RODAPE_TEXTO','Texto do Rodap??','Texto do Rodap??','T','Somos uma empresa de consultoria em gest??o empresarial e planejamento tribut??rio que tamb??m presta servi??os de assessoria cont??bil, c??lculo cont??bil pericial, imposto de renda pessoa f??sica, aposentadoria e emiss??o de certificado digital.',1,3,'A','2022-01-18 22:46:51','2022-01-18 22:46:51',NULL,1,NULL,NULL),(25,'CONTATO_ENDERECO','Endere??o','Endere??o','T','Rua Ot??vio Tarquino, 410, Sl 604, Centro, Nova Igua??u',1,4,'A','2022-01-18 22:47:33','2022-01-18 22:50:36',NULL,1,1,NULL),(26,'CONTATO_EMAIL','E-mail','E-mail','T','contato@jedconsultoria.com.br',1,4,'A','2022-01-18 22:48:07','2022-01-18 22:50:44',NULL,1,1,NULL),(27,'CONTATO_TELEFONE_WHATSAPP','Telefone Whatsapp','Telefone Whatsapp','N','5521969360480',1,4,'A','2022-01-18 22:48:53','2022-01-20 03:10:27',NULL,1,1,NULL),(28,'CONTATO_HORARIO_FUNCIONAMENTO','Hor??rio de Funcionamento','Hor??rio de Funcionamento','T','Seg, Qua, Qui: 13:00 - 19:00',1,3,'A','2022-01-18 22:51:36','2022-01-18 22:51:36',NULL,1,NULL,NULL),(29,'PG_SOBRE_TITULO','T??tulo sobre a empresa','T??tulo sobre a empresa','T','Sobre n??s',1,5,'A','2022-01-18 22:53:33','2022-01-18 22:53:33',NULL,1,NULL,NULL),(30,'PG_SOBRE_DESCRICAO','Descri????o sobre a empresa','Descri????o sobre a empresa','T','Fique ?? vontade para saber mais sobre nossa equipe e empresa nesta p??gina. Estamos sempre felizes em ajudar voc??!',1,5,'A','2022-01-18 22:55:31','2022-01-18 22:55:31',NULL,1,NULL,NULL),(31,'PG_SOBRE_COLABORADOR_TITULO','T??tulo Sobre o Colaborador','T??tulo Sobre o Colaborador','T','Pessoas que contribuem para nosso sucesso',1,6,'A','2022-01-18 22:57:30','2022-01-18 23:08:06',NULL,1,1,NULL),(32,'PG_SOBRE_COLABORADOR_SUBTITULO','Subt??tulo Sobre o Colaborador','Subt??tulo Sobre o Colaborador','T','Conhe??a nosso Time',1,6,'A','2022-01-18 22:58:21','2022-01-18 23:07:59',NULL,1,1,NULL),(33,'PG_CONTATO_TITULO','T??tulo P??gina de Contatos','T??tulo P??gina de Contatos','T','Contatos',1,4,'A','2022-01-18 22:59:24','2022-01-18 22:59:24',NULL,1,NULL,NULL),(34,'PG_CONTATO_TITULO_TEXTO','Texto Abaixo do t??tulo p??gina de contatos','Texto Abaixo do t??tulo p??gina de contatos','T','Tire suas d??vidas, fa??a um or??amento conosco.',1,3,'A','2022-01-18 23:00:03','2022-01-18 23:00:03',NULL,1,NULL,NULL),(35,'TEXTO_LOADING','Texto do Loading','Texto do Loading','T','Aguarde um momento...',1,NULL,'A','2022-01-19 00:40:47','2022-01-19 00:40:47',NULL,1,NULL,NULL),(36,'R_SOCIAL_URL_INSTAGRAM','Rede Social Instagram','Rede Social Instagram','T','https://www.instagram.com/jed.consultoria/',1,7,'A','2022-01-19 00:46:58','2022-01-19 00:47:43',NULL,1,1,NULL),(37,'CONTATO_TEXTO_WHATSAPP','Texto quando o usuario abre a api do whatsapp','Texto quando o usuario abre a api do whatsapp','T','A%20J%26D%20Consultoria%20agradece%20seu%20contato.%20Como%20podemos%20ajudar%3F',1,4,'A','2022-01-20 03:10:01','2022-01-20 03:33:06',NULL,1,1,NULL),(38,'CONTATO_TELEFONE_FORMATADO','Telefone de contato formatado','Telefone de contato formatado','T','+55 (21) 9 6936-0480',1,4,'A','2022-01-20 03:11:39','2022-01-20 03:11:39',NULL,1,NULL,NULL),(39,'CONTATO_ENDERECO_LINK','Link do Endere??o para abrir o google maps','Link do Endere??o para abrir o google maps','T','https://goo.gl/maps/8HZvYPV5ynoaNpsj6',1,4,'A','2022-01-20 03:38:39','2022-01-20 03:38:39',NULL,1,NULL,NULL),(40,'PI_SOBRE_SUBTITULO','Sobre Subtitulo','Sobre Subtitulo','T','O que fazemos ?',1,3,'A','2022-01-21 02:29:00','2022-01-21 02:29:00',NULL,1,NULL,NULL),(41,'BOTAO_SAIBA_MAIS','Label Bot??o Saiba Mais','Label Bot??o Saiba Mais','T','Saiba Mais',1,NULL,'A','2022-01-21 03:03:09','2022-01-21 03:03:09',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `jed_parametros_globais` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Diego dos Santos Cordeiro','sgt.chacal.d@gmail.com',NULL,'$2y$10$El2sDgtzomvCWFnAdVIhX.MVNdVqf4C9gbgsvfjg2x6ndX9c93qTa','illlk5Dpw0X5KGE9gEb43575nSyMsSO6y4Yfwhxd27c1M3zr6tVIuXCnOget','2022-01-15 01:52:30','2022-01-15 01:52:30'),(2,'Daniel Rodrigues Cordeiro','danielrodriguesco@gmail.com',NULL,'$2y$10$hZPSKRBKxPye6xqwMZr8AO6gRE.lOe6ClD22ENGA9DsScegXpiMB6',NULL,'2022-01-20 03:16:11','2022-01-20 03:16:11');
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

-- Dump completed on 2022-01-21  0:53:19
