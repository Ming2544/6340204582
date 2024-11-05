-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 07:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

--
-- Dumping data for table `pma__central_columns`
--

INSERT INTO `pma__central_columns` (`db_name`, `col_name`, `col_type`, `col_length`, `col_collation`, `col_isNull`, `col_extra`, `col_default`) VALUES
('prond', 'a_id', 'int', '11', '', 0, 'auto_increment,', ''),
('prond', 'm_email', 'varchar', '100', 'utf8_general_ci', 0, ',', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"relation_lines\":\"true\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"prond\",\"table\":\"tbl_product\"},{\"db\":\"prond\",\"table\":\"tbl_sales\"},{\"db\":\"prond\",\"table\":\"tbl_member\"},{\"db\":\"prond\",\"table\":\"tbl_orders\"},{\"db\":\"prond\",\"table\":\"orders\"},{\"db\":\"prond\",\"table\":\"tbl_type\"},{\"db\":\"prond\",\"table\":\"tbl_bank\"},{\"db\":\"prond\",\"table\":\"tbl_admin\"},{\"db\":\"my_db_shop\",\"table\":\"tbl_admin\"},{\"db\":\"my_db_shop\",\"table\":\"tbl_news\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('prond', 'tbl_product', 'type_id'),
('prond', 'tbl_sales', 'slip');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'prond', 'tbl_member', '[]', '2024-10-14 05:04:45'),
('root', 'prond', 'tbl_product', '{\"CREATE_TIME\":\"2024-09-09 12:01:57\",\"sorted_col\":\"`tbl_product`.`p_price` ASC\"}', '2024-10-07 13:33:43'),
('root', 'prond', 'tbl_sales', '[]', '2024-10-31 14:20:16'),
('root', 'prond', 'tbl_type', '{\"sorted_col\":\"`tbl_type`.`type_id` ASC\"}', '2024-10-05 17:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-11-05 06:50:33', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `prond`
--
CREATE DATABASE IF NOT EXISTS `prond` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prond`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `a_id` int(11) NOT NULL,
  `a_user` varchar(20) NOT NULL,
  `a_pass` varchar(20) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `วันที่บันทึก` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_id`, `a_user`, `a_pass`, `a_name`, `วันที่บันทึก`) VALUES
(3, '232', '232', 'jinkee', '2024-10-05 18:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_type` varchar(100) NOT NULL,
  `b_number` varchar(20) NOT NULL,
  `b_owner` varchar(100) NOT NULL,
  `bn_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`b_id`, `b_name`, `b_type`, `b_number`, `b_owner`, `bn_name`) VALUES
(1, 'กรุงไทย', 'ออมทรัพย์', '0650850073', 'วันชนะ อ่อนผึ็ง', 'อุดรธานี');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `m_user` varchar(20) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_gender` varchar(10) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_tel` varchar(20) NOT NULL,
  `m_address` varchar(200) NOT NULL,
  `birth_date` date NOT NULL DEFAULT current_timestamp(),
  `date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `m_user`, `m_pass`, `m_name`, `m_gender`, `m_email`, `m_tel`, `m_address`, `birth_date`, `date_save`) VALUES
(35, '444', '444', 'หมิง', 'female', 'wfafsdfd@gmail.com', '0626226616', '64 ม10  ต นาข่า อ เมือง จ อุดรธานี', '2024-09-04', '2024-10-15 13:34:53'),
(39, 'ewefewf', 'ewfefew', 'efewfwe', 'male', 'fwefwef@gmail.com', '0326226616', 'ewfwefwefwefwefw', '2024-10-31', '2024-10-30 18:01:32'),
(40, 'wanchana', 'Ming.2544', 'วันชนะ อ่อนผึ้ง', 'male', 'wanchanaonpung@gmail.com', '0650850073', '64 ม 10 ต.นาข่า อ.เมือง จ.อุดรธานี 4100', '2001-08-09', '2024-11-01 03:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `p_detail` text NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `p_unit` varchar(100) NOT NULL,
  `p_view` int(10) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `type_id`, `p_detail`, `p_img`, `p_price`, `p_qty`, `p_unit`, `p_view`, `datesave`) VALUES
(215, 'KORN เสื้อวง KORN T-SHIRT ลาย KORN ลิขสิทธิ์ของแท้100% จาก EU BLACK S', 3, '	\r\nเสื้อวง KORN T-SHIRT ลาย KORN ลิขสิทธิ์ของแท้100% จาก EU\r\nราคา 899 บาท \r\nพร้อมส่ง\r\nป้าย : GILDAN (ไม่มีตะเข็บข้าง)', 'p_img205304344220241017_100142.JPG', 899, 5, 'ชิ้น', 4, '2024-10-17 03:01:42'),
(217, 'KORN เสื้อวง KORN ลาย FOLLOW THE LEADER T-SHIRT ลิขสิทธิ์ของแท้ EU BLACK', 3, 'เสื้อวง KORN ลาย FOLLOW THE LEADER T-SHIRT ลิขสิทธิ์ของแท้ EU\r\nพร้อมส่ง\r\nGILDAN (ไม่มีตะเข็บข้าง)', 'p_img45148209120241017_102608.JPG', 899, 5, 'ชิ้น', 0, '2024-10-17 03:26:08'),
(218, 'เสื้อวง DEF LEPPARD ลิขสิทธิ์แท้100%', 3, 'เสื้อวง DEF LEPPARD ลิขสิทธิ์แท้100%\r\nราคา 700.-บาท\r\n พร้อมส่ง   จัดส่งด่วนฟรี', 'p_img54057284820241017_103827.JPG', 700, 5, 'ชิ้น', 0, '2024-10-17 03:38:27'),
(219, 'เสื้อยืด Green Day ลิขสิทธิ์แท้100%', 3, 'เสื้อยืด Green Day ลิขสิทธิ์แท้100%\r\nราคา 700.-บาท\r\n พร้อมส่ง', 'p_img127160766020241017_104426.JPG', 700, 5, 'ชิ้น', 0, '2024-10-17 03:44:26'),
(220, 'เสื้อมัดย้อม Grateful Dead ลิขสิทธิ์แท้100%', 4, 'สื้อมัดย้อม Grateful Dead ลิขสิทธิ์แท้100%\r\nราคา 900 บาท\r\nป้ายคอ Liquid Blue\r\n พร้อมส่ง ', 'p_img167711195520241017_110043.JPG', 900, 5, 'ชิ้น', 0, '2024-10-17 04:00:43'),
(221, 'เสื้อมัดย้อม Grateful Dead ลิขสิทธิ์แท้100%', 4, '	\r\nเสื้อมัดย้อม Grateful Dead ลิขสิทธิ์แท้100%\r\nราคา 900 บาท\r\nป้ายคอ Liquid Blue\r\n พร้อมส่ง', 'p_img208770845120241017_110615.JPG', 900, 5, 'ชิ้น', 1, '2024-10-17 04:06:15'),
(222, 'เสื้อยืดวินเทจ เสื้อยืดการ์ตูน บักส์ บันนี', 1, 'สภาพ : สภาพสมบูรณ์\r\nป้าย : GENUS MADE IN USA ป้ายตอก size XL 27/32\r\nตะเข็บ : เดี่ยวบน - ล่าง\r\nตอกปี : 1993', 'p_img64109986520241017_112005.JPG', 1490, 5, 'ชิ้น', 0, '2024-10-17 04:20:05'),
(223, 'เสื้อยืดวินเทจ  ลายการ์ตูนมินเนี่ยน  ', 1, 'สื้อยืดวินเทจ  ลายการ์ตูนมินเนี่ยน  \r\nงานป้ายผ้าเก่า \r\nรอบอก 34” ยาว 27”\r\nพร้อมส่ง', 'p_img121799268420241017_112342.JPG', 249, 5, 'ชิ้น', 0, '2024-10-17 04:23:42'),
(224, 'เสื้อยืดวินเทจ เสื้อยืดการ์ตูน PEANUTS ', 1, 'สภาพ : สภาพสมบูรณ์\r\nป้าย : DELTA ป้ายปี 1996 size M 21\"/31\"\r\nตะเข็บ : คูู่บน - คู่ล่าง\r\nพร้อมส่ง', 'p_img145000788120241017_113239.JPG', 520, 0, 'ชิ้น', 1, '2024-10-17 04:32:39'),
(225, 'เสื้อยืดวินเทจมือสอง Vintage ลายการ์ตูนมิกกี้เมาส์', 1, 'งานป้ายผ้าเก่า Disney \r\nรอบอก 42” ยาว 28”\r\nเนื้อผ้า 90/10\r\nพร้อมส่ง', 'p_img93269391720241017_113747.jpg', 189, 0, 'ชิ้น', 0, '2024-10-17 04:37:47'),
(226, 'เสื้อทานตะวัน', 5, 'ดอกทานตะวัน', 'p_img93414251920241017_151746.JPG', 299, 99, 'ชิ้น', 3, '2024-10-17 08:17:46'),
(227, 'หมวกหมูเด้ง', 6, 'มีสีชมพู', 'p_img85152310420241101_102412.JPG', 499, 10, '', 0, '2024-11-01 03:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `slip` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `sale_date` datetime DEFAULT current_timestamp(),
  `member_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `order_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`sale_id`, `product_id`, `quantity`, `slip`, `status`, `sale_date`, `member_id`, `total_price`, `order_id`) VALUES
(17, 226, 1, '6710cd10a3703.JPG', 'confirmed', '2024-10-17 15:38:40', 36, 299, 0),
(18, 223, 1, '6710cdc466afd.jpg', 'confirmed', '2024-10-17 15:41:40', 36, 249, 7),
(19, 226, 1, '67149e053c20b.JPG', 'confirmed', '2024-10-20 13:07:01', 35, 1046, 7),
(20, 223, 3, '67149e053c20b.JPG', 'confirmed', '2024-10-20 13:07:01', 35, 1046, 0),
(21, 226, 3, '6723076960018.jpg', 'confirmed', '2024-10-31 11:28:25', 35, 897, 7),
(22, 226, 2, '672338c87b065.jpg', 'pending', '2024-10-31 14:59:04', 35, 847, 5),
(23, 223, 1, '672338c87b065.jpg', 'pending', '2024-10-31 14:59:04', 35, 847, 6),
(24, 226, 1, '67238dbd14a8c.JPG', 'pending', '2024-10-31 21:01:33', 35, 548, 0),
(25, 223, 1, '67238dbd14a8c.JPG', 'pending', '2024-10-31 21:01:33', 35, 548, 0),
(26, 226, 1, '67238f5175cbc.PNG', 'confirmed', '2024-10-31 21:08:17', 35, 299, 0),
(27, 226, 1, '6723a3706ac97.PNG', 'confirmed', '2024-10-31 22:34:08', 35, 299, 8),
(28, 226, 1, '6723a3ee51482.jfif', 'confirmed', '2024-10-31 22:36:14', 35, 548, 9),
(29, 223, 1, '6723a3ee51482.jfif', 'pending', '2024-10-31 22:36:14', 35, 548, 9),
(31, 226, 1, '6723ae22bfd57.jfif', 'pending', '2024-10-31 23:19:46', 35, 548, 10),
(32, 223, 1, '6723ae22bfd57.jfif', 'pending', '2024-10-31 23:19:46', 35, 548, 10),
(33, 227, 2, '67244b1a9bd7e.JPG', 'confirmed', '2024-11-01 10:29:30', 40, 998, 1),
(34, 226, 1, '67244bc0d9bda.JPG', 'confirmed', '2024-11-01 10:32:16', 40, 299, 2),
(35, 226, 1, '67244e8ca391b.jfif', 'pending', '2024-11-01 10:44:12', 40, 798, 3),
(36, 227, 1, '67244e8ca391b.jfif', 'pending', '2024-11-01 10:44:12', 40, 798, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(5, 'ดอกทานตะวันบานเช้า'),
(4, 'ผ้ามัดย้อม'),
(1, 'ลายการ์ตูน  '),
(6, 'หมูเด้ง'),
(3, 'เสื้อวง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `tbl_sales_ibfk_1` (`product_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `type_name` (`type_name`),
  ADD UNIQUE KEY `type_name_2` (`type_name`),
  ADD KEY `type_name_3` (`type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD CONSTRAINT `tbl_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
