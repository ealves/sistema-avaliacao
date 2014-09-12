<?php
App::uses('AppController', 'Controller');
/**
 * QuestionaryQuestions Controller
 *
 * @property QuestionaryQuestion $QuestionaryQuestion
 */
class QuestionaryQuestionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuestionaryQuestion->recursive = 0;
		$this->set('questionaryQuestions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuestionaryQuestion->exists($id)) {
			throw new NotFoundException(__('Pergunta inválida'));
		}
		$options = array('conditions' => array('QuestionaryQuestion.' . $this->QuestionaryQuestion->primaryKey => $id));
		$this->set('questionaryQuestion', $this->QuestionaryQuestion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = 0) {
//        var_dump($this->request->data);
		if ($this->request->is('post')) {
			$this->QuestionaryQuestion->create();
			if ($this->QuestionaryQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('Pergunta adicionada com sucesso'));
				$this->redirect(array('controller' => 'questionaries', 'action' => 'view', $this->request->data['QuestionaryQuestion']['questionary_id']));
			} else {
				$this->Session->setFlash(__('Pergunta não foi adicionada. Por favor, tente novamente.'));
			}
		}
		$questionaries = $this->QuestionaryQuestion->Questionary->find('list');
		$questions = $this->QuestionaryQuestion->Question->find('list', array('order' => array('name')));
		$this->set(compact('questionaries', 'questions'));
        $this->set('questionary_id', $id);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QuestionaryQuestion->exists($id)) {
			throw new NotFoundException(__('Pergunta inválida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionaryQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The questionary question has been saved'));
				$this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash(__('The questionary question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionaryQuestion.' . $this->QuestionaryQuestion->primaryKey => $id));
			$this->request->data = $this->QuestionaryQuestion->find('first', $options);
		}
		$questionaries = $this->QuestionaryQuestion->Questionary->find('list');
		$questions = $this->QuestionaryQuestion->Question->find('list');
		$this->set(compact('questionaries', 'questions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $questionary_id) {
		$this->QuestionaryQuestion->id = $id;
		if (!$this->QuestionaryQuestion->exists()) {
			throw new NotFoundException(__('Pergunta inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuestionaryQuestion->delete()) {
			$this->Session->setFlash(__('Pergunta excluída'));
            $this->redirect(array('controller' => 'questionaries', 'action' => 'view', $questionary_id));
		}
		$this->Session->setFlash(__('Pergunta não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}

    public function set_questions()
    {
        //$this->autoRender = false;
        $data = array();
        for($i=11;$i<=25;$i++)
        {
            $data[]['QuestionaryQuestion'] = array('questionary_id' => 2, 'question_id' => $i);

        }

        $this->QuestionaryQuestion->saveAll($data);

    }
}
