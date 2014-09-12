<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AjaxController extends Controller {

    public function rate(){
        $this->autoRender = false;
        $this->loadModel('TempRate');
        $this->TempRate->create();
        $data['TempRate'] = $this->request->data;
        $data['TempRate']['hash'] = $this->Session->read('Hash');
        //var_dump($data);
        $this->TempRate->save($data);
        echo json_encode($this->TempRate->getLastInsertID());
    }

    public function comment(){
        $this->autoRender = false;
        $this->loadModel('Comment');
        $this->Comment->create();
        $data['Comment'] = $this->request->data;
        $this->Comment->save($data);
    }

    public function validateVotes(){
        $this->autoRender = false;
        $this->loadModel('TempRate');
        $this->loadModel('Voter');
        $this->loadModel('Rate');

        $votes = $this->TempRate->find('all', array('fields' => array(
                                                                'evaluation_period_id', 'questionary_id', 'question_id', 'subject_id', 'course_id', 'grade', 'rate'),
                                                                'conditions' => array(
                                                                                'hash' => $this->Session->read('Hash')
                                                                                )
                                                                )
                                              );

        $data = array();
        foreach($votes as $k => $v)
        {
            $data[] = array('Rate' => $votes[$k]['TempRate']);
            unset($votes[$k]);
        }
        //print_r($data);
        $this->Rate->create();
        $this->Rate->saveAll($data);

        //$this->TempRate->deleteAll(array('hash' => $this->Session->read('Hash')));


        $this->Voter->create();
        $this->Voter->save(array('Voter' => array('user_id' => $this->Session->read('idUser'), 'datetime' => date('Y-m-d H:i:s'))));
        //$this->Voter->save(array('user_id' => $this->Session->read('User')));

        $this->Session->delete('Hash');
    }
}
