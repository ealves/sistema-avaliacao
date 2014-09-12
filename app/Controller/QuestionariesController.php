<?php
App::uses('AppController', 'Controller');
/**
 * Questionaries Controller
 *
 * @property Questionary $Questionary
 */
class QuestionariesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Questionary->recursive = 0;
		$this->set('questionaries', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Questionary->exists($id)) {
			throw new NotFoundException(__('Questinário inválido'));
		}
            $options = array('recursive' => 2, 'conditions' => array('Questionary.' . $this->Questionary->primaryKey => $id));
		$this->set('questionary', $this->Questionary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Questionary->create();
			if ($this->Questionary->save($this->request->data)) {
				$this->Session->setFlash(__('Questinário adicionado com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionary could not be saved. Please, try again.'));
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
		if (!$this->Questionary->exists($id)) {
			throw new NotFoundException(__('Questinário inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Questionary->save($this->request->data)) {
				$this->Session->setFlash(__('Questinário editado com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionary could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Questionary.' . $this->Questionary->primaryKey => $id));
			$this->request->data = $this->Questionary->find('first', $options);
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
		$this->Questionary->id = $id;
		if (!$this->Questionary->exists()) {
			throw new NotFoundException(__('Questinário inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Questionary->delete()) {
			$this->Session->setFlash(__('Questinário excluído'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Questinário não foi excluído'));
		$this->redirect(array('action' => 'index'));
	}

    public function courses(){
        $this->loadModel('Course');

        $courses = $this->Course->find('all');
        $this->set('courses', $courses);
    }

    public function question(){
        if (isset($this->request->query['question_id']))
            $question_id = $this->request->query['question_id'];

        $course_id = $this->request->query['course_id'];

        if (isset($this->request->query['questionary_id']))
            $questionary_id = $this->request->query['questionary_id'];

        $this->loadModel('QuestionaryQuestion');
        $this->loadModel('SubjectsCourse');
        $this->loadModel('Subject');

        if ( $course_id ){

            if (isset($this->request->query['question_id'])){
                $question = $this->QuestionaryQuestion->find('first', array('conditions' => array('question_id' => $question_id)));
            }else{
                $question = $this->QuestionaryQuestion->find('first', array('conditions' => array('questionary_id' => $questionary_id)));
            }

            $questions_neighbors = $this->QuestionaryQuestion->find('neighbors', array('field' => 'id', 'value' => $question['Question']['id'],
                                                                                        'conditions' => array('questionary_id' => $questionary_id)));

            /*$questionaries_neighbors = $this->QuestionaryQuestion->find('neighbors', array('field' => 'id', 'value' => $['Question']['id'],
                                                                        'conditions' => array('questionary_id' => $questionary_id)));*/
            $this->set('questions_neighbors', $questions_neighbors);
            $this->set('question', $question);
            $this->set('questionary_id', $questionary_id);
            $this->set('course_id', $course_id);
            $subjects = $this->Subject->find('all', array('recursive' => 0));
            $this->set('subjects', $subjects);
        }
    }


}
