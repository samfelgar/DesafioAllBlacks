<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Endereço</h5>
            </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
<div class="d-flex flex-row">
    <h3 class="mr-auto">Torcedores</h3>
    <div>
        <a href="<?= base_url('torcedores/novo'); ?>" class="btn btn-sm btn-outline-secondary">Adicionar torcedor</a>
    </div>
</div>
<?php if (!empty($this->input->get('updated'))): ?>
    <div class="row">
        <div class="col-sm">    
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                O dados foram salvos com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($this->input->get('deleted'))): ?>
    <div class="row">
        <div class="col-sm">    
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Torcedor excluído com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-sm form-group">
        <div class="table-responsive-sm">
            <table class="table table-sm table-hover data-table">
                <thead>
                    <th>Nome</th>
                    <th>Documento</th>
                    <th>UF</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ativo</th>
                    <th style="width: 100px;">&nbsp</th>
                </thead>
            </table>
        </div>
    </div>
</div>