<?php
App::uses('AppController', 'Controller');
/**
 * EvaluationPeriods Controller
 *
 * @property EvaluationPeriod $EvaluationPeriod
 */
class EvaluationPeriodsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EvaluationPeriod->recursive = 0;
		$this->set('evaluationPeriods', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EvaluationPeriod->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation period'));
		}
		$options = array('conditions' => array('EvaluationPeriod.' . $this->EvaluationPeriod->primaryKey => $id));
		$this->set('evaluationPeriod', $this->EvaluationPeriod->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EvaluationPeriod->create();
			if ($this->EvaluationPeriod->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation period has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation period could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EvaluationPeriod->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation period'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EvaluationPeriod->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation period has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation period could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EvaluationPeriod.' . $this->EvaluationPeriod->primaryKey => $id));
			$this->request->data = $this->EvaluationPeriod->find('first', $options);
		}
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
		$this->EvaluationPeriod->id = $id;
		if (!$this->EvaluationPeriod->exists()) {
			throw new NotFoundException(__('Invalid evaluation period'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EvaluationPeriod->delete()) {
			$this->Session->setFlash(__('Evaluation period deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Evaluation period was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
