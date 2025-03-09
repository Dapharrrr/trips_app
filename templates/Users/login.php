<h2>Connexion</h2>

<?= $this->Form->create() ?>
    <?= $this->Form->control('username', ['label' => 'Nom d\'utilisateur']) ?>
    <?= $this->Form->control('password', ['label' => 'Mot de passe']) ?>
    <?= $this->Form->button('Se connecter') ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Créer un compte', ['action' => 'register']) ?>
