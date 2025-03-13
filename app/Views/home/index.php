<?php session() ?>
<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>

<div class=container>

    <h1><?= $titulo ?></h1>

    <p><?= $conteudo ?></p>

    </div>
    <?= $this->endsection('content') ?>