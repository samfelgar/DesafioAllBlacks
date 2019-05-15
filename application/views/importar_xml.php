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
<p>Clique no botão abaixo para importar os torcedores do arquivo .xml, disponível no endereço: 
    <a href="<?= $url; ?>" target="_blank" class="font-italic external-link"><?= $url; ?></a>
</p>
<div class="row">
    <div class="col-sm">
        <a href="<?= base_url('torcedores/importarxml'); ?>" class="btn btn-dark import-xml">Importar torcedores</a>
    </div>
</div>