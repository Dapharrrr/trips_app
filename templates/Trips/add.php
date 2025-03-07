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
            <?= $this->Form->control('name', ['label' => 'Trip Name']) ?>

            <!-- Ajout de la liste déroulante pour les utilisateurs -->
            <?= $this->Form->control('user_id', [
                'options' => $users,  // Liste d'utilisateurs récupérée dans le contrôleur
                'label' => 'Select User'
            ]) ?>

            <!-- Liste déroulante pour les villes -->
            <?= $this->Form->control('cities._ids', [
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $cities,
                'label' => 'Associated Cities'
            ]) ?>

            <?= $this->Form->button(__('Add Trip')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
