<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 */
class TripsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Trips->find();
        $trips = $this->paginate($query);

        $this->set(compact('trips'));
    }

    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trip = $this->Trips->get($id, contain: ['Cities', 'Users']);
        $this->set(compact('trip'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $trip = $this->Trips->newEmptyEntity();
    if ($this->request->is('post')) {
        $trip = $this->Trips->patchEntity($trip, $this->request->getData(), [
            'associated' => ['Cities']
        ]);

        if ($this->Trips->save($trip)) {
            $this->Flash->success(__('Trip added'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Impossible to add trip'));
    }

    $cities = $this->Trips->Cities->find('list', [
        'keyField' => 'id',
        'valueField' => 'name'
    ])->toArray();

    $this->set(compact('trip', 'cities'));
}


    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    $trip = $this->Trips->get($id, [
        'contain' => ['Cities']
    ]);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $trip = $this->Trips->patchEntity($trip, $this->request->getData(), [
            'associated' => ['Cities']
        ]);

        if ($this->Trips->save($trip)) {
            $this->Flash->success(__('Trip edited'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Impossible to edit trip'));
    }

    $cities = $this->Trips->Cities->find('list', [
        'keyField' => 'id',
        'valueField' => 'name'
    ])->toArray();

    $this->set(compact('trip', 'cities'));
}


    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
