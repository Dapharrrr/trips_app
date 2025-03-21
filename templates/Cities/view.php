<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Modifier la Ville'), ['action' => 'edit', $city->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Supprimer la Ville'), ['action' => 'delete', $city->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $city->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Liste des Villes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouvelle Ville'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cities view content">
            <h3><?= h($city->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($city->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pays') ?></th>
                    <td><?= h($city->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($city->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Créé le') ?></th>
                    <td><?= h($city->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifié le') ?></th>
                    <td><?= h($city->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Voyages associés') ?></h4>
                <?php if (!empty($city->trips)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nom') ?></th>
                            <th><?= __('Créé le') ?></th>
                            <th><?= __('Modifié le') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($city->trips as $trip) : ?>
                        <tr>
                            <td><?= h($trip->id) ?></td>
                            <td><?= h($trip->name) ?></td>
                            <td><?= h($trip->created) ?></td>
                            <td><?= h($trip->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Trips', 'action' => 'view', $trip->id]) ?>
                                <?= $this->Html->link(__('Modifier'), ['controller' => 'Trips', 'action' => 'edit', $trip->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Trips', 'action' => 'delete', $trip->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $trip->id)]) ?>
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