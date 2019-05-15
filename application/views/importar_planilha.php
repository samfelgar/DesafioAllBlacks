<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Importar torcedores</h5>
            </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <a href="<?= base_url(); ?>" class="btn btn-dark">Continuar</a>
        </div>
        </div>
    </div>
</div>
<h3>Importar torcedores</h3>
<form action="<?= base_url('torcedores/importarplanilha'); ?>" id="planilha" method="post" enctype="multipart/form-data">
    <p>Selecione abaixo a planilha que contém os dados a serem importados.</p>
    <div class="row">
        <div class="col-sm form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
            <input type="file" class="form-control-file" name="document" id="document" accept=".xls,.xlsx,.ods" required>
            <div><small class="text-muted">O arquivo de ter no máximo 2 MB. São aceitas as extensões .xls, .xlsx e .odt.</small></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <button type="submit" class="btn btn-dark import-planilha">Enviar arquivo</button>
        </div>
    </div>
</form>