<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/images/favicon.png'); ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/richtext.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title>Desafio AllBlacks</title>
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/images/logo.png'); ?>" width="30" height="30" alt="AllBlacks" title="Início">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'home') ? 'active' : ''; ?>" href="<?= base_url(); ?>">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'new') ? 'active' : ''; ?>" href="<?= base_url('torcedores/novo'); ?>">Adicionar torcedor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'xml') ? 'active' : ''; ?>" href="<?= base_url('torcedores/xml'); ?>">Importar XML</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'planilha') ? 'active' : ''; ?>" href="<?= base_url('torcedores/planilha'); ?>">Importar planilha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'mala') ? 'active' : ''; ?>" href="<?= base_url('torcedores/maladireta'); ?>">Mala direta</a>
                </li>
            </ul>
            <div>
                <a href="https://github.com/samfelgar" target="_blank" title="Github do criador" class="text-white"><i class="fab fa-github fa-2x"></i></a>
            </div>
        </div>
    </nav>
    <div class="container mb-5 pt-3">