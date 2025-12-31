-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2025 at 01:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'food', 'active', '2024-08-20 12:40:00', '2024-08-21 04:37:36'),
(2, 'Computer', 'computer', 'active', '2024-08-21 06:02:38', '2024-08-21 06:02:38'),
(3, 'Travel', 'travel', 'active', '2024-09-11 03:42:14', '2024-09-11 03:42:14'),
(7, 'Business', 'business', 'active', '2024-09-11 03:53:40', '2024-09-11 04:23:06'),
(9, 'Techlogoy', 'techlogoy', 'active', '2024-09-11 04:22:30', '2024-09-11 04:22:30'),
(10, 'Games', 'games', 'active', '2024-11-21 05:19:38', '2024-11-21 05:19:38'),
(11, 'Christopher Reid', 'christopher-reid', 'active', '2025-12-30 14:14:50', '2025-12-30 14:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(17, 'Very usefull and importent content thank you so much .................!', 11, 23, '2025-12-30 12:12:26', '2025-12-30 12:12:26'),
(18, 'SADdvfgsdgsd', 1, 23, '2025-12-30 15:52:58', '2025-12-30 15:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `contects`
--

CREATE TABLE `contects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contects`
--

INSERT INTO `contects` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Mustafa Akbar', 'mustafaakabr@gmail.com', 'Hi standblog,\r\n\r\nI’m Mustafa Akbar a writer/blogger passionate about [topic/niche]. I’ve been following your blog for a while and appreciate the value you provide to your readers.\r\n\r\nI’d love the opportunity to contribute a guest post titled “[Proposed Title]” that I think would resonate with your audience. Please let me know if this aligns with your content strategy.\r\n\r\nLooking forward to your feedback!\r\nBest regards,\r\nMustafa Akbar', '2024-11-21 09:50:20', '2024-11-21 09:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_04_064247_create_categories_table', 1),
(5, '2024_08_05_041813_create_posts_table', 1),
(6, '2024_08_29_151729_create_comments_table', 1),
(7, '2024_08_29_195002_create_profiles_table', 1),
(8, '2024_09_10_101818_create_contects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('moriom23102007@gmail.com', 'l3KoiD3LFaASBtswE7mdoXiqRsq8hf', '2024-09-11 04:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `publish` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `discription`, `image`, `slug`, `tags`, `status`, `publish`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(16, 'মুনাফা বেড়েছে দেশ গার্মেন্টসের', 'চলতি অর্থবছরের প্রথম প্রান্তিকে মুনাফা বেড়েছে দেশ গার্মেন্টসের। জুলাই-সেপ্টেম্বর প্রান্তিকে কোম্পানিটির শেয়ারপ্রতি আয় (ইপিএস) হয়েছে ১০ পয়সা। গত বছর একই সময়ে তাদের শেয়ারপ্রতি আয় হয়েছিল ২ পয়সা।\r\n\r\nপুঁজিবাজারে তালিকাভুক্ত কোম্পানি দেশ গার্মেন্টস লিমিটেড গত ৩০ সেপ্টেম্বর ২০২৪ তারিখে সমাপ্ত প্রথম প্রান্তিকের অনিরীক্ষিত আর্থিক প্রতিবেদন প্রকাশ করেছে। গতকাল বুধবার অনুষ্ঠিত কোম্পানির পরিচালনা পর্ষদের বৈঠকে চলতি হিসাববছরের প্রথম প্রান্তিকের আর্থিক প্রতিবেদন পর্যালোচনা ও অনুমোদনের পর তা প্রকাশ করা হয়। ঢাকা স্টক এক্সচেঞ্জ সূত্রে এই তথ্য পাওয়া গেছে।\r\n\r\nআলোচ্য সময়ের কোম্পানির শেয়ারপ্রতি নগদ অর্থের প্রবাহ ছিল মাইনাস ১ টাকা ৮০ পয়সা, আগের বছর একই সময়ে যা ছিল ৩০ পয়সা। গত ৩০ সেপ্টেম্বর ২০২৪ তারিখে কোম্পানিটির শেয়ারপ্রতি নিট সম্পদ মূল্য (এনএভিপিএস) ছিল ১৮ টাকা ৫৩ পয়সা।\r\nগত এক বছরে দেশ গার্মেন্টসের শেয়ারের সর্বোচ্চ দাম ছিল ১২১ টাকা ৫০ পয়সা এবং সর্বনিম্ন দাম চিল ৫৬ টাকা ৬০ পয়সা। আজ এই প্রতিবেদন লেখার সময় কোম্পানিটির শেয়ারের দাম ছিল ৭০ টাকা ৩০ পয়সা।\r\n\r\nসম্প্রতি কয়েক বছরে তেমন একটা লভ্যাংশ দেয়নি দেশ গার্মেন্টস। ২০২৩ সালে তারা ৩ শতাংশ, ২০২১ সালে ৫ শতাংশ ও ২০১৭ সালেও ৫ শতাংশ নগদ লভ্যাংশ দিয়েছে। এ ছাড়া ২০২২ সালে ১০ শতাংশ, ২০২০ সালে ৩ শতাংশ, ২০১৯ সালে ১০ শতাংশ ও ২০১৮ সালে ১০ শতাংশ স্টক লভ্যাংশ দিয়েছে।', '1732187680.jpg', 'munafa-bereche-des-garmentser', 'business', 'active', 'yes', 1, 7, '2024-11-21 05:14:40', '2024-11-21 05:14:40'),
(18, 'এই বৃষ্টির দিনে খিচুড়ি খেতে কোথায় যাবেন?', 'সকাল থেকেই ঝরছে বর্ষার বারিধারা। রিমঝিম বৃষ্টি উদযাপনের সঙ্গে ওতপ্রোতভাবে জড়িয়ে আছে ভুনা খিচুড়ির নাম। বৃষ্টির দিনে গরম গরম খিচুড়ি, বেগুন ভাজা, ইলিশ মাছ কিংবা গরুর মাংস খাওয়ার জন্য যেন মনটা কেমন করে। বাড়িতে আয়োজন করতে ইচ্ছে না করলে খিচুড়ি খাওয়ার জন্য ঢুঁ মারতে পারেন বিভিন্ন রেস্টুরেন্টে। আবার হোম ডেলিভারির মাধ্যমে বাসায় এনেও খেতে পারেন ভুনা খিচুড়ি। \r\nসকাল থেকেই ঝরছে বর্ষার বারিধারা। রিমঝিম বৃষ্টি উদযাপনের সঙ্গে ওতপ্রোতভাবে জড়িয়ে আছে ভুনা খিচুড়ির নাম। বৃষ্টির দিনে গরম গরম খিচুড়ি, বেগুন ভাজা, ইলিশ মাছ কিংবা গরুর মাংস খাওয়ার জন্য যেন মনটা কেমন করে। বাড়িতে আয়োজন করতে ইচ্ছে না করলে খিচুড়ি খাওয়ার জন্য ঢুঁ মারতে পারেন বিভিন্ন রেস্টুরেন্টে। আবার হোম ডেলিভারির মাধ্যমে বাসায় এনেও খেতে পারেন ভুনা খিচুড়ি। \r\nসকাল থেকেই ঝরছে বর্ষার বারিধারা। রিমঝিম বৃষ্টি উদযাপনের সঙ্গে ওতপ্রোতভাবে জড়িয়ে আছে ভুনা খিচুড়ির নাম। বৃষ্টির দিনে গরম গরম খিচুড়ি, বেগুন ভাজা, ইলিশ মাছ কিংবা গরুর মাংস খাওয়ার জন্য যেন মনটা কেমন করে। বাড়িতে আয়োজন করতে ইচ্ছে না করলে খিচুড়ি খাওয়ার জন্য ঢুঁ মারতে পারেন বিভিন্ন রেস্টুরেন্টে। আবার হোম ডেলিভারির মাধ্যমে বাসায় এনেও খেতে পারেন ভুনা খিচুড়ি।', '1732188441.jpg', 'ei-brrishtir-dine-khicuri-khete-kothay-zaben', '#food', 'active', 'yes', 1, 1, '2024-11-21 05:27:21', '2024-11-21 05:27:55'),
(22, 'Flat Design = Clean & Focused Design', 'Harry’s does a nice job of telling the story for simple daily use products: razors and shave cream. They display close-up details, include an interactive graphic about the benefits of the design, and show product in context.\r\n\r\n \r\n\r\n5. Product Detail Page Must-Haves\r\nThe product detail page is one of the most complex, and important pages in an ecommerce website design. There is a fine line between keeping it clean but informative, and too cluttered.\r\n\r\nWith so many things to consider, here are some majors:\r\n\r\nA highly visible Add to Cart button\r\nThe Add to Cart button should be a good size, readable, above the fold if possible, and in a color that stands out from the rest of the page.\r\n\r\nThis button shouldn’t be overlooked! \r\n\r\nBe sure to use the call to action of “Add to Cart”, or “Buy Now”. Creative copy is not needed for this particular CTA. Tell the customer exactly what they should do!\r\n\r\nShowcase product imagery (see #4)\r\nPlan for the following with your product images:\r\n\r\nlarge product photos\r\nclose detail shots\r\nproduct video\r\n360° views\r\nvariant images\r\nVariant images are showing the same product in its different colors, textures or fabrics.\r\n\r\nUsers pay close attention to photos and other images that contain relevant information…In ecommerce, product photos help users understand products and differentiate between similar items. – Jakob Nielsen, Photos as Web Content\r\n\r\nUse trust badges\r\nAdding visible trust badge graphics to a site is one of the most important ecommerce user experience best practices.\r\n\r\nAdd them to product detail pages, shopping cart, and checkout.\r\n\r\nIt will help strengthen the buying confidence of a customer.\r\n\r\nIn addition to trust badges, get your site working with an SSL certificate so that browsing and buying from the site is even more secure. Added bonus: Google gives secure HTTPS sites a boost in search engine ranking.\r\n\r\nAllow customers to read and add reviews\r\nIt might seem daunting to give the public access to fully disclose about a product, but 7 out of 10 shoppers consult reviews before making a purchase.\r\n\r\nIf your product is amazing, then let people review it!\r\n\r\nRatings can help other potential customers understand the value of the product they are buying, and also help you fine-tune your offering with (free) feedback.\r\n\r\nStudies show that customer reviews can create a 74% increase in conversion.\r\n\r\n[clickToTweet tweet=”7/10 of shoppers consult reviews before making a purchase, resulting in a 74% increase in conversion” quote=”7 out of 10 of shoppers consult reviews before making a purchase, resulting in a 74% increase in conversion.”]\r\n\r\n \r\n\r\nConclusion\r\nThere are, of course, more than five ecommerce user experience best practices to consider. These are the absolute essentials for your online shop!\r\n\r\nUse this checklist of great ecommerce design basics, which can only strengthen the online shopping experience.\r\n\r\nMobile experience with responsive web design\r\nFlat design = clean and focused design\r\nOrganized and easy-to-use navigation\r\nExcellent product photography (and Video)\r\nProduct detail page must-haves\r\nThe beauty of the web is that enhancements and changes can always be measured through analytics and A/B testing. Remember that not all ecommerce website stores are the same, so use these basics as guidelines but create effective experiences tailored to the targeted customer for your specific brand.', '1732205696.jpg', 'flat-design-clean-focused-design', '#business', 'active', 'yes', 1, 7, '2024-11-21 10:14:56', '2024-11-22 03:43:12'),
(23, 'Service Layer laravel', 'Service Layer\r\nI have been reading recently regarding SOLID, DRY Controllers, Repositories etc...\r\n\r\nMost articles suggest the use of a Service Layer. Therefore I started moving the business logic away from my controllers but then I felt that I am creating a wrapper that at some points is not necessary.\r\n\r\nFor example I started creating methods like the following:\r\n\r\nclass FieldService extends Service\r\n{\r\n    /**\r\n     * Pluck the columns from the model.\r\n     *\r\n     * @param $value\r\n     * @param null $key\r\n     *\r\n     * @return mixed\r\n     */\r\n    public function pluck($value, $key = null)\r\n    {\r\n        return Field::pluck($value, $key);\r\n    }\r\n\r\n    /**\r\n     * Find a field.\r\n     *\r\n     * @param $id\r\n     *\r\n     * @return Field|false\r\n     */\r\n    public function find($id)\r\n    {\r\n        return Field::find($id);\r\n    }\r\n\r\n    /**\r\n     * Get all fields.\r\n     *\r\n     * @return Collection\r\n     */\r\n    public function all()\r\n    {\r\n        return Field::all();\r\n    }\r\n}\r\nI started using the service and I realised that sometimes I am using pluck with ordering. With the new service I cannot do anymore Field::orderBy(\'column\',\'ASC\')->pluck(\'column\',\'key\'); because the service as is returns the results and then I have to use other methods to do the ordering when I prefer for the DB to do such a simple task.\r\n\r\nThe field service does not have just these simple methods it contains also complex business logic. Is it OK if I leave these simple methods like Field::find($id) or Field::pluck() or Field::all() outside from the Service class and just use Eloquent as is on the controller?\r\n\r\nThe project I am working on, it will always use MSSQL there is no reason for me to do any repositories.', '1767118225.png', 'service-layer-laravel', '#laravel', 'active', 'yes', 1, 9, '2025-12-30 12:10:08', '2025-12-30 12:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_banner` varchar(255) NOT NULL DEFAULT 'none',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_banner`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '1767116455.jpg', 1, '2024-08-29 15:03:26', '2025-12-30 11:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('T30hUT3bo3IRxnk9wvGHFMNbHeRFiX7ISyIqnQS7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicjRyeEhtUUgwTUtqckJERGhyUnhUNHp2RmdSNkNMcTdSTzU3dFJyayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMC9hbGxibG9nUG9zdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMC91c2VyL2FsbF91c2VyIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767132923);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_role` enum('admin','moderator','user') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Md Sabbir Hassan Shuvo', 'sabbirhassanshuvo71@gmail.com', NULL, '$2y$12$I/k5tfDlztkNrKCO4t7hbOxVdG14eRtbKBToPF.9W6Ah5YFtHOn9.', 'AIbpZD4hdqrRLQTPNrmmX4h5vAsNdURLIhdgoT4q9seqdb1hBPRZwbionR3s', 'admin', '2024-08-18 22:25:09', '2025-12-30 11:40:08'),
(11, 'User', 'user@gmail.com', NULL, '$2y$12$JP7YTzfP806xPDHyM8.LvuIrmIH51OUIJkAubhSskTyPalYIEnCfS', NULL, 'user', '2025-12-30 11:45:25', '2025-12-30 11:45:25'),
(12, 'Modarator', 'modarator@gmail.com', NULL, '$2y$12$opa4fL5vEDbPiz88y9o6huN0f8Rx5fnQrSfwBRyOxFgNwvy50cNKe', NULL, 'moderator', '2025-12-30 11:50:25', '2025-12-30 11:56:32'),
(13, 'Admin', 'admin@gmail.com', NULL, '$2y$12$jQcYB58FyYYanPOIvqn17.r2fM.QHe0TY0X/Z0NxnL//5TIuf9Aqy', NULL, 'admin', '2025-12-30 11:51:37', '2025-12-30 11:52:24'),
(14, 'gsagsdfgd', 'dfgdfgd@gmail.com', NULL, '$2y$12$shEybG4BvDufR/oi.GdAaeTeSG4w2VaK8iLDJX.a9UX8DrYsZiYJy', NULL, 'user', '2025-12-30 12:13:51', '2025-12-30 12:13:51'),
(17, 'Keely Norton', 'zajajerika@mailinator.com', NULL, '$2y$12$YGKbc62csp2zr4/qF0QGC.P6RQp09hvH2ZlGXGmxCl7Bk6I8ZWX2O', NULL, 'moderator', '2025-12-30 12:32:08', '2025-12-30 12:32:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contects`
--
ALTER TABLE `contects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contects`
--
ALTER TABLE `contects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
