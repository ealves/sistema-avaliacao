<?php
App::uses('AppController', 'Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 */
class CoursesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Course->recursive = 0;
		$this->set('courses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Curso inválido'));
		}
		$options = array('recursive' => 2, 'conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('Curso adicionado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Curso não foi adicionado. Por favor, tente novamente'));
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
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Curso inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('Curso editado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Curso não foi editado. Por favor, tente novamente'));
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
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
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Curso inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('Curso excluído'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Curso não foi excluído'));
		$this->redirect(array('action' => 'index'));
	}
}
