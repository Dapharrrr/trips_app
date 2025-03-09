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
            <?= $this->Html->link(__('Liste des Villes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cities form content">
            <?= $this->Form->create($city) ?>
            <fieldset>
                <legend><?= __('Ajouter une Ville') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nom']);
                    echo $this->Form->control('country', ['label' => 'Pays']);
                    echo $this->Form->control('trips._ids', [
                        'type' => 'select',
                        'multiple' => 'checkbox',
                        'options' => $trips,
                        'empty' => 'Aucun voyage',
                        'label' => 'Associer à des voyages (optionnel)'
                    ]) ?>
            </fieldset>
            <?= $this->Form->button(__('Envoyer')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
