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
        $trip = $this->Trips->get($id, [
            'contain' => [
                'Users' => function ($q) {
                    return $q->select(['id', 'username', 'created', 'modified', 'trip_id']);
                },
                'Cities' => function ($q) {
                    return $q->select(['id', 'name', 'country', 'created', 'modified']);
                }
            ]
        ]);
        
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
            // Récupérer les données du formulaire
            $data = $this->request->getData();
    
            // Associer l'utilisateur (user_id) et les villes (cities)
            $trip = $this->Trips->patchEntity($trip, $data, [
                'associated' => ['Users', 'Cities']
            ]);
    
            // Sauvegarder le voyage dans la base de données
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the trip.'));
        }
    
        // Récupérer la liste des utilisateurs et des villes pour les afficher dans le formulaire
        $users = $this->Trips->Users->find('list', [
            'keyField' => 'id',
            'valueField' => 'username'
        ])->toArray();
    
        $cities = $this->Trips->Cities->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->toArray();
    
        $this->set(compact('trip', 'users', 'cities'));
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
