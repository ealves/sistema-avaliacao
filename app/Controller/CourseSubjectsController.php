<?php
App::uses('AppController', 'Controller');
/**
 * CourseSubjects Controller
 *
 * @property CourseSubject $CourseSubject
 */
class CourseSubjectsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CourseSubject->recursive = 0;
		$this->set('courseSubjects', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CourseSubject->exists($id)) {
			throw new NotFoundException(__('Matéria inválida'));
		}
		$options = array('conditions' => array('CourseSubject.' . $this->CourseSubject->primaryKey => $id));
		$this->set('courseSubject', $this->CourseSubject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = 0) {
		if ($this->request->is('post')) {
			$this->CourseSubject->create();
			if ($this->CourseSubject->save($this->request->data)) {
				$this->Session->setFlash(__('Matéria incluída ao curso com sucesso'));
				$this->redirect(array('controller' => 'courses', 'action' => 'view', $this->request->data['CourseSubject']['course_id']));
			} else {
				$this->Session->setFlash(__('Erro ao incluir matéria. Por favor, tente nomente.'));
			}
		}
		$courses = $this->CourseSubject->Course->find('list');
		$subjects = $this->CourseSubject->Subject->find('list');
        $users = $this->CourseSubject->User->find('list', array('conditions' => array('role_id !=' => 4)));
		$this->set(compact('courses', 'subjects', 'users'));

        $this->set('course_id', $id);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CourseSubject->exists($id)) {
			throw new NotFoundException(__('Matéria inválida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CourseSubject->save($this->request->data)) {
				$this->Session->setFlash(__('Matéria do curso alterada com sucesso'));
                $this->redirect(array('controller' => 'courses', 'action' => 'view', $this->request->data['CourseSubject']['course_id']));
			} else {
				$this->Session->setFlash(__('Erro ao incluir matéria do curso. Por favor, tente nomente.'));
			}
		} else {
			$options = array('conditions' => array('CourseSubject.' . $this->CourseSubject->primaryKey => $id));
			$this->request->data = $this->CourseSubject->find('first', $options);
		}
		$courses = $this->CourseSubject->Course->find('list');
		$subjects = $this->CourseSubject->Subject->find('list');
        $users = $this->CourseSubject->User->find('list', array('conditions' => array('role_id !=' => 4)));
        $this->set(compact('courses', 'subjects', 'users'));
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
		$this->CourseSubject->id = $id;
		if (!$this->CourseSubject->exists()) {
			throw new NotFoundException(__('Matéria do curso inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CourseSubject->delete()) {
			$this->Session->setFlash(__('Matéria do curso excluída'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Matéria do curso não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
