<?php
App::uses('AppController', 'Controller');
/**
 * QuestionaryRoles Controller
 *
 * @property QuestionaryRole $QuestionaryRole
 */
class QuestionaryRolesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuestionaryRole->recursive = 0;
		$this->set('questionaryRoles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuestionaryRole->exists($id)) {
			throw new NotFoundException(__('Invalid questionary role'));
		}
		$options = array('conditions' => array('QuestionaryRole.' . $this->QuestionaryRole->primaryKey => $id));
		$this->set('questionaryRole', $this->QuestionaryRole->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuestionaryRole->create();
			if ($this->QuestionaryRole->save($this->request->data)) {
				$this->Session->setFlash(__('The questionary role has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionary role could not be saved. Please, try again.'));
			}
		}
		$questionaries = $this->QuestionaryRole->Questionary->find('list');
		$roles = $this->QuestionaryRole->Role->find('list');
		$this->set(compact('questionaries', 'roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QuestionaryRole->exists($id)) {
			throw new NotFoundException(__('Invalid questionary role'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionaryRole->save($this->request->data)) {
				$this->Session->setFlash(__('The questionary role has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionary role could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionaryRole.' . $this->QuestionaryRole->primaryKey => $id));
			$this->request->data = $this->QuestionaryRole->find('first', $options);
		}
		$questionaries = $this->QuestionaryRole->Questionary->find('list');
		$roles = $this->QuestionaryRole->Role->find('list');
		$this->set(compact('questionaries', 'roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QuestionaryRole->id = $id;
		if (!$this->QuestionaryRole->exists()) {
			throw new NotFoundException(__('Invalid questionary role'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuestionaryRole->delete()) {
			$this->Session->setFlash(__('Questionary role deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Questionary role was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
