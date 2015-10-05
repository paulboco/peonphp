<?php

return array(
    "CREATE TABLE IF NOT EXISTS `peons` (
        `id` int(10) unsigned NOT NULL,
        `name` varchar(100) NOT NULL,
        `rating` int(11) NOT NULL DEFAULT '0'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;",

    "ALTER TABLE `peons` ADD PRIMARY KEY (`id`);",

    "ALTER TABLE `peons` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;",
);
