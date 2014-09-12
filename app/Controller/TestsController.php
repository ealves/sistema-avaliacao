<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'selenium', array('file' => 'Testing/Testing/Selenium.php'));
class TestsController extends AppController
{

    public function index(){
        $this->autoRender = false;
//        echo phpinfo();
        $selenium = new Testing_Selenium('chrome', 'http://cpa.cesufoz.edu.br');
        $selenium->start();
//        $selenium->getTitle('CPA'); // Qual é a URL que ele vai usar
        $selenium->type("UserPassword", '362476');
        $selenium->stop();
//        $this->setUp();
        //$this->testTitle();
    }
    public function setUp()
    {
        $this->selenium->setBrowser('firefox'); // indicando qual browser ele vai usar
        $this->selenium->setBrowserUrl('http://cpa.cesufoz.edu.br'); // Qual é a URL que ele vai usar
    }

    public function testTitle()
    {
        $this->open('/'); // Com base no setBrowserURL
        $this->assertTitle('CPA'); // Verificando se o títuo é este
    }
}
