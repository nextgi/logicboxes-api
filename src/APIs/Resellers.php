<?php

namespace nextgi\LogicBoxes\APIs;

use Exception;
use nextgi\LogicBoxes\Helper;

/**
 * Class Resellers
 *
 * @package nextgi\LogicBoxes\APIs
 */
class Resellers
{
    use Helper;

    protected $api = 'resellers';

    /**
     * Get reseller promotions
     *
     * @return array|Exception
     * @throws Exception
     * @link https://manage.logicboxes.com/kb/node/823
     * @todo Add optional parameters
     */
    public function resellerPromotions()
    {
        return $this->get('promo-details');
    }
}
