<h3>Alterar torcedor</h3>
<hr>
<form action="<?= base_url('torcedores/salvar/' . $torcedor->getId()); ?>" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="nome">Nome *</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= $torcedor->getNome(); ?>" required>
        </div>
        <div class="col-sm-3 form-group">
            <label for="documento">Documento *</label>
            <input type="text" class="form-control documento" name="documento" id="documento" value="<?= $torcedor->getDocumento(true); ?>" required>
        </div>
        <div class="col-sm-3 form-group">
            <label for="cep">CEP *</label>
            <input type="text" class="form-control cep" name="cep" id="cep" value="<?= $torcedor->getCep(); ?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 form-group">
            <label for="endereco">Endereço *</label>
            <input type="text" class="form-control" name="endereco" id="endereco" value="<?= $torcedor->getEndereco(); ?>" required>
        </div>
        <div class="col-sm-3 form-group">
            <label for="bairro">Bairro *</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="<?= $torcedor->getBairro(); ?>" required>
        </div>
        <div class="col-sm-4 form-group">
            <label for="cidade">Cidade *</label>
            <input type="text" class="form-control" name="cidade" id="cidade" value="<?= $torcedor->getCidade(); ?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="uf">UF *</label>
            <select name="uf" id="uf" class="custom-select">
                <?php foreach ($estados as $uf => $estado): ?>
                    <option value="<?= $uf; ?>" <?= ($torcedor->getUF() == $uf) ? 'selected' : ''; ?>><?= $estado; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control phone" name="telefone" id="telefone" value="<?= $torcedor->getTelefone(); ?>">
        </div>
        <div class="col-sm-4 form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $torcedor->getEmail(); ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="ativo" id="ativo" <?= ($torcedor->getAtivo()) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="ativo">Ativo?</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm form-group">
            <button class="btn btn-dark" type="submit">Salvar</button>
            <button class="btn btn-secondary go-back" type="button">Voltar</button>
        </div>
    </div>
    <div>
        <small class="text-muted">* Campo obrigatório.</small>
    </div>
</form>