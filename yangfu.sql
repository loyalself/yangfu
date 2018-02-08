-- --------------------------------------------------------
-- 主机:                           localhost
-- 服务器版本:                        5.7.19 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 正在导出表  yangfu.admin_permissions 的数据：4 rows
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'system', '系统管理', '2018-01-28 18:58:05', '2018-01-28 18:58:05'),
	(2, 'post', '文章管理', '2018-01-28 18:58:44', '2018-01-28 18:58:44'),
	(3, 'topic', '专题管理', '2018-01-28 18:59:01', '2018-01-28 18:59:01'),
	(4, 'notice', '通知管理', '2018-01-28 18:59:12', '2018-01-28 18:59:12');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;

-- 正在导出表  yangfu.admin_permission_role 的数据：5 rows
/*!40000 ALTER TABLE `admin_permission_role` DISABLE KEYS */;
INSERT INTO `admin_permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 1, 2, NULL, NULL),
	(3, 2, 2, NULL, NULL),
	(4, 1, 3, NULL, NULL),
	(5, 1, 4, NULL, NULL);
/*!40000 ALTER TABLE `admin_permission_role` ENABLE KEYS */;

-- 正在导出表  yangfu.admin_roles 的数据：2 rows
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'systemmanager', '系统管理员', '2018-01-28 19:00:27', '2018-01-28 19:00:27'),
	(2, 'post manager', '文章管理员', '2018-01-28 19:03:43', '2018-01-28 19:03:43');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;

-- 正在导出表  yangfu.admin_role_user 的数据：2 rows
/*!40000 ALTER TABLE `admin_role_user` DISABLE KEYS */;
INSERT INTO `admin_role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 2, 2, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_user` ENABLE KEYS */;

-- 正在导出表  yangfu.admin_users 的数据：4 rows
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `name`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'admin1', '$2y$10$RyeAY6/Atts6R4wDMDF9jejY1dLNL9hWIajXPH5x2vdoDPH6OrJZW', NULL, NULL, 'GX1BMUtdLG4PLbeE1pKtUT81xjr9iQZusFX62IgUb00UotALPCsxij3DNng8'),
	(2, 'admin2', '$2y$10$RyeAY6/Atts6R4wDMDF9jejY1dLNL9hWIajXPH5x2vdoDPH6OrJZW', '2018-01-25 15:53:26', '2018-01-25 15:53:26', 'MYHWZVsHBwqY43mbZ5bODhSaafB130Zz7pLXppP2hEPlicK43e4RL4JRDQqP'),
	(3, 'hash', '$2y$10$5Eg1CnaEyaDL/5Z3dUK1h.eOhNZNoM2TJNkbervsposmtmPqxIf0e', '2018-01-25 16:00:30', '2018-01-25 16:00:30', NULL),
	(4, 'admin3', '$2y$10$bc.PyGNe7y6reA5JV56XDOKV64UXh0e3.Bx1hH.BGvLZliZU4Fxr2', '2018-01-25 17:01:00', '2018-01-25 17:01:00', 'zPdq9uM6FDFMYG9XKHotOqt1ccke5oLcj2ypHaOGcLCcWbI6JqIskm1fu2Vy');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- 正在导出表  yangfu.comments 的数据：3 rows
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
	(1, 2, 40, 'Hay  yo yoyo y o!! !    \r\n这里是第二个评论', '2018-01-23 10:55:03', '2018-01-23 10:55:03'),
	(2, 2, 40, '这个withCount方法真的是太神奇了', '2018-01-23 11:15:24', '2018-01-23 11:15:24'),
	(3, 2, 41, 'IT男，秃顶话少，偏执，有钱', '2018-01-25 10:15:42', '2018-01-25 10:15:42');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- 正在导出表  yangfu.failed_jobs 的数据：0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- 正在导出表  yangfu.fans 的数据：1 rows
/*!40000 ALTER TABLE `fans` DISABLE KEYS */;
INSERT INTO `fans` (`id`, `fan_id`, `star_id`, `created_at`, `updated_at`) VALUES
	(4, 2, 3, '2018-01-24 15:35:44', '2018-01-24 15:35:44');
/*!40000 ALTER TABLE `fans` ENABLE KEYS */;

-- 正在导出表  yangfu.jobs 的数据：13 rows
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
	(256, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":7:{s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 255, NULL, 1517306769, 1517306769),
	(257, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":7:{s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517307073, 1517307073),
	(258, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":7:{s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517307699, 1517307699),
	(259, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":7:{s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517307968, 1517307968),
	(260, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":8:{s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:6;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517365905, 1517365905),
	(261, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":8:{s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:7;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517366323, 1517366323),
	(262, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":8:{s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:8;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517366714, 1517366714),
	(263, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":3,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":9:{s:5:\\"tries\\";i:3;s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:9;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517470596, 1517470596),
	(264, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":3,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":9:{s:5:\\"tries\\";i:3;s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:10;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517470879, 1517470879),
	(265, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":3,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":9:{s:5:\\"tries\\";i:3;s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:11;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517471640, 1517471640),
	(266, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":3,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":9:{s:5:\\"tries\\";i:3;s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:12;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517471972, 1517471972),
	(267, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":3,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":9:{s:5:\\"tries\\";i:3;s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:13;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517472490, 1517472490),
	(268, 'default', '{"displayName":"App\\\\Jobs\\\\SendMessage","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":3,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendMessage","command":"O:20:\\"App\\\\Jobs\\\\SendMessage\\":9:{s:5:\\"tries\\";i:3;s:28:\\"\\u0000App\\\\Jobs\\\\SendMessage\\u0000notice\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":3:{s:5:\\"class\\";s:16:\\"App\\\\Model\\\\Notice\\";s:2:\\"id\\";i:14;s:10:\\"connection\\";s:5:\\"mysql\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1517476407, 1517476407);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- 正在导出表  yangfu.migrations 的数据：15 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_01_18_064420_create_posts_table', 1),
	(4, '2018_01_23_101649_create_comments_table', 2),
	(5, '2018_01_23_112617_create_zans_table', 3),
	(6, '2018_01_23_165544_create_fans_table', 4),
	(7, '2018_01_24_154510_create_topics_table', 5),
	(8, '2018_01_24_154634_create_post_topics_table', 5),
	(9, '2018_01_25_143608_create_admin_users_table', 6),
	(10, '2018_01_25_171540_alter_posts_table', 7),
	(11, '2018_01_27_173022_create_permission_and_roles', 8),
	(12, '2018_01_30_151054_alter_admin_users_table', 9),
	(13, '2018_01_30_164343_create_notices_table', 10),
	(14, '2018_01_30_172634_create_jobs_table', 11),
	(15, '2018_02_01_153854_create_failed_jobs_table', 12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 正在导出表  yangfu.notices 的数据：14 rows
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;
INSERT INTO `notices` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
	(1, '这是测试通知', '内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容', '2018-01-30 17:09:49', '2018-01-30 17:09:49'),
	(2, '春节快乐', '在新春到来之际，checkvege在这里提前祝您们新春快乐，大吉大利', '2018-01-30 18:06:07', '2018-01-30 18:06:07'),
	(3, '测试侧ifgis', '撒范德萨范德萨个德松哥', '2018-01-30 18:11:13', '2018-01-30 18:11:13'),
	(4, '阿发帝国', '爱妃撒旦个说过', '2018-01-30 18:21:39', '2018-01-30 18:21:39'),
	(5, 'agfag', '不过很舒服哈哈', '2018-01-30 18:26:08', '2018-01-30 18:26:08'),
	(6, '试试', '看看试试这次', '2018-01-31 10:31:45', '2018-01-31 10:31:45'),
	(7, '阿迪锅', '东风公司帝国是', '2018-01-31 10:38:43', '2018-01-31 10:38:43'),
	(8, '多发点个', '代购费的是的', '2018-01-31 10:45:14', '2018-01-31 10:45:14'),
	(9, '哈哈哈', '案件发生客观；了', '2018-02-01 15:36:36', '2018-02-01 15:36:36'),
	(10, '多发点', '地方的帝国帝国', '2018-02-01 15:41:19', '2018-02-01 15:41:19'),
	(11, '德国大使馆', '第三个撒旦个收到货', '2018-02-01 15:54:00', '2018-02-01 15:54:00'),
	(12, '疯了疯了', '撒开房间爱看sajgk大', '2018-02-01 15:59:32', '2018-02-01 15:59:32'),
	(13, '阿迪观赏鸽', '的观点发送给发个', '2018-02-01 16:08:10', '2018-02-01 16:08:10'),
	(14, '会尽力哈结了婚', '更健康隔离开关了咕噜咕噜', '2018-02-01 17:13:27', '2018-02-01 17:13:27');
/*!40000 ALTER TABLE `notices` ENABLE KEYS */;

-- 正在导出表  yangfu.password_resets 的数据：0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- 正在导出表  yangfu.posts 的数据：4 rows
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
	(40, '1月23号了', '时间过的太快啦，时间过的真的快，让人措不及防啊！！！我想看看我修改后还有没有html标签。Fuck!Fuck!', 2, '2018-01-23 09:27:25', '2018-01-23 10:03:03', 0),
	(41, '真正的 IT 男是什么样的？', '题主大一狗…专业软件开发…老师说我蛮适合以后做软件这方向的职业…但是我并不想变成一个IT男…我该怎么办？', 2, '2018-01-24 15:19:40', '2018-01-24 15:19:40', 0),
	(42, '机器学习之前，让「大熊猫」先尝一尝数据的味道', '大熊猫是全竹宴美食家中的饕餮，亦是十足的瞌睡虫。不过它们还身怀一项隐秘技能：（不遗余力吞噬下）大量的数据。今天将要介绍的就是数据处理中最强有力也最流行的工具之一：Pandas！', 3, '2018-01-24 15:22:38', '2018-01-24 15:22:38', 0),
	(43, '做好人太难了啊！！！', '这世道，真的是让人心寒，做好人是真的做不得啊', 2, '2018-01-27 17:07:05', '2018-01-27 17:16:33', -1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- 正在导出表  yangfu.post_topics 的数据：3 rows
/*!40000 ALTER TABLE `post_topics` DISABLE KEYS */;
INSERT INTO `post_topics` (`id`, `post_id`, `topic_id`, `created_at`, `updated_at`) VALUES
	(1, 40, 1, '2018-01-24 18:10:02', '2018-01-24 18:10:02'),
	(2, 41, 1, '2018-01-24 18:10:16', '2018-01-24 18:10:16'),
	(3, 42, 1, '2018-01-25 10:04:30', '2018-01-25 10:04:30');
/*!40000 ALTER TABLE `post_topics` ENABLE KEYS */;

-- 正在导出表  yangfu.topics 的数据：2 rows
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, '美食', '2018-01-24 16:21:51', '2018-01-24 16:21:51'),
	(2, '经典', '2018-01-24 16:22:50', '2018-01-24 16:22:50');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;

-- 正在导出表  yangfu.users 的数据：3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'facebook', 'face@163.com', '$2y$10$ia9UrmaY0NuPgtseEnmgkOOqYnY3.OfHhIZHVIgas2ZXPvQbc3Cpm', NULL, '2018-01-20 17:22:24', '2018-01-20 17:22:24'),
	(2, 'test1', 'test1@126.com', '$2y$10$TIYwdxsdI57.6JD2n.SOdeElOVR/D2j7UYUJ29V5xyWGwBDH6YQT.', 'Ti1kD7CX3mMfEXExv8NLsPsX0YrkrVoSN7Vgi5TgrbPJdBM46xMTgJrQ52Xe', '2018-01-20 17:23:15', '2018-01-20 17:23:15'),
	(3, 'James', 'James@126.com', '$2y$10$RyeAY6/Atts6R4wDMDF9jejY1dLNL9hWIajXPH5x2vdoDPH6OrJZW', 'uM3ubK900yupResfLRASziiAF9JklL4NEyBOfF7ZXAHU3cMTKDbHxLBVdGz8', '2018-01-23 09:58:57', '2018-01-23 09:58:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- 正在导出表  yangfu.user_notice 的数据：0 rows
/*!40000 ALTER TABLE `user_notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_notice` ENABLE KEYS */;

-- 正在导出表  yangfu.zans 的数据：3 rows
/*!40000 ALTER TABLE `zans` DISABLE KEYS */;
INSERT INTO `zans` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
	(7, 2, 40, '2018-01-23 15:02:00', '2018-01-23 15:02:00'),
	(8, 2, 41, '2018-01-25 10:16:17', '2018-01-25 10:16:17'),
	(9, 3, 42, '2018-01-31 17:17:14', '2018-01-31 17:17:14');
/*!40000 ALTER TABLE `zans` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
