-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: jedbd
-- ------------------------------------------------------
-- Server version	8.0.28

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
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `jed_contatos`
--

DROP TABLE IF EXISTS `jed_contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jed_contatos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `assunto` varchar(30) NOT NULL,
  `mensagem` text NOT NULL,
  `indstatus` varchar(100) NOT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  `dtedicao` timestamp NULL DEFAULT NULL,
  `dtexclusao` timestamp NULL DEFAULT NULL,
  `usucriou` int DEFAULT NULL,
  `usueditou` int DEFAULT NULL,
  `usuexcluiu` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jed_contatos`
--

LOCK TABLES `jed_contatos` WRITE;
/*!40000 ALTER TABLE `jed_contatos` DISABLE KEYS */;
INSERT INTO `jed_contatos` VALUES (43,'Juliete Dos Santos Silveira','contato@juliete.com','(21) 99467-4449','1','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','I','2022-02-10 02:37:36','2022-02-10 05:13:23','2022-02-10 05:13:23',0,NULL,1),(44,'Mara Cristiane Silveira da Silva','mara@gmail.com','(21) 99487-8895','33','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.','I','2022-02-10 02:38:44','2022-02-10 05:13:18','2022-02-10 05:13:18',0,NULL,1),(45,'Eliane Feitosa dos Santos','lili@eliane.com','(51) 8899-8585','46','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.','I','2022-02-10 02:40:17','2022-02-10 05:13:08','2022-02-10 05:13:08',0,NULL,1),(46,'MARA CRISTIANE SILVEIRA DA SILVA','mcristianesilveira@gmail.com','(21) 99209-3729','46','Orienta????es','I','2022-02-10 02:42:35','2022-02-10 05:09:15','2022-02-10 05:09:15',0,NULL,1),(47,'Clayton','c@c.com','(21) 58984-9849','51','teste','I','2022-02-10 19:21:08','2022-02-10 19:25:33','2022-02-10 19:25:33',0,NULL,1),(48,'daniel  rodrigues cordeiro','danielrodriguesco@gmail.com','(21) 99133-4196','33','blablalblbalbalbalbla','I','2022-02-10 20:07:39','2022-02-10 20:11:54','2022-02-10 20:11:54',0,NULL,1),(49,'Ronan Costa Araujo','ronancostaaraujo@gmail.com','(21) 99971-5435','51','Ol??! Sou MEI e gostaria de um or??amento para fazer o certificado digital.','I','2022-02-11 17:46:20','2022-02-14 01:06:12','2022-02-14 01:06:12',0,NULL,1);
/*!40000 ALTER TABLE `jed_contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jed_links_uteis`
--

DROP TABLE IF EXISTS `jed_links_uteis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jed_links_uteis` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `url` text NOT NULL,
  `icone` varchar(40) DEFAULT NULL,
  `indstatus` varchar(1) NOT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  `dtedicao` timestamp NULL DEFAULT NULL,
  `dtexclusao` timestamp NULL DEFAULT NULL,
  `usucriou` int DEFAULT NULL,
  `usueditou` int DEFAULT NULL,
  `usuexcluiu` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jed_links_uteis`
--

LOCK TABLES `jed_links_uteis` WRITE;
/*!40000 ALTER TABLE `jed_links_uteis` DISABLE KEYS */;
INSERT INTO `jed_links_uteis` VALUES (1,'Site Diego Cordeiro','Site do Analista de Sistemas Diego Cordeiro','http://www.diegocordeiro.com.br',NULL,'I','2022-01-22 01:05:28','2022-01-22 00:37:56','2022-01-22 00:37:56',1,1,1),(2,'Receita Federal','Informa????es sobre imposto de renda, tributos federais, etc.','https://www.gov.br/receitafederal/pt-br',NULL,'A','2022-01-21 22:55:33','2022-01-21 22:55:33',NULL,2,NULL,NULL),(3,'Meu INSS','Informa????es sobre aposentadoria, contribui????es previdenci??rias, etc.','https://meu.inss.gov.br/#/login',NULL,'A','2022-01-21 22:57:15','2022-01-21 22:57:15',NULL,2,NULL,NULL),(4,'Fisco F??cil - SEFAZ/RJ','Informa????es sobre notas fiscais da empresa, cadastro da SEFAZ/RJ, etc.','http://www.fazenda.rj.gov.br/sefaz/faces/menu_structure/servicos/navigationContribuinte/conluna1/menu_servico_icms/ICMS-FiscoFacil;jsessionid=QdF-YzITDVoeo6AG2hsOzgdozN6ymriHW5TRh4Gr7Z3YY5I61_J0!-1834789623?_afrLoop=61869797246018332&_afrWindowMode=0&_afrWindowId=null&_adf.ctrl-state=ysl3u5af4_1',NULL,'A','2022-01-21 22:58:01','2022-01-21 22:58:01',NULL,2,NULL,NULL),(5,'JUCERJA','Informa????es sobre contrato social, viabilidade, etc.','https://www.jucerja.rj.gov.br/',NULL,'A','2022-01-21 22:58:22','2022-01-21 22:58:22',NULL,2,NULL,NULL),(6,'Sistema P??blico de Escritura????o Digital - SPED','Informa????es sobre SPED ICMS/IPI, SPED Contribui????es, etc.','http://sped.rfb.gov.br/',NULL,'A','2022-01-21 22:58:45','2022-01-21 22:58:45',NULL,2,NULL,NULL),(7,'Portal Nota Fiscal Eletr??nica','Informa????es sobre NF-e, CT-e, NFC-e, etc.','https://www.nfe.fazenda.gov.br/portal/principal.aspx',NULL,'A','2022-01-21 22:59:16','2022-01-21 22:59:16',NULL,2,NULL,NULL),(8,'Consulta Restitui????o IRPF','Informa????es sobre restitui????es IRPF.','http://servicos.receita.fazenda.gov.br/servicos/consrest/atual.app/paginas/mobile/restituicaomobi.asp',NULL,'A','2022-01-21 22:59:43','2022-01-21 22:59:43',NULL,2,NULL,NULL),(9,'Consulta Optantes pelo Simples Nacional','Informa????es sobre op????o do Simples Nacional.','https://www8.receita.fazenda.gov.br/simplesnacional/aplicacoes.aspx?id=21',NULL,'A','2022-01-21 23:00:02','2022-01-21 23:00:02',NULL,2,NULL,NULL),(10,'Consulta NIRE-MEI','Informa????es sobre NIRE do MEI.','https://www.jucerja.rj.gov.br/regin.externo/CON_Consulta_NIRE.aspx',NULL,'A','2022-01-21 23:00:20','2022-01-21 23:00:20',NULL,2,NULL,NULL),(11,'Consulta CNPJ','Informa????es sobre CNPJ das empresas.','https://servicos.receita.fazenda.gov.br/servicos/cnpjreva/cnpjreva_solicitacao.asp',NULL,'A','2022-01-21 23:00:35','2022-01-21 23:00:35',NULL,2,NULL,NULL);
/*!40000 ALTER TABLE `jed_links_uteis` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jed_parametros_globais`
--

LOCK TABLES `jed_parametros_globais` WRITE;
/*!40000 ALTER TABLE `jed_parametros_globais` DISABLE KEYS */;
INSERT INTO `jed_parametros_globais` VALUES (1,'TITULO_GERAL','Titulo do site','Titulo do site','T','J&D Consultoria',1,NULL,'A','2022-01-18 21:35:14','2022-02-01 14:17:41',NULL,1,1,NULL),(2,'PI_SLIDE_SHOW_TITULO','Titulo do Slide Show p??gina principal','Titulo do Slide Show da p??gina principal','T','JED  <br> Consultoria',1,3,'A','2022-01-18 22:03:26','2022-01-18 22:03:26',NULL,1,NULL,NULL),(3,'PI_SLIDE_SHOW_SUBTITULO','Subt??tulo do Slide Show p??gina principal','Subt??tulo do Slide Show p??gina principal','T','Venha nos conhecer!',1,3,'A','2022-01-18 22:04:39','2022-01-21 23:52:09',NULL,1,1,NULL),(4,'PI_SOBRE_TITULO','T??tulo Sobre','T??tulo Sobre','T','Sobre N??s',1,3,'A','2022-01-18 22:06:14','2022-01-31 20:19:58',NULL,1,1,NULL),(5,'PI_SOBRE_TEXTO','Texto sobre a empresa J&D Consultoria','Texto detalhado sobre a empresa J&D Consultoria','T','Somos uma empresa de consultoria em gest??o empresarial e planejamento tribut??rio que tamb??m presta servi??os de assessoria cont??bil, c??lculo cont??bil pericial, imposto de renda pessoa f??sica, aposentadoria e emiss??o de certificado digital.',1,3,'A','2022-01-18 22:07:12','2022-01-18 22:07:12',NULL,1,NULL,NULL),(6,'PI_SOBRE_TEXTO_NEGRITO','Texto sobre a empresa J&D Consultoria em negrito','Texto detalhado sobre a empresa J&D Consultoria em negrito a ser mostrado ap??s o par??metro PI_SOBRE_TEXTO','T','Estamos no mercado desde 2018 e o nosso objetivo ?? o de levar servi??os de excel??ncia, buscando sempre a satisfa????o dos nossos clientes.',1,3,'A','2022-01-18 22:09:30','2022-01-31 21:40:54',NULL,1,1,NULL),(7,'MVV_TITULO','T??tulo Miss??o, Vis??o, Valores','T??tulo Miss??o, Vis??o, Valores','T','Nossos Pilares',1,3,'A','2022-01-18 22:10:44','2022-01-26 18:17:14',NULL,1,1,NULL),(8,'MVV_SUBTITULO','Subtitulo Miss??o, Vis??o, Valores','Subtitulo Miss??o, Vis??o, Valores','T','Miss??o, Vis??o e Valores',1,3,'A','2022-01-18 22:14:28','2022-01-18 22:14:28',NULL,1,NULL,NULL),(9,'MVV_MISSAO_ICONE','Icone da Miss??o','Icone da Miss??o','T','#',1,3,'A','2022-01-18 22:16:13','2022-01-18 22:16:13',NULL,1,NULL,NULL),(10,'MVV_MISSAO_TITULO','T??tulo da Miss??o','T??tulo da Miss??o','T','Miss??o',1,3,'A','2022-01-18 22:17:05','2022-01-18 22:17:05',NULL,1,NULL,NULL),(11,'MVV_MISSAO_TEXTO','Texto da Miss??o','Texto da Miss??o','T','Oferecer  produtos  e  servi??os  com  atendimento  diferenciado,  sendo reconhecida pela inova????o e excel??ncia pelos seus clientes tendo como objetivo central o capital humano.',1,3,'A','2022-01-18 22:19:32','2022-02-01 02:16:26',NULL,1,2,NULL),(12,'MVV_VISAO_ICONE','??cone da Vis??o','??cone da Vis??o','T','#',1,3,'A','2022-01-18 22:20:45','2022-01-18 22:20:45',NULL,1,NULL,NULL),(13,'MVV_VISAO_TITULO','T??tulo da Vis??o','T??tulo da Vis??o','T','Vis??o',1,3,'A','2022-01-18 22:22:03','2022-01-18 22:22:03',NULL,1,NULL,NULL),(14,'MVV_VISAO_TEXTO','Texto da Vis??o','Texto da Vis??o','T','Ser refer??ncia em efici??ncia nos servi??os prestados aos clientes, colaboradores, fornecedores e sociedade, de forma sustent??vel.',1,3,'A','2022-01-18 22:22:34','2022-02-01 02:16:03',NULL,1,2,NULL),(15,'MVV_VALORES_ICONE','Icone de Valores','Icone de Valores','T','#',1,3,'A','2022-01-18 22:35:21','2022-01-18 22:35:21',NULL,1,NULL,NULL),(16,'MVV_VALORES_TITULO','T??tulo de valores','T??tulo de valores','T','Valores',1,3,'A','2022-01-18 22:36:15','2022-01-18 22:36:15',NULL,1,NULL,NULL),(17,'MVV_VALORES_TEXTO','Texto de valores','Texto de valores','T','Trabalho  em  equipe,  ??tica , respeito, transpar??ncia, diversidade  e qualidade.',1,3,'A','2022-01-18 22:38:11','2022-02-09 12:29:40',NULL,1,1,NULL),(18,'PI_QTD_ANOS_EMPRESA','Quantidade de anos de empresa','Quantidade de anos de empresa','N','03',1,3,'A','2022-01-18 22:40:22','2022-01-18 22:40:22',NULL,1,NULL,NULL),(19,'PI_QTD_SV_PRESTADOS_A_ANTERIOR','Quantidade de Servi??os prestados no ano anterior','Quantidade de Servi??os prestados no ano anterior','N','500',1,3,'A','2022-01-18 22:42:01','2022-01-18 22:42:01',NULL,1,NULL,NULL),(20,'PI_QTD_PARCEIROS','Quantidade de Parceiros','Quantidade de Parceiros','N','05',1,3,'A','2022-01-18 22:42:44','2022-01-18 22:42:44',NULL,1,NULL,NULL),(21,'PI_QTD_COLABORADORES','Quantidade de Colaboradores','Quantidade de Colaboradores','N','03',1,3,'A','2022-01-18 22:43:44','2022-01-18 22:43:44',NULL,1,NULL,NULL),(22,'PI_TITULO_DEPOIMENTOS','Titulo Depoimentos','Titulo Depoimentos','T','Depoimentos.',1,3,'A','2022-01-18 22:45:00','2022-01-18 22:45:00',NULL,1,NULL,NULL),(23,'PI_SUBTITULO_DEPOIMENTOS','Subt??tulo Depoimentos','Subt??tulo Depoimentos','T','O que dizem sobre n??s',1,3,'A','2022-01-18 22:46:25','2022-01-18 22:46:25',NULL,1,NULL,NULL),(24,'PI_RODAPE_TEXTO','Texto do Rodap??','Texto do Rodap??','T','Somos uma empresa de consultoria em gest??o empresarial e planejamento tribut??rio que tamb??m presta servi??os de assessoria cont??bil, c??lculo cont??bil pericial, imposto de renda pessoa f??sica, aposentadoria e emiss??o de certificado digital.',1,3,'A','2022-01-18 22:46:51','2022-01-18 22:46:51',NULL,1,NULL,NULL),(25,'CONTATO_ENDERECO','Endere??o','Endere??o','T','Rua Ot??vio Tarquino, 410, Sl 604, Centro, Nova Igua??u, RJ.',1,4,'A','2022-01-18 22:47:33','2022-02-16 00:56:15',NULL,1,1,NULL),(26,'CONTATO_EMAIL','E-mail','E-mail','T','contato@jedconsultoria.com.br',1,4,'A','2022-01-18 22:48:07','2022-01-18 22:50:44',NULL,1,1,NULL),(27,'CONTATO_TELEFONE_WHATSAPP','Telefone Whatsapp','Telefone Whatsapp','N','5521969360480',1,4,'A','2022-01-18 22:48:53','2022-01-20 03:10:27',NULL,1,1,NULL),(28,'CONTATO_HORARIO_FUNCIONAMENTO','Hor??rio de Funcionamento','Hor??rio de Funcionamento','T','Seg, Qua, Qui: 13:00 - 19:00',1,3,'A','2022-01-18 22:51:36','2022-01-18 22:51:36',NULL,1,NULL,NULL),(29,'PG_SOBRE_TITULO','T??tulo sobre a empresa','T??tulo sobre a empresa','T','Sobre n??s',1,5,'A','2022-01-18 22:53:33','2022-01-18 22:53:33',NULL,1,NULL,NULL),(30,'PG_SOBRE_DESCRICAO','Descri????o sobre a empresa','Descri????o sobre a empresa','T','Fique ?? vontade para saber mais sobre nossa equipe e empresa nesta p??gina. Estamos sempre felizes em ajudar voc??!',1,5,'A','2022-01-18 22:55:31','2022-01-18 22:55:31',NULL,1,NULL,NULL),(31,'PG_SOBRE_COLABORADOR_TITULO','T??tulo Sobre o Colaborador','T??tulo Sobre o Colaborador','T','Pessoas que contribuem para nosso sucesso',1,6,'A','2022-01-18 22:57:30','2022-01-18 23:08:06',NULL,1,1,NULL),(32,'PG_SOBRE_COLABORADOR_SUBTITULO','Subt??tulo Sobre o Colaborador','Subt??tulo Sobre o Colaborador','T','Conhe??a nosso Time',1,6,'A','2022-01-18 22:58:21','2022-01-18 23:07:59',NULL,1,1,NULL),(33,'PG_CONTATO_TITULO','T??tulo P??gina de Contatos','T??tulo P??gina de Contatos','T','Contatos',1,4,'A','2022-01-18 22:59:24','2022-01-18 22:59:24',NULL,1,NULL,NULL),(34,'PG_CONTATO_TITULO_TEXTO','Texto Abaixo do t??tulo p??gina de contatos','Texto Abaixo do t??tulo p??gina de contatos','T','Tire suas d??vidas, fa??a um or??amento conosco.',1,3,'A','2022-01-18 23:00:03','2022-01-18 23:00:03',NULL,1,NULL,NULL),(35,'TEXTO_LOADING','Texto do Loading','Texto do Loading','T','Aguarde um momento...',1,NULL,'A','2022-01-19 00:40:47','2022-01-19 00:40:47',NULL,1,NULL,NULL),(36,'R_SOCIAL_URL_INSTAGRAM','Rede Social Instagram','Rede Social Instagram','T','https://www.instagram.com/jed.consultoria/',1,7,'A','2022-01-19 00:46:58','2022-01-19 00:47:43',NULL,1,1,NULL),(37,'CONTATO_TEXTO_WHATSAPP','Texto quando o usuario abre a api do whatsapp','Texto quando o usuario abre a api do whatsapp','T','A%20J%26D%20Consultoria%20agradece%20seu%20contato.%20Como%20podemos%20ajudar%3F',1,4,'A','2022-01-20 03:10:01','2022-01-20 03:33:06',NULL,1,1,NULL),(38,'CONTATO_TELEFONE_FORMATADO','Telefone de contato formatado','Telefone de contato formatado','T','+55 (21) 9 6936-0480',1,4,'A','2022-01-20 03:11:39','2022-01-20 03:11:39',NULL,1,NULL,NULL),(39,'CONTATO_ENDERECO_LINK','Link do Endere??o para abrir o google maps','Link do Endere??o para abrir o google maps','T','https://www.google.com/maps/place/J%26D+Consultoria/@-22.7570396,-43.4484847,15z/data=!4m5!3m4!1s0x0:0x5f75eddf33fb6258!8m2!3d-22.7571123!4d-43.4485194',1,4,'A','2022-01-20 03:38:39','2022-01-31 21:37:59',NULL,1,2,NULL),(40,'PI_SOBRE_SUBTITULO','Sobre Subtitulo','Sobre Subtitulo','T','O que fazemos ?',1,3,'A','2022-01-21 02:29:00','2022-01-21 02:29:00',NULL,1,NULL,NULL),(41,'BOTAO_SAIBA_MAIS','Label Bot??o Saiba Mais','Label Bot??o Saiba Mais','T','Saiba Mais',1,NULL,'A','2022-01-21 03:03:09','2022-01-21 03:03:09',NULL,1,NULL,NULL),(42,'PI_QTD_ANOS_EMPRESA_TITULO','Titulo quantidade anos de empresa','Titulo quantidade anos de empresa','T','Anos no Mercado',1,3,'A','2022-01-22 22:16:18','2022-01-22 22:16:18',NULL,1,NULL,NULL),(43,'PI_QTD_SV_PREST_A_ANT_TITULO','Quantidade servicos prestados ano anterior','Quantidade servicos prestados ano anterior','T','Servi??os prestados em 2021',1,3,'A','2022-01-22 22:17:30','2022-01-22 22:17:30',NULL,1,NULL,NULL),(44,'PI_QTD_PARCEIROS_TITULO','Quantidade de parceiros.','Quantidade de parceiros.','T','Parcerias',1,3,'A','2022-01-22 22:18:50','2022-01-22 22:18:50',NULL,1,NULL,NULL),(45,'QTD_PI_COLABORADORES_TITULO','Titulo quantidade de Colaboradores','Titulo quantidade de Colaboradores','T','Colaboradores',1,3,'A','2022-01-22 22:19:41','2022-01-22 22:19:41',NULL,1,NULL,NULL),(46,'PG_SOBRE_SERVICOS_TITULO','Titulo da lista de servi??os','Exibe o titulo da lista de servi??os','T','DESCUBRA NOSSOS SERVI??OS.',1,5,'A','2022-02-01 13:29:20','2022-02-01 13:29:20',NULL,1,NULL,NULL),(47,'PG_SOBRE_SERVICOS_SUBTITULO_1','Subtitulo da lista de servi??os','Subtitulo da lista de servi??os','T','Uma lista especial de servi??os Para Voc??',1,5,'A','2022-02-01 13:31:53','2022-02-01 13:32:56',NULL,1,1,NULL),(48,'PG_SOBRE_SERVICOS_SUBTITULO_2','Subtitulo 2 da lista de servi??os','Subtitulo 2 da lista de servi??os','T','Uma lista especial de servi??os Para Voc??',1,5,'A','2022-02-01 13:34:43','2022-02-01 13:34:43',NULL,1,NULL,NULL),(49,'CONTATO_ENDEREC_RODAPE_PARTE_1','Endere??o parte 1','Endere??o que fica no rodap?? parte 1','T','Rua Ot??vio Tarquino, 410, Sl 604, Centro,',1,NULL,'A','2022-02-16 01:15:13','2022-02-16 01:28:12',NULL,1,1,NULL),(50,'CONTATO_ENDEREC_RODAPE_PARTE_2','Endere??o parte 2','Endere??o que fica no rodap?? parte 2','T','Nova Igua??u, RJ.',1,NULL,'A','2022-02-16 01:17:53','2022-02-16 01:23:18',NULL,1,1,NULL);
/*!40000 ALTER TABLE `jed_parametros_globais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jed_parceiros`
--

DROP TABLE IF EXISTS `jed_parceiros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jed_parceiros` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `urlimagem` text NOT NULL,
  `indexibirparceiro` varchar(1) DEFAULT NULL,
  `indstatus` varchar(1) NOT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  `dtedicao` timestamp NULL DEFAULT NULL,
  `dtexclusao` timestamp NULL DEFAULT NULL,
  `usucriou` int DEFAULT NULL,
  `usueditou` int DEFAULT NULL,
  `usuexcluiu` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jed_parceiros`
--

LOCK TABLES `jed_parceiros` WRITE;
/*!40000 ALTER TABLE `jed_parceiros` DISABLE KEYS */;
INSERT INTO `jed_parceiros` VALUES (8,'TF Investimentos','Logotipo - TF Financeiro 2_1644349252.jpg','S','A','2022-02-08 19:35:56','2022-02-08 19:40:52',NULL,2,2,NULL),(9,'RV Refrigera????o','Logotipo - RV Refrigera????o 2_1644349316.jpg','S','A','2022-02-08 19:36:59','2022-02-08 19:41:56',NULL,2,2,NULL),(10,'Paulo Alvarenga','Logotipo - Paulo Alvarenga_1644349066.jpg','S','A','2022-02-08 19:37:46','2022-02-08 19:37:46',NULL,2,NULL,NULL),(11,'Criativa e DN2','Logotipo - Criativa e DN2 2_1644349372.jpg','S','A','2022-02-08 19:38:04','2022-02-08 19:42:52',NULL,2,2,NULL),(12,'AR Dimiro','Logotipo - AR Dimiro 2_1644352370.jpg','S','A','2022-02-08 20:32:50','2022-02-08 20:32:50',NULL,2,NULL,NULL),(13,'M-LED Tecnologia','logotipo-m-led-tecnologia_1644408869.png','S','A','2022-02-09 12:14:29','2022-02-09 12:14:29',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `jed_parceiros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jed_servicos`
--

DROP TABLE IF EXISTS `jed_servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jed_servicos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `urlimagem` text,
  `urlservicoexterno` text,
  `idpai` int DEFAULT NULL,
  `indstatus` varchar(1) NOT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  `dtedicao` timestamp NULL DEFAULT NULL,
  `dtexclusao` timestamp NULL DEFAULT NULL,
  `usucriou` int DEFAULT NULL,
  `usueditou` int DEFAULT NULL,
  `usuexcluiu` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jed_servicos`
--

LOCK TABLES `jed_servicos` WRITE;
/*!40000 ALTER TABLE `jed_servicos` DISABLE KEYS */;
INSERT INTO `jed_servicos` VALUES (1,'Assessoria Cont??bil','Engloba todos os departamentos da contabilidade: cont??bil, fiscal, de pessoal e o societ??rio (constitui????o, altera????o ou baixa de empresa).','assessoria-contabil_1643667054.jpg',NULL,NULL,'A','2022-01-30 20:21:06','2022-01-31 22:20:53',NULL,1,2,NULL),(2,'Departamento Cont??bil','Departamento Cont??bil','',NULL,1,'A','2022-01-30 20:21:44','2022-01-31 20:26:30',NULL,1,1,NULL),(3,'Classifica????o da contabilidade de acordo com normas cont??beis vigentes','Classifica????o da contabilidade de acordo com normas cont??beis vigentes','',NULL,2,'A','2022-01-30 20:22:23','2022-01-30 20:22:23',NULL,1,NULL,NULL),(4,'Emiss??o de Balancetes trimestrais','Emiss??o de Balancetes trimestrais','',NULL,2,'A','2022-01-30 20:24:04','2022-01-30 20:24:04',NULL,1,NULL,NULL),(5,'Elabora????o de Balan??o anual e demais Demonstra????es Cont??beis obrigat??rias','Elabora????o de Balan??o anual e demais Demonstra????es Cont??beis obrigat??rias','',NULL,2,'A','2022-01-30 20:24:34','2022-01-30 20:24:34',NULL,1,NULL,NULL),(6,'Departamento Fiscal','Departamento Fiscal','',NULL,1,'A','2022-01-30 20:24:50','2022-01-30 20:26:13',NULL,1,1,NULL),(7,'Orienta????o e controle de aplica????o dos dispositivos legais vigentes','Orienta????o e controle de aplica????o dos dispositivos legais vigentes','',NULL,6,'A','2022-01-30 20:26:42','2022-01-30 20:26:42',NULL,1,NULL,NULL),(8,'Escritura????o dos Registros Fiscais de todos os livros obrigat??rios perante os governos estaduais e municipais, bem como as obriga????es que se fizerem necess??ria e apura????o dos tributos','Escritura????o dos Registros Fiscais de todos os livros obrigat??rios perante os governos estaduais e municipais, bem como as obriga????es que se fizerem necess??ria e apura????o dos tributos','',NULL,6,'A','2022-01-30 20:28:06','2022-01-30 20:28:06',NULL,1,NULL,NULL),(9,'Apura????o dos tributos','Apura????o dos tributos','',NULL,6,'A','2022-01-30 20:28:34','2022-01-30 20:28:34',NULL,1,NULL,NULL),(10,'Envio das obriga????es acess??rias','Envio das obriga????es acess??rias','',NULL,6,'A','2022-01-30 20:28:48','2022-01-30 20:28:48',NULL,1,NULL,NULL),(11,'Atendimento das demais exig??ncias previstas na Legisla????o','Atendimento das demais exig??ncias previstas na Legisla????o','',NULL,6,'A','2022-01-30 20:29:50','2022-01-30 20:29:50',NULL,1,NULL,NULL),(12,'Departamento de Pessoal','Departamento de Pessoal','',NULL,1,'A','2022-01-30 20:30:40','2022-01-30 20:30:40',NULL,1,NULL,NULL),(13,'Contrato de Experi??ncia','Contrato de Experi??ncia','',NULL,12,'A','2022-01-30 20:33:54','2022-01-30 20:33:54',NULL,1,NULL,NULL),(14,'Comunica????o de admiss??o e demiss??o a Secretaria do Trabalho','Comunica????o de admiss??o e demiss??o a Secretaria do Trabalho','',NULL,12,'A','2022-01-30 20:34:13','2022-01-30 20:34:13',NULL,1,NULL,NULL),(15,'Folha de pagamento e recibo de pagamento','Folha de pagamento e recibo de pagamento','',NULL,12,'A','2022-01-30 20:34:39','2022-01-30 20:34:39',NULL,1,NULL,NULL),(16,'FGTS/INSS','FGTS/INSS','',NULL,12,'A','2022-01-30 20:35:19','2022-01-30 20:35:19',NULL,1,NULL,NULL),(17,'Rescis??es trabalhistas','Rescis??es trabalhistas','',NULL,12,'A','2022-01-30 20:36:14','2022-01-30 20:36:14',NULL,1,NULL,NULL),(18,'Recibo de f??rias','Recibo de f??rias','',NULL,12,'A','2022-01-30 20:36:39','2022-01-30 20:36:39',NULL,1,NULL,NULL),(19,'Carta de apresenta????o de empregados','Carta de apresenta????o de empregados','',NULL,12,'A','2022-01-30 20:36:54','2022-01-30 20:36:54',NULL,1,NULL,NULL),(20,'Seguro desemprego','Seguro desemprego','',NULL,12,'A','2022-01-30 20:37:14','2022-01-30 20:37:14',NULL,1,NULL,NULL),(21,'Recibo de responsabilidade de sal??rio-fam??lia','Recibo de responsabilidade de sal??rio-fam??lia','',NULL,12,'A','2022-01-30 20:38:34','2022-01-30 20:38:34',NULL,1,NULL,NULL),(22,'Recibo de vale transporte','Recibo de vale transporte','',NULL,12,'A','2022-01-30 20:39:25','2022-01-30 20:39:25',NULL,1,NULL,NULL),(23,'Guia sindical patronal e empregado','Guia sindical patronal e empregado','',NULL,12,'A','2022-01-30 20:40:11','2022-01-30 20:40:11',NULL,1,NULL,NULL),(24,'Comprovante de rendimento','Comprovante de rendimento','',NULL,12,'A','2022-01-30 20:40:57','2022-01-30 20:40:57',NULL,1,NULL,NULL),(25,'Quadro de hor??rio de empregado','Quadro de hor??rio de empregado','',NULL,12,'A','2022-01-30 20:42:08','2022-01-30 20:42:08',NULL,1,NULL,NULL),(26,'Departamento Societ??rio','Departamento Societ??rio','',NULL,1,'A','2022-01-30 20:46:57','2022-01-30 20:46:57',NULL,1,NULL,NULL),(27,'Abertura de empresa (legaliza????o)','Abertura de empresa (legaliza????o)','',NULL,26,'A','2022-01-30 20:47:16','2022-01-30 20:47:16',NULL,1,NULL,NULL),(28,'Altera????o contratual','Altera????o contratual','',NULL,26,'A','2022-01-30 20:48:13','2022-01-30 20:48:13',NULL,1,NULL,NULL),(29,'Encerramento de empresa (baixa)','Encerramento de empresa (baixa)','',NULL,26,'A','2022-01-30 20:48:34','2022-01-30 20:48:34',NULL,1,NULL,NULL),(30,'Regulariza????o de empresa (levantamento de pend??ncias)','Regulariza????o de empresa (levantamento de pend??ncias)','',NULL,26,'A','2022-01-30 20:49:55','2022-01-30 20:49:55',NULL,1,NULL,NULL),(31,'Parcelamentos','Parcelamentos','',NULL,26,'A','2022-01-30 20:50:43','2022-01-30 20:50:43',NULL,1,NULL,NULL),(32,'Emiss??o de certid??es','Emiss??o de certid??es','',NULL,26,'A','2022-01-30 20:51:07','2022-01-30 20:51:07',NULL,1,NULL,NULL),(33,'Consultoria','Englobam os servi??os de gest??o empresarial e o de planejamento tribut??rio.','consultoria-empresarial-o-que-e-tipos-e-interacoes_1643671975.jpg',NULL,NULL,'A','2022-01-30 20:51:26','2022-01-31 23:32:55',NULL,1,2,NULL),(34,'Gest??o Empresarial','Gest??o Empresarial','',NULL,33,'A','2022-01-30 20:51:41','2022-01-30 20:51:41',NULL,1,NULL,NULL),(35,'Levantamento geral da empresa','Levantamento geral da empresa','',NULL,34,'A','2022-01-30 20:52:35','2022-01-30 20:52:35',NULL,1,NULL,NULL),(36,'Elabora????o de centro de custo','Elabora????o de centro de custo','',NULL,34,'A','2022-01-30 20:53:13','2022-01-30 20:53:13',NULL,1,NULL,NULL),(37,'Implementa????o de processos e/ou setores','Implementa????o de processos e/ou setores','',NULL,34,'A','2022-01-30 20:53:37','2022-01-30 20:53:37',NULL,1,NULL,NULL),(38,'An??lise financeira da empresa','An??lise financeira da empresa','',NULL,34,'A','2022-01-30 20:53:51','2022-01-30 20:53:51',NULL,1,NULL,NULL),(39,'Levantamento dos custos','Levantamento dos custos','',NULL,34,'A','2022-01-30 20:54:13','2022-01-30 20:54:13',NULL,1,NULL,NULL),(40,'Planejamento Tribut??rio','Planejamento Tribut??rio','',NULL,33,'A','2022-01-30 20:56:08','2022-01-30 20:56:08',NULL,1,NULL,NULL),(41,'An??lise dos regimes tribut??rios brasileiros','An??lise dos regimes tribut??rios brasileiros','',NULL,40,'A','2022-01-30 21:00:39','2022-01-30 21:00:39',NULL,1,NULL,NULL),(42,'Compara????o entre os regimes tribut??rios','Compara????o entre os regimes tribut??rios','',NULL,40,'A','2022-01-30 21:01:13','2022-01-30 21:01:13',NULL,1,NULL,NULL),(43,'Verifica????o e apontamento do melhor regime tribut??rio para a empresa','Verifica????o e apontamento do melhor regime tribut??rio para a empresa','',NULL,40,'A','2022-01-30 21:01:48','2022-01-30 21:01:48',NULL,1,NULL,NULL),(44,'C??lculo de Per??cia Cont??bil','Englobam os c??lculos para processos judiciais: trabalhista, tribut??rio, banc??rio e previdenci??rio.','pericias-contabeis_1643671989.jpg',NULL,NULL,'A','2022-01-30 21:02:41','2022-01-31 23:33:09',NULL,1,2,NULL),(45,'C??lculos para processos judiciais','C??lculos para processos judiciais','',NULL,44,'A','2022-01-30 21:03:02','2022-01-30 21:03:02',NULL,1,NULL,NULL),(46,'Imposto de Renda para Pessoa F??sica','Englobam os servi??os de envio da declara????o do IRPF e o da resolu????o de problemas com a malha fina da RFB.','reforma-do-imposto-de-renda-confira-novas-aliquotas-aprovadas_1643672000.jpeg',NULL,NULL,'A','2022-01-30 21:03:15','2022-02-01 15:34:10',NULL,1,1,NULL),(47,'Declara????o de imposto de renda anual','Declara????o de imposto de renda anual','',NULL,46,'A','2022-01-30 21:04:13','2022-01-30 21:04:13',NULL,1,NULL,NULL),(48,'Solu????es de problemas com malha fina','Solu????es de problemas com malha fina','',NULL,46,'A','2022-01-30 21:05:02','2022-01-30 21:05:02',NULL,1,NULL,NULL),(49,'Previd??ncia Social (INSS)','Englobam os processos administrativos e/ou judiciais de: aposentadoria, auxilio doen??a, BPC, levantamento de tempo de contribui????o e simula????o de tempo restante para aposentadoria.','Como-preencher-a-guia-da-Previd??ncia-Social-GPS_1643672012.jpg',NULL,NULL,'A','2022-01-30 21:05:40','2022-01-31 23:33:32',NULL,1,2,NULL),(50,'Entrada no processo de aposentadoria','Entrada no processo de aposentadoria','',NULL,49,'A','2022-01-30 21:06:14','2022-01-30 21:06:14',NULL,1,NULL,NULL),(51,'Certificado Digital (Representante FENACON)','Englobam os servi??os de valida????o e emiss??o de certificado digital, tanto pra pessoa f??sica quanto para pessoa jur??dica.','certificado-digital-para-transportadoras_1643672025.jpg',NULL,NULL,'A','2022-01-30 21:07:27','2022-01-31 23:33:45',NULL,1,2,NULL),(52,'Emiss??o de certificados digitais (PF e PJ)','Emiss??o de certificados digitais (PF e PJ)','','https://www.fenaconcd.com.br/revendedor/pedido-representante/3076',51,'A','2022-01-30 21:08:16','2022-02-08 01:29:02',NULL,1,1,NULL),(53,'Valida????o de certificados digitais (PF e PJ)','Valida????o de certificados digitais (PF e PJ)','','https://www.fenaconcd.com.br/revendedor/pedido-representante/3076',51,'A','2022-01-30 21:08:32','2022-02-08 01:28:40',NULL,1,1,NULL);
/*!40000 ALTER TABLE `jed_servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('sgt.chacal.d@gmail.com','$2y$10$ifTZc8iuDen7bElmz0RUseZAUtwFfU7MzFSkr6CSqMkQiw8bQPcxu','2022-02-06 01:29:02');
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
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricaocargo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlimagem` text COLLATE utf8mb4_unicode_ci,
  `indcolaborador` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urllinkedin` text COLLATE utf8mb4_unicode_ci,
  `urltwitter` text COLLATE utf8mb4_unicode_ci,
  `urlfacebook` text COLLATE utf8mb4_unicode_ci,
  `urlinstagram` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indstatus` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  `dtedicao` timestamp NULL DEFAULT NULL,
  `dtexclusao` timestamp NULL DEFAULT NULL,
  `usucriou` int DEFAULT NULL,
  `usueditou` int DEFAULT NULL,
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
INSERT INTO `users` VALUES (1,'Diego dos Santos Cordeiro','Desenvolvedor de Software','As carreiras que envolvem computadores e internet est??o cada vez mais em alta.','diego_1644979696.png',NULL,NULL,NULL,NULL,NULL,'sgt.chacal.d@gmail.com',NULL,'$2y$10$U1X1YOtU4HaLv7mNVCiaSeLe.jUYuI7VKA3uVGdWI2N9kADO.ovtK','BJjKW0b0fEtxyALS5ZoshEQ2BaEmskiIZsUDskXOLNjNgydNMo3D8Swv6AJ4','A','2022-02-06 01:12:05','2022-02-16 02:48:53',NULL,1,1,'2022-01-15 01:52:30','2022-02-16 02:48:53'),(2,'Daniel Rodrigues Cordeiro','Departamento Fiscal','S??cio co-fundador. Respons??vel pelas rotinas do departamento fiscal e do departamento societ??rio.','IMG-20200716-WA0041_1644261014.jpg','S','https://www.linkedin.com/in/daniel-rodrigues-cordeiro-83a55999/',NULL,NULL,'https://www.instagram.com/_dcordeiro/','danielrodriguesco@gmail.com',NULL,'$2y$10$0QBU/cx1ADi9PqZ7rTIAJu/JWqgtkSn6iehIUn/dsDI.KHF60.3CK',NULL,'A','2022-02-05 22:12:04','2022-02-07 19:31:49',NULL,1,2,'2022-01-20 03:16:11','2022-02-07 19:31:49'),(6,'Jorge Lu??s','Departamento Cont??bil','S??cio fundador. Respons??vel pelas rotinas do departamento cont??bil e do departamento administrativo/financeiro.','IMG-20200716-WA0051_1644261097.jpg','S','https://www.linkedin.com/in/jorge-luis-santos-de-almeida-9161033a/',NULL,'https://www.facebook.com/jorge.santosdealmeida','https://www.instagram.com/jorgeluissantosdealmeida/','jorge@gmail.com',NULL,'$2y$10$G6kAjb9cOv1z4IRqqCHtgu6/V3VYfDU.EDb9Og6X31uDynda7Gkqu',NULL,'A',NULL,'2022-02-07 19:33:20',NULL,NULL,2,'2022-02-06 01:15:33','2022-02-07 19:33:20'),(7,'Claudia Santos Cordeiro','Departamento de Pessoal','Agente de registro. Respons??vel pelas rotinas do departamento de pessoal e o de certifica????o digital.','IMG-20200716-WA0036_1644261125.jpg','S','https://www.linkedin.com/in/cl%C3%A1udia-figueiredo-aab364193/',NULL,'https://www.facebook.com/claudiafigueiredo29','https://www.instagram.com/claudiiafigueiiredo/','claudiafigueiredo9@hotmail.com',NULL,'$2y$10$JY9nj7EgklKiF6ab1Xlw7OnvahpoJDyRRKOxL13VkqOZG78mvsaku',NULL,'A',NULL,'2022-02-07 19:35:04',NULL,NULL,2,'2022-02-06 01:17:27','2022-02-07 19:35:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'jedbd'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-16  0:29:41
