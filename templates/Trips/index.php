<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Trip> $trips
 */
?>
<div class="trips index content">
    <?= $this->Html->link(__('Nouveau Voyage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Voyages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nom') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Créé le') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modifié le') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trips as $trip): ?>
                <tr>
                    <td><?= $this->Number->format($trip->id) ?></td>
                    <td><?= h($trip->name) ?></td>
                    <td><?= h($trip->created) ?></td>
                    <td><?= h($trip->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $trip->id]) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $trip->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $trip->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $trip->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('premier')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('dernier') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, affichage de {{current}} enregistrement(s) sur {{count}} au total')) ?></p>
    </div>
</div>