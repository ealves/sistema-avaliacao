<?php
App::uses('AppController', 'Controller');
/**
 * QuestionsQuestionaries Controller
 *
 * @property QuestionsQuestionary $QuestionsQuestionary
 */
class QuestionsQuestionariesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuestionsQuestionary->recursive = 0;
		$this->set('questionsQuestionaries', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuestionsQuestionary->exists($id)) {
			throw new NotFoundException(__('Invalid questions questionary'));
		}
		$options = array('conditions' => array('QuestionsQuestionary.' . $this->QuestionsQuestionary->primaryKey => $id));
		$this->set('questionsQuestionary', $this->QuestionsQuestionary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuestionsQuestionary->create();
			if ($this->QuestionsQuestionary->save($this->request->data)) {
				$this->Session->setFlash(__('The questions questionary has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questions questionary could not be saved. Please, try again.'));
			}
		}
		$questions = $this->QuestionsQuestionary->Question->find('list');
		$questionaries = $this->QuestionsQuestionary->Questionary->find('list');
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
		if (!$this->QuestionsQuestionary->exists($id)) {
			throw new NotFoundException(__('Invalid questions questionary'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionsQuestionary->save($this->request->data)) {
				$this->Session->setFlash(__('The questions questionary has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questions questionary could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionsQuestionary.' . $this->QuestionsQuestionary->primaryKey => $id));
			$this->request->data = $this->QuestionsQuestionary->find('first', $options);
		}
		$questions = $this->QuestionsQuestionary->Question->find('list');
		$questionaries = $this->QuestionsQuestionary->Questionary->find('list');
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
		$this->QuestionsQuestionary->id = $id;
		if (!$this->QuestionsQuestionary->exists()) {
			throw new NotFoundException(__('Invalid questions questionary'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuestionsQuestionary->delete()) {
			$this->Session->setFlash(__('Questions questionary deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Questions questionary was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
