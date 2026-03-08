ALTER TABLE `countries` ADD `population` VARCHAR(255) NOT NULL AFTER `flag_image_path`, ADD `region` VARCHAR(255) NOT NULL AFTER `population`, ADD `ranking` INT NOT NULL AFTER `region`, ADD `famous_players` VARCHAR(255) NOT NULL AFTER `ranking`, ADD `highlights` TEXT NOT NULL AFTER `famous_players`;
-- その後rankingを消した
-- その後idとname以外nullにした

ALTER TABLE `countries` ADD `appearances` VARCHAR(255) NOT NULL AFTER `highlights`;