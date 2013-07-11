CREATE TABLE IF NOT EXISTS `sdrdis_sl_lists` (
    `list_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `list_title` varchar(255) NOT NULL,
    `list_number_of_words` varchar(255) NOT NULL,
    `list_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `list_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`list_id`),
    KEY `list_created_at` (`list_created_at`),
    KEY `list_updated_at` (`list_updated_at`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `sdrdis_sl_pairs` (
    `pair_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `pair_tt` varchar(255) NOT NULL,
    `pair_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `pair_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`pair_id`),
    KEY `pair_created_at` (`pair_created_at`),
    KEY `pair_updated_at` (`pair_updated_at`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
