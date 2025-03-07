<h2>Login</h2>

<?= $this->Form->create() ?>
    <?= $this->Form->control('username', ['label' => 'Username']) ?>
    <?= $this->Form->control('password', ['label' => 'Password']) ?>
    <?= $this->Form->button('Se connecter') ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Créer un compte', ['action' => 'register']) ?>
