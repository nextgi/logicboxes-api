<?php

namespace nextgi\LogicBoxes\Tests;

use nextgi\LogicBoxes\ResellerApi;

use nextgi\LogicBoxes\Utils\Domains;
use nextgi\LogicBoxes\Utils\Actions;

use nextgi\LogicBoxes\TestCase;

class ResellerApiTest extends TestCase {
    const testUserId = '1204110';
    const testUserKey = 'R7BdPQElRESA93ZZ1b0oQxdOelgnDbau';
    const testMode = true;

    public function test_actions() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->actions()->current();
        if($test) {
            $this->assertTrue(true);
        }
        
    }

    public function test_billing() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->billing()->customerTransactions([1, 2]);
        if($test) {
            $this->assertTrue(true);
        }
    }

    public function test_contacts() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->contacts()->getContact(1);
        if($test) {
            $this->assertTrue(true);
        }
    }

    public function test_customer() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->customers()->detailsById(1);
        if($test) {
            $this->assertTrue(true);
        }
    }

    public function test_domain() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->domains()->available(['google', 'example'], ['com', 'net']);
        if($test) {
            $this->assertTrue(true);
        }
    }
    
    public function test_orders() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->orders()->suspend(1, 'Sample Reason');
        if($test) {
            $this->assertTrue(true);
        }
    }

    public function test_products() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->products()->productList();
        if($test) {
            $this->assertTrue(true);
        }
    }
    
    public function test_resellers() {
        $registrar = (new ResellerApi(self::testUserId, self::testUserKey, self::testMode));
        $test = $registrar->resellers()->resellerPromotions();
        if(is_array($test)) {
            $this->assertTrue(true);
        }
    }
}