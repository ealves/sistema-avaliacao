<?php
App::uses('AppController', 'Controller');
/**
 * TempRates Controller
 *
 * @property TempRate $TempRate
 */
class TempRatesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TempRate->recursive = 0;
		$this->set('tempRates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TempRate->exists($id)) {
			throw new NotFoundException(__('Invalid temp rate'));
		}
		$options = array('conditions' => array('TempRate.' . $this->TempRate->primaryKey => $id));
		$this->set('tempRate', $this->TempRate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TempRate->create();
			if ($this->TempRate->save($this->request->data)) {
				$this->Session->setFlash(__('The temp rate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temp rate could not be saved. Please, try again.'));
			}
		}
		$questionaries = $this->TempRate->Questionary->find('list');
		$questions = $this->TempRate->Question->find('list');
		$subjects = $this->TempRate->Subject->find('list');
		$this->set(compact('questionaries', 'questions', 'subjects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TempRate->exists($id)) {
			throw new NotFoundException(__('Invalid temp rate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TempRate->save($this->request->data)) {
				$this->Session->setFlash(__('The temp rate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temp rate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TempRate.' . $this->TempRate->primaryKey => $id));
			$this->request->data = $this->TempRate->find('first', $options);
		}
		$questionaries = $this->TempRate->Questionary->find('list');
		$questions = $this->TempRate->Question->find('list');
		$subjects = $this->TempRate->Subject->find('list');
		$this->set(compact('questionaries', 'questions', 'subjects'));
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
		$this->TempRate->id = $id;
		if (!$this->TempRate->exists()) {
			throw new NotFoundException(__('Invalid temp rate'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TempRate->delete()) {
			$this->Session->setFlash(__('Temp rate deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Temp rate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
