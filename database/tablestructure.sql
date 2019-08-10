--
-- Table structure for table `rmsa_book_links`
-- This table contains link details of the uploaded biik or an external link, 
-- there will be admin panel from where the authorised user can add / edit / upload the book and its details

CREATE TABLE IF NOT EXISTS `rmsa_book_links` (
  `rmsa_book_link_id` bigint(20) NOT NULL,
  `book_isbn` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ISBN number of the book',
  `book_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title of the book',
  `book_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL of the book',
  `book_desc` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Description for the book',
  `book_link_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or DISCONTINUED',
  `rmsa_class_id`  bigint(20) NOT NULL COMMENT 'Foerign Key of Class Master table',
  `rmsa_subject_id`  bigint(20) NOT NULL COMMENT 'Foerign Key of Subject Master table',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_book_links`
--
ALTER TABLE `rmsa_book_links`
  ADD PRIMARY KEY (`rmsa_book_link_id`),
  ADD UNIQUE KEY `book_links_isbn_uk` (`book_isbn`);
  
--
-- AUTO_INCREMENT for table `rmsa_book_links`
--
ALTER TABLE `rmsa_book_links`
  MODIFY `rmsa_book_link_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------




--
-- Table structure for table `rmsa_uploaded_files`
-- This table will host details of all uploaded content 
-- and be used as master for all uploaded data which is tbe refrenced in front end
-- The content can be managed by admin panel and front end (by a valid user)
-- The naming convention for uploade file will be FileID_Title_Group_Category_ddmmyyyy
-- The file should be uploaded in folders yyyy than mmm than dd than UPFILE_TYP

CREATE TABLE IF NOT EXISTS `rmsa_uploaded_files` (
  `rmsa_uploaded_file_id` bigint(20) NOT NULL,
  `uploaded_file_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title of the file',
  `uploaded_file_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pdf, doc, jpeg, ppt, excel, mp4 from categories where type is UPFILE_TYP',
  `uploaded_file_group` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Group to which the file will be belong from categories where type is UPFILE_GRP',
  `uploaded_file_category` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Category of the file from categories where type is UPFILE_CAT',
  `uploaded_file_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the uploaded file',
  `uploaded_file_tag` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Search tags for the file comma seperated',
  `uploaded_file_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'upload path of the file which should be yyyy than mm than dd then type then file name',
  `uploaded_file_hasvol` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'This uploads contains volumes Value YES or NO',
  `uploaded_file_volroot` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Parent of start of the volume will be rmsa_uploaded_file_id',
  `uploaded_file_volorder` int NOT NULL DEFAULT '0' COMMENT 'Order / Sequensce of the volume in which they appear if not specified or zero order by date',
  `uploaded_file_viewcount` bigint(20) NOT NULL COMMENT 'Number of times the file is viewed or dowloaded',
  `uploaded_file_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_uploaded_files`
--
ALTER TABLE `rmsa_uploaded_files`
  ADD PRIMARY KEY (`rmsa_uploaded_file_id`),
  ADD UNIQUE KEY `uploaded_files_path_uk` (`uploaded_file_path`);
  
--
-- AUTO_INCREMENT for table `rmsa_uploaded_files`
--
ALTER TABLE `rmsa_uploaded_files`
  MODIFY `rmsa_uploaded_file_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------



--
-- Table structure for table `rmsa_notices`
-- This table will host details notices issued 
-- These noticed will be scrolled and displayed on the site

CREATE TABLE IF NOT EXISTS `rmsa_notices` (
  `rmsa_notice_id` bigint(20) NOT NULL,
  `rmsa_notice_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title of the notice',
  `rmsa_notice_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the notice',
  `rmsa_notice_startdt` date NOT NULL COMMENT 'Notice start date of display',
  `rmsa_notice_enddt` date NOT NULL COMMENT 'Notice last date of display',
  `rmsa_notice_pubdt` date NOT NULL COMMENT 'Date on which notice was issued',
  `rmsa_notice_tag` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Search tags for the notice comma seperated',
  `rmsa_notice_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_uploaded_file_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link to the file associsted to the notice',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_notices`
--
ALTER TABLE `rmsa_notices`
  ADD PRIMARY KEY (`rmsa_notice_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_notices`
--
ALTER TABLE `rmsa_notices`
  MODIFY `rmsa_notice_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------



--
-- Table structure for table `rmsa_schools`
-- This table will host details of all schools 

CREATE TABLE IF NOT EXISTS `rmsa_schools` (
  `rmsa_school_id` bigint(20) NOT NULL,
  `rmsa_school_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title of the notice',
  `rmsa_school_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the notice',
  `rmsa_school_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Primary, Middle, High, Secondary from categories where type is SCHOOL_TYP',
  `rmsa_school_session` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Summer or Winter, ALL Year where type is SESS_TYP',
  `rmsa_school_startdt` date NOT NULL COMMENT 'Date school was started or came into existnace',
  `rmsa_school_regdt` date NOT NULL COMMENT 'Date when school was registered on RMSA',
  `rmsa_school_deregdt` date NOT NULL COMMENT 'Date on which was deregistered from RMSA',
  `rmsa_school_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_state_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link to the file associsted to the notice',
  `rmsa_district_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link to the file associsted to the notice',
  `rmsa_block_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link to the file associsted to the notice',
  `rmsa_sub_district_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link to the file associsted to the notice',
  `rmsa_town_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link to the file associsted to the notice',
  `rmsa_village_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link to the file associsted to the notice',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_schools`
--
ALTER TABLE `rmsa_schools`
  ADD PRIMARY KEY (`rmsa_school_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_schools`
--
ALTER TABLE `rmsa_schools`
  MODIFY `rmsa_school_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------




--
-- Table structure for table `rmsa_states`
-- This table will host details of all states 

CREATE TABLE IF NOT EXISTS `rmsa_states` (
  `rmsa_state_id` bigint(20) NOT NULL,
  `rmsa_state_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of the State',
  `rmsa_state_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'DEsctiption for the uploaded file',
  `rmsa_state_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path of the file',
  `rmsa_state_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_states`
--
ALTER TABLE `rmsa_states`
  ADD PRIMARY KEY (`rmsa_state_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_states`
--
ALTER TABLE `rmsa_states`
  MODIFY `rmsa_state_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------


-- This table will host details of all districts 

CREATE TABLE IF NOT EXISTS `rmsa_districts` (
  `rmsa_district_id` bigint(20) NOT NULL,
  `rmsa_district_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of the District',
  `rmsa_district_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the district',
  `rmsa_district_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path of the file',
  `rmsa_district_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_state_id` bigint(20) NOT NULL COMMENT 'Foreign key for State',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_districts`
--
ALTER TABLE `rmsa_districts`
  ADD PRIMARY KEY (`rmsa_district_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_districts`
--
ALTER TABLE `rmsa_districts`
  MODIFY `rmsa_district_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------


-- This table will host details of all blocks 

CREATE TABLE IF NOT EXISTS `rmsa_blocks` (
  `rmsa_block_id` bigint(20) NOT NULL,
  `rmsa_block_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of the Block',
  `rmsa_block_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the block',
  `rmsa_block_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path of the file',
  `rmsa_block_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_state_id` bigint(20) NOT NULL COMMENT 'Foreign key for State',
  `rmsa_district_id` bigint(20) NOT NULL COMMENT 'Foreign key for District',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_blocks`
--
ALTER TABLE `rmsa_blocks`
  ADD PRIMARY KEY (`rmsa_block_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_blocks`
--
ALTER TABLE `rmsa_blocks`
  MODIFY `rmsa_block_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------


-- This table will host details of all sub districts 

CREATE TABLE IF NOT EXISTS `rmsa_sub_districts` (
  `rmsa_sub_district_id` bigint(20) NOT NULL,
  `rmsa_sub_district_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of the Sub District',
  `rmsa_sub_district_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the sub district',
  `rmsa_sub_district_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nomenclature for SUb District Tehsil, Taluk, Devision',
  `rmsa_sub_district_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path of the file',
  `rmsa_sub_district_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_state_id` bigint(20) NOT NULL COMMENT 'Foreign key for State',
  `rmsa_district_id` bigint(20) NOT NULL COMMENT 'Foreign key for District',
  `rmsa_block_id` bigint(20) NOT NULL COMMENT 'Foreign key for Block',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_sub_districts`
--
ALTER TABLE `rmsa_sub_districts`
  ADD PRIMARY KEY (`rmsa_sub_district_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_sub_districts`
--
ALTER TABLE `rmsa_sub_districts`
  MODIFY `rmsa_sub_district_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------


-- This table will host details of all Towns 

CREATE TABLE IF NOT EXISTS `rmsa_towns` (
  `rmsa_town_id` bigint(20) NOT NULL,
  `rmsa_town_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of the Town',
  `rmsa_town_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Town type MC , NP, NPP',
  `rmsa_town_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the Town',
  `rmsa_town_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path of the file',
  `rmsa_town_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_state_id` bigint(20) NOT NULL COMMENT 'Foreign key for State',
  `rmsa_district_id` bigint(20) NOT NULL COMMENT 'Foreign key for District',
  `rmsa_block_id` bigint(20) NOT NULL COMMENT 'Foreign key for Block',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_towns`
--
ALTER TABLE `rmsa_towns`
  ADD PRIMARY KEY (`rmsa_town_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_towns`
--
ALTER TABLE `rmsa_towns`
  MODIFY `rmsa_town_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------


-- This table will host details of all Villages 

CREATE TABLE IF NOT EXISTS `rmsa_villages` (
  `rmsa_village_id` bigint(20) NOT NULL,
  `rmsa_village_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of the Village',
  `rmsa_village_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Village type Hard , General Remote',
  `rmsa_village_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Desctiption for the Village',
  `rmsa_village_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path of the file',
  `rmsa_village_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_state_id` bigint(20) NOT NULL COMMENT 'Foreign key for State',
  `rmsa_district_id` bigint(20) NOT NULL COMMENT 'Foreign key for District',
  `rmsa_block_id` bigint(20) NOT NULL COMMENT 'Foreign key for Block',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_villages`
--
ALTER TABLE `rmsa_villages`
  ADD PRIMARY KEY (`rmsa_village_id`);
  
--
-- AUTO_INCREMENT for table `rmsa_villages`
--
ALTER TABLE `rmsa_villages`
  MODIFY `rmsa_village_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------



--
-- Table structure for table `rmsa_categories`
--

CREATE TABLE IF NOT EXISTS `rmsa_categories` (
  `category_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Category Type for Category if they need to be grouped.',
  `category_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `rmsa_categories` (`category_code`, `category_title`, `category_description`, `category_type`, `category_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('SEMI-URBAN', 'Semi Urban', 'Semi Urban', 'VILAGE_TYP', 'A', 'system', '2017-07-23 13:10:08', NULL, '2017-12-14 18:51:13'),
('RURAL', 'Rural', 'Rural', 'VILAGE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('BACKWARD', 'Rural', 'Rural', 'VILAGE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('MUN-CORP', 'Municipal Corporation', 'Municipal Corporation', 'TOWN_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('MUN-COMM', 'Municipal Committee', 'Municipality or Nagar Palika or Nagar Parishad', 'TOWN_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('NAC-NP', 'Notified Area Council', 'Notified Area Council or City Council', 'TOWN_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('TEHSIL', 'Tehsil', 'Municipal Corporation', 'DISTT_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('TALUK', 'Taluk', 'Municipality or Nagar Palika or Nagar Parishad', 'DISTT_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('PRIMARY', 'Primary School', 'Primary School', 'SCHOOL_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('MIDDLE', 'Middle School', 'Middle School', 'SCHOOL_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('HIGH', 'High School', 'High Schol', 'SCHOOL_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('SECONDRY', 'Secondary School', 'Secondry school', 'SCHOOL_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('WINTER-CLOSE', 'Winter Closing', 'Winter Closing', 'SESSON_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('SUMMER-CLOSE', 'Summer Closing', 'Summer Closing', 'SESSON_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('PDF', 'PDF File', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('MS-WORD', 'Wod Document', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('MS-PPT', 'Powerpoint Slides', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('IMG-JPG', 'Image JPG', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('VIDEO-MP4', 'Video MP4', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('AUDIO-MP3', 'Audio MP3', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('AUDIO-MP3', 'Audio MP3', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('AUDIO-MP3', 'Audio MP3', 'Pdf file', 'UPFILE_TYP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('BIOLOGY-GRP', 'Biology', 'Biology', 'UPFILE_GRP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('CHEMISTRY-GRP', 'Chemistry', 'Chemistry', 'UPFILE_GRP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('PHYSICS-GRP', 'Physics', 'Physics', 'UPFILE_GRP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('MATHS-GRP', 'Physics', 'Physics', 'UPFILE_GRP', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('SHORT-NOTES', 'Short Notes', 'Short Notes', 'UPFILE_CAT', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('NUMERICAL-PROBS', 'Numerical Problems', 'Numerical Problems', 'UPFILE_CAT', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28'),
('PRACTICAL-EXAMPLES', 'Practical Examples', 'Practical Examples', 'UPFILE_CAT', 'A', 'system', '2017-12-12 17:40:28', NULL, '2017-12-12 17:40:28');
