<?php
/**
 * Created by PhpStorm.
 * User: Marijus
 * Date: 3/20/14
 * Time: 11:22 AM
 */

namespace Plugin\GridCustomField;

/**
 * Extend default GridController and provide config method.
 * Class AdminController
 * @package Plugin\GridCustomField
 */
class AdminController extends \Ip\GridController
{
    protected  function config(){
        return array(
            'title' => 'Custom field example',
            'table' => 'grid_custom_field',
            'fields' => array(
                array( //just basic text field
                    'type' => 'Text',
                    'label' => 'Title',
                    'field' => 'title',
                ),
                array( //our custom OnOff field
                    'type' => 'Plugin\GridCustomField\GridOnOffField',
                    'label' => 'Something OF or OFF',
                    'field' => 'on_off',
                )
            )

        );
    }

}
