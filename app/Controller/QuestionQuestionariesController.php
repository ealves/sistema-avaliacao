<?php
App::uses('AppController', 'Controller');
/**
 * QuestionQuestionaries Controller
 *
 * @property QuestionQuestionary $QuestionQuestionary
 */
class QuestionQuestionariesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuestionQuestionary->recursive = 0;
		$this->set('questionQuestionaries', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuestionQuestionary->exists($id)) {
			throw new NotFoundException(__('Invalid question questionary'));
		}
		$options = array('conditions' => array('QuestionQuestionary.' . $this->QuestionQuestionary->primaryKey => $id));
		$this->set('questionQuestionary', $this->QuestionQuestionary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuestionQuestionary->create();
			if ($this->QuestionQuestionary->save($this->request->data)) {
				$this->Session->setFlash(__('The question questionary has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question questionary could not be saved. Please, try again.'));
			}
		}
		$questions = $this->QuestionQuestionary->Question->find('list');
		$questionaries = $this->QuestionQuestionary->Questionary->find('list');
		$this->set(compact('questions', 'questionaries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QuestionQuestionary->exists($id)) {
			throw new NotFoundException(__('Invalid question questionary'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionQuestionary->save($this->request->data)) {
				$this->Session->setFlash(__('The question questionary has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question questionary could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionQuestionary.' . $this->QuestionQuestionary->primaryKey => $id));
			$this->request->data = $this->QuestionQuestionary->find('first', $options);
		}
		$questions = $this->QuestionQuestionary->Question->find('list');
		$questionaries = $this->QuestionQuestionary->Questionary->find('list');
		$this->set(compact('questions', 'questionaries'));
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
		$this->QuestionQuestionary->id = $id;
		if (!$this->QuestionQuestionary->exists()) {
			throw new NotFoundException(__('Invalid question questionary'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuestionQuestionary->delete()) {
			$this->Session->setFlash(__('Question questionary deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question questionary was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
