-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2021 at 02:06 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurukul`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL DEFAULT '1',
  `home` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `campus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trust` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vision` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `computer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `science` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `library` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auditorium` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sports` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `extra` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `working` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `home`, `campus`, `trust`, `message`, `vision`, `computer`, `science`, `library`, `auditorium`, `sports`, `extra`, `working`, `admission`) VALUES
(1, '<h1>Welcome To Gurukul!</h1>\r\n<p>The institution, which is the vision of our beloved chairman and renowned industrialist, philanthropist, Mr.Arya was started in the year 1987 and has completed 33 years of successful and premier service in the field of primary & secondary education in this rural part of Uttar Kannada. The institution has grown leaps and bounds in terms of infrastructure, intake and faculty, since its inception. The institution is affiliated to Department of primary & secondary Education, Govt. of Karnataka and approved by All India Council for primary & secondary Education, New Delhi. The institution offers ten years of courses.</p>', '<h2>About Campus</h2>\r\n	<p>\r\n	\r\nCampus\r\nThe campus is conveniently located in Murudeshwar which is well known tourist spot & and pilgrimage center which is half a kilometer of the stretch of NH -66 that connects coastal town Bhatkal & Honnavar. The campus is just 10km away from Bhatkal & 25 km from Honnavar and well connected by road & raile. Konkan railway connects Murudeshwar with the major cities of Karnataka State & other state like Maharstra, Goa,keral & Tamilnadu. Nearest airports are in Hubli, mangalore & Goa. The institution has well furnished separate hostels for Boys and Girls with all modern amenities	\r\n	</p>', '<h2>About Gurukul Trust</h2>\r\n	<p>\r\n	\r\nEducation is the greatest treasure that humanity possesses, since it develops the human person. It was this vision of education that arya, our Founder gave us. For the past half century and more, Gurukul in Bangalore has been striving hard to make Gurus vision a reality.\r\nGurukul, Malleswaram, came into existence in the year 1987.\r\n\r\nThe aim of the institution is to impart an all round education based on cultured education principles and values to the students who come to study here. Great care is taken to give sound moral training to the students through the religious and moral instruction classes which is part of the curriculum, and to instil in them love for prayer and work as stands the School Motto, Pray and Work.\r\n\r\nGurukul, Malleswaram, came into existence in the year 1987. It is a recognized private unaided institution run by the Bangalore branch , registered under Karnataka Societies Registration Act 1960. Classes are conducted in a spacious building situated on 11th Main Road, Near 15th Cross, Malleswaram, Bangalore, Karnataka State, India.\r\n\r\nThe medium of instruction is English and the school academic year is from June to April. There are three vacations in the year; the Summer vacation about 6 weeks, Dasara about 10 days and Christmas vacation about 2days. students are prepared for the Indian Certificate of Secondary Education (I.C.S.E) examinations taken at the end of Std. X. This examination is conducted by the Council for Indian School Certificate Examination, New Delhi. Co-curricular and Extra curricular activities are given due emphasis in the time table. Physical Education, Dramatics, Karate, Singing, Debates, Girl Guiding etc are some activities which enable the students to get an all round formation. students are divided into four Houses: Gurukul-1, Gurukul-2, Gurukul-3 and Gurukul-4 in order to build up team work and healthy competition.\r\n\r\nLibrary books are issued to students every week. Adequate facilities are also available for reference work. The aim of the institution is to impart an all round education based on cultured education principles and values to the students who come to study here. Admission is given to all the students, irrespective of religion, caste or community. Great care is taken to give sound moral training to the students through the religious and moral instruction classes, which are part of the curriculum, and to instil in them love for prayer and work as stands the school Motto, Pray and Work. Efforts are made to awaken in the students sincere concern and love for the poor and the less privileged. They are also motivated to cherish the rich cultural heritage of our motherland.\r\n\r\nAt Gurukul, we educate all those who are entrusted to us not only in academics but also in human and spiritual values so that they learn to respect each other as children of one God in a pluralistic society like ours.\r\n	</p> ', '<h2>Messages</h2>\r\n	<p>\r\nWe aim at training the students to grasp and learn most of the advanced technologies in the world. Our motto is to support parents to fulfil their dream about their children. Our technical institute help the students by providing extensive training in modern technologies.\r\n\r\n<br><br><br>\r\nWe provide training in up-to-date revised syllabus, so that business and industry can employ our students after getting qualified certifications overall personality development of our students.\r\n\r\n<br><br><br>\r\nWe have well-trained faculty members, lecturers who are dedicated to share their knowledge to our students in various Engineering disciplines such as Automobile, Ceramic, Civil, Computers, Electrical, Electronics & Mechanical Engineering. We hope the bright prospectus future for our great products - the students.\r\n\r\n</p>', '<h4>vision & mission</h4>\r\n	<p>\r\n	<h3>Mission</h3>\r\n	<p>\r\n	The institute emphasises on all round development of students, aim at producing quality professionals and worthy citizens of our country helping in its progress and development.\r\n	</p>\r\n	<h3>Vision</h3>\r\n	<p>\r\n	To treat every student as an individual, to recognise his/her potential and to ensure that each recieves the best training to meet ones career ambition and goals.\r\n	</p> ', '<h3>Computer Laboratory</h3>\r\n	<p>\r\n	The school has two computer labs, one in the primary section and the other in the high school section to make students computer literate and to enhance their knowledge and understanding in other subjects and other areas of life. The labs are fully equipped with more than 80 computers connected together in a network along with the faculty controller device. It is also supported by Uninterrupted Power supply. The labs can accommodate over 50 students at the same time\r\n	The computer labs are well equipped with LCD (Liquid Crystal Display), Projector, OHP (Overhead Projector), Computers with multimedia kit, Printers, Scanners and an assortment of excellent education software.\r\n\r\n	Along with the above mentioned facilities, the school also provides internet access facility for the students. Students can use this to search for any information related to their studies or general knowledge.\r\n	</p>', '<h3>Science Laboratory</h3>\r\n	<p>\r\n	The school has one of the best and beautifully designed science laboratories which consists of Physics, Chemistry and Biology labs. They are in turn equipped with all the modern apparatus and instruments.The school has a well-equipped and spacious physics/chemistry laboratory which can comfortably accommodate about 40 students at a time. All the major equipments necessary to conduct the required experiments, which form the part of the curriculum, are found in this lab.\r\n\r\n	The lab consists of all the required physical balances, meters, U-tube apparatus, meter bridges, rheostats, chemicals, glass apparatus, test tubes, burettes, pipettes, volumetric flasks, beakers etc. to facilitate the students in their experiments. The lab is also equipped with sufficient apparatus to provide opportunity to the students for project work. Students at the senior level are also able to design electronic circuits in the lab as part of the activity.\r\n	The biology laboratory of Gurukul High School is located on the first floor adjacent to the other labs. The cupboards are used to store chemicals, reagents and glass ware. This lab is also equipped with various types of microscopes, specimens, slides, models, charts, human skeleton and much more. This ensures that the students have all the necessary equipments to understand and work on the entire biology practical course. This lab is capable of conducting experiments for junior as well as senior classes. All kinds of biology project work can be undertaken in the laboratory.\r\n	</p>', '<h3>Library</h3>\r\n	<p>\r\n	The school library is a nucleus around which the whole education system revolves. There are more than 10,000 books which includes journals, magazines, periodicals, fiction, mathematics, arts, science, computers, history, english, value education, language, reference books and much more. The reference section includes almost all the latest encyclopedias of school level, books on general knowledge, various dictionaries, year books, quiz books, arts and craft books and project books.\r\n	The magazines include Teenager, Down to Earth, Readers Digest, Childrens Digest, Peas, Taranga, Diksoochi, Kasturi, Chandamama etc.\r\n\r\n	The library is a completely computerized entity. It can accommodate approximately 60 students at a time. Every class has time set aside for library visit. There is a regular library class conducted once a week for the students of class I to VII. The high school students are given the privilege of visiting the library on a regular schedule.\r\n\r\n	The school has the provision for both kinds of libraries: - Books Library and CD library. There are a wide range of educational and entertainment CDs for all age groups.\r\n	</p>', '<h3>Auditorium</h3>\r\n	<p>\r\n	The auditorium is the heart of the school where all the cultural programmes and activities take place. It is situated at the topmost floor of the school building. The school auditorium is spacious enough to accommodate more than two thousand five hundred people. The auditorium is fully equipped with speakers, focus lights, other lighting arrangements, audio system, mike system and all the other modern equipments. There is a massive stage with a fully electronic screen. All the major functions of the school like the Founders Day celebrations, Jubilee celebrations, Teachers Day and Childrens Day celebrations etc are conducted here. The auditorium is also known as the Golden Jubilee Hall.\r\n	In order to provide the students with the benefits of visual learning, which leaves a long lasting impression on a students mind and memory, the school also has an audio-visual hall adjoining the main auditorium. The students assemble in this hall to participate in all the educational sessions which are regularly conducted by the school. On a routine basis, the school also organizes various presentations, video sessions etc for the students.\r\n\r\n	Competitions like singing, inter class dance, speech and recitation, fancy dress, dramatics etc are generally held in a separate mini hall. Small gatherings, meetings, other school events and activities are also conducted in this mini hall.\r\n	</p>', '	<h3>Sports</h3>\r\n	<p>\r\n	Games and sports play a major role in the overall development of a child. Gurukul strongly believes in this and has included the same in the school routine to promote good health, self-confidence and team spirit besides providing recreation. The school has well qualified, full-time physical education teachers to supervise and co-ordinate the various sports activities. Experts provide special coaching in their respective disciplines, and students are offered maximum opportunity to participate in the inter-school, district, state and national level competitions.\r\n\r\n	Various sports and games like Basketball, Throw ball, Volleyball, Kho-Kho, Athletics etc. are included in the curriculum. The school also encourages private coaching in Swimming, Tennis, Badminton and Table Tennis. Inter-house sports competitions are an integral part of the co-curricular activities and are held throughout the year to promote house spirit and sportsmanship. The sports day is celebrated every year in the month of August.\r\n	</p>', '<h2>Skills:</h2>\r\n<p>\r\nHorse riding<br>\r\nSwimming<br>\r\nCommunication skills<br>\r\nLeadership skills<br>\r\nTraditional Study Subjects</p>\r\n\r\n<h2>Life history of Legends from:</h2>\r\n<p>\r\nKrita Yuga<br>\r\nTreta Yuga<br>\r\nDwapara Yuga<br>\r\nKali Yuga<br>\r\n{Based on Ramayana, Mahabharata, Purana, History, Recent times}</p>\r\n\r\n<h2>Jnana:</h2>\r\n<p>\r\nVeda~Patha: Orientation in all the systems of Vedic wisdom and Vision<br>\r\nSanskrit<br>\r\nThe Bhagavad Gita<br>\r\nYoga<br>\r\nVyayamaki: Traditional Indian Exercises<br>\r\nSwastha~Vritta: Ayurveda for self healthcare<br>\r\nSadachara : Right Conduct ( Dharmashastra simplified)</p>\r\n\r\n<h2>Arts:</h2>\r\n<p>\r\nVocal Music<br>\r\nInstrumental Music<br>\r\nDance<br>\r\nYakshagana<br>\r\nDrawing & painting</p>\r\n\r\n<h2>Home Science:</h2>\r\n<p>\r\nCooking<br>\r\nHome Management<br>\r\nVrikshayurveda (Science of plant life – Gardening and Agriculture)</p>\r\n\r\n<h2>Self Defense: (Ancient Martial art forms of India)</h2>\r\n<p>\r\nMalla Yuddha<br>\r\nKalari Payattu</p>\r\n', '<h3>Working Hours</h3>\r\n	<h4>School Hours</h4>\r\n	<p>\r\n	Pre Primary-			<br>\r\n	08:30 a.m. - 12.10 p.m. <br>\r\n	12:50 p.m. - 02.50 p.m. <br>\r\n	</p>\r\n	<p>\r\n	Others-					<br>\r\n	08:30 a.m. - 12.10 p.m. <br>\r\n	12:50 p.m. - 03.30 p.m. <br>\r\n	</p>\r\n	<h4>Office Hours</h4>\r\n	<p>\r\n	Principals Office-		<br>\r\n	9.30 a.m. - 10.30 a.m. (on working days only)  <br>\r\n	Parents may meet the Principal between 9.30 a.m. and 10.30 a.m. on any working day and at other times only by prior appointment.  <br>\r\n	Parents and guardians can also meet the teachers as often as possible after or before the class hours or at other times fixed by the school authorities for parent-teacher meetings.\r\n	</p>', '	<h3>School Admission</h3>\r\n	<p>\r\n	Admissions are normally made only to the lower kindergarden and the age limit is four years. In case of admission to other classes, the candidates should be mainly from an I.C.S.E stream and should have a very satisfactory record from the previous school. She may still be asked to do a written test in the major subjects. Every candidate for admission must be introduced in person by her parents, who will be responsible to the Principal for her conduct and progress.\r\n	Academics (Norms For Promotion)\r\n	students are expected to have the required attendance as per the Rules and Regulations laid down by the Council for Secondary Education. Mid-term examinations are held in September and unit tests are held during the term. Special note shall be taken of absence without leave from school examination. In deciding promotion, the whole years work is taken into account. The final examination only helps to confirm the result of the years work. Results declared at the end of the year are final in all cases.\r\n	</p> ');

-- --------------------------------------------------------

--
-- Table structure for table `kdetails`
--

CREATE TABLE `kdetails` (
  `id` int(11) NOT NULL DEFAULT '1',
  `home` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `campus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trust` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vision` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `computer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `science` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `library` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auditorium` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sports` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `extra` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `working` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kdetails`
--

INSERT INTO `kdetails` (`id`, `home`, `campus`, `trust`, `message`, `vision`, `computer`, `science`, `library`, `auditorium`, `sports`, `extra`, `working`, `admission`) VALUES
(1, '\"ಭಾರತೀಯರು ಭಾರತರಾದರೆ ವಿಶ್ವವೇ ಭಾರತವಾಗುತ್ತದೆ\"', 'ವಿಶ್ವದಲ್ಲಿಯೇ ವಿಶಿಷ್ಟ ಎನ್ನಬಹುದಾದ ವಿಶ್ವವಿದ್ಯಾಪೀಠದ ಪರಿಸರದಲ್ಲಿ, ವಿದ್ಯಾನಿಧಿಗಳೆನ್ನಿಸಿದ ಪ್ರಾಜ್ಞರ ನಡುವೆ ವಾಸ, ವಿದ್ಯಾಭ್ಯಾಸ.\r\n\r\nಭವಿಷ್ಯದಲ್ಲಿ ಭಾರತೀಯವಾದ ಯಾವುದಾದರೂ ವಿದ್ಯೆ-ಕಲೆಗಳಲ್ಲಿ ಮಹಾಪರಿಣತನನ್ನಾಗಿಸುವ ಹಿನ್ನೆಲೆಯಲ್ಲಿ ಎಳವೆಯಿಂದಲೇ ಮಗುವಿನಲ್ಲಿ ಸುಪ್ತವಾಗಿರುವ ಪ್ರತಿಭೆಯ ಅನ್ವೇಷಣೆ, ತರಬೇತಿ.\r\n\r\nಗುರುಕುಲದ ಅಧ್ಯಯನದ ಬಳಿಕ ವಿಶ್ವವಿದ್ಯಾಪೀಠದಲ್ಲಿ ಪ್ರವೇಶಾವಕಾಶ; ಭಾರತೀಯವಾದ ಯಾವುದೇ ವಿದ್ಯೆ ಅಥವಾ ಕಲೆಗಳಲ್ಲಿ ಉನ್ನತಾಧ್ಯಯನ ನಡೆಸಿ ಪರಿಪೂರ್ಣ ಪರಿಣತಿಯನ್ನು ಸಾಧಿಸಿ ಮಹಾಮೇರುವೆನಿಸುವ ಅಪೂರ್ವ ಅವಕಾಶ.\r\n\r\nಪ್ರಕೃತಿಗೆ ತೆರೆದುಕೊಂಡ ಕುಟೀರಗಳಲ್ಲಿ ಮುಕ್ತ ಕಲಿಕೆ.', '<h2>About Gurukul Trust</h2>\r\n	<p>\r\n	\r\nEducation is the greatest treasure that humanity possesses, since it develops the human person. It was this vision of education that arya, our Founder gave us. For the past half century and more, Gurukul in Bangalore has been striving hard to make Gurus vision a reality.\r\nGurukul, Malleswaram, came into existence in the year 1987.\r\n\r\nThe aim of the institution is to impart an all round education based on cultured education principles and values to the students who come to study here. Great care is taken to give sound moral training to the students through the religious and moral instruction classes which is part of the curriculum, and to instil in them love for prayer and work as stands the School Motto, Pray and Work.\r\n\r\nGurukul, Malleswaram, came into existence in the year 1987. It is a recognized private unaided institution run by the Bangalore branch , registered under Karnataka Societies Registration Act 1960. Classes are conducted in a spacious building situated on 11th Main Road, Near 15th Cross, Malleswaram, Bangalore, Karnataka State, India.\r\n\r\nThe medium of instruction is English and the school academic year is from June to April. There are three vacations in the year; the Summer vacation about 6 weeks, Dasara about 10 days and Christmas vacation about 2days. students are prepared for the Indian Certificate of Secondary Education (I.C.S.E) examinations taken at the end of Std. X. This examination is conducted by the Council for Indian School Certificate Examination, New Delhi. Co-curricular and Extra curricular activities are given due emphasis in the time table. Physical Education, Dramatics, Karate, Singing, Debates, Girl Guiding etc are some activities which enable the students to get an all round formation. students are divided into four Houses: Gurukul-1, Gurukul-2, Gurukul-3 and Gurukul-4 in order to build up team work and healthy competition.\r\n\r\nLibrary books are issued to students every week. Adequate facilities are also available for reference work. The aim of the institution is to impart an all round education based on cultured education principles and values to the students who come to study here. Admission is given to all the students, irrespective of religion, caste or community. Great care is taken to give sound moral training to the students through the religious and moral instruction classes, which are part of the curriculum, and to instil in them love for prayer and work as stands the school Motto, Pray and Work. Efforts are made to awaken in the students sincere concern and love for the poor and the less privileged. They are also motivated to cherish the rich cultural heritage of our motherland.\r\n\r\nAt Gurukul, we educate all those who are entrusted to us not only in academics but also in human and spiritual values so that they learn to respect each other as children of one God in a pluralistic society like ours.\r\n	</p> ', '<h2>Messages</h2>\r\n	<p>\r\nWe aim at training the students to grasp and learn most of the advanced technologies in the world. Our motto is to support parents to fulfil their dream about their children. Our technical institute help the students by providing extensive training in modern technologies.\r\n\r\n<br><br><br>\r\nWe provide training in up-to-date revised syllabus, so that business and industry can employ our students after getting qualified certifications overall personality development of our students.\r\n\r\n<br><br><br>\r\nWe have well-trained faculty members, lecturers who are dedicated to share their knowledge to our students in various Engineering disciplines such as Automobile, Ceramic, Civil, Computers, Electrical, Electronics & Mechanical Engineering. We hope the bright prospectus future for our great products - the students.\r\n\r\n</p>', 'ನಮ್ಮತನ\r\nಬಾಲಕನಲ್ಲಿ ಮಾನವತೆ-ಭಾರತೀಯತೆ-ಹಿಂದುತ್ವಗಳನ್ನು ಉದ್ಬೋಧಗೊಳಿಸಬೇಕಿದೆ.\r\n\r\nಸ್ವಾವಲಂಬನೆ\r\nಆಧುನಿಕ ಶಿಕ್ಷಣದಲ್ಲಿ ಪರಿಪೂರ್ಣನನ್ನಾಗಿಸಿ ಅವನನ್ನು ಸ್ವಾವಲಂಬಿಯಾಗಿಸಬೇಕಿದೆ.\r\n\r\nಸಂಸ್ಕಾರ\r\nಸಂಸ್ಕಾರದ ಸಾಣೆಯಿಟ್ಟು, ಮನೆಯ ಮಗುವೆಂಬ ಮಾಣಿಕ್ಯದ ಮಣಿಯನ್ನು ಭಾರತಮಾತೆಯ ಆಭೂಷಣವಾಗಿಸಬೇಕಿದೆ.\r\n\r\nಕಲಾ ಕೌಶಲ\r\nಕಲೆ – ಕೌಶಲಗಳಲ್ಲಿ ಪರಿಣತಿ ನೀಡಿ, ಅವನನ್ನು ಸಮಾಜದ ಆನಂದವರ್ಧಕನನ್ನಾಗಿಸಬೇಕಿದೆ.\r\n\r\nದೇಶಪ್ರೇಮ\r\nನಮ್ಮಂಗಳದ ಬಾಲಕರನ್ನು ಭಾರತಮಾತೆಯ ವರಕುವರರನ್ನಾಗಿಸಬೇಕಿದೆ; ಶ್ರೇಷ್ಠ ಭಾರತಪುರುಷರನ್ನಾಗಿಸಬೇಕಿದೆ.\r\n\r\nಭವಿಷ್ಯ ನಿರ್ಮಾಣ\r\nಭಾರತದ ಭವಿಷ್ಯದ ಸಂಪತ್ತಾಗಬಲ್ಲ ಭಾವೀ ಜನನಾಯಕ, ಅಧಿಕಾರಿ, ಉದ್ಯಮಿ, ನ್ಯಾಯವಾದಿ, ಜ್ಞಾನಿಗಳನ್ನು ನಿರ್ಮಿಸಬೇಕಿದೆ.\r\n\r\nಪಾರಂಪರಿಕ ತಜ್ಞತೆ\r\nಜ್ಞಾನ – ವಿಜ್ಞಾನಗಳಿಂದ ಪರಿಪೂರ್ಣವಾದ ಭಾರತೀಯ ವಿದ್ಯೆ – ಕಲೆಗಳ ಅರಿವನ್ನು ನೀಡಿ ಬಾಲಕನನ್ನು ನೈಜ ಭಾರತೀಯನನ್ನಾಗಿಸಬೇಕಿದೆ.\r\n\r\nಪರಿಪೂರ್ಣತೆ', ' ಕಂಪ್ಯೂಟರ್ ಪ್ರಯೋಗಾಲಯ.\r\nಸ್ಮಾರ್ಟ್ ಕ್ಲಾಸ್ ಸೌಲಭ್ಯ.\r\nನಾಡಿನ ಶ್ರೇಷ್ಠ ಶಿಕ್ಷಕರಿಂದ ಆನ್ ಲೈನ್ ಪಾಠ.\r\nಮಕ್ಕಳನ್ನು ಓದಿಸಲು ಜೊತೆಗೇ ಇರುವ ನುರಿತ ಮೆಂಟರ್ ಗಳು.\r\nಅನುಭವಿ ವಿಷಯತಜ್ಞರೊಂದಿಗೆ ಮಕ್ಕಳ ಸಂವಹನ.', 'ವಿಜ್ಞಾನ ಪ್ರಯೋಗಾಲಯ.\r\nಸ್ಮಾರ್ಟ್ ಕ್ಲಾಸ್ ಸೌಲಭ್ಯ.\r\nನಾಡಿನ ಶ್ರೇಷ್ಠ ಶಿಕ್ಷಕರಿಂದ ಆನ್ ಲೈನ್ ಪಾಠ.\r\nಮಕ್ಕಳನ್ನು ಓದಿಸಲು ಜೊತೆಗೇ ಇರುವ ನುರಿತ ಮೆಂಟರ್ ಗಳು.\r\nಅನುಭವಿ ವಿಷಯತಜ್ಞರೊಂದಿಗೆ ಮಕ್ಕಳ ಸಂವಹನ.', '<h3>Library</h3>\r\n	<p>\r\n	The school library is a nucleus around which the whole education system revolves. There are more than 10,000 books which includes journals, magazines, periodicals, fiction, mathematics, arts, science, computers, history, english, value education, language, reference books and much more. The reference section includes almost all the latest encyclopedias of school level, books on general knowledge, various dictionaries, year books, quiz books, arts and craft books and project books.\r\n	The magazines include Teenager, Down to Earth, Readers Digest, Childrens Digest, Peas, Taranga, Diksoochi, Kasturi, Chandamama etc.\r\n\r\n	The library is a completely computerized entity. It can accommodate approximately 60 students at a time. Every class has time set aside for library visit. There is a regular library class conducted once a week for the students of class I to VII. The high school students are given the privilege of visiting the library on a regular schedule.\r\n\r\n	The school has the provision for both kinds of libraries: - Books Library and CD library. There are a wide range of educational and entertainment CDs for all age groups.\r\n	</p>', '<h3>Auditorium</h3>\r\n	<p>\r\n	The auditorium is the heart of the school where all the cultural programmes and activities take place. It is situated at the topmost floor of the school building. The school auditorium is spacious enough to accommodate more than two thousand five hundred people. The auditorium is fully equipped with speakers, focus lights, other lighting arrangements, audio system, mike system and all the other modern equipments. There is a massive stage with a fully electronic screen. All the major functions of the school like the Founders Day celebrations, Jubilee celebrations, Teachers Day and Childrens Day celebrations etc are conducted here. The auditorium is also known as the Golden Jubilee Hall.\r\n	In order to provide the students with the benefits of visual learning, which leaves a long lasting impression on a students mind and memory, the school also has an audio-visual hall adjoining the main auditorium. The students assemble in this hall to participate in all the educational sessions which are regularly conducted by the school. On a routine basis, the school also organizes various presentations, video sessions etc for the students.\r\n\r\n	Competitions like singing, inter class dance, speech and recitation, fancy dress, dramatics etc are generally held in a separate mini hall. Small gatherings, meetings, other school events and activities are also conducted in this mini hall.\r\n	</p>', 'ಒಳಾಂಗಣ ಮತ್ತು ಹೊರಾಂಗಣ ಕ್ರೀಡಾ ಸೌಲಭ್ಯ.', '<h1>ಕೌಶಲ:</h1>\r\n\r\nಕುದುರೆ ಸವಾರಿ<br>\r\nಈಜು<br>\r\nಸಂವಹನ ಕೌಶಲ<br>\r\nನಾಯಕತ್ವ ತರಬೇತಿ<br>\r\nಪಾರಂಪರಿಕ ಅಧ್ಯಯನ ವಿಷಯಗಳು<br>\r\n<h1>ಮಹಾಪುರುಷಚರಿತ್ರೆ:</h1>\r\n\r\nಕೃತಯುಗದ ಮಹಾಪುರುಷರು<br>\r\nತ್ರೇತಾಯುಗದ ಮಹಾಪುರುಷರು<br>\r\nದ್ವಾಪರಯುಗದ ಮಹಾಪುರುಷರು<br>\r\nಕಲಿಯುಗದ ಮಹಾಪುರುಷರು<br>\r\n{ರಾಮಾಯಣ, ಮಹಾಭಾರತ, ಪುರಾಣ, ಇತಿಹಾಸ, ವರ್ತಮಾನಗಳನ್ನು ಆಧರಿಸಿ.}\r\n\r\n<h1>ಜ್ಞಾನ:</h1>\r\n\r\nವೇದಪಥ<br>\r\n{ವೇದಮೂಲವಾದ ಸಮಗ್ರ ಭಾರತೀಯ ವಿದ್ಯೆ-ಕಲೆಗಳ ಪರಿಚಯ}<br>\r\n\r\nಸಂಸ್ಕೃತ<br>\r\nಭಗವದ್ಗೀತೆ<br>\r\nಯೋಗ<br>\r\nವ್ಯಾಯಾಮ<br>\r\nಸ್ವಸ್ಥವೃತ್ತ (ಆಯುರ್ವೇದ)<br>\r\nಸದಾಚಾರ<br>\r\n<h1>ಕಲೆ:</h1>\r\n\r\nಗಾಯನ<br>\r\nವಾದನ<br>\r\nನೃತ್ಯ<br>\r\nಯಕ್ಷಗಾನ<br>\r\nಚಿತ್ರ<br>\r\n<h1>ಗೃಹವಿಜ್ಞಾನ:</h1>\r\n\r\nಪಾಕಶಾಸ್ತ್ರ<br>\r\nಗೃಹನಿರ್ವಾಹ<br>\r\nರಂಗವಲ್ಲಿ<br>\r\nಕಸೂತಿ<br>\r\nಪ್ರಸಾಧನ<br>\r\nವೃಕ್ಷಾಯುರ್ವೇದ<br>\r\n{ಸಸ್ಯಸಂರಕ್ಷಣೆ, ಕೃಷಿ}\r\n\r\n<h1>ಆತ್ಮರಕ್ಷಣೆ:</h1>\r\n\r\nಕಳರಿಪಯಟ್<br>\r\nಮಲ್ಲಯುದ್ಧ<br>', '<h3>Working Hours</h3>\r\n	<h4>School Hours</h4>\r\n	<p>\r\n	Pre Primary-			<br>\r\n	08:30 a.m. - 12.10 p.m. <br>\r\n	12:50 p.m. - 02.50 p.m. <br>\r\n	</p>\r\n	<p>\r\n	Others-					<br>\r\n	08:30 a.m. - 12.10 p.m. <br>\r\n	12:50 p.m. - 03.30 p.m. <br>\r\n	</p>\r\n	<h4>Office Hours</h4>\r\n	<p>\r\n	Principals Office-		<br>\r\n	9.30 a.m. - 10.30 a.m. (on working days only)  <br>\r\n	Parents may meet the Principal between 9.30 a.m. and 10.30 a.m. on any working day and at other times only by prior appointment.  <br>\r\n	Parents and guardians can also meet the teachers as often as possible after or before the class hours or at other times fixed by the school authorities for parent-teacher meetings.\r\n	</p>', '	<h3>School Admission</h3>\r\n	<p>\r\n	Admissions are normally made only to the lower kindergarden and the age limit is four years. In case of admission to other classes, the candidates should be mainly from an I.C.S.E stream and should have a very satisfactory record from the previous school. She may still be asked to do a written test in the major subjects. Every candidate for admission must be introduced in person by her parents, who will be responsible to the Principal for her conduct and progress.\r\n	Academics (Norms For Promotion)\r\n	students are expected to have the required attendance as per the Rules and Regulations laid down by the Council for Secondary Education. Mid-term examinations are held in September and unit tests are held during the term. Special note shall be taken of absence without leave from school examination. In deciding promotion, the whole years work is taken into account. The final examination only helps to confirm the result of the years work. Results declared at the end of the year are final in all cases.\r\n	</p> ');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Sumukh', 'example', ''),
(2, 'Sumukh', 'example@gmail.com', 'Hello world !!');

-- --------------------------------------------------------

--
-- Table structure for table `ntfac`
--

CREATE TABLE `ntfac` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desg` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ntfac`
--

INSERT INTO `ntfac` (`id`, `name`, `desg`, `images`) VALUES
(1, 'samp1', 'computer operator', 'ntfac/staff.jpg'),
(2, 'Ranjani', 'Clerk', 'ntfac/student.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `rno` int(11) NOT NULL,
  `s1` int(11) NOT NULL,
  `s2` int(11) NOT NULL,
  `s3` int(11) NOT NULL,
  `s4` int(11) NOT NULL,
  `s5` int(11) NOT NULL,
  `s6` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `rno`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `total`, `class`) VALUES
(1, 1234, 85, 85, 85, 85, 85, 85, 510, 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` bit(1) NOT NULL,
  `phno` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `padrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ano` char(12) NOT NULL,
  `qual` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `desg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`, `dob`, `gender`, `phno`, `email`, `adrs`, `padrs`, `ano`, `qual`, `pwd`, `desg`) VALUES
(1, 'principal', NULL, '1990-01-01', b'1', '0123456789', 'principal@gmail.com', 'Bangalore', 'Bangalore', '012345678901', 'teacher', '12345678', 1),
(2, 'Bheema', 'S', '1989-03-03', b'1', '0192837465', 'qwerty@gmail.com', 'Bangalore', 'Bangalore', '1029384756', 'Btech', '0987654321', 3),
(3, 'Ranjani', 'S', '1995-06-12', b'1', '0192837465', 'rnjn@gmail.com', 'Bangalore', 'Bangalore', '123456', 'Engineering', '0987654321', 2);

-- --------------------------------------------------------

--
-- Table structure for table `staffbckup`
--

CREATE TABLE `staffbckup` (
  `id` int(11) NOT NULL,
  `fname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` bit(1) NOT NULL,
  `phno` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `padrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ano` char(12) NOT NULL,
  `qual` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `desg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staffbckup`
--

INSERT INTO `staffbckup` (`id`, `fname`, `lname`, `dob`, `gender`, `phno`, `email`, `adrs`, `padrs`, `ano`, `qual`, `pwd`, `desg`) VALUES
(1, 'principal', NULL, '1990-01-01', b'1', '0123456789', 'principal@gmail.com', 'Bangalore', 'Bangalore', '012345678901', 'teacher', '12345678', 1),
(2, 'Bheema', 'S', '1989-03-03', b'1', '0192837465', 'qwerty@gmail.com', 'Bangalore', 'Bangalore', '1029384756', 'Btech', '0987654321', 3),
(3, 'Ranjani', 'S', '1995-06-12', b'1', '0192837465', 'rnjn@gmail.com', 'Bangalore', 'Bangalore', '123456', 'Engineering', '0987654321', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stubckup`
--

CREATE TABLE `stubckup` (
  `id` int(11) NOT NULL,
  `rno` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` bit(1) NOT NULL,
  `dob` date NOT NULL,
  `father` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mother` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pno` char(15) NOT NULL,
  `sno` char(15) NOT NULL,
  `adrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `padrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fdes` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ano` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `religion` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `caste` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `scaste` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tc` bit(1) DEFAULT NULL,
  `ccer` bit(1) NOT NULL,
  `icer` bit(1) NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `per` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `desg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stubckup`
--

INSERT INTO `stubckup` (`id`, `rno`, `fname`, `lname`, `gender`, `dob`, `father`, `mother`, `pno`, `sno`, `adrs`, `padrs`, `fdes`, `mdes`, `ano`, `email`, `religion`, `caste`, `scaste`, `tc`, `ccer`, `icer`, `pwd`, `per`, `class`, `desg`) VALUES
(1, '123', 'Abhishek', 'A', b'0', '1998-12-12', 'Shiva', 'Parvathi', '0987654321', '0987654321', 'Mysore', 'Mysore', 'ASE', 'ASE', '0192837465', 'ab@gmail.com', 'Hindu', 'Brahmin', 'Smartha', b'1', b'0', b'0', '1234', 93, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stureg`
--

CREATE TABLE `stureg` (
  `sid` int(11) NOT NULL,
  `rno` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` bit(1) NOT NULL,
  `dob` date NOT NULL,
  `father` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mother` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pno` char(15) NOT NULL,
  `sno` char(15) NOT NULL,
  `adrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `padrs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fdes` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ano` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `religion` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `caste` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `scaste` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tc` bit(1) DEFAULT NULL,
  `ccer` bit(1) NOT NULL,
  `icer` bit(1) NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `per` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `desg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stureg`
--

INSERT INTO `stureg` (`sid`, `rno`, `fname`, `lname`, `gender`, `dob`, `father`, `mother`, `pno`, `sno`, `adrs`, `padrs`, `fdes`, `mdes`, `ano`, `email`, `religion`, `caste`, `scaste`, `tc`, `ccer`, `icer`, `pwd`, `per`, `class`, `desg`) VALUES
(1, '123', 'Abhishek', 'A', b'0', '1998-12-12', 'Shiva', 'Parvathi', '0987654321', '0987654321', 'Mysore', 'Mysore', 'ASE', 'ASE', '0192837465', 'ab@gmail.com', 'Hindu', 'Brahmin', 'Smartha', b'1', b'0', b'0', '1234', 93, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tfac`
--

CREATE TABLE `tfac` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desg` varchar(255) NOT NULL,
  `sdesg` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tfac`
--

INSERT INTO `tfac` (`id`, `name`, `desg`, `sdesg`, `images`) VALUES
(1, 'Bheema S', 'teacher', 'Mathematics', 'tfac/staff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `desg` int(11) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `desg`, `class`) VALUES
(1, 'principal@gmail.com', '12345678', 1, ''),
(2, 'qwerty@gmail.com', '0987654321', 3, ''),
(3, 'rnjn@gmail.com', '0987654321', 2, ''),
(4, 'ab@gmail.com', '1234', 4, '5');

-- --------------------------------------------------------

--
-- Table structure for table `wof`
--

CREATE TABLE `wof` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `achv` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wof`
--

INSERT INTO `wof` (`id`, `name`, `year`, `achv`, `class`, `image`) VALUES
(1, 'student1', 2021, 'Best student', '1st standard', 'wof/student.jpg'),
(2, 'student2', 2021, 'Best student', '2nd standard', 'wof/student.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ntfac`
--
ALTER TABLE `ntfac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffbckup`
--
ALTER TABLE `staffbckup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stubckup`
--
ALTER TABLE `stubckup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stureg`
--
ALTER TABLE `stureg`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `id` (`sid`);

--
-- Indexes for table `tfac`
--
ALTER TABLE `tfac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wof`
--
ALTER TABLE `wof`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ntfac`
--
ALTER TABLE `ntfac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffbckup`
--
ALTER TABLE `staffbckup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stubckup`
--
ALTER TABLE `stubckup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stureg`
--
ALTER TABLE `stureg`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tfac`
--
ALTER TABLE `tfac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wof`
--
ALTER TABLE `wof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
