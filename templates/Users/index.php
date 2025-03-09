<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('Nouvel Utilisateur'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Utilisateurs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username', 'Nom d\'utilisateur') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Créé le') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modifié le') ?></th>
                    <th><?= $this->Paginator->sort('trip_id', 'ID du Voyage') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td><?= $user->hasValue('trip') ? $this->Html->link($user->trip->name, ['controller' => 'Trips', 'action' => 'view', $user->trip->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $user->id)]) ?>
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