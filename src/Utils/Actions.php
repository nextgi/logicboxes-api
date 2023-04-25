<?php

namespace nextgi\LogicBoxes\Utils;

use Exception;
use nextgi\LogicBoxes\Helper;

/**
 * Class Actions
 *
 * @package nextgi\LogicBoxes\Utils
 */
class Actions
{
    use Helper;

    /**
     * @var string
     */
    protected $api = 'actions';

    /**
     * @param array $eaqIds        Array of Integers
     * @param array $orderIds      Array of Integers
     * @param array $entityTypeIds Array of Integers
     * @param array $actionStatus  Array of Strings
     * @param array $actionType    Array of Strings
     * @param int   $noOfRecords
     * @param int   $pageNo
     *
     * @return Exception|array
     * @throws Exception
     * @link https://manage.logicboxes.com/kb/node/908
     */
    public function current(
        array $eaqIds = [],
        array $orderIds = [],
        array $entityTypeIds = [],
        array $actionStatus = [],
        array $actionType = [],
        $noOfRecords = 10,
        $pageNo = 1
    ) {
        $dataToSend = $this->fillParameters(
            [
                'no-of-records'  => $noOfRecords,
                'page-no'        => $pageNo,
                'eaq-id'         => $eaqIds,
                'order-id'       => $orderIds,
                'entity-type-id' => $entityTypeIds,
                'action-status'  => $actionStatus,
                'action-type'    => $actionType,
            ]
        );

        return $this->get('search-current', $dataToSend);
    }

    /**
     * @param array $eaqIds        Array of Integers
     * @param array $orderIds      Array of Integers
     * @param array $entityTypeIds Array of Integers
     * @param array $actionStatus  Array of Strings
     * @param array $actionType    Array of Strings
     * @param int   $noOfRecords
     * @param int   $pageNo
     *
     * @return Exception|array
     * @throws Exception
     * @link https://manage.logicboxes.com/kb/node/909
     */
    public function archived(
        array $eaqIds = [],
        array $orderIds = [],
        array $entityTypeIds = [],
        array $actionStatus = [],
        array $actionType = [],
        $noOfRecords = 10,
        $pageNo = 1
    ) {
        $dataToSend = $this->fillParameters(
            [
                'no-of-records'  => $noOfRecords,
                'page-no'        => $pageNo,
                'eaq-id'         => $eaqIds,
                'order-id'       => $orderIds,
                'entity-type-id' => $entityTypeIds,
                'action-status'  => $actionStatus,
                'action-type'    => $actionType,
            ]
        );

        return $this->get('search-archived', $dataToSend);
    }
}