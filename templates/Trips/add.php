<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 * @var \Cake\Collection\CollectionInterface|string[] $cities
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Trips'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="trips form content">
            <?= $this->Form->create($trip) ?>
            <?= $this->Form->control('name', ['label' => 'Name']) ?>

            <?= $this->Form->control('cities._ids', [
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $cities,
                'label' => 'Associated cities'
            ]) ?>

            <?= $this->Form->button(__('Add trip')) ?>
            <?= $this->Form->end() ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>