SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
USE `iwa_2019_vz_projekt` ;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

INSERT INTO `tip_korisnika` (`tip_korisnika_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'voditelj'),
(2, 'korisnik');


INSERT INTO `korisnik` (`korisnik_id`, `tip_korisnika_id`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `email`, `slika`) VALUES
(1, 0, 'admin', 'foi', 'Administrator', 'Admin', 'admin@foi.hr', 'korisnici/admin.jpg'),
(2, 1, 'voditelj', '123456', 'voditelj', 'Vodi', 'voditelj@foi.hr', 'korisnici/admin.jpg'),
(3, 2, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 'korisnici/pkos.jpg'),
(4, 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 'korisnici/vzec.jpg'),
(5, 2, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 'korisnici/qtarantino.jpg'),
(6, 2, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 'korisnici/mbellucci.jpg'),
(7, 2, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 'korisnici/vmortensen.jpg'),
(8, 2, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 'korisnici/jgarner.jpg'),
(9, 2, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 'korisnici/nportman.jpg'),
(10, 2, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr', 'korisnici/dradcliffe.jpg'),
(11, 2, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 'korisnici/hberry.jpg'),
(12, 2, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 'korisnici/vdiesel.jpg'),
(13, 2, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 'korisnici/ecuthbert.jpg'),
(14, 2, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 'korisnici/janiston.jpg'),
(15, 2, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 'korisnici/ctheron.jpg'),
(16, 2, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 'korisnici/nkidman.jpg'),
(17, 2, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 'korisnici/ewatson.jpg'),
(18, 1, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 'korisnici/kdunst.jpg'),
(19, 2, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 'korisnici/sjohansson.jpg'),
(20, 2, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 'korisnici/philton.jpg'),
(21, 2, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 'korisnici/kbeckinsale.jpg'),
(22, 2, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 'korisnici/tcruise.jpg'),
(23, 2, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 'korisnici/hduff.jpg'),
(24, 2, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 'korisnici/ajolie.jpg'),
(25, 2, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 'korisnici/kknightley.jpg'),
(26, 2, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 'korisnici/obloom.jpg'),
(27, 2, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 'korisnici/llohan.jpg'),
(28, 2, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 'korisnici/jdepp.jpg'),
(29, 2, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 'korisnici/kreeves.jpg'),
(30, 1, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 'korisnici/thanks.jpg'),
(31, 2, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 'korisnici/elongoria.jpg'),
(32, 2, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 'korisnici/rde.jpg'),
(33, 2, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 'korisnici/jheder.jpg'),
(34, 2, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 'korisnici/rmcadams.jpg'),
(35, 2, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 'korisnici/cbale.jpg'),
(36, 1, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 'korisnici/jalba.jpg'),
(37, 2, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 'korisnici/bpitt.jpg'),
(43, 2, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 'korisnici/apacino.jpg'),
(44, 2, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 'korisnici/wsmith.jpg'),
(45, 2, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 'korisnici/ncage.jpg'),
(46, 2, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 'korisnici/vanne.jpg'),
(47, 2, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 'korisnici/kheigl.jpg'),
(48, 2, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 'korisnici/gbutler.jpg'),
(49, 2, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 'korisnici/jbiel.jpg'),
(50, 2, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 'korisnici/ldicaprio.jpg'),
(51, 2, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 'korisnici/mdamon.jpg'),
(52, 2, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 'korisnici/hpanettiere.jpg'),
(53, 2, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 'korisnici/rreynolds.jpg'),
(54, 2, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 'korisnici/jstatham.jpg'),
(55, 2, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 'korisnici/enorton.jpg'),
(56, 2, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 'korisnici/mwahlberg.jpg'),
(57, 2, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 'korisnici/jmcavoy.jpg'),
(58, 2, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 'korisnici/epage.jpg'),
(59, 2, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 'korisnici/mcyrus.jpg'),
(60, 2, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 'korisnici/kstewart.jpg'),
(61, 2, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 'korisnici/mfox.jpg'),
(62, 2, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 'korisnici/slabeouf.jpg'),
(63, 2, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 'korisnici/ceastwood.jpg'),
(64, 2, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 'korisnici/srogen.jpg'),
(65, 2, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr', 'korisnici/nreed.jpg'),
(66, 2, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr', 'korisnici/agreene.jpg'),
(67, 2, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr', 'korisnici/zdeschanel.jpg'),
(68, 2, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr', 'korisnici/dfanning.jpg'),
(69, 2, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr', 'korisnici/tlautner.jpg'),
(70, 2, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr', 'korisnici/rpattinson.jpg');


INSERT INTO `valuta` (`valuta_id`, `moderator_id`, `naziv`, `tecaj`, `slika`, `zvuk`, `aktivno_od`, `aktivno_do`, `datum_azuriranja`) VALUES
(1,2,'EMU - EUR',7.413473,'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/300px-Flag_of_Europe.svg.png','','12:00','20:00','2019-11-08'),
(2,2,'SAD - USD',6.686636,'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/120px-Flag_of_the_United_States.svg.png','http://www.worldnationalanthem.com/wp-content/uploads/2015/05/National-Anthem-Of-The-United-States.mp3','12:00','14:00','2019-11-05'),
(3,2,'Švicarska - CHF',6.744426,'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/120px-Flag_of_Switzerland.svg.png','https://www.redringtones.com/wp-content/uploads/2016/08/switzerland-national-anthem.mp3','10:00','12:00','2019-11-05'),
(4,2,'Japan - JPY',612.4306,'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Flag_of_Japan.svg/120px-Flag_of_Japan.svg.png','https://www.redringtones.com/wp-content/uploads/2016/09/japan-national-anthem.mp3','12:00','14:00','2019-11-05'),
(5,18,'Velika Britanija - GBP',8.601314,'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Flag_of_the_United_Kingdom.svg/120px-Flag_of_the_United_Kingdom.svg.png','','12:00','14:00','2019-11-05'),
(6,2,'Hrvatska - HRK',1,'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Croatia.svg/120px-Flag_of_Croatia.svg.png','','10:00','12:00','2019-11-05');

INSERT INTO `sredstva` (`korisnik_id`, `valuta_id`, `iznos`) VALUES
(3,1,1000),
(3,2,1500),
(3,3,2000),
(3,6,10000),
(2,1,100),
(2,2,500),
(2,4,200),
(2,6,100000),
(4,1,100),
(4,2,100),
(4,3,200),
(4,6,100),
(5,1,1000),
(5,2,1500),
(5,3,2000),
(5,6,10000),
(5,5,1000),
(6,4,1500),
(6,3,2000),
(6,6,10000);


INSERT INTO `zahtjev` (`korisnik_id`, `iznos`, `prodajem_valuta_id`, `kupujem_valuta_id`, `datum_vrijeme_kreiranja`, `prihvacen`) VALUES 
(3,100,1,6,'2019-08-01 09:30:00',1),
(3,200,1,6,'2019-08-02 09:30:00',1),
(3,1000,2,6,'2019-08-03 09:30:00',1),
(3,150,3,6,'2019-08-04 09:30:00',1),
(3,110,6,1,'2019-08-05 09:30:00',1),
(3,200,1,6,'2019-08-06 09:30:00',0),
(3,100,1,6,'2019-08-07 09:30:00',1),
(2,10,1,6,'2019-08-01 09:30:00',1),
(2,20,1,6,'2019-08-02 09:30:00',1),
(2,100,2,6,'2019-08-03 09:30:00',0),
(2,15,4,6,'2019-08-04 09:30:00',0),
(2,11,6,1,'2018-08-05 09:30:00',1),
(2,20,1,6,'2018-08-06 09:30:00',0),
(2,10,1,6,'2019-08-07 09:30:00',1),
(4,1000,1,2,'2018-08-01 09:30:00',1),
(4,2000,1,3,'2018-08-02 09:30:00',1),
(4,1000,2,6,'2018-08-03 09:30:00',0),
(4,1500,3,6,'2018-08-04 09:30:00',0),
(4,1100,6,2,'2019-08-05 09:30:00',0),
(4,2000,2,6,'2019-08-06 09:30:00',0),
(4,1000,2,6,'2019-08-07 09:30:00',1),
(5,2000,5,6,'2019-08-06 09:30:00',0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
