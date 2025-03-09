<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 * @var string[]|\Cake\Collection\CollectionInterface $cities
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $trip->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $trip->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Liste des Voyages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="trips form content">
            <?= $this->Form->create($trip) ?>
            <?= $this->Form->control('name', ['label' => 'Nom']) ?>

            <?= $this->Form->control('cities._ids', [
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $cities,
                'label' => 'Villes associées'
            ]) ?>

            <?= $this->Form->button(__('Modifier le voyage')) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>