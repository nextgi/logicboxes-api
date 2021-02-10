<?php

namespace nextgi\LogicBoxes\APIs;

use Exception;
use nextgi\LogicBoxes\Helper;

/**
 * Class Products
 *
 * @package nextgi\LogicBoxes\APIs
 */
class Products
{
    use Helper;

    protected $api = 'products';

    /**
     * Get customer prices
     *
     * @return array|Exception
     * @throws Exception
     * @link https://manage.logicboxes.com/kb/node/864
     * @todo Add optional parameters
     */
    public function customerPrice($cusomerid = "")
    {
        return $this->get('customer-price' , ['customer-id' => $cusomerid]);
    }

    /**
     * Gets the details of the all active product plans of the Reseller.
     *
     * @return array|Exception
     * @throws Exception
     * @link https://resellerclub.webpropanel.com/kb/get-product-plan-details-api
     * @todo Add optional parameters
     */
    public function planDetails($productKey = "")
    {
        return $this->get('plan-details', ['product-key' => $productKey]);
    }

    /**
     * @param string $domainName
     * @param int $existingCustomerId
     * @param int $newCustomerId
     * @param string $defaultContact
     *
     * @return array|Exception
     * @throws Exception
     * @link https://manage.logicboxes.com/kb/node/904
     */
    public function move($domainName, $existingCustomerId, $newCustomerId, $defaultContact = 'oldcontact')
    {
        return $this->post(
            'move',
            [
                'domain-name'          => $domainName,
                'existing-customer-id' => $existingCustomerId,
                'new-customer-id'      => $newCustomerId,
                'default-contact'      => $defaultContact,
            ]
        );
    }
}
