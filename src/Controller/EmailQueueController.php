<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmailQueue Controller
 *
 * @property \App\Model\Table\EmailQueueTable $EmailQueue
 */
class EmailQueueController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $emailQueue = $this->paginate($this->EmailQueue);

        $this->set(compact('emailQueue'));
        $this->set('_serialize', ['emailQueue']);
    }

    /**
     * View method
     *
     * @param string|null $id Email Queue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emailQueue = $this->EmailQueue->get($id, [
            'contain' => []
        ]);

        $this->set('emailQueue', $emailQueue);
        $this->set('_serialize', ['emailQueue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emailQueue = $this->EmailQueue->newEntity();
        if ($this->request->is('post')) {
            $emailQueue = $this->EmailQueue->patchEntity($emailQueue, $this->request->data);
            if ($this->EmailQueue->save($emailQueue)) {
                $this->Flash->success(__('The email queue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email queue could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('emailQueue'));
        $this->set('_serialize', ['emailQueue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Email Queue id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emailQueue = $this->EmailQueue->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emailQueue = $this->EmailQueue->patchEntity($emailQueue, $this->request->data);
            if ($this->EmailQueue->save($emailQueue)) {
                $this->Flash->success(__('The email queue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email queue could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('emailQueue'));
        $this->set('_serialize', ['emailQueue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Email Queue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emailQueue = $this->EmailQueue->get($id);
        if ($this->EmailQueue->delete($emailQueue)) {
            $this->Flash->success(__('The email queue has been deleted.'));
        } else {
            $this->Flash->error(__('The email queue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
