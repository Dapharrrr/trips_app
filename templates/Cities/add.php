<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 * @var \Cake\Collection\CollectionInterface|string[] $trips
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cities form content">
            <?= $this->Form->create($city) ?>
            <fieldset>
                <legend><?= __('Add City') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('country');
                    echo $this->Form->control('trips._ids', [
                        'type' => 'select',
                        'multiple' => 'checkbox',
                        'options' => $trips,
                        'empty' => 'Aucun trip',
                        'label' => 'Associer à des trips (optionnel)'
                    ]) ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
