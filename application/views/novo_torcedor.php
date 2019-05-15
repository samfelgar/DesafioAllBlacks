<h3>Novo torcedor</h3>
<hr>
<form action="<?= base_url('torcedores/salvar'); ?>" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="nome">Nome *</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
        <div class="col-sm-3 form-group">
            <label for="documento">Documento *</label>
            <input type="text" class="form-control documento" name="documento" id="documento" required>
        </div>
        <div class="col-sm-3 form-group">
            <label for="cep">CEP *</label>
            <input type="text" class="form-control cep" name="cep" id="cep" required>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 form-group">
            <label for="endereco">Endereço *</label>
            <input type="text" class="form-control" name="endereco" id="endereco" required>
        </div>
        <div class="col-sm-3 form-group">
            <label for="bairro">Bairro *</label>
            <input type="text" class="form-control" name="bairro" id="bairro" required>
        </div>
        <div class="col-sm-4 form-group">
            <label for="cidade">Cidade *</label>
            <input type="text" class="form-control" name="cidade" id="cidade" required>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="uf">UF *</label>
            <select name="uf" id="uf" class="custom-select">
                <?php foreach ($estados as $uf => $estado): ?>
                    <option value="<?= $uf; ?>"><?= $estado; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control phone" name="telefone" id="telefone">
        </div>
        <div class="col-sm-4 form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="ativo" id="ativo" checked>
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