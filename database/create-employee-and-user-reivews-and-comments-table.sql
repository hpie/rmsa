--
-- Database: `rmsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `rmsa_file_reviews`
--

CREATE TABLE `rmsa_file_reviews` (
 `rmsa_review_id` bigint(20) NOT NULL AUTO_INCREMENT,
 `rmsa_user_id` bigint(20) NOT NULL,
 `rmsa_uploaded_file_id` bigint(20) NOT NULL,
 `rmsa_file_rating` int(5) NOT NULL,
 `rmsa_review_status` int(1) NOT NULL,
 `created_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
 PRIMARY KEY (`rmsa_review_id`),
 KEY `idx_rmsa_file_reviews_user_id` (`rmsa_user_id`),
 KEY `idx_rmsa_file_reviews_file_rating` (`rmsa_file_rating`),
 KEY `idx_rmsa_file_reviews_uploaded_file_id` (`rmsa_uploaded_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `rmsa_review_comments`
--

CREATE TABLE IF NOT EXISTS `rmsa_review_comments` (
  `rmsa_review_comment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rmsa_user_id` bigint(20) NOT NULL,
  `rmsa_user_type` int(1) NOT NULL COMMENT '1 = STUDENT ,2 = EMPLOYEE',
  `rmsa_uploaded_file_id` bigint(20) NOT NULL,
  `rmsa_file_comment` text NOT NULL COMMENT 'store rmsa_uploaded_file_id',
  `reply_on` bigint(20) NOT NULL,
  `comment_type` int(1) NOT NULL COMMENT '1= comment,2= reply of the comment',
  `comment_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`rmsa_review_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `rmsa_user_file_views`
--

CREATE TABLE `rmsa_user_file_views` (
 `rmsa_file_view_id` bigint(20) NOT NULL AUTO_INCREMENT,
 `rmsa_user_id` bigint(20) NOT NULL,
 `rmsa_uploaded_file_id` bigint(20) NOT NULL,
 `rmsa_file_view_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
 PRIMARY KEY (`rmsa_file_view_id`),
 KEY `idx_rmsa_user_file_views_user_id` (`rmsa_user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
