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
App::uses('CakeNumber', 'Utility');
App::uses('CakeTime', 'Utility');

$options = array('before' => false,
    'fractionPosition' => 'after',
    'zero'             => 0,
    'places'           => 2,
    'thousands'        => '.',
    'decimals'         => ',',
    'negative'         => '-',
    'escape'           => true
);
CakeNumber::addFormat('BR', $options);

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'RequestHandler',
        'Session',
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        )
    );

    public $helpers = array('Html', 'Form', 'Session', 'Js');

    public function beforeRender(){

        $this->set('userData', $this->Auth->user());

    }
    function beforeFilter() {

        /*$this->Auth->allow('display');
        $this->Auth->allow();*/

        /*if ( $this->request['controller'] == 'pages' )
            $this->redirect(array('controller' => 'users', 'action' => 'login'));*/
        //exit;

        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'userModel' => 'User',
                'fields' => array(
                    'password' => 'password',
                ),
                'scope' => array(
                    'User.status' => 1,
                ),
            ),
            'Form',
        );

        $this->Auth->loginAction = array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'login',
        );

        $this->Auth->logoutRedirect = array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'login',
        );

        $this->Auth->loginRedirect = array(
            'plugin' => null,
            'controller' => 'bookings',
            'action' => 'index',
        );
        //var_dump($this->request['controller']);
        //if ( $this->request['controller'] )
        $this->Auth->authError = __('Você não possui acesso.');

        if ( $this->Auth->user() AND $this->Auth->user('role_id') == 1 ){
            $this->Auth->allow();
        }else{
            if ( $this->Auth->user() ){
                $roleId = $this->Auth->user('role_id');
                $aro = $this->Acl->Aro->find('first', array(
                    'conditions' => array(
                        'Aro.model' => 'Role',
                        'Aro.foreign_key' => $roleId
                    )
                ));

                $aroId = $aro['Aro']['id'];
//                var_dump($this->name);
                $thisControllerNode = $this->Acl->Aco->node('controllers/' . $this->name);
                if ( $thisControllerNode ){
                    $thisControllerActions = $this->Acl->Aco->find('list', array(
                        'conditions' => array(
                            'Aco.parent_id' => $thisControllerNode[0]['Aco']['id']),
                        'fields' => array(
                            'Aco.id',
                            'Aco.alias'
                        ),
                        'recursive' => '-1'
                    ));
                    $thisControllerActionsIds = array_keys($thisControllerActions);
                    $allowedActions = $this->Acl->Aco->Permission->find('list', array(
                        'conditions' => array(
                            'Permission.aro_id'  => $aroId,
                            'Permission.aco_id'  => $thisControllerActionsIds,
                            'Permission._create' => 1,
                            'Permission._read'   => 1,
                            'Permission._update' => 1,
                            'Permission._delete' => 1
                        ),
                        'fields' => array(
                            'id',
                            'aco_id'
                        ),
                        'recursive' => '-1'
                    ));
                    if ( !$allowedActions )
                    {
                        echo 'ko';
                    }
                    $allowedActionsIds = array_values($allowedActions);

                    $allow = array();
                    if ( isset($allowedActionsIds) AND is_array($allowedActionsIds) AND count($allowedActionsIds) )
                    {
                        foreach($allowedActionsIds as $i => $aId)
                        {
                            $allow[] = $thisControllerActions[$aId];
                        }
                    }

                    $this->Auth->allowedActions = $allow;
                }else{
                    $this->Session->setFlash($this->Auth->authError, 'default', array(), 'auth');
                }
            }
        }
    }
}