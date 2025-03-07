<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cities->find();
        $cities = $this->paginate($query);

        $this->set(compact('cities'));
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->Cities->get($id, contain: ['Trips']);
        $this->set(compact('city'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $city = $this->Cities->newEmptyEntity();
    if ($this->request->is('post')) {
        $city = $this->Cities->patchEntity($city, $this->request->getData(), [
            'associated' => ['Trips']
        ]);

        if ($this->Cities->save($city)) {
            $this->Flash->success(__('City added'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Impossible to add the city'));
    }

    $trips = $this->Cities->Trips->find('list', [
        'keyField' => 'id',
        'valueField' => 'name'
    ])->toArray();

    $this->set(compact('city', 'trips'));
}


    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->Cities->get($id, contain: ['Trips']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $trips = $this->Cities->Trips->find('list', limit: 200)->all();
        $this->set(compact('city', 'trips'));
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
