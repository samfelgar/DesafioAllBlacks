<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enviando e-mails</h5>
            </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
<h3>Mala direta</h3>
<hr>
<p class="text-muted">Os campos marcados com * são de preenchimento obrigatório.</p>
<form action="<?= base_url('torcedores/enviarmaladireta'); ?>" id="mala" method="post">
    <div class="row form-group">
        <label for="assunto" class="col-sm-2 col-form-label">Assunto *</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="assunto" id="assunto" required>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 offset-sm-2">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="to-all" id="to-all" value="1" checked>
                <label for="to-all" class="form-check-label">Deseja enviar somente para ativos?</label>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <label for="msg" class="col-sm-2 col-form-label">Mensagem *</label>
        <div class="col-sm">
            <textarea name="msg" id="msg" class="form-control rich"></textarea>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm">
            <button class="btn btn-dark send-mail" type="submit">Enviar</button>
        </div>
    </div>
</form>