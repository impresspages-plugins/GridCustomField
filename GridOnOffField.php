<?php
/**
 * @package   ImpressPages
 */


/**
 * This is a GridField class that tells to Grid how general OnOff field has to be used in GRID
 */

namespace Plugin\GridCustomField;


class GridOnOffField extends \Ip\Internal\Grid\Model\Field
{



    /**
     * Generate field value preview for table view. HTML is allowed
     * @param array() $data current record data
     * @return string
     */
    public function preview($recordData)
    {
        if ($recordData[$this->field]) {
            return 'On';
        } else {
            return 'Off';
        }
    }


    /**
     * Return an object which can be used as a field for standard Ip\Form class.
     * @return \Ip\Form\Field
     */
    public function createField()
    {
        $field = new \Plugin\CustomFormField\OnOffField(array(
            'label' => $this->label,
            'name' => $this->field
        ));
        $field->setValue($this->defaultValue);
        return $field;
    }

    /**
     * Grid doesn't put user's input directly into the database. Each field type decides how to process
     * submitted data. Use this method to process submitted data and return associative array of values to be
     * stored to the database. If you need to do some other actions on other tables or process files after new
     * record has been created, use onCreate method.
     * @param $postData user posted data
     * @return array
     */
    public function createData($postData)
    {
        if (isset($postData[$this->field])) {
            return array($this->field => (int)$postData[$this->field]);
        }
        return array();
    }

    /**
     * Return an object which can be used as a field for standard Ip\Form class.
     * @param $curData current record data
     * @return \Ip\Form\Field
     */
    public function updateField($curData)
    {
        $field = new \Plugin\CustomFormField\OnOffField(array(
            'label' => $this->label,
            'name' => $this->field
        ));
        $field->setValue($curData[$this->field]);
        return $field;
    }

    /**
     * Grid doesn't put user's input directly into the database. Each field type decides how to process
     * submitted data. Use this method to process submitted data and return associative array of values to be
     * stored to the database. If you need to do some other actions on other tables or process files after update, use onUpdate method.
     * @param $postData user posted data
     * @return array
     */
    public function updateData($postData)
    {
        return array($this->field => (int)$postData[$this->field]);
    }

    /**
     * Return an object which can be used as a field for standard Ip\Form class.
     * @param array $searchVariables current search filter values
     * @return \Ip\Form\Field
     */
    public function searchField($searchVariables)
    {
        $field = new \Plugin\CustomFormField\OnOffField(array(
            'label' => $this->label,
            'name' => $this->field
        ));
        if (!empty($searchVariables[$this->field])) {
            $field->setValue($searchVariables[$this->field]);
        }
        return $field;
    }

    /**
     * Process entered search values and provide part of SQL query which can be added in WHERE clause.
     * @param array $searchVariables user's posted search values
     * @return string
     */
    public function searchQuery($searchVariables)
    {
        if (isset($searchVariables[$this->field]) && $searchVariables[$this->field] !== '') {
            return ' `' . $this->field . '` like '.ipDb()->getConnection()->quote('%' . $searchVariables[$this->field] . '%') . '';
        }
    }

}
