CREATE TABLE "c21_categories" (
  "id" integer NOT NULL,
  "name" varchar(100) NOT NULL,
  "desc" text,
  "arabic" varchar(255) NOT NULL

);
INSERT INTO "c21_categories" VALUES(1, 'Breakfast', NULL, 'وجبات الافطار');
INSERT INTO "c21_categories" VALUES(2, 'Appetizers', NULL, 'المقبلات');
INSERT INTO "c21_categories" VALUES(3, 'Salads', NULL, 'السلطات');
INSERT INTO "c21_categories" VALUES(4, 'Soups', NULL, 'الشوربة');
INSERT INTO "c21_categories" VALUES(5, 'Pasta', NULL, 'المكرونة');
INSERT INTO "c21_categories" VALUES(6, 'Main Courses', NULL, 'الوجبات الرئيسية');
INSERT INTO "c21_categories" VALUES(7, 'Sticks', NULL, 'ستبك');
INSERT INTO "c21_categories" VALUES(8, 'Sandwiches', NULL, 'ساندوتشات');
INSERT INTO "c21_categories" VALUES(9, 'Our Home Made Burger', NULL, 'برجر بيتي');
INSERT INTO "c21_categories" VALUES(10, 'Pizza', NULL, 'بيتزا');
INSERT INTO "c21_categories" VALUES(11, 'Hot Coffee', NULL, 'قهوة ساخنة');
INSERT INTO "c21_categories" VALUES(12, 'Iced Coffee', NULL, 'قهوة باردة');
INSERT INTO "c21_categories" VALUES(13, 'Tea', NULL, 'شاي');
INSERT INTO "c21_categories" VALUES(14, 'Others', NULL, 'مشروبات اخرى');
INSERT INTO "c21_categories" VALUES(15, 'Fresh juices', NULL, 'عصائر طبيعية');
INSERT INTO "c21_categories" VALUES(16, 'Cocktails', NULL, 'الكوكتيلات');
INSERT INTO "c21_categories" VALUES(17, 'Shakes', NULL, 'ميلك شيك');
INSERT INTO "c21_categories" VALUES(18, 'Soft Drinks', NULL, 'مشروبات');
INSERT INTO "c21_categories" VALUES(19, 'Desserts', NULL, 'حلويات');
INSERT INTO "c21_categories" VALUES(20, 'zfadsf', NULL, '');
INSERT INTO "c21_categories" VALUES(21, '', NULL, 'sgdfgfdgs');

CREATE TABLE "c21_ci_sessions" (
  "id" varchar(128) NOT NULL,
  "ip_address" varchar(45) NOT NULL,
  "timestamp" integer UNSIGNED NOT NULL DEFAULT '0',
  "data" blob NOT NULL

);
CREATE TABLE "c21_customers" (
  "id" integer NOT NULL,
  "name" varchar(50) NOT NULL,
  "is_available" integer NOT NULL DEFAULT '1',
  "section_id" integer NOT NULL

);
INSERT INTO "c21_customers" VALUES(50, 't_1', 1, 1);
INSERT INTO "c21_customers" VALUES(52, 't_2', 1, 1);
INSERT INTO "c21_customers" VALUES(64, 'table__63', 1, 2);
INSERT INTO "c21_customers" VALUES(112, 'زرع111', 1, 3);
INSERT INTO "c21_customers" VALUES(114, 'زرع113', 1, 3);
INSERT INTO "c21_customers" VALUES(116, 'زرع115', 1, 3);
INSERT INTO "c21_customers" VALUES(118, 'فوق_117', 1, 4);
INSERT INTO "c21_customers" VALUES(119, 'فوق_', 1, 0);
INSERT INTO "c21_customers" VALUES(120, 'فوق_119', 1, 4);
INSERT INTO "c21_customers" VALUES(121, 'فوق_', 1, 0);
INSERT INTO "c21_customers" VALUES(122, 'فوق_121', 1, 4);
INSERT INTO "c21_customers" VALUES(123, 'فوق_', 1, 0);
INSERT INTO "c21_customers" VALUES(124, 'فوق_123', 1, 4);
INSERT INTO "c21_customers" VALUES(125, 'ص_', 1, 0);
INSERT INTO "c21_customers" VALUES(126, 'ص_125', 1, 2);
INSERT INTO "c21_customers" VALUES(127, 'ص_', 1, 0);
INSERT INTO "c21_customers" VALUES(128, 'ص_127', 1, 2);
INSERT INTO "c21_customers" VALUES(129, 'ص_', 1, 0);
INSERT INTO "c21_customers" VALUES(130, 'ص_129', 1, 2);
INSERT INTO "c21_customers" VALUES(131, 'ص_', 1, 0);
INSERT INTO "c21_customers" VALUES(132, 'ص_131', 1, 2);
INSERT INTO "c21_customers" VALUES(133, 'ص_', 1, 0);
INSERT INTO "c21_customers" VALUES(134, 'ص_133', 1, 2);
INSERT INTO "c21_customers" VALUES(135, 'ص_', 1, 0);
INSERT INTO "c21_customers" VALUES(136, 'ص_135', 1, 2);

CREATE TABLE "c21_customers_sections" (
  "id" integer NOT NULL,
  "name" varchar(255) NOT NULL

);
INSERT INTO "c21_customers_sections" VALUES(1, 'القاعة الرئيسية');
INSERT INTO "c21_customers_sections" VALUES(2, 'المحل الصغير');
INSERT INTO "c21_customers_sections" VALUES(3, 'الجنينة');
INSERT INTO "c21_customers_sections" VALUES(4, 'الدور الاول');

CREATE TABLE "c21_deffered_stock_items" (
  "id" integer NOT NULL,
  "item_id" integer NOT NULL,
  "amount" double NOT NULL,
  "shift_id" integer NOT NULL,
  "time" datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "is_stock_deduct" integer NOT NULL DEFAULT '0' 

);
INSERT INTO "c21_deffered_stock_items" VALUES(100, 38, 4, 132, '2017-02-16 19:58:24', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(101, 35, 4, 132, '2017-02-16 21:22:18', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(102, 34, 0.2, 132, '2017-02-16 21:22:18', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(103, 38, 1, 133, '2017-02-16 21:32:08', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(104, 38, 1, 134, '2017-02-16 21:53:27', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(105, 35, 4, 135, '2017-02-16 22:35:11', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(106, 34, 0.2, 135, '2017-02-16 22:35:11', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(107, 35, 5, 135, '2017-02-16 22:35:11', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(108, 38, 1, 135, '2017-02-16 22:52:05', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(109, 35, 5, 135, '2017-02-16 22:52:05', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(110, 5, 0.2, 135, '2017-02-25 00:38:36', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(111, 44, 0.4, 135, '2017-02-25 00:38:36', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(112, 35, 4, 135, '2017-02-25 00:38:36', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(113, 34, 0.2, 135, '2017-02-25 00:38:36', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(114, 38, 1, 135, '2017-02-25 00:38:36', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(115, 35, 5, 135, '2017-02-25 00:38:36', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(116, 44, 0.2, 135, '2017-02-25 00:38:36', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(117, 35, 12, 135, '2017-02-25 00:38:48', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(118, 34, 0.6, 135, '2017-02-25 00:38:48', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(119, 35, 15, 135, '2017-02-25 00:38:48', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(120, 38, 2, 135, '2017-02-25 00:38:48', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(121, 5, 0.5, 135, '2017-02-25 00:39:02', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(122, 35, 5, 135, '2017-02-25 00:39:02', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(123, 35, 8, 135, '2017-02-25 00:39:02', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(124, 34, 0.4, 135, '2017-02-25 00:39:02', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(125, 5, 0.1, 136, '2017-03-03 05:13:21', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(126, 38, 1, 136, '2017-03-03 20:50:21', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(127, 38, 1, 136, '2017-03-03 21:05:25', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(128, 35, 4, 136, '2017-03-03 21:07:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(129, 34, 0.2, 136, '2017-03-03 21:07:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(130, 38, 1, 136, '2017-03-03 21:07:23', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(131, 35, 10, 136, '2017-03-03 21:07:23', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(132, 35, 4, 136, '2017-03-03 21:14:20', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(133, 34, 0.2, 136, '2017-03-03 21:14:20', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(134, 35, 4, 136, '2017-03-03 21:14:35', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(135, 34, 0.2, 136, '2017-03-03 21:14:35', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(136, 17, 2, 136, '2017-03-03 21:15:00', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(137, 35, 4, 136, '2017-03-03 21:17:44', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(138, 34, 0.2, 136, '2017-03-03 21:17:44', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(139, 35, 5, 136, '2017-03-03 21:17:44', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(140, 38, 1, 136, '2017-03-03 21:17:44', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(141, 35, 4, 136, '2017-03-03 21:18:01', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(142, 34, 0.2, 136, '2017-03-03 21:18:01', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(143, 35, 4, 136, '2017-03-03 21:23:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(144, 34, 0.2, 136, '2017-03-03 21:23:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(145, 5, 0.1, 136, '2017-03-03 21:34:22', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(146, 44, 0.2, 136, '2017-03-03 21:34:35', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(147, 5, 0.1, 136, '2017-03-03 21:35:47', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(148, 5, 0.1, 136, '2017-03-03 21:35:47', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(149, 35, 4, 136, '2017-03-03 21:44:34', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(150, 34, 0.2, 136, '2017-03-03 21:44:34', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(151, 35, 4, 136, '2017-03-03 21:48:29', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(152, 34, 0.2, 136, '2017-03-03 21:48:29', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(153, 38, 1, 136, '2017-03-03 21:48:29', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(154, 5, 0.1, 136, '2017-03-03 21:49:13', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(155, 35, 80, 137, '2017-03-06 00:20:27', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(156, 34, 4, 137, '2017-03-06 00:20:27', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(157, 35, 5, 137, '2017-03-06 00:20:27', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(158, 5, 0.2, 138, '2017-03-06 00:23:48', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(159, 1, 0.2, 138, '2017-03-06 00:23:48', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(160, 38, 1, 138, '2017-03-06 00:23:48', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(161, 35, 12, 138, '2017-03-06 00:23:48', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(162, 34, 0.6, 138, '2017-03-06 00:23:48', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(163, 35, 20, 139, '2017-03-06 00:25:31', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(164, 35, 4, 139, '2017-03-06 00:25:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(165, 34, 0.2, 139, '2017-03-06 00:25:31', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(166, 38, 1, 140, '2017-03-09 23:08:50', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(167, 35, 5, 140, '2017-03-09 23:08:50', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(168, 35, 4, 140, '2017-03-09 23:08:50', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(169, 34, 0.2, 140, '2017-03-09 23:08:50', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(170, 35, 4, 140, '2017-03-15 00:59:21', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(171, 34, 0.2, 140, '2017-03-15 00:59:21', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(172, 38, 1, 140, '2017-03-15 00:59:21', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(173, 35, 24, 141, '2017-03-15 01:03:11', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(174, 34, 1.2, 141, '2017-03-15 01:03:11', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(175, 35, 10, 142, '2017-03-15 01:06:09', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(176, 34, 0.4, 142, '2017-03-15 01:06:09', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(177, 35, 10, 142, '2017-03-15 01:06:09', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(178, 38, 2, 142, '2017-03-15 01:06:09', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(179, 35, 10, 143, '2017-03-15 01:08:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(180, 34, 0.4, 143, '2017-03-15 01:08:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(181, 35, 10, 143, '2017-03-15 01:08:23', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(182, 5, 0.4, 144, '2017-03-17 20:46:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(183, 44, 0.4, 144, '2017-03-17 20:46:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(184, 5, 0.1, 144, '2017-03-17 20:46:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(185, 35, 1660, 144, '2017-03-17 20:46:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(186, 34, 66.4, 144, '2017-03-17 20:46:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(187, 38, 1, 144, '2017-03-17 20:46:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(188, 35, 15, 144, '2017-03-19 00:03:13', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(189, 35, 15, 144, '2017-03-19 00:03:13', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(190, 34, 0.6, 144, '2017-03-19 00:03:13', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(191, 38, 1, 144, '2017-03-19 00:03:13', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(192, 44, 0.2, 144, '2017-03-19 00:03:13', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(193, 5, 0.2, 144, '2017-03-19 00:03:13', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(194, 35, 15, 144, '2017-03-19 00:05:30', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(195, 34, 0.6, 144, '2017-03-19 00:05:30', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(196, 38, 1, 144, '2017-03-19 00:05:30', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(197, 35, 10, 144, '2017-03-19 01:04:24', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(198, 34, 0.4, 144, '2017-03-19 01:04:24', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(199, 35, 5, 144, '2017-03-19 01:04:24', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(200, 35, 5, 144, '2017-03-19 01:05:28', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(201, 34, 0.2, 144, '2017-03-19 01:05:28', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(202, 38, 6, 162, '2017-03-26 21:25:56', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(203, 35, 45, 162, '2017-03-26 21:25:56', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(204, 34, 1.8, 162, '2017-03-26 21:25:56', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(205, 35, 60, 162, '2017-03-26 21:25:56', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(206, 5, 4.5, 162, '2017-03-26 21:25:56', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(207, 35, 10, 162, '2017-03-26 21:26:11', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(208, 35, 10, 162, '2017-03-26 21:26:11', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(209, 34, 0.4, 162, '2017-03-26 21:26:11', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(210, 38, 1, 162, '2017-03-26 21:26:11', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(211, 35, 10, 162, '2017-03-26 21:26:17', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(212, 34, 0.4, 162, '2017-03-26 21:26:17', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(213, 35, 5, 162, '2017-03-26 21:26:26', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(214, 34, 0.2, 162, '2017-03-26 21:26:26', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(215, 35, 5, 162, '2017-03-26 21:26:30', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(216, 34, 0.2, 162, '2017-03-26 21:26:30', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(217, 35, 5, 162, '2017-03-26 21:26:35', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(218, 35, 5, 162, '2017-03-26 21:26:41', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(219, 34, 0.2, 162, '2017-03-26 21:26:41', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(220, 35, 5, 162, '2017-03-26 21:26:41', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(221, 38, 41, 162, '2017-03-26 21:26:41', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(222, 38, 1, 163, '2017-03-26 22:08:04', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(223, 35, 5, 163, '2017-03-26 22:08:04', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(224, 44, 0.2, 1, '2017-03-27 00:25:04', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(225, 5, 0.1, 1, '2017-03-27 00:25:04', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(226, 38, 1, 1, '2017-03-27 00:25:09', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(227, 35, 10, 1, '2017-03-27 00:25:09', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(228, 5, 0.2, 1, '2017-03-27 00:25:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(229, 35, 15, 1, '2017-03-27 00:25:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(230, 34, 0.6, 1, '2017-03-27 00:25:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(231, 35, 5, 1, '2017-03-27 00:25:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(232, 38, 2, 1, '2017-03-27 00:25:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(233, 35, 5, 79, '2017-03-29 23:43:01', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(234, 34, 0.2, 79, '2017-03-29 23:43:01', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(235, 35, 5, 79, '2017-03-29 23:43:01', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(236, 38, 1, 79, '2017-03-29 23:43:01', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(237, 35, 10, 79, '2017-03-30 00:52:26', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(238, 38, 2, 79, '2017-03-30 00:52:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(239, 35, 5, 79, '2017-03-30 00:52:26', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(240, 34, 0.2, 79, '2017-03-30 00:52:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(241, 5, 0.1, 79, '2017-03-30 00:52:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(242, 44, 0.2, 79, '2017-03-30 00:52:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(243, 5, 0.1, 79, '2017-03-30 00:52:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(244, 38, 1, 79, '2017-03-30 00:52:33', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(245, 35, 5, 79, '2017-03-30 00:52:45', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(246, 34, 0.2, 79, '2017-03-30 00:52:45', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(247, 38, 1, 79, '2017-03-30 00:52:45', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(248, 5, 0.1, 79, '2017-03-30 22:13:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(249, 44, 0.2, 79, '2017-03-30 22:13:31', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(250, 17, 0.1, 24, '2017-04-01 18:54:14', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(251, 5, 0.1, 39, '2017-04-11 16:25:54', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(252, 38, 1, 39, '2017-04-12 15:07:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(253, 35, 10, 39, '2017-04-12 15:07:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(254, 34, 0.4, 39, '2017-04-12 15:07:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(255, 3, 0.2, 39, '2017-04-12 15:07:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(256, 1, 0.2, 39, '2017-04-12 15:07:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(257, 5, 0.1, 40, '2017-04-14 12:52:33', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(258, 38, 1, 41, '2017-04-15 18:21:57', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(259, 35, 5, 41, '2017-04-15 18:52:20', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(260, 12, 0.6, 41, '2017-04-15 18:52:20', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(261, 18, 0.1, 41, '2017-04-15 18:52:20', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(262, 5, 0.1, 42, '2017-04-16 21:47:47', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(263, 14, 0.6, 42, '2017-04-16 21:47:47', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(264, 5, 0.6, 42, '2017-04-16 21:47:47', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(265, 17, 0.6, 42, '2017-04-16 21:47:47', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(266, 44, 0.2, 42, '2017-04-22 23:47:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(267, 35, 5, 42, '2017-04-22 23:47:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(268, 12, 0.6, 42, '2017-04-22 23:47:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(269, 18, 0.1, 42, '2017-04-22 23:47:23', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(270, 38, 1, 42, '2017-04-22 23:47:31', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(271, 35, 130, 42, '2017-04-22 23:47:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(272, 34, 5.2, 42, '2017-04-22 23:47:31', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(273, 3, 2.6, 42, '2017-04-22 23:47:31', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(274, 1, 2.6, 42, '2017-04-22 23:47:31', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(275, 14, 0.1, 5, '2017-04-23 17:28:27', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(276, 5, 0.1, 5, '2017-04-23 17:28:27', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(277, 17, 0.1, 5, '2017-04-23 17:28:27', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(278, 38, 1, 1, '2017-04-25 22:26:52', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(279, 35, 5, 1, '2017-04-25 22:38:28', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(280, 12, 0.6, 1, '2017-04-25 22:38:28', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(281, 18, 0.1, 1, '2017-04-25 22:38:28', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(282, 38, 1, 1, '2017-04-25 22:38:28', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(283, 5, 0.1, 1, '2017-04-25 23:23:50', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(284, 14, 0.1, 1, '2017-04-25 23:23:50', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(285, 5, 0.1, 1, '2017-04-25 23:23:50', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(286, 17, 0.1, 1, '2017-04-25 23:23:50', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(287, 5, 0.2, 2, '2017-05-20 18:21:25', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(288, 1, 0.2, 2, '2017-05-20 18:21:25', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(289, 45, 0.2, 2, '2017-05-20 18:21:25', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(290, 35, 5, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(291, 34, 0.2, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(292, 3, 0.1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(293, 1, 0.1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(294, 38, 1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(295, 1, 0.1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(296, 18, 0.1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(297, 16, 0.1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(298, 5, 0.1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(299, 14, 0.2, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(300, 5, 0.2, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(301, 17, 0.2, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(302, 44, 0.2, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(303, 5, 0.2, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(304, 46, 1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(305, 5, 0.1, 2, '2017-05-23 21:22:31', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(306, 35, 5, 2, '2017-05-23 22:31:40', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(307, 12, 0.6, 2, '2017-05-23 22:31:40', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(308, 18, 0.1, 2, '2017-05-23 22:31:40', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(309, 38, 1, 2, '2017-05-23 22:31:40', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(310, 44, 0.2, 2, '2017-05-24 14:26:09', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(311, 5, 0.1, 2, '2017-05-24 14:26:09', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(312, 44, 0.2, 2, '2017-05-24 14:26:21', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(313, 5, 0.1, 2, '2017-05-24 14:26:21', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(314, 38, 1, 2, '2017-05-25 13:23:54', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(315, 35, 5, 2, '2017-05-25 13:23:54', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(316, 12, 0.6, 2, '2017-05-25 13:23:54', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(317, 18, 0.1, 2, '2017-05-25 13:23:54', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(318, 5, 0.1, 2, '2017-05-25 13:24:34', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(319, 5, 0.1, 2, '2017-05-25 13:42:08', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(320, 1, 0.1, 2, '2017-05-25 13:42:08', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(321, 18, 0.1, 2, '2017-05-25 13:42:08', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(322, 16, 0.1, 2, '2017-05-25 13:42:08', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(323, 44, 0.1, 2, '2017-05-25 13:42:08', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(324, 5, 0.1, 2, '2017-05-25 13:43:36', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(325, 5, 0.1, 2, '2017-05-25 14:38:50', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(326, 14, 0.1, 2, '2017-05-25 14:38:50', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(327, 5, 0.1, 2, '2017-05-25 14:38:50', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(328, 17, 0.1, 2, '2017-05-25 14:38:50', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(329, 44, 0.1, 2, '2017-05-25 14:38:50', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(330, 35, 5, 4, '2017-05-26 18:39:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(331, 12, 0.6, 4, '2017-05-26 18:39:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(332, 18, 0.1, 4, '2017-05-26 18:39:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(333, 35, 5, 4, '2017-05-26 18:39:26', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(334, 34, 0.2, 4, '2017-05-26 18:39:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(335, 3, 0.1, 4, '2017-05-26 18:39:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(336, 1, 0.1, 4, '2017-05-26 18:39:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(337, 38, 1, 4, '2017-05-26 18:39:26', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(338, 5, 0.1, 4, '2017-05-26 19:37:41', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(339, 44, 0.2, 4, '2017-05-26 19:37:41', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(340, 14, 0.1, 4, '2017-05-26 19:37:41', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(341, 5, 0.1, 4, '2017-05-26 19:37:41', 0);
INSERT INTO "c21_deffered_stock_items" VALUES(342, 17, 0.1, 4, '2017-05-26 19:37:41', 1);
INSERT INTO "c21_deffered_stock_items" VALUES(343, 38, 1, 4, '2017-05-30 15:26:27', 0);

CREATE TABLE "c21_finances_moneycase" (
  "id" integer NOT NULL,
  "shift_id" integer NOT NULL,
  "date_time" datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "total" double NOT NULL

);
INSERT INTO "c21_finances_moneycase" VALUES(1, 22, '2017-04-01 18:37:28', 32.312);
INSERT INTO "c21_finances_moneycase" VALUES(2, 22, '2017-04-01 18:48:11', 42.336);
INSERT INTO "c21_finances_moneycase" VALUES(3, 24, '2017-04-01 18:54:14', 64.792);
INSERT INTO "c21_finances_moneycase" VALUES(4, 37, '2017-04-02 17:15:31', 0);
INSERT INTO "c21_finances_moneycase" VALUES(5, 38, '2017-04-02 17:18:10', 0);
INSERT INTO "c21_finances_moneycase" VALUES(6, 39, '2017-04-11 16:25:54', 24.584);
INSERT INTO "c21_finances_moneycase" VALUES(7, 39, '2017-04-12 15:07:26', 69.272);
INSERT INTO "c21_finances_moneycase" VALUES(8, 39, '2017-04-12 15:07:35', 44.632);
INSERT INTO "c21_finances_moneycase" VALUES(9, 39, '2017-04-12 21:57:00', 0);
INSERT INTO "c21_finances_moneycase" VALUES(10, 39, '2017-04-12 22:05:05', 23.408);
INSERT INTO "c21_finances_moneycase" VALUES(11, 40, '2017-04-14 12:52:33', 24.584);
INSERT INTO "c21_finances_moneycase" VALUES(12, 41, '2017-04-15 18:21:57', 35.784);
INSERT INTO "c21_finances_moneycase" VALUES(13, 41, '2017-04-15 18:52:20', 33.488);
INSERT INTO "c21_finances_moneycase" VALUES(14, 41, '2017-04-15 19:46:51', 0);
INSERT INTO "c21_finances_moneycase" VALUES(15, 42, '2017-04-16 21:47:47', 136.192);
INSERT INTO "c21_finances_moneycase" VALUES(16, 42, '2017-04-22 23:47:23', 125.328);
INSERT INTO "c21_finances_moneycase" VALUES(17, 42, '2017-04-22 23:47:31', 713.888);
INSERT INTO "c21_finances_moneycase" VALUES(18, 46, '2017-04-23 00:20:30', 39.032);
INSERT INTO "c21_finances_moneycase" VALUES(19, 47, '2017-04-23 00:21:44', 21.224);
INSERT INTO "c21_finances_moneycase" VALUES(20, 2, '2017-04-23 14:37:28', 0);
INSERT INTO "c21_finances_moneycase" VALUES(21, 3, '2017-04-23 17:14:07', 0);
INSERT INTO "c21_finances_moneycase" VALUES(22, 5, '2017-04-23 17:28:27', 39.088);
INSERT INTO "c21_finances_moneycase" VALUES(23, 1, '2017-04-23 17:47:56', 0);
INSERT INTO "c21_finances_moneycase" VALUES(24, 1, '2017-04-25 22:26:52', 52.472);
INSERT INTO "c21_finances_moneycase" VALUES(25, 1, '2017-04-25 22:38:28', 60.312);
INSERT INTO "c21_finances_moneycase" VALUES(26, 1, '2017-04-25 23:23:50', 63.672);
INSERT INTO "c21_finances_moneycase" VALUES(27, 1, '2017-04-25 23:25:33', 31.192);
INSERT INTO "c21_finances_moneycase" VALUES(28, 1, '2017-05-10 12:36:14', 0);
INSERT INTO "c21_finances_moneycase" VALUES(29, 1, '2017-05-10 12:36:36', 0);
INSERT INTO "c21_finances_moneycase" VALUES(30, 1, '2017-05-10 12:36:42', 0);
INSERT INTO "c21_finances_moneycase" VALUES(31, 1, '2017-05-10 12:36:53', 0);
INSERT INTO "c21_finances_moneycase" VALUES(32, 1, '2017-05-10 12:37:00', 0);
INSERT INTO "c21_finances_moneycase" VALUES(33, 1, '2017-05-10 12:37:09', 0);
INSERT INTO "c21_finances_moneycase" VALUES(34, 1, '2017-05-10 12:37:56', 0);
INSERT INTO "c21_finances_moneycase" VALUES(35, 1, '2017-05-10 12:38:07', 0);
INSERT INTO "c21_finances_moneycase" VALUES(36, 1, '2017-05-10 12:39:03', 0);
INSERT INTO "c21_finances_moneycase" VALUES(37, 1, '2017-05-10 12:39:24', 0);
INSERT INTO "c21_finances_moneycase" VALUES(38, 2, '2017-05-11 14:59:50', 0);
INSERT INTO "c21_finances_moneycase" VALUES(39, 2, '2017-05-12 04:45:02', 0);
INSERT INTO "c21_finances_moneycase" VALUES(40, 2, '2017-05-12 04:45:11', 0);
INSERT INTO "c21_finances_moneycase" VALUES(41, 2, '2017-05-12 04:49:10', 0);
INSERT INTO "c21_finances_moneycase" VALUES(42, 2, '2017-05-12 04:49:10', 0);
INSERT INTO "c21_finances_moneycase" VALUES(43, 2, '2017-05-20 18:21:25', 197.6);
INSERT INTO "c21_finances_moneycase" VALUES(44, 2, '2017-05-22 00:25:16', 0);
INSERT INTO "c21_finances_moneycase" VALUES(45, 2, '2017-05-22 00:25:16', 0);
INSERT INTO "c21_finances_moneycase" VALUES(46, 2, '2017-05-22 00:25:29', 0);
INSERT INTO "c21_finances_moneycase" VALUES(47, 2, '2017-05-22 00:25:29', 0);
INSERT INTO "c21_finances_moneycase" VALUES(48, 2, '2017-05-23 21:22:31', 1965.7);
INSERT INTO "c21_finances_moneycase" VALUES(49, 2, '2017-05-23 22:19:30', 0);
INSERT INTO "c21_finances_moneycase" VALUES(50, 2, '2017-05-23 22:25:08', 0);
INSERT INTO "c21_finances_moneycase" VALUES(51, 2, '2017-05-23 22:26:58', 0);
INSERT INTO "c21_finances_moneycase" VALUES(52, 2, '2017-05-23 22:28:23', 0);
INSERT INTO "c21_finances_moneycase" VALUES(53, 2, '2017-05-23 22:31:14', 0);
INSERT INTO "c21_finances_moneycase" VALUES(54, 2, '2017-05-23 22:31:40', 60.312);
INSERT INTO "c21_finances_moneycase" VALUES(55, 2, '2017-05-23 22:32:14', 11.144);
INSERT INTO "c21_finances_moneycase" VALUES(56, 2, '2017-05-23 23:30:40', 17.808);
INSERT INTO "c21_finances_moneycase" VALUES(57, 2, '2017-05-24 14:26:09', 49.168);
INSERT INTO "c21_finances_moneycase" VALUES(58, 2, '2017-05-24 14:26:21', 49.168);
INSERT INTO "c21_finances_moneycase" VALUES(59, 2, '2017-05-24 16:48:08', 0);
INSERT INTO "c21_finances_moneycase" VALUES(60, 2, '2017-05-24 16:48:08', 0);
INSERT INTO "c21_finances_moneycase" VALUES(61, 2, '2017-05-24 19:44:50', 0);
INSERT INTO "c21_finances_moneycase" VALUES(62, 2, '2017-05-24 19:44:50', 0);
INSERT INTO "c21_finances_moneycase" VALUES(63, 2, '2017-05-24 19:46:04', 0);
INSERT INTO "c21_finances_moneycase" VALUES(64, 2, '2017-05-24 19:46:05', 0);
INSERT INTO "c21_finances_moneycase" VALUES(65, 2, '2017-05-25 13:23:54', 45.808);
INSERT INTO "c21_finances_moneycase" VALUES(66, 2, '2017-05-25 13:24:34', 25.704);
INSERT INTO "c21_finances_moneycase" VALUES(67, 2, '2017-05-25 13:42:08', 77.112);
INSERT INTO "c21_finances_moneycase" VALUES(68, 2, '2017-05-25 13:43:36', 24.584);
INSERT INTO "c21_finances_moneycase" VALUES(70, 2, '2017-05-25 13:55:20', 16.744);
INSERT INTO "c21_finances_moneycase" VALUES(71, 2, '2017-05-25 13:59:17', 30.072);
INSERT INTO "c21_finances_moneycase" VALUES(72, 2, '2017-05-25 13:59:46', 60.256);
INSERT INTO "c21_finances_moneycase" VALUES(73, 2, '2017-05-25 14:38:50', 64.85);
INSERT INTO "c21_finances_moneycase" VALUES(74, 2, '2017-05-25 14:39:07', 0);
INSERT INTO "c21_finances_moneycase" VALUES(75, 2, '2017-05-25 14:39:07', 0);
INSERT INTO "c21_finances_moneycase" VALUES(76, 2, '2017-05-25 14:39:22', 0);
INSERT INTO "c21_finances_moneycase" VALUES(77, 2, '2017-05-25 14:39:22', 0);
INSERT INTO "c21_finances_moneycase" VALUES(78, 2, '2017-05-25 14:47:42', 0);
INSERT INTO "c21_finances_moneycase" VALUES(79, 2, '2017-05-25 14:47:42', 0);
INSERT INTO "c21_finances_moneycase" VALUES(80, 2, '2017-05-25 14:47:58', 0);
INSERT INTO "c21_finances_moneycase" VALUES(81, 2, '2017-05-25 14:47:58', 0);
INSERT INTO "c21_finances_moneycase" VALUES(82, 2, '2017-05-25 14:48:06', 0);
INSERT INTO "c21_finances_moneycase" VALUES(83, 2, '2017-05-25 14:48:06', 0);
INSERT INTO "c21_finances_moneycase" VALUES(84, 3, '2017-05-25 14:52:09', 0);
INSERT INTO "c21_finances_moneycase" VALUES(85, 3, '2017-05-25 14:52:09', 0);
INSERT INTO "c21_finances_moneycase" VALUES(86, 4, '2017-05-26 18:38:32', 44.632);
INSERT INTO "c21_finances_moneycase" VALUES(87, 4, '2017-05-26 18:39:26', 68.035);
INSERT INTO "c21_finances_moneycase" VALUES(88, 4, '2017-05-26 19:37:41', 133.5);
INSERT INTO "c21_finances_moneycase" VALUES(89, 4, '2017-05-29 00:33:22', 0);
INSERT INTO "c21_finances_moneycase" VALUES(90, 4, '2017-05-29 00:33:22', 0);
INSERT INTO "c21_finances_moneycase" VALUES(91, 4, '2017-05-30 15:26:27', 1483.552);
INSERT INTO "c21_finances_moneycase" VALUES(92, 5, '2017-06-01 00:00:07', 0);
INSERT INTO "c21_finances_moneycase" VALUES(93, 5, '2017-06-01 00:00:07', 0);
INSERT INTO "c21_finances_moneycase" VALUES(94, 5, '2017-06-02 01:27:41', 0);
INSERT INTO "c21_finances_moneycase" VALUES(95, 5, '2017-06-02 01:27:41', 0);
INSERT INTO "c21_finances_moneycase" VALUES(96, 5, '2017-06-02 02:16:29', 0);

CREATE TABLE "c21_finances_shifts" (
  "id" integer NOT NULL,
  "shift_id" integer NOT NULL,
  "end_datetime" datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "total" double NOT NULL

);
INSERT INTO "c21_finances_shifts" VALUES(1, 1, '2017-04-01 14:30:29', 0);
INSERT INTO "c21_finances_shifts" VALUES(2, 1, '2017-04-01 14:30:29', 0);
INSERT INTO "c21_finances_shifts" VALUES(3, 1, '2017-04-01 14:30:29', 0);
INSERT INTO "c21_finances_shifts" VALUES(4, 1, '2017-04-01 14:30:29', 0);
INSERT INTO "c21_finances_shifts" VALUES(5, 2, '2017-04-01 14:35:31', 0);
INSERT INTO "c21_finances_shifts" VALUES(6, 2, '2017-04-01 14:35:31', 0);
INSERT INTO "c21_finances_shifts" VALUES(7, 144, '2017-04-01 14:36:04', 0);
INSERT INTO "c21_finances_shifts" VALUES(8, 144, '2017-04-01 14:36:04', 0);
INSERT INTO "c21_finances_shifts" VALUES(9, 3, '2017-04-01 14:59:23', 0);
INSERT INTO "c21_finances_shifts" VALUES(11, 3, '2017-04-01 15:34:08', 0);
INSERT INTO "c21_finances_shifts" VALUES(12, 4, '2017-04-01 15:39:41', 0);
INSERT INTO "c21_finances_shifts" VALUES(13, 4, '2017-04-01 15:48:00', 0);
INSERT INTO "c21_finances_shifts" VALUES(14, 4, '2017-04-01 16:13:03', 0);
INSERT INTO "c21_finances_shifts" VALUES(15, 6, '2017-04-01 16:16:13', 0);
INSERT INTO "c21_finances_shifts" VALUES(16, 6, '2017-04-01 16:17:55', 0);
INSERT INTO "c21_finances_shifts" VALUES(17, 7, '2017-04-01 16:19:54', 0);
INSERT INTO "c21_finances_shifts" VALUES(19, 8, '2017-04-01 16:21:58', 0);
INSERT INTO "c21_finances_shifts" VALUES(20, 10, '2017-04-01 16:29:22', 0);
INSERT INTO "c21_finances_shifts" VALUES(21, 11, '2017-04-01 16:30:23', 0);
INSERT INTO "c21_finances_shifts" VALUES(22, 12, '2017-04-01 16:33:48', 0);
INSERT INTO "c21_finances_shifts" VALUES(23, 13, '2017-04-01 16:57:24', 0);
INSERT INTO "c21_finances_shifts" VALUES(24, 14, '2017-04-01 16:59:08', 0);
INSERT INTO "c21_finances_shifts" VALUES(25, 15, '2017-04-01 17:03:25', 0);
INSERT INTO "c21_finances_shifts" VALUES(26, 16, '2017-04-01 17:06:15', 0);
INSERT INTO "c21_finances_shifts" VALUES(27, 17, '2017-04-01 17:17:21', 0);
INSERT INTO "c21_finances_shifts" VALUES(28, 18, '2017-04-01 17:19:13', 0);
INSERT INTO "c21_finances_shifts" VALUES(29, 19, '2017-04-01 17:20:34', 0);
INSERT INTO "c21_finances_shifts" VALUES(30, 20, '2017-04-01 17:23:11', 0);
INSERT INTO "c21_finances_shifts" VALUES(31, 21, '2017-04-01 17:25:23', 0);
INSERT INTO "c21_finances_shifts" VALUES(32, 22, '2017-04-01 17:43:17', 0);
INSERT INTO "c21_finances_shifts" VALUES(33, 22, '2017-04-01 17:46:39', 0);
INSERT INTO "c21_finances_shifts" VALUES(34, 22, '2017-04-01 17:54:39', 0);
INSERT INTO "c21_finances_shifts" VALUES(35, 22, '2017-04-01 18:01:46', 0);
INSERT INTO "c21_finances_shifts" VALUES(36, 22, '2017-04-01 18:03:45', 0);
INSERT INTO "c21_finances_shifts" VALUES(37, 22, '2017-04-01 18:38:06', 32.25);
INSERT INTO "c21_finances_shifts" VALUES(38, 22, '2017-04-01 18:48:21', 74.5);
INSERT INTO "c21_finances_shifts" VALUES(39, 23, '2017-04-01 18:49:27', 0);
INSERT INTO "c21_finances_shifts" VALUES(40, 23, '2017-04-01 18:52:38', 0);
INSERT INTO "c21_finances_shifts" VALUES(41, 24, '2017-04-01 18:57:15', 64.75);
INSERT INTO "c21_finances_shifts" VALUES(43, 25, '2017-04-01 18:59:08', 0);
INSERT INTO "c21_finances_shifts" VALUES(44, 27, '2017-04-01 18:59:47', 0);
INSERT INTO "c21_finances_shifts" VALUES(46, 28, '2017-04-01 19:45:13', 0);
INSERT INTO "c21_finances_shifts" VALUES(47, 30, '2017-04-01 20:00:13', 0);
INSERT INTO "c21_finances_shifts" VALUES(48, 30, '2017-04-01 20:13:28', 0);
INSERT INTO "c21_finances_shifts" VALUES(49, 31, '2017-04-02 16:59:47', 0);
INSERT INTO "c21_finances_shifts" VALUES(50, 36, '2017-04-02 17:14:42', 0);
INSERT INTO "c21_finances_shifts" VALUES(51, 37, '2017-04-02 17:15:51', 0);
INSERT INTO "c21_finances_shifts" VALUES(52, 39, '2017-04-12 22:06:20', 161.75);
INSERT INTO "c21_finances_shifts" VALUES(53, 40, '2017-04-14 12:52:44', 24.5);
INSERT INTO "c21_finances_shifts" VALUES(54, 41, '2017-04-15 19:47:10', 69.25);
INSERT INTO "c21_finances_shifts" VALUES(55, 42, '2017-04-22 23:48:04', 975.25);
INSERT INTO "c21_finances_shifts" VALUES(56, 44, '2017-04-22 23:57:06', 0);
INSERT INTO "c21_finances_shifts" VALUES(57, 45, '2017-04-23 00:03:50', 0);
INSERT INTO "c21_finances_shifts" VALUES(58, 3, '2017-04-23 17:14:25', 0);
INSERT INTO "c21_finances_shifts" VALUES(59, 5, '2017-04-23 17:28:57', 39);
INSERT INTO "c21_finances_shifts" VALUES(60, 1, '2017-04-23 17:48:09', 0);
INSERT INTO "c21_finances_shifts" VALUES(61, 1, '2017-05-10 12:40:26', 207.5);
INSERT INTO "c21_finances_shifts" VALUES(62, 3, '2017-05-25 14:52:20', 0);
INSERT INTO "c21_finances_shifts" VALUES(63, 4, '2017-05-30 15:26:41', 1729.5);

CREATE TABLE "c21_items" (
  "id" integer NOT NULL,
  "name" varchar(100) NOT NULL,
  "desc" integer DEFAULT NULL,
  "reorder_level" double NOT NULL DEFAULT '0',
  "item_category" integer NOT NULL,
  "item_unit" integer NOT NULL

);
INSERT INTO "c21_items" VALUES(1, 'لحم بتلو', 0, 2, 2, 1);
INSERT INTO "c21_items" VALUES(2, 'شمبري', 0, 2, 2, 1);
INSERT INTO "c21_items" VALUES(3, 'سجق', 0, 2, 2, 1);
INSERT INTO "c21_items" VALUES(4, 'بسطرمة ', 0, 2, 305, 1);
INSERT INTO "c21_items" VALUES(5, 'صدور فراخ', 0, 2, 2, 1);
INSERT INTO "c21_items" VALUES(6, 'وراك فراخ', 0, 2, 2, 1);
INSERT INTO "c21_items" VALUES(12, 'كانزات بيبسي', 2, 500, 1, 1);
INSERT INTO "c21_items" VALUES(13, 'كانزات فيروز', 2, 4, 1, 1);
INSERT INTO "c21_items" VALUES(14, 'علب عصير اناناس', 2, 10, 1, 1);
INSERT INTO "c21_items" VALUES(15, ' علب عصير تفاح', 2, 10, 1, 1);
INSERT INTO "c21_items" VALUES(16, 'فرخة كاملة', 0, 4, 2, 1);
INSERT INTO "c21_items" VALUES(17, 'لحم مفروم', 0, 4, 2, 1);
INSERT INTO "c21_items" VALUES(18, ';klsdjf;lkjasdf', 0, 20, 2, 1);
INSERT INTO "c21_items" VALUES(19, 'زبدة', 0, 4, 305, 1);
INSERT INTO "c21_items" VALUES(20, 'زيت', 0, 4, 305, 1);
INSERT INTO "c21_items" VALUES(24, 'موز', 55, 4, 307, 1);
INSERT INTO "c21_items" VALUES(29, 'تفاح', 0, 4, 307, 1);
INSERT INTO "c21_items" VALUES(30, 'كانتلوب', 0, 10, 307, 1);
INSERT INTO "c21_items" VALUES(33, 'عنب', 0, 2, 307, 1);
INSERT INTO "c21_items" VALUES(34, 'مشروم', 0, 10, 305, 3);
INSERT INTO "c21_items" VALUES(35, 'بيض', 0, 50, 305, 3);
INSERT INTO "c21_items" VALUES(36, 'فراولة', 0, 4, 307, 3);
INSERT INTO "c21_items" VALUES(37, 'لبن سايب', 0, 5, 305, 1);
INSERT INTO "c21_items" VALUES(38, 'كرواسون', 0, 10, 308, 2);
INSERT INTO "c21_items" VALUES(39, 'خضار مشكل', 0, 10, 307, 1);
INSERT INTO "c21_items" VALUES(40, 'ايس كريم', 0, 4, 1, 1);
INSERT INTO "c21_items" VALUES(43, 'عصير مانجو', 0, 4, 1, 2);
INSERT INTO "c21_items" VALUES(44, 'جمبري', 0, 5, 306, 1);
INSERT INTO "c21_items" VALUES(45, 'سبيط', 0, 5, 306, 1);
INSERT INTO "c21_items" VALUES(46, 'علبة تونة قطعة واحدة', 0, 5, 305, 3);
INSERT INTO "c21_items" VALUES(47, 'برطمان نوتيلا', 0, 5, 305, 1);

CREATE TABLE "c21_items_categories" (
  "id" integer NOT NULL,
  "name" varchar(255) NOT NULL

);
INSERT INTO "c21_items_categories" VALUES(1, 'خامات من الموردين');
INSERT INTO "c21_items_categories" VALUES(2, 'لحوم و دواجن');
INSERT INTO "c21_items_categories" VALUES(305, 'مشتروات من السوبرماركت');
INSERT INTO "c21_items_categories" VALUES(306, 'اسماك و منتجات بحرية');
INSERT INTO "c21_items_categories" VALUES(307, 'فواكه و خضروات');
INSERT INTO "c21_items_categories" VALUES(308, 'مخبوزات');
INSERT INTO "c21_items_categories" VALUES(309, 'gsdfggggggggggggggg');
INSERT INTO "c21_items_categories" VALUES(310, 'fasdfsdf');

CREATE TABLE "c21_items_units" (
  "id" integer NOT NULL,
  "name" varchar(20) NOT NULL

);
INSERT INTO "c21_items_units" VALUES(1, 'كجم');
INSERT INTO "c21_items_units" VALUES(2, 'برسيون');
INSERT INTO "c21_items_units" VALUES(3, 'علبة');

CREATE TABLE "c21_orders" (
  "id" integer NOT NULL,
  "shift_id" integer NOT NULL,
  "total" double NOT NULL,
  "customer_id" integer NOT NULL,
  "is_checked" integer NOT NULL DEFAULT '0',
  "start_time" time NOT NULL,
  "end_time" time NOT NULL,
  "order_type" integer NOT NULL DEFAULT '1',
  "client_address" varchar(255) NOT NULL,
  "client_name" varchar(255) NOT NULL,
  "client_notes" varchar(255) NOT NULL,
  "order_discount_value" double NOT NULL,
  "client_phone" varchar(255) NOT NULL

);
INSERT INTO "c21_orders" VALUES(2, 1, 60.312, 1, 1, '22:37:03', '22:38:28', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(3, 1, 63.672, 2, 1, '23:23:31', '23:23:50', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(4, 1, 31.192, 2, 1, '23:24:48', '23:25:33', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(5, 1, 0, 2, 1, '17:24:33', '12:37:09', 3, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(6, 1, 0, 3, 1, '00:45:29', '12:36:36', 2, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(7, 1, 0, 4, 1, '12:20:29', '12:36:53', 0, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(8, 1, 0, 3, 1, '12:37:52', '12:37:56', 0, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(9, 1, 0, 3, 1, '12:37:59', '12:38:07', 0, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(10, 1, 0, 3, 1, '12:39:00', '12:39:03', 0, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(11, 1, 0, 10, 1, '12:39:12', '12:39:24', 0, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(12, 2, 0, 1, 1, '12:43:12', '14:59:50', 3, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(13, 2, 0, 7, 1, '17:33:12', '04:45:02', 2, 'jafsdfhf;h;ljh', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(14, 2, 0, 6, 1, '04:45:07', '04:45:11', 0, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(15, 2, 0, 3, 1, '04:48:42', '04:49:10', 0, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(16, 2, 0, 10, 1, '04:49:20', '00:25:16', 1, '4 شارع المامون ابوشوشة', 'حمد مدحت محمد', 'ملاحضات للاوردار', 0, '');
INSERT INTO "c21_orders" VALUES(17, 2, 197.6, 3, 1, '05:37:41', '18:21:25', 2, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(18, 2, 0, 1, 1, '14:49:41', '00:25:29', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(19, 2, 1965.7, 2, 1, '15:28:37', '21:22:31', 2, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(20, 2, 0, 1, 1, '22:17:52', '22:25:08', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(21, 2, 0, 9, 1, '22:26:41', '22:26:58', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(22, 2, 0, 10, 1, '22:28:05', '22:28:23', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(23, 2, 0, 1, 1, '22:28:29', '22:31:14', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(24, 2, 60.312, 10, 1, '22:31:18', '22:31:40', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(25, 2, 11.144, 10, 1, '22:31:55', '22:32:14', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(26, 2, 17.808, 3, 1, '23:30:04', '23:30:40', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(27, 2, 0, 0, 1, '00:09:51', '14:39:07', 3, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(28, 2, 0, 0, 1, '00:10:09', '19:46:05', 3, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(29, 2, 25.704, 7, 1, '00:10:25', '13:24:34', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(30, 2, 0, 0, 1, '00:18:08', '14:47:58', 3, 'lkjgsdfgnlnfv', 'muhammaf meh', 'sdfgsefg s egsdfg', 0, '');
INSERT INTO "c21_orders" VALUES(31, 2, 0, 0, 1, '01:35:48', '14:39:22', 2, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(32, 2, 0, 0, 1, '01:39:05', '14:47:42', 2, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(33, 2, 49.168, 1, 1, '03:46:57', '14:26:21', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(34, 2, 64.85, 0, 1, '14:35:01', '14:38:50', 2, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(35, 2, 60.256, 2, 1, '14:35:32', '13:59:46', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(36, 2, 30.072, 5, 1, '15:43:00', '13:59:17', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(37, 2, 0, 3, 1, '16:48:00', '16:48:08', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(38, 2, 0, 0, 1, '16:48:33', '14:48:06', 3, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(39, 2, 24.584, 9, 1, '19:36:35', '13:43:36', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(40, 2, 16.744, 3, 1, '19:37:34', '13:55:20', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(41, 2, 0, 4, 1, '19:44:31', '19:44:50', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(42, 2, 77.112, 6, 1, '02:01:10', '13:42:08', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(43, 2, 45.808, 12, 1, '02:02:49', '13:23:54', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(44, 3, 0, 2, 1, '14:52:00', '14:52:09', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(45, 4, 133.5, 0, 1, '14:52:37', '19:37:41', 2, '', 'muhammad medha', '', 20, '');
INSERT INTO "c21_orders" VALUES(46, 4, 68.035, 0, 1, '03:30:45', '18:39:26', 3, 'fsadfasd', 'asd', '', 0, '');
INSERT INTO "c21_orders" VALUES(47, 4, 0, 0, 1, '04:05:06', '00:33:22', 3, '4 شارع المأمون ابو شوشة', 'محمد مدحت', 'الدور الثالث شقة رقم ستة تمشسينبتمشسنبتم', 51.35, '01272323297');
INSERT INTO "c21_orders" VALUES(48, 4, 44.632, 5, 1, '16:47:55', '18:38:32', 1, 'hdjfdgfkj', 'sdfgsdf', 'dfsgdfg', 0, '');
INSERT INTO "c21_orders" VALUES(49, 4, 1483.552, 4, 1, '00:33:25', '15:26:27', 1, '', '', '', 132.46, '');
INSERT INTO "c21_orders" VALUES(50, 5, 0, 4, 1, '23:57:30', '00:00:07', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(51, 5, 0, 1, 1, '00:02:30', '01:27:41', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(52, 5, 0, 1, 0, '01:27:31', '00:00:00', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(53, 5, 0, 54, 1, '02:08:52', '02:16:29', 1, '', '', '', 0, '');
INSERT INTO "c21_orders" VALUES(54, 5, 0, 0, 0, '02:50:02', '00:00:00', 1, '', '', '', 0, '');

CREATE TABLE "c21_order_details" (
  "id" integer NOT NULL,
  "order_id" integer NOT NULL,
  "product_id" integer NOT NULL,
  "quantity" integer NOT NULL DEFAULT '1'

);
INSERT INTO "c21_order_details" VALUES(1, 2, 2, 1);
INSERT INTO "c21_order_details" VALUES(2, 2, 4, 1);
INSERT INTO "c21_order_details" VALUES(3, 2, 168, 1);
INSERT INTO "c21_order_details" VALUES(4, 3, 6, 1);
INSERT INTO "c21_order_details" VALUES(5, 3, 7, 1);
INSERT INTO "c21_order_details" VALUES(6, 3, 167, 1);
INSERT INTO "c21_order_details" VALUES(7, 4, 19, 1);
INSERT INTO "c21_order_details" VALUES(8, 4, 18, 1);
INSERT INTO "c21_order_details" VALUES(9, 4, 17, 1);
INSERT INTO "c21_order_details" VALUES(297, 17, 34, 1);
INSERT INTO "c21_order_details" VALUES(298, 17, 32, 1);
INSERT INTO "c21_order_details" VALUES(299, 17, 42, 1);
INSERT INTO "c21_order_details" VALUES(300, 17, 146, 1);
INSERT INTO "c21_order_details" VALUES(301, 17, 147, 1);
INSERT INTO "c21_order_details" VALUES(302, 17, 148, 1);
INSERT INTO "c21_order_details" VALUES(314, 17, 157, 1);
INSERT INTO "c21_order_details" VALUES(315, 17, 156, 1);
INSERT INTO "c21_order_details" VALUES(326, 19, 1, 1);
INSERT INTO "c21_order_details" VALUES(345, 19, 117, 1);
INSERT INTO "c21_order_details" VALUES(348, 19, 114, 2);
INSERT INTO "c21_order_details" VALUES(349, 19, 4, 1);
INSERT INTO "c21_order_details" VALUES(350, 19, 168, 1);
INSERT INTO "c21_order_details" VALUES(351, 19, 169, 1);
INSERT INTO "c21_order_details" VALUES(352, 19, 176, 1);
INSERT INTO "c21_order_details" VALUES(353, 19, 178, 1);
INSERT INTO "c21_order_details" VALUES(354, 19, 179, 1);
INSERT INTO "c21_order_details" VALUES(355, 19, 180, 1);
INSERT INTO "c21_order_details" VALUES(356, 19, 5, 1);
INSERT INTO "c21_order_details" VALUES(357, 19, 6, 1);
INSERT INTO "c21_order_details" VALUES(358, 19, 7, 2);
INSERT INTO "c21_order_details" VALUES(359, 19, 8, 2);
INSERT INTO "c21_order_details" VALUES(360, 19, 9, 2);
INSERT INTO "c21_order_details" VALUES(361, 19, 10, 2);
INSERT INTO "c21_order_details" VALUES(362, 19, 167, 2);
INSERT INTO "c21_order_details" VALUES(363, 19, 16, 1);
INSERT INTO "c21_order_details" VALUES(364, 19, 15, 1);
INSERT INTO "c21_order_details" VALUES(365, 19, 14, 1);
INSERT INTO "c21_order_details" VALUES(366, 19, 11, 1);
INSERT INTO "c21_order_details" VALUES(367, 19, 103, 2);
INSERT INTO "c21_order_details" VALUES(368, 19, 102, 2);
INSERT INTO "c21_order_details" VALUES(369, 19, 101, 2);
INSERT INTO "c21_order_details" VALUES(370, 19, 104, 2);
INSERT INTO "c21_order_details" VALUES(371, 19, 110, 3);
INSERT INTO "c21_order_details" VALUES(372, 19, 109, 3);
INSERT INTO "c21_order_details" VALUES(373, 19, 108, 3);
INSERT INTO "c21_order_details" VALUES(374, 19, 113, 1);
INSERT INTO "c21_order_details" VALUES(375, 19, 111, 1);
INSERT INTO "c21_order_details" VALUES(376, 19, 112, 1);
INSERT INTO "c21_order_details" VALUES(377, 19, 107, 1);
INSERT INTO "c21_order_details" VALUES(378, 19, 99, 1);
INSERT INTO "c21_order_details" VALUES(379, 19, 98, 1);
INSERT INTO "c21_order_details" VALUES(380, 19, 97, 1);
INSERT INTO "c21_order_details" VALUES(381, 24, 2, 1);
INSERT INTO "c21_order_details" VALUES(382, 24, 4, 1);
INSERT INTO "c21_order_details" VALUES(383, 24, 168, 1);
INSERT INTO "c21_order_details" VALUES(384, 25, 20, 1);
INSERT INTO "c21_order_details" VALUES(385, 26, 103, 2);
INSERT INTO "c21_order_details" VALUES(389, 33, 12, 1);
INSERT INTO "c21_order_details" VALUES(390, 33, 11, 1);
INSERT INTO "c21_order_details" VALUES(391, 34, 6, 1);
INSERT INTO "c21_order_details" VALUES(392, 34, 7, 1);
INSERT INTO "c21_order_details" VALUES(393, 34, 8, 1);
INSERT INTO "c21_order_details" VALUES(394, 35, 84, 1);
INSERT INTO "c21_order_details" VALUES(395, 35, 83, 1);
INSERT INTO "c21_order_details" VALUES(396, 35, 82, 1);
INSERT INTO "c21_order_details" VALUES(397, 35, 167, 1);
INSERT INTO "c21_order_details" VALUES(398, 36, 103, 1);
INSERT INTO "c21_order_details" VALUES(399, 36, 102, 1);
INSERT INTO "c21_order_details" VALUES(400, 36, 101, 1);
INSERT INTO "c21_order_details" VALUES(407, 39, 6, 1);
INSERT INTO "c21_order_details" VALUES(408, 29, 25, 1);
INSERT INTO "c21_order_details" VALUES(409, 40, 13, 1);
INSERT INTO "c21_order_details" VALUES(411, 42, 6, 1);
INSERT INTO "c21_order_details" VALUES(412, 42, 5, 1);
INSERT INTO "c21_order_details" VALUES(413, 42, 8, 1);
INSERT INTO "c21_order_details" VALUES(414, 43, 4, 1);
INSERT INTO "c21_order_details" VALUES(415, 43, 2, 1);
INSERT INTO "c21_order_details" VALUES(416, 45, 11, 1);
INSERT INTO "c21_order_details" VALUES(417, 45, 12, 1);
INSERT INTO "c21_order_details" VALUES(418, 45, 7, 1);
INSERT INTO "c21_order_details" VALUES(419, 45, 98, 2);
INSERT INTO "c21_order_details" VALUES(420, 45, 21, 1);
INSERT INTO "c21_order_details" VALUES(421, 45, 20, 1);
INSERT INTO "c21_order_details" VALUES(422, 45, 19, 1);
INSERT INTO "c21_order_details" VALUES(423, 45, 18, 1);
INSERT INTO "c21_order_details" VALUES(424, 45, 99, 1);
INSERT INTO "c21_order_details" VALUES(425, 46, 2, 1);
INSERT INTO "c21_order_details" VALUES(426, 46, 1, 1);
INSERT INTO "c21_order_details" VALUES(427, 46, 4, 1);
INSERT INTO "c21_order_details" VALUES(428, 48, 99, 1);
INSERT INTO "c21_order_details" VALUES(429, 48, 98, 1);
INSERT INTO "c21_order_details" VALUES(430, 48, 97, 1);
INSERT INTO "c21_order_details" VALUES(470, 49, 169, 1);
INSERT INTO "c21_order_details" VALUES(472, 49, 4, 1);
INSERT INTO "c21_order_details" VALUES(473, 49, 98, 2);
INSERT INTO "c21_order_details" VALUES(474, 49, 99, 1);
INSERT INTO "c21_order_details" VALUES(475, 49, 97, 1);
INSERT INTO "c21_order_details" VALUES(476, 49, 161, 1);
INSERT INTO "c21_order_details" VALUES(477, 49, 160, 1);
INSERT INTO "c21_order_details" VALUES(478, 49, 159, 1);
INSERT INTO "c21_order_details" VALUES(479, 54, 6, 1);
INSERT INTO "c21_order_details" VALUES(480, 54, 7, 1);
INSERT INTO "c21_order_details" VALUES(481, 54, 8, 1);
INSERT INTO "c21_order_details" VALUES(482, 54, 9, 1);
INSERT INTO "c21_order_details" VALUES(483, 54, 10, 1);
INSERT INTO "c21_order_details" VALUES(484, 54, 167, 1);

CREATE TABLE "c21_order_details_summery" (
  "id" integer NOT NULL,
  "order_id" integer NOT NULL,
  "product_id" integer NOT NULL,
  "quantity" integer NOT NULL DEFAULT '1'

);
CREATE TABLE "c21_order_types" (
  "id" integer NOT NULL,
  "name" varchar(20) NOT NULL,
  "css" varchar(10) NOT NULL,
  "show_window" integer NOT NULL

);
INSERT INTO "c21_order_types" VALUES(1, 'صالة', 'dine', 0);
INSERT INTO "c21_order_types" VALUES(2, 'تيك اواي', 'ta', 1);
INSERT INTO "c21_order_types" VALUES(3, 'توصيل', 'dlvr', 1);

CREATE TABLE "c21_products" (
  "id" integer NOT NULL,
  "name" varchar(100) NOT NULL,
  "arabic" varchar(255) NOT NULL,
  "price" double NOT NULL,
  "desc" text,
  "cat_id" integer NOT NULL

);
INSERT INTO "c21_products" VALUES(1, 'Mushroom Omelet', 'مشروم اومليت', 24.58, 'اومليت مقلي مع المشروم', 1);
INSERT INTO "c21_products" VALUES(2, 'Greek Omelet', 'جريك اومليت', 24.58, '', 1);
INSERT INTO "c21_products" VALUES(4, 'Croissant', 'كرواسون', 23.46, '', 1);
INSERT INTO "c21_products" VALUES(5, 'Sambosek', 'سمبوسك', 20.1, 'اصابع السمبوسك المقليه\r
', 2);
INSERT INTO "c21_products" VALUES(6, 'Chicken Croquette Potatoes', 'بطاطس كروكيت بالفراخ', 25.7, '', 2);
INSERT INTO "c21_products" VALUES(7, 'Garlic Mozzarilla Bread', 'عيش بالثوم و الموزاريلا', 15.62, '', 2);
INSERT INTO "c21_products" VALUES(8, 'Shrimp Cocktail', 'جمبري كوكتيل', 34.66, '', 2);
INSERT INTO "c21_products" VALUES(9, 'Steam Vegetables', 'خضار سوتيه', 25.7, '', 2);
INSERT INTO "c21_products" VALUES(10, 'Home Fries', 'بطاطس هوم فرايز', 25.7, '', 2);
INSERT INTO "c21_products" VALUES(11, 'Caesar Salad', 'سلطة سيزر', 25.7, NULL, 3);
INSERT INTO "c21_products" VALUES(12, 'Shrimp Caesar Salad', 'سلطة سيزر جمبري', 25.7, NULL, 3);
INSERT INTO "c21_products" VALUES(13, 'Greek Salad', 'جريك سلاد', 17.86, NULL, 3);
INSERT INTO "c21_products" VALUES(14, 'Chef Salad', 'شيف سلاد', 22.34, NULL, 3);
INSERT INTO "c21_products" VALUES(15, 'Tuna Salad', 'سلطة تونة', 20.1, NULL, 3);
INSERT INTO "c21_products" VALUES(16, 'Garden Salad', 'سلطة خضراء', 11.14, NULL, 3);
INSERT INTO "c21_products" VALUES(17, 'Broccoli', 'شوربة بروكلي', 13.38, NULL, 4);
INSERT INTO "c21_products" VALUES(18, 'Lentil', 'شوربة عدس', 10.02, NULL, 4);
INSERT INTO "c21_products" VALUES(19, 'Creamy Mushroom', 'شوربة كريمة المشروم', 11.14, NULL, 4);
INSERT INTO "c21_products" VALUES(20, 'Onion', 'شوربة بصل', 12.26, NULL, 4);
INSERT INTO "c21_products" VALUES(21, 'Creamy Chicken', 'شوربة فراخ بالكريمة', 12.26, NULL, 4);
INSERT INTO "c21_products" VALUES(22, 'Tomato', 'شوربة طماطم', 10.02, NULL, 4);
INSERT INTO "c21_products" VALUES(23, 'Pisto sauce', 'مكرونة بستو صوص', 23.46, NULL, 5);
INSERT INTO "c21_products" VALUES(24, 'Polonaise ', 'مكرونة بولونيز', 23.46, NULL, 5);
INSERT INTO "c21_products" VALUES(25, 'Alfredo', 'مكرونة الفريدو', 26.82, NULL, 5);
INSERT INTO "c21_products" VALUES(26, 'Primavera ', 'مكرونة بريمافيرا', 18.98, NULL, 5);
INSERT INTO "c21_products" VALUES(27, 'Puttanesca', 'مكرونة بوتانسكا', 21.22, NULL, 5);
INSERT INTO "c21_products" VALUES(28, 'Meat Ball', 'مكرونة ميت بول', 23.46, NULL, 5);
INSERT INTO "c21_products" VALUES(29, 'Backed Ziti', 'مكرونة بيكيد زيتي', 22.34, NULL, 5);
INSERT INTO "c21_products" VALUES(30, 'Curry Pasta', 'مكرونة بالكاري', 21.22, NULL, 5);
INSERT INTO "c21_products" VALUES(31, 'Sea Food', 'مكرونة سي قود', 34.66, NULL, 5);
INSERT INTO "c21_products" VALUES(32, 'Piccata Mushroom', 'طبق بيكاتا مشرو1', 45.86, NULL, 6);
INSERT INTO "c21_products" VALUES(33, 'Mexican Chicken', 'طبق فراخ مكسيكان', 40.26, NULL, 6);
INSERT INTO "c21_products" VALUES(34, 'Fried Cutlet Chicken', 'طبق فراخ بانيه', 43.62, NULL, 6);
INSERT INTO "c21_products" VALUES(35, 'Grilled Chicken Breasts', 'طبق فراخ مشوية', 40.26, NULL, 6);
INSERT INTO "c21_products" VALUES(36, 'Chicken Curry', 'طبق فراخ بالكاري', 38.02, NULL, 6);
INSERT INTO "c21_products" VALUES(37, 'Fried Cutlet Veal', 'طبق فراخ بانيه', 45.86, NULL, 6);
INSERT INTO "c21_products" VALUES(38, 'Alexandrian Liver', 'طبق كبدة اسكندراني', 34.66, NULL, 6);
INSERT INTO "c21_products" VALUES(39, 'Charcoal Grilled Liver', 'طبق كبدة مشوية على الفحم', 45.86, NULL, 6);
INSERT INTO "c21_products" VALUES(40, 'Veggie Platter', 'طبق خضار مشكل', 21.22, NULL, 6);
INSERT INTO "c21_products" VALUES(41, 'Fried Squid', 'طبق سبيط مقلي', 45.86, NULL, 6);
INSERT INTO "c21_products" VALUES(42, 'Squid Tajine ', 'طاجن السبيط', 40.26, NULL, 6);
INSERT INTO "c21_products" VALUES(43, 'Veal Chops', 'شرائح البتلو', 57.06, NULL, 7);
INSERT INTO "c21_products" VALUES(44, 'New York Stick ', 'نيويورك ستيك', 51.46, NULL, 7);
INSERT INTO "c21_products" VALUES(45, 'Greek Stick', 'جريك ستيك', 51.46, NULL, 7);
INSERT INTO "c21_products" VALUES(46, 'Chicken Kiev', 'ساندوتش فراخ كيف', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(47, 'Chicken Parmesan', 'ساندوتش فراخ بارمجان', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(48, 'Meatball Parmesan', 'ساندوتش ميتبول بارمجان', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(49, 'Chicken Catcha-Tory', 'ساندوتش شيكين كاتشاتوري', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(50, 'Fried Cutlet Chicken', 'ساندوتش فراخ بانيه', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(51, 'Mexican Chicken', 'ساندوتش فراخ مكسيكان', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(52, 'Cajun chicken', 'ساندوتش فراخ كاجون', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(53, 'Shish Tawook', 'ساندوتش شيش طاووق', 20.16, NULL, 8);
INSERT INTO "c21_products" VALUES(54, 'Chicken Curry', 'ساندوتش فراخ بالكاري', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(55, 'Grilled chicken breasts ', 'ساندوتش صدور لراخ مشوية', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(56, 'Grilled liver ', 'ساندوتش كبدة مشوية', 22.34, NULL, 8);
INSERT INTO "c21_products" VALUES(57, 'Alexandrian liver ', 'ساندوتش كبدة اسكندراني', 21.22, NULL, 8);
INSERT INTO "c21_products" VALUES(58, 'Hot Dog', 'ساندوتش هوت دوج', 20.1, NULL, 8);
INSERT INTO "c21_products" VALUES(59, 'Philadelphia Stick', 'ساندوتش فيلادلفيا ستيك', 23.46, NULL, 8);
INSERT INTO "c21_products" VALUES(60, 'Fried Cutlet Veal', 'ساندتش اسكالوب بانيه', 23.46, NULL, 8);
INSERT INTO "c21_products" VALUES(61, 'Fried Squid', 'شاندوتش سبيط مقلي', 26.82, NULL, 8);
INSERT INTO "c21_products" VALUES(62, 'Fried Shrimps', 'ساندوتش جمبري مقلي', 26.82, NULL, 8);
INSERT INTO "c21_products" VALUES(63, 'Mexican Shrimp', 'ساندوتش جمبري مكسيكان', 25.7, NULL, 8);
INSERT INTO "c21_products" VALUES(64, 'Tuna', 'ساندوتش سلطة تونة', 23.46, NULL, 8);
INSERT INTO "c21_products" VALUES(65, 'California Burger', 'برجر كاليفورنيا', 21.22, NULL, 9);
INSERT INTO "c21_products" VALUES(66, 'Chicken Burger', 'برجر فراخ', 20.1, NULL, 9);
INSERT INTO "c21_products" VALUES(67, 'BBQ Burger', 'برجر باربكيو', 21.22, NULL, 9);
INSERT INTO "c21_products" VALUES(68, 'Deluxe Burger', 'برجر ديلوكس', 23.46, NULL, 9);
INSERT INTO "c21_products" VALUES(69, 'Chicken BBQ Burger', 'برجر فراخ', 23.46, NULL, 9);
INSERT INTO "c21_products" VALUES(70, 'Veggie Burger', 'برجر خضروات', 15.62, NULL, 9);
INSERT INTO "c21_products" VALUES(71, 'Margarita', 'بيتزا مارجريتا', 23.46, NULL, 10);
INSERT INTO "c21_products" VALUES(72, 'Vegetarian', 'بيتزا فيجيتيريان', 24.58, NULL, 10);
INSERT INTO "c21_products" VALUES(73, 'Mushroom', 'بيتزا مشروم', 25.7, NULL, 10);
INSERT INTO "c21_products" VALUES(74, 'Shrimps', 'بيتزا جمبري', 31.3, NULL, 10);
INSERT INTO "c21_products" VALUES(75, 'Olive', 'بيتزا زيتون', 25.7, NULL, 10);
INSERT INTO "c21_products" VALUES(76, 'Pepperoni', 'بيتزا بيبيروني', 26.82, NULL, 10);
INSERT INTO "c21_products" VALUES(77, 'Sausage', 'بيتزا سجق', 26.82, NULL, 10);
INSERT INTO "c21_products" VALUES(78, 'Tuna', 'بيتزا تونة', 27.94, NULL, 10);
INSERT INTO "c21_products" VALUES(79, 'Chicken Barbeque', 'بيتزا فراخ و باربيكيو', 27.94, NULL, 10);
INSERT INTO "c21_products" VALUES(80, 'Anchovy', 'بيتزا انشوجة', 27.94, NULL, 10);
INSERT INTO "c21_products" VALUES(81, 'Mincemeat', 'بيتزا لحمة مفرومة', 25.7, NULL, 10);
INSERT INTO "c21_products" VALUES(82, 'Ristretto', 'ريستريتو', 12.26, NULL, 11);
INSERT INTO "c21_products" VALUES(83, 'Espresso', 'اكسبريسو', 12.26, NULL, 11);
INSERT INTO "c21_products" VALUES(84, 'Espresso Chocolate', 'اكسبيسو شوكولاتة', 14.5, NULL, 11);
INSERT INTO "c21_products" VALUES(85, 'Espresso Macchiato', 'اكسبريسو ماكياطو', 14.5, NULL, 11);
INSERT INTO "c21_products" VALUES(86, 'Turkish', 'قهوة تركي', 11.14, NULL, 11);
INSERT INTO "c21_products" VALUES(87, 'Cappuccino', 'كابتشينو', 14.5, NULL, 11);
INSERT INTO "c21_products" VALUES(88, 'Cafe Latte', 'كافيه لاتيه', 14.5, NULL, 11);
INSERT INTO "c21_products" VALUES(89, 'Cafe Mocha', 'كافيه موكا', 14.5, NULL, 11);
INSERT INTO "c21_products" VALUES(90, 'American Filter coffee', 'اميريكان كوفي', 14.5, NULL, 11);
INSERT INTO "c21_products" VALUES(91, 'Hammer Head ', 'هامار هيد', 17.86, NULL, 11);
INSERT INTO "c21_products" VALUES(92, 'Cafe Nutella', 'كافيه نوتيلا', 16.74, NULL, 11);
INSERT INTO "c21_products" VALUES(93, 'Cafe Maltesers', 'كافيه مالتيزرز', 16.74, NULL, 11);
INSERT INTO "c21_products" VALUES(94, 'Cafe Flutes', 'كافيه فلوتس', 16.74, NULL, 11);
INSERT INTO "c21_products" VALUES(95, 'Cafe Jamaica', 'كافيه جامايكا', 16.74, NULL, 11);
INSERT INTO "c21_products" VALUES(96, 'Flavored Coffee', 'قهوة نكهات', 16.74, NULL, 11);
INSERT INTO "c21_products" VALUES(97, 'Iced Latte', 'ايس لاتيه', 15.62, NULL, 12);
INSERT INTO "c21_products" VALUES(98, 'Iced Mocha', 'ايس موكا', 15.62, NULL, 12);
INSERT INTO "c21_products" VALUES(99, 'Mocha Frappe Coffee', 'موكا فرابيه', 16.74, NULL, 12);
INSERT INTO "c21_products" VALUES(101, 'Green Tea', 'شاي اخضر', 11.14, '', 13);
INSERT INTO "c21_products" VALUES(102, 'Flavored Tea', 'شاي نكهات', 12.26, '', 13);
INSERT INTO "c21_products" VALUES(103, 'Mint Tea', 'شاي بالنعناع', 10.02, '', 13);
INSERT INTO "c21_products" VALUES(104, 'Earl Gray', 'شاي ايرل جراي', 12.26, '', 13);
INSERT INTO "c21_products" VALUES(107, 'Hot Chocolate Hazelnuts', 'هوت شوكوليت هازلنتس', 13.38, '', 14);
INSERT INTO "c21_products" VALUES(108, 'Vitamin-C', 'فيتامين - سي', 12.26, '', 14);
INSERT INTO "c21_products" VALUES(109, 'Iced Chocolate', 'ايس كابتشينو', 13.38, '', 14);
INSERT INTO "c21_products" VALUES(110, 'Iced Mint', 'نعناع باءد', 12.26, '', 14);
INSERT INTO "c21_products" VALUES(111, 'Mango', 'مانجو', 14.5, NULL, 15);
INSERT INTO "c21_products" VALUES(112, 'Strawberry', 'فراول', 14.5, NULL, 15);
INSERT INTO "c21_products" VALUES(113, 'Banana', 'موز', 14.5, NULL, 15);
INSERT INTO "c21_products" VALUES(114, 'Orange', 'برتفال', 13.38, NULL, 15);
INSERT INTO "c21_products" VALUES(115, 'Lemonade', 'ليمون', 13.38, NULL, 15);
INSERT INTO "c21_products" VALUES(116, 'Grenadine', 'جراندينا', 14.5, NULL, 15);
INSERT INTO "c21_products" VALUES(117, 'Pomegranate', 'رمان', 15.62, NULL, 15);
INSERT INTO "c21_products" VALUES(118, 'Cantaloupe', 'كانتلوب', 14.5, NULL, 15);
INSERT INTO "c21_products" VALUES(119, 'Watermelon', 'بطيخ', 14.5, NULL, 15);
INSERT INTO "c21_products" VALUES(120, 'Margarita', 'كوكتيل مارجريتا', 16.74, NULL, 16);
INSERT INTO "c21_products" VALUES(121, 'Fliger', 'كوكتيل فليجر', 15.62, NULL, 16);
INSERT INTO "c21_products" VALUES(122, 'Cherry cola', 'شيري كولا', 15.62, NULL, 16);
INSERT INTO "c21_products" VALUES(123, 'Sun Rise', 'صن رايز', 16.74, NULL, 16);
INSERT INTO "c21_products" VALUES(124, 'Italian Soda', 'ايطاليان صودا', 15.62, NULL, 16);
INSERT INTO "c21_products" VALUES(125, 'Samba', 'سامبا', 17.86, NULL, 16);
INSERT INTO "c21_products" VALUES(126, 'Rosanna Banana', 'روزانا بانانا', 16.74, NULL, 16);
INSERT INTO "c21_products" VALUES(127, 'Penacolada', 'بيناكولادا', 16.74, NULL, 16);
INSERT INTO "c21_products" VALUES(128, 'Yoghurt', 'كوكتيل زبادي', 16.74, NULL, 16);
INSERT INTO "c21_products" VALUES(129, 'Virgin Mary', 'كوكتيل فيرجين ماري', 13.38, NULL, 16);
INSERT INTO "c21_products" VALUES(130, 'Florida', 'كوكتيل فلوريدا', 16.74, NULL, 16);
INSERT INTO "c21_products" VALUES(131, 'Mango Milk Shake', 'ميلك شيك مانجو', 15.62, NULL, 17);
INSERT INTO "c21_products" VALUES(132, 'Strewberry Milk Shake', 'ميلك شيك فراولة', 15.62, NULL, 17);
INSERT INTO "c21_products" VALUES(133, 'Chocolate Milk Shake', 'ميلك شيك شوكولاتة', 15.62, NULL, 17);
INSERT INTO "c21_products" VALUES(134, 'Mocha Milk Shake', 'ميلك شيك نعناع', 15.62, NULL, 17);
INSERT INTO "c21_products" VALUES(135, 'Coffee Milk Shake', 'ميلك شيك قهوة', 15.62, NULL, 17);
INSERT INTO "c21_products" VALUES(136, 'Vanilla Milk Shake', 'ميلك شيك فانيليا', 15.62, NULL, 17);
INSERT INTO "c21_products" VALUES(137, 'Mint Milk Shake', 'ميلك شيك نعنتع', 15.62, NULL, 17);
INSERT INTO "c21_products" VALUES(138, 'Boreo Milk Shake', 'ميلك شيك بوريو', 16.74, NULL, 17);
INSERT INTO "c21_products" VALUES(139, 'Soda', 'صودا', 8.96, NULL, 18);
INSERT INTO "c21_products" VALUES(140, 'Mineral Water(s)', 'مياه معدنية', 4.48, NULL, 18);
INSERT INTO "c21_products" VALUES(141, 'Mineral Water', 'مياه معدنية', 6.72, NULL, 18);
INSERT INTO "c21_products" VALUES(142, 'Club Soda', 'كلوب صودا', 9.52, NULL, 18);
INSERT INTO "c21_products" VALUES(143, 'Tonic', 'تونيك', 9.52, NULL, 18);
INSERT INTO "c21_products" VALUES(144, 'Birrel', 'بيريل', 9.52, NULL, 18);
INSERT INTO "c21_products" VALUES(145, 'Fayrooz', 'فيروز', 9.52, NULL, 18);
INSERT INTO "c21_products" VALUES(146, 'Profit Roll', 'بروفيترول', 17.86, NULL, 19);
INSERT INTO "c21_products" VALUES(147, 'Chocolate Lovers', 'شوكوليت لوقرز', 23.46, NULL, 19);
INSERT INTO "c21_products" VALUES(148, 'Chocolate Lovers Turtle', 'ترتل شوكوليت لوفرز', 20.1, NULL, 19);
INSERT INTO "c21_products" VALUES(149, 'Chocolate Cake', 'شوكوليت كيك', 17.86, NULL, 19);
INSERT INTO "c21_products" VALUES(150, 'Banana Split', 'بانانا سبليت', 26.82, NULL, 19);
INSERT INTO "c21_products" VALUES(151, 'Fudge Brownies', 'فدج براونيز', 20.1, NULL, 19);
INSERT INTO "c21_products" VALUES(152, 'Cob Jock', 'كوب جاك', 18.98, NULL, 19);
INSERT INTO "c21_products" VALUES(153, 'Oreo Madness', 'اوريو مادنس', 22.34, NULL, 19);
INSERT INTO "c21_products" VALUES(154, 'Om-Ali', 'ام علي', 16.74, NULL, 19);
INSERT INTO "c21_products" VALUES(155, 'Creme Caramel', 'كريم كراميل', 14.5, NULL, 19);
INSERT INTO "c21_products" VALUES(156, 'Chocolate Mousse', 'موس شوكولاتة', 18.98, NULL, 19);
INSERT INTO "c21_products" VALUES(157, 'Ice Cream', 'ايس كريم', 20.1, NULL, 19);
INSERT INTO "c21_products" VALUES(158, 'Desserts Crepe', 'كريب حلو', 15.62, NULL, 19);
INSERT INTO "c21_products" VALUES(159, 'Rice Pudding', 'رز باللبن', 13.38, NULL, 19);
INSERT INTO "c21_products" VALUES(160, 'Rice Pudding(Ice Cream)', 'رز باللبن بالايس كريم', 17.86, NULL, 19);
INSERT INTO "c21_products" VALUES(161, 'Fruits Jelly', 'جيلي فواكه', 16.74, NULL, 19);
INSERT INTO "c21_products" VALUES(167, 'fasd', 'خضار مشوي على الفحم', 25.7, '', 2);
INSERT INTO "c21_products" VALUES(168, 'english', 'عربي', 15.62, NULL, 1);
INSERT INTO "c21_products" VALUES(169, 'asdfSAEF', 'شسيبشبضصل', 1358.56, NULL, 1);
INSERT INTO "c21_products" VALUES(176, 'c21App', 'عربي', 14.56, NULL, 1);
INSERT INTO "c21_products" VALUES(177, 'mashinkahh', 'مشينكاح', 51.52, NULL, 8);
INSERT INTO "c21_products" VALUES(178, 'mashinkahh', 'مشينكاح', 51.52, NULL, 1);
INSERT INTO "c21_products" VALUES(179, 'Zzalott', 'طلوط مقلي', 14.56, NULL, 1);
INSERT INTO "c21_products" VALUES(180, 'Club21 Special Breakfast', 'افطار Club21', 23.52, NULL, 1);

CREATE TABLE "c21_products_items" (
  "id" integer NOT NULL,
  "product_id" integer NOT NULL,
  "item_id" integer NOT NULL,
  "amount" double NOT NULL

);
INSERT INTO "c21_products_items" VALUES(28, 1, 35, 5);
INSERT INTO "c21_products_items" VALUES(30, 28, 17, 2);
INSERT INTO "c21_products_items" VALUES(43, 4, 38, 1);
INSERT INTO "c21_products_items" VALUES(44, 2, 35, 5);
INSERT INTO "c21_products_items" VALUES(46, 1, 34, 0.2);
INSERT INTO "c21_products_items" VALUES(47, 3, 35, 4);
INSERT INTO "c21_products_items" VALUES(48, 10, 5, 0.1);
INSERT INTO "c21_products_items" VALUES(49, 11, 5, 0.1);
INSERT INTO "c21_products_items" VALUES(50, 6, 5, 0.1);
INSERT INTO "c21_products_items" VALUES(51, 3, 4, 0.1);
INSERT INTO "c21_products_items" VALUES(53, 12, 44, 0.2);
INSERT INTO "c21_products_items" VALUES(54, 43, 1, 0.2);
INSERT INTO "c21_products_items" VALUES(55, 42, 45, 0.2);
INSERT INTO "c21_products_items" VALUES(56, 60, 1, 0.1);
INSERT INTO "c21_products_items" VALUES(57, 61, 45, 0.1);
INSERT INTO "c21_products_items" VALUES(58, 15, 46, 1);
INSERT INTO "c21_products_items" VALUES(59, 24, 17, 0.1);
INSERT INTO "c21_products_items" VALUES(60, 25, 5, 0.1);
INSERT INTO "c21_products_items" VALUES(61, 32, 1, 0.2);
INSERT INTO "c21_products_items" VALUES(63, 34, 5, 0.2);
INSERT INTO "c21_products_items" VALUES(65, 8, 44, 0.1);
INSERT INTO "c21_products_items" VALUES(66, 33, 5, 0.2);
INSERT INTO "c21_products_items" VALUES(68, 37, 5, 0.2);
INSERT INTO "c21_products_items" VALUES(77, 2, 12, 0.6);
INSERT INTO "c21_products_items" VALUES(78, 2, 18, 0.1);
INSERT INTO "c21_products_items" VALUES(79, 27, 18, 0.1);
INSERT INTO "c21_products_items" VALUES(81, 1, 3, 0.1);
INSERT INTO "c21_products_items" VALUES(82, 27, 44, 0.1);
INSERT INTO "c21_products_items" VALUES(83, 27, 19, 0.6);
INSERT INTO "c21_products_items" VALUES(84, 27, 15, 3);
INSERT INTO "c21_products_items" VALUES(86, 26, 3, 0.1);
INSERT INTO "c21_products_items" VALUES(88, 26, 5, 0.1);
INSERT INTO "c21_products_items" VALUES(89, 1, 1, 0.1);
INSERT INTO "c21_products_items" VALUES(90, 5, 1, 0.1);
INSERT INTO "c21_products_items" VALUES(92, 5, 18, 0.1);
INSERT INTO "c21_products_items" VALUES(93, 5, 16, 0.1);
INSERT INTO "c21_products_items" VALUES(94, 7, 14, 0.1);
INSERT INTO "c21_products_items" VALUES(96, 7, 5, 0.1);
INSERT INTO "c21_products_items" VALUES(97, 7, 17, 0.1);

CREATE TABLE "c21_sessions" (
  "session_id" varchar(40) NOT NULL DEFAULT '0',
  "ip_address" varchar(45) NOT NULL DEFAULT '0',
  "user_agent" varchar(120) NOT NULL,
  "last_activity" integer UNSIGNED NOT NULL DEFAULT '0',
  "user_data" text NOT NULL,
  "username" varchar(100) NOT NULL

);
INSERT INTO "c21_sessions" VALUES('0', '0', '', 0, '', 'admin');

CREATE TABLE "c21_settings" (
  "id" integer NOT NULL,
  "name" text NOT NULL,
  "value" text NOT NULL,
  "arabic" text NOT NULL,
  "enabled" integer NOT NULL DEFAULT '1',
  "settings_group" integer NOT NULL,
  "html" varchar(255) NOT NULL

);
INSERT INTO "c21_settings" VALUES(1, 'general_limit', '10', 'عدد النتائج في جداول البرنامج\r
', 0, 1, '');
INSERT INTO "c21_settings" VALUES(2, 'approximation', '4', 'تقريب حسابات الفواتير', 0, 3, '');
INSERT INTO "c21_settings" VALUES(3, 'service', '12', 'نسبة الخدمة', 0, 2, '');
INSERT INTO "c21_settings" VALUES(4, 'tax', '10', 'نسبة الضريبة', 0, 2, '');
INSERT INTO "c21_settings" VALUES(5, 'stock', '2', 'الخصم من المخزن', 0, 1, 'ddl');
INSERT INTO "c21_settings" VALUES(6, 'delivery_service', '13', 'خدمة التوصيل', 0, 2, '');

CREATE TABLE "c21_settings_groups" (
  "id" integer NOT NULL,
  "name" varchar(20) NOT NULL,
  "notes" varchar(255) NOT NULL

);
INSERT INTO "c21_settings_groups" VALUES(1, 'اعدادات البرنامج', '0');
INSERT INTO "c21_settings_groups" VALUES(2, 'اعدادات الفواتير', 'اضافة الى الفاتورة');
INSERT INTO "c21_settings_groups" VALUES(3, 'اعدادات الحسابات', '0');

CREATE TABLE "c21_stocks" (
  "id" integer NOT NULL,
  "name" text NOT NULL,
  "description" text NOT NULL

);
INSERT INTO "c21_stocks" VALUES(1, 'المخزن الرئيسي', 'ما يوجد من احتياطي في المكان');
INSERT INTO "c21_stocks" VALUES(2, 'المخزن الفرعي', 'هي الكميات المستخدمة في الكافيتريا اة المطبخ');

CREATE TABLE "c21_stocks_transactions" (
  "id" integer NOT NULL,
  "stock_id" integer NOT NULL,
  "item_id" integer NOT NULL,
  "qty" double NOT NULL,
  "created" datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "notes" text NOT NULL,
  "type" integer NOT NULL DEFAULT '1'

);
CREATE TABLE "c21_stocks_transactions_types" (
  "id" integer NOT NULL,
  "name" varchar(10) NOT NULL,
  "description" text NOT NULL

);
INSERT INTO "c21_stocks_transactions_types" VALUES(1, 'صرف', 'الصرف من المخزن');
INSERT INTO "c21_stocks_transactions_types" VALUES(2, 'اضافة', 'اضافة خامات الى المخزن');
INSERT INTO "c21_stocks_transactions_types" VALUES(3, 'سحب', 'سحب من المخزن للعميل');

CREATE TABLE "c21_stock_items" (
  "id" integer NOT NULL,
  "item_id" integer NOT NULL,
  "stock_id" integer NOT NULL,
  "current_qty" double NOT NULL,
  "unit" integer NOT NULL

);
INSERT INTO "c21_stock_items" VALUES(34, 43, 1, 0, 0);
INSERT INTO "c21_stock_items" VALUES(35, 43, 2, 500, 0);
INSERT INTO "c21_stock_items" VALUES(36, 14, 1, 45, 0);
INSERT INTO "c21_stock_items" VALUES(37, 14, 2, 894.1999999999999, 0);
INSERT INTO "c21_stock_items" VALUES(38, 12, 1, 200, 0);
INSERT INTO "c21_stock_items" VALUES(39, 12, 2, 4774.199999999999, 0);
INSERT INTO "c21_stock_items" VALUES(40, 19, 2, 370, 0);
INSERT INTO "c21_stock_items" VALUES(41, 13, 2, 794, 0);
INSERT INTO "c21_stock_items" VALUES(42, 40, 1, 200, 0);
INSERT INTO "c21_stock_items" VALUES(43, 18, 2, 71.70000000000002, 0);
INSERT INTO "c21_stock_items" VALUES(44, 4, 2, 20, 0);
INSERT INTO "c21_stock_items" VALUES(45, 35, 2, -1876, 0);
INSERT INTO "c21_stock_items" VALUES(46, 35, 1, 700, 0);
INSERT INTO "c21_stock_items" VALUES(47, 1, 1, 0, 0);
INSERT INTO "c21_stock_items" VALUES(48, 17, 1, 0, 0);
INSERT INTO "c21_stock_items" VALUES(49, 34, 2, -76.4, 0);
INSERT INTO "c21_stock_items" VALUES(50, 1, 2, 2.1999999999999997, 0);
INSERT INTO "c21_stock_items" VALUES(51, 17, 2, 9.100000000000001, 0);

CREATE TABLE "c21_temp_products" (
  "id" integer NOT NULL,
  "arabic" varchar(255) NOT NULL,
  "price" double NOT NULL,
  "new_price" double NOT NULL

);
INSERT INTO "c21_temp_products" VALUES(1, 'مشروم اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(2, 'جريك اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(4, 'كرواسون', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(5, 'سمبوسك', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(6, 'بطاطس كروكيت بالفراخ', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(7, 'عيش بالثوم و الموزاريلا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(8, 'جمبري كوكتيل', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(9, 'خضار سوتيه', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(10, 'بطاطس هوم فرايز', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(11, 'سلطة سيزر', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(12, 'سلطة سيزر جمبري', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(13, 'جريك سلاد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(14, 'شيف سلاد', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(15, 'سلطة تونة', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(16, 'سلطة خضراء', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(17, 'شوربة بروكلي', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(18, 'شوربة عدس', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(19, 'شوربة كريمة المشروم', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(20, 'شوربة بصل', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(21, 'شوربة فراخ بالكريمة', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(22, 'شوربة طماطم', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(23, 'مكرونة بستو صوص', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(24, 'مكرونة بولونيز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(25, 'مكرونة الفريدو', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(26, 'مكرونة بريمافيرا', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(27, 'مكرونة بوتانسكا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(28, 'مكرونة ميت بول', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(29, 'مكرونة بيكيد زيتي', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(30, 'مكرونة بالكاري', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(31, 'مكرونة سي قود', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(32, 'طبق بيكاتا مشرو1', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(33, 'طبق فراخ مكسيكان', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(34, 'طبق فراخ بانيه', 43.62, 44.95);
INSERT INTO "c21_temp_products" VALUES(35, 'طبق فراخ مشوية', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(36, 'طبق فراخ بالكاري', 38.02, 39.95);
INSERT INTO "c21_temp_products" VALUES(37, 'طبق فراخ بانيه', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(38, 'طبق كبدة اسكندراني', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(39, 'طبق كبدة مشوية على الفحم', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(40, 'طبق خضار مشكل', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(41, 'طبق سبيط مقلي', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(42, 'طاجن السبيط', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(43, 'شرائح البتلو', 57.06, 58.95);
INSERT INTO "c21_temp_products" VALUES(44, 'نيويورك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(45, 'جريك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(46, 'ساندوتش فراخ كيف', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(47, 'ساندوتش فراخ بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(48, 'ساندوتش ميتبول بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(49, 'ساندوتش شيكين كاتشاتوري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(50, 'ساندوتش فراخ بانيه', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(51, 'ساندوتش فراخ مكسيكان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(52, 'ساندوتش فراخ كاجون', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(53, 'ساندوتش شيش طاووق', 20.16, 21.95);
INSERT INTO "c21_temp_products" VALUES(54, 'ساندوتش فراخ بالكاري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(55, 'ساندوتش صدور لراخ مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(56, 'ساندوتش كبدة مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(57, 'ساندوتش كبدة اسكندراني', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(58, 'ساندوتش هوت دوج', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(59, 'ساندوتش فيلادلفيا ستيك', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(60, 'ساندتش اسكالوب بانيه', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(61, 'شاندوتش سبيط مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(62, 'ساندوتش جمبري مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(63, 'ساندوتش جمبري مكسيكان', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(64, 'ساندوتش سلطة تونة', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(65, 'برجر كاليفورنيا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(66, 'برجر فراخ', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(67, 'برجر باربكيو', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(68, 'برجر ديلوكس', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(69, 'برجر فراخ', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(70, 'برجر خضروات', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(71, 'بيتزا مارجريتا', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(72, 'بيتزا فيجيتيريان', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(73, 'بيتزا مشروم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(74, 'بيتزا جمبري', 31.3, 32.95);
INSERT INTO "c21_temp_products" VALUES(75, 'بيتزا زيتون', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(76, 'بيتزا بيبيروني', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(77, 'بيتزا سجق', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(78, 'بيتزا تونة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(79, 'بيتزا فراخ و باربيكيو', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(80, 'بيتزا انشوجة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(81, 'بيتزا لحمة مفرومة', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(82, 'ريستريتو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(83, 'اكسبريسو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(84, 'اكسبيسو شوكولاتة', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(85, 'اكسبريسو ماكياطو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(86, 'قهوة تركي', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(87, 'كابتشينو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(88, 'كافيه لاتيه', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(89, 'كافيه موكا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(90, 'اميريكان كوفي', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(91, 'هامار هيد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(92, 'كافيه نوتيلا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(93, 'كافيه مالتيزرز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(94, 'كافيه فلوتس', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(95, 'كافيه جامايكا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(96, 'قهوة نكهات', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(97, 'ايس لاتيه', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(98, 'ايس موكا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(99, 'موكا فرابيه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(101, 'شاي اخضر', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(102, 'شاي نكهات', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(103, 'شاي بالنعناع', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(104, 'شاي ايرل جراي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(107, 'هوت شوكوليت هازلنتس', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(108, 'فيتامين - سي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(109, 'ايس كابتشينو', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(110, 'نعناع باءد', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(111, 'مانجو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(112, 'فراول', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(113, 'موز', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(114, 'برتفال', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(115, 'ليمون', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(116, 'جراندينا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(117, 'رمان', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(118, 'كانتلوب', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(119, 'بطيخ', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(120, 'كوكتيل مارجريتا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(121, 'كوكتيل فليجر', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(122, 'شيري كولا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(123, 'صن رايز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(124, 'ايطاليان صودا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(125, 'سامبا', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(126, 'روزانا بانانا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(127, 'بيناكولادا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(128, 'كوكتيل زبادي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(129, 'كوكتيل فيرجين ماري', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(130, 'كوكتيل فلوريدا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(131, 'ميلك شيك مانجو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(132, 'ميلك شيك فراولة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(133, 'ميلك شيك شوكولاتة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(134, 'ميلك شيك نعناع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(135, 'ميلك شيك قهوة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(136, 'ميلك شيك فانيليا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(137, 'ميلك شيك نعنتع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(138, 'ميلك شيك بوريو', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(139, 'صودا', 8.96, 9.95);
INSERT INTO "c21_temp_products" VALUES(140, 'مياه معدنية', 4.48, 5.95);
INSERT INTO "c21_temp_products" VALUES(141, 'مياه معدنية', 6.72, 7.95);
INSERT INTO "c21_temp_products" VALUES(142, 'كلوب صودا', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(143, 'تونيك', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(144, 'بيريل', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(145, 'فيروز', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(146, 'بروفيترول', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(147, 'شوكوليت لوقرز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(148, 'ترتل شوكوليت لوفرز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(149, 'شوكوليت كيك', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(150, 'بانانا سبليت', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(151, 'فدج براونيز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(152, 'كوب جاك', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(153, 'اوريو مادنس', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(154, 'ام علي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(155, 'كريم كراميل', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(156, 'موس شوكولاتة', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(157, 'ايس كريم', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(158, 'كريب حلو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(159, 'رز باللبن', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(160, 'رز باللبن بالايس كريم', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(161, 'جيلي فواكه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(167, 'خضار مشوي على الفحم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(168, 'عربي', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(169, 'afadsasef', 1358.56, 1359.95);
INSERT INTO "c21_temp_products" VALUES(176, 'عربي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(177, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(178, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(179, 'طلوط مقلي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(180, 'افطار Club21', 23.52, 24.95);
INSERT INTO "c21_temp_products" VALUES(1, 'مشروم اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(2, 'جريك اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(4, 'كرواسون', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(5, 'سمبوسك', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(6, 'بطاطس كروكيت بالفراخ', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(7, 'عيش بالثوم و الموزاريلا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(8, 'جمبري كوكتيل', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(9, 'خضار سوتيه', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(10, 'بطاطس هوم فرايز', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(11, 'سلطة سيزر', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(12, 'سلطة سيزر جمبري', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(13, 'جريك سلاد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(14, 'شيف سلاد', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(15, 'سلطة تونة', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(16, 'سلطة خضراء', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(17, 'شوربة بروكلي', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(18, 'شوربة عدس', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(19, 'شوربة كريمة المشروم', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(20, 'شوربة بصل', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(21, 'شوربة فراخ بالكريمة', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(22, 'شوربة طماطم', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(23, 'مكرونة بستو صوص', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(24, 'مكرونة بولونيز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(25, 'مكرونة الفريدو', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(26, 'مكرونة بريمافيرا', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(27, 'مكرونة بوتانسكا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(28, 'مكرونة ميت بول', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(29, 'مكرونة بيكيد زيتي', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(30, 'مكرونة بالكاري', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(31, 'مكرونة سي قود', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(32, 'طبق بيكاتا مشرو1', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(33, 'طبق فراخ مكسيكان', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(34, 'طبق فراخ بانيه', 43.62, 44.95);
INSERT INTO "c21_temp_products" VALUES(35, 'طبق فراخ مشوية', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(36, 'طبق فراخ بالكاري', 38.02, 39.95);
INSERT INTO "c21_temp_products" VALUES(37, 'طبق فراخ بانيه', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(38, 'طبق كبدة اسكندراني', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(39, 'طبق كبدة مشوية على الفحم', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(40, 'طبق خضار مشكل', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(41, 'طبق سبيط مقلي', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(42, 'طاجن السبيط', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(43, 'شرائح البتلو', 57.06, 58.95);
INSERT INTO "c21_temp_products" VALUES(44, 'نيويورك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(45, 'جريك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(46, 'ساندوتش فراخ كيف', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(47, 'ساندوتش فراخ بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(48, 'ساندوتش ميتبول بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(49, 'ساندوتش شيكين كاتشاتوري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(50, 'ساندوتش فراخ بانيه', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(51, 'ساندوتش فراخ مكسيكان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(52, 'ساندوتش فراخ كاجون', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(53, 'ساندوتش شيش طاووق', 20.16, 21.95);
INSERT INTO "c21_temp_products" VALUES(54, 'ساندوتش فراخ بالكاري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(55, 'ساندوتش صدور لراخ مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(56, 'ساندوتش كبدة مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(57, 'ساندوتش كبدة اسكندراني', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(58, 'ساندوتش هوت دوج', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(59, 'ساندوتش فيلادلفيا ستيك', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(60, 'ساندتش اسكالوب بانيه', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(61, 'شاندوتش سبيط مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(62, 'ساندوتش جمبري مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(63, 'ساندوتش جمبري مكسيكان', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(64, 'ساندوتش سلطة تونة', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(65, 'برجر كاليفورنيا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(66, 'برجر فراخ', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(67, 'برجر باربكيو', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(68, 'برجر ديلوكس', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(69, 'برجر فراخ', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(70, 'برجر خضروات', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(71, 'بيتزا مارجريتا', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(72, 'بيتزا فيجيتيريان', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(73, 'بيتزا مشروم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(74, 'بيتزا جمبري', 31.3, 32.95);
INSERT INTO "c21_temp_products" VALUES(75, 'بيتزا زيتون', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(76, 'بيتزا بيبيروني', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(77, 'بيتزا سجق', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(78, 'بيتزا تونة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(79, 'بيتزا فراخ و باربيكيو', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(80, 'بيتزا انشوجة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(81, 'بيتزا لحمة مفرومة', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(82, 'ريستريتو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(83, 'اكسبريسو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(84, 'اكسبيسو شوكولاتة', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(85, 'اكسبريسو ماكياطو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(86, 'قهوة تركي', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(87, 'كابتشينو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(88, 'كافيه لاتيه', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(89, 'كافيه موكا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(90, 'اميريكان كوفي', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(91, 'هامار هيد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(92, 'كافيه نوتيلا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(93, 'كافيه مالتيزرز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(94, 'كافيه فلوتس', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(95, 'كافيه جامايكا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(96, 'قهوة نكهات', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(97, 'ايس لاتيه', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(98, 'ايس موكا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(99, 'موكا فرابيه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(101, 'شاي اخضر', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(102, 'شاي نكهات', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(103, 'شاي بالنعناع', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(104, 'شاي ايرل جراي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(107, 'هوت شوكوليت هازلنتس', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(108, 'فيتامين - سي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(109, 'ايس كابتشينو', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(110, 'نعناع باءد', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(111, 'مانجو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(112, 'فراول', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(113, 'موز', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(114, 'برتفال', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(115, 'ليمون', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(116, 'جراندينا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(117, 'رمان', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(118, 'كانتلوب', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(119, 'بطيخ', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(120, 'كوكتيل مارجريتا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(121, 'كوكتيل فليجر', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(122, 'شيري كولا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(123, 'صن رايز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(124, 'ايطاليان صودا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(125, 'سامبا', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(126, 'روزانا بانانا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(127, 'بيناكولادا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(128, 'كوكتيل زبادي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(129, 'كوكتيل فيرجين ماري', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(130, 'كوكتيل فلوريدا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(131, 'ميلك شيك مانجو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(132, 'ميلك شيك فراولة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(133, 'ميلك شيك شوكولاتة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(134, 'ميلك شيك نعناع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(135, 'ميلك شيك قهوة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(136, 'ميلك شيك فانيليا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(137, 'ميلك شيك نعنتع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(138, 'ميلك شيك بوريو', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(139, 'صودا', 8.96, 9.95);
INSERT INTO "c21_temp_products" VALUES(140, 'مياه معدنية', 4.48, 5.95);
INSERT INTO "c21_temp_products" VALUES(141, 'مياه معدنية', 6.72, 7.95);
INSERT INTO "c21_temp_products" VALUES(142, 'كلوب صودا', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(143, 'تونيك', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(144, 'بيريل', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(145, 'فيروز', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(146, 'بروفيترول', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(147, 'شوكوليت لوقرز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(148, 'ترتل شوكوليت لوفرز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(149, 'شوكوليت كيك', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(150, 'بانانا سبليت', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(151, 'فدج براونيز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(152, 'كوب جاك', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(153, 'اوريو مادنس', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(154, 'ام علي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(155, 'كريم كراميل', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(156, 'موس شوكولاتة', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(157, 'ايس كريم', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(158, 'كريب حلو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(159, 'رز باللبن', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(160, 'رز باللبن بالايس كريم', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(161, 'جيلي فواكه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(167, 'خضار مشوي على الفحم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(168, 'عربي', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(169, 'afadsasef', 1358.56, 1359.95);
INSERT INTO "c21_temp_products" VALUES(176, 'عربي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(177, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(178, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(179, 'طلوط مقلي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(180, 'افطار Club21', 23.52, 24.95);
INSERT INTO "c21_temp_products" VALUES(1, 'مشروم اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(2, 'جريك اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(4, 'كرواسون', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(5, 'سمبوسك', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(6, 'بطاطس كروكيت بالفراخ', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(7, 'عيش بالثوم و الموزاريلا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(8, 'جمبري كوكتيل', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(9, 'خضار سوتيه', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(10, 'بطاطس هوم فرايز', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(11, 'سلطة سيزر', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(12, 'سلطة سيزر جمبري', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(13, 'جريك سلاد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(14, 'شيف سلاد', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(15, 'سلطة تونة', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(16, 'سلطة خضراء', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(17, 'شوربة بروكلي', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(18, 'شوربة عدس', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(19, 'شوربة كريمة المشروم', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(20, 'شوربة بصل', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(21, 'شوربة فراخ بالكريمة', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(22, 'شوربة طماطم', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(23, 'مكرونة بستو صوص', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(24, 'مكرونة بولونيز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(25, 'مكرونة الفريدو', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(26, 'مكرونة بريمافيرا', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(27, 'مكرونة بوتانسكا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(28, 'مكرونة ميت بول', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(29, 'مكرونة بيكيد زيتي', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(30, 'مكرونة بالكاري', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(31, 'مكرونة سي قود', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(32, 'طبق بيكاتا مشرو1', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(33, 'طبق فراخ مكسيكان', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(34, 'طبق فراخ بانيه', 43.62, 44.95);
INSERT INTO "c21_temp_products" VALUES(35, 'طبق فراخ مشوية', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(36, 'طبق فراخ بالكاري', 38.02, 39.95);
INSERT INTO "c21_temp_products" VALUES(37, 'طبق فراخ بانيه', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(38, 'طبق كبدة اسكندراني', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(39, 'طبق كبدة مشوية على الفحم', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(40, 'طبق خضار مشكل', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(41, 'طبق سبيط مقلي', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(42, 'طاجن السبيط', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(43, 'شرائح البتلو', 57.06, 58.95);
INSERT INTO "c21_temp_products" VALUES(44, 'نيويورك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(45, 'جريك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(46, 'ساندوتش فراخ كيف', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(47, 'ساندوتش فراخ بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(48, 'ساندوتش ميتبول بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(49, 'ساندوتش شيكين كاتشاتوري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(50, 'ساندوتش فراخ بانيه', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(51, 'ساندوتش فراخ مكسيكان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(52, 'ساندوتش فراخ كاجون', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(53, 'ساندوتش شيش طاووق', 20.16, 21.95);
INSERT INTO "c21_temp_products" VALUES(54, 'ساندوتش فراخ بالكاري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(55, 'ساندوتش صدور لراخ مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(56, 'ساندوتش كبدة مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(57, 'ساندوتش كبدة اسكندراني', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(58, 'ساندوتش هوت دوج', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(59, 'ساندوتش فيلادلفيا ستيك', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(60, 'ساندتش اسكالوب بانيه', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(61, 'شاندوتش سبيط مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(62, 'ساندوتش جمبري مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(63, 'ساندوتش جمبري مكسيكان', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(64, 'ساندوتش سلطة تونة', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(65, 'برجر كاليفورنيا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(66, 'برجر فراخ', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(67, 'برجر باربكيو', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(68, 'برجر ديلوكس', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(69, 'برجر فراخ', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(70, 'برجر خضروات', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(71, 'بيتزا مارجريتا', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(72, 'بيتزا فيجيتيريان', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(73, 'بيتزا مشروم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(74, 'بيتزا جمبري', 31.3, 32.95);
INSERT INTO "c21_temp_products" VALUES(75, 'بيتزا زيتون', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(76, 'بيتزا بيبيروني', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(77, 'بيتزا سجق', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(78, 'بيتزا تونة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(79, 'بيتزا فراخ و باربيكيو', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(80, 'بيتزا انشوجة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(81, 'بيتزا لحمة مفرومة', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(82, 'ريستريتو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(83, 'اكسبريسو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(84, 'اكسبيسو شوكولاتة', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(85, 'اكسبريسو ماكياطو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(86, 'قهوة تركي', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(87, 'كابتشينو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(88, 'كافيه لاتيه', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(89, 'كافيه موكا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(90, 'اميريكان كوفي', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(91, 'هامار هيد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(92, 'كافيه نوتيلا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(93, 'كافيه مالتيزرز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(94, 'كافيه فلوتس', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(95, 'كافيه جامايكا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(96, 'قهوة نكهات', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(97, 'ايس لاتيه', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(98, 'ايس موكا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(99, 'موكا فرابيه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(101, 'شاي اخضر', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(102, 'شاي نكهات', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(103, 'شاي بالنعناع', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(104, 'شاي ايرل جراي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(107, 'هوت شوكوليت هازلنتس', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(108, 'فيتامين - سي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(109, 'ايس كابتشينو', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(110, 'نعناع باءد', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(111, 'مانجو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(112, 'فراول', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(113, 'موز', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(114, 'برتفال', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(115, 'ليمون', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(116, 'جراندينا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(117, 'رمان', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(118, 'كانتلوب', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(119, 'بطيخ', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(120, 'كوكتيل مارجريتا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(121, 'كوكتيل فليجر', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(122, 'شيري كولا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(123, 'صن رايز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(124, 'ايطاليان صودا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(125, 'سامبا', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(126, 'روزانا بانانا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(127, 'بيناكولادا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(128, 'كوكتيل زبادي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(129, 'كوكتيل فيرجين ماري', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(130, 'كوكتيل فلوريدا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(131, 'ميلك شيك مانجو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(132, 'ميلك شيك فراولة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(133, 'ميلك شيك شوكولاتة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(134, 'ميلك شيك نعناع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(135, 'ميلك شيك قهوة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(136, 'ميلك شيك فانيليا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(137, 'ميلك شيك نعنتع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(138, 'ميلك شيك بوريو', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(139, 'صودا', 8.96, 9.95);
INSERT INTO "c21_temp_products" VALUES(140, 'مياه معدنية', 4.48, 5.95);
INSERT INTO "c21_temp_products" VALUES(141, 'مياه معدنية', 6.72, 7.95);
INSERT INTO "c21_temp_products" VALUES(142, 'كلوب صودا', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(143, 'تونيك', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(144, 'بيريل', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(145, 'فيروز', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(146, 'بروفيترول', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(147, 'شوكوليت لوقرز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(148, 'ترتل شوكوليت لوفرز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(149, 'شوكوليت كيك', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(150, 'بانانا سبليت', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(151, 'فدج براونيز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(152, 'كوب جاك', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(153, 'اوريو مادنس', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(154, 'ام علي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(155, 'كريم كراميل', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(156, 'موس شوكولاتة', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(157, 'ايس كريم', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(158, 'كريب حلو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(159, 'رز باللبن', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(160, 'رز باللبن بالايس كريم', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(161, 'جيلي فواكه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(167, 'خضار مشوي على الفحم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(168, 'عربي', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(169, 'afadsasef', 1358.56, 1359.95);
INSERT INTO "c21_temp_products" VALUES(176, 'عربي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(177, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(178, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(179, 'طلوط مقلي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(180, 'افطار Club21', 23.52, 24.95);
INSERT INTO "c21_temp_products" VALUES(1, 'مشروم اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(2, 'جريك اومليت', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(4, 'كرواسون', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(5, 'سمبوسك', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(6, 'بطاطس كروكيت بالفراخ', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(7, 'عيش بالثوم و الموزاريلا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(8, 'جمبري كوكتيل', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(9, 'خضار سوتيه', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(10, 'بطاطس هوم فرايز', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(11, 'سلطة سيزر', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(12, 'سلطة سيزر جمبري', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(13, 'جريك سلاد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(14, 'شيف سلاد', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(15, 'سلطة تونة', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(16, 'سلطة خضراء', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(17, 'شوربة بروكلي', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(18, 'شوربة عدس', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(19, 'شوربة كريمة المشروم', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(20, 'شوربة بصل', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(21, 'شوربة فراخ بالكريمة', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(22, 'شوربة طماطم', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(23, 'مكرونة بستو صوص', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(24, 'مكرونة بولونيز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(25, 'مكرونة الفريدو', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(26, 'مكرونة بريمافيرا', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(27, 'مكرونة بوتانسكا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(28, 'مكرونة ميت بول', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(29, 'مكرونة بيكيد زيتي', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(30, 'مكرونة بالكاري', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(31, 'مكرونة سي قود', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(32, 'طبق بيكاتا مشرو1', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(33, 'طبق فراخ مكسيكان', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(34, 'طبق فراخ بانيه', 43.62, 44.95);
INSERT INTO "c21_temp_products" VALUES(35, 'طبق فراخ مشوية', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(36, 'طبق فراخ بالكاري', 38.02, 39.95);
INSERT INTO "c21_temp_products" VALUES(37, 'طبق فراخ بانيه', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(38, 'طبق كبدة اسكندراني', 34.66, 35.95);
INSERT INTO "c21_temp_products" VALUES(39, 'طبق كبدة مشوية على الفحم', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(40, 'طبق خضار مشكل', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(41, 'طبق سبيط مقلي', 45.86, 46.95);
INSERT INTO "c21_temp_products" VALUES(42, 'طاجن السبيط', 40.26, 41.95);
INSERT INTO "c21_temp_products" VALUES(43, 'شرائح البتلو', 57.06, 58.95);
INSERT INTO "c21_temp_products" VALUES(44, 'نيويورك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(45, 'جريك ستيك', 51.46, 52.95);
INSERT INTO "c21_temp_products" VALUES(46, 'ساندوتش فراخ كيف', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(47, 'ساندوتش فراخ بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(48, 'ساندوتش ميتبول بارمجان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(49, 'ساندوتش شيكين كاتشاتوري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(50, 'ساندوتش فراخ بانيه', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(51, 'ساندوتش فراخ مكسيكان', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(52, 'ساندوتش فراخ كاجون', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(53, 'ساندوتش شيش طاووق', 20.16, 21.95);
INSERT INTO "c21_temp_products" VALUES(54, 'ساندوتش فراخ بالكاري', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(55, 'ساندوتش صدور لراخ مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(56, 'ساندوتش كبدة مشوية', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(57, 'ساندوتش كبدة اسكندراني', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(58, 'ساندوتش هوت دوج', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(59, 'ساندوتش فيلادلفيا ستيك', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(60, 'ساندتش اسكالوب بانيه', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(61, 'شاندوتش سبيط مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(62, 'ساندوتش جمبري مقلي', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(63, 'ساندوتش جمبري مكسيكان', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(64, 'ساندوتش سلطة تونة', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(65, 'برجر كاليفورنيا', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(66, 'برجر فراخ', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(67, 'برجر باربكيو', 21.22, 22.95);
INSERT INTO "c21_temp_products" VALUES(68, 'برجر ديلوكس', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(69, 'برجر فراخ', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(70, 'برجر خضروات', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(71, 'بيتزا مارجريتا', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(72, 'بيتزا فيجيتيريان', 24.58, 25.95);
INSERT INTO "c21_temp_products" VALUES(73, 'بيتزا مشروم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(74, 'بيتزا جمبري', 31.3, 32.95);
INSERT INTO "c21_temp_products" VALUES(75, 'بيتزا زيتون', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(76, 'بيتزا بيبيروني', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(77, 'بيتزا سجق', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(78, 'بيتزا تونة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(79, 'بيتزا فراخ و باربيكيو', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(80, 'بيتزا انشوجة', 27.94, 28.95);
INSERT INTO "c21_temp_products" VALUES(81, 'بيتزا لحمة مفرومة', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(82, 'ريستريتو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(83, 'اكسبريسو', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(84, 'اكسبيسو شوكولاتة', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(85, 'اكسبريسو ماكياطو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(86, 'قهوة تركي', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(87, 'كابتشينو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(88, 'كافيه لاتيه', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(89, 'كافيه موكا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(90, 'اميريكان كوفي', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(91, 'هامار هيد', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(92, 'كافيه نوتيلا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(93, 'كافيه مالتيزرز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(94, 'كافيه فلوتس', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(95, 'كافيه جامايكا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(96, 'قهوة نكهات', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(97, 'ايس لاتيه', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(98, 'ايس موكا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(99, 'موكا فرابيه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(101, 'شاي اخضر', 11.14, 12.95);
INSERT INTO "c21_temp_products" VALUES(102, 'شاي نكهات', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(103, 'شاي بالنعناع', 10.02, 11.95);
INSERT INTO "c21_temp_products" VALUES(104, 'شاي ايرل جراي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(107, 'هوت شوكوليت هازلنتس', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(108, 'فيتامين - سي', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(109, 'ايس كابتشينو', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(110, 'نعناع باءد', 12.26, 13.95);
INSERT INTO "c21_temp_products" VALUES(111, 'مانجو', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(112, 'فراول', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(113, 'موز', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(114, 'برتفال', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(115, 'ليمون', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(116, 'جراندينا', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(117, 'رمان', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(118, 'كانتلوب', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(119, 'بطيخ', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(120, 'كوكتيل مارجريتا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(121, 'كوكتيل فليجر', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(122, 'شيري كولا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(123, 'صن رايز', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(124, 'ايطاليان صودا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(125, 'سامبا', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(126, 'روزانا بانانا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(127, 'بيناكولادا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(128, 'كوكتيل زبادي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(129, 'كوكتيل فيرجين ماري', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(130, 'كوكتيل فلوريدا', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(131, 'ميلك شيك مانجو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(132, 'ميلك شيك فراولة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(133, 'ميلك شيك شوكولاتة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(134, 'ميلك شيك نعناع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(135, 'ميلك شيك قهوة', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(136, 'ميلك شيك فانيليا', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(137, 'ميلك شيك نعنتع', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(138, 'ميلك شيك بوريو', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(139, 'صودا', 8.96, 9.95);
INSERT INTO "c21_temp_products" VALUES(140, 'مياه معدنية', 4.48, 5.95);
INSERT INTO "c21_temp_products" VALUES(141, 'مياه معدنية', 6.72, 7.95);
INSERT INTO "c21_temp_products" VALUES(142, 'كلوب صودا', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(143, 'تونيك', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(144, 'بيريل', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(145, 'فيروز', 9.52, 10.95);
INSERT INTO "c21_temp_products" VALUES(146, 'بروفيترول', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(147, 'شوكوليت لوقرز', 23.46, 24.95);
INSERT INTO "c21_temp_products" VALUES(148, 'ترتل شوكوليت لوفرز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(149, 'شوكوليت كيك', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(150, 'بانانا سبليت', 26.82, 27.95);
INSERT INTO "c21_temp_products" VALUES(151, 'فدج براونيز', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(152, 'كوب جاك', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(153, 'اوريو مادنس', 22.34, 23.95);
INSERT INTO "c21_temp_products" VALUES(154, 'ام علي', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(155, 'كريم كراميل', 14.5, 15.95);
INSERT INTO "c21_temp_products" VALUES(156, 'موس شوكولاتة', 18.98, 19.95);
INSERT INTO "c21_temp_products" VALUES(157, 'ايس كريم', 20.1, 21.95);
INSERT INTO "c21_temp_products" VALUES(158, 'كريب حلو', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(159, 'رز باللبن', 13.38, 14.95);
INSERT INTO "c21_temp_products" VALUES(160, 'رز باللبن بالايس كريم', 17.86, 18.95);
INSERT INTO "c21_temp_products" VALUES(161, 'جيلي فواكه', 16.74, 17.95);
INSERT INTO "c21_temp_products" VALUES(167, 'خضار مشوي على الفحم', 25.7, 26.95);
INSERT INTO "c21_temp_products" VALUES(168, 'عربي', 15.62, 16.95);
INSERT INTO "c21_temp_products" VALUES(169, 'afadsasef', 1358.56, 1359.95);
INSERT INTO "c21_temp_products" VALUES(176, 'عربي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(177, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(178, 'مشينكاح', 51.52, 52.95);
INSERT INTO "c21_temp_products" VALUES(179, 'طلوط مقلي', 14.56, 15.95);
INSERT INTO "c21_temp_products" VALUES(180, 'افطار Club21', 23.52, 24.95);

CREATE TABLE "c21_users" (
  "id" integer NOT NULL,
  "name" varchar(100) NOT NULL,
  "username" varchar(100) NOT NULL,
  "password" varchar(100) NOT NULL,
  "role" varchar(10) NOT NULL DEFAULT 'cachier',
  "phone" varchar(20) NOT NULL

);
INSERT INTO "c21_users" VALUES(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin', '');
INSERT INTO "c21_users" VALUES(2, 'muhammad', 'm.medhat', '202cb962ac59075b964b07152d234b70', 'cachier', '');
INSERT INTO "c21_users" VALUES(7, 'Muhammad', 'a', '0cc175b9c0f1b6a831c399e269772661', 'cachier', '');
INSERT INTO "c21_users" VALUES(8, 'mmm', 'mm', 'b3cd915d758008bd19d0f2428fbb354a', 'cachier', '');
INSERT INTO "c21_users" VALUES(9, '1111', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'cachier', '');
INSERT INTO "c21_users" VALUES(10, 'g', 'g', 'b2f5ff47436671b6e533d8dc3614845d', 'cachier', '');
INSERT INTO "c21_users" VALUES(11, 'l', 'l', '2db95e8e1a9267b7a1188556b2013b33', 'cachier', '');
INSERT INTO "c21_users" VALUES(12, 'h', 'h', '2510c39011c5be704182423e3a695e91', 'cachier', '');
INSERT INTO "c21_users" VALUES(13, '2', '2', 'c81e728d9d4c2f636f067f89cc14862c', 'cachier', '');
INSERT INTO "c21_users" VALUES(14, 'q2', 'q', '7694f4a66316e53c8cdd9d9954bd611d', 'cachier', '');
INSERT INTO "c21_users" VALUES(15, '888', 'h', 'c4ca4238a0b923820dcc509a6f75849b', 'cachier', '');
INSERT INTO "c21_users" VALUES(16, 'sdfgweg', 'p', '83878c91171338902e0fe0fb97a8c47a', 'cachier', '');

CREATE TABLE "c21_work_shifts" (
  "id" integer NOT NULL,
  "date" date NOT NULL,
  "start_time" time NOT NULL,
  "end_time" time NOT NULL,
  "notes" text NOT NULL,
  "closed" integer NOT NULL DEFAULT '0',
  "username" varchar(20) NOT NULL

);
INSERT INTO "c21_work_shifts" VALUES(1, '2017-04-25', '22:36:58', '12:40:26', '', 1, '1');
INSERT INTO "c21_work_shifts" VALUES(2, '2017-05-10', '12:40:53', '00:00:00', '', 0, '1');
INSERT INTO "c21_work_shifts" VALUES(3, '2017-05-25', '14:49:00', '14:52:20', '', 1, '1');
INSERT INTO "c21_work_shifts" VALUES(4, '2017-05-25', '14:52:25', '15:26:41', '', 1, '1');
INSERT INTO "c21_work_shifts" VALUES(5, '2017-05-31', '23:42:30', '00:00:00', '', 0, '1');

