-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2024 at 04:04 PM
-- Server version: 8.0.39
-- PHP Version: 8.3.14

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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(10, 'Games', 'games', 'active', '2024-11-21 05:19:38', '2024-11-21 05:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(15, 'This is too good content', 7, 18, '2024-11-21 09:30:53', '2024-11-21 09:30:53'),
(16, 'tooo good content', 1, 20, '2024-11-22 03:42:31', '2024-11-22 03:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `contects`
--

CREATE TABLE `contects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '0001_01_01_000000_create_users_table', 1),
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2024_08_04_064247_create_categories_table', 1),
(12, '2024_08_05_041813_create_posts_table', 1),
(13, '2024_08_08_105733_create_contacts_table', 1),
(14, '2024_08_08_111049_create_profiles_table', 1),
(15, '2024_08_29_151729_create_comments_table', 2),
(19, '2024_08_29_195002_create_profiles_table', 3),
(20, '2024_09_10_101818_create_contects_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `discription`, `image`, `slug`, `tags`, `status`, `publish`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(16, 'মুনাফা বেড়েছে দেশ গার্মেন্টসের', 'চলতি অর্থবছরের প্রথম প্রান্তিকে মুনাফা বেড়েছে দেশ গার্মেন্টসের। জুলাই-সেপ্টেম্বর প্রান্তিকে কোম্পানিটির শেয়ারপ্রতি আয় (ইপিএস) হয়েছে ১০ পয়সা। গত বছর একই সময়ে তাদের শেয়ারপ্রতি আয় হয়েছিল ২ পয়সা।\r\n\r\nপুঁজিবাজারে তালিকাভুক্ত কোম্পানি দেশ গার্মেন্টস লিমিটেড গত ৩০ সেপ্টেম্বর ২০২৪ তারিখে সমাপ্ত প্রথম প্রান্তিকের অনিরীক্ষিত আর্থিক প্রতিবেদন প্রকাশ করেছে। গতকাল বুধবার অনুষ্ঠিত কোম্পানির পরিচালনা পর্ষদের বৈঠকে চলতি হিসাববছরের প্রথম প্রান্তিকের আর্থিক প্রতিবেদন পর্যালোচনা ও অনুমোদনের পর তা প্রকাশ করা হয়। ঢাকা স্টক এক্সচেঞ্জ সূত্রে এই তথ্য পাওয়া গেছে।\r\n\r\nআলোচ্য সময়ের কোম্পানির শেয়ারপ্রতি নগদ অর্থের প্রবাহ ছিল মাইনাস ১ টাকা ৮০ পয়সা, আগের বছর একই সময়ে যা ছিল ৩০ পয়সা। গত ৩০ সেপ্টেম্বর ২০২৪ তারিখে কোম্পানিটির শেয়ারপ্রতি নিট সম্পদ মূল্য (এনএভিপিএস) ছিল ১৮ টাকা ৫৩ পয়সা।\r\nগত এক বছরে দেশ গার্মেন্টসের শেয়ারের সর্বোচ্চ দাম ছিল ১২১ টাকা ৫০ পয়সা এবং সর্বনিম্ন দাম চিল ৫৬ টাকা ৬০ পয়সা। আজ এই প্রতিবেদন লেখার সময় কোম্পানিটির শেয়ারের দাম ছিল ৭০ টাকা ৩০ পয়সা।\r\n\r\nসম্প্রতি কয়েক বছরে তেমন একটা লভ্যাংশ দেয়নি দেশ গার্মেন্টস। ২০২৩ সালে তারা ৩ শতাংশ, ২০২১ সালে ৫ শতাংশ ও ২০১৭ সালেও ৫ শতাংশ নগদ লভ্যাংশ দিয়েছে। এ ছাড়া ২০২২ সালে ১০ শতাংশ, ২০২০ সালে ৩ শতাংশ, ২০১৯ সালে ১০ শতাংশ ও ২০১৮ সালে ১০ শতাংশ স্টক লভ্যাংশ দিয়েছে।', '1732187680.jpg', 'munafa-bereche-des-garmentser', 'business', 'active', 'yes', 1, 7, '2024-11-21 05:14:40', '2024-11-21 05:14:40'),
(17, 'মেসির পাস থেকে মার্তিনেজের চোখধাঁধানো গোলে জিতল আর্জেন্টিনা', 'আর্জেন্টিনা ১–০ পেরু\r\n\r\nবক্সের আশপাশে লিওনেল মেসিকে ওভাবে বল নিয়ে ঘুরতে দেখা নতুন কিছু নয়। বিপদ আঁচ করতে পেরে পেরুর দুই ডিফেন্ডার তাঁকে দুই পাশ থেকে আটকানোর চেষ্টা করেন। ছুটে আসেন আরও এক ডিফেন্ডার। কয়েক মুহূর্তের জন্য ত্রিভুজ আকৃতির সেই রক্ষণজালের ঠিক মাঝে মেসি। ততক্ষণে বক্সের ভেতরে ওত পেতে দাঁড়িয়ে যান লাওতারো মার্তিনেজ। হয়তো বুঝতে পেরেছিলেন কিছু একটা হবেই। মেসিকে তো তাঁর চেনা! ত্রিভুজ, চতুর্ভুজ, পঞ্চভুজ, ষড়ভুজ—প্রতিপক্ষের রক্ষণ যেমনই হোক, বক্সের বাঁ প্রান্ত থেকে মেসি বলটা মাঝে ফেলতে পারবেন না, তা হয় না। আর মেসিও যেন আরও এক কাঠি সরেস। মার্তিনেজ কোথায় দাঁড়িয়ে সেটি কীভাবে বুঝলেন, কে জানে! বাঁ পা দিয়ে বলটা যেন চিপ করলেন, বাতাসে ভাসতে ভাসতে সেই বল যখন মার্তিনেজের সামনে, করণীয়টা বুঝে ফেলেছিলেন ইন্টার মিলান স্ট্রাইকারও।', '1732188106.jpg', 'mesir-pas-theke-martinejer-cokhdhanndhano-gole-jitl-arjentina', '#games', 'active', 'yes', 8, 10, '2024-11-21 05:21:46', '2024-11-21 05:21:46'),
(18, 'এই বৃষ্টির দিনে খিচুড়ি খেতে কোথায় যাবেন?', 'সকাল থেকেই ঝরছে বর্ষার বারিধারা। রিমঝিম বৃষ্টি উদযাপনের সঙ্গে ওতপ্রোতভাবে জড়িয়ে আছে ভুনা খিচুড়ির নাম। বৃষ্টির দিনে গরম গরম খিচুড়ি, বেগুন ভাজা, ইলিশ মাছ কিংবা গরুর মাংস খাওয়ার জন্য যেন মনটা কেমন করে। বাড়িতে আয়োজন করতে ইচ্ছে না করলে খিচুড়ি খাওয়ার জন্য ঢুঁ মারতে পারেন বিভিন্ন রেস্টুরেন্টে। আবার হোম ডেলিভারির মাধ্যমে বাসায় এনেও খেতে পারেন ভুনা খিচুড়ি। \r\nসকাল থেকেই ঝরছে বর্ষার বারিধারা। রিমঝিম বৃষ্টি উদযাপনের সঙ্গে ওতপ্রোতভাবে জড়িয়ে আছে ভুনা খিচুড়ির নাম। বৃষ্টির দিনে গরম গরম খিচুড়ি, বেগুন ভাজা, ইলিশ মাছ কিংবা গরুর মাংস খাওয়ার জন্য যেন মনটা কেমন করে। বাড়িতে আয়োজন করতে ইচ্ছে না করলে খিচুড়ি খাওয়ার জন্য ঢুঁ মারতে পারেন বিভিন্ন রেস্টুরেন্টে। আবার হোম ডেলিভারির মাধ্যমে বাসায় এনেও খেতে পারেন ভুনা খিচুড়ি। \r\nসকাল থেকেই ঝরছে বর্ষার বারিধারা। রিমঝিম বৃষ্টি উদযাপনের সঙ্গে ওতপ্রোতভাবে জড়িয়ে আছে ভুনা খিচুড়ির নাম। বৃষ্টির দিনে গরম গরম খিচুড়ি, বেগুন ভাজা, ইলিশ মাছ কিংবা গরুর মাংস খাওয়ার জন্য যেন মনটা কেমন করে। বাড়িতে আয়োজন করতে ইচ্ছে না করলে খিচুড়ি খাওয়ার জন্য ঢুঁ মারতে পারেন বিভিন্ন রেস্টুরেন্টে। আবার হোম ডেলিভারির মাধ্যমে বাসায় এনেও খেতে পারেন ভুনা খিচুড়ি।', '1732188441.jpg', 'ei-brrishtir-dine-khicuri-khete-kothay-zaben', '#food', 'active', 'yes', 1, 1, '2024-11-21 05:27:21', '2024-11-21 05:27:55'),
(19, 'Dynamic Cache, Database, and Mail Builders in Laravel 11.31', 'The Laravel team released v11.31, which includes dynamic cache/db/mail builders, a cache token repository, a URL::forceHttps() convenience method, and more.\r\n\r\n#Cache Token Repository\r\nAndrew Brown contributed a cache token repository as an alternative way to store password reset tokens:\r\n\r\nThis PR proposes a new CacheTokenRepository which will allow the password reset tokens to be handled via cache. IMO cache is a perfect storage medium because it can be more ephemeral, just like the password reset tokens.\r\n\r\nTo enable this new CacheTokenRepository, adjust your config/auth.php like so:\r\n\r\n\'passwords\' => [\r\n \r\n    //new cache driver\r\n    \'customers\' => [\r\n        \'driver\'   => \'cache\',\r\n        \'store\'    => \'passwords\',\r\n        \'provider\' => \'customers\',\r\n        \'expire\'   => 60,\r\n        \'throttle\' => 60,\r\n    ],\r\n \r\n   //default old database driver\r\n    \'users\'     => [\r\n        \'provider\' => \'users\',\r\n        \'table\'    =>\'password_reset_tokens\',\r\n        \'expire\'   => 60,\r\n        \'throttle\' => 60,\r\n    ],\r\n],\r\nSee Pull Request #53428 for details on the implementation.\r\n\r\n#Dynamically Build Mailers On-Demand\r\nSteve Bauman contributed the ability to dynamically build a mailer and send it using the Mail::build() method. This allows developers to create mailers based on a given configuration instead of being hard-coded in the config files:\r\n\r\nuse Illuminate\\Support\\Facades\\Mail;\r\n \r\n$mailer = Mail::build([\r\n    \'transport\' => \'smtp\',\r\n    \'host\' => \'127.0.0.1\',\r\n    \'port\' => 587,\r\n    \'encryption\' => \'tls\',\r\n    \'username\' => \'usr\',\r\n    \'password\' => \'pwd\',\r\n    \'timeout\' => 5,\r\n]);\r\n \r\n$mailer->send($mailable);\r\nSee Pull Request #53411 for discussion and implementation details.\r\n\r\n#Add DB::build() Method\r\nSimilar to the Mail::build() method, Steve Bauman contributed DB::build() to dynamically create new DB connections that are not defined in your configuration file:\r\n\r\nuse Illuminate\\Support\\Facades\\DB;\r\n \r\n$sqlite = DB::build([\r\n    \'driver\' => \'sqlite\',\r\n    \'database\' => \':memory:\',\r\n]);\r\n \r\n$mysql = DB::build([\r\n    \'driver\' => \'mysql\',\r\n    \'database\' => \'forge\',\r\n    \'username\' => \'root\',\r\n    \'password\' => \'secret\',\r\n]);\r\n \r\n$pgsql = DB::build([\r\n    \'driver\' => \'pgsql\',\r\n    // ...\r\n]);\r\n \r\n$sqlsrv = DB::build([\r\n    \'driver\' => \'sqlsrv\',\r\n    // ...\r\n]);\r\nSee Pull Request #53464 for details.\r\n\r\n#Add Cache::build() to Create On-demand Cache Repositories\r\nSteve Bauman contributed the ability to dynamically build Cache repositories on-demand using the Cache::build() method. Similar to the DB and Mailer dynamic build method, you can create cache repositories not defined in your configuration file:\r\n\r\nuse Illuminate\\Support\\Facades\\Cache;\r\n \r\n$apc = Cache::build([\r\n    \'driver\' => \'apc\',\r\n]);\r\n \r\n$array = Cache::build([\r\n    \'driver\' => \'array\',\r\n    \'serialize\' => false,\r\n]);\r\n \r\n$database = Cache::build([\r\n    \'driver\' => \'database\',\r\n    \'table\' => \'cache\',\r\n    \'connection\' => null,\r\n    \'lock_connection\' => null,\r\n]);\r\n \r\n$file = Cache::build([\r\n    \'driver\' => \'file\',\r\n    \'path\' => storage_path(\'framework/cache/data\'),\r\n]);\r\nSee Pull Request #53454 for implementation details.\r\n\r\n#Batch and Chain onQueue() Method Accepts Backed Enums\r\nPhilip Iezzi contributed the ability to use a backed enumeration with the onQueue() method of a Bus chain:\r\n\r\n// Before\r\nBus::chain($jobs)\r\n    ->onQueue(QueueName::long->value)->dispatch();\r\n \r\n// After\r\nBus::chain($jobs)\r\n    ->onQueue(QueueName::long)->dispatch();\r\nSee Pull Request #53359 for implementation details.\r\n\r\n#Add Application removeDeferredServices() Method\r\nOllie Read contributed the removeDeferredServices() application method to remove a deferred service from the application container.\r\n\r\n// Before\r\n$deferredServices = $app->getDeferredServices();\r\n \r\nunset($deferredServices[\'auth.password\'], $deferredServices[\'auth.password.broker\']);\r\n \r\n$app->setDeferredServices($deferredServices);\r\n \r\n// After\r\n$app->removeDeferredServices([\'auth.password\', \'auth.password.broker\']);\r\nThis use-case isn\'t a common one that you\'ll need, but this method compliments to get and set methods of deferred services nicely. See Pull Request #53362 for details.\r\n\r\n#Ability to Append and Prepend Middleware Priority from the Application Builder\r\nOllie Read contributed another low-level change to append and prepend middleware priority to the application builder, allowing access to add middleware after/before methods on the kernel:\r\n\r\nreturn Application::configure(basePath: dirname(__DIR__))\r\n    ->withRouting(\r\n        web: __DIR__.\'/../routes/web.php\',\r\n        commands: __DIR__.\'/../routes/console.php\',\r\n        health: \'/up\',\r\n    )\r\n    ->withMiddleware(function (Middleware $middleware) {\r\n        $middleware->appendToPriorityList(\r\n            [\r\n                \\Illuminate\\Cookie\\Middleware\\EncryptCookies::class,\r\n                \\Illuminate\\Contracts\\Auth\\Middleware\\AuthenticatesRequests::class,\r\n            ],\r\n            \\Illuminate\\Routing\\Middleware\\ValidateSignature::class\r\n        );\r\n \r\n        $middleware->prependToPriorityList(\r\n            [\r\n                \\Illuminate\\Cookie\\Middleware\\EncryptCookies::class,\r\n                \\Illuminate\\Contracts\\Auth\\Middleware\\AuthenticatesRequests::class,\r\n            ],\r\n            \\Illuminate\\Routing\\Middleware\\ValidateSignature::class\r\n        );\r\n    })\r\n    ->withExceptions(function (Exceptions $exceptions) {\r\n        //\r\n    })->create();\r\nSee Pull Request #53326 for further details.\r\n\r\n#Add forceHttps() Method to Enforce HTTPs Scheme for URLs\r\nDasun Tharanga contributed the forceHttps() method, which simplifies enforcing HTTPs for URLs requiring such. The method accepts a boolean, making it easy to force HTTPs for a given set of environments:\r\n\r\nURL::forceHttps(\r\n    $this->app->isProduction()\r\n);\r\n \r\nURL::forceHttps(\r\n    $this->app->environment(\'staging\', \'production\')\r\n);\r\nSee Pull Request #53381 for implementation details.\r\n\r\n#Release notes\r\nYou can see the complete list of new features and updates below and the diff between 11.30.0 and 11.31.0 on GitHub. The following release notes are directly from the changelog:\r\n\r\n#v11.31.0', '1732188934.jpeg', 'dynamic-cache-database-and-mail-builders-in-laravel-1131', '#technology', 'active', 'yes', 8, 9, '2024-11-21 05:35:34', '2024-11-21 05:35:34'),
(20, 'Important Ecommerce User Experience Best Practices', 'One thing in common with all consumers is their desire for a quick, easy, and informed path to purchase.\r\n\r\nThis is true whether waiting in line at a brick-and-mortar or buying online. I’m sure you can agree.\r\n\r\nIn fact, the last time I had a hard time finding a product, putting something in the cart and checking out, it was all over. I abandoned the experience because there’s no time for that—especially on mobile!\r\n\r\nA great ecommerce user experience design gets shoppers through the process effectively.\r\n\r\nIt will improve your traffic, increase conversions and build trust in your brand.\r\n\r\nWhile not all brands have the ability to offer a convenient app with one-click buying (like Amazon), there are basic ecommerce best practices necessary for a great user experience when buying something online.\r\n\r\nFocus on these fundamental areas, to help ensure a successful online shopping experience.\r\n\r\n1. Mobile Experience with Responsive Web Design\r\nA responsive web design allows customers to have a consistent ecommerce website experience across any device they choose to use while shopping–whether desktop, tablet or mobile.\r\n\r\nConsumers likely will not stop buying things with their computer or laptop. However, studies are showing that 54% of online ecommerce traffic comes from a mobile smartphone.\r\n\r\nWhile 30% of this traffic actually brings in revenue, rapid advancements in technology will only support growth for mobile ecommerce conversions.\r\n\r\nIf your ecommerce site still does not have a mobile-friendly experience, you need to think about adding one as soon as possible.\r\n\r\nNot only will it create a seamless experience across devices, but it helps with search engine optimization efforts. In fact, Google definitively announced that mobile-friendly web sites will rank better in mobile search).', '1732205432.png', 'important-ecommerce-user-experience-best-practices', '#business', 'active', 'yes', 8, 7, '2024-11-21 10:10:32', '2024-11-21 10:10:32'),
(21, 'Why Responsive Design is Important and Google Approved', 'A responsive web design allows customers to have a consistent ecommerce website experience across any device they choose to use while shopping–whether desktop, tablet or mobile.\r\n\r\nConsumers likely will not stop buying things with their computer or laptop. However, studies are showing that 54% of online ecommerce traffic comes from a mobile smartphone.\r\n\r\nWhile 30% of this traffic actually brings in revenue, rapid advancements in technology will only support growth for mobile ecommerce conversions.\r\n\r\nIf your ecommerce site still does not have a mobile-friendly experience, you need to think about adding one as soon as possible.\r\n\r\nNot only will it create a seamless experience across devices, but it helps with search engine optimization efforts. In fact, Google definitively announced that mobile-friendly web sites will rank better in mobile search).\r\n\r\nSEE ALSO: Why Responsive Design is Important and Google Approved\r\n\r\n[clickToTweet tweet=”Over 54% of online #ecommerce traffic comes from a mobile smartphone. #UX” quote=”Over 54% of online ecommerce traffic comes from a mobile smartphone.”]', '1732205593.jpg', 'why-responsive-design-is-important-and-google-approved', '#business', 'active', 'no', 7, 7, '2024-11-21 10:13:13', '2024-11-21 10:13:13'),
(22, 'Flat Design = Clean & Focused Design', 'Harry’s does a nice job of telling the story for simple daily use products: razors and shave cream. They display close-up details, include an interactive graphic about the benefits of the design, and show product in context.\r\n\r\n \r\n\r\n5. Product Detail Page Must-Haves\r\nThe product detail page is one of the most complex, and important pages in an ecommerce website design. There is a fine line between keeping it clean but informative, and too cluttered.\r\n\r\nWith so many things to consider, here are some majors:\r\n\r\nA highly visible Add to Cart button\r\nThe Add to Cart button should be a good size, readable, above the fold if possible, and in a color that stands out from the rest of the page.\r\n\r\nThis button shouldn’t be overlooked! \r\n\r\nBe sure to use the call to action of “Add to Cart”, or “Buy Now”. Creative copy is not needed for this particular CTA. Tell the customer exactly what they should do!\r\n\r\nShowcase product imagery (see #4)\r\nPlan for the following with your product images:\r\n\r\nlarge product photos\r\nclose detail shots\r\nproduct video\r\n360° views\r\nvariant images\r\nVariant images are showing the same product in its different colors, textures or fabrics.\r\n\r\nUsers pay close attention to photos and other images that contain relevant information…In ecommerce, product photos help users understand products and differentiate between similar items. – Jakob Nielsen, Photos as Web Content\r\n\r\nUse trust badges\r\nAdding visible trust badge graphics to a site is one of the most important ecommerce user experience best practices.\r\n\r\nAdd them to product detail pages, shopping cart, and checkout.\r\n\r\nIt will help strengthen the buying confidence of a customer.\r\n\r\nIn addition to trust badges, get your site working with an SSL certificate so that browsing and buying from the site is even more secure. Added bonus: Google gives secure HTTPS sites a boost in search engine ranking.\r\n\r\nAllow customers to read and add reviews\r\nIt might seem daunting to give the public access to fully disclose about a product, but 7 out of 10 shoppers consult reviews before making a purchase.\r\n\r\nIf your product is amazing, then let people review it!\r\n\r\nRatings can help other potential customers understand the value of the product they are buying, and also help you fine-tune your offering with (free) feedback.\r\n\r\nStudies show that customer reviews can create a 74% increase in conversion.\r\n\r\n[clickToTweet tweet=”7/10 of shoppers consult reviews before making a purchase, resulting in a 74% increase in conversion” quote=”7 out of 10 of shoppers consult reviews before making a purchase, resulting in a 74% increase in conversion.”]\r\n\r\n \r\n\r\nConclusion\r\nThere are, of course, more than five ecommerce user experience best practices to consider. These are the absolute essentials for your online shop!\r\n\r\nUse this checklist of great ecommerce design basics, which can only strengthen the online shopping experience.\r\n\r\nMobile experience with responsive web design\r\nFlat design = clean and focused design\r\nOrganized and easy-to-use navigation\r\nExcellent product photography (and Video)\r\nProduct detail page must-haves\r\nThe beauty of the web is that enhancements and changes can always be measured through analytics and A/B testing. Remember that not all ecommerce website stores are the same, so use these basics as guidelines but create effective experiences tailored to the targeted customer for your specific brand.', '1732205696.jpg', 'flat-design-clean-focused-design', '#business', 'active', 'yes', 1, 7, '2024-11-21 10:14:56', '2024-11-22 03:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_banner`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '1732175536.png', 1, '2024-08-29 15:03:26', '2024-11-21 01:52:16'),
(7, '1732277949.png', 7, '2024-11-21 09:31:24', '2024-11-22 06:19:09'),
(8, '1732203793.jpg', 8, '2024-11-21 09:43:13', '2024-11-21 09:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('D8Ja80F04DYydM94KCSbKpw8HKiyM8fzVNQptqW3', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTlpKeXlidjlnYWxHaml2RmVVdVZja0NxVXNRTWN0OXMzTzdKQWoxeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2Jsb2cudGVzdC91c2VyL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vYmxvZy50ZXN0L3VzZXIvYWxsX3Bvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1732277967),
('ebMVqy1cuhR3VAxNrH8MywwatDDOpf7PVBJXejEy', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3lxZ05hTkc5VjdYc0xVVU81bGJzM0RlRU5rSjd3c0t3cktLVWxUNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9ibG9nLnRlc3QvYWxsYmxvZ1Bvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1732278014),
('fdRhEV3GOHBNxBMyc3YkTVw6dBpt3rmGKBwibcWk', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicmV3MU1rUFA2ZGFhUGtqeTNxU05mcmprczN4MVZuVlc5Q1M5VkVuaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9ibG9nLnRlc3QvdXNlci91c2VyX3Bvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMxOiJodHRwOi8vYmxvZy50ZXN0L3VzZXIvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1732277987),
('g6V00selGVb6lSvLcHg2H2jMTCbGoo3UAA3Eyy2o', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.12.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3FiTE5ESHBRdnE1WldjZ1djWm1PU0tib3BycHRmYk1QZHZRbWlsWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9ibG9nLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732268733),
('ydD5WSoB0VE7LR3IZhYvJQU9FDHSmcHiH17ipUud', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRXhKNTE0aWppTENGRHBzYVdyUE01a2QyZlJMbHV5R0YwUDU0NUF2NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly9ibG9nLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1732291459),
('yrvfot857q9BIcc9ALeNXTrjAxHxKCBuRcyLt7Ak', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaDhTVTV0UEVxSkw1YWdSODhVeHBZM0hsdEhDOXVZSkxIb1VoRWgzeCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovL2Jsb2cudGVzdC91c2VyL2Jsb2dfbWVkaWEiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxNjoiaHR0cDovL2Jsb2cudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1732265665);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` enum('admin','moderator','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Md Sabbir Hassan Shuvo', 'sabbirhassanshuvo71@gmail.com', NULL, '$2y$12$wSmvdIsecEJkND2xGTvoG.mi9p06sr8WBSE0xiazjR0tznFkN7TfC', 'byf7xXD7e566AdhU4kYI472Oze9RmrijmNHpVFeDTr26D4lYdHtzXRTJwm8b', 'admin', '2024-08-18 22:25:09', '2024-11-21 04:50:38'),
(7, 'Najim Uddin', 'najimuddin@gmail.com', NULL, '$2y$12$hyW0y85medG3CndoxOX3lOd9b4FpiDo696YDLlyxXi6CfIrHAAzw2', NULL, 'user', '2024-11-21 04:53:30', '2024-11-21 04:53:30'),
(8, 'Mustafa Akbar', 'mustafaakabr@gmail.com', NULL, '$2y$12$MIkqkWvyqJtwKvnIiDnyzenzIfpkopzxkm5r.9r3vgE8SGVCqIZS.', NULL, 'moderator', '2024-11-21 04:56:15', '2024-11-21 04:56:48');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contects`
--
ALTER TABLE `contects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
