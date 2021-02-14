<?php

namespace nextgi\LogicBoxes;

use GuzzleHttp\Client as Guzzle;
use nextgi\LogicBoxes\APIs\Actions;
use nextgi\LogicBoxes\APIs\Billing;
use nextgi\LogicBoxes\APIs\Contacts;
use nextgi\LogicBoxes\APIs\Customers;
use nextgi\LogicBoxes\APIs\Domains;
use nextgi\LogicBoxes\APIs\Orders;
use nextgi\LogicBoxes\APIs\Products;
use nextgi\LogicBoxes\APIs\Dns;

/**
 * Class ResellerApi
 *
 * @package nextgi\LogicBoxes
 */
class ResellerApi
{
    const API_URL = 'https://httpapi.com/api/';
    const API_TEST_URL = 'https://test.httpapi.com/api/';

    /**
     * @var Guzzle
     */
    private $guzzle;

    /**
     * List of API classes
     *
     * @var array
     */
    private $apiList = [];

    /**
     * Authentication info needed for every request
     *
     * @var array
     */
    private $authentication = [];

    /**
     * ResellerApi constructor.
     *
     * @param int    $userId
     * @param string $apiKey
     * @param bool   $testMode
     * @param int    $timeout
     * @param string $bindIp
     *
     * @return void
     */
    public function __construct(
        $userId,
        $apiKey,
        $testMode = false,
        $timeout = 0,
        $bindIp = '0'
    ) {
        $this->authentication = [
            'auth-userid' => $userId,
            'api-key'     => $apiKey,
        ];

        $guzzleConfig = [
            'base_uri'        => $testMode ? self::API_TEST_URL : self::API_URL,
            'defaults'        => ['query' => $this->authentication],
            'verify'          => false,
            'connect_timeout' => (float)$timeout,
            'timeout'         => (float)$timeout,
        ];

        if (!empty($bindIp)) {
            $guzzleConfig['curl'] = [CURLOPT_INTERFACE => $bindIp];
            $guzzleConfig['stream_context'] = ['socket' => ['bindto' => $bindIp]];
        }

        $this->guzzle = new Guzzle($guzzleConfig);
    }

    /**
     * @param $api
     *
     * @return mixed
     */
    private function _getAPI($api)
    {
        if (empty($this->apiList[$api])) {
            $class = 'nextgi\\LogicBoxes\\APIs\\'.$api;
            $this->apiList[$api] = new $class(
                $this->guzzle,
                $this->authentication
            );
        }

        return $this->apiList[$api];
    }

    /**
     * @return Resellers
     */
    public function resellers()
    {
        return $this->_getAPI('Resellers');
    }

    /**
     * @return Domains
     */
    public function domains()
    {
        return $this->_getAPI('Domains');
    }

    /**
     * @return Contacts
     */
    public function contacts()
    {
        return $this->_getAPI('Contacts');
    }

    /**
     * @return Customers
     */
    public function customers()
    {
        return $this->_getAPI('Customers');
    }

    /**
     * @return Products
     */
    public function products()
    {
        return $this->_getAPI('Products');
    }

    /**
     * @return Orders
     */
    public function orders()
    {
        return $this->_getAPI('Orders');
    }

    /**
     * @return Billing
     */
    public function billing()
    {
        return $this->_getAPI('Billing');
    }


     /**
     * @return Dns
     */
    public function dns()
    {
        return $this->_getAPI('Dns');
    }

    /**
     * @return Actions
     */
    public function actions()
    {
        return $this->_getAPI('Actions');
    }
}
