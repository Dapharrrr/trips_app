<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Modifier le Voyage'), ['action' => 'edit', $trip->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Supprimer le Voyage'), ['action' => 'delete', $trip->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $trip->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Liste des Voyages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouveau Voyage'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="trips view content">
            <h3><?= h($trip->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($trip->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trip->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Créé le') ?></th>
                    <td><?= h($trip->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifié le') ?></th>
                    <td><?= h($trip->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Villes associées') ?></h4>
                <?php if (!empty($trip->cities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nom') ?></th>
                            <th><?= __('Pays') ?></th>
                            <th><?= __('Créé le') ?></th>
                            <th><?= __('Modifié le') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($trip->cities as $city) : ?>
                        <tr>
                            <td><?= h($city->id) ?></td>
                            <td><?= h($city->name) ?></td>
                            <td><?= h($city->country) ?></td>
                            <td><?= h($city->created) ?></td>
                            <td><?= h($city->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Cities', 'action' => 'view', $city->id]) ?>
                                <?= $this->Html->link(__('Modifier'), ['controller' => 'Cities', 'action' => 'edit', $city->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Cities', 'action' => 'delete', $city->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $city->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Utilisateurs associés') ?></h4>
                <?php if (!empty($trip->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nom d\'utilisateur') ?></th>
                            <th><?= __('Id du Voyage') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($trip->users as $user) : ?>
                        <tr>
                            <td><?= h($user->id) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->trip_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Modifier'), ['controller' => 'Users', 'action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $user->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>