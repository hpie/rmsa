--
-- Table structure for table `employee_token`
--

CREATE TABLE `employee_token` (
  `id` bigint(20) NOT NULL,
  `rmsa_user_id` bigint(20) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `employee_token`
--
ALTER TABLE `employee_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_token`
--
ALTER TABLE `employee_token`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;


--
-- Table structure for table `student_token`
--

CREATE TABLE `student_token` (
  `id` bigint(20) NOT NULL,
  `rmsa_user_id` bigint(20) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `student_token`
--
ALTER TABLE `student_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_token`
--
ALTER TABLE `student_token`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;


--
-- Table structure for table `teacher_token`
--

CREATE TABLE `teacher_token` (
  `id` bigint(20) NOT NULL,
  `rmsa_user_id` bigint(20) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `teacher_token`
--
ALTER TABLE `teacher_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher_token`
--
ALTER TABLE `teacher_token`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;


--
-- Table structure for table `rmsa_token`
--

CREATE TABLE `rmsa_token` (
  `id` bigint(20) NOT NULL,
  `rmsa_user_id` bigint(20) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `rmsa_token`
--
ALTER TABLE `rmsa_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rmsa_token`
--
ALTER TABLE `rmsa_token`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;