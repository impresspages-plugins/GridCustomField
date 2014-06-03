<?php
/**
 * Created by PhpStorm.
 * User: Marijus
 * Date: 3/20/14
 * Time: 11:22 AM
 */

namespace Plugin\GridCustomField;


class AdminController extends \Ip\GridController
{
    protected  function config(){
        return array(
            'title' => 'Custom field example',
            'table' => 'grid_custom_field',
            'fields' => array(
                array(
                    'type' => 'Text',
                    'label' => 'Title',
                    'field' => 'title',
                ),
                array(
                    'type' => 'Plugin\GridCustomField\GridOnOffField',
                    'label' => 'Something OF or OFF',
                    'field' => 'on_off',
                )
            )

        );
    }

}
