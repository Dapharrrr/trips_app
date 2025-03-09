<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Modifier l\'Utilisateur'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Supprimer l\'Utilisateur'), ['action' => 'delete', $user->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Liste des Utilisateurs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouvel Utilisateur'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom d\'utilisateur') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Voyage') ?></th>
                    <td><?= $user->hasValue('trip') ? $this->Html->link($user->trip->name, ['controller' => 'Trips', 'action' => 'view', $user->trip->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Créé le') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifié le') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>