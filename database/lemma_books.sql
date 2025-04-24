-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: book_shop
-- ------------------------------------------------------
-- Server version	9.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `author` (
  `AuthorID` int NOT NULL AUTO_INCREMENT,
  `AuthorName` varchar(255) NOT NULL,
  `AboutAuthor` text,
  PRIMARY KEY (`AuthorID`)
) ENGINE=InnoDB AUTO_INCREMENT=2179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Stephenie Meyer',NULL),(2,'Markus Zusak',NULL),(3,'Lois Lowry',NULL),(4,'Paulo Coelho',NULL),(5,'Sara Gruen',NULL),(6,'Rick Riordan',NULL),(7,'Elizabeth Gilbert',NULL),(8,'Jeannette Walls',NULL),(9,'J.D. Salinger',NULL),(10,'J.K. Rowling',NULL),(11,'Dan Brown',NULL),(12,'Mark Haddon',NULL),(13,'Diana Gabaldon',NULL),(14,'Cormac McCarthy',NULL),(15,'J.R.R. Tolkien',NULL),(16,'George Orwell',NULL),(17,'Jodi Picoult',NULL),(18,'Charlotte Brontë',NULL),(19,'Sue Monk Kidd',NULL),(20,'William Golding',NULL),(21,'John Steinbeck',NULL),(22,'Erik Larson',NULL),(23,'Kazuo Ishiguro',NULL),(24,'Scott Westerfeld',NULL),(25,'Max Brooks',NULL),(26,'Aldous Huxley',NULL),(27,'Barbara Kingsolver',NULL),(28,'Jeffrey Eugenides',NULL),(29,'Arthur Golden',NULL),(30,'Jonathan Safran Foer',NULL),(31,'Kurt Vonnegut Jr.',NULL),(32,'Diane Setterfield',NULL),(33,'Agatha Christie',NULL),(34,'Louisa May Alcott',NULL),(35,'Jon Krakauer',NULL),(36,'Kim Edwards',NULL),(37,'Louis Sachar',NULL),(38,'Oscar Wilde',NULL),(39,'Mitch Albom',NULL),(40,'George R.R. Martin',NULL),(41,'Betty  Smith',NULL),(42,'Neil Gaiman',NULL),(43,'Anita Diamant',NULL),(44,'Donna Tartt',NULL),(45,'Margaret Mitchell',NULL),(46,'Nicholas Sparks',NULL),(47,'Stephen King',NULL),(48,'Bill Bryson',NULL),(49,'Bram Stoker',NULL),(50,'Lisa See',NULL),(51,'E.B. White',NULL),(52,'Ayn Rand',NULL),(53,'William Shakespeare',NULL),(54,'Alexandre Dumas',NULL),(55,'L.M. Montgomery',NULL),(56,'William Goldman',NULL),(57,'Viktor E. Frankl',NULL),(58,'Gabriel García Márquez',NULL),(59,'Steven D. Levitt',NULL),(60,'Ann Patchett',NULL),(61,'Malcolm Gladwell',NULL),(62,'P.C. Cast',NULL),(63,'Haruki Murakami',NULL),(64,'John Grogan',NULL),(65,'Gary Paulsen',NULL),(66,'Frances Hodgson Burnett',NULL),(67,'Roald Dahl',NULL),(68,'Mark Twain',NULL),(69,'Jane Austen',NULL),(70,'James Frey',NULL),(71,'J.R. Ward',NULL),(72,'Nathaniel Hawthorne',NULL),(73,'Christopher Moore',NULL),(74,'Fyodor Dostoyevsky',NULL),(75,'Jhumpa Lahiri',NULL),(76,'Sophie Kinsella',NULL),(77,'Daniel Keyes',NULL),(78,'Nicole Krauss',NULL),(79,'Chuck Palahniuk',NULL),(80,'Alice Walker',NULL),(81,'Ishmael Beah',NULL),(82,'Zora Neale Hurston',NULL),(83,'Alexander McCall Smith',NULL),(84,'Anthony Bourdain',NULL),(85,'Cornelia Funke',NULL),(86,'Michael Chabon',NULL),(87,'Wally Lamb',NULL),(88,'Diana Wynne Jones',NULL),(89,'Toni Morrison',NULL),(90,'Ellen Raskin',NULL),(91,'Gail Carson Levine',NULL),(92,'Brandon Mull',NULL),(93,'Joan Didion',NULL),(94,'Geraldine Brooks',NULL),(95,'Dave Eggers',NULL),(96,'Kate DiCamillo',NULL),(97,'Joseph Conrad',NULL),(98,'Spencer Johnson',NULL),(99,'Milan Kundera',NULL),(100,'Libba Bray',NULL),(101,'Alan Brennert',NULL),(102,'Marjane Satrapi',NULL),(103,'Daphne du Maurier',NULL),(104,'Jasper Fforde',NULL),(105,'José Saramago',NULL),(106,'Kate Jacobs',NULL),(107,'Pearl S. Buck',NULL),(108,'James Patterson',NULL),(109,'Jim Fergus',NULL),(110,'Rohinton Mistry',NULL),(111,'Emily Giffin',NULL),(112,'Jonathan Franzen',NULL),(113,'Anne Rice',NULL),(114,'Mark Z. Danielewski',NULL),(115,'Amy Tan',NULL),(116,'Lauren Weisberger',NULL),(117,'Jack London',NULL),(118,'Stephen R. Covey',NULL),(119,'Eckhart Tolle',NULL),(120,'Robert Louis Stevenson',NULL),(121,'Orson Scott Card',NULL),(122,'Neal Stephenson',NULL),(123,'Azar Nafisi',NULL),(124,'Isaac Asimov',NULL),(125,'Homer',NULL),(126,'Robert M. Pirsig',NULL),(127,'Philip Pullman',NULL),(128,'Dennis Lehane',NULL),(129,'John Knowles',NULL),(130,'Dean Koontz',NULL),(131,'Leo Tolstoy',NULL),(132,'David McCullough',NULL),(133,'Robert A. Heinlein',NULL),(134,'Richard Dawkins',NULL),(135,'Janet Fitch',NULL),(136,'Julia Child',NULL),(137,'Ron Chernow',NULL),(138,'Doris Kearns Goodwin',NULL),(139,'Lewis Carroll',NULL),(140,'Arthur  Miller',NULL),(141,'Art Spiegelman',NULL),(142,'Dodie Smith',NULL),(143,'Sun Tzu',NULL),(144,'Stephen Hawking',NULL),(145,'Julie Powell',NULL),(146,'C.S. Lewis',NULL),(147,'Barbara Ehrenreich',NULL),(148,'Craig Thompson',NULL),(149,'Zadie Smith',NULL),(150,'J.M. Barrie',NULL),(151,'Virginia Woolf',NULL),(152,'Caleb Carr',NULL),(153,'Newt Scamander',NULL),(154,'Chimamanda Ngozi Adichie',NULL),(155,'Kahlil Gibran',NULL),(156,'Ilona Andrews',NULL),(157,'Jennifer Weiner',NULL),(158,'Walter Dean Myers',NULL),(159,'Kate Atkinson',NULL),(160,'Wilkie Collins',NULL),(161,'Katherine Dunn',NULL),(162,'Laura Esquivel',NULL),(163,'Terry Goodkind',NULL),(164,'Margaret Wise Brown',NULL),(165,'Charles Frazier',NULL),(166,'Nathaniel Philbrick',NULL),(167,'Eric Schlosser',NULL),(168,'Naomi Novik',NULL),(169,'Ernest Hemingway',NULL),(170,'Arthur Conan Doyle',NULL),(171,'Nora Ephron',NULL),(172,'Howard Zinn',NULL),(173,'Steven Pressfield',NULL),(174,'Carson McCullers',NULL),(175,'James   McBride',NULL),(176,'Willa Cather',NULL),(177,'Bryce Courtenay',NULL),(178,'H.G. Wells',NULL),(179,'Barack Obama',NULL),(180,'Marilynne Robinson',NULL),(181,'Terry Pratchett',NULL),(182,'Salman Rushdie',NULL),(183,'Richard Bachman',NULL),(184,'Sarah Dessen',NULL),(185,'Curtis Sittenfeld',NULL),(186,'Jean M. Auel',NULL),(187,'Mark Dunn',NULL),(188,'Tracy Kidder',NULL),(189,'Richard Preston',NULL),(190,'Dave Barry',NULL),(191,'Jung Chang',NULL),(192,'Wallace Stegner',NULL),(193,'Niccolò Machiavelli',NULL),(194,'Alice Hoffman',NULL),(195,'Marisha Pessl',NULL),(196,'Anne Fadiman',NULL),(197,'Michael   Lewis',NULL),(198,'Rodman Philbrick',NULL),(199,'Tucker Max',NULL),(200,'Meg Cabot',NULL),(201,'John Grisham',NULL),(202,'Upton Sinclair',NULL),(203,'Daniel Defoe',NULL),(204,'Jen Lancaster',NULL),(205,'Kim Harrison',NULL),(206,'Miguel de Cervantes Saavedra',NULL),(207,'Douglas Adams',NULL),(208,'Raymond Chandler',NULL),(209,'Maureen Johnson',NULL),(210,'Alan Moore',NULL),(211,'Laurell K. Hamilton',NULL),(212,'Harlan Coben',NULL),(213,'Joe Haldeman',NULL),(214,'Rachel Caine',NULL),(215,'Nick Hornby',NULL),(216,'Alison Bechdel',NULL),(217,'J.M. Coetzee',NULL),(218,'Philippa Gregory',NULL),(219,'Anita Shreve',NULL),(220,'David    Allen',NULL),(221,'Tamora Pierce',NULL),(222,'Thomas Hardy',NULL),(223,'Donna Woolfolk Cross',NULL),(224,'Robin McKinley',NULL),(225,'Robin S. Sharma',NULL),(226,'Franz Kafka',NULL),(227,'Donald Miller',NULL),(228,'Carl Hiaasen',NULL),(229,'Richard P. Feynman',NULL),(230,'Henry David Thoreau',NULL),(231,'Michael Crichton',NULL),(232,'Robert Ludlum',NULL),(233,'James Joyce',NULL),(234,'Karen Joy Fowler',NULL),(235,'Dr. Seuss',NULL),(236,'Ursula K. Le Guin',NULL),(237,'Mark Helprin',NULL),(238,'Kenneth Grahame',NULL),(239,'Jonathan Swift',NULL),(240,'Kelley Armstrong',NULL),(241,'Pat Conroy',NULL),(242,'A.S. Byatt',NULL),(243,'Laura Ingalls Wilder',NULL),(244,'E.M. Forster',NULL),(245,'Billie Letts',NULL),(246,'George S. Clason',NULL),(247,'Robin Waterfield',NULL),(248,'David Levithan',NULL),(249,'Anna Sewell',NULL),(250,'Gregory Maguire',NULL),(251,'Thomas Pynchon',NULL),(252,'Ian McEwan',NULL),(253,'Chuck Klosterman',NULL),(254,'Jim Butcher',NULL),(255,'Dan Simmons',NULL),(256,'John Gray',NULL),(257,'Tim LaHaye',NULL),(258,'Bryan Lee O\'Malley',NULL),(259,'Thomas  Harris',NULL),(260,'Charles C. Mann',NULL),(261,'Marcus Aurelius',NULL),(262,'Michael Connelly',NULL),(263,'Edith Wharton',NULL),(264,'Robert Greene',NULL),(265,'Frank Beddor',NULL),(266,'Augusten Burroughs',NULL),(267,'Richard Matheson',NULL),(268,'Jules Verne',NULL),(269,'Evelyn Waugh',NULL),(270,'Susan Hill',NULL),(271,'Mark Kurlansky',NULL),(272,'Tsugumi Ohba',NULL),(273,'Philip Roth',NULL),(274,'Graham Greene',NULL),(275,'Ernest J. Gaines',NULL),(276,'Dashiell Hammett',NULL),(277,'Richard Wright',NULL),(278,'Rachel Cohn',NULL),(279,'Judy Blume',NULL),(280,'Alan Paton',NULL),(281,'T.H. White',NULL),(282,'Sarah Dunant',NULL),(283,'Janet Evanovich',NULL),(284,'Bill Willingham',NULL),(285,'Patrick Lencioni',NULL),(286,'Steven Johnson',NULL),(287,'Walter Isaacson',NULL),(288,'Ian Fleming',NULL),(289,'Jerome K. Jerome',NULL),(290,'Thomas L. Friedman',NULL),(291,'Megan Whalen Turner',NULL),(292,'Jared Diamond',NULL),(293,'Michael Pollan',NULL),(294,'Ann Rule',NULL),(295,'Isabel Allende',NULL),(296,'Tom Robbins',NULL),(297,'Karl Marx',NULL),(298,'Robert Jordan',NULL),(299,'Kresley Cole',NULL),(300,'Margaret Atwood',NULL),(301,'Edward P. Jones',NULL),(302,'Pat Frank',NULL),(303,'Loung Ung',NULL),(304,'Jean Craighead George',NULL),(305,'Brian Jacques',NULL),(306,'Thomas J. Stanley',NULL),(307,'John Milton',NULL),(308,'Robert B. Cialdini',NULL),(309,'Alan Lightman',NULL),(310,'Shel Silverstein',NULL),(311,'Jon Stone',NULL),(312,'Astrid Lindgren',NULL),(313,'Victor Hugo',NULL),(314,'Peter Mayle',NULL),(315,'Joyce Carol Oates',NULL),(316,'Bret Easton Ellis',NULL),(317,'Robert R. McCammon',NULL),(318,'William Strunk Jr.',NULL),(319,'Lloyd Alexander',NULL),(320,'Don DeLillo',NULL),(321,'Aleksandr Solzhenitsyn',NULL),(322,'Dave Pelzer',NULL),(323,'Kate Mosse',NULL),(324,'William S. Burroughs',NULL),(325,'Philip K. Dick',NULL),(326,'Åsne Seierstad',NULL),(327,'Mary Karr',NULL),(328,'Greg Behrendt',NULL),(329,'Charles Dickens',NULL),(330,'Ann-Marie MacDonald',NULL);
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `ISBN` varchar(40) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Edition` varchar(50) DEFAULT NULL,
  `Summary` text,
  `Rating` decimal(3,2) DEFAULT NULL,
  `Format` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES ('9780007149827','The Yiddish Policemen\'s Union','1st',NULL,3.71,'paperback'),('9780060515225','Fragile Things: Short Fictions and Wonders','1st',NULL,4.00,'paperback'),('9780060557812','Neverwhere ','1st',NULL,4.17,'paperback'),('9780060572150','Truth and Beauty','1st',NULL,3.94,'paperback'),('9780060590277','A Dirty Job ','1st',NULL,4.07,'paperback'),('9780060786502','The Poisonwood Bible','1st',NULL,4.06,'paperback'),('9780060832810','The Zahir','1st',NULL,3.57,'paperback'),('9780060838720','Bel Canto','1st',NULL,3.93,'paperback'),('9780060852559','Animal  Vegetable  Miracle: A Year of Food Life','1st',NULL,4.04,'paperback'),('9780060899226','Kitchen Confidential: Adventures in the Culinary Underbelly','1st',NULL,4.07,'paperback'),('9780060929879','Brave New World','1st',NULL,3.99,'paperback'),('9780060959036','Prodigal Summer','1st',NULL,4.00,'paperback'),('9780061120060','Their Eyes Were Watching God','1st',NULL,3.91,'paperback'),('9780061120077','A Tree Grows in Brooklyn','1st',NULL,4.26,'paperback'),('9780061122095','By the River Piedra I Sat Down and Wept','1st',NULL,3.57,'paperback'),('9780061122415','The Alchemist','1st',NULL,3.86,'paperback'),('9780061124266','Veronika Decides to Die','1st',NULL,3.70,'paperback'),('9780061139376','Coraline','1st',NULL,4.06,'paperback'),('9780061142024','Stardust','1st',NULL,4.08,'paperback'),('9780061150142','The Pact','1st',NULL,4.01,'paperback'),('9780061234002','Freakonomics: A Rogue Economist Explores the Hidden Side of Everything','1st',NULL,3.97,'paperback'),('9780064410939','Charlotte\'s Web','1st',NULL,4.17,'paperback'),('9780099448471','Sputnik Sweetheart','1st',NULL,3.83,'paperback'),('9780099448570','South of the Border  West of the Sun','1st',NULL,3.87,'paperback'),('9780140230277','Harvesting the Heart','1st',NULL,3.60,'paperback'),('9780140283334','Lord of the Flies','1st',NULL,3.68,'paperback'),('9780140449266','The Count of Monte Cristo','1st',NULL,4.25,'paperback'),('9780141301068','Matilda','1st',NULL,4.31,'paperback'),('9780141318301','The Twits','1st',NULL,3.96,'paperback'),('9780141439587','Emma','1st',NULL,4.00,'paperback'),('9780142000670','Of Mice and Men','1st',NULL,3.87,'paperback'),('9780142000687','Cannery Row','1st',NULL,4.04,'paperback'),('9780142000694','The Pearl','1st',NULL,3.46,'paperback'),('9780142000700','Travels with Charley: In Search of America','1st',NULL,4.08,'paperback'),('9780142001745','The Secret Life of Bees','1st',NULL,4.05,'paperback'),('9780142403884','Charlie and the Chocolate Factory ','1st',NULL,4.13,'paperback'),('9780142437018','A Little Princess','1st',NULL,4.20,'paperback'),('9780142437179','The Adventures of Huckleberry Finn ','1st',NULL,3.82,'paperback'),('9780142437209','Jane Eyre','1st',NULL,4.12,'paperback'),('9780142437261','The Scarlet Letter','1st',NULL,3.40,'paperback'),('9780143036692','The Mermaid Chair','1st',NULL,3.13,'paperback'),('9780143037149','The Memory Keeper\'s Daughter','1st',NULL,3.67,'paperback'),('9780143038412','Eat  Pray  Love','1st',NULL,3.55,'paperback'),('9780143039563','The Adventures of Tom Sawyer ','1st',NULL,3.91,'paperback'),('9780143058144','Crime and Punishment','1st',NULL,4.21,'paperback'),('9780156030304','Flowers for Algernon','1st',NULL,4.12,'paperback'),('9780192802637','Persuasion','1st',NULL,4.14,'paperback'),('9780198320272','Julius Caesar','1st',NULL,3.68,'paperback'),('9780307265432','The Road','1st',NULL,3.97,'paperback'),('9780307265838','After Dark','1st',NULL,3.70,'paperback'),('9780307276902','A Million Little Pieces','1st',NULL,3.65,'paperback'),('9780307277671','The Da Vinci Code ','1st',NULL,3.84,'paperback'),('9780307279460','A Walk in the Woods: Rediscovering America on the Appalachian Trail','1st',NULL,4.06,'paperback'),('9780307346605','World War Z: An Oral History of the Zombie War','1st',NULL,4.01,'paperback'),('9780307348241','Cujo','1st',NULL,3.71,'paperback'),('9780312282998','The Amazing Adventures of Kavalier & Clay','1st',NULL,4.18,'paperback'),('9780312330873','And Then There Were None','1st',NULL,4.26,'paperback'),('9780312353766','The Red Tent','1st',NULL,4.17,'paperback'),('9780312360269','Marked ','1st',NULL,3.80,'paperback'),('9780312422158','Middlesex','1st',NULL,4.00,'paperback'),('9780316010665','Blink: The Power of Thinking Without Thinking','1st',NULL,3.93,'paperback'),('9780316015844','Twilight ','1st',NULL,3.59,'paperback'),('9780316346627','The Tipping Point: How Little Things Can Make a Big Difference','1st',NULL,3.97,'paperback'),('9780316767729','Nine Stories','1st',NULL,4.19,'paperback'),('9780316769020','Franny and Zooey','1st',NULL,3.98,'paperback'),('9780316769174','The Catcher in the Rye','1st',NULL,3.80,'paperback'),('9780345418265','The Princess Bride','1st',NULL,4.26,'paperback'),('9780374105235','A Long Way Gone: Memoirs of a Boy Soldier','1st',NULL,4.16,'paperback'),('9780374528379','The Brothers Karamazov','1st',NULL,4.32,'paperback'),('9780375704024','Norwegian Wood','1st',NULL,4.03,'paperback'),('9780375706677','No Country for Old Men','1st',NULL,4.14,'paperback'),('9780375718946','A Wild Sheep Chase ','1st',NULL,3.95,'paperback'),('9780375751516','The Picture of Dorian Gray','1st',NULL,4.08,'paperback'),('9780375814242','James and the Giant Peach','1st',NULL,4.01,'paperback'),('9780375822070','Fantastic Mr. Fox','1st',NULL,4.05,'paperback'),('9780375831003','The Book Thief','1st',NULL,4.37,'paperback'),('9780375836671','I Am the Messenger','1st',NULL,4.07,'paperback'),('9780380727506','Notes from a Small Island','1st',NULL,3.91,'paperback'),('9780380813810','Lamb: The Gospel According to Biff  Christ\'s Childhood Pal','1st',NULL,4.25,'paperback'),('9780385333849','Slaughterhouse-Five','1st',NULL,4.07,'paperback'),('9780385335973','Dragonfly in Amber ','1st',NULL,4.32,'paperback'),('9780385335980','Drums of Autumn ','1st',NULL,4.35,'paperback'),('9780385335997','Voyager ','1st',NULL,4.39,'paperback'),('9780385338691','The Undomestic Goddess','1st',NULL,3.83,'paperback'),('9780385340397','A Breath of Snow and Ashes ','1st',NULL,4.44,'paperback'),('9780385486804','Into the Wild','1st',NULL,3.98,'paperback'),('9780385494786','Into Thin Air: A Personal Account of the Mount Everest Disaster','1st',NULL,4.17,'paperback'),('9780385517874','Rant','1st',NULL,3.81,'paperback'),('9780385732536','Messenger ','1st',NULL,3.91,'paperback'),('9780385732550','The Giver ','1st',NULL,4.13,'paperback'),('9780385732567','Gathering Blue ','1st',NULL,3.82,'paperback'),('9780393327342','Fight Club','1st',NULL,4.19,'paperback'),('9780393328622','The History of Love','1st',NULL,3.92,'paperback'),('9780393970128','Dracula','1st',NULL,3.99,'paperback'),('9780425185506','Picture Perfect','1st',NULL,3.54,'paperback'),('9780425200452','Murder on the Orient Express ','1st',NULL,4.17,'paperback'),('9780439064866','Harry Potter and the Chamber of Secrets ','1st',NULL,4.42,'paperback'),('9780439244190','Holes ','1st',NULL,3.96,'paperback'),('9780439358071','Harry Potter and the Order of the Phoenix ','1st',NULL,4.49,'paperback'),('9780439554008','Inkspell ','1st',NULL,3.92,'paperback'),('9780439655484','Harry Potter and the Prisoner of Azkaban ','1st',NULL,4.56,'paperback'),('9780439709101','Inkheart ','1st',NULL,3.88,'paperback'),('9780439785969','Harry Potter and the Half-Blood Prince ','1st',NULL,4.57,'paperback'),('9780440221661','The Fiery Cross ','1st',NULL,4.27,'paperback'),('9780440241416','Confessions of a Shopaholic ','1st',NULL,3.64,'paperback'),('9780440241904','Can You Keep a Secret?','1st',NULL,3.84,'paperback'),('9780440242949','Outlander ','1st',NULL,4.23,'paperback'),('9780446528054','Dear John','1st',NULL,4.03,'paperback'),('9780446615860','The Wedding ','1st',NULL,3.99,'paperback'),('9780446675536','Gone with the Wind','1st',NULL,4.29,'paperback'),('9780446676076','Message in a Bottle','1st',NULL,3.96,'paperback'),('9780446693806','A Walk to Remember','1st',NULL,4.17,'paperback'),('9780446694858','Three Weeks With My Brother','1st',NULL,4.03,'paperback'),('9780446696111','The Guardian','1st',NULL,4.15,'paperback'),('9780446696128','The Rescue','1st',NULL,4.11,'paperback'),('9780446696135','A Bend in the Road','1st',NULL,4.03,'paperback'),('9780446698467','At First Sight ','1st',NULL,3.82,'paperback'),('9780450040184','The Shining','1st',NULL,4.22,'paperback'),('9780450417399','Misery','1st',NULL,4.16,'paperback'),('9780451191151','The Fountainhead','1st',NULL,3.87,'paperback'),('9780451210852','The Drawing of the Three ','1st',NULL,4.23,'paperback'),('9780451216953','Dark Lover ','1st',NULL,4.20,'paperback'),('9780451218049','Lover Eternal ','1st',NULL,4.35,'paperback'),('9780451219367','Lover Awakened ','1st',NULL,4.45,'paperback'),('9780451412355','Lover Revealed ','1st',NULL,4.30,'paperback'),('9780451528827','Anne of Green Gables ','1st',NULL,4.25,'paperback'),('9780451529305','Little Women','1st',NULL,4.07,'paperback'),('9780451933027','The Green Mile','1st',NULL,4.44,'paperback'),('9780452011878','Atlas Shrugged','1st',NULL,3.69,'paperback'),('9780452281257','Anthem','1st',NULL,3.63,'paperback'),('9780452284241','Animal Farm','1st',NULL,3.93,'paperback'),('9780517189603','The Secret Garden','1st',NULL,4.13,'paperback'),('9780521618748','Hamlet','1st',NULL,4.02,'paperback'),('9780553381696','A Clash of Kings  ','1st',NULL,4.41,'paperback'),('9780553816716','The Notebook ','1st',NULL,4.09,'paperback'),('9780618101368','Interpreter of Maladies','1st',NULL,4.15,'paperback'),('9780618260300','The Hobbit  or There and Back Again','1st',NULL,4.27,'paperback'),('9780618346257','The Fellowship of the Ring ','1st',NULL,4.36,'paperback'),('9780618346264','The Two Towers ','1st',NULL,4.44,'paperback'),('9780618391110','The Silmarillion','1st',NULL,3.92,'paperback'),('9780618485222','The Namesake','1st',NULL,3.99,'paperback'),('9780618711659','Extremely Loud and Incredibly Close','1st',NULL,3.98,'paperback'),('9780646418438','The Mysterious Affair at Styles ','1st',NULL,3.99,'paperback'),('9780670032563','The Waste Lands ','1st',NULL,4.24,'paperback'),('9780671727796','The Color Purple','1st',NULL,4.20,'paperback'),('9780679642428','The Idiot','1st',NULL,4.18,'paperback'),('9780689840920','Hatchet ','1st',NULL,3.72,'paperback'),('9780689865381','Uglies ','1st',NULL,3.86,'paperback'),('9780689865398','Pretties ','1st',NULL,3.85,'paperback'),('9780689865404','Specials ','1st',NULL,3.77,'paperback'),('9780739303405','The Devil in the White City: Murder  Magic  and Madness at the Fair That Changed America','1st',NULL,3.99,'paperback'),('9780739326220','Memoirs of a Geisha','1st',NULL,4.11,'paperback'),('9780739461198','Marley and Me: Life and Love With the World\'s Worst Dog','1st',NULL,4.13,'paperback'),('9780743247542','The Glass Castle','1st',NULL,4.27,'paperback'),('9780743275019','Plain Truth','1st',NULL,3.98,'paperback'),('9780743289412','Lisey\'s Story','1st',NULL,3.68,'paperback'),('9780743298025','The Thirteenth Tale','1st',NULL,3.96,'paperback'),('9780743418713','Salem Falls','1st',NULL,3.82,'paperback'),('9780743422444','Mercy','1st',NULL,3.58,'paperback'),('9780743454537','My Sister\'s Keeper','1st',NULL,4.07,'paperback'),('9780743454551','Vanishing Acts','1st',NULL,3.69,'paperback'),('9780743477109','Macbeth','1st',NULL,3.90,'paperback'),('9780743477116','Romeo and Juliet','1st',NULL,3.74,'paperback'),('9780743477550','Othello','1st',NULL,3.89,'paperback'),('9780743482769','King Lear','1st',NULL,3.91,'paperback'),('9780743482776','Twelfth Night','1st',NULL,3.98,'paperback'),('9780743496711','The Tenth Circle','1st',NULL,3.50,'paperback'),('9780743496728','Nineteen Minutes','1st',NULL,4.12,'paperback'),('9780747263746','American Gods ','1st',NULL,4.11,'paperback'),('9780767903868','In a Sunburned Country','1st',NULL,4.07,'paperback'),('9780767908184','A Short History of Nearly Everything','1st',NULL,4.21,'paperback'),('9780786838653','The Lightning Thief ','1st',NULL,4.25,'paperback'),('9780786856862','The Sea of Monsters ','1st',NULL,4.24,'paperback'),('9780807014295','Man\'s Search for Meaning','1st',NULL,4.36,'paperback'),('9780812474947','The Bean Trees ','1st',NULL,3.97,'paperback'),('9780812968064','Snow Flower and the Secret Fan','1st',NULL,4.07,'paperback'),('9780831727529','Gerald\'s Game','1st',NULL,3.51,'paperback'),('9781400031702','The Secret History','1st',NULL,4.10,'paperback'),('9781400032716','The Curious Incident of the Dog in the Night-Time','1st',NULL,3.88,'paperback'),('9781400032822','Haunted','1st',NULL,3.59,'paperback'),('9781400034680','Love in the Time of Cholera','1st',NULL,3.91,'paperback'),('9781400034710','Chronicle of a Death Foretold','1st',NULL,3.97,'paperback'),('9781400034772','The No. 1 Ladies\' Detective Agency ','1st',NULL,3.78,'paperback'),('9781400064663','Peony in Love','1st',NULL,3.60,'paperback'),('9781400078776','Never Let Me Go','1st',NULL,3.82,'paperback'),('9781400079278','Kafka on the Shore','1st',NULL,4.14,'paperback'),('9781400080663','Thunderstruck','1st',NULL,3.70,'paperback'),('9781400096893','Memoirs of a Geisha','1st',NULL,4.11,'paperback'),('9781401303273','For One More Day','1st',NULL,4.10,'paperback'),('9781401308582','The Five People You Meet in Heaven','1st',NULL,3.93,'paperback'),('9781416516934','Wolves of the Calla ','1st',NULL,4.18,'paperback'),('9781416524342','Pet Sematary','1st',NULL,3.98,'paperback'),('9781416524793','Angels & Demons ','1st',NULL,3.89,'paperback'),('9781563892271','Preludes & Nocturnes ','1st',NULL,4.24,'paperback'),('9781565125605','Water for Elephants','1st',NULL,4.09,'paperback'),('9781579126247','The A.B.C. Murders ','1st',NULL,4.01,'paperback'),('9781579126278','The Murder of Roger Ackroyd ','1st',NULL,4.24,'paperback'),('9781841150505','The Patron Saint of Liars','1st',NULL,3.80,'paperback');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_authorship`
--

DROP TABLE IF EXISTS `book_authorship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_authorship` (
  `ISBN` varchar(20) NOT NULL,
  `AuthorID` int NOT NULL,
  PRIMARY KEY (`ISBN`,`AuthorID`),
  KEY `AuthorID` (`AuthorID`),
  CONSTRAINT `book_authorship_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE,
  CONSTRAINT `book_authorship_ibfk_2` FOREIGN KEY (`AuthorID`) REFERENCES `author` (`AuthorID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_authorship`
--

LOCK TABLES `book_authorship` WRITE;
/*!40000 ALTER TABLE `book_authorship` DISABLE KEYS */;
INSERT INTO `book_authorship` VALUES ('9780316015844',1),('9780375831003',2),('9780375836671',2),('9780385732536',3),('9780385732550',3),('9780385732567',3),('9780060832810',4),('9780061122095',4),('9780061122415',4),('9780061124266',4),('9781565125605',5),('9780786838653',6),('9780786856862',6),('9780143038412',7),('9780743247542',8),('9780316767729',9),('9780316769020',9),('9780316769174',9),('9780439064866',10),('9780439358071',10),('9780439655484',10),('9780439785969',10),('9780307277671',11),('9781416524793',11),('9781400032716',12),('9780385335973',13),('9780385335980',13),('9780385335997',13),('9780385340397',13),('9780440221661',13),('9780440242949',13),('9780307265432',14),('9780375706677',14),('9780618260300',15),('9780618346257',15),('9780618346264',15),('9780618391110',15),('9780452284241',16),('9780061150142',17),('9780140230277',17),('9780425185506',17),('9780743275019',17),('9780743418713',17),('9780743422444',17),('9780743454537',17),('9780743454551',17),('9780743496711',17),('9780743496728',17),('9780142437209',18),('9780142001745',19),('9780143036692',19),('9780140283334',20),('9780142000670',21),('9780142000687',21),('9780142000694',21),('9780142000700',21),('9780739303405',22),('9781400080663',22),('9781400078776',23),('9780689865381',24),('9780689865398',24),('9780689865404',24),('9780307346605',25),('9780060929879',26),('9780060786502',27),('9780060852559',27),('9780060959036',27),('9780812474947',27),('9780312422158',28),('9780739326220',29),('9781400096893',29),('9780618711659',30),('9780385333849',31),('9780743298025',32),('9780312330873',33),('9780425200452',33),('9780646418438',33),('9781579126247',33),('9781579126278',33),('9780451529305',34),('9780385486804',35),('9780385494786',35),('9780143037149',36),('9780439244190',37),('9780375751516',38),('9781401303273',39),('9781401308582',39),('9780553381696',40),('9780061120077',41),('9780060515225',42),('9780060557812',42),('9780061139376',42),('9780061142024',42),('9780747263746',42),('9781563892271',42),('9780312353766',43),('9781400031702',44),('9780446675536',45),('9780446528054',46),('9780446615860',46),('9780446676076',46),('9780446693806',46),('9780446694858',46),('9780446696111',46),('9780446696128',46),('9780446696135',46),('9780446698467',46),('9780553816716',46),('9780307348241',47),('9780450040184',47),('9780450417399',47),('9780451210852',47),('9780451933027',47),('9780670032563',47),('9780743289412',47),('9780831727529',47),('9781416516934',47),('9781416524342',47),('9780307279460',48),('9780380727506',48),('9780767903868',48),('9780767908184',48),('9780393970128',49),('9780812968064',50),('9781400064663',50),('9780064410939',51),('9780451191151',52),('9780452011878',52),('9780452281257',52),('9780198320272',53),('9780521618748',53),('9780743477109',53),('9780743477116',53),('9780743477550',53),('9780743482769',53),('9780743482776',53),('9780140449266',54),('9780451528827',55),('9780345418265',56),('9780807014295',57),('9781400034680',58),('9781400034710',58),('9780061234002',59),('9780060572150',60),('9780060838720',60),('9781841150505',60),('9780316010665',61),('9780316346627',61),('9780312360269',62),('9780099448471',63),('9780099448570',63),('9780307265838',63),('9780375704024',63),('9780375718946',63),('9781400079278',63),('9780739461198',64),('9780689840920',65),('9780142437018',66),('9780517189603',66),('9780141301068',67),('9780141318301',67),('9780142403884',67),('9780375814242',67),('9780375822070',67),('9780142437179',68),('9780143039563',68),('9780141439587',69),('9780192802637',69),('9780307276902',70),('9780451216953',71),('9780451218049',71),('9780451219367',71),('9780451412355',71),('9780142437261',72),('9780060590277',73),('9780380813810',73),('9780143058144',74),('9780374528379',74),('9780679642428',74),('9780618101368',75),('9780618485222',75),('9780385338691',76),('9780440241416',76),('9780440241904',76),('9780156030304',77),('9780393328622',78),('9780385517874',79),('9780393327342',79),('9781400032822',79),('9780671727796',80),('9780374105235',81),('9780061120060',82),('9781400034772',83),('9780060899226',84),('9780439554008',85),('9780439709101',85),('9780007149827',86),('9780312282998',86);
/*!40000 ALTER TABLE `book_authorship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_genres`
--

DROP TABLE IF EXISTS `book_genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_genres` (
  `ISBN` varchar(20) NOT NULL,
  `GenreID` int NOT NULL,
  PRIMARY KEY (`ISBN`,`GenreID`),
  KEY `GenreID` (`GenreID`),
  CONSTRAINT `book_genres_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE,
  CONSTRAINT `book_genres_ibfk_2` FOREIGN KEY (`GenreID`) REFERENCES `genres` (`GenreID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_genres`
--

LOCK TABLES `book_genres` WRITE;
/*!40000 ALTER TABLE `book_genres` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_ordered`
--

DROP TABLE IF EXISTS `books_ordered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books_ordered` (
  `OrderID` int NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `Qty` int NOT NULL,
  PRIMARY KEY (`OrderID`,`ISBN`),
  KEY `ISBN` (`ISBN`),
  CONSTRAINT `books_ordered_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE,
  CONSTRAINT `books_ordered_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_ordered`
--

LOCK TABLES `books_ordered` WRITE;
/*!40000 ALTER TABLE `books_ordered` DISABLE KEYS */;
/*!40000 ALTER TABLE `books_ordered` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_item` (
  `CartID` int NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `Quantity` int NOT NULL,
  PRIMARY KEY (`CartID`,`ISBN`),
  KEY `ISBN` (`ISBN`),
  CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`CartID`) REFERENCES `shopping_cart` (`CartID`) ON DELETE CASCADE,
  CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_item`
--

LOCK TABLES `cart_item` WRITE;
/*!40000 ALTER TABLE `cart_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `CustomerID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`CustomerID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `GenreID` int NOT NULL AUTO_INCREMENT,
  `Genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`GenreID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `ISBN` varchar(20) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Qty` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ISBN`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `OrderID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int NOT NULL,
  `ShippingAddress` varchar(255) NOT NULL,
  `OrderStatus` varchar(50) NOT NULL,
  `DatePlaced` date NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `CustomerID` (`CustomerID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `places` (
  `OrderID` int NOT NULL,
  `CustomerID` int NOT NULL,
  PRIMARY KEY (`OrderID`,`CustomerID`),
  KEY `CustomerID` (`CustomerID`),
  CONSTRAINT `places_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE,
  CONSTRAINT `places_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shopping_cart` (
  `CartID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int NOT NULL,
  PRIMARY KEY (`CartID`),
  KEY `CustomerID` (`CustomerID`),
  CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart`
--

LOCK TABLES `shopping_cart` WRITE;
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag` (
  `TagID` int NOT NULL AUTO_INCREMENT,
  `Keyword` varchar(100) NOT NULL,
  PRIMARY KEY (`TagID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagged_as`
--

DROP TABLE IF EXISTS `tagged_as`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tagged_as` (
  `TagID` int NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  PRIMARY KEY (`TagID`,`ISBN`),
  KEY `ISBN` (`ISBN`),
  CONSTRAINT `tagged_as_ibfk_1` FOREIGN KEY (`TagID`) REFERENCES `tag` (`TagID`) ON DELETE CASCADE,
  CONSTRAINT `tagged_as_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagged_as`
--

LOCK TABLES `tagged_as` WRITE;
/*!40000 ALTER TABLE `tagged_as` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagged_as` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-23 23:30:21
