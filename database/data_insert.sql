INSERT INTO Sessions (SessionID, ModuleID, RoomID, StartTime, EndTime, SessionDate)
VALUES
-- October Sessions for Programme 1
-- Intro to Programming, Semester 1, Duration 2 hours
(1, 1, 1, '09:00', '11:00', '2024-10-01'),
-- Data Structures, Semester 3, Duration 2 hours
(2, 5, 2, '09:00', '11:00', '2024-10-03'),
-- Security Principles, Semester 5, Duration 2 hours
(3, 9, 3, '09:00', '11:00', '2024-10-05'),

-- March Sessions for Programme 1
-- Web Development, Semester 2, Duration 1 hour
(4, 3, 4, '11:00', '12:00', '2024-03-01'),
-- Operating Systems, Semester 4, Duration 1 hour
(5, 7, 5, '13:00', '14:00', '2024-03-03'),
-- Artificial Intelligence, Semester 6, Duration 2 hours
(6, 11, 6, '12:00', '13:00', '2024-03-05'),

-- October Sessions for Programme 2
-- Advanced Machine Learning, Semester 1, Duration 2 hours
(7, 13, 1, '10:00', '12:00', '2024-10-07'),
-- Deep Learning, Semester 3, Duration 4 hours
(8, 17, 2, '09:00', '13:00', '2024-10-09'),
-- Predictive Analytics, Semester 5, Duration 1 hour
(9, 21, 3, '10:00', '11:00', '2024-10-11'),

-- March Sessions for Programme 2
-- Data Visualization, Semester 2, Duration 1 hour
(10, 15, 4, '09:00', '10:00', '2024-03-07'),
-- Data Ethics and Privacy, Semester 4, Duration 3 hours
(11, 20, 5, '13:00', '15:00', '2024-03-09'),
-- Capstone Project in Data Science, Semester 6, Duration 4 hours
(12, 24, 6, '09:00', '13:00', '2024-03-11');

-- Insert into Departments
INSERT INTO Departments
VALUES (1, 'Computer Science', 'Focuses on the study of computer systems and computational processes.'),
       (2, 'Engineering',
        'Covers various engineering disciplines including mechanical, civil, and electrical engineering.');

-- Insert into Programmes
INSERT INTO Programmes
VALUES (1, 1, 'BSc Computer Science', 3, 'A bachelor degree in computer science.'),
       (2, 1, 'BSc Cyber Sercurity', 3, 'A bachelor degree in cyber security.'),
       (3, 2, 'BEng Mechanical Engineering', 3, 'A bachelor degree in mechanical engineering.'),
       (4, 2, 'BEng Electrical Engineering', 3, 'A bachelor degree in electrical engineering.');

INSERT INTO Rooms
VALUES (1, 'Room 101', 'Lecture Hall', 50),
       (2, 'Room 102', 'Lecture Hall', 25),
       (3, 'Lab 201', 'Computer Lab', 10),
       (4, 'Lab 202', 'Computer Lab', 10),
       (5, 'Room 301', 'Seminar Room', 20),
       (6, 'Room 302', 'Seminar Room', 20);

INSERT INTO RoomModules (ModuleID, RoomID)
VALUES
-- Semester 1 Modules
(1, 1),
(1, 2),
(1, 3),  -- Intro to Programming
(2, 1),
(2, 4),
(2, 5),  -- Computer Systems
(13, 1),
(13, 2),
(13, 3), -- Advanced Machine Learning
(14, 1),
(14, 4),
(14, 5), -- Big Data Analytics
(25, 1),
(25, 2),
(25, 3), -- Engineering Mathematics
(26, 1),
(26, 4),
(26, 5), -- Thermodynamics
(37, 1),
(37, 2),
(37, 3), -- Electrical Circuits
(38, 1),
(38, 4),
(38, 5), -- Electromagnetism

-- Semester 2 Modules
(3, 2),
(3, 4),
(3, 6),  -- Web Development
(4, 2),
(4, 5),
(4, 1),  -- Database Design
(15, 2),
(15, 4),
(15, 6), -- Data Visualization
(16, 2),
(16, 5),
(16, 1), -- Statistical Learning
(27, 2),
(27, 4),
(27, 6), -- Fluid Mechanics
(28, 2),
(28, 5),
(28, 1), -- Mechanical Design
(39, 2),
(39, 4),
(39, 6), -- Signals and Systems
(40, 2),
(40, 5),
(40, 1), -- Digital Logic Design

-- Semester 3 Modules
(5, 3),
(5, 5),
(5, 1),  -- Data Structures
(6, 3),
(6, 6),
(6, 2),  -- Software Engineering
(17, 3),
(17, 5),
(17, 1), -- Deep Learning
(18, 3),
(18, 6),
(18, 2), -- Natural Language Processing
(29, 3),
(29, 5),
(29, 1), -- Dynamics and Control
(30, 3),
(30, 6),
(30, 2), -- Material Science
(41, 3),
(41, 5),
(41, 1), -- Microprocessors
(42, 3),
(42, 6),
(42, 2), -- Power Electronics

-- Semester 4 Modules
(7, 4),
(7, 6),
(7, 2),  -- Operating Systems
(8, 4),
(8, 1),
(8, 3),  -- Networks and Communications
(19, 4),
(19, 6),
(19, 2), -- Cloud Computing for Data Science
(20, 4),
(20, 1),
(20, 3), -- Data Ethics and Privacy
(31, 4),
(31, 6),
(31, 2), -- Manufacturing Processes
(32, 4),
(32, 1),
(32, 3), -- Solid Mechanics
(43, 4),
(43, 6),
(43, 2), -- Electrical Machines
(44, 4),
(44, 1),
(44, 3), -- Control Systems Engineering

-- Semester 5 Modules
(9, 5),
(9, 1),
(9, 3),  -- Security Principles
(10, 5),
(10, 2),
(10, 4), -- Algorithm Design
(21, 5),
(21, 1),
(21, 3), -- Predictive Analytics
(22, 5),
(22, 2),
(22, 4), -- Data Mining
(33, 5),
(33, 1),
(33, 3), -- CAD and CAM
(34, 5),
(34, 2),
(34, 4), -- Thermal Engineering
(45, 5),
(45, 1),
(45, 3), -- Communication Systems
(46, 5),
(46, 2),
(46, 4), -- Power System Engineering

-- Semester 6 Modules
(11, 6),
(11, 2),
(11, 4), -- Artificial Intelligence
(12, 6),
(12, 3),
(12, 5), -- Capstone Project
(23, 6),
(23, 2),
(23, 4), -- Data Science Project Management
(24, 6),
(24, 3),
(24, 5), -- Capstone Project in Data Science
(35, 6),
(35, 2),
(35, 4), -- Robotics
(36, 6),
(36, 3),
(36, 5), -- Capstone Project in Mechanical Engineering
(47, 6),
(47, 2),
(47, 4), -- Renewable Energy Systems
(48, 6),
(48, 3),
(48, 5); -- Capstone Project in Electrical Engineering

INSERT INTO Lecturers
VALUES (1, 'Alice Smith', 1, 'alice.smith@university.edu', '1234567890'),
       (2, 'Bob Jones', 1, 'bob.jones@university.edu', '0987654321'),
       (3, 'Charlie Brown', 2, 'charlie.brown@university.edu', '1122334455'),
       (4, 'Dana White', 2, 'dana.white@university.edu', '2233445566'),
       (5, 'Evan Green', 3, 'evan.green@university.edu', '3344556677'),
       (6, 'Fiona Grey', 3, 'fiona.grey@university.edu', '4455667788'),
       (7, 'George Black', 4, 'george.black@university.edu', '5566778899'),
       (8, 'Hannah Blue', 4, 'hannah.blue@university.edu', '6677889900');

INSERT INTO Modules (ModuleID, ProgrammeID, ModSemester, ModName, ModDescription, ModDuration)
VALUES (1, 1, 1, 'Intro to Programming', 'Introduction to programming concepts.', 2),
       (2, 1, 1, 'Computer Systems', 'Overview of computer systems.', 2),
       (3, 1, 2, 'Web Development', 'Design and development of web applications.', 1),
       (4, 1, 2, 'Database Design', 'Principles of database design and implementation.', 3),
       (5, 1, 3, 'Data Structures', 'Introduction to data structures.', 2),
       (6, 1, 3, 'Software Engineering', 'Software development life cycles.', 1),
       (7, 1, 4, 'Operating Systems', 'Concepts and design of operating systems.', 1),
       (8, 1, 4, 'Networks and Communications', 'Fundamentals of computer networking.', 3),
       (9, 1, 5, 'Security Principles', 'Introduction to information security.', 2),
       (10, 1, 5, 'Algorithm Design', 'Algorithm design and complexity.', 3),
       (11, 1, 6, 'Artificial Intelligence', 'Foundations of artificial intelligence.', 2),
       (12, 1, 6, 'Capstone Project', 'Final project integrating course material.', 4),
       (13, 2, 1, 'Advanced Machine Learning', 'Deep dive into machine learning algorithms.', 2),
       (14, 2, 1, 'Big Data Analytics', 'Techniques and tools for analyzing big data.', 3),
       (15, 2, 2, 'Data Visualization', 'Principles of visualizing data effectively.', 1),
       (16, 2, 2, 'Statistical Learning', 'Statistical methods for data analysis.', 2),
       (17, 2, 3, 'Deep Learning', 'Introduction to deep neural networks.', 4),
       (18, 2, 3, 'Natural Language Processing', 'Processing and analyzing human language data.', 2),
       (19, 2, 4, 'Cloud Computing for Data Science', 'Cloud resources for storing and processing data.', 1),
       (20, 2, 4, 'Data Ethics and Privacy', 'Ethical and privacy considerations in data science.', 3),
       (21, 2, 5, 'Predictive Analytics', 'Techniques for making predictions from data.', 1),
       (22, 2, 5, 'Data Mining', 'Discovering patterns and knowledge from large data sets.', 3),
       (23, 2, 6, 'Data Science Project Management', 'Managing data science projects.', 2),
       (24, 2, 6, 'Capstone Project in Data Science', 'Final project applying data science techniques.', 4),
       (25, 3, 1, 'Engineering Mathematics', 'Mathematical foundations for engineers.', 2),
       (26, 3, 1, 'Thermodynamics', 'Study of heat, energy, and work.', 1),
       (27, 3, 2, 'Fluid Mechanics', 'Behavior of fluids in motion and at rest.', 2),
       (28, 3, 2, 'Mechanical Design', 'Design principles in mechanical engineering.', 2),
       (29, 3, 3, 'Dynamics and Control', 'Dynamics of systems and their control mechanisms.', 3),
       (30, 3, 3, 'Material Science', 'Study of materials and their applications in engineering.', 3),
       (31, 3, 4, 'Manufacturing Processes', 'Processes involved in manufacturing.', 4),
       (32, 3, 4, 'Solid Mechanics', 'Behavior of solid matter under external actions.', 2),
       (33, 3, 5, 'CAD and CAM', 'Computer-aided design and manufacturing.', 1),
       (34, 3, 5, 'Thermal Engineering', 'Engineering concerning heat and its transfer.', 1),
       (35, 3, 6, 'Robotics', 'Design, construction, and operation of robots.', 3),
       (36, 3, 6, 'Capstone Project in Mechanical Engineering',
        'Integrative project applying mechanical engineering principles.', 2),
       (37, 4, 1, 'Electrical Circuits', 'Fundamentals of electrical circuit analysis.', 2),
       (38, 4, 1, 'Electromagnetism', 'Study of electromagnetic fields and their applications.', 3),
       (39, 4, 2, 'Signals and Systems', 'Analysis of signals and systems.', 2),
       (40, 4, 2, 'Digital Logic Design', 'Design and analysis of digital systems.', 4),
       (41, 4, 3, 'Microprocessors', 'Introduction to microprocessor architecture and programming.', 1),
       (42, 4, 3, 'Power Electronics', 'Conversion and control of electric power with electronic systems.', 2),
       (43, 4, 4, 'Electrical Machines', 'Operation principles of electrical machines.', 3),
       (44, 4, 4, 'Control Systems Engineering', 'Theory and applications of control systems.', 2),
       (45, 4, 5, 'Communication Systems', 'Principles of analog and digital communication systems.', 1),
       (46, 4, 5, 'Power System Engineering',
        'Study of the generation, transmission, and distribution of electric power.', 2),
       (47, 4, 6, 'Renewable Energy Systems', 'Technologies and systems for renewable energy.', 3),
       (48, 4, 6, 'Capstone Project in Electrical Engineering',
        'Final project integrating electrical engineering concepts.', 4);


INSERT INTO Students (StudentID, StudentName, StudentEmail, ProgrammeID, StudentSemester)
VALUES
-- Programme 1, Semester 1
(1, 'Alex Johnson', 'alex.johnson@university.edu', 1, 1),
(2, 'Brittany Smith', 'brittany.smith@university.edu', 1, 1),
(3, 'Charles Brown', 'charles.brown@university.edu', 1, 1),
(4, 'Diana Adams', 'diana.adams@university.edu', 1, 1),
(5, 'Evan Wright', 'evan.wright@university.edu', 1, 1),
(6, 'Fiona Clark', 'fiona.clark@university.edu', 1, 1),
(7, 'George White', 'george.white@university.edu', 1, 1),
(8, 'Hannah Green', 'hannah.green@university.edu', 1, 1),
(9, 'Ian Moore', 'ian.moore@university.edu', 1, 1),
(10, 'Jasmine Taylor', 'jasmine.taylor@university.edu', 1, 1),

-- Programme 1, Semester 2 (StudentID continues sequentially)
(11, 'Kevin Lee', 'kevin.lee@university.edu', 1, 2),
(12, 'Lily Martinez', 'lily.martinez@university.edu', 1, 2),
(13, 'Mason King', 'mason.king@university.edu', 1, 2),
(14, 'Natalie Hall', 'natalie.hall@university.edu', 1, 2),
(15, 'Oliver Scott', 'oliver.scott@university.edu', 1, 2),
(16, 'Penelope Lewis', 'penelope.lewis@university.edu', 1, 2),
(17, 'Quinn Walker', 'quinn.walker@university.edu', 1, 2),
(18, 'Ryan Young', 'ryan.young@university.edu', 1, 2),
(19, 'Sophia Allen', 'sophia.allen@university.edu', 1, 2),
(20, 'Tyler Nelson', 'tyler.nelson@university.edu', 1, 2),

-- Programme 1, Semester 3
(21, 'Olivia Harris', 'olivia.harris@university.edu', 1, 3),
(22, 'Noah Wilson', 'noah.wilson@university.edu', 1, 3),
(23, 'Emma Martin', 'emma.martin@university.edu', 1, 3),
(24, 'Liam Anderson', 'liam.anderson@university.edu', 1, 3),
(25, 'Ava Thompson', 'ava.thompson@university.edu', 1, 3),
(26, 'Isabella Garcia', 'isabella.garcia@university.edu', 1, 3),
(27, 'Sophia Martinez', 'sophia.martinez@university.edu', 1, 3),
(28, 'Mia Rodriguez', 'mia.rodriguez@university.edu', 1, 3),
(29, 'Amelia Lopez', 'amelia.lopez@university.edu', 1, 3),
(30, 'Lucas Gonzalez', 'lucas.gonzalez@university.edu', 1, 3),

-- Programme 1, Semester 4
(31, 'Charlotte Hernandez', 'charlotte.hernandez@university.edu', 1, 4),
(32, 'Elijah Perez', 'elijah.perez@university.edu', 1, 4),
(33, 'Ethan Brown', 'ethan.brown@university.edu', 1, 4),
(34, 'Aiden Johnson', 'aiden.johnson@university.edu', 1, 4),
(35, 'Benjamin Jones', 'benjamin.jones@university.edu', 1, 4),
(36, 'Sebastian Miller', 'sebastian.miller@university.edu', 1, 4),
(37, 'James Wilson', 'james.wilson@university.edu', 1, 4),
(38, 'Harper Moore', 'harper.moore@university.edu', 1, 4),
(39, 'Evelyn Taylor', 'evelyn.taylor@university.edu', 1, 4),
(40, 'Jack Anderson', 'jack.anderson@university.edu', 1, 4),

-- Programme 1, Semester 5
(41, 'Lily Thomas', 'lily.thomas@university.edu', 1, 5),
(42, 'Owen Jackson', 'owen.jackson@university.edu', 1, 5),
(43, 'William White', 'william.white@university.edu', 1, 5),
(44, 'Sophie Harris', 'sophie.harris@university.edu', 1, 5),
(45, 'Gabriel Martin', 'gabriel.martin@university.edu', 1, 5),
(46, 'Mia Thompson', 'mia.thompson@university.edu', 1, 5),
(47, 'Noah Garcia', 'noah.garcia@university.edu', 1, 5),
(48, 'Ava Martinez', 'ava.martinez@university.edu', 1, 5),
(49, 'Isabella Rodriguez', 'isabella.rodriguez@university.edu', 1, 5),
(50, 'Lucas Lopez', 'lucas.lopez@university.edu', 1, 5),

-- Programme 1, Semester 6
(51, 'Mason Clark', 'mason.clark@university.edu', 1, 6),
(52, 'Ella Hernandez', 'ella.hernandez@university.edu', 1, 6),
(53, 'Alexander Lewis', 'alexander.lewis@university.edu', 1, 6),
(54, 'Michael Davis', 'michael.davis@university.edu', 1, 6),
(55, 'Chloe Wilson', 'chloe.wilson@university.edu', 1, 6),
(56, 'Jacob Martinez', 'jacob.martinez@university.edu', 1, 6),
(57, 'Daniel Anderson', 'daniel.anderson@university.edu', 1, 6),
(58, 'Emily Smith', 'emily.smith@university.edu', 1, 6),
(59, 'Matthew Jones', 'matthew.jones@university.edu', 1, 6),
(60, 'Avery Brown', 'avery.brown@university.edu', 1, 6),

-- Programme 2, Semester 1
(61, 'Nathan Clark', 'nathan.clark@university.edu', 2, 1),
(62, 'Grace Lewis', 'grace.lewis@university.edu', 2, 1),
(63, 'Oscar Davis', 'oscar.davis@university.edu', 2, 1),
(64, 'Zoe Wilson', 'zoe.wilson@university.edu', 2, 1),
(65, 'Liam Martinez', 'liam.martinez@university.edu', 2, 1),
(66, 'Hannah Anderson', 'hannah.anderson@university.edu', 2, 1),
(67, 'Landon Smith', 'landon.smith@university.edu', 2, 1),
(68, 'Addison Jones', 'addison.jones@university.edu', 2, 1),
(69, 'Julian Brown', 'julian.brown@university.edu', 2, 1),
(70, 'Brooklyn Thompson', 'brooklyn.thompson@university.edu', 2, 1),

-- Programme 2, Semester 2
(71, 'Logan Garcia', 'logan.garcia@university.edu', 2, 2),
(72, 'Madison Martinez', 'madison.martinez@university.edu', 2, 2),
(73, 'Ryan Rodriguez', 'ryan.rodriguez@university.edu', 2, 2),
(74, 'Victoria Lopez', 'victoria.lopez@university.edu', 2, 2),
(75, 'Carter Gonzalez', 'carter.gonzalez@university.edu', 2, 2),
(76, 'Sofia Hernandez', 'sofia.hernandez@university.edu', 2, 2),
(77, 'Isaac Perez', 'isaac.perez@university.edu', 2, 2),
(78, 'Ariana Brown', 'ariana.brown@university.edu', 2, 2),
(79, 'Dylan Johnson', 'dylan.johnson@university.edu', 2, 2),
(80, 'Ella Davis', 'ella.davis@university.edu', 2, 2),

-- Programme 2, Semester 3
(81, 'Benjamin Wilson', 'benjamin.wilson@university.edu', 2, 3),
(82, 'Camila Martinez', 'camila.martinez@university.edu', 2, 3),
(83, 'Blake Anderson', 'blake.anderson@university.edu', 2, 3),
(84, 'Mila Smith', 'mila.smith@university.edu', 2, 3),
(85, 'Zachary Jones', 'zachary.jones@university.edu', 2, 3),
(86, 'Leah Brown', 'leah.brown@university.edu', 2, 3),
(87, 'Elijah Thompson', 'elijah.thompson@university.edu', 2, 3),
(88, 'Savannah Garcia', 'savannah.garcia@university.edu', 2, 3),
(89, 'Gabriel Rodriguez', 'gabriel.rodriguez@university.edu', 2, 3),
(90, 'Nora Lopez', 'nora.lopez@university.edu', 2, 3),

-- Programme 2, Semester 4
(91, 'Lucas Gonzalez', 'lucas.gonzalez@university.edu', 2, 4),
(92, 'Amelia Hernandez', 'amelia.hernandez@university.edu', 2, 4),
(93, 'Mason Perez', 'mason.perez@university.edu', 2, 4),
(94, 'Lily Brown', 'lily.brown@university.edu', 2, 4),
(95, 'Oliver Johnson', 'oliver.johnson@university.edu', 2, 4),
(96, 'Chloe Davis', 'chloe.davis@university.edu', 2, 4),
(97, 'Aiden Wilson', 'aiden.wilson@university.edu', 2, 4),
(98, 'Emma Martinez', 'emma.martinez@university.edu', 2, 4),
(99, 'Noah Anderson', 'noah.anderson@university.edu', 2, 4),
(100, 'Sophia Smith', 'sophia.smith@university.edu', 2, 4),

-- Programme 2, Semester 5
(101, 'Isabella Jones', 'isabella.jones@university.edu', 2, 5),
(102, 'Jacob Brown', 'jacob.brown@university.edu', 2, 5),
(103, 'Avery Thompson', 'avery.thompson@university.edu', 2, 5),
(104, 'Jack Garcia', 'jack.garcia@university.edu', 2, 5),
(105, 'Charlotte Rodriguez', 'charlotte.rodriguez@university.edu', 2, 5),
(106, 'Mia Lopez', 'mia.lopez@university.edu', 2, 5),
(107, 'William Gonzalez', 'william.gonzalez@university.edu', 2, 5),
(108, 'Harper Hernandez', 'harper.hernandez@university.edu', 2, 5),
(109, 'Ethan Perez', 'ethan.perez@university.edu', 2, 5),
(110, 'Evelyn Brown', 'evelyn.brown@university.edu', 2, 5),

-- Programme 2, Semester 6
(111, 'James Johnson', 'james.johnson@university.edu', 2, 6),
(112, 'Madeline Davis', 'madeline.davis@university.edu', 2, 6),
(113, 'Daniel Wilson', 'daniel.wilson@university.edu', 2, 6),
(114, 'Kaylee Martinez', 'kaylee.martinez@university.edu', 2, 6),
(115, 'Matthew Anderson', 'matthew.anderson@university.edu', 2, 6),
(116, 'Sophie Smith', 'sophie.smith@university.edu', 2, 6),
(117, 'Owen Jones', 'owen.jones@university.edu', 2, 6),
(118, 'Ava Brown', 'ava.brown@university.edu', 2, 6),
(119, 'Leo Thompson', 'leo.thompson@university.edu', 2, 6),
(120, 'Mila Garcia', 'mila.garcia@university.edu', 2, 6),

-- Programme 3, Semester 1
(121, 'Theo Reynolds', 'theo.reynolds@university.edu', 3, 1),
(122, 'Isla Simmons', 'isla.simmons@university.edu', 3, 1),
(123, 'Finn Russell', 'finn.russell@university.edu', 3, 1),
(124, 'Julia Morris', 'julia.morris@university.edu', 3, 1),
(125, 'Oscar Kennedy', 'oscar.kennedy@university.edu', 3, 1),
(126, 'Violet Dawson', 'violet.dawson@university.edu', 3, 1),
(127, 'Arthur Lane', 'arthur.lane@university.edu', 3, 1),
(128, 'Zara Armstrong', 'zara.armstrong@university.edu', 3, 1),
(129, 'Leo Ellis', 'leo.ellis@university.edu', 3, 1),
(130, 'Nora Bishop', 'nora.bishop@university.edu', 3, 1),

-- Programme 3, Semester 2
(131, 'Hugo Andrews', 'hugo.andrews@university.edu', 3, 2),
(132, 'Ivy Hawkins', 'ivy.hawkins@university.edu', 3, 2),
(133, 'Jude Cole', 'jude.cole@university.edu', 3, 2),
(134, 'Maeve Richards', 'maeve.richards@university.edu', 3, 2),
(135, 'Rory James', 'rory.james@university.edu', 3, 2),
(136, 'Elsie Rose', 'elsie.rose@university.edu', 3, 2),
(137, 'Silas Harvey', 'silas.harvey@university.edu', 3, 2),
(138, 'Aria Myers', 'aria.myers@university.edu', 3, 2),
(139, 'Felix West', 'felix.west@university.edu', 3, 2),
(140, 'Luna Grant', 'luna.grant@university.edu', 3, 2),

-- Programme 3, Semester 3
(141, 'Milo Butler', 'milo.butler@university.edu', 3, 3),
(142, 'Phoebe Price', 'phoebe.price@university.edu', 3, 3),
(143, 'Beckett Banks', 'beckett.banks@university.edu', 3, 3),
(144, 'Zoe Reed', 'zoe.reed@university.edu', 3, 3),
(145, 'Atticus Brooks', 'atticus.brooks@university.edu', 3, 3),
(146, 'Freya Fox', 'freya.fox@university.edu', 3, 3),
(147, 'Declan Wells', 'declan.wells@university.edu', 3, 3),
(148, 'Iris Long', 'iris.long@university.edu', 3, 3),
(149, 'Kai Wood', 'kai.wood@university.edu', 3, 3),
(150, 'Ruby Knight', 'ruby.knight@university.edu', 3, 3),

-- Programme 3, Semester 4
(151, 'Ezra Gray', 'ezra.gray@university.edu', 3, 4),
(152, 'Hazel Hunt', 'hazel.hunt@university.edu', 3, 4),
(153, 'Miles Richardson', 'miles.richardson@university.edu', 3, 4),
(154, 'Piper George', 'piper.george@university.edu', 3, 4),
(155, 'Rowan Palmer', 'rowan.palmer@university.edu', 3, 4),
(156, 'Stella Gordon', 'stella.gordon@university.edu', 3, 4),
(157, 'Theodore Perry', 'theodore.perry@university.edu', 3, 4),
(158, 'Clara Holmes', 'clara.holmes@university.edu', 3, 4),
(159, 'Luca Lane', 'luca.lane@university.edu', 3, 4),
(160, 'Matilda Watts', 'matilda.watts@university.edu', 3, 4),

-- Programme 3, Semester 5
(161, 'Finnegan Dean', 'finnegan.dean@university.edu', 3, 5),
(162, 'Margot Webb', 'margot.webb@university.edu', 3, 5),
(163, 'Jasper Fox', 'jasper.fox@university.edu', 3, 5),
(164, 'Emilia Kennedy', 'emilia.kennedy@university.edu', 3, 5),
(165, 'Sawyer Banks', 'sawyer.banks@university.edu', 3, 5),
(166, 'Gemma Brooks', 'gemma.brooks@university.edu', 3, 5),
(167, 'Caleb Price', 'caleb.price@university.edu', 3, 5),
(168, 'Penelope Reed', 'penelope.reed@university.edu', 3, 5),
(169, 'Griffin Woods', 'griffin.woods@university.edu', 3, 5),
(170, 'Tessa Knight', 'tessa.knight@university.edu', 3, 5),

-- Programme 3, Semester 6
(171, 'Wesley Gray', 'wesley.gray@university.edu', 3, 6),
(172, 'Scarlett Hunt', 'scarlett.hunt@university.edu', 3, 6),
(173, 'Roman Richardson', 'roman.richardson@university.edu', 3, 6),
(174, 'Vivian George', 'vivian.george@university.edu', 3, 6),
(175, 'Quinn Palmer', 'quinn.palmer@university.edu', 3, 6),
(176, 'Juliet Gordon', 'juliet.gordon@university.edu', 3, 6),
(177, 'Xander Perry', 'xander.perry@university.edu', 3, 6),
(178, 'Aurora Holmes', 'aurora.holmes@university.edu', 3, 6),
(179, 'Bryce Lane', 'bryce.lane@university.edu', 3, 6),
(180, 'Cora Watts', 'cora.watts@university.edu', 3, 6),

-- Programme 4, Semester 1
(181, 'Dexter Morgan', 'dexter.morgan@university.edu', 4, 1),
(182, 'Sienna Tate', 'sienna.tate@university.edu', 4, 1),
(183, 'Leonardo Vance', 'leonardo.vance@university.edu', 4, 1),
(184, 'Ivy Sandoval', 'ivy.sandoval@university.edu', 4, 1),
(185, 'Maverick MacNeally', 'maverick.oneal@university.edu', 4, 1),
(186, 'Eliza Cooke', 'eliza.cooke@university.edu', 4, 1),
(187, 'Ronan Peck', 'ronan.peck@university.edu', 4, 1),
(188, 'Liliana Mercer', 'liliana.mercer@university.edu', 4, 1),
(189, 'Kai Underwood', 'kai.underwood@university.edu', 4, 1),
(190, 'Arielle Barnett', 'arielle.barnett@university.edu', 4, 1),

-- Programme 4, Semester 2
(191, 'Tristan Best', 'tristan.best@university.edu', 4, 2),
(192, 'Nadia Field', 'nadia.field@university.edu', 4, 2),
(193, 'Orion Sweet', 'orion.sweet@university.edu', 4, 2),
(194, 'Melody Snow', 'melody.snow@university.edu', 4, 2),
(195, 'Lysander Moon', 'lysander.moon@university.edu', 4, 2),
(196, 'Giselle Starr', 'giselle.starr@university.edu', 4, 2),
(197, 'Phoenix Dale', 'phoenix.dale@university.edu', 4, 2),
(198, 'Serena Bright', 'serena.bright@university.edu', 4, 2),
(199, 'Caspian Marsh', 'caspian.marsh@university.edu', 4, 2),
(200, 'Thalia Grace', 'thalia.grace@university.edu', 4, 2),

-- Programme 4, Semester 3
(201, 'Finnian Shore', 'finnian.shore@university.edu', 4, 3),
(202, 'Elodie Frost', 'elodie.frost@university.edu', 4, 3),
(203, 'Theo Cliff', 'theo.cliff@university.edu', 4, 3),
(204, 'Luna Meadow', 'luna.meadow@university.edu', 4, 3),
(205, 'Atlas Fielding', 'atlas.fielding@university.edu', 4, 3),
(206, 'Dahlia Rosewood', 'dahlia.rosewood@university.edu', 4, 3),
(207, 'Evander Sky', 'evander.sky@university.edu', 4, 3),
(208, 'Marina Brooks', 'marina.brooks@university.edu', 4, 3),
(209, 'Jasper Vale', 'jasper.vale@university.edu', 4, 3),
(210, 'Niamh Harbor', 'niamh.harbor@university.edu', 4, 3),

-- Programme 4, Semester 4
(211, 'Rohan Gale', 'rohan.gale@university.edu', 4, 4),
(212, 'Saskia Lake', 'saskia.lake@university.edu', 4, 4),
(213, 'Lorcan Ridge', 'lorcan.ridge@university.edu', 4, 4),
(214, 'Mireille Stone', 'mireille.stone@university.edu', 4, 4),
(215, 'Emrys Wolf', 'emrys.wolf@university.edu', 4, 4),
(216, 'Isolde Fern', 'isolde.fern@university.edu', 4, 4),
(217, 'Darian Light', 'darian.light@university.edu', 4, 4),
(218, 'Anika Dawn', 'anika.dawn@university.edu', 4, 4),
(219, 'Cedric Night', 'cedric.night@university.edu', 4, 4),
(220, 'Briar Rose', 'briar.rose@university.edu', 4, 4),

-- Programme 4, Semester 5
(221, 'Kieran Vale', 'kieran.vale@university.edu', 4, 5),
(222, 'Flora Moon', 'flora.moon@university.edu', 4, 5),
(223, 'Orlando Storm', 'orlando.storm@university.edu', 4, 5),
(224, 'Talia Rain', 'talia.rain@university.edu', 4, 5),
(225, 'Piers Cloud', 'piers.cloud@university.edu', 4, 5),
(226, 'Celeste Star', 'celeste.star@university.edu', 4, 5),
(227, 'Blaise Sun', 'blaise.sun@university.edu', 4, 5),
(228, 'Iris Bloom', 'iris.bloom@university.edu', 4, 5),
(229, 'Soren Ridge', 'soren.ridge@university.edu', 4, 5),
(230, 'Maeve Light', 'maeve.light@university.edu', 4, 5),

-- Programme 4, Semester 6
(231, 'Rowan Peak', 'rowan.peak@university.edu', 4, 6),
(232, 'Juniper Leaf', 'juniper.leaf@university.edu', 4, 6),
(233, 'Elio River', 'elio.river@university.edu', 4, 6),
(234, 'Lyra Forest', 'lyra.forest@university.edu', 4, 6),
(235, 'Ansel Heath', 'ansel.heath@university.edu', 4, 6),
(236, 'Cora Tide', 'cora.tide@university.edu', 4, 6),
(237, 'Alaric Glen', 'alaric.glen@university.edu', 4, 6),
(238, 'Selene Sky', 'selene.sky@university.edu', 4, 6),
(239, 'Magnus Creek', 'magnus.creek@university.edu', 4, 6),
(240, 'Aster Bloom', 'aster.bloom@university.edu', 4, 6);
