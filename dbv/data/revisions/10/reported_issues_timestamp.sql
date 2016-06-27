ALTER TABLE `hcmp_rtk`.`reported_issues` 
ADD COLUMN `submission_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() AFTER `image_path`;
