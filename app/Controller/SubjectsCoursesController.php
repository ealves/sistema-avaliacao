<?php
App::uses('AppController', 'Controller');
/**
 * SubjectsCourses Controller
 *
 * @property SubjectsCourse $SubjectsCourse
 */
class SubjectsCoursesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SubjectsCourse->recursive = 0;
		$this->set('subjectsCourses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SubjectsCourse->exists($id)) {
			throw new NotFoundException(__('Invalid subjects course'));
		}
		$options = array('conditions' => array('SubjectsCourse.' . $this->SubjectsCourse->primaryKey => $id));
		$this->set('subjectsCourse', $this->SubjectsCourse->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SubjectsCourse->create();
			if ($this->SubjectsCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The subjects course has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subjects course could not be saved. Please, try again.'));
			}
		}
		$courses = $this->SubjectsCourse->Course->find('list');
		$subjects = $this->SubjectsCourse->Subject->find('list');
		$this->set(compact('courses', 'subjects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SubjectsCourse->exists($id)) {
			throw new NotFoundException(__('Invalid subjects course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SubjectsCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The subjects course has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subjects course could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SubjectsCourse.' . $this->SubjectsCourse->primaryKey => $id));
			$this->request->data = $this->SubjectsCourse->find('first', $options);
		}
		$courses = $this->SubjectsCourse->Course->find('list');
		$subjects = $this->SubjectsCourse->Subject->find('list');
		$this->set(compact('courses', 'subjects'));
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
		$this->SubjectsCourse->id = $id;
		if (!$this->SubjectsCourse->exists()) {
			throw new NotFoundException(__('Invalid subjects course'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SubjectsCourse->delete()) {
			$this->Session->setFlash(__('Subjects course deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subjects course was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
