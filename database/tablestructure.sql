--
-- Table structure for table `rmsa_book_links`
--

CREATE TABLE IF NOT EXISTS `rmsa_book_links` (
  `rmsa_book_links_id` bigint(20) NOT NULL,
  `book_isbn` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ISBN number of the book',
  `book_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title of the book',
  `book_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL of the book',
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
  ADD PRIMARY KEY (`rmsa_book_links_id`),
  ADD UNIQUE KEY `book_links_isbn_uk` (`book_isbn`);
  
--
-- AUTO_INCREMENT for table `rmsa_book_links`
--
ALTER TABLE `rmsa_book_links`
  MODIFY `rmsa_book_links_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------




--
-- Table structure for table `rmsa_uploaded_files`
--

CREATE TABLE IF NOT EXISTS `rmsa_uploaded_files` (
  `rmsa_uploaded_files_id` bigint(20) NOT NULL,
  `uploaded_file_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pdf, doc, jpeg, ppt, excel, mp4',
  `uploaded_file_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pdf, doc, jpeg, ppt, excel, mp4',
  `uploaded_file_lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ENGLISH HINDI',
  `uploaded_file_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pdf, doc, jpeg, ppt, excel, mp4',
  `uploaded_file_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path of the file',
  `uploaded_file_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_class_id`  bigint(20) NOT NULL COMMENT 'Foerign Key of Class Master table',
  `rmsa_subject_id`  bigint(20) NOT NULL COMMENT 'Foerign Key of Subject Master table',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `rmsa_uploaded_files`
--
ALTER TABLE `rmsa_uploaded_files`
  ADD PRIMARY KEY (`rmsa_uploaded_files_id`),
  ADD UNIQUE KEY `uploaded_file_link_uk` (`uploaded_file_link`);
  
--
-- AUTO_INCREMENT for table `rmsa_uploaded_files`
--
ALTER TABLE `rmsa_uploaded_files`
  MODIFY `rmsa_uploaded_files_id` bigint(20) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------