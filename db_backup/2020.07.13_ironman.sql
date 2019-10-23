-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 03:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ironman`
--

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `order_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `post_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Non veniam expedita adipisci delectus dicta unde rem facere deleniti aut.', 'Optio at fuga.', 'default.jpg', 21, '2020-03-18 20:16:28', NULL),
(2, 'Eligendi aliquam et id aliquid architecto porro quam voluptate nisi vel assumenda voluptatem.', 'Consequatur quia ea.', 'default.jpg', 21, '2020-05-02 19:54:16', NULL),
(3, 'Id et voluptatem enim rem doloremque fugit esse.', 'Ex similique omnis.', 'default.jpg', 1, '2020-03-28 18:36:28', NULL),
(4, 'Aliquid quos ducimus tenetur eaque magni vel quia enim modi.', 'Commodi.', 'default.jpg', 18, '2020-04-13 07:49:48', NULL),
(5, 'Sunt debitis dolores at non maiores molestias.', 'At dolore sed ut.', 'default.jpg', 20, '2020-04-07 07:44:24', NULL),
(6, 'Rerum et eos consectetur itaque occaecati velit similique.', 'A quisquam ducimus.', 'default.jpg', 13, '2020-05-07 16:58:42', NULL),
(7, 'Est sunt optio est laboriosam consequuntur nobis totam architecto accusamus.', 'Tenetur ut.', 'default.jpg', 5, '2020-04-17 19:20:17', NULL),
(8, 'Iste possimus consequatur ex illum delectus unde aperiam officia.', 'Reprehenderit.', 'default.jpg', 14, '2020-05-24 16:10:04', NULL),
(9, 'Voluptatibus nihil hic quia laborum velit eos magni consequuntur aperiam odit dolores.', 'Eos cum est eveniet.', 'default.jpg', 20, '2020-04-27 07:14:25', NULL),
(10, 'Praesentium enim aut sapiente tenetur totam reiciendis.', 'Nobis laborum qui.', 'default.jpg', 6, '2020-06-09 16:18:09', NULL),
(11, 'Sit voluptatem suscipit earum iusto et voluptatem occaecati aut dolorum porro hic.', 'Minus aut nihil.', 'default.jpg', 16, '2020-03-20 06:55:32', NULL),
(12, 'Sunt eum ut rerum ipsa repudiandae temporibus et amet qui.', 'Ipsum est rerum.', 'default.jpg', 15, '2020-05-30 12:52:24', NULL),
(13, 'Qui commodi ipsum nulla culpa vitae provident qui consequuntur voluptates.', 'Sapiente maiores.', 'default.jpg', 2, '2020-05-08 00:08:18', NULL),
(14, 'Aut odit voluptate sit rerum in cumque expedita officiis ut cumque delectus.', 'Ut et inventore.', 'default.jpg', 8, '2020-05-09 08:04:04', NULL),
(15, 'Enim non quia voluptates et autem iste iure ratione tempore non autem.', 'Corporis quos nam.', 'default.jpg', 13, '2020-04-06 23:56:16', NULL),
(16, 'Molestias hic culpa laboriosam corporis optio iusto.', 'Consectetur.', 'default.jpg', 3, '2020-04-09 22:29:08', NULL),
(17, 'Eaque vitae est rerum reprehenderit omnis aliquam magni nemo quas est.', 'Ducimus omnis cum.', 'default.jpg', 10, '2020-05-02 21:43:08', NULL),
(18, 'Id dolorum voluptas nisi dolor suscipit aut nam et quas eligendi ut id enim.', 'Ipsam sit earum.', 'default.jpg', 2, '2020-05-02 13:40:25', NULL),
(19, 'Et incidunt laborum rerum laboriosam esse voluptas repellendus ex omnis.', 'Sit illum a ut ea.', 'default.jpg', 15, '2020-05-05 22:17:49', NULL),
(20, 'Quae sequi doloribus rerum aut dolorem accusamus voluptatibus et sit enim deserunt est similique.', 'Maxime pariatur.', 'default.jpg', 4, '2020-04-29 17:03:13', NULL),
(21, 'Alice looked at the bottom of a muchness\"--did you ever eat a bat?\' when suddenly, thump! thump! down she came upon a time she saw maps and pictures hung upon pegs. She took down a jar from one of.', 'Id nihil ea ut voluptas doloremque voluptas illum. Est est harum reiciendis ut placeat ea. Et et est neque assumenda dolorem deleniti. Eos molestiae facere quos perferendis possimus voluptatem assumenda.', 'default.jpg', 3, '2020-04-15 23:08:35', NULL),
(22, 'Dodo replied very readily: \'but that\'s because it stays the same height as herself; and when she looked down into a tree. \'Did you say it.\' \'That\'s nothing to do.\" Said the mouse to the jury. They.', 'Magni quia deleniti impedit maxime qui et provident. Sed qui nihil rerum. Animi nemo est qui et ut dolorem neque. Qui qui reprehenderit et.', 'default.jpg', 14, '2020-04-11 01:30:20', NULL),
(23, 'I could, if I know I do!\' said Alice to herself, as she picked her way into a small passage, not much surprised at her rather inquisitively, and seemed not to her, still it had finished this short.', 'Nisi non occaecati adipisci aliquam. Quia non consequuntur sed aut qui. Sed illum quae voluptas ex quia possimus tempore. Sequi consequatur pariatur et omnis repudiandae.', 'default.jpg', 2, '2020-05-13 08:02:24', NULL),
(24, 'Alice in a tone of great relief. \'Call the next witness would be grand, certainly,\' said Alice, looking down with one finger; and the turtles all advance! They are waiting on the stairs. Alice knew.', 'Quia consequuntur quo laborum et veniam autem quia. Reprehenderit omnis quis nostrum et quis voluptatem odio. Beatae sed voluptas saepe voluptatum sint. Ducimus omnis et libero eaque.', 'default.jpg', 8, '2020-06-10 14:08:53', NULL),
(25, 'Mock Turtle\'s Story \'You can\'t think how glad I am in the kitchen that did not see anything that had fallen into it: there were three little sisters--they were learning to draw, you know--\' \'What.', 'Omnis sint assumenda sed ad. Architecto corporis exercitationem ut velit iure totam quibusdam. Eaque soluta eaque sunt nulla.', 'default.jpg', 15, '2020-06-07 16:32:35', NULL),
(26, 'THIS!\' (Sounds of more energetic remedies--\' \'Speak English!\' said the White Rabbit, trotting slowly back again, and looking anxiously about her. \'Oh, do let me hear the Rabbit came near her, about.', 'Autem corporis et rerum quia sit recusandae. Sed odit aut qui consequatur ullam eum. Excepturi sit et consequatur velit molestias sapiente id.', 'default.jpg', 2, '2020-06-06 12:41:37', NULL),
(27, 'Tortoise because he was gone, and, by the Hatter, and, just as I\'d taken the highest tree in the other. \'I beg pardon, your Majesty,\' the Hatter began, in a trembling voice, \'Let us get to twenty at.', 'Sunt sint rerum voluptas et ab animi dolorem. Et dolor dolores possimus id. Sed est exercitationem culpa omnis aut dolores.', 'default.jpg', 17, '2020-03-19 08:02:03', NULL),
(28, 'And when I was going to give the hedgehog a blow with its wings. \'Serpent!\' screamed the Queen. \'You make me smaller, I suppose.\' So she began very cautiously: \'But I don\'t keep the same solemn.', 'Consectetur cumque placeat nulla consequatur. Enim et voluptatem adipisci consequatur harum autem. Tenetur aut consequatur nostrum magni sit est.', 'default.jpg', 12, '2020-05-09 08:09:46', NULL),
(29, 'It\'s high time to wash the things get used up.\' \'But what did the archbishop find?\' The Mouse did not answer, so Alice went on planning to herself \'It\'s the oldest rule in the sea!\' cried the.', 'Est quaerat quae excepturi aut dolores esse. Ut praesentium inventore eius sit quos est rerum. Repudiandae quia nulla dolor tenetur sunt ut natus eos. Esse harum ratione est. Est minima deserunt sed deserunt repudiandae.', 'default.jpg', 5, '2020-03-31 04:46:41', NULL),
(30, 'The table was a body to cut it off from: that he had a consultation about this, and after a minute or two. \'They couldn\'t have wanted it much,\' said Alice, rather doubtfully, as she could remember.', 'Beatae quasi nihil optio laboriosam doloribus est provident. Odio porro reprehenderit dignissimos ad accusantium similique sint voluptatum. Hic iste in aut dolores cumque perferendis ea enim.', 'default.jpg', 16, '2020-06-04 07:45:42', NULL),
(31, 'Alice, as she could, \'If you didn\'t sign it,\' said Alice. \'Come, let\'s try Geography. London is the same words as before, \'and things are worse than ever,\' thought the poor animal\'s feelings. \'I.', 'Non et architecto pariatur sunt. Eaque ut et explicabo est eum. Et quis est veritatis quisquam.', 'default.jpg', 21, '2020-05-15 02:47:43', NULL),
(32, 'Do come back and see what would be a comfort, one way--never to be otherwise than what it was: at first she thought it would,\' said the last words out loud, and the arm that was trickling down his.', 'Sit enim voluptas quasi pariatur suscipit nam est magnam. Repellendus sapiente iure alias. Nesciunt deserunt alias voluptatem dignissimos dolor omnis ipsum commodi.', 'default.jpg', 6, '2020-04-18 12:47:47', NULL),
(33, 'I hadn\'t begun my tea--not above a week or so--and what with the tea,\' the March Hare was said to herself, \'whenever I eat or drink something or other; but the great wonder is, that I\'m perfectly.', 'Veniam laboriosam tempore magni quod nobis voluptates quia. Inventore nostrum perferendis sit voluptas. In consequatur exercitationem doloremque. Dolor a velit illo.', 'default.jpg', 12, '2020-04-16 18:01:42', NULL),
(34, 'Alice thought), and it was the Duchess\'s cook. She carried the pepper-box in her French lesson-book. The Mouse only growled in reply. \'Idiot!\' said the Mouse in the middle, wondering how she would.', 'Consectetur incidunt earum voluptatem velit. Sit quae minus voluptas. Quia cupiditate nihil sed totam cupiditate dicta. Quia similique error provident sunt sed ad debitis.', 'default.jpg', 12, '2020-04-11 18:35:51', NULL),
(35, 'THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never had to double themselves up and rubbed its eyes: then it watched the Queen till she had succeeded in getting its body tucked away, comfortably.', 'Voluptas rem corporis nulla aperiam repellendus dolores consequatur. Qui aut autem sunt veniam consectetur. Modi iusto est qui corporis.', 'default.jpg', 18, '2020-05-08 06:12:34', NULL),
(36, 'Paris, and Paris is the same year for such dainties would not join the dance. Will you, won\'t you join the dance? \"You can really have no answers.\' \'If you please, sir--\' The Rabbit started.', 'Officia porro hic magnam tenetur porro beatae. Debitis et voluptatem dignissimos qui assumenda ea aut. Aperiam earum delectus harum sunt perspiciatis. Amet eum ipsum consequuntur.', 'default.jpg', 18, '2020-04-21 16:51:16', NULL),
(37, 'THE KING AND QUEEN OF HEARTS. Alice was very hot, she kept tossing the baby at her feet, they seemed to have finished,\' said the Duchess, it had no very clear notion how long ago anything had.', 'Aut sint itaque minus veritatis vel et. Doloremque iste rerum est asperiores. Fuga impedit culpa beatae rerum.', 'default.jpg', 9, '2020-03-31 08:40:42', NULL),
(38, 'Alice to herself, \'after such a dear quiet thing,\' Alice went on, \'and most things twinkled after that--only the March Hare was said to herself, as she picked up a little bit, and said nothing.', 'Suscipit hic veniam aperiam culpa. Mollitia sed accusantium esse quam laborum esse. Sunt odit deleniti nihil fuga. Vero enim rerum aspernatur corrupti enim.', 'default.jpg', 8, '2020-04-09 08:06:59', NULL),
(39, 'Alice said very politely, \'if I had not gone much farther before she got into a doze; but, on being pinched by the hedge!\' then silence, and then raised himself upon tiptoe, put his mouth close to.', 'Expedita nisi at ducimus quidem rerum ipsa. Perspiciatis maxime labore et consequatur vel sed dolorem. Facilis et praesentium laudantium debitis ea quas.', 'default.jpg', 12, '2020-03-24 19:28:43', NULL),
(40, 'Alice. \'That\'s the reason so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said Alice very humbly: \'you had got burnt, and eaten up by a row of lodging houses, and behind them a.', 'Illo aliquid assumenda ab odio aliquid temporibus. Aut deleniti et cumque in asperiores consectetur ducimus. Fugit rem voluptas magnam atque natus dolorem autem animi.', 'default.jpg', 7, '2020-06-09 22:49:22', NULL),
(41, 'blog post  one', 'this is blog post number one 23', '41.jpg', 1, '2020-06-14 21:06:20', '2020-06-14 21:29:46'),
(42, 'another new blog post', 'new blog post content', '42.jpg', 1, '2020-06-16 19:53:18', '2020-06-16 19:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generated_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `generated_cart_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 'GrNDA3c994', 22, 1, '2020-06-19 22:26:09', NULL),
(2, 'GrNDA3c994', 2, 3, '2020-06-19 22:26:31', '2020-06-19 22:26:42'),
(3, 't13q2X5443', 12, 1, '2020-06-19 22:45:23', NULL),
(4, 't13q2X5443', 8, 3, '2020-06-19 22:45:41', NULL),
(5, 't13q2X5443', 4, 1, '2020-06-19 22:46:10', NULL),
(6, 't13q2X5443', 1, 5, '2020-06-19 22:46:23', NULL),
(11, '2NqXhqV420', 5, 1, '2020-06-25 20:19:30', NULL),
(13, '2NqXhqV420', 4, 5, '2020-06-25 20:51:32', '2020-06-25 23:05:30'),
(14, '2NqXhqV420', 1, 1, '2020-06-25 20:51:41', NULL),
(15, '2NqXhqV420', 7, 5, '2020-06-25 20:51:45', '2020-06-25 22:58:09'),
(16, '2NqXhqV420', 10, 5, '2020-06-25 20:51:50', '2020-06-25 21:24:31'),
(17, 'gI6xFuC236', 1, 1, '2020-06-30 10:26:41', NULL),
(18, 'gI6xFuC236', 2, 1, '2020-06-30 10:26:44', NULL),
(19, 'gI6xFuC236', 4, 1, '2020-06-30 10:26:48', NULL),
(20, '49iMekM45', 1, 1, '2020-07-01 16:59:51', NULL),
(23, '49iMekM45', 10, 2, '2020-07-01 17:00:06', '2020-07-01 19:19:20'),
(24, '49iMekM45', 11, 1, '2020-07-01 19:47:03', NULL),
(25, '49iMekM45', 12, 1, '2020-07-01 19:47:08', NULL),
(26, '6VTX0vM555', 1, 2, '2020-07-11 00:21:44', '2020-07-11 01:03:34'),
(27, '6VTX0vM555', 7, 1, '2020-07-11 00:21:48', NULL),
(28, '6VTX0vM555', 22, 1, '2020-07-11 00:21:52', '2020-07-11 01:03:58'),
(31, 'Gyosjx1704', 1, 2, '2020-07-12 19:25:23', '2020-07-12 21:03:36'),
(32, 'Gyosjx1704', 4, 1, '2020-07-12 19:25:27', NULL),
(33, 'Gyosjx1704', 10, 1, '2020-07-12 20:21:25', NULL),
(35, 'Gyosjx1704', 2, 1, '2020-07-12 21:12:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorydescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoryimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_category.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `categorydescription`, `user_id`, `categoryimage`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Smart Watch', 'All types of smart watch', 1, '1.jpg', '2020-06-02 20:19:25', '2020-06-03 20:17:02', NULL),
(2, 'HeadPhone', 'All types of Headphone and Headsets', 1, '2.jpg', '2020-06-02 20:19:33', '2020-06-03 20:14:07', NULL),
(3, 'Wallet', 'Good Quality Leather', 1, '3.jpg', '2020-06-03 20:20:27', '2020-06-03 20:20:28', NULL),
(4, 'Speaker', 'All types of bluetooth and jack speaker system', 1, '4.jpg', '2020-06-03 20:21:09', '2020-06-03 20:21:09', NULL),
(5, 'Power Bank', 'Different brand and different capacity power bank', 1, '5.jpg', '2020-06-03 20:21:42', '2020-06-03 20:21:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_messages`
--

CREATE TABLE `client_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_upload_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_messages`
--

INSERT INTO `client_messages` (`id`, `fname`, `email`, `subject`, `msg`, `created_at`, `updated_at`, `client_upload_file`) VALUES
(1, 'Mahmud Ibrahim', 'mahmud.ibrahim021@gmail.com', 'I am to buy', 'Hello, there i want to buy speaker', '2020-06-10 13:43:25', '2020-06-10 13:43:25', 'client_uploads/1.jpeg'),
(2, 'Mahmud Ibrahim', 'embeddedworld24@gmail.com', 'asdasd', 'asdasd', '2020-06-10 13:44:38', '2020-06-10 13:44:39', 'client_uploads/2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email_address`, `mobile_number`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Darien', 'Labadie', 'xgleichner@example.com', '584.930.7843 x1834', 'West Wellingtonview', '1988-11-01 20:18:58', NULL, NULL),
(2, 'Muriel', 'Wintheiser', 'hugh.conn@example.net', '1-339-455-5988 x5599', 'Hillsmouth', '2019-03-24 06:15:57', NULL, NULL),
(3, 'Patricia', 'Schneider', 'gsporer@example.net', '(821) 647-6674 x65061', 'Boehmside', '2005-12-16 18:43:34', NULL, NULL),
(4, 'Brody', 'Kub', 'bashirian.travon@example.org', '283-543-6858', 'Rebecashire', '1983-01-31 00:08:08', NULL, NULL),
(5, 'Roxane', 'Luettgen', 'chandler70@example.com', '(930) 585-8138 x73149', 'South Maximilian', '2012-10-21 03:23:08', NULL, NULL),
(6, 'Cedrick', 'Macejkovic', 'trycia79@example.net', '1-681-773-6476 x09649', 'Christiansenfort', '1990-06-18 20:10:10', NULL, NULL),
(7, 'Karley', 'Schinner', 'larkin.berenice@example.com', '(703) 336-1924 x00125', 'Lake Mafaldashire', '1972-09-25 20:35:14', NULL, NULL),
(8, 'Marilyne', 'Koelpin', 'deonte.prosacco@example.net', '628.977.5324', 'Tylerport', '1997-04-27 10:10:24', NULL, NULL),
(9, 'Marcia', 'Doyle', 'wkrajcik@example.com', '(267) 861-4373 x79795', 'D\'Amoreside', '1997-04-05 14:57:29', NULL, NULL),
(10, 'Melvin', 'Hoppe', 'heller.lizzie@example.net', '672-714-3819', 'East Jewell', '2014-06-26 02:13:38', NULL, NULL),
(11, 'Cornelius', 'Gislason', 'roselyn39@example.org', '732-235-2407 x114', 'Schummburgh', '2003-09-27 00:12:36', NULL, NULL),
(12, 'Aaron', 'Walker', 'brown.shirley@example.net', '(206) 557-5217', 'Mertzstad', '2017-04-26 15:57:34', NULL, NULL),
(13, 'Tyreek', 'Reichert', 'maureen.gusikowski@example.org', '610.974.0348 x39475', 'Jeffchester', '2002-10-03 03:14:08', NULL, NULL),
(14, 'Monique', 'Gleichner', 'gideon.auer@example.net', '1-906-844-4189', 'South Lulu', '1983-02-04 11:13:16', NULL, NULL),
(15, 'Lora', 'Turner', 'rylee.zieme@example.com', '1-562-235-3486', 'Port Johanmouth', '2005-03-09 05:48:59', NULL, NULL),
(16, 'Mable', 'Mitchell', 'pschaden@example.com', '(513) 926-3351 x744', 'New Hazelmouth', '1976-09-25 07:23:40', NULL, NULL),
(17, 'Hassie', 'Torphy', 'collier.ward@example.com', '1-370-364-1796', 'McLaughlinmouth', '1974-01-30 14:41:22', NULL, NULL),
(18, 'Travon', 'Wolf', 'tessie.bogisich@example.com', '1-348-393-2697', 'North Naomimouth', '2016-04-18 18:32:53', NULL, NULL),
(19, 'Dion', 'Cummings', 'johns.jose@example.com', '498.817.5324 x0181', 'West Miracleside', '1985-04-20 11:24:54', NULL, NULL),
(20, 'Ardith', 'Heathcote', 'moen.ettie@example.org', '+18526427734', 'Joycestad', '1972-05-10 13:56:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `minimum_purchase_amount` int(11) NOT NULL,
  `validity_till` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `added_by`, `discount_amount`, `minimum_purchase_amount`, `validity_till`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BD5', 1, 5, 1000, '2020-12-02', '2020-06-25 23:53:43', NULL, NULL),
(2, 'BD25', 1, 25, 10000, '2020-10-01', '2020-06-26 00:03:54', '2020-06-26 00:16:59', NULL),
(3, 'BD3', 1, 3, 3000, '2020-11-01', '2020-07-01 17:03:43', NULL, NULL),
(4, 'BD4', 1, 4, 4000, '2020-12-16', '2020-07-01 19:03:41', NULL, NULL),
(5, 'BD8', 1, 8, 8000, '2020-12-12', '2020-07-01 19:36:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2020_03_30_095516_create_todos_table', 1),
(21, '2020_04_08_005758_create_categories_table', 1),
(22, '2020_04_17_185613_create_contacts_table', 1),
(23, '2020_05_20_233702_create_products_table', 1),
(24, '2020_06_04_004904_create_testimonials_table', 1),
(25, '2020_06_04_154728_create_client_messages_table', 2),
(26, '2020_06_04_202250_add_slug_to_product_table', 3),
(27, '2020_06_09_195906_create_product_images_table', 4),
(30, '2020_06_10_192727_add_client_file_to_client_messages_table', 5),
(31, '2020_06_15_010450_create_blog_posts_table', 6),
(34, '2020_06_15_160717_create_post_comments_table', 7),
(35, '2020_06_19_215827_create_carts_table', 8),
(36, '2020_06_26_051414_create_coupons_table', 9),
(39, '2020_07_04_182406_add_user_role_to_users_table', 10),
(40, '2020_06_26_182411_create_wishlists_table', 11),
(41, '2020_07_11_075910_create_billings_table', 11),
(42, '2020_07_11_075940_create_shippings_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commenter_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `commenter_message`, `blog_post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Et culpa vero ad illo et dolores. Voluptatem harum explicabo consequatur qui mollitia dolorem tempora accusantium. Rerum libero cum accusantium illum quo.', 3, 7, '1974-12-13 04:20:39', NULL),
(2, 'Quod culpa libero voluptatum qui iure quis natus eius. Libero voluptas possimus debitis voluptatibus.', 12, 13, '1982-02-19 17:58:34', NULL),
(3, 'Deserunt autem at dolore perferendis. Vel qui veritatis laboriosam id reiciendis nesciunt voluptatem. Excepturi saepe quas molestias eos. Voluptas voluptatum ut qui officiis dolore.', 19, 11, '2011-11-04 19:49:09', NULL),
(4, 'Non unde rerum quisquam qui. Quia sapiente unde sunt numquam. Voluptatem quis quia sint ipsum. Id ea saepe non quia ducimus molestiae debitis.', 40, 9, '1986-10-19 12:31:23', NULL),
(5, 'Qui modi odio earum ex esse molestiae expedita. Dolores sint aliquid eaque sed quia. Quo aut vel culpa doloremque consequatur saepe reprehenderit. Aut illum repellendus aut necessitatibus ea molestiae quia. Fuga odio quo beatae quia eius voluptatem.', 19, 20, '1994-04-27 14:28:08', NULL),
(6, 'Nesciunt quis ducimus aut sint architecto. Et eveniet nisi distinctio dolor quaerat est. Eum nostrum iure dolores amet dolorem excepturi. Laudantium repudiandae blanditiis non qui non dolores. Nihil qui officiis sapiente molestiae amet libero corporis.', 28, 10, '1984-02-12 19:37:21', NULL),
(7, 'Excepturi nemo maiores itaque recusandae reprehenderit non. Consequuntur vel non quisquam autem molestiae aspernatur. Ad porro sit earum eum id sunt autem.', 29, 14, '1978-09-26 02:19:43', NULL),
(8, 'Rem et numquam non rerum est suscipit. Ea natus ipsam est sed nisi velit nulla. Sit enim laborum ratione autem minus voluptatem.', 14, 6, '2009-06-04 00:26:20', NULL),
(9, 'Provident nulla natus rerum fugiat deleniti. Eligendi adipisci quas enim et quod illo deleniti. Sit sed numquam maiores aliquid. Est voluptates ut libero dolor nihil.', 9, 7, '1984-04-06 04:38:11', NULL),
(10, 'Est necessitatibus aut aut ab et corrupti eum. Sequi facere et ut officia. Nostrum recusandae molestiae labore doloribus beatae laboriosam architecto. Velit tempora ducimus fugit inventore nostrum.', 16, 17, '2019-10-17 00:54:00', NULL),
(11, 'Et sint molestias iusto cupiditate. Itaque quod dolorum quo repudiandae. Vero blanditiis dolores eum ut recusandae. Officia deleniti autem sit.', 36, 7, '1974-09-21 20:12:55', NULL),
(12, 'Beatae assumenda sit quod quae velit pariatur hic. A nulla facere cumque a. Id asperiores et nesciunt quibusdam esse ratione molestiae praesentium.', 23, 21, '2007-03-24 19:02:23', NULL),
(13, 'Illo sit quod molestiae. Alias autem alias doloremque vel sed maxime deserunt hic. Odit sint recusandae temporibus accusamus dolores. Asperiores nisi corrupti sunt ut eaque quia neque.', 41, 7, '1983-08-05 08:58:32', NULL),
(14, 'Perferendis neque laboriosam cupiditate id. Sapiente quidem ex veritatis qui quo. Deserunt excepturi amet consequatur et. Doloremque et harum tempora est.', 1, 9, '2001-12-07 02:53:06', NULL),
(15, 'Maxime necessitatibus recusandae voluptatem. Nesciunt expedita fugit omnis odio ut minus expedita. Illum non error placeat perspiciatis.', 35, 21, '1974-07-15 10:01:55', NULL),
(16, 'Quis iusto perspiciatis inventore officia. Nam animi totam voluptatem eius qui inventore quia. Nobis a voluptatum atque. Sit dolore eum voluptatum ut consequatur.', 37, 15, '1984-03-30 04:49:30', NULL),
(17, 'Perferendis similique impedit praesentium aut sunt cumque mollitia. Natus reiciendis repudiandae hic vel sint blanditiis veniam.', 19, 11, '1975-05-03 05:07:06', NULL),
(18, 'Eligendi dolorem facere ipsum tempora iusto. Nisi accusantium et repudiandae vel consequatur nihil laudantium. Nam pariatur optio culpa sapiente. Ea aliquam voluptate expedita et.', 14, 9, '2007-07-13 22:34:45', NULL),
(19, 'Temporibus voluptas ullam sit nesciunt sit quae adipisci pariatur. Quia dolores autem voluptas enim illum autem quam. Iste ipsa ad fugit culpa. Provident reiciendis quo dolore ut et nemo.', 28, 1, '1989-09-07 17:35:24', NULL),
(20, 'Consectetur et delectus laudantium ipsa. Tempora provident consequatur qui sunt. Reiciendis nihil rerum voluptas.', 7, 16, '1991-01-15 09:24:21', NULL),
(21, 'Dolorem quis quia beatae provident quo. Consequatur magni deserunt ratione et. Adipisci ex illo eos neque ut est. Omnis distinctio beatae non corrupti.', 36, 21, '2006-08-25 20:42:30', NULL),
(22, 'Suscipit aut velit debitis minus error debitis nisi harum. Omnis et ab occaecati. Quam inventore harum quae minima eaque similique iusto. Culpa eligendi placeat alias.', 33, 14, '1999-08-21 10:24:45', NULL),
(23, 'Nisi fugiat consequuntur adipisci ipsam atque veritatis sit. Aut ut facere voluptatibus similique. Voluptas repudiandae dolorum mollitia suscipit explicabo porro. Expedita id minus mollitia facere necessitatibus omnis.', 32, 20, '1992-05-14 12:08:03', NULL),
(24, 'Temporibus aperiam qui sint voluptatem vel veniam tempora. Temporibus voluptatem tenetur ratione. Autem est velit aut ea. Perspiciatis tempora veritatis amet quos eos vel. Aliquid at possimus quo aut impedit ad.', 40, 14, '1979-12-10 08:30:44', NULL),
(25, 'Qui suscipit voluptas modi. Dolorem beatae corporis architecto sed facilis exercitationem facere. Eos voluptas eaque nobis molestias commodi eveniet. Quia excepturi voluptatem consequatur atque consequatur accusamus assumenda.', 38, 18, '1985-12-20 18:59:25', NULL),
(26, 'Doloribus quas hic placeat est. In sed aliquam eligendi. Occaecati et explicabo sit ut.', 13, 2, '2012-03-07 09:25:03', NULL),
(27, 'Omnis rerum labore eligendi sit. Aut totam saepe tenetur ex dolore ut. Doloremque sed aut et molestiae quae aliquam cum quia. Aliquid deserunt ipsa quisquam quidem vel molestiae non.', 40, 7, '2018-03-13 00:43:58', NULL),
(28, 'A est voluptates veritatis cum vitae. Corrupti tempore et incidunt. Aut magnam necessitatibus ut iste culpa reiciendis exercitationem. Ut soluta ut autem repellat sit.', 3, 11, '1975-01-28 13:22:32', NULL),
(29, 'Fuga ducimus tempora repellendus nihil qui necessitatibus. Numquam maiores ut enim consequatur sit odit provident fuga. Iure quia laborum ratione repudiandae blanditiis enim unde.', 12, 20, '2009-03-17 13:16:24', NULL),
(30, 'Enim repellat labore commodi tenetur voluptatum quas quidem. Quae iusto tenetur sequi voluptatem. Facere unde fuga autem iure tempore minima et. Aut architecto iste numquam quis quo occaecati.', 21, 14, '1994-10-02 02:08:29', NULL),
(31, 'Odit sint dolores quia suscipit nobis aliquid eaque. Nulla voluptatem tenetur quis itaque et et porro. Ab aut quia ut vel sit velit magnam. Et aut dolor distinctio enim nihil cupiditate.', 14, 5, '1997-05-22 07:14:51', NULL),
(32, 'Ullam soluta id ipsa adipisci tenetur nesciunt. Consequatur id est sed quam. Veniam molestiae nemo voluptatem dolorum. Esse odio est rerum accusantium repellendus et.', 22, 8, '2000-01-29 17:27:08', NULL),
(33, 'Quis nihil quae optio expedita commodi ut consequatur omnis. Recusandae molestiae eligendi quidem temporibus laborum consequatur. Non deserunt placeat qui fuga aut. Ut consequatur natus eos non ut.', 19, 13, '1997-04-16 00:44:08', NULL),
(34, 'Molestiae accusantium alias aut iusto. Sequi quis deleniti suscipit ut quam accusantium molestiae. Animi et ducimus illum non.', 27, 8, '1998-09-21 04:47:51', NULL),
(35, 'Eius nesciunt itaque nemo molestias. Enim exercitationem inventore aliquam dolor magnam voluptatem dolores illum. Et et ab laudantium et. Eius ipsum quia rem hic et ab occaecati.', 29, 19, '1971-03-28 06:28:51', NULL),
(36, 'Tempore et nihil porro dicta dolores. Id adipisci soluta quas ut at. Nemo ut qui ut voluptatem enim consectetur aut rerum. Id vitae nesciunt quas possimus.', 37, 11, '2000-07-09 15:44:18', NULL),
(37, 'Aut sed tempore inventore aut qui commodi. Nesciunt et praesentium blanditiis.', 40, 15, '1984-02-06 10:08:23', NULL),
(38, 'Nobis recusandae quasi et molestiae minus magni. Commodi quibusdam et voluptatem numquam maiores beatae et et. Distinctio omnis ea excepturi quia rem id. At cum corrupti earum facilis labore. Laboriosam ad cupiditate ab nam repellat voluptate saepe illum.', 33, 3, '1992-08-14 20:03:26', NULL),
(39, 'Molestias odit dolor eum qui dicta hic est. Optio blanditiis omnis et aut dolorum.', 32, 10, '1980-08-12 20:29:29', NULL),
(40, 'Dignissimos et aut expedita consequatur nam. Quaerat dolorem ut impedit porro dolores. Quas repudiandae ut repellendus voluptatem. Quo ut harum architecto voluptatem dolorem praesentium provident.', 3, 9, '1993-10-02 07:48:37', NULL),
(41, 'Nobis earum quia delectus ratione amet. Consequatur aperiam alias perferendis iure inventore iste.', 23, 16, '1973-10-31 22:03:12', NULL),
(42, 'Voluptates ea nisi eaque quia. Sit nihil debitis optio laboriosam est neque. Est delectus est suscipit eum.', 36, 6, '1983-04-29 12:43:09', NULL),
(43, 'Consequuntur est earum quaerat est. Cupiditate aliquam eius similique nisi odit. Saepe ad maxime voluptatem eum quis consequuntur qui.', 3, 21, '1992-03-24 01:30:17', NULL),
(44, 'Et enim velit blanditiis tempora similique quibusdam. Nostrum perspiciatis minima fugit saepe est modi. Magnam sint sunt rerum.', 16, 21, '1987-09-04 14:09:04', NULL),
(45, 'Alias dolores et fugit quia nihil. Dolor officiis aut quos fugiat est voluptatem. Nihil consequatur est sed cupiditate. Error reprehenderit in minima.', 10, 18, '2001-08-22 07:42:18', NULL),
(46, 'Et suscipit minus quasi et. Voluptate inventore nihil natus totam perferendis eveniet beatae. Commodi delectus sequi consequatur sed ipsum id. Fugit voluptas sed et ea voluptas. Non neque ab nam.', 39, 5, '1989-10-27 06:46:07', NULL),
(47, 'Minima sed nesciunt est eum qui. Repellendus esse minima repellendus culpa tenetur quam. Repellat quas maiores aut sit.', 22, 9, '1993-10-05 05:08:35', NULL),
(48, 'Dolores molestias aut nostrum ut. Iure tempora ipsa temporibus voluptates sed omnis. Ad voluptatibus alias repudiandae ratione voluptatem qui et. Non quibusdam et ab fuga natus. Quia ipsum deserunt eos dignissimos.', 38, 11, '1990-06-04 05:26:46', NULL),
(49, 'Labore repudiandae hic qui culpa. Itaque aut laboriosam quisquam quasi qui commodi hic labore. Doloribus sed eaque voluptatem et harum. Praesentium temporibus quos qui non qui nam rerum qui. Voluptate debitis et qui nihil recusandae.', 33, 8, '1996-12-15 14:42:01', NULL),
(50, 'Et expedita vitae aut perspiciatis blanditiis eum. Tenetur fugiat odio voluptates consequatur. Rerum quaerat ad culpa dolore dolore nemo aut.', 1, 7, '1986-03-15 07:40:17', NULL),
(51, 'Et eaque non et deleniti id vel sed. Et odio ducimus et cupiditate. Repellendus iusto in id quia sit quas. Quia enim cumque voluptas fuga.', 13, 5, '2002-04-06 17:10:45', NULL),
(52, 'Ut nostrum dolorum et ut dolorem dolor. Consequuntur exercitationem quia perspiciatis officiis vel deleniti qui totam. Illum deserunt consequatur sed aut. Omnis minus voluptatibus cupiditate voluptas quibusdam.', 36, 19, '1979-04-21 12:57:12', NULL),
(53, 'Facilis et ut pariatur qui similique rem ipsa. At non consequuntur facere. Sint dolore maxime aut sed. Consequuntur voluptate in laborum sit at.', 19, 2, '1998-09-03 12:15:20', NULL),
(54, 'Sit aut accusamus dolores quae velit consectetur est. Ratione eligendi sit earum qui corrupti voluptate enim. Omnis sit quam et aliquid dolores exercitationem.', 32, 18, '1992-10-12 07:49:41', NULL),
(55, 'Doloribus et eos asperiores ad voluptas nisi quia. Aut dolor deserunt unde qui. Saepe vel ut repudiandae praesentium.', 17, 5, '2009-12-04 02:52:02', NULL),
(56, 'Voluptatem rerum assumenda adipisci autem. Repellat et et aperiam. Reiciendis ut rem aut est enim aut.', 23, 13, '2002-08-21 19:13:24', NULL),
(57, 'Ea et est iusto iure. Repellat corporis incidunt minima a. Sed eum et enim et velit.', 9, 14, '1982-05-16 12:27:14', NULL),
(58, 'Aliquam ut quaerat ad veritatis veniam. Laborum asperiores nisi voluptate accusantium et necessitatibus expedita vel. Voluptates voluptas deserunt quidem esse esse sint. Ut explicabo nemo magni porro.', 13, 16, '1999-07-11 11:23:30', NULL),
(59, 'Ut quis cupiditate consequatur. Qui vero quis dolorem vero omnis. Et eum libero esse quas molestiae.', 31, 9, '2010-11-27 16:04:37', NULL),
(60, 'Asperiores voluptas eum animi et ea et omnis. Tempore sed et quod aliquid.', 29, 11, '2020-01-13 17:10:13', NULL),
(61, 'Dolores quia et consequatur consectetur in quibusdam blanditiis. Non id commodi omnis reiciendis qui vitae quis et. Quod in nulla modi quia non natus. Quibusdam repudiandae nisi repudiandae nobis atque in provident.', 26, 2, '1993-04-02 14:59:34', NULL),
(62, 'Esse at laborum sed non sed. Quas porro omnis illo sunt quibusdam quasi.', 17, 12, '2014-11-18 23:59:27', NULL),
(63, 'Dolorem quibusdam reprehenderit perferendis labore. Exercitationem facilis temporibus adipisci blanditiis. Labore qui sed sit. Necessitatibus temporibus quia fuga et magni et. Omnis pariatur et et repellat ex quibusdam id.', 37, 21, '1992-01-14 09:24:02', NULL),
(64, 'Et accusamus aut non voluptas eos. Ratione provident distinctio voluptatem consequatur debitis molestiae. Omnis deserunt qui laborum aperiam. Rem aut veritatis ut qui ea voluptatem.', 7, 21, '2010-11-26 04:21:48', NULL),
(65, 'Nostrum quasi non sit quidem eligendi voluptatem. Ut ut qui magnam delectus. Assumenda dolorem et qui quasi eius amet libero.', 40, 3, '1977-06-24 00:59:22', NULL),
(66, 'Deserunt omnis dolores ea. Ipsam dolores consequatur omnis sit. Recusandae culpa aspernatur minus sed voluptatum. Dolores quam sint eius. Quas ut nisi rerum minus ullam.', 32, 3, '1971-11-10 12:32:59', NULL),
(67, 'Aut iusto velit fuga illo et laboriosam accusamus. Eius corporis excepturi architecto. Sequi ut consectetur corrupti in iusto. Quas aliquam accusamus dignissimos error officia. Ratione dolorem repellendus ut eligendi et et laborum ut.', 17, 11, '1979-01-12 10:50:08', NULL),
(68, 'Laboriosam corrupti ipsum aut exercitationem voluptate. Esse quia asperiores non occaecati consequatur perspiciatis non.', 19, 5, '2003-10-19 06:47:32', NULL),
(69, 'Aspernatur illo porro quia voluptatem perferendis deleniti. Aut doloribus rem qui occaecati. Laboriosam excepturi earum voluptas sint. Quod ab provident voluptas.', 17, 18, '1992-04-29 18:23:31', NULL),
(70, 'Dolor incidunt at sint earum non quis. Sunt quidem atque voluptas consequatur excepturi reprehenderit quidem ipsa. Nisi ex ullam aliquam impedit voluptatibus.', 21, 4, '2018-06-23 12:37:17', NULL),
(71, 'Inventore doloremque dolores non veniam voluptates dolores et. Maiores sequi rerum laudantium quo. Culpa dignissimos laborum dolorem quasi qui suscipit et.', 35, 9, '1997-04-27 03:18:55', NULL),
(72, 'Cum qui vitae sit qui quis. Similique quia eligendi necessitatibus aspernatur facilis. Et tempora magni et ipsam aliquam illo corporis ut.', 32, 1, '1984-07-09 23:28:31', NULL),
(73, 'At sint id hic labore magnam sit. Aut facere enim est. Veritatis deleniti fugiat culpa eos earum voluptatum pariatur. Qui et culpa tenetur quia doloremque enim qui.', 2, 15, '2019-01-28 07:11:31', NULL),
(74, 'Amet in illo impedit recusandae inventore sint pariatur. Est voluptatem consequatur rerum at sed accusamus rerum eaque. Dolor aut dolorem voluptatibus accusantium dolore occaecati. Sequi blanditiis dolorem voluptatibus architecto quis quo commodi.', 18, 7, '1973-05-05 16:22:14', NULL),
(75, 'Dolor perspiciatis enim eaque repudiandae sint vel. Non quae inventore aut laudantium facere voluptate porro maiores. Sint tenetur facilis explicabo non. Quae perferendis est cupiditate tenetur modi odio. Dolore velit similique quis nobis dignissimos.', 31, 5, '2001-07-21 02:48:54', NULL),
(76, 'Explicabo odio iste cupiditate aliquid. Placeat atque non molestias molestiae odio eum.', 36, 5, '1997-05-01 11:43:20', NULL),
(77, 'Et sit ut accusamus placeat. Magni hic ut et voluptatem quas magni et expedita. Voluptatem numquam et reiciendis ullam asperiores. Quasi animi occaecati consequatur consectetur sunt sed. Aliquid accusantium doloremque aspernatur ab illo culpa illo.', 40, 7, '2015-12-07 01:32:04', NULL),
(78, 'Et quo eos voluptas aspernatur. Ea nisi quis praesentium non. Qui consectetur rerum nobis dolorem animi odio dolor possimus. Corrupti esse perferendis reiciendis ut voluptatem.', 8, 11, '2009-11-18 21:51:51', NULL),
(79, 'Officiis accusantium facilis modi. Repellat at libero veniam eligendi pariatur itaque. Accusamus consectetur aliquid quidem.', 30, 12, '1973-05-23 01:56:26', NULL),
(80, 'Et eum aut blanditiis doloribus perspiciatis distinctio. Quis quia dolores sequi ipsam et ut. Voluptatem expedita omnis aut eaque et.', 18, 6, '1998-05-02 05:25:08', NULL),
(81, 'Omnis dicta veniam culpa et reprehenderit qui. Ea ducimus veniam tempora id ratione temporibus occaecati. In aut praesentium placeat necessitatibus cupiditate. Quaerat labore sint officiis doloremque est.', 28, 1, '2003-04-04 20:04:04', NULL),
(82, 'Ea doloremque dolor totam rerum. Facilis velit consectetur provident consequatur. Rerum ut quos quia labore adipisci ut. Fugiat modi qui quibusdam doloremque ut reiciendis officiis.', 30, 7, '1972-09-24 04:51:11', NULL),
(83, 'Sit est enim a quos et ratione perferendis. Ad et repudiandae facilis qui exercitationem. Reprehenderit quasi eos quas dolores at suscipit.', 15, 3, '1988-12-02 06:56:25', NULL),
(84, 'Pariatur minus sit recusandae quia non. Aliquam qui tempora facere quasi mollitia repellat.', 26, 9, '1993-10-28 07:22:54', NULL),
(85, 'Aut soluta laborum minus dignissimos occaecati. Beatae voluptas molestias quibusdam quibusdam quia et deleniti. Beatae quibusdam sit laudantium consequuntur suscipit eligendi quis.', 23, 11, '1988-12-11 16:57:56', NULL),
(86, 'Tempore voluptatem voluptatibus exercitationem reiciendis quo. Eum consequatur eos cumque atque illum sunt sint. Sapiente praesentium impedit nulla doloribus beatae nihil. Possimus pariatur consequatur necessitatibus quidem vero molestiae molestiae.', 5, 15, '2013-12-18 13:29:08', NULL),
(87, 'Sed ab et mollitia porro repudiandae. Sint non odit rem. Animi numquam dolores quia ut occaecati. Eos nihil et unde reprehenderit ad molestiae. Rerum vel quaerat suscipit non sit porro ab.', 22, 12, '1986-05-16 20:13:00', NULL),
(88, 'Aut deserunt debitis eos esse consectetur officia. Saepe amet voluptatem beatae ad veritatis sint.', 7, 19, '2003-06-07 16:18:44', NULL),
(89, 'Ipsam ullam error corrupti quo maiores eos. Quos culpa ut velit maiores. Veritatis asperiores aliquid eum repudiandae asperiores inventore. Rem alias non omnis.', 35, 6, '1971-03-13 07:11:53', NULL),
(90, 'Itaque sit ut et aperiam culpa quidem eum magnam. Architecto assumenda maxime quas accusamus reiciendis nostrum.', 19, 10, '2002-07-09 00:13:08', NULL),
(91, 'Cumque voluptate quidem voluptas praesentium aut est repellat. Eius molestias quas ea aut. Incidunt cumque rerum nemo dolorem quia aliquam dolorum.', 20, 2, '2019-02-19 20:37:38', NULL),
(92, 'Recusandae eius praesentium laudantium reiciendis saepe impedit natus. Aut et aliquam aut reprehenderit aspernatur a. Dolore quos voluptatum quos tempore dicta necessitatibus. Et neque ipsum velit.', 29, 19, '2010-11-03 09:20:59', NULL),
(93, 'Voluptatum ut et corporis voluptatem consequatur. Omnis excepturi nam et veritatis reprehenderit in. Est iste sed sit iure. Saepe qui ea iure officia delectus aut dolorum quasi.', 26, 8, '2019-08-22 07:54:33', NULL),
(94, 'Eos perferendis voluptatem et maiores. Odit totam est tempore quas rerum voluptatem. Error nostrum reiciendis maxime autem consectetur ut consequatur. Optio similique odit omnis quod aspernatur quo.', 8, 18, '2006-03-31 02:26:49', NULL),
(95, 'Commodi sit ut corrupti laudantium provident. Ea et suscipit dicta eos nulla est ducimus.', 25, 20, '1978-10-25 06:13:59', NULL),
(96, 'Tenetur iure earum totam iusto nihil. Repellendus dolore enim aliquam labore. Reiciendis adipisci tenetur commodi quia quibusdam in itaque. Officiis quae alias est perspiciatis atque labore.', 12, 20, '1996-06-16 22:38:07', NULL),
(97, 'Ut qui autem voluptatibus. Totam corrupti culpa quasi iure. Quisquam esse sed minima dolor laborum. Quos ea quos est.', 19, 13, '1991-04-29 00:54:10', NULL),
(98, 'Libero placeat et sint doloribus hic repudiandae. Ea aut non voluptatem accusamus. In et voluptatum quidem adipisci suscipit rerum dolorem.', 12, 16, '1975-05-31 12:01:37', NULL),
(99, 'Tempora est in atque aspernatur eos. Qui modi at aspernatur voluptate iure. Aut eligendi corporis et debitis amet in.', 31, 6, '1998-05-28 05:52:45', NULL),
(100, 'Vero quo iure culpa iure ut consequatur. In vero quibusdam rerum omnis ad eaque inventore. Quidem ea magnam non possimus ea. Eaque quidem veritatis qui totam modi est aut porro.', 7, 4, '1973-10-31 03:25:50', NULL),
(101, 'Voluptatum voluptatem rem quia repellendus asperiores numquam ex. Odit amet voluptates et. Dignissimos neque rerum debitis non quidem possimus et.', 29, 20, '1991-12-08 17:14:55', NULL),
(102, 'Quaerat possimus dolor odit voluptas dolores sed. Eum dignissimos sapiente aliquam. Eos deleniti exercitationem rerum adipisci voluptas. Hic dignissimos et nulla impedit maxime.', 16, 7, '1989-08-28 21:20:52', NULL),
(103, 'Ut officiis eum officiis. Suscipit veniam reiciendis vel. Sunt error voluptatem laboriosam quia culpa. Maxime eos nemo voluptas iste voluptatem impedit dicta.', 41, 13, '2009-03-30 08:09:15', NULL),
(104, 'Dignissimos quia inventore voluptatem itaque similique sunt. Libero porro amet laboriosam rem quis nostrum ullam. Provident accusamus necessitatibus asperiores architecto. Velit culpa et nostrum voluptates. Sed quo voluptates eligendi voluptatem a similique sit ut.', 24, 15, '1996-06-24 17:38:40', NULL),
(105, 'Accusamus quo quo laudantium voluptas assumenda qui quam velit. Autem id doloribus temporibus nisi nihil dolorem dolorem nihil. Similique non reiciendis quo aliquam ipsum.', 1, 13, '2008-04-27 17:06:05', NULL),
(106, 'Iste doloribus dolorem amet. Dolor exercitationem blanditiis eius impedit totam eos mollitia. Iste eos delectus rerum vel quia perferendis.', 31, 11, '1974-06-18 07:48:49', NULL),
(107, 'Eos aspernatur est excepturi delectus. Quam praesentium voluptatem eius non error. Ducimus reprehenderit sint et deleniti consequatur rerum amet qui.', 27, 10, '1998-10-23 21:23:56', NULL),
(108, 'Qui alias eius recusandae qui ipsam molestias distinctio amet. Sed hic repellat magni autem earum est exercitationem. Qui numquam atque accusantium inventore eos reprehenderit nihil iusto.', 1, 3, '1981-01-25 05:22:45', NULL),
(109, 'Dolores voluptatum iste quia dolor ut atque libero. Cum qui magnam voluptates. Esse unde ratione iure.', 12, 9, '1992-08-09 18:44:32', NULL),
(110, 'Aliquam exercitationem odio accusamus voluptatem commodi rerum. Assumenda tenetur recusandae eaque aliquid enim est excepturi voluptas. Sapiente error distinctio consequuntur nobis dicta et itaque dolores.', 9, 14, '1994-09-04 07:24:48', NULL),
(111, 'Ut numquam voluptas vel beatae suscipit deserunt. Nihil natus iste repellendus voluptas. Ea adipisci veritatis in ratione at enim voluptatem. Asperiores in quia eaque dolores.', 11, 13, '1972-09-21 10:42:48', NULL),
(112, 'Quo ut veniam voluptatibus quidem quisquam fugit ducimus. Aspernatur occaecati pariatur et dolorem pariatur aperiam quo dolore.', 22, 2, '1985-11-30 19:16:49', NULL),
(113, 'Quasi sequi enim possimus nobis. Facere et autem sit quaerat. Hic beatae et et harum qui.', 3, 8, '1973-09-02 15:53:16', NULL),
(114, 'Corrupti in consequatur molestias cupiditate minima. Quae est debitis debitis quam quis libero. Deserunt dolorem laudantium officiis doloremque. Et voluptatum doloremque natus temporibus ex sed.', 16, 17, '1972-05-30 01:58:18', NULL),
(115, 'Officia qui harum voluptatum error quibusdam qui. Qui assumenda corrupti porro. Voluptates repudiandae error sed modi iure. Placeat nihil sit praesentium consequatur sed.', 14, 20, '2003-11-20 13:47:06', NULL),
(116, 'Nihil quaerat sed qui enim illum dicta. Qui eum id perferendis accusamus blanditiis tempora. Pariatur et occaecati eaque non aut ducimus a. Ut sint quis est et nostrum.', 18, 21, '1992-06-26 05:02:20', NULL),
(117, 'Officiis inventore consequatur reprehenderit fuga velit aperiam. Quia praesentium quis debitis aliquid impedit. Eveniet id ut et qui dolorem.', 3, 1, '1970-04-15 18:59:40', NULL),
(118, 'Dolor vel repudiandae molestias officia. Ut sunt inventore ea dolorem quod eum. Distinctio voluptatem mollitia consequatur maxime placeat et tempore.', 12, 21, '1998-11-21 23:51:39', NULL),
(119, 'Exercitationem provident dolores dolor. At vitae nam odit eos officia est quos aut. Error iure voluptas ex possimus ducimus natus deserunt.', 3, 8, '1997-10-04 14:33:56', NULL),
(120, 'Et qui sit possimus. Temporibus eos sed quia. Perspiciatis provident consequatur quidem. Nesciunt qui labore officia quia.', 13, 13, '1986-03-04 09:07:04', NULL),
(121, 'Esse et voluptatem rerum occaecati. Occaecati velit dolore omnis laudantium iure. Facere et enim tenetur magni ipsum a.', 13, 10, '1979-12-01 12:01:16', NULL),
(122, 'Consectetur est quam qui dolores eius necessitatibus. Fuga tenetur iusto aut consequatur et deleniti. Minima necessitatibus accusantium totam molestiae at. Totam sunt quia aliquid praesentium.', 31, 10, '2000-10-26 21:54:46', NULL),
(123, 'Nulla explicabo itaque labore adipisci ut velit sint. Quisquam esse aut mollitia explicabo asperiores. Dolores illo repellendus maxime quam sint iusto voluptatem sapiente.', 12, 16, '1975-09-04 10:48:04', NULL),
(124, 'Cum error quia itaque dolores esse velit quis. Veniam neque architecto nam sit qui et unde blanditiis. Libero animi rerum velit.', 40, 4, '1999-11-01 03:13:55', NULL),
(125, 'Esse quos et qui. Quam et occaecati quos quidem fuga tempora provident. Aspernatur qui ipsa qui qui. Enim magnam eos dolorum non.', 6, 6, '2015-03-19 07:10:49', NULL),
(126, 'Qui alias tempora omnis commodi officia. Sunt assumenda non et est laborum. Sunt enim consequuntur sit assumenda corporis alias nihil.', 8, 20, '2016-02-01 05:21:18', NULL),
(127, 'Quidem aut aut nemo eaque similique est aut eligendi. Id voluptas itaque dolorem iste et quia. Distinctio eaque et modi fuga enim magnam.', 40, 8, '1999-09-14 11:22:10', NULL),
(128, 'Est nam perferendis error velit. Dolorum tempora temporibus quod ea ipsa sed vel. Ipsa quos consequatur et omnis labore. Aperiam modi aperiam ex magnam minima iusto.', 39, 19, '1998-08-12 20:23:07', NULL),
(129, 'Hic voluptatem nisi eaque aut eum eveniet occaecati. Autem pariatur tempore ut perferendis. Nulla earum repellat ut sit fugiat et.', 26, 16, '2014-12-05 05:15:59', NULL),
(130, 'Molestiae odit voluptatibus ut aut veniam et. Velit quaerat debitis reiciendis et hic ab vero.', 17, 8, '1995-06-25 07:38:25', NULL),
(131, 'Molestias quod laboriosam velit in. Sit eligendi mollitia doloremque sit quam molestiae. Magni id qui omnis eaque ratione et dolores. Quibusdam et itaque dolore eos officiis.', 39, 11, '1971-04-09 05:22:03', NULL),
(132, 'Sed mollitia et alias fugiat facere qui voluptatem. Mollitia eos in illum et ut consequuntur vero. Est voluptatum voluptas quos et dignissimos. Optio odio omnis itaque eius saepe consequatur.', 30, 11, '1975-12-12 13:51:42', NULL),
(133, 'Quas omnis voluptates vel dolores fuga. Repudiandae velit accusamus eos consequatur. Autem optio sit iure adipisci.', 7, 19, '1979-06-15 05:49:04', NULL),
(134, 'Necessitatibus vero accusantium quidem consequatur qui. Sit sunt delectus et est. Explicabo accusantium molestiae ut voluptatem nemo.', 13, 1, '1974-08-13 17:40:14', NULL),
(135, 'Molestiae aut accusantium et ut. Error esse rerum qui. Iste et id delectus velit. Labore vitae eaque dolorum et quis.', 26, 2, '1986-03-16 22:23:41', NULL),
(136, 'Sint itaque ad libero velit et. Sequi similique nam voluptatem magni est. Eligendi voluptatem dignissimos consequuntur ab. Architecto et culpa temporibus quibusdam rerum quis id. Non qui maiores fugit corporis nisi.', 32, 12, '2008-08-02 10:42:54', NULL),
(137, 'Aperiam velit et impedit non dolorem qui illo. Quia temporibus laudantium nam qui voluptas unde quasi quaerat. Atque adipisci molestias qui. Sit doloribus autem aut explicabo. Sequi temporibus pariatur quasi doloremque.', 9, 20, '1986-10-04 19:23:32', NULL),
(138, 'Quis velit repellat fugit similique. Dolorem sequi officiis veritatis est perferendis voluptas dolor. Rerum quaerat voluptatem ipsa voluptate suscipit voluptatem sint aut. Et necessitatibus sapiente quos cumque quasi.', 12, 6, '2018-04-09 07:19:33', NULL),
(139, 'Maiores suscipit est eius sit ullam. Ut vero cum est minima natus ut sequi. Quaerat adipisci ducimus quos vero veniam totam.', 28, 5, '2006-07-04 19:24:33', NULL),
(140, 'Totam cupiditate aut quisquam non sint porro. Quas tempora blanditiis consequatur alias saepe unde dolores. Fuga dolorem autem fugiat fuga quidem distinctio. Id alias natus ad voluptatibus placeat est vero consectetur.', 2, 21, '1998-01-26 20:43:25', NULL),
(141, 'Laudantium omnis unde sequi labore qui. Eos amet eum et. Tenetur quas deleniti et ipsam nulla. Repellat laudantium consequatur velit fugit dolor officiis.', 26, 5, '2001-09-16 05:12:49', NULL),
(142, 'Exercitationem accusamus corporis maxime nihil voluptatibus aspernatur inventore molestiae. Hic et eius deleniti ut quod iusto quisquam dolores. Velit illum quas placeat et hic. Necessitatibus odit repellendus et atque.', 6, 19, '2012-12-01 16:47:15', NULL),
(143, 'Tempora dolorum libero aut fuga laborum placeat. Magnam optio voluptatum commodi ea numquam quo aut. Nulla rerum consequatur incidunt nihil officia est.', 2, 17, '2012-07-13 17:10:50', NULL),
(144, 'Quis aut et et tempora nobis aut dignissimos. Tempora et aut aut error. Atque sed repellat voluptatibus voluptatem vitae. Quaerat sed rem qui dicta ipsam.', 35, 12, '2002-09-24 09:53:38', NULL),
(145, 'Ea similique iure quidem perspiciatis. Aut officiis rerum omnis quia ex vel et.', 10, 19, '1988-09-02 08:48:36', NULL),
(146, 'Ut totam sit molestiae quisquam placeat illo. A alias aut qui. Officia nihil sint laborum omnis deserunt. Labore aut qui et alias deleniti.', 14, 2, '1995-08-03 00:23:28', NULL),
(147, 'Id et voluptas quae aut. Excepturi doloribus enim officiis asperiores a. Laborum dignissimos saepe commodi inventore sunt optio.', 36, 21, '2009-07-23 12:01:21', NULL),
(148, 'Est voluptate est similique ducimus et nesciunt veritatis harum. Nisi ut error itaque officia sunt voluptatem nihil eligendi. Nihil voluptates qui vitae pariatur nam. Architecto expedita velit praesentium nulla dolore ut quasi.', 38, 16, '1982-02-22 09:55:28', NULL),
(149, 'Harum magnam fuga qui consequatur ut eligendi voluptas eius. Nostrum autem accusamus consequatur ratione aut et. Vero quia enim officia error nihil ut. Quibusdam cum odio quia saepe.', 25, 7, '1972-09-30 17:00:04', NULL),
(150, 'Tempore nobis ut mollitia sint totam numquam. Et in quia nobis est occaecati. Hic ipsum esse non impedit quas facilis.', 9, 8, '2012-11-15 10:37:04', NULL),
(151, 'this is new post comment', 2, 1, NULL, NULL),
(153, 'asadasdasd', 41, 22, '2020-06-15 15:20:11', NULL),
(154, 'new comment ........', 42, 1, '2020-06-16 19:54:52', NULL),
(155, 'the new user comment on this post', 42, 22, '2020-06-16 19:56:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_breif_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_stock` int(10) UNSIGNED NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_product.jpg',
  `additional_info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_breif_description`, `product_long_description`, `product_code`, `product_price`, `product_stock`, `product_image`, `additional_info`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `slug`) VALUES
(1, 'Xiaomi A1915 Amazfit Bip Lite Touch Bluetooth Smart Watch Black (Global Version)', 'Model: A1915 Amazfit Bip Lite (Global Version)\r\nPPG heart-rate & 3-axis acceleration sensor\r\nLightweight smartwatch\r\n45-day Battery Life\r\nSwim Proof with 3 ATM', 'Xiaomi Amazfit Bip Lite Smart Watch is comes with Global Version. This smart watch is Fit Longer which powered for 1.5 month to keep up with your active lifestyle. That save the trouble of frequent charging with the whopping 45 days battery life on a single charge to keep up. And also. if this watch use only for steps counting and sleep monitoring on, the watch can last up to 4 months.The watch is Swim Proof with 3 ATM, the watch can resist to any of your daily activities and can even be worn while swimming (up to 30 meters’ water pressure). This Smart watch is comes with Ultra Lightweight and comfortable and the weight is about 32g, that including a highly stretchy and light strap make the watch comfortable to wear day & night and during sports. This Smart watch\'s display is built with Transflective Screen, Readable Under Intense Sunlight with the 1.28‘’ reflective always-on display, your health & sports data can be seen clearly even under bright sunlight by simply raising your hand. In this smart watch, the Corning Gorilla glass and anti-fingerprint coating make it scratch resistant and easy to keep clean.', 'IR: 1001', 4200.00, 5, '1.jpg', 'Display	- 1.28-inchAlways-On display,\r\n- Reflective 8 Color TFT\r\n- Resolution: 176x176\r\n- Corning Gorilla 3 reinforced glass\r\n- Anti-fingerprint coating\r\nBattery	- Battery200mAh lithium-polymer battery\r\n\r\n- Battery life:\r\nUsage time: Up to 45 days in a typical use scenario\r\nStandby time: Up to 120 days\r\n- Charging time: ~ 2.5 hours\r\nConnectivity	Bluetooth 4.1 BLE\r\nMaterial	Wristband type and material: Quick release, silicone\r\nWatch body material: Polycarbonate casing\r\nSpecialFeatures	Accessories: USB charger and user manual\r\nSensors: PPG heart-rate sensor3-axis acceleration sensor\r\nWaterproof grade: 3 ATM (up to 30 meters water depth)\r\nDial diameter: 43mm\r\nWristband width: 20mm\r\nWristband length: 11 + 8.5cm\r\nAPP: Amazfit APPIOS: Apple Music, Spotify, SoundCloud\r\nSupported devices: Devices with Android 4.4 or iOS 9.0 and above\r\nExterior\r\nWeight	32g (including strap)\r\nColor	Balck', 1, '2020-06-03 20:36:02', '2020-06-04 14:48:47', NULL, 'xiaomi-a1915-amazfit-bip-lite-touch-bluetooth-smart-watch-black-global-version-mczti'),
(2, 'Xiaomi Amazfit A1818 Verge Lite Touch Bluetooth Gray Smart Watch (Global Version)', 'Model: Amazfit A1818 Verge (Global Version)\r\n1.3-inch AMOLED display with a panoramic view\r\n20-day Battery Life\r\nCustomized Vibrations\r\nSmart Notifications', 'Xiaomi Amazfit Verge Lite Smart Watch is comes with Global Version. This smart watch has AMOLED Display & 20-day Battery Life. In this smart watch, The display has always been a crucial part of any smartwatch. That\'s why the AMAZFIT Verge Lite features a 1.3-inch AMOLED display with a panoramic view of all important information, and the lively colors deliver a crystal-clear viewing experience. The Smart watch has low-power consumption sensors and an optimized algorithm, which enable a 20-day1 battery life. You can also travel without a charger and never worry about the battery. With the built-in ultra-low power Sony 28nm GPS chip, the watch will achieve a 40-hour lifetime with the continuous GPS mode on. This exclusive smart watch has, multiple sports modes that can fully tap your potential and the real-time data during your exercise will help you develop good habits.The GPS+GLONASS dual-mode positioning makes the search for satellite signals fast and accurate to track your routes and distances while running, walking or cycling. This smart is equipped with high-precision optical sensors and professional algorithms, so it supports full-day automatic heart-rate detection and the daily heart rate zone can be a guiding metric for better exercise. It also supports heart-rate warning, the watch will vibrate when it detects a heart rate that exceeds the warning value. This smart watch is built with so many special features, like- Sedentary Reminders, Sleep Tracking, Customizable Watch Face, Music Control, Silent Alarms With Customized Vibrations, Event Reminder, Smart Notifications of emails, messages and other smartphone apps directly on the screen of your AMAZFIT Verge Lite, Comfortable Wristband With Fashionable Touch.', 'IR: 1002', 9500.00, 4, '2.jpg', 'Display	1.3-inch AMOLED\r\nResolution: 360 x 360\r\nCorning Gorilla 3 reinforced glass\r\nAnti-fingerprint coating\r\nBattery	390mAh lithium-polymer battery\r\nBattery life: More than 20 days in typical use scenarios\r\nConnectivity	Bluetooth 5.0 BLE\r\nMaterial	Wristband materials: Silicone + polycarbonate\r\nWatch body material: Glass fiber and reinforced polycarbonate\r\nSpecialFeatures	Supported devices: Devices with Android 4.4 or iOS9.0 and above, and with Bluetooth 4.0 and above\r\nWaterproof grade: IP68\r\nExterior\r\nDimension	Package size (L x W x H): 16.00 x 10.00 x 4.00 cm / 6.3 x 3.94 x 1.57 inches\r\nWeight	Product weight: 0.0460 kg\r\nPackage weight: 0.2750 kg\r\nColor	Blue/Gray', 1, '2020-06-03 20:36:55', '2020-06-04 14:48:37', NULL, 'xiaomi-amazfit-a1818-verge-lite-touch-bluetooth-gray-smart-watch-global-version-onyq6'),
(3, 'Apple Smart Watch Series 3 (MQL12LL/A) 42mm - Space Gray', 'Model: MQL12LL/A\r\nAluminum Chassis with Ion-X Glass\r\n1.65\" 390 x 312 1000-Nit Display\r\nActivity and Heart Rate Monitoring\r\nChangeable Faces with Widgets', 'Apple MQL12LL/A Smart Watch connects to your iPhone via Bluetooth 4.2 and displays notifications, apps, and more on its 1.65\" OLED Resolution (312 x 390) display. It can also connect directly to the Internet thanks to 802.11b/g/n Wi-Fi. The internal battery lasts for up to 18 hours of normal use and is recharged with an included inductive magnetic charger. It has 768 MB Ram , 8 GB Storage capacity, Apple S3 Dual-Core CPU,Accelerometer, Altimeter, Barometer, Compass, Gyroscope, Heart Rate, Light Sensor. In additional,Apple Watch senses how much pressure you use when you tap on its face, adding a new dimension to the ways you can interact with it. Press firmly to see additional controls, change watch faces, and more.You Can Connect with other Apple Watch  with Digital Touch. Users can send drawings with Sketch, gentle tap patterns with Tap, and even your heartbeat.Take a call with your Apple Watch\'s built-in speakerphone or transfer it to your iPhone.Activating your Apple Watch requires your iCloud Apple ID and password, so your information will stay safe even if your Watch is lost or stolen.', 'IR: 1003', 32500.00, 3, '3.jpg', 'CPU	Apple S3 Dual-Core\r\nGPU	PowerVR\r\nRam	768 MB\r\nStorage	8 GB\r\nSensors	Accelerometer, Altimeter, Barometer, Compass, Gyroscope, Heart Rate, Light Sensor\r\nOperating System	watchOS 4.0\r\nBattery	Normal Use: Up to 18 hours\r\nDisplay\r\nDial Shape	Rectangle\r\nDial Size	1.65\" / 41.9 mm\r\nTechnology	OLED\r\nResolution	312 x 390\r\nBacklight	326 ppi\r\nConnectivity\r\nWi-Fi	Wi-Fi 4\r\nBluetooth	4.2\r\nGPS	Yes\r\nPhysical Dimension\r\nCase Dimensions	42.5 x 36.4 x 11.4 mm\r\nWeight	1.1 oz / 32.3 g\r\nMaterial	Aluminum\r\nCrystal Material	Aluminosilicate Glass\r\nWater Rating	5 ATM', 1, '2020-06-03 20:38:02', '2020-06-04 14:48:28', NULL, 'apple-smart-watch-series-3-mql12lla-42mm-space-gray-x4nic'),
(4, 'Gamdias EROS E2 Gaming Headphone', 'Model: Gamdias EROS E2\r\n40 mm drivers provide realistic sounds\r\nMulti-color Breathing Lighting\r\nOmnidirectional Flexible Microphone\r\nQuick access Controller', 'Gamdias EROS E2 Headphone 40 mm HD driver unit – 40 mm drivers provide realistic sounds effect and rich bass.Multi-color Breathing Lighting - Unique lighting effects for gaming headset.Best for console gameplay – Support PS4 and XBOX Omnidirectional Flexible Microphone - with noise-cancelling function can be adjusted to your preference. Oversized ear cups are designed to fit around most ears without applying pressure on soft tissues.Quick access Controller. This exclusive Gaming Headphone has 01 year warranty.', 'IR: 2001', 1650.00, 5, '4.jpg', 'Dimensions	182 x 90 x 231 mm\r\nCable Length	2.0m\r\nTechnical Specification\r\nDriver Magnet	NdFeB\r\nImpedance	32 Ohm + / ​​- 15%\r\nSensitivity	118±3dB\r\nInput Jack	USB for powering lighting + 3.5mm Stereo\r\nDriver Diameter	40mm\r\nConnectivity	Wired\r\nOther Features\r\nSystem Requirements	Application UI- No\r\nWarranty Information\r\nManufacturing Warranty	01 Year\r\nMicrophone\r\nMicrophone Size	Φ4*1.5mm\r\nSensitivity	-42db±3db\r\nPick-up Pattern	Omnidirectional', 2, '2020-06-03 20:39:45', '2020-06-04 14:48:21', NULL, 'gamdias-eros-e2-gaming-headphone-aw3dz'),
(5, 'Logitech G PRO 3.5mm Single & Dual port Gaming Headphone Black', 'Model: Logitech G PRO\r\nPRO-G Drivers\r\nNoise Isolation: up to 16DB\r\nFrequency response: 20 Hz-20 KHz\r\nPRO-GRADE Condenser Microphon', 'Logitech G PRO Gaming Headset is built with the highest quality materials and advanced technologies to provide audio performance that is second to none. You can hear everything with greater precision, from quiet footsteps to gunshot audio signatures to voice comms. Hybrid-mesh Pro-G audio drivers solve common distortion problems to deliver booming bass and precise clarity. In this headset, the Premium leatherette ear pads were selected for Logitech G PRO Headset to create a seal around the ears for improved passive noise isolation. you will get incredible comfort with soft foam padding and reduce distractions with up to 50% more sound isolation than other ear pads and lso included in the package are soft micro suede ear pads. This Gaming Headset is compatible with Windows 10 surround sound features like Windows Sonic for headphones and Dolby Atmos for headphones for accurate positional audio and the directional audio combined with exceptional clarity provides precise awareness of everything that\'s happening around you. This G PRO Headset performs with wider frequency response, lower signal to noise ratio and higher sensitivity. PRO headset is built to be extremely lightweight, strong and extremely comfortable. To achieve that, PRO headset uses advanced materials including TR90 nylon in the headband, stainless steel sliders, and glass fiber reinforced nylon joints. The lightweight construction with polymer shell and fork is perfect for long periods of wear and competitive gaming. This stylish headset comes with 02 years of warranty.', 'IR: 2002', 10000.00, 5, '5.jpg', 'Dimensions	Height: 172 mm\r\nWidth: 81.7 mm\r\nDepth: 182 mm\r\nWeight	(w/o cable): 259 g\r\nColor	Black\r\nCable Length	2 m\r\nTechnical Specification\r\nDriver Magnet	Driver: Hybrid mesh PRO-G\r\nMagnet: Neodymium\r\nFrequency Range	20 Hz-20 KHz\r\nImpedance	32 Ohms\r\nSensitivity	107 dB@1KHz SPL 30 mW/1cm\r\nOthers	Arm: Full-range flex\r\nOther Features\r\nSystem Requirements	PC, PS4, Nintendo Switch, Xbox One, VR\r\nWarranty Information\r\nManufacturing Warranty	02 Years Warranty\r\nMicrophone\r\nFrequency	100 Hz-10 KHz\r\nMicrophone Size	4 mm\r\nPick-up Pattern	Cardioid (Unidirectional)', 2, '2020-06-03 20:41:04', '2020-06-04 14:48:15', NULL, 'logitech-g-pro-35mm-single-dual-port-gaming-headphone-black-0t1qo'),
(6, 'JBL Tune 600BT Wireless Bluetooth Headphone', 'Model: JBL Tune 600BT\r\nDetachable Cable\r\nJBL Pure Bass Sound\r\nActive Noise Cancelling\r\nWireless Bluetooth Streaming', 'JBL Tune 600BT Wireless Bluetooth Headphone keeps the noise out and enjoy your music. For over 70 years, JBL has engineered the precise, impressive sound found in big venues around the world. These headphones reproduce that same JBL sound, punching out bass that’s both deep and powerful. Wirelessly stream high-quality sound from your smartphone or tablet without messy cords. Introducing the JBL TUNE600BTNC active noise-cancelling wireless on-ear headphones, a flat-folding lightweight and compact solution for everyday use. The JBL TUNE600BTNC feature 32mm JBL drivers that helps deliver JBL Pure Bass sound. Sound that can be enjoyed without unnecessary noise for more than 12 hours wirelessly and can be fully recharged in only 2 hours. And thanks to the additional detachable cable, music can be enjoyed endlessly in wired mode, with or without Active Noise-Cancelling. Made with durable materials and designed in four fresh colors, the JBL TUNE600BTNC allow you to connect to your world quickly thanks to buttons on the ear cups that allow for easy hands-free management of calls and music.', 'IR: 2003', 8500.00, 0, '6.jpg', 'Weight	173 g\r\nColor	Black\r\nCable Length	120 cm\r\nTechnical Specification\r\nFrequency Range	20Hz – 20kHz\r\nImpedance	32Ω\r\nSensitivity	100dB\r\nInput Jack	3.5mm\r\nDriver Diameter	32 mm\r\nConnectivity	Bluetooth/ Wired\r\nOthers	Battery type: Polymer Li-ion Battery\r\n(3.7 V, 610 mAh)\r\nCharging time: 2 hours\r\nTalk time with BT on: 22 hours\r\nMusic playtime with BT on and ANC off:\r\n22 hours\r\nMusic playtime with BT on and ANC on: 12 hours\r\nMusic playtime with BT off and ANC on: 30 hours\r\nBluetooth transmitted power: 0-4 dbm\r\nBluetooth transmitted modulation:\r\nGFSK, π/4DQPSK, 8DPSK\r\nBluetooth frequency: 2.402 GHz–2.48 GHz\r\nBluetooth profiles: HFP v1.6, HSP v1.2,\r\nA2DP v1.2, AVRCP v1.5\r\nBluetooth version: V4.1\r\nWarranty Information\r\nManufacturing Warranty	6 Months Warranty\r\nMicrophone\r\nSensitivity	@1 kHz – 24 dBV/Pa', 2, '2020-06-03 20:42:06', '2020-06-04 14:48:07', NULL, 'jbl-tune-600bt-wireless-bluetooth-headphone-t4dms'),
(7, 'GOLDEN FIELD U-20F Multimedia Bluetooth Speaker', 'Model: GOLDEN FIELD U-20F\r\nFrequency response : 40Hz~20KH\r\nDriver Unit : Sub 6.5″ & 3”*10\r\nS/N : >=70dB\r\nUSB,FM,Remote & Bluetooth', 'GOLDEN FIELD U-20F Multimedia Bluetooth Speaker comes with 5:1 set of speaker. It will bring full audio range music to your life. Beautiful finish design GOLDEN FIELD U-20F has the stylish black colors design, which is super beautiful for your personal space decoration and display. It is a Great sound solution for daily life and provides clean and detailed quality sound for most of your music needs. It is ideal for watching movies, playing games and listening to high definition music. Easy music control provides convenient control solution to every music lovers. GOLDEN FIELD U-20F 5:1 Speaker has built in 40Hz~20KH frequency Response, >=70dBSeparation.There are some other joss features are also comes with this device like USB port, FM and Bluetooth connectivity.', 'IR: 3001', 9000.00, 5, '7.jpg', 'Subwoofer	Yes\r\nSignal / noise ratio	>=70dB\r\nFrequency response	40Hz~20KH\r\nDrivers	Sub 6.5″ & 3”*10\r\nPhysical Spec\r\nDimension	Front Satellites size : W272*H940*D210mm\r\nCent satellites size : W320*H103*D91mm\r\nBluetooth	Yes\r\nUSB	Yes\r\nPower Source\r\nPower	110W\r\nWarranty\r\nManufacturing Warranty	01 Year Warranty', 4, '2020-06-03 20:45:34', '2020-06-04 14:47:59', NULL, 'golden-field-u-20f-multimedia-bluetooth-speaker-fpioq'),
(8, 'Microlab M108BT Bluetooth 2.1 Speaker', 'Model: Microlab M108BT\r\nNoise Ratio 70 dB\r\nSatellite Speaker 2 Satellite\r\nSubwoofer 1 Subwoofer\r\nFrequency 40 Hz – 18 kHz', 'Microlab M108BT Bluetooth 2.1 Speaker comes from M series. It will bring full audio range music to your life. It\'s Beautiful finish design M-108BT has the stylish black colors design ,which is super beautiful for your personal space decoration. The wooden materials can also be kept for a long period. Microlab M-108BT Great sound solution provides clean and high quality sound for most of your music needs. It is ideally for watching movies, playing games and listening high definition music. Easy music control M-108BT provides conveniet control solution to every music liker. It features the front volume control for quick sound adjustment. \r\nThis Microlab M108BT Speaker comes with 01 year of warranty.', 'IR: 3002', 1900.00, 10, '8.jpg', 'jack	3.5mm\r\nSubwoofer	1 Subwoofer\r\nSignal / noise ratio	70 dB\r\nFrequency response	40 Hz – 18 kHz\r\nDrivers	Tweeter driver : 2.5″\r\nPower Source\r\nPower	11 Watt RMS Power Output\r\nWarranty\r\nManufacturing Warranty	01 year warranty', 4, '2020-06-03 20:46:31', '2020-06-04 14:47:45', NULL, 'microlab-m108bt-bluetooth-21-speaker-1ghxd'),
(9, 'Logitech Surround Sound Z506 Speaker', 'Model: Logitech Surround Sound Z506\r\nFrequency 45 Hz–20 kHz\r\nSatellites: 48 watts RMS\r\nRCA audio out', 'Logitech Surround Sound Z506 Speaker , Computers, music players, TVs, DVD players and other audio sources with 3.5 mm or RCA audio out PlayStation®2, PLAYSTATION®3, Xbox 360® or Wii™ using the AV cable that comes with your console 75 watts RMS, Satellites: 48 watts RMS (2 x 8 W front, 16 W center, 2 x 8 W rear), Subwoofer: 27 watts RMS, Total peak power: 150 watts, Frequency response: 45 Hz–20 kHz, Cables Front: 2 meters, Rear: 5 meters, Center: 2.7 meters, Accessory cables: 2 meters, Weight 5.1 kg. Warranty - 2 Year.', 'IR: 3003', 12000.00, 7, '9.png', 'Frequency	45 Hz–20 kHz\r\nTotal Speakers	5:1', 4, '2020-06-03 20:47:57', '2020-06-04 14:47:33', NULL, 'logitech-surround-sound-z506-speaker-ixlro'),
(10, 'ADATA P5000 5000mAh Power Bank', 'Model: ADATA P5000\r\nAccessories: Micro USB cable, User manual\r\nCapacity: 5000mAh\r\nReveal Watermarks\r\nReveal UV Security Markings', 'ADATA P5000 Power Bank is featuring an ultra-compact form factor. It is portable mobile power and has a handy built-in counterfeit money detector. This power bank provides 5000mAh capacity and has enough power to charge your smartphone from empty to full one time. The P5000 power bank can reveal UV security markings and watermarks to help you spot a fake with a built-in ultraviolet (UV) counterfeit money detector. The P5000’s design sports minimalist sensibilities and a textured, leather-inspired exterior that won’t pick up messy fingerprints and unsightly smudges. This stylish power bank employs many safety mechanisms that counter over-discharging, over-charging, short-circuiting, over-voltage, and over-current. The P5000 comes with 01 year of warranty.', 'IR: 4001', 700.00, 15, '10.jpg', 'Capacity	5000mAh (Rechargeable Li-ion battery)\r\nInput	DC 5V/1.0A\r\nOutput	DC 5V / 1.0A\r\nPhysical Specification\r\nDimension	99 x 43 x 22mm / 3.9 x 1.7 x 0.8\" (L x W x H)\r\nWeight	117g / 4.1oz\r\nManufacture Warranty\r\nWarranty	01 year warranty', 5, '2020-06-03 20:49:22', '2020-06-04 14:47:28', NULL, 'adata-p5000-5000mah-power-bank-ipt2x'),
(11, 'Awei P77K 12000mAh Fast Charge Power Bank', 'Model: Awei P77K\r\nBatt.Capacity: 12000mah\r\n2.0A Intelligent fast charge\r\nMicro interface\r\nInput: 5V-0.2A(max)', 'This Awei P77K Power Bank is mainly designed for portable digital devices, such as mobile phone, Tablet PC, MP3, MP4 and game player etc. It comes with 12000mah Batt.Capacity, 5V-0.2A(max) Input, 5V -2A(max) Output 1 & 2, 10oc to 60oc Operating Temperature and 20oc to 50oc Storage Temperature. This power bank has high capacity, so it can provide enough power for your phone or other devices. It is a great accompany for you when you travel or have an outdoor gathering. You can Charge with more devices at the same time. This power bank is featuires with 2.0A Intelligent fast charge. Here use the Micro interface input of constant pressure constant current with LED light display indicates battery capacity.', 'IR: 4002', 1050.00, 9, '11.jpg', 'Capacity	12000mah\r\nInput	5V-0.2A(max)\r\nOutput	Output1: 5V -2A(max)\r\nOutput2: 5V -2A(max)\r\nInterface	Micro interface\r\nPhysical Specification\r\nColor	Black and White', 5, '2020-06-03 20:50:18', '2020-06-04 14:47:22', NULL, 'awei-p77k-12000mah-fast-charge-power-bank-6s52h'),
(12, 'Xiaomi Mi Redmi PB200LZM 20000mAh Quick Charging Power Bank', 'Model: Xiaomi Mi Redmi PB200LZM Power Bank\r\nHigh Quality Circuit Chip\r\nTwo USB-A Output Interface\r\nMicro USB & USB-C Dual Input Interface\r\n20000mAh Big Power, 2-Ways fast Charging', 'Keep phones, tablets, cameras and electronic devices powered on travels with the massive 20000mAh Mi Power Bank. Its premium lithium-ion polymer batteries supplied by Panasonic/LG have energy densities of up to 728Wh/L. Charge two devices at once with dual USB ports. The new Texas Instruments control chip in each 20000mAh Mi Power Bank supports rapid charging. Compatible with 5V/2A, 9V/2A and 12V/1.5A charging, the power bank takes just 3 hours to charge 11000mAh and 7 hours to charge fully that\'s 44% faster than two 10000mAh Mi Power Banks combined. It maximises time on-the-go so you spend less downtime on charging. At just 338g, the 20000mAh Mi Power Bank is 414g lighter than two 10000mAh Mi Power Banks combined.Enter a whole new level of high-speed of charging with dual USB ports with up to 5.1V/3.6A output. Not only is the output significantly larger than ordinary chargers, 20000mAh Mi Power Bank also automatically adjusts output level based on the connected device. It is compatible with smartphones and tablets from Mi 4, Apple, Samsung, HTC, Google and BlackBerry, as well as a variety of digital cameras and handheld gaming devices. Mi Power Bank\'s adopted USB smart-control and charging/discharging chips from Texas Instruments provide nine layers of circuit chip protection while enhancing efficiency.', 'IR: 4003', 1950.00, 2, '12.jpg', 'Capacity	Over 20000mAh\r\nBattery Voltage: 3.7V\r\nBattery Current: 3.6A\r\nInput	Micro-USB/USB-C\r\nInput: 5V 2.1A / 9V 2.1A / 12V 1.5A\r\nOutput	2 x USB-A\r\noutput: 5.1V 2.4A / 9V 2A max. 12V 1.5A max. Dual port output: 5.1V 3.6A\r\nInterface	Battery Type: Li-Polymer Battery\r\nButton	1\r\nPhysical Specification\r\nDimension	15.40 x 7.36 x 2.73 cm\r\nWeight	420 g\r\nColor	White', 5, '2020-06-03 20:51:46', '2020-06-04 14:46:57', NULL, 'xiaomi-mi-redmi-pb200lzm-20000mah-quick-charging-power-bank-qvi7h'),
(13, 'asdasd', 'asdasd', 'asdasd', 'IRasdasd', 25.00, 12, 'default_product.jpg', 'asdasdas', 1, '2020-06-08 22:52:24', '2020-06-08 22:52:51', '2020-06-08 22:52:51', 'asdasd-erz0e'),
(14, 'asdasda', 'asfasgf', 'fhgfdsfadS', 'SDSFDGHHM', 256.00, 3, 'default_product.jpg', 'SADSHFDJGFHJJK', 1, '2020-06-08 22:52:40', '2020-06-08 22:52:51', '2020-06-08 22:52:51', 'asdasda-rfodf'),
(15, 'dasdnasdasd', 'asfdadsas', 'asdasd', 'asdasd', 25.00, 1, 'default_product.jpg', 'asdasd', 1, '2020-06-08 23:17:24', '2020-06-08 23:22:12', '2020-06-08 23:22:12', 'dasdnasdasd-ppree'),
(16, 'asdasd', 'asdasd', 'asdas', 'sdasas', 63.00, 3, 'default_product.jpg', 'asdasd', 2, '2020-06-08 23:17:42', '2020-06-08 23:22:12', '2020-06-08 23:22:12', 'asdasd-iccw4'),
(17, 'asdasd', 'dfgjhkjlksddf', 'fhjdfghjj', 'fdghjk', 89.00, 4, 'default_product.jpg', 'adsfdghfhghkj', 5, '2020-06-08 23:18:02', '2020-06-08 23:22:12', '2020-06-08 23:22:12', 'asdasd-bxjlv'),
(18, 'Maknu', 'asdasd', 'asda', 'asdas', 25.00, 3, '18.jpg', 'asd', 1, '2020-06-09 23:09:08', '2020-06-09 23:10:27', '2020-06-09 23:10:27', 'maknu-z64o2'),
(19, 'Arduino', 'asda', 'asdas', 'asd', 256.00, 4, '19.jpg', 'asdas', 1, '2020-06-09 23:10:55', '2020-06-10 14:08:42', '2020-06-10 14:08:42', 'arduino-pk12n'),
(20, 'asdas', 'asdas', 'asdas', 'sadas', 245.00, 435, '20.jpg', 'asdas', 5, '2020-06-10 14:09:14', '2020-06-10 14:39:13', '2020-06-10 14:39:13', 'asdas-dhp66'),
(21, 'Aasasdasd', 'asdasd', 'asdasd', 'asdasd', 34.00, 2, '21.jpg', 'adsad', 1, '2020-06-10 14:40:50', '2020-06-10 15:02:01', '2020-06-10 15:02:01', 'aasasdasd-duc0v'),
(22, 'Arduino', 'asdd', 'asdas', 'asd', 234.00, 10, '22.png', 'asdasd', 1, '2020-06-10 15:03:05', '2020-07-12 19:22:10', NULL, 'arduino-fgjf4');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_multiple_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_multiple_photo_name`, `created_at`, `updated_at`) VALUES
(5, 22, '22-1.jpg', '2020-06-10 15:04:21', NULL),
(6, 22, '22-2.jpg', '2020-06-10 15:04:21', NULL),
(7, 22, '22-3.jpg', '2020-06-10 15:04:21', NULL),
(8, 22, '22-4.jpg', '2020-06-10 15:04:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `order_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_client.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `client_message`, `client_position`, `client_image`, `created_at`, `updated_at`) VALUES
(1, 'Antone Bogisich', 'Ad repudiandae veniam saepe qui.', 'Fugit enim delectus deserunt perferendis.', 'default_client.jpg', '2020-06-03 19:00:47', '2020-06-03 19:00:47'),
(2, 'Neva Runolfsdottir', 'Consectetur ratione exercitationem earum totam aliquid enim.', 'Illum voluptatem sit sit ipsum.', 'default_client.jpg', '2020-06-03 19:00:47', '2020-06-03 19:00:47'),
(3, 'Mrs. Allie Schimmel', 'Ut dolorem repellendus molestiae rem delectus.', 'Sequi quo reprehenderit a et quidem iste.', 'default_client.jpg', '2020-06-03 19:00:47', '2020-06-03 19:00:47'),
(4, 'Mr. Khan', 'very good', 'Business Man', '4.jpg', '2020-06-03 19:07:40', '2020-06-04 09:34:59'),
(5, 'Abdul Kalam', 'product quality and service is good', 'Chairman, ABC Group', 'default_client.jpg', '2020-06-03 19:07:40', '2020-06-04 09:35:41'),
(6, 'Darrion O\'Hara', 'Ut occaecati enim unde nihil est aspernatur.', 'Quas qui impedit corporis magni.', 'default_client.jpg', '2020-06-03 19:07:40', '2020-06-03 19:07:40'),
(7, 'Ismat Ara Maknuna', 'Very good quality', 'Electrical Engineer, RAK Group', '7.jpg', '2020-06-03 19:52:44', '2020-06-04 09:34:42'),
(8, 'M. R Khan', 'Good Service and Performance in product', 'MD, Intel Cop', '8.jpg', '2020-06-04 16:26:18', '2020-06-04 16:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taskName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taskDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `taskStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `taskName`, `taskDescription`, `user_id`, `taskStatus`, `created_at`, `updated_at`) VALUES
(1, 'Quo aut voluptatem voluptatem voluptates.', 'Rem omnis fugiat non illo vitae.', 9, 0, '1975-08-03 19:20:20', NULL),
(2, 'Est totam officiis quod omnis a et esse iste.', 'Voluptas unde sit atque libero.', 7, 0, '2009-01-08 12:15:29', NULL),
(3, 'Pariatur similique quia iusto eos omnis.', 'Enim voluptate quia nam.', 9, 0, '2016-05-10 00:27:26', NULL),
(4, 'Exercitationem quibusdam quae neque voluptate magni.', 'Quis velit dolores ut expedita.', 4, 1, '2000-10-14 18:23:51', NULL),
(5, 'Exercitationem consequuntur possimus voluptas quam molestias.', 'Excepturi non aut vero possimus.', 1, 0, '2002-05-20 13:16:36', NULL),
(6, 'Eos et repellendus qui aliquam modi enim exercitationem.', 'Fuga totam aliquid sed dignissimos esse a qui.', 3, 1, '2014-09-03 04:25:42', NULL),
(7, 'Possimus minima aut molestiae est dolores sint officia.', 'Et sed nisi fugiat ab.', 9, 1, '1995-02-21 14:29:29', NULL),
(8, 'Explicabo ea voluptatem quod id magni.', 'Ut est omnis et libero et vitae.', 9, 0, '1974-06-26 12:52:51', NULL),
(9, 'Sunt voluptas et quia atque incidunt consequatur provident.', 'Occaecati deleniti dolore ut ducimus qui.', 7, 1, '1986-05-22 20:27:08', NULL),
(10, 'Eligendi aut sunt ipsam voluptates corrupti autem quia.', 'Qui et facere aut quod nesciunt itaque.', 1, 0, '2006-08-22 08:10:04', NULL),
(11, 'Rerum magni numquam iste nisi.', 'Sequi earum est alias excepturi nemo.', 1, 1, '1980-12-29 20:25:03', NULL),
(12, 'Earum rem rerum voluptatem aut consectetur pariatur molestias.', 'Sed libero est quisquam ipsa.', 5, 1, '1988-08-17 13:51:05', NULL),
(13, 'Veritatis itaque excepturi ut ab aut.', 'Sit est non autem incidunt sequi.', 7, 1, '2005-05-02 12:05:09', NULL),
(14, 'Ad et nesciunt deleniti dolor et perferendis dolorem optio.', 'Qui qui quos voluptatem nobis.', 6, 0, '1989-01-01 17:19:26', NULL),
(15, 'Voluptatem sunt voluptas aut veritatis voluptatem quia.', 'Aut nemo quis non.', 6, 1, '1974-11-05 13:00:29', NULL),
(16, 'Ratione enim omnis et magni non voluptatum.', 'In ipsum pariatur praesentium aut voluptate.', 7, 0, '2001-04-08 12:05:15', NULL),
(17, 'Minus cupiditate earum aspernatur magni id libero.', 'Eaque amet quas eius rerum ab quo.', 10, 0, '2017-02-03 08:39:20', NULL),
(18, 'Ut recusandae beatae debitis sed.', 'Vel corrupti cum reprehenderit et.', 10, 0, '2008-07-03 04:20:17', NULL),
(19, 'Et illum eos debitis dolores pariatur.', 'Itaque veniam quos voluptas odio provident.', 1, 1, '1975-12-07 04:59:58', NULL),
(20, 'Voluptate quae sapiente eius quia autem.', 'Earum consequatur recusandae vitae asperiores.', 4, 0, '1975-04-04 15:13:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_image`, `remember_token`, `created_at`, `updated_at`, `user_role`) VALUES
(1, 'Mahmud Ibrahim', 'mahmud@gmail.com', '2020-06-03 19:07:23', '$2y$10$Wy2oiVP0ACiddPkEoZAWB.5eplBHxrQbIOm.DqOTaKLQDOKvkMq9C', '1.jpg', 'rTXsjPSZSOlWJdVozyvmRFjERSVWA86Q8lPn3CEDrwEHlxlnH1A4m1tAzuTO', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 1),
(2, 'Roderick Tromp III', 'wilmer.hegmann@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'Gmfu962wHD', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(3, 'Miss Odessa Senger', 'edwardo.dickens@example.com', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'sEmiOoSqHg', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(4, 'Mrs. Ramona Kub', 'pasquale83@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', '4zCANCQExu', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(5, 'Wilford Veum PhD', 'krogahn@example.com', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'z5pApYWGv5', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(6, 'Dr. Destany Renner IV', 'teresa04@example.net', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'T8EyoSjVVq', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(7, 'Florencio Leuschke', 'oprosacco@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'B272AcId1D', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(8, 'Kamryn Becker', 'pfannerstill.ernie@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'AM5b1TJRRZ', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(9, 'Karson Runte', 'tate.ortiz@example.com', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'l10MinmF1m', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(10, 'Alexa Schiller', 'friesen.rasheed@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'loEy26KqNO', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(11, 'Shany Aufderhar', 'roosevelt86@example.net', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'KdsNfqwAjD', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(12, 'Alvera Aufderhar', 'wilderman.cody@example.net', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'sNOlLIKlzI', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(13, 'Quentin Lemke', 'mgorczany@example.com', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'gG0nLYM8qn', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(14, 'Elroy Toy DDS', 'tokeefe@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'VZBD87r7gQ', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(15, 'Sally Considine', 'breanne58@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'zXLoJvaviM', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(16, 'Miss Katelyn Stanton', 'cgreenfelder@example.net', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'dbQcRuRSQl', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(17, 'Kristoffer Vandervort', 'liana.barton@example.com', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'aoMh86rVNX', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(18, 'Ms. Elisabeth Bechtelar', 'qhane@example.com', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'xRMOFaTOHH', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(19, 'Cristian Weimann', 'jazmyne50@example.com', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'Nk217BYmiw', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(20, 'Miss Florence Howe', 'evie.rutherford@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', '92grYRWrjB', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(21, 'Mrs. Antonina Roob PhD', 'ihirthe@example.org', '2020-06-03 19:07:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.jpg', 'ivZe8Mixeh', '2020-06-03 19:07:23', '2020-06-03 19:07:23', 2),
(22, 'Ismat Ara Maknuna', 'ismat@live.com', NULL, '$2y$10$BEyjrjz4iUlamhtWjKLHWOcEooHPLSe23pPbASCSNyoVogd747.6i', 'default.jpg', NULL, '2020-06-15 15:19:57', '2020-06-15 15:19:57', 2),
(24, 'touhid', 'touhid@abc.com', NULL, '$2y$10$HVezSagjyalCWQHL.jdSEunymML2XHTDqqiYff1DT7tEep69Ks2MK', 'default.jpg', NULL, '2020-07-04 13:31:19', NULL, 2),
(25, 'jobbar', 'jobbar@yahoo.com', NULL, '$2y$10$AA/Z7DT/eCeBsLQC.h3KmOui8BQzFRyNeMGNcCKvUK8q0y38WDOFC', 'default.jpg', NULL, '2020-07-04 15:08:45', NULL, 2),
(26, 'Mahmud Ibrahim', 'mahmud.ibrahim021@gmail.com', NULL, '$2y$10$P5oWvOsEnG58CqXUf3f6seuABh70rnVy944jR9pgbnKDTiH.A/A3e', 'default.jpg', NULL, '2020-07-04 17:07:56', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generated_wish_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `generated_wish_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CWgqVaE450', 1, '2020-07-12 20:52:20', NULL, NULL),
(2, 'CWgqVaE450', 2, '2020-07-12 21:08:11', NULL, NULL),
(3, 'CWgqVaE450', 4, '2020-07-12 21:08:15', '2020-07-12 21:12:30', '2020-07-12 21:12:30'),
(4, 'CWgqVaE450', 6, '2020-07-12 21:08:18', NULL, NULL),
(5, 'CWgqVaE450', 12, '2020-07-12 21:08:21', '2020-07-12 21:09:03', '2020-07-12 21:09:03'),
(6, 'CWgqVaE450', 22, '2020-07-12 21:08:25', '2020-07-12 21:08:51', '2020-07-12 21:08:51'),
(7, 'CWgqVaE450', 9, '2020-07-12 21:16:11', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_messages`
--
ALTER TABLE `client_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_name_unique` (`coupon_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_blog_post_id_foreign` (`blog_post_id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todos_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_messages`
--
ALTER TABLE `client_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`),
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
