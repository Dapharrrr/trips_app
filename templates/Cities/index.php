<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\City> $cities
 */
?>
<div class="cities index content">
    <?= $this->Html->link(__('Nouvelle Ville'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Villes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nom') ?></th>
                    <th><?= $this->Paginator->sort('country', 'Pays') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Créé le') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modifié le') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cities as $city): ?>
                <tr>
                    <td><?= $this->Number->format($city->id) ?></td>
                    <td><?= h($city->name) ?></td>
                    <td><?= h($city->country) ?></td>
                    <td><?= h($city->created) ?></td>
                    <td><?= h($city->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $city->id]) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $city->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $city->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $city->id)]) ?>
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