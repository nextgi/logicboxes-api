<?php

namespace nextgi\LogicBoxes\Tests;

use nextgi\LogicBoxes\ResellerApi;

use nextgi\LogicBoxes\Utils\Domains;
use nextgi\LogicBoxes\Utils\Actions;

use nextgi\LogicBoxes\TestCase;

class ResellerApiTest extends TestCase {

    public function test_actions() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj'));
        $registrar->actions()->current();
        $this->assertTrue(true);
    }

    public function test_billing() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj'));
        $registrar->billing()->customerTransactions(1);
        $this->assertTrue(true);
    }

    public function test_contacts() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj'));
        $registrar->contacts()->getContact(1);
        $this->assertTrue(true);
    }

    public function test_customer() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj'));
        $registrar->customers()->detailsById(1);
        $this->assertTrue(true);
    }

    public function test_domain() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj', true));
        $registrar->domains()->available(['google', 'example'], ['com', 'net']);
        $this->assertTrue(true);
    }
    
    public function test_orders() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj', true));
        $registrar->orders()->suspend(1, 'Sample Reason');
        $this->assertTrue(true);
    }

    public function test_products() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj', true));
        $registrar->products()->productList();
        $this->assertTrue(true);
    }
    
    public function test_resellers() {
        $registrar = (new ResellerApi('zharding@nextgi.com','d92N@3sKI9XV1mdj', true));
        $registrar->resellers()->resellerPromotions();
        $this->assertTrue(true);
    }
    
}