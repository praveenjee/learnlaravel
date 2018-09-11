-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 12:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmyblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Lifestyle', 'lifestyle', '1', '2018-08-04 06:04:42', '2018-08-04 06:04:42'),
(25, 'Fashion', 'fashion', '1', '2018-08-04 06:04:59', '2018-08-04 06:04:59'),
(26, 'Everyday Blog', 'everyday-blog', '1', '2018-08-04 06:05:17', '2018-08-04 06:05:17'),
(27, 'Inspiration', 'inspiration', '1', '2018-08-04 06:05:51', '2018-08-04 06:05:51'),
(28, 'Development', 'development', '1', '2018-08-04 06:06:10', '2018-08-04 06:06:10'),
(29, 'Photography', 'photography', '1', '2018-08-04 06:06:27', '2018-08-04 06:06:27'),
(30, 'Design', 'design', '1', '2018-08-04 06:06:40', '2018-08-04 06:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 2, 24, NULL, NULL),
(3, 8, 26, NULL, NULL),
(7, 11, 24, NULL, NULL),
(8, 11, 29, NULL, NULL),
(11, 10, 25, NULL, NULL),
(16, 24, 26, NULL, NULL),
(17, 24, 29, NULL, NULL),
(18, 25, 28, NULL, NULL),
(19, 25, 30, NULL, NULL),
(20, 26, 25, NULL, NULL),
(21, 26, 30, NULL, NULL),
(22, 27, 24, NULL, NULL),
(23, 27, 26, NULL, NULL),
(24, 28, 25, NULL, NULL),
(25, 28, 26, NULL, NULL),
(26, 28, 27, NULL, NULL),
(27, 29, 28, NULL, NULL),
(28, 29, 29, NULL, NULL),
(29, 30, 29, NULL, NULL),
(30, 30, 30, NULL, NULL),
(31, 31, 25, NULL, NULL),
(32, 31, 26, NULL, NULL),
(33, 32, 25, NULL, NULL),
(34, 32, 26, NULL, NULL),
(35, 33, 26, NULL, NULL),
(36, 33, 28, NULL, NULL),
(37, 2, 27, NULL, NULL),
(38, 2, 29, NULL, NULL),
(39, 34, 24, NULL, NULL),
(40, 34, 28, NULL, NULL),
(41, 35, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `email`, `body`, `photo`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 34, 'Admin', 'praveenk@clovity.com', 'Today, I learned `How can we make comment reply module in Laravel`', NULL, 1, '2018-08-28 02:10:30', '2018-08-30 10:03:45'),
(3, 34, 'Admin', 'praveenk@clovity.com', 'I think this will work. Awesome!!!', NULL, 1, '2018-08-28 02:22:02', '2018-08-28 19:59:55'),
(5, 8, 'Admin', 'praveenk@clovity.com', 'Wow, This is a great article..My grateful session with Ediwin Diaz..', NULL, 1, '2018-08-28 20:09:28', '2018-08-28 20:11:41'),
(6, 34, 'Admin', 'praveenk@clovity.com', 'Having fun with coding in Laravel 5.6.', NULL, 1, '2018-08-28 20:11:14', '2018-08-28 20:11:44'),
(7, 10, 'Admin', 'praveenk@clovity.com', 'lsj ldfks lfkj sldfk sldf jlsdkflsd fjl', NULL, 1, '2018-08-30 09:27:47', '2018-08-30 09:39:42'),
(8, 35, 'Admin', 'praveenk@clovity.com', 'Hi there, This is a great article.', NULL, 1, '2018-09-08 00:23:16', '2018-09-08 00:23:51'),
(9, 2, 'Admin', 'praveenk@clovity.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, 1, '2018-09-08 00:32:50', '2018-09-08 00:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `comment_id`, `author`, `email`, `body`, `photo`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 'Admin', 'praveenk@clovity.com', 'Alright!!!', NULL, 1, '2018-09-03 19:18:14', '2018-09-08 19:58:54'),
(2, 2, 'Admin', 'praveenk@clovity.com', 'Wow, this is a great article..', NULL, 1, '2018-09-04 14:06:06', '2018-09-04 14:06:06'),
(3, 3, 'Admin', 'praveenk@clovity.com', 'This is very helpful for beginers.', NULL, 1, '2018-09-04 14:08:17', '2018-09-04 14:08:17'),
(4, 6, 'Admin', 'praveenk@clovity.com', 'Test reply :)', NULL, 1, '2018-09-04 14:13:33', '2018-09-04 14:13:33'),
(5, 6, 'Admin', 'praveenk@clovity.com', 'Test 12345', NULL, 1, '2018-09-04 14:20:26', '2018-09-04 14:20:26'),
(9, 2, 'Admin', 'praveenk@clovity.com', 'test successfull..', NULL, 1, '2018-09-04 14:28:31', '2018-09-08 19:35:32'),
(11, 3, 'Admin', 'praveenk@clovity.com', 'Testing is a great passion..', NULL, 1, '2018-09-04 14:36:41', '2018-09-08 19:36:48'),
(13, 9, 'Admin', 'praveenk@clovity.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', NULL, 1, '2018-09-08 00:34:52', '2018-09-08 19:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Adaline Orn', '', 'rice.boris@example.net', NULL, 'Hatter continued, \'in this way:-- \"Up above the world am I? Ah, THAT\'S the great question certainly was, what? Alice looked all round the neck of the Mock Turtle; \'but it doesn\'t understand.', '2018-06-06 06:16:10', '2018-06-06 06:16:10'),
(2, 'Mr. Lamont Boyle Sr.', '', 'theodora.von@example.net', NULL, 'The Rabbit started violently, dropped the white kid gloves in one hand and a pair of gloves and a crash of broken glass. \'What a curious feeling!\' said Alice; \'but when you come and join the dance?.', '2018-06-06 06:16:10', '2018-06-06 06:16:10'),
(3, 'Timothy Dare', '', 'schmeler.fletcher@example.net', NULL, 'I heard him declare, \"You have baked me too brown, I must be really offended. \'We won\'t talk about wasting IT. It\'s HIM.\' \'I don\'t see,\' said the Caterpillar. Alice folded her hands, wondering if.', '2018-06-06 06:16:10', '2018-06-06 06:16:10'),
(4, 'Ivah Zulauf', '', 'ziemann.cole@example.net', NULL, 'It doesn\'t look like it?\' he said. \'Fifteenth,\' said the March Hare: she thought it over a little of the reeds--the rattling teacups would change to tinkling sheep-bells, and the constant heavy.', '2018-06-06 06:16:10', '2018-06-06 06:16:10'),
(5, 'Patsy Davis', '', 'maybelle48@example.net', NULL, 'Alice\'s head. \'Is that the meeting adjourn, for the hedgehogs; and in another moment, splash! she was now, and she heard a little worried. \'Just about as curious as it was over at last, and managed.', '2018-06-06 06:16:10', '2018-06-06 06:16:10'),
(6, 'Softagonopoulos', '', 'koch.carley@example.net', NULL, 'YOU with us!\"\' \'They were obliged to say but \'It belongs to a day-school, too,\' said Alice; not that she had hoped) a fan and gloves, and, as she leant against a buttercup to rest her chin in salt.', '2018-06-06 06:16:13', '2018-06-06 06:16:13'),
(17, 'Shivram Yadav', '', 'shivramyadav@gmail.com', '8345932747', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-22 10:54:01', '2018-07-22 10:54:01'),
(18, 'Ravi Kumar', '', 'ravisingh1008@gmail.com', '9835983485', 'All of a mailable class\' configuration is done in the build method. Within this method, you may call various methods such as from, subject, view, and attach to configure the email\'s presentation and delivery.', '2018-07-22 10:57:32', '2018-07-22 10:57:32'),
(19, 'Praveen', 'Kumar', 'delhi.praveenkumar@gmail.com', '9898787665', 'tst meail ls dfjls flskd f cxv,mx,v n,xcnvweproiweporipwe  fvmx.v,mx.mv,', '2018-08-04 14:20:21', '2018-08-04 14:20:21'),
(20, 'rewre', 'erwerew', 'werwerew@gmail.com', '0909898987', 'sdfjhskdjfkdsk jfkdsljfldskfjl', '2018-08-04 23:32:28', '2018-08-04 23:32:28'),
(21, 'Ravi', 'Kumar', 'ravikumarsingh@gmail.com', '9897676565', 'hekkfs kfs fsldfjlsdfk lsfj lsdfj lsdfkj lsdfjlsdkfjlsd', '2018-08-04 23:48:06', '2018-08-04 23:48:06'),
(22, 'Ravi Singh', 'Panchal', 'ravisingpanchal110@gmail.com', '6563437438', 'Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum', '2018-08-04 23:55:51', '2018-08-04 23:55:51'),
(23, 'Praveen', 'Kumar', 'ravisingh@gmail.com', '9898787665', 'Lravel tutorial with edwin diaz...', '2018-08-15 04:13:12', '2018-08-15 04:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_10_233219_create_categories_table', 1),
(4, '2017_03_10_233219_create_posts_table', 1),
(6, '2017_03_10_233220_create_contacts_table', 1),
(7, '2017_03_10_233220_create_post_tag_table', 1),
(8, '2017_03_10_233220_create_tags_table', 1),
(9, '2017_03_18_145906_create_category_post_table', 1),
(10, '2017_03_18_145916_create_foreign_keys', 1),
(11, '2018_07_10_175456_add_profileimage_to_users', 2),
(12, '2018_07_13_184711_add_contactno_to_users', 3),
(13, '2018_07_20_173143_add_phoneno_into_contact', 4),
(14, '2018_07_28_090839_create_roles_table', 5),
(15, '2018_07_28_091457_create_users_roles_table', 5),
(18, '2018_08_20_161539_create_pages_table', 7),
(19, '2018_08_07_175546_create_photos_table', 8),
(20, '2018_08_23_181650_create_newsletters_table', 9),
(21, '2017_03_10_233220_create_comments_table', 10),
(22, '2018_08_27_182523_create_comment_replies_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'delhi.praveenkumar@gmail.com', 1, '2018-08-23 13:03:15', '2018-08-23 13:03:15'),
(2, 'praveenk@clovity.com', 1, '2018-08-24 12:40:54', '2018-08-24 12:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `body`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Author Detail', 'author-detail', '<p><em>Hello, my name is</em></p>\r\n\r\n<h3>PRAVEEN KUMAR</h3>\r\n\r\n<p>WEB DESIGNER &amp; DEVELOPER, PHOTOGRAPHER</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p><img alt=\"\" src=\"images/sign-light.png\" /></p>', 'Author Detail', 'About Author, Author Detail, Author Says,', 'Author Detail', 1, '2018-08-21 11:47:12', '2018-08-21 12:08:02'),
(2, 'Terms And Conditions', 'terms-conditions', '<h1>General Site Usage</h1>\r\n\r\n<p>Last Revised: August 21, 2018</p>\r\n\r\n<p>Welcome to www.lorem-ipsum.info. This site is provided as a service to our visitors and may be used for informational purposes only. Because the Terms and Conditions contain legal obligations, please read them carefully.</p>\r\n\r\n<h2>1. YOUR AGREEMENT</h2>\r\n\r\n<p>By using this Site, you agree to be bound by, and to comply with, these Terms and Conditions. If you do not agree to these Terms and Conditions, please do not use this site.</p>\r\n\r\n<blockquote>PLEASE NOTE: We reserve the right, at our sole discretion, to change, modify or otherwise alter these Terms and Conditions at any time. Unless otherwise indicated, amendments will become effective immediately. Please review these Terms and Conditions periodically. Your continued use of the Site following the posting of changes and/or modifications will constitute your acceptance of the revised Terms and Conditions and the reasonableness of these standards for notice of changes. For your information, this page was last updated as of the date at the top of these terms and conditions.</blockquote>\r\n\r\n<h2>2. PRIVACY</h2>\r\n\r\n<p>Please review our Privacy Policy, which also governs your visit to this Site, to understand our practices.</p>\r\n\r\n<h2>3. LINKED SITES</h2>\r\n\r\n<p>This Site may contain links to other independent third-party Web sites (&quot;Linked Sites&rdquo;). These Linked Sites are provided solely as a convenience to our visitors. Such Linked Sites are not under our control, and we are not responsible for and does not endorse the content of such Linked Sites, including any information or materials contained on such Linked Sites. You will need to make your own independent judgment regarding your interaction with these Linked Sites.</p>\r\n\r\n<h2>4. FORWARD LOOKING STATEMENTS</h2>\r\n\r\n<p>All materials reproduced on this site speak as of the original date of publication or filing. The fact that a document is available on this site does not mean that the information contained in such document has not been modified or superseded by events or by a subsequent document or filing. We have no duty or policy to update any information or statements contained on this site and, therefore, such information or statements should not be relied upon as being current as of the date you access this site.</p>\r\n\r\n<h2>5. DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY</h2>\r\n\r\n<p>A. THIS SITE MAY CONTAIN INACCURACIES AND TYPOGRAPHICAL ERRORS. WE DOES NOT WARRANT THE ACCURACY OR COMPLETENESS OF THE MATERIALS OR THE RELIABILITY OF ANY ADVICE, OPINION, STATEMENT OR OTHER INFORMATION DISPLAYED OR DISTRIBUTED THROUGH THE SITE. YOU EXPRESSLY UNDERSTAND AND AGREE THAT: (i) YOUR USE OF THE SITE, INCLUDING ANY RELIANCE ON ANY SUCH OPINION, ADVICE, STATEMENT, MEMORANDUM, OR INFORMATION CONTAINED HEREIN, SHALL BE AT YOUR SOLE RISK; (ii) THE SITE IS PROVIDED ON AN &quot;AS IS&quot; AND &quot;AS AVAILABLE&quot; BASIS; (iii) EXCEPT AS EXPRESSLY PROVIDED HEREIN WE DISCLAIM ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, WORKMANLIKE EFFORT, TITLE AND NON-INFRINGEMENT; (iv) WE MAKE NO WARRANTY WITH RESPECT TO THE RESULTS THAT MAY BE OBTAINED FROM THIS SITE, THE PRODUCTS OR SERVICES ADVERTISED OR OFFERED OR MERCHANTS INVOLVED; (v) ANY MATERIAL DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE SITE IS DONE AT YOUR OWN DISCRETION AND RISK; and (vi) YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR FOR ANY LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIAL.</p>\r\n\r\n<p>B. YOU UNDERSTAND AND AGREE THAT UNDER NO CIRCUMSTANCES, INCLUDING, BUT NOT LIMITED TO, NEGLIGENCE, SHALL WE BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE OR CONSEQUENTIAL DAMAGES THAT RESULT FROM THE USE OF, OR THE INABILITY TO USE, ANY OF OUR SITES OR MATERIALS OR FUNCTIONS ON ANY SUCH SITE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATIONS SHALL APPLY NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY.</p>\r\n\r\n<h2>6. EXCLUSIONS AND LIMITATIONS</h2>\r\n\r\n<p>SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES OR THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES. ACCORDINGLY, OUR LIABILITY IN SUCH JURISDICTION SHALL BE LIMITED TO THE MAXIMUM EXTENT PERMITTED BY LAW.</p>\r\n\r\n<h2>7. OUR PROPRIETARY RIGHTS</h2>\r\n\r\n<p>This Site and all its Contents are intended solely for personal, non-commercial use. Except as expressly provided, nothing within the Site shall be construed as conferring any license under our or any third party&#39;s intellectual property rights, whether by estoppel, implication, waiver, or otherwise. Without limiting the generality of the foregoing, you acknowledge and agree that all content available through and used to operate the Site and its services is protected by copyright, trademark, patent, or other proprietary rights. You agree not to: (a) modify, alter, or deface any of the trademarks, service marks, trade dress (collectively &quot;Trademarks&quot;) or other intellectual property made available by us in connection with the Site; (b) hold yourself out as in any way sponsored by, affiliated with, or endorsed by us, or any of our affiliates or service providers; (c) use any of the Trademarks or other content accessible through the Site for any purpose other than the purpose for which we have made it available to you; (d) defame or disparage us, our Trademarks, or any aspect of the Site; and (e) adapt, translate, modify, decompile, disassemble, or reverse engineer the Site or any software or programs used in connection with it or its products and services.</p>\r\n\r\n<p>The framing, mirroring, scraping or data mining of the Site or any of its content in any form and by any method is expressly prohibited.</p>\r\n\r\n<h2>8. INDEMNITY</h2>\r\n\r\n<p>By using the Site web sites you agree to indemnify us and affiliated entities (collectively &quot;Indemnities&quot;) and hold them harmless from any and all claims and expenses, including (without limitation) attorney&#39;s fees, arising from your use of the Site web sites, your use of the Products and Services, or your submission of ideas and/or related materials to us or from any person&#39;s use of any ID, membership or password you maintain with any portion of the Site, regardless of whether such use is authorized by you.</p>\r\n\r\n<h2>9. COPYRIGHT AND TRADEMARK NOTICE</h2>\r\n\r\n<p>Except our generated dummy copy, which is free to use for private and commercial use, all other text is copyrighted. generator.lorem-ipsum.info &copy; 2013, all rights reserved</p>\r\n\r\n<h2>10. INTELLECTUAL PROPERTY INFRINGEMENT CLAIMS</h2>\r\n\r\n<p>It is our policy to respond expeditiously to claims of intellectual property infringement. We will promptly process and investigate notices of alleged infringement and will take appropriate actions under the Digital Millennium Copyright Act (&quot;DMCA&quot;) and other applicable intellectual property laws. Notices of claimed infringement should be directed to:</p>\r\n\r\n<p>generator.lorem-ipsum.info</p>\r\n\r\n<p>126 Electricov St.</p>\r\n\r\n<p>Kiev, Kiev 04176</p>\r\n\r\n<p>Ukraine</p>\r\n\r\n<p>contact@lorem-ipsum.info</p>\r\n\r\n<h2>11. PLACE OF PERFORMANCE</h2>\r\n\r\n<p>This Site is controlled, operated and administered by us from our office in Kiev, Ukraine. We make no representation that materials at this site are appropriate or available for use at other locations outside of the Ukraine and access to them from territories where their contents are illegal is prohibited. If you access this Site from a location outside of the Ukraine, you are responsible for compliance with all local laws.</p>\r\n\r\n<h2>12. GENERAL</h2>\r\n\r\n<p>A. If any provision of these Terms and Conditions is held to be invalid or unenforceable, the provision shall be removed (or interpreted, if possible, in a manner as to be enforceable), and the remaining provisions shall be enforced. Headings are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such section. Our failure to act with respect to a breach by you or others does not waive our right to act with respect to subsequent or similar breaches. These Terms and Conditions set forth the entire understanding and agreement between us with respect to the subject matter contained herein and supersede any other agreement, proposals and communications, written or oral, between our representatives and you with respect to the subject matter hereof, including any terms and conditions on any of customer&#39;s documents or purchase orders.</p>\r\n\r\n<p>B. No Joint Venture, No Derogation of Rights. You agree that no joint venture, partnership, employment, or agency relationship exists between you and us as a result of these Terms and Conditions or your use of the Site. Our performance of these Terms and Conditions is subject to existing laws and legal process, and nothing contained herein is in derogation of our right to comply with governmental, court and law enforcement requests or requirements relating to your use of the Site or information provided to or gathered by us with respect to such use.</p>', 'Terms Conditions', 'Terms, Conditions, Terms & Conditions', 'Terms Conditions', 1, '2018-08-21 12:00:55', '2018-08-21 12:49:44'),
(3, 'Privacy Policy', 'privacy-policy', '<p>This policy describes how PodSearch collects, uses, shares, and secures information on the PodSearch&trade; Site and the PodSearch&trade; Mobile App, as well as the services we use to communicate with consumers and to facilitate communications between Companies and Podcasters.</p>\r\n\r\n<p>Although you should read through the entire policy for complete information, the following provides a summary of some of the most important aspects of our privacy practices:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>We will track the activity of Registered Users on the PodSearch&trade; Directory and use the information for research purposes. For example, we may report to Podcasters data regarding the amount of traffic to their podcast profile pages and clicks on links displayed thereon, and aggregated information regarding the age, gender, and geographical location of Registered Users driving that traffic.</p>\r\n	</li>\r\n	<li>\r\n	<p>We do not share personally-identifying information of Registered Users with any third party.</p>\r\n	</li>\r\n	<li>\r\n	<p>We are committed to working with you to reach the right balance of what information we collect, use, and share, by providing you with ways to control information that we collect, through our opt-out mechanisms.</p>\r\n	</li>\r\n	<li>\r\n	<p>We take reasonable measures to secure your sensitive personally-identifiable information, but we cannot promise, and you should not expect, that your sensitive personally-identifiable information will remain secure in all circumstances.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>1.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Information Collected by PodSearch</strong></p>\r\n\r\n<p>When we use the term &ldquo;information&rdquo; we are referring to both personally-identifiable information and non-personally-identifiable information that we collect about you.</p>\r\n\r\n<p><strong>1.1.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>&ldquo;Personally-identifiable information&rdquo; refers to information that personally identifies you, or can reasonably be linked to you by us. Personally-identifiable information can either be &ldquo;sensitive&rdquo; or &ldquo;non-sensitive.&rdquo; &ldquo;Sensitive personally-identifiable information&rdquo; refers to information that is generally considered confidential such as your credit card number, billing information, and precise location.</p>\r\n\r\n<p><strong>1.1.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>&ldquo;Non-sensitive personally-identifiable information&rdquo; refers to information that is generally not considered confidential, such as your name, age, email address, general geographic information (e.g., zip code), account preferences, and business information.</p>\r\n\r\n<p><strong>1.1.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>&ldquo;Non-personally-identifiable information&rdquo; refers to information that does not specifically identify you, or has been processed so as to effectively prevent your identification, and may include data associated with a particular computer or device you are using that does not personally identify you.</p>\r\n\r\n<p><strong>1.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; How PodSearch Uses the Information</strong></p>\r\n\r\n<p>Our primary purpose in collecting information about you is to provide you with services, information, and advertisements that match your interests and preferences. For example, we may use this information to respond to your inquiries, administer your account, send marketing, and assess your needs and interests in order to better tailor advertising, improve our website and marketing, conduct research, display information based upon your interests, allow you to search information on our site and, in the case of Podcasters, list you and your podcasts in our PodSearch&trade; Directory. We do this on behalf of ourselves and the Podcasters that place information, banner ads in the PodSearch&trade; Directory, and display ads in PodSearch marketing materials. We also use traffic data received through our technologies to provide Podcasters information about the general demographic characteristics of Listeners who may be interested in the Podcasters&rsquo; podcasts.</p>\r\n\r\n<p><strong>1.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; How PodSearch Collects the Information</strong></p>\r\n\r\n<p>We collect information from you by asking that you provide it to us on-line, through a mobile application or device or via other means by which we communicate with you. We also collect information when you choose to communicate with us and when Companies choose to utilize our services to communicate with Podcasters. We also collect information about your interactions with third-party websites via links placed on our site or mobile app. Information we collect may include:</p>\r\n\r\n<p><strong>1.3.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Identification data (for example, your name, username, password, and email address);</p>\r\n\r\n<p><strong>1.3.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Profile information (for example, your age, gender, zip code, and any information that you choose to make available, such as your areas of interest, when you set up your Registered User account);</p>\r\n\r\n<p><strong>1.3.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Services that you purchase through the PodSearch&trade; Site;</p>\r\n\r\n<p><strong>1.3.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>The content of any communications you choose to have with us related to the services we make available (for example, e-mails, instant messages, recorded telephone calls, etc.). We may also collect information from you automatically. For instance, we, like many websites and applications, may automatically collect information including the computer or wireless device you use, unique device identifier, location data, the type of browser and operating system that you use, the internet provider or wireless carrier you use, the webpages or applications you view, the time and duration of your visits, the search queries that you enter, and how you interact with advertising. Among other things, we may use the following technologies to automatically collect information:</p>\r\n\r\n<p><strong>1.3.4.1</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Cookies&rdquo; are small data files placed on your computer by the websites you visit and the emails you read and can be used to help recognize you when you return to a website, or when you visit other sites. We, or third party service providers, may use cookies to, among other things, measure activity, personalize your experience, remember your viewing preferences, or track your status or progress when accessing our site. For some of these purposes our cookies may be tied to personally-identifiable information. If you choose, you can set your browser to reject cookies or you can manually delete some or all of the cookies, on your computer by following your browser&rsquo;s help file directions. If your browser is set to reject cookies or you manually delete cookies, you may have trouble accessing and using some of the pages and features that are currently on our website, or that we may put on our website in the future.</p>\r\n\r\n<p><strong>1.3.4.2</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PodSearch and our marketing partners, affiliates, analytics or service providers may use technologies such as cookies, beacons, scripts and tags. These technologies are used in analyzing trends, administering the website, tracking users&rsquo; movements around the site, and gathering demographic information about our user base as a whole. We may receive reports based on the use of these technologies by these companies on an individual and aggregated basis. Various browsers may offer their own management tools for removing these types of tracking technologies.</p>\r\n\r\n<p><strong>1.3.4.3</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Unique Identifiers&rdquo; are unique strings of characters that are used to identify you, your computer, or your mobile device. Such identifiers may be preset on your computer or mobile device. We may use unique identifiers to recognize you when you visit our sites or use our mobile applications.</p>\r\n\r\n<p><strong>1.3.4.4</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We may use mobile analytics software to allow us to better understand the functionality of our mobile software on your phone. This software may record information such as how often you use the application, the events that occur within the application, aggregated usage, performance data, and where the application was downloaded from. We do not link the information we store within the analytics software to any personally identifiable information you submit within the mobile application.</p>\r\n\r\n<p><strong>1.3.4.5</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Local Shared Objects,&rdquo; &ldquo;LSO&rsquo;s,&rdquo; or &ldquo;Flash Cookies&rdquo; are data files similar to cookies, except that they can store more complex data. Third parties with whom we partner to provide certain features on our website may use Flash cookies to remember settings, preferences, and usage. Cookie management tools provided by your browser will not remove them. To learn how to manage privacy and storage settings for LSO&rsquo;s or Flash Cookies click here:</p>\r\n\r\n<p>(http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager.html#117118).</p>\r\n\r\n<p><strong>1.3.4.6&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp; We may use Local Storage, such as HTML5, to store content information and preferences. Third parties with whom we may partner to provide certain features on our website or to display advertising based upon your web browsing activity may also use HTML5 to collect and store information. Various browsers may offer their own management tools for removing HTML5.</p>\r\n\r\n<p><strong>1.3.4.7</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Telephone Caller ID&rdquo; refers to information automatically transmitted about you when you call someone. If you call a telephone number that we have provided to you, your caller ID may be recorded. Most telephone providers will, upon request, block your caller ID. Such services may not always be effective if you choose to call a pay-per-call (900) or toll-free number.</p>\r\n\r\n<p><strong>1.3.4.8&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Web beacons&rdquo; or &ldquo;clear pixels&rdquo; are small graphic images on a Web page or in an e-mail that can be used for such things as recording the pages and advertisements clicked on by users, or tracking the performance of e-mail marketing campaigns. A &ldquo;web server log&rdquo; is a record of activity created by the computer that delivers the webpages you request to your browser. For example, a web server log may record the search term you entered or the link you clicked to bring you the webpage. The Web server log also may record information about your browser, such as your IP address and the cookies set on your browser by the server.</p>\r\n\r\n<p><strong>1.3.4.9</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A &ldquo;widget&rdquo; is a program or application that can be embedded in a web page or mobile application. Widgets can provide real-time information, such as stock quotes or weather reports, or take information, such as restaurant reservations or online food orders. Widgets are often provided and hosted by a third party, and may allow that third party to collect data about users viewing that page or interacting with that widget, possibly subject to privacy policies other than PodSearch&rsquo;s. We may also use Social Media Features, such as the Facebook Like button. In addition to information you fill in, these features may collect your IP address, which page you are visiting on our site, and may set a cookie to enable the feature to function properly.</p>\r\n\r\n<p><strong>1.3.4.10</strong>&nbsp;&nbsp; We may allow you to log in to our site using &ldquo;sign-in services&rdquo; such as Facebook Connect or an Open ID provider. These services will authenticate your identity and provide you the option to share certain personally-identifiable information with us, such as your name and email address to prepopulate our sign-up form, or to post information to your account.</p>\r\n\r\n<p><strong>1.3.4.11</strong>&nbsp;&nbsp; &ldquo;Geo-location technologies&rdquo; refers to technologies that permit us to determine your location. We may ask you to manually provide precise location information on our website, or to enable your mobile device to send us precise location information in order to collect data that assist Podcasters.</p>\r\n\r\n<p><strong>1.3.4.12</strong>&nbsp;&nbsp; We may also automatically use information from your web server or computer to determine general location information, such as the city in which you live.</p>\r\n\r\n<p><strong>1.3.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>In addition to information that we collect from you, we may collect information about you from third parties for purposes such as ad targeting, optimization and reporting.</p>\r\n\r\n<p><strong>1.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; With Whom PodSearch Shares the Information</strong></p>\r\n\r\n<p>We may share information about you with third parties in certain circumstances including in the following situations:</p>\r\n\r\n<p><strong>1.4.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Companies using PodSearch DIY&trade;. &nbsp;If you decide to communicate with a Podcaster by clicking on the &ldquo;contact&rdquo; button in PodSearch DIY&trade;, we may share non-personally-identifiable information with the Podcaster, including clicks.</p>\r\n\r\n<p><strong>1.4.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Business Transition. In the event that we, or part, or all, of our assets are acquired, we may share all types of information with the acquiring company. You will be notified via email or a notice on our website of any change in ownership or uses of your personally-identifiable information, as well as any choices you may have regarding your personally-identifiable information.</p>\r\n\r\n<p><strong>1.4.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>In-line Applications &amp; Tools. We may offer applications, tools, or widgets on our website or in our applications that indicate that they are &ldquo;powered by&rdquo; a third party. If you use those applications and tools we may share non-sensitive personally-identifiable information and any additional information you provide as part of that use with that third party. The third party&rsquo;s use of that information is subject to their privacy policy.</p>\r\n\r\n<p><strong>1.4.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Law Enforcement. We may report to law enforcement agencies any activities that we reasonably believe to be unlawful, or that we believe may aid a law enforcement investigation. In addition, we reserve the right to release all types of information to law enforcement agencies if we determine, in our sole judgment, that either you have violated our policies, or the release of information about you may protect the rights, property or safety of us or another person.</p>\r\n\r\n<p><strong>1.4.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Legal Processes. We may share all types of information with others as required by, or permitted by, law. This may include sharing all types of information with governmental entities, or third parties in response to subpoenas, court orders, other legal process, or as we believe is necessary to exercise our legal rights, to defend against legal claims that have been brought against us, or to defend against possible legal claims that we determine in our sole discretion might be brought against us.</p>\r\n\r\n<p><strong>1.4.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Service Providers. We may share some information with people and companies that provide us with applicable services. These services may include, among other things, helping us provide services that you request, create or maintain our databases, research or analyze the people who use our websites, a mapping service provider to provide a map of the location you are in, and/or process payment card information. Unless you consent, we do not permit our service providers to market their own products or services to you directly. We also require our service providers to agree to take reasonable steps to keep the personally-identifiable information that we provide to them secure. In some instances, we may maintain the look and feel of our site while you are on our service provider&rsquo;s site. You should look for the &ldquo;privacy policy&rdquo; link of any page on which you are submitting information to determine if this privacy policy, or another company&rsquo;s privacy policy, governs.</p>\r\n\r\n<p><strong>1.4.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Other Third Parties (without your consent). &nbsp;We may share non-personally-identifiable information with other third parties that are not described above. When we do so we endeavor to either aggregate or de-identify the information so that a third party would not be likely to link data to you, your computer, or your device. &nbsp;Aggregation means that we combine the non-personally-identifiable information of numerous people together so that the data does not relate to any one person. &nbsp;De-identify means that we remove or change (for example, hash) certain pieces of information that might be used to link data to a particular person.</p>\r\n\r\n<p><strong>1.4.8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Other Third Parties (with your consent). &nbsp;We may share any information, including sensitive personally-identifiable information, with other third parties that are not described above if you give us consent to do so.</p>\r\n\r\n<p><strong>1.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; How PodSearch Secures Your Information</strong></p>\r\n\r\n<p>We take our commitment to securing personally-identifiable information in our possession seriously. &nbsp;When you provide your credit card number we protect your information during transmission and storage through the use of encryption. For other types of information, we use reasonable measures to help prevent the information from becoming disclosed to individuals who are not described in this policy. &nbsp;It is important for you to protect against unauthorized access to your password and to your computer. &nbsp;No security measures are perfect and we cannot promise that the information about you will remain secure in all circumstances.</p>\r\n\r\n<p><strong>1.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Your Privacy Choices</strong></p>\r\n\r\n<p>We provide you with the following information management choices:</p>\r\n\r\n<p><strong>1.6.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Revising Your Information. &nbsp;If your personally-identifiable information changes, or if you no longer desire our services, you may correct, update, or delete information about you, or ask that it be removed from the PodSearch&trade; Site by logging in and viewing your user profile via the &ldquo;Profile&rdquo; and &ldquo;Account Settings&rdquo; links on PodSearch.com or by contacting us at the email address or mailing address indicated below. We will attempt to respond to your requests within 30 days. In some cases, we may not be able to remove your personally-identifiable information, in which case we will let you know if we are unable to do so and why.</p>\r\n\r\n<p><strong>1.6.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Do Not Track signal. &nbsp;We treat the data of everyone who comes to our site in accordance with this privacy policy, whatever their Do Not Track setting.</p>\r\n\r\n<p>You can exercise your choices as described in this section of our privacy policy. We will retain your personally-identifiable information for the period necessary to fulfill the purposes outlined in this Privacy Policy unless a longer retention period is permitted by law.</p>\r\n\r\n<p><strong>1.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Additional Information</strong></p>\r\n\r\n<p>1.7.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other Websites. &nbsp;This privacy policy does not apply to websites or applications offered by other companies or individuals, including sites that may be displayed on a Podcaster&rsquo;s profile page. We encourage you to read the privacy policies of any third-party website before transmitting personally-identifiable information.</p>\r\n\r\n<p><strong>1.7.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Other Contractual Relationships. &nbsp;If you enter into a separate contractual relationship with us which requires, or contemplates, collecting, using, sharing, or securing information about you in a manner that is different than that which is described in this policy, the terms of that contract will apply.</p>\r\n\r\n<p><strong>1.7.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Your California Privacy Rights. &nbsp;Under California Civil Code sections 1798.83-1798.84, California residents who have an established business relationship with us are entitled to ask us for a notice describing what categories of personal customer information we share with third parties or corporate affiliates for those third parties or corporate affiliates&rsquo; direct marketing purposes. That notice will identify the categories of information shared and will include a list of the third parties and affiliates with which it was shared, along with their names and addresses. If you are a California resident and would like a copy of this notice, please submit a written request to the following address:&nbsp;<br />\r\n<br />\r\nBAKER WILLIAMS MATTHIESEN LLP</p>\r\n\r\n<p>5005 Woodway Drive Suite 201, Houston, Texas 77056</p>\r\n\r\n<p>713.888.2507</p>\r\n\r\n<p>rocky@bwmtx.com</p>\r\n\r\n<p>Please allow 30 days for a response.</p>\r\n\r\n<p><strong>1.7.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Children. &nbsp;Our site is intended for a general, adult audience, and we never knowingly collect personally identifiable information from anyone under the age of 13.</p>\r\n\r\n<p><strong>1.7.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Changes to The Privacy Policy. &nbsp;We may update this privacy policy to reflect changes to our information practices. If we make any material changes to our policy, those changes will apply to information collected after the effective date listed, and we will notify you by placing a notice on our websites prior to the change becoming effective. We encourage you to periodically review this page for the latest information on our privacy practices.</p>\r\n\r\n<p><strong>1.7.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>How We Communicate With You. &nbsp;If you have any questions or concerns regarding our privacy policy please contact us at: Email address: customerservice@podsearch.com, Mailing address: 21550 Oxnard Street Suite 460, Woodland Hills, CA 91367. If we need, or are required, to contact you concerning any event that involves information about you, we may do so by email, telephone, or mail.</p>\r\n\r\n<p><strong>1.7.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Effective Date: May 2, 2017</p>\r\n\r\n<p><strong>1.8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email Communications Policy</strong></p>\r\n\r\n<p>PodSearch may communicate with you via email. &nbsp;If you do not want to receive emails from us about products or services that we offer, you can &ldquo;opt-out&rdquo; from receiving such emails by clicking on the &ldquo;unsubscribe&rdquo; link provided at the bottom of any marketing email that you receive. Please note that if you choose to opt-out we may still send you non-marketing emails. &nbsp;For example, we may send you an email about a specific product or service that you request, we may respond to a message from you, or we may send you an email about the terms and conditions of our websites. If you decide at a later time that you would like to receive commercial emails from us, you can re-add yourself to our communication list.&nbsp;</p>', 'privacy-policy', 'Privacy Policy, Privacy, Policy', 'Privacy Policy', 1, '2018-08-21 12:12:26', '2018-08-21 12:50:10'),
(4, 'What We Do', 'what-we-do', '<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at paul@dummymag.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\r\n\r\n<p>&nbsp;</p>', 'What We Do', 'What We Do', 'What We Do', 1, '2018-08-21 12:16:00', '2018-08-21 12:50:23'),
(5, 'Help', 'help', '<p><strong>How much does it cost to sign up as a Listener?</strong>&nbsp;<br />\r\nThe PodSearch&trade; website and app (available for both iOS and Android devices) is free for all Listeners. &nbsp;You can sign up for a free account to get special features, like bookmarking podcasts to save them across all of your devices.&nbsp;</p>\r\n\r\n<p><strong>Is there a mobile app for PodSearch&trade;?</strong>&nbsp;<br />\r\nYes! PodSearch has a free mobile app for listeners that is available for&nbsp;<a href=\"https://itunes.apple.com/us/app/podsearch/id1230358011?mt=8\" target=\"_blank\">iOS</a>&nbsp;and&nbsp;<a href=\"https://play.google.com/store/apps/details?id=com.newmark.podsearch&amp;hl=en\" target=\"_blank\">Android devices</a>. Just go to the&nbsp;<a href=\"https://itunes.apple.com/us/app/podsearch/id1230358011?mt=8\" target=\"_blank\">App Store</a>&nbsp;or the&nbsp;<a href=\"https://play.google.com/store/apps/details?id=com.newmark.podsearch&amp;hl=en\" target=\"_blank\">Google Play</a>&nbsp;store and search for &quot;PodSearch&quot;.</p>\r\n\r\n<p><strong>What is the MyPodSearch&trade; tool?</strong>&nbsp;<br />\r\nThe MyPodSearch&trade; feature was designed to help listeners easily find podcasts that match all of their interests in one screen. Instead of having to search category by category, MyPodSearch&trade; allows you to choose all categories that interest you at once. You can enter up to three keywords that you want to search for, as well. Once you have made your selections, click the yellow &quot;Get MyPodSearch&trade; Results Below!&quot; button to generate a consolidated list of podcasts that match your interests</p>\r\n\r\n<p><strong>What does &quot;Top Shows&quot; mean?</strong>&nbsp;<br />\r\nThe&nbsp;<strong>Top Shows</strong>&nbsp;tab will show you the Top 100 podcasts listed in PodSearch by average audience size.</p>\r\n\r\n<p><strong>What does &quot;New Shows&quot; mean?</strong>&nbsp;<br />\r\nThe&nbsp;<strong>New Shows</strong>&nbsp;tab will show you podcasts that have launched within the last three months. Stay in-the-know about new podcasts by checking this tab regularly.</p>\r\n\r\n<p><strong>What does &quot;Bookmark This&quot; mean?</strong>&nbsp;<br />\r\nThe &quot;Bookmark This&quot; feature allows you to save podcast pages to review or listen to later. If you find podcasts that you want to save, simply click the &quot;Bookmark This&quot; link or bookmark icon.</p>\r\n\r\n<p><strong>How do I find my Bookmarked Podcasts?</strong>&nbsp;<br />\r\nTo find your list of Bookmarked Podcasts:</p>\r\n\r\n<ul>\r\n	<li><strong>PodSearch Website</strong>: Go to the&nbsp;<strong>MyPodSearch</strong>&nbsp;tab and click the &quot;See My Bookmarked Podcasts&quot; link at the top right. You can also access your Bookmarked Podcasts by going to the Welcome menu at the top right and clicking the Profile section.</li>\r\n	<li><strong>PodSearch App</strong>: Click the&nbsp;<strong>MyPodSearch</strong>&nbsp;tab at the bottom, then click the My Bookmarked Podcasts tab under the search bar. You can also click the Settings gear in the top right corner and select My Bookmarked Podcasts.</li>\r\n</ul>\r\n\r\n<p><strong>What are &quot;Show Samples&quot;?</strong>&nbsp;<br />\r\nShow samples are quick audio clips from the podcast to give you an idea of what it sounds like.</p>\r\n\r\n<p><strong>How do I listen to a podcast?&nbsp;</strong>&nbsp;<br />\r\nUse any of the PodSearch search features to find a podcast that matches your interests. Once you get to the podcast&#39;s page, go to the &quot;Listen Now&quot; section on the right side to find the listening platform that works with your device. Click that button and you can start listening right away!</p>\r\n\r\n<p><strong>What does &quot;subscribe to a podcast&quot; mean?</strong>&nbsp;<br />\r\nSubscribing to a podcast means that you are telling your device to automatically download new episodes of that podcast for you as they are released. It&#39;s the best and easiest way to make sure that podcast episodes are ready for you to hear whenever you want. For most podcasts, it is absolutely free to subscribe. For some podcasts though, there may be a subscription fee.</p>\r\n\r\n<p><strong>How do I subscribe to a podcast?</strong>&nbsp;<br />\r\nWhen you click on a &quot;Listen Now&quot; button for either Apple or Android devices through the PodSearch podcast page, you will be taken to a listening page where you can subscribe to the podcast. There will be a &quot;Subscribe&quot; button near the top of the listening platform page. Hit that button to start automatically downloading new epiosdes of that podcast as they are released. If you ever want to unsubscribe to a podcast, you can just hit the Unsubscribe button on the podcast listening page.</p>\r\n\r\n<p><strong>How are podcasts ranked?</strong>&nbsp;<br />\r\nBy default, podcasts are ranked according to their number of average downloads per episode provided by the podcasts (referred to as &quot;Popularity&quot; in PodSearch). On the Top Shows and New Shows tabs, you can also sort by category using the &quot;Sort By&quot; dropdown menu.</p>\r\n\r\n<p><strong>Why should I sign up for a free Listener account?</strong>&nbsp;<br />\r\nSigning up for a free account gives you access to special features, like bookmarking podcasts to make them available across all of your devices.&nbsp;</p>\r\n\r\n<p><strong>How do I change my password?</strong>&nbsp;<br />\r\nChanging your password is easy. On the PodSearch website, go to the Welcome menu and click Account Settings to change your password. On the PodSearch app, click the Settings gear and click Profile to change your password.</p>\r\n\r\n<p><strong>I have a question not covered here.</strong>&nbsp;<br />\r\nPlease feel free to contact us directly through our&nbsp;<a href=\"http://www.podsearch.com/contactus\">Contact Us</a>&nbsp;page with any additional questions.</p>', 'Help', 'Help', 'Help', 1, '2018-08-21 12:22:17', '2018-08-21 12:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('praveenk@clovity.com', '$2y$10$HW0r4FYhgWdp9X1ubjD1aOjswkBBtpMlH5vc0EW835y30oHlaqM2G', '2018-07-22 09:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1534782886-blog-entry1.jpg', '2018-08-20 11:04:46', '2018-08-20 11:04:46'),
(2, '1534782906-blog-entry3.jpg', '2018-08-20 11:05:06', '2018-08-20 11:05:06'),
(3, '1534782925-blog-entry4.jpg', '2018-08-20 11:05:25', '2018-08-20 11:05:25'),
(4, '1534782944-blog-entry5.jpg', '2018-08-20 11:05:44', '2018-08-20 11:05:44'),
(5, '1534782958-blog-entry6.jpg', '2018-08-20 11:05:58', '2018-08-20 11:05:58'),
(6, '1534783009-grid-thumb-1.jpg', '2018-08-20 11:06:49', '2018-08-20 11:06:49'),
(7, '1534783060-grid-thumb-5.jpg', '2018-08-20 11:07:40', '2018-08-20 11:07:40'),
(8, '1534783092-grid-thumb-3.jpg', '2018-08-20 11:08:12', '2018-08-20 11:08:12'),
(9, '1534783145-grid-thumb-7.jpg', '2018-08-20 11:09:05', '2018-08-20 11:09:05'),
(10, '1534783348-blog-entry-col3.jpg', '2018-08-20 11:09:27', '2018-08-20 11:12:28'),
(11, '1534783201-blog-entry-minimal4.jpg', '2018-08-20 11:10:01', '2018-08-20 11:10:01'),
(12, '1534783222-grid-thumb-8.jpg', '2018-08-20 11:10:22', '2018-08-20 11:10:22'),
(13, '1534783244-grid-thumb-3.jpg', '2018-08-20 11:10:44', '2018-08-20 11:10:44'),
(14, '1534783260-grid-thumb-9.jpg', '2018-08-20 11:11:00', '2018-08-20 11:11:00'),
(15, '1535274140-blog-entry-minimal1.jpg', '2018-08-26 03:32:20', '2018-08-26 03:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'slug',
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-active, 0-inactive',
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `photo_id`, `title`, `seo_url`, `excerpt`, `body`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'PHP Best frameworke- Laravel', 'php-best-framework-laravel', 'PHP Best frameworke- Laravel', '<h2>Welcome to <strong>CK Editor</strong>: My First Demo</h2>\r\n\r\n<p><br />\r\nPHP Best frameworke- <strong>Laravel<br />\r\n<br />\r\n<img alt=\"\" src=\"http://myblog.localhost.com/files/blog-author2.jpg\" style=\"height:150px; width:150px\" />&nbsp;<img alt=\"\" src=\"http://myblog.localhost.com/files/blog-author1.jpg\" style=\"height:150px; width:150px\" /><br />\r\n<a href=\"http://www.google.com\">Google</a>&nbsp;<a href=\"http://www.facebook.com\">Facebook</a></strong></p>', 'PHP Best frameworke- Laravel', 'PHP Best frameworke- Laravel', 'PHP Best frameworke- Laravel', 1, 1, '2018-07-28 18:30:00', '2018-08-28 06:17:59'),
(8, 1, 2, 'PHP Best frameworke- Laravel', 'php-best-frameworke-laravel-1', 'PHP Best frameworke- Laravel', '<p>PHP Best framework- <em><strong>Laravel</strong></em></p>', 'PHP Best frameworke- Laravel', 'PHP Best frameworke- Laravel', 'PHP Best frameworke- Laravel', 1, 1, '2018-08-09 12:07:12', '2018-08-20 11:05:06'),
(10, 1, 3, 'PHP Best frameworke- Laravel', 'php-best-frameworke-laravel-2', 'lorem-ipsum', '<p>lorem-ipsum<strong><s><em> lorem-ipsum</em></s></strong> lorem-ipsum lorem-ipsum</p>', 'lorem-ipsum', 'lorem-ipsum', 'lorem-ipsum', 1, 1, '2018-08-11 03:02:12', '2018-08-20 11:05:25'),
(11, 1, 4, 'Lorem Ipsum', 'lorem-ipsum', 'lorem-ipsum', '<p>PHP Best framework- <strong>Laravel&nbsp;</strong></p>', 'lorem-ipsum', 'lorem-ipsum', 'lorem-ipsum', 1, 1, '2018-08-11 03:04:59', '2018-08-20 11:05:45'),
(24, 1, 5, 'Post 1', 'post-1', 'Earum molestias hic neque repellat voluptate natus. Tenetur maxime itaque suscipit ut hic repudiandae. Omnis tenetur iure incidunt dolorem. Exercitationem saepe dolor ut aut repellat nisi.', '<p>Ut placeat distinctio libero voluptas ducimus nesciunt voluptatem. Et fugit harum vel ut. Dolorum dolorum assumenda corporis fuga et quos nesciunt. Earum voluptatem hic aut dolores mollitia minima. Illum pariatur quia occaecati nostrum. Incidunt quo repudiandae voluptas sit perspiciatis. Aperiam esse autem ipsum nobis. Eveniet iste voluptatem iste iusto inventore. Rerum quas explicabo qui sit praesentium. Aut cum quos dignissimos consequuntur voluptatem at. Excepturi ab minima ut non et magnam minus. Et suscipit enim explicabo id deleniti. Et quod ullam rerum et quos delectus nihil. Unde voluptatem in exercitationem autem. Odio et animi consectetur. Eius deleniti quas vitae aut soluta dolorum repellat. Facilis rerum soluta qui minima dignissimos ea harum. Fugit accusamus ut et et nesciunt illum. Doloremque consectetur et qui qui. Impedit suscipit omnis iste et exercitationem in. Numquam assumenda nihil sequi sapiente. Eligendi ducimus qui eius facilis minima ad ut dolores. Vel commodi non quia nisi autem libero. Ab voluptate magni dolores voluptate earum nobis iure. Qui deserunt et quia culpa doloremque totam. Labore minus ut consequuntur omnis. Eligendi laudantium sit impedit aut. Et distinctio perferendis magnam dolores ipsam voluptates. Est qui a quam assumenda impedit ratione qui minus. Temporibus autem qui vel. Dolores quam nihil qui ut velit vel facilis et.</p>', 'Post 1', 'ut,laudantium,iusto', 'Minus blanditiis est qui adipisci quia.', 1, 1, '2018-06-06 06:16:13', '2018-08-26 00:52:04'),
(25, 1, 6, 'Post 2', 'post-2', 'Voluptatem et quis est ducimus sint voluptatem. Perferendis recusandae eaque aliquid autem. Consequatur ut officiis error aspernatur eveniet aut.', '<p>Natus perferendis ullam quia nostrum. Assumenda id est enim. Ullam iure laboriosam minima ratione. Eveniet fugit tenetur praesentium qui consequatur molestiae. Voluptate iure non ut et laudantium delectus dignissimos. Omnis voluptas et ex. Dolorem aut veritatis maiores et voluptatem. Quibusdam rem commodi ut eligendi et. Sed nobis enim eum eos. Eligendi earum id sequi ut. Voluptas minus est officia dolor ut. Placeat reiciendis numquam quos molestias sint optio qui ex. Sit alias molestias placeat quas quos optio vero. Nostrum quidem magni non ab et. Voluptatem et quia quia id. Doloremque rerum id voluptatem laboriosam sit sit. Est vel consequatur aut facere dolorem odit sunt. Ut non voluptas tempora. Consequatur ut eos sed dolor voluptatem non omnis. Harum harum inventore ut quisquam rerum nulla asperiores. Et autem officiis qui perspiciatis sit itaque quia. Ratione quidem officia corrupti officiis. Neque neque excepturi distinctio qui commodi voluptatem sunt. Aliquam tempora enim a fuga modi velit sint. Fugit quas id reprehenderit maxime ut dolorem quia. Architecto velit natus dolore soluta exercitationem et. Sit ab excepturi suscipit dolorum. Alias facilis aut numquam dolor nobis aliquam voluptatem. Voluptatem et quis sit quo et maiores cum.</p>', 'Post 2', 'eos,delectus,ducimus', 'Quia tenetur repellendus facere laudantium ut nostrum.', 1, 1, '2018-06-06 06:16:14', '2018-08-26 00:52:13'),
(26, 1, 7, 'Post 3', 'post-3', 'Aut saepe magni cumque tempora ullam quae labore. Laboriosam nihil voluptas voluptatem qui quisquam ea nihil accusantium. Nihil excepturi id eligendi quam minima dolores. Quam qui earum impedit excepturi voluptates. Sunt nihil reprehenderit vero soluta.', '<p>Est doloribus et sunt optio. Aut officiis eius vitae totam accusamus. Omnis vel numquam vel eius beatae quo. Perferendis odio iure quia et nesciunt. Dolore nemo ipsa eum rerum ipsam hic. Aut impedit recusandae iure autem est quidem corporis. Est est saepe ea est possimus cumque quo hic. Qui quis nihil tempore suscipit eaque ducimus. Consectetur cum eveniet dolores est. Est neque tempore molestiae consequatur occaecati eveniet incidunt. Veritatis sint officia sit explicabo sapiente. Voluptatum atque voluptas aliquam dignissimos pariatur sunt incidunt. Est est tempore laboriosam rerum. Sapiente dolore aut possimus consectetur. Iste consectetur iure modi culpa eum. Dolores impedit tempore esse quasi fugiat. Suscipit architecto eius veritatis aut. Molestias sunt consequatur vel beatae. Quia et nisi qui dolores exercitationem cupiditate. Dolorem sed animi ad minus dolorum. Ipsa consequuntur exercitationem temporibus facilis ea unde. Repellat ea alias et eius. Eum necessitatibus recusandae qui. Sequi delectus autem aspernatur quisquam. Numquam adipisci qui voluptate expedita odio. Tenetur quidem perspiciatis itaque consequatur. Non ut consequatur veniam qui. Necessitatibus a dolores ut et iusto distinctio vero. Accusantium sit ratione aspernatur. Architecto et quas fugiat.</p>', 'Post 3', 'quam,qui,magni', 'Est repellendus autem beatae qui dolores.', 1, 0, '2018-06-06 06:16:16', '2018-08-20 11:07:41'),
(27, 1, 8, 'Post 4', 'post-4', 'Nihil necessitatibus consectetur repellat occaecati cupiditate a. Rerum omnis et odit omnis. Est expedita corporis nesciunt et voluptatem voluptate enim. Voluptas sed rem nulla et delectus neque. Dicta et atque natus optio odit ipsum blanditiis.', '<p>Nihil eos unde adipisci tenetur perspiciatis sunt voluptas. Ea consequatur nisi cupiditate tempora nobis. Aperiam doloremque aliquid placeat doloribus sapiente error. Magnam magnam ut atque molestiae ad voluptatem perferendis ut. Veritatis totam similique ea et. Molestiae architecto voluptas praesentium quia. Qui ut omnis quasi rem. Voluptas nulla consequuntur saepe maxime similique. Velit illum delectus sit quia perspiciatis nisi. Culpa esse sit autem qui illum dolorem. Molestiae neque non assumenda ut voluptatem. Inventore praesentium repudiandae perspiciatis ut quasi minima. Sit ut reprehenderit magni vitae voluptate molestiae voluptatem. Praesentium autem nostrum aliquam et quia quis quidem. Rerum facilis voluptatibus consequatur in ipsam ea sunt. Quis minima molestiae perferendis unde voluptate. Ut voluptatem eaque dolor quae doloremque quos. Odio alias aut qui eveniet. Asperiores repellendus non quidem velit. Autem aut dicta itaque minus consequatur non delectus. Ipsum nulla id quam. Quia distinctio et deleniti eveniet necessitatibus ea. Quidem iste sunt earum et optio amet deleniti corporis. Non qui enim ut veritatis. Voluptate non eum non aliquid suscipit culpa ut. Quidem consequuntur sequi quia ullam dolorem provident. Tenetur placeat et at iste. Dolores sunt rerum praesentium eos rem sequi. Rem eos officiis recusandae consectetur harum. Id ullam magnam odit consequatur.</p>', 'Post 4', 'velit,nihil,sequi', 'Culpa impedit et amet.', 1, 0, '2018-06-06 06:16:16', '2018-08-20 11:08:13'),
(28, 1, 9, 'Post 5', 'post-5', 'Vel et numquam harum ut sed incidunt fugiat ea. Dolores minima distinctio enim quia numquam sed. Maiores sequi mollitia voluptas earum. Est inventore maxime necessitatibus et qui itaque sapiente.', '<p>Reiciendis saepe quia quia sit ad ratione. Maxime veniam ipsum corrupti quidem. Et molestiae veniam nihil incidunt. Recusandae consequatur ea aliquam fugiat fugit qui. Necessitatibus in fuga ab quia sunt voluptas est labore. Officia aliquid doloribus dolores nam. Sed qui laudantium hic animi neque consequuntur dolores. At tempore ullam inventore iusto autem quos mollitia. Sequi facilis tempore asperiores rerum veniam et. Ratione neque accusamus nisi reprehenderit numquam. Nihil et neque ut autem et deleniti. Molestiae fugit vero odio nihil doloremque. Incidunt dolorem aut itaque dolor molestiae rerum aut. Magni atque facilis quisquam perferendis illo. Omnis qui doloribus dolores quo. Et aut dolorem nulla sit ut impedit cupiditate. Expedita ea dolor placeat. Consequatur harum quam iusto et facilis. Quam rerum illo deserunt provident consectetur. Iste reiciendis rerum officiis amet sapiente ducimus ipsum ea. Et quidem non quaerat corrupti quae. Pariatur quia ipsum doloremque ipsum labore doloremque non. Neque et alias necessitatibus totam possimus id dolores modi. Molestias quia asperiores quo animi qui quis iusto quia. Aperiam praesentium quia aut id. Id autem consectetur laboriosam ducimus aperiam officiis eaque. Accusamus voluptatem ab aperiam velit.</p>', 'Post 5', 'expedita,aliquid,ea', 'Ut cum eum ut molestias voluptas.', 1, 1, '2018-06-06 06:16:16', '2018-08-26 00:52:39'),
(29, 1, 10, 'Post 6', 'post-6', 'Adipisci enim ad rem iste et. Voluptatibus voluptatem saepe perferendis nulla eius a. Quam dolorem voluptatum omnis pariatur autem.', '<p>Soluta adipisci delectus eligendi repellat. Praesentium sunt magnam perferendis. Placeat et et inventore optio ut possimus in. Velit dignissimos voluptatem nesciunt perspiciatis. Eveniet eius deleniti quas incidunt id. Consequatur rerum deserunt et dolorem est. Nemo distinctio unde quam sunt. Cupiditate dolor qui id porro. Sit totam nostrum et porro quaerat nisi saepe. Id soluta incidunt quisquam. Voluptatem ut modi aut error quisquam eveniet. Asperiores esse est officia ipsam molestias asperiores. Et minima deleniti fugiat possimus aut magnam expedita. Quisquam enim eligendi unde a sed pariatur fuga fuga. Nobis rerum et repellat quasi. Laudantium accusamus nulla adipisci quia suscipit nihil. Earum rerum et eligendi perferendis ut molestias. Facere facere nisi placeat omnis rerum saepe aperiam. Nesciunt provident sit odio tempora nemo enim ullam. Cum omnis saepe quibusdam temporibus sunt aut veniam. Odit quod incidunt impedit facere tempore voluptate. Voluptatem natus voluptatibus et qui ducimus. Exercitationem quia velit autem qui. Expedita sequi architecto modi necessitatibus aut blanditiis praesentium dolores. Laudantium architecto architecto ratione totam recusandae quo asperiores. Est ut sapiente neque sit maiores. Reiciendis voluptatum saepe ipsam dolorem earum unde eum. Vel suscipit quia hic deserunt et et.</p>', 'Post 6', 'dignissimos,ducimus,voluptatem', 'Illo id recusandae consequatur repellat sed aut.', 1, 0, '2018-06-06 06:16:17', '2018-08-20 11:09:27'),
(30, 1, 11, 'Post 7', 'post-7', 'Quis nam adipisci quaerat. Aut est eos doloribus et ab reprehenderit quia. Explicabo laboriosam rerum ut fugiat quidem fuga. Qui illum et minima reiciendis provident tempora. Eos consequatur dolorem qui ut neque adipisci unde.', '<p>Rerum qui deleniti in optio quae incidunt. Voluptatibus est maiores et optio qui optio repellendus. Et eos nisi dolor repellat voluptatem minima. Occaecati quidem hic culpa eaque ut dolores quia. Voluptas autem praesentium magnam illo dolorem quis. Repellendus repellendus itaque nihil vel porro aliquam. Earum qui quis quod neque consequatur ut sit. Eveniet debitis sapiente maxime nam error et hic. Ut amet et consequatur eum quam voluptatum sint. Ipsam numquam dignissimos molestias libero. Debitis ex quidem deserunt dolore rem non aspernatur. Aliquid perspiciatis et eaque et. Modi debitis inventore accusamus et quia ut. Labore aut blanditiis qui animi beatae voluptatem. Nobis enim et eos. Accusantium velit quia qui debitis nemo amet quos. Excepturi id rem quis doloribus. Quod magni saepe perspiciatis dolores. Ut magnam totam corrupti aspernatur. Molestiae dolorem dicta aspernatur rerum dignissimos recusandae nihil et. Quis omnis suscipit unde eius eveniet ex qui. Est in occaecati impedit dolor. Quia sed quos ipsa voluptas quisquam molestias hic. Autem libero ut veniam quo facilis voluptatem dolorem. Et possimus itaque modi et omnis nemo sapiente. Quisquam dolores recusandae commodi minima repudiandae. Impedit eligendi incidunt impedit aut hic. Facere enim sit ut. Ullam fugit mollitia ipsa hic repellendus.</p>', 'Post 7', 'deserunt,est,perferendis', 'Et ut eius perferendis.', 1, 0, '2018-06-06 06:16:17', '2018-08-20 11:10:01'),
(31, 1, 12, 'Post 8', 'post-8', 'Omnis nemo consequatur velit et sit incidunt hic. Laboriosam perspiciatis fuga tenetur quod non. Provident sunt quibusdam vel. Vel explicabo minus rerum aliquam excepturi fugit et.', '<p>Repellendus repellat placeat ad assumenda laboriosam dignissimos. Occaecati quis non et suscipit illo. Enim tempore vel illum vero sunt qui porro. Harum consequatur et quae. Nostrum et voluptatem et beatae sed et omnis. Nemo rerum cum consectetur quisquam eos praesentium. Tenetur distinctio vero sapiente officiis explicabo dolore nisi. Beatae eum a est placeat odit. Molestiae aspernatur eum quam est ut. Sint odio atque enim rem. Facilis nesciunt blanditiis delectus excepturi quia. Tenetur nam veniam ducimus occaecati laborum aut atque. Placeat beatae tenetur necessitatibus odio qui deserunt est. Consectetur aut nihil suscipit odit illum beatae. Incidunt ea voluptas fugiat non ex eligendi. Sed voluptates voluptatem laudantium aut non. Labore omnis expedita sequi praesentium nostrum. Dolorem non repellendus quis velit. Voluptatibus illo libero et et suscipit unde amet. Reiciendis ut aperiam sed non error sed sit. Rerum repudiandae eum non quia cumque. Dolor molestias et neque nesciunt laboriosam error voluptatibus. Dolorum officiis et autem non occaecati voluptatem sed. Delectus qui dignissimos quasi totam perspiciatis voluptate nihil. Autem ducimus consequuntur dolor quaerat expedita unde. Eum maiores officiis fugit quibusdam recusandae. Dolor quas doloribus voluptatem maiores. Dolore repudiandae voluptatem id sunt fugit. Aliquid voluptatem et pariatur natus sed.</p>', 'Post 8', 'placeat,aliquam,temporibus', 'Soluta ipsam tenetur deleniti quaerat.', 1, 0, '2018-06-06 06:16:19', '2018-08-20 11:10:22'),
(32, 1, 0, 'Post 9', 'post-9', 'Consequatur sequi temporibus enim. Neque atque quo et rerum. Nihil quis maxime eos aut qui modi. Eos illo iste quaerat voluptatem illum.', '<p>Asperiores dicta necessitatibus ea. Veritatis beatae similique accusantium ad omnis. Nihil laudantium quo dolor expedita. Quia qui voluptas ipsa omnis magni et aut voluptatem. Et molestiae explicabo delectus voluptas voluptates.</p>', 'Post 9', 'minus,facilis,quo', 'Aperiam molestiae ut sed vel harum nulla vel.', 1, 0, '2018-06-06 06:16:19', '2018-08-20 11:10:45'),
(33, 1, 14, 'Post 10', 'post-10', 'Id expedita rerum sunt ullam. Similique aliquid dicta eligendi veniam omnis error quam. Dolor nesciunt totam nobis aspernatur. Ex quo ipsum est eos aliquam dolores. Et sit sint consequatur voluptatem.', '<p>Officia sed id praesentium quia quia. Nisi tempora quam ut assumenda eaque totam quaerat. Qui rerum ipsum consequatur aut eius voluptatum. Ipsa repudiandae repellendus sit aperiam et sint atque. Voluptatem delectus ab voluptas natus nostrum iste. Asperiores doloremque incidunt velit et aperiam iste. Atque reprehenderit repellat et eum aliquam sunt fugiat. Incidunt quam debitis hic sed facilis autem velit porro. Assumenda est doloremque ullam ex. Incidunt et dolorem doloribus omnis et non ipsa vitae. Aliquam id ex harum fugiat quasi occaecati neque quis. Suscipit est inventore delectus eius numquam debitis. Ipsa sunt nam molestiae expedita rerum cumque. Eligendi iste ipsum voluptatem ut odit animi voluptas. Quaerat dolorem exercitationem dolores eos qui. Quis ut eos deleniti consequatur aperiam ut. Velit quia aut rerum voluptas voluptatem autem. Voluptas fugit consequatur voluptas dolores modi. Officiis qui dolorem ut. Eum odit adipisci ut est a numquam eligendi soluta. Ad animi ipsum deserunt inventore. Corrupti harum voluptate autem velit eos voluptatem et. Sint officia facere aperiam sit atque corrupti et. Praesentium ut explicabo rerum nisi.</p>', 'Post 10', 'rerum,qui,nobis', 'Et aspernatur aliquid ea quo est dignissimos vitae.', 1, 0, '2018-06-06 06:16:19', '2018-08-20 11:11:00'),
(34, 1, NULL, 'Test magic post', 'test-magic-post', 'Test magic post', '<p>Test magic postTest magic postTest magic postTest magic post 1234</p>', 'Test magic post', 'Test magic post', 'Test magic post', 1, 0, '2018-08-25 21:08:31', '2018-08-25 21:35:49'),
(35, 1, 15, 'Test posts111', 'test-posts111', 'Test posts111', '<p>Test posts111<br />\r\nTest posts111<br />\r\nTest posts111<br />\r\nTest posts111<br />\r\nTest posts111</p>', 'Test posts111', 'Test, posts111', 'Test posts111 description', 1, 0, '2018-08-26 03:32:20', '2018-08-26 03:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(10, 34, 8, NULL, NULL),
(12, 34, 10, '2018-08-25 22:14:21', '2018-08-25 22:14:21'),
(13, 35, 10, '2018-08-26 03:32:21', '2018-08-26 03:32:21'),
(14, 35, 11, '2018-08-26 03:33:42', '2018-08-26 03:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2018-07-27 18:30:00', '2018-07-27 18:30:00'),
(2, 'Subscriber', '2018-07-27 18:30:00', '2018-07-27 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-07-27 22:46:15', '2018-07-28 06:46:29'),
(2, 41, 2, '2018-07-27 18:30:00', '2018-07-27 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(8, 'love', '2018-08-25 22:08:53', '2018-08-25 22:08:53'),
(10, 'magic', '2018-08-25 22:14:21', '2018-08-25 22:14:21'),
(11, 'Lifestyle', '2018-08-26 03:33:42', '2018-08-26 03:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` enum('Administrator','User') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'status',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `gender`, `dob`, `role`, `profileimage`, `contactno`, `valid`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'delhi.praveenkumar@gmail.com', '$2y$10$sugVJOc6H4B32XO8mLU1nOoEOV0U.5xzVOn7/GzQbkDUxweuqBsgm', 'BqVMBe8UDcv500Lp3OxDJ4T3u2lTTrceoyds0OkIXT24NBRsIdgETHJHNUw9', 'M', '2017-06-20', 'Administrator', NULL, NULL, 1, '2018-06-18 12:30:00', '2018-06-18 12:45:21'),
(13, 'Simeon Wiza', 'sandy77@example.com', '$2y$10$g79X72vCqjrALxsSMkS7ye.9jcVsgUO5Lyz9/Zh3OjQcSI5NDu.8.', 'yyJNn8k8fp', 'F', '2017-06-20', 'User', NULL, '999-925-3812', 1, '2018-06-18 12:30:00', '2018-07-31 11:59:19'),
(31, 'Test User', 'testuser@gmail.com', '$2y$10$7P2nRx7OSFfxn6249jz9IOyamFPBwBFWdfg4g75nTyeejHUYH43dC', NULL, 'M', '2017-06-20', 'User', '1531502672DSC01270.jpg', '999-925-3848', 1, '2018-07-06 13:11:24', '2018-07-14 12:28:28'),
(33, 'aaa', 'aaa@gmail.com', '$2y$10$1sRMAJW6B8EfhB8fCcfzgeL4J4Ug86P5RfQAx4WcAPqKvhQMewOvK', NULL, 'F', '2018-03-13', 'User', '1531504168-amr20v.jpg', '989-456-3456', 1, '2018-07-13 12:03:56', '2018-07-22 08:57:11'),
(34, 'bbb', 'bbb@gmail.com', '$2y$10$091CXaDuBWEQvP6qN298WOjzV0llhwCb24ToEH.INYS98.oeOj52i', NULL, 'M', '2017-04-05', 'User', '1531504220-aye16v.jpg', '999-925-3895', 1, '2018-07-13 12:12:52', '2018-07-14 12:27:47'),
(35, 'ccc', 'ccc@gmail.com', '$2y$10$rArmUNvV7S7BWX6l61XK4ut1YS4dY8nUqDOMMqQEO./ZPfOEILZ7W', NULL, 'F', '2018-07-02', 'User', '1531504600-AMR11V.JPG', '898-767-6454', 1, '2018-07-13 12:21:49', '2018-07-14 12:27:59'),
(40, 'eeee', 'eeee@gmail.com', '$2y$10$T0Yfv5WcaI.pnPveiA7qD.LKOIQwa/2Gdsva4zMfB2iP68pCl.Maa', NULL, 'F', '2018-04-16', 'User', '1531506381-ale3h.jpg', '345-123-6754', 1, '2018-07-13 12:56:22', '2018-07-17 12:11:16'),
(42, 'Ravi Singh', 'ravisingh@gmail.com', '$2y$10$Eqb0iwl.rgnPzFxqCthD0eYMS.BC3pk7HMf96gXfSzeyP.Y6HycVy', 'EJaPPWMmnBfQVDbYklG0nnXDmTZ2Oz0qb2IVoWY24Yo8hq5bKk8NLguS4LLv', 'M', '1970-01-01', 'User', '1533959252-Krishna.jpg', '989-765-7890', 1, '2018-08-05 01:14:04', '2018-08-10 22:17:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_email_index` (`email`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_index` (`comment_id`),
  ADD KEY `comment_replies_email_index` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_unique` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
