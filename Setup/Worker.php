<?php

//namespace Plugin\GridExample\Setup;
namespace Plugin\GridCustomField\Setup;

class Worker
{

    public function activate()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS
           ' . ipTable('grid_custom_field') . '
        (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255),
        `on_off` int(1),
        PRIMARY KEY (`id`)
        )';

        ipDb()->execute($sql);

    }

    public function deactivate()
    {

    }

    public function remove()
    {

    }

}
