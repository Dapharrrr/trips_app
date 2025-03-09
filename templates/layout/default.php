<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: le framework php de développement rapide';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>TRIPS</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link('Voyages', ['controller' => 'Trips', 'action' => 'index']) ?>
            <?= $this->Html->link('Villes', ['controller' => 'Cities', 'action' => 'index']) ?>
            <?= $this->Html->link('Utilisateurs', ['controller' => 'Users', 'action' => 'index']) ?>
            <?php if (empty($this->request->getAttribute('identity'))): ?>
                <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'add']) ?>
                <?= $this->Html->link('Connexion', ['controller' => 'Users', 'action' => 'login']) ?>

            <?php else : ?>

                <?= $this->Html->link('Déconnexion', ['controller' => 'Users', 'action' => 'logout']) ?>

            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
