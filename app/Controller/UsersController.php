<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{
    public $components = array('Paginator');

    public function beforeFilter()
    {
        parent::beforeFilter();

        $q = '';
        $grade = '';
        $course_id = '';

        $conditions = array();
        if($this->request->query('q')){
            $q = $this->request->query['q'];
            $conditions['AND'] = array("User.name LIKE" => "%" . $this->request->query['q'] . "%");
        }

        if($this->request->query('course_id'))
        {
            $conditions['User.course_id'] = $this->request->query('course_id');
            $course_id = $this->request->query('course_id');
        }

        if($this->request->query('grade'))
        {
            $conditions['User.grade'] = $this->request->query('grade');
            $grade = $this->request->query('grade');
        }

        $this->paginate['limit'] = 15;

        $this->paginate['order'] = array('User.name' => 'ASC');

        $this->paginate['conditions'] = array($conditions);

        $this->set('q', $q);
        $this->set('grade', $grade);
        $this->set('course_id', $course_id);
    }

    public $paginate = array();

    public function login()
    {
        if ($this->request->is('post')) {

            $password = strtolower($this->request->data['User']['password']);
            /*var_dump($password);
            var_dump(AuthComponent::password($password));
            exit();*/
            $user = $this->User->findByPassword(AuthComponent::password($password));

            $this->loadModel('Voter');
            $this->loadModel('EvaluationPeriod');

            $period = $this->EvaluationPeriod->find('first', array('order' => array('start' => 'desc')));
            $periodDateStart = strtotime($period['EvaluationPeriod']['start']);
            $periodDateEnd = strtotime($period['EvaluationPeriod']['end']);
            $dateNow = strtotime(date('Y-m-d H:i:s'));
            $periodOfEvaluation = false;

            if($dateNow >= $periodDateStart AND $dateNow <= $periodDateEnd){
                $this->Session->write('evaluation_period_id', $period['EvaluationPeriod']['id']);
                $periodOfEvaluation = true;
            }

            if($user['User']['role_id'] == 4){

                if($periodOfEvaluation){
                    $voter = $this->Voter->find('first', array('conditions' => array('user_id' => $user['User']['id'],
                                                               'datetime >=' => $period['EvaluationPeriod']['start'],
                                                               'datetime <=' => $period['EvaluationPeriod']['end'])));
                    if($voter){
                        $this->Session->setFlash(__('Obrigado por votar!!!'));
                        $this->redirect('/users/login');
                    }
                }else{
                    $this->Session->setFlash(__('Período de avaliação encerrado!!!'));
                    $this->redirect('/users/login');
                }
            }
            $this->Auth->login($user['User']);
            if ($user AND $this->Auth->login($user['User'])) {
                if ($user['User']['role_id'] == 4) {
                    $this->redirect('/evaluation');
                }
                else if ($user['User']['role_id'] == 3) {
                    $this->redirect('/dashboard');
                }
                else {
                    $this->redirect('/dashboard?course_id=' . $user['User']['course_id']);
                }
            } else {
                $this->Session->setFlash(__('Usuário não encontrado'), 'default', array(), 'auth');
            }
        }
        $this->layout = '../Layouts/login';
    }

    public function logout()
    {
        $this->Session->delete('Hash');
        $this->redirect($this->Auth->logout());
        $this->Session->setFlash(__('Deslogado'));
    }

    /**
     * index method
     *
     * @return void
     */

    public function index()
    {
        $this->Paginator->settings = $this->paginate;
        $users = $this->Paginator->paginate('User');
        $this->set('users', $users);

        $opt = array('fields' => array('id', 'name'));
        $courses = $this->User->Course->find('list', $opt);

        $this->set(compact('courses'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário editado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário não foi adicionado. Por favor, tente novamente'));
            }
        }
        $courses = $this->User->Course->find('list');
        $this->set(compact('courses'));

        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            //var_dump($this->request->data);
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário editado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário não foi editado. Por favor, tente novamente'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $courses = $this->User->Course->find('list');
        $this->set(compact('courses'));

        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário excluído'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuário não foi excluído'));
        $this->redirect(array('action' => 'index'));
    }

    public function initDB()
    {
        $group = $this->User->Role;
        //Allow admins to everything
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');
        //allow managers to posts and widgets
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Users/login');
        $this->Acl->allow($group, 'controllers/Users/logout');
        $this->Acl->allow($group, 'controllers/Users/setPass');
        $this->Acl->allow($group, 'controllers/Dashboard');
        //$this->Acl->allow($group, 'controllers/Produtos');

        //allow users to only add and edit on posts and widgets
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Users/login');
        $this->Acl->allow($group, 'controllers/Users/logout');
        $this->Acl->allow($group, 'controllers/Dashboard');
        $this->Acl->allow($group, 'controllers/Evaluation');

        $group->id = 4;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Users/login');
        $this->Acl->allow($group, 'controllers/Users/logout');
        $this->Acl->allow($group, 'controllers/Evaluation');
        $this->Acl->allow($group, 'controllers/Evaluation/index');
        $this->Acl->allow($group, 'controllers/Evaluation/view');
        $this->Acl->allow($group, 'controllers/Evaluation/completed');

        echo "all done";

        exit;
    }

    public function setPass()
    {
        $this->autoRender = false;
        //$users = $this->User->find('all');
        $students = $this->User->find('all', array('conditions' => array('User.role_id' => 4)));
//        $users = $this->User->find('all', array('conditions' => array('User.id' => 162)));

        //var_dump($users);
        //exit;
        //$pass = '0601A1309D1';
        //echo AuthComponent::password($pass);
        $data = array();
        foreach ($students as $s) {
            //$pass = AuthComponent::password($user['User']['funcional']);
            $data['User'] = array('id' => $s['User']['id'],
                'password' => $s['User']['funcional']
            );
            if ($this->User->save($data))
                var_dump($s['User']['id']);
        }
        //var_dump($data);

    }

    public function import()
    {

    }

    public function upload(){
//        var_dump($this->data);
        $filename = null;

        if ($this->request->is('post')){
//            echo 'ok';
            if (!empty($this->request->data['Document']['tmp_name']) AND
                is_uploaded_file($this->request->data['Document']['tmp_name'])){

                // Strip path information
                $filename = WWW_ROOT . 'files' . DS . $this->request->data['Document']['name'];
                if(move_uploaded_file($this->request->data['Document']['tmp_name'], $filename)){

                    $this->loadModel('Course');
                    $courses = $this->Course->find('list', array('fields' => array('id', 'name')));

                    $data = $this->setUpload($this->request->data['Document']['name']);
                    $this->set('filename', $this->request->data['Document']['name']);
                    $this->set('grade', $data['grade']);
                    $this->set('users', $data['users']);

                    $this->set(compact('courses'));
                }
            }

            if(isset($this->request->data['Document']['csv'])){
                $this->setUpload($this->request->data['Document']['csv'],
                                 $this->request->data['course_id'],
                                 $this->request->data['grade'],
                                 TRUE);
            }
            // Set the file-name only to save in the database
            //$this->request->data['Document']['doc_file'] = $filename;
        }
    }

    public function setUpload($filename, $course_id = FALSE, $grade = FALSE, $import = FALSE){

        if($import)
            $this->autoRender = false;

        $users = array();

        // open the file
        $filename = WWW_ROOT . 'files' . DS . $filename;
//        var_dump($filename);
        $handle = fopen($filename, "r");
        if ($handle){

            $student = FALSE;

            while (!feof($handle)) {
                $buffer = fgets($handle, 4096);

                if(preg_match('~curso~i', $buffer)){
                    preg_match('~:(.*)\";~', $buffer, $matches);
                    $course = $matches[1];
                }

                if(preg_match('~turma~i', $buffer)){
                    preg_match('~(\d+)P~', $buffer, $matches);
                    $grade = $matches[1];
                }

                if($student AND $buffer != ''){
                    $line = explode(";", $buffer);
                    $line = str_replace('"', '', $line);

                    $line[0] = strtolower($line[0]);
                    $line[0] = utf8_encode($line[0]);
                    $line[0] = ucwords($line[0]);

                    if($line)
                        $users[]['User'] = array('name'      => $line[0],
                                                 'password'  => strtolower($line[1]),
                                                 'funcional' => strtolower($line[1]),
                                                 'grade'     => $grade,
                                                 'course_id' => $course_id,
                                                 'role_id'   => 4
                                                );
                }

                if(preg_match('~aluno~i', $buffer)){
                    $student = TRUE;
                }
            }
            fclose($handle);
        }
        $data = array('grade' => $grade, 'course' => $course, 'users' => $users);

        if(!$import){
            return $data;
        }else{
            echo 'ok';
            foreach($users as $key => $val)
            {
                /*$val['User']['name'] = strtolower($val['User']['name']);
                $val['User']['name'] = utf8_encode($val['User']['name']);
                $val['User']['name'] = ucwords($val['User']['name']);*/
                var_dump($val['User']['name']);
                var_dump(AuthComponent::password(($val['User']['password'])));
                $result = $this->User->find('first', array('conditions' => array('password' => AuthComponent::password(($val['User']['password'])))));
                if($result)
                    $users[$key]['User']['id'] = $result['User']['id'];
            }
            //var_dump($users);
            if($this->User->saveAll($users)){
                $this->Session->setFlash(__('Usuários importados com sucesso'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}