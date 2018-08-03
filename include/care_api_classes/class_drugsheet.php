<?php

//error_reporting(0);
/**
 * @package care_api
 */
/** */
require_once($root_path . 'include/care_api_classes/class_prescription.php');
//require_once($root_path . 'include/care_api_classes/class_weberp_c2x.php');
//require_once($root_path.'include/care_api_classes/class_diagnostics.php');

/**
 *  Prescription methods.
 *
 * Note this class should be instantiated only after a "$db" adodb  connector object  has been established by an adodb instance
 * @author Elpidio Latorilla
 * @version beta 2.0.1
 * @copyright 2002,2003,2004,2005,2005 Elpidio Latorilla
 * @package care_api
 */
class Drugsheet extends Prescription {
    /*     * #@+
     * @access private
     * @var string
     */

    /**
     * Table name for prescription data
     */
    var $tb = 'care_encounter_drugsheet';

    /*     * #@- */

    /*     * #@+
     * @access private
     */

    /**
     * SQL query result buffer
     * @var adodb record object
     */
    var $result;
    var $sql;

    /**
     * Field names of care_encounter_prescription table
     * @var int
     */
    var $tabfields = array(
        'chart_id',
        'prescr_nr',
        'chart_date',
        'chart_time',
        'amount',
        'status',
        'modify_id',
        'modify_time',
        'create_id',
        'create_time');

    /*     * #@- */

    /**
     * Constructor
     */
    function Drugsheet() {
        $this->setTable($this->tb);
        $this->setRefArray($this->tabfields);
    }

}
