-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2026 at 05:45 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `date_published` date DEFAULT NULL,
  `publisher` varchar(150) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `date_published`, `publisher`, `language`, `description`) VALUES
(1, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic', '1925-04-10', 'Charles Scribner\'s Sons', 'English', 'The Great Gatsby follows Jay Gatsby, a mysterious millionaire who throws extravagant parties in hopes of reconnecting with Daisy Buchanan, the woman he once loved. Set during the glamorous Jazz Age of the 1920s, the novel explores wealth, obsession, social class and the illusion of the American Dream. Through Nick Carraway’s narration, the story reveals the emptiness behind luxury and the tragedy of chasing a perfect past that can never truly return.'),
(2, 'Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 'Fantasy', '1997-06-26', 'Bloomsbury', 'English', 'Harry Potter and the Sorcerer\'s Stone introduces Harry Potter, an orphan who discovers that he is a wizard on his eleventh birthday. He enters Hogwarts School of Witchcraft and Wizardry, where he learns magic, forms close friendships and uncovers the truth about his parents. As Harry faces secrets hidden inside the school, he begins his journey against the dark wizard Voldemort and discovers courage he never knew he had.'),
(3, 'Atomic Habits', 'James Clear', 'Self Development', '2018-10-16', 'Avery', 'English', 'Atomic Habits explains how small daily habits can create powerful long-term changes. James Clear teaches practical methods for building good habits, breaking bad ones and designing an environment that supports personal growth. The book shows that success does not come from sudden transformation, but from small improvements repeated consistently over time.'),
(4, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', '1960-07-11', 'J.B. Lippincott & Co.', 'English', 'To Kill a Mockingbird follows Scout Finch as she grows up in a racially divided town in the American South. Her father, Atticus Finch, defends a Black man falsely accused of a serious crime, exposing Scout and her brother Jem to injustice, prejudice and moral courage. Through a child’s point of view, the novel explores empathy, fairness and the importance of standing up for what is right.'),
(5, 'The Alchemist', 'Paulo Coelho', 'Adventure', '1988-01-01', 'HarperTorch', 'English', 'The Alchemist follows Santiago, a young shepherd who dreams of finding treasure near the Egyptian pyramids. His journey takes him across deserts and through encounters with wise teachers, danger and self-discovery. Along the way, Santiago learns that the real treasure is not only gold, but also understanding one’s purpose, listening to the heart and having courage to follow a dream.'),
(6, '1984', 'George Orwell', 'Dystopian', '1949-06-08', 'Secker & Warburg', 'English', '1984 is set in a dystopian society ruled by the Party and its leader, Big Brother. Winston Smith secretly questions the government that controls truth, history, language and even personal thoughts. As he searches for freedom and love in a world filled with surveillance and fear, the novel reveals the terrifying consequences of absolute power and the destruction of individuality.'),
(7, 'Animal Farm', 'George Orwell', 'Political Fiction', '1945-08-17', 'Secker & Warburg', 'English', 'Animal Farm tells the story of farm animals who rebel against their human owner to create a fair and equal society. However, the pigs gradually take control, and their leadership becomes just as corrupt as the system they replaced. Through simple storytelling and powerful symbolism, George Orwell criticises dictatorship, propaganda and the abuse of political power.'),
(8, 'Pride and Prejudice', 'Jane Austen', 'Romance', '1813-01-28', 'T. Egerton', 'English', 'Pride and Prejudice follows Elizabeth Bennet, a clever and independent young woman navigating love, family pressure and social expectations. Her complicated relationship with Mr. Darcy develops through misunderstanding, pride and personal growth. Jane Austen combines romance, humour and social criticism to show how first impressions can be misleading.'),
(9, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', '1937-09-21', 'George Allen & Unwin', 'English', 'The Hobbit follows Bilbo Baggins, a peaceful hobbit who is unexpectedly invited on an adventure with Gandalf and a group of dwarves. Their quest to reclaim treasure from the dragon Smaug takes Bilbo through danger, mystery and discovery. Along the way, he finds courage, cleverness and a magical ring that will change the future of Middle-earth.'),
(10, 'The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', '1954-07-29', 'Allen & Unwin', 'English', 'The Lord of the Rings is an epic fantasy about Frodo Baggins and his mission to destroy the One Ring before it falls into the hands of the Dark Lord Sauron. Joined by loyal companions, Frodo travels through dangerous lands filled with war, temptation and sacrifice. The story explores friendship, courage, hope and the struggle between good and evil.'),
(11, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', 'Finance', '1997-04-01', 'Warner Books', 'English', 'Rich Dad Poor Dad compares two different views of money through the lessons of Robert Kiyosaki’s two father figures. One believes in traditional education and job security, while the other teaches financial independence through assets and investing. The book encourages readers to rethink income, wealth and financial decision-making.'),
(12, 'Think and Grow Rich', 'Napoleon Hill', 'Motivation', '1937-01-01', 'The Ralston Society', 'English', 'Think and Grow Rich is a motivational classic that explains how desire, belief, persistence and planning can lead to success. Napoleon Hill shares principles gathered from studying successful people and presents them as a guide for personal achievement. The book focuses on mindset, discipline and the power of clear goals.'),
(13, 'The Power of Habit', 'Charles Duhigg', 'Self Development', '2012-02-28', 'Random House', 'English', 'The Power of Habit explores how habits are formed, how they shape behaviour and how they can be changed. Charles Duhigg explains the habit loop of cue, routine and reward using real-life examples from individuals, companies and society. The book helps readers understand why habits exist and how small changes can transform daily life.'),
(14, 'Deep Work', 'Cal Newport', 'Productivity', '2016-01-05', 'Grand Central Publishing', 'English', 'Deep Work explains the value of focused work in a world full of distractions. Cal Newport argues that the ability to concentrate deeply is becoming rare but increasingly valuable. The book gives practical strategies for improving focus, reducing shallow work and producing meaningful results in study, work and personal projects.'),
(15, 'Ikigai', 'Hector Garcia', 'Self Development', '2016-08-29', 'Penguin Books', 'English', 'Ikigai explores the Japanese concept of finding purpose and meaning in life. The book combines ideas about health, happiness, work and longevity, especially from communities known for long life. It encourages readers to discover what they love, what they are good at and what gives their life direction.'),
(16, 'The Psychology of Money', 'Morgan Housel', 'Finance', '2020-09-08', 'Harriman House', 'English', 'The Psychology of Money explains how personal behaviour and emotions influence financial decisions more than knowledge alone. Morgan Housel shares stories and lessons about wealth, greed, saving, risk and long-term thinking. The book teaches that managing money well depends on mindset, patience and understanding human nature.'),
(17, 'Clean Code', 'Robert C. Martin', 'Programming', '2008-08-01', 'Prentice Hall', 'English', 'Clean Code teaches programmers how to write code that is readable, maintainable and professional. Robert C. Martin explains principles such as meaningful names, small functions, clear structure and responsible design. The book is useful for developers who want to improve code quality and build software that is easier to understand and maintain.'),
(18, 'Learning PHP, MySQL & JavaScript', 'Robin Nixon', 'Programming', '2018-06-01', 'O\'Reilly Media', 'English', 'Learning PHP, MySQL & JavaScript introduces the core technologies needed for web development. The book guides readers through server-side programming, database usage and client-side scripting. It is suitable for beginners who want to build dynamic websites and understand how PHP, MySQL and JavaScript work together.'),
(19, 'HTML and CSS Design and Build Websites', 'Jon Duckett', 'Web Development', '2011-11-08', 'Wiley', 'English', 'HTML and CSS Design and Build Websites is a visual guide to creating websites using HTML and CSS. Jon Duckett explains web structure, styling, layout and design in a clear and beginner-friendly way. The book is useful for students and new developers who want to learn how attractive web pages are created.'),
(20, 'JavaScript and JQuery', 'Jon Duckett', 'Web Development', '2014-06-30', 'Wiley', 'English', 'JavaScript and JQuery teaches how to add interactivity and dynamic features to websites. The book explains programming concepts, browser behaviour and the use of jQuery in a visual and accessible style. It helps beginners understand how websites respond to user actions and display changing content.'),
(21, 'Database System Concepts', 'Abraham Silberschatz', 'Database', '2019-02-01', 'McGraw-Hill', 'English', 'Database System Concepts introduces the foundations of database design, SQL, data models, transactions and database management systems. It explains how data is stored, organized, retrieved and protected. The book is widely used by students learning database theory and practical database development.'),
(22, 'Introduction to Algorithms', 'Thomas H. Cormen', 'Computer Science', '2009-07-31', 'MIT Press', 'English', 'Introduction to Algorithms provides a detailed study of algorithm design and analysis. It covers topics such as sorting, searching, graph algorithms, dynamic programming and complexity. The book is suitable for computer science students who want to understand efficient problem-solving and the mathematical foundations of algorithms.'),
(23, 'Computer Networking: A Top Down Approach', 'James Kurose', 'Networking', '2016-03-01', 'Pearson', 'English', 'Computer Networking: A Top Down Approach explains how computer networks and the internet work, starting from applications and moving down through transport, network and link layers. It covers protocols, communication models and real-world networking systems. The book helps students understand how data travels across networks.'),
(24, 'Operating System Concepts', 'Abraham Silberschatz', 'Computer Science', '2018-05-07', 'Wiley', 'English', 'Operating System Concepts explains how operating systems manage hardware, software and user processes. It covers topics such as process management, memory, file systems, scheduling and security. The book gives students a strong understanding of how computers run programs and manage resources efficiently.'),
(25, 'The Silent Patient', 'Alex Michaelides', 'Thriller', '2019-02-05', 'Celadon Books', 'English', 'The Silent Patient follows Alicia Berenson, a famous painter who stops speaking after being accused of murdering her husband. A psychotherapist becomes determined to uncover the truth behind her silence. As the mystery unfolds, the story reveals secrets, trauma and a shocking twist that changes everything.'),
(26, 'The Da Vinci Code', 'Dan Brown', 'Mystery', '2003-03-18', 'Doubleday', 'English', 'The Da Vinci Code follows symbologist Robert Langdon as he becomes involved in a murder investigation filled with hidden messages, religious secrets and historical puzzles. Together with cryptologist Sophie Neveu, he follows clues across Europe while being pursued by powerful enemies. The novel blends mystery, art, history and suspense.'),
(27, 'Sherlock Holmes', 'Arthur Conan Doyle', 'Mystery', '1892-10-14', 'George Newnes', 'English', 'Sherlock Holmes features the brilliant detective Sherlock Holmes and his loyal companion Dr. Watson as they solve mysterious crimes in Victorian England. Holmes uses sharp observation, logic and deduction to uncover hidden truths. The stories are known for clever mysteries, memorable characters and classic detective storytelling.'),
(28, 'Percy Jackson & The Lightning Thief', 'Rick Riordan', 'Fantasy', '2005-06-28', 'Disney Hyperion', 'English', 'Percy Jackson & The Lightning Thief follows Percy, a boy who discovers that he is the son of Poseidon. After learning that Greek gods and monsters are real, he goes on a dangerous quest to prevent a war among the gods. The story combines mythology, adventure, humour and friendship.'),
(29, 'Diary of a Wimpy Kid', 'Jeff Kinney', 'Comedy', '2007-04-01', 'Amulet Books', 'English', 'Diary of a Wimpy Kid follows Greg Heffley as he records his experiences in middle school through funny diary entries and drawings. Greg deals with friendship problems, family situations, school embarrassment and his own attempts to become popular. The book presents growing up in a humorous and relatable way.'),
(30, 'The Fault in Our Stars', 'John Green', 'Romance', '2012-01-10', 'Dutton Books', 'English', 'The Fault in Our Stars tells the emotional story of Hazel Grace Lancaster and Augustus Waters, two teenagers who meet through a cancer support group. Their relationship grows through humour, love and shared understanding of life’s fragility. The novel explores illness, hope, grief and the desire to live meaningfully.'),
(31, 'The Hunger Games', 'Suzanne Collins', 'Dystopian', '2008-09-14', 'Scholastic Press', 'English', 'The Hunger Games is set in a dystopian nation where teenagers are forced to compete in a deadly televised event. Katniss Everdeen volunteers to take her sister’s place and must fight for survival while questioning the cruelty of the system. Her courage becomes a symbol of resistance and rebellion.'),
(32, 'The Maze Runner', 'James Dashner', 'Science Fiction', '2009-10-06', 'Delacorte Press', 'English', 'The Maze Runner follows Thomas, a teenager who wakes up in a mysterious place called the Glade with no memory of his past. He and other boys are trapped inside a giant maze filled with danger. As Thomas searches for answers, he uncovers secrets about their imprisonment and the world outside.'),
(33, 'A Game of Thrones', 'George R.R. Martin', 'Fantasy', '1996-08-01', 'Bantam Spectra', 'English', 'A Game of Thrones begins an epic fantasy series filled with political conflict, family rivalry and hidden threats. Noble houses compete for power while ancient dangers begin to rise beyond the northern wall. The story is known for complex characters, unexpected twists and a harsh world where power often comes at a great cost.'),
(34, 'The Catcher in the Rye', 'J.D. Salinger', 'Classic', '1951-07-16', 'Little, Brown and Company', 'English', 'The Catcher in the Rye follows Holden Caulfield, a teenager struggling with loneliness, confusion and disappointment after leaving school. As he wanders through New York City, he reflects on adulthood, identity and the loss of innocence. The novel captures the emotional uncertainty of adolescence.'),
(35, 'Moby Dick', 'Herman Melville', 'Adventure', '1851-10-18', 'Harper & Brothers', 'English', 'Moby Dick follows Captain Ahab, who becomes obsessed with hunting the great white whale that once injured him. The voyage becomes a powerful story about revenge, obsession, nature and human limits. Through Ishmael’s narration, the novel explores life at sea and the dangerous consequences of being consumed by a single purpose.');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `loan_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `borrower_name` varchar(100) DEFAULT NULL,
  `borrower_email` varchar(100) DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `actual_return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `loan_date`, `return_date`, `status`, `borrower_name`, `borrower_email`, `contact_number`, `actual_return_date`) VALUES
(10, NULL, 1, '2026-05-22', '2026-05-23', 'Returned', 'akmal', 'akmalzakri09@gmail.com', '123456789', '2026-05-22'),
(11, NULL, 2, '2026-05-22', '2026-05-23', 'Returned', 'Akmal', 'akmalzakei09@gmail.com', '123456789', '2026-05-22'),
(12, NULL, 1, '2026-05-22', '2026-05-23', 'Returned', 'akmal', 'akmalzakri09@gmail.com', '123456789', '2026-05-22'),
(13, NULL, 3, '2026-05-22', '2026-05-29', 'Returned', 'Muhammad Akmal', 'akmalzakri09@gmail.com', '123456789', '2026-05-22'),
(14, NULL, 2, '2026-05-22', '2026-06-05', 'Returned', 'kamaron', 'kamaron09@gmail.com', '0123456789', NULL),
(15, NULL, 4, '2026-05-22', '2026-05-29', 'Returned', 'zikri', 'zikri88@gmail.com', '0176098416', '2026-05-22'),
(16, NULL, 3, '2026-05-22', '2026-05-23', 'Returned', 'akmal', 'akmalzakri09@gmail.com', '01111111', '2026-05-22'),
(17, NULL, 4, '2026-05-22', '2026-05-23', 'Returned', 'carlota', 'carlota00@gmail.com', '012345666', '2026-05-22'),
(18, NULL, 2, '2026-05-23', '2026-05-24', 'Returned', 'ssss', 'almaml@gmail.com', '5445466', '2026-05-22'),
(19, NULL, 2, '2026-05-23', '2026-05-30', 'Returned', 'Akmal', 'akmalzakri09@gmail.com', '0176768442', '2026-05-23'),
(20, NULL, 8, '2026-05-23', '2026-05-24', 'Returned', 'Akmal', 'akmalzakri09@gmail.com', '0176768442', '2026-05-23'),
(21, NULL, 12, '2026-05-23', '2026-05-30', 'Returned', 'Akmal', 'akmalzakri09@gmail.com', '0176768442', '2026-05-23'),
(22, 8, 2, '2026-05-23', '2026-05-24', 'Returned', 'AKMAL', 'akmalzakri09@gmail.com', '0176768442', '2026-05-23'),
(23, 9, 12, '2026-05-23', '2026-05-30', 'Returned', 'Iman', 'manjiqq04@gmail.com', '0123456789', '2026-05-23'),
(24, 10, 2, '2026-05-23', '2026-05-24', 'Returned', 'Muhammad Akmal Bin Mohd Zakri', 'akmalzakri04@gmail.com', '0176098416', '2026-05-23'),
(25, 8, 5, '2026-05-23', '2026-05-30', 'Borrowed', 'Akmal', 'akmalzakri09@gmail.com', '0176768442', NULL),
(26, 8, 2, '2026-05-23', '2026-05-30', 'Returned', 'akm', 'akmalzakri09@gmail.com', '0176768442', '2026-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','student') DEFAULT 'student',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `contact_number`, `password`, `role`, `created`, `profile_picture`) VALUES
(7, 'carlota', 'carlota', 'carlota00@gmail.com', '012345666', 'carlota', 'student', '2026-05-22 17:47:38', 'profile_7_1779531008.jpeg'),
(8, 'MUHAMMAD AKMAL BIN MOHD ZAKRI', 'AkmalZAKRI', 'akmalzakri09@gmail.com', '0176768448', '$2y$10$HBoCj6Ft91riOYLI5DIKeuuhT1evh9YK6lRcPKagaFWLkalFtz7IW', 'student', '2026-05-23 10:20:07', 'profile_8_1779531665.jpeg'),
(9, 'Manjiqq', 'manjiqq', 'manjiqq04@gmail.com', '0123456789', '$2y$10$6/kPuq9kVSFdCK79gVTqQO4/NLJKD4jMzjfKq4sjqd8elYSfXJQHq', 'student', '2026-05-23 10:31:49', 'profile_9_1779535643.jpeg'),
(10, 'MUHAMMAD AKMAL BIN MOHD ZAKRI', 'AkmalZ', 'akmalzakri04@gmail.com', '0176098416', '$2y$10$Y6/oGFT1wGZDyVgOqupYqugEYYWTwYydCs.L5.kdbveFd.51Us.Ie', 'student', '2026-05-23 11:46:46', 'profile_10_1779536984.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
