-- 
-- 
-- SQL-UPDATE
--
-- 
-- 30-05-2023
INSERT INTO `status` (`id`, `name`, `alias`) VALUES ('14', 'Is draft', 'draft');
--
-- 
-- 05-06-2023
ALTER TABLE `companies` ADD COLUMN `code_pin` VARCHAR(12) NULL DEFAULT '0000' AFTER `can_dinein`;
-- 