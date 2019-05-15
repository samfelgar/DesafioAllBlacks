<div class="row">
    <div class="col-sm">
        <p><strong><?= $torcedor->getNome(); ?></strong></p>
        <table class="table table-sm table-responsive-sm">
            <tbody>
                <tr>
                    <th>CEP</th>
                    <td><?= $torcedor->getCep(true); ?></td>
                </tr>
                <tr>
                    <th>Endereço</th>
                    <td><?= $torcedor->getEndereco(); ?></td>
                </tr>
                <tr>
                    <th>Bairro</th>
                    <td><?= $torcedor->getBairro(); ?></td>
                </tr>
                <tr>
                    <th>Cidade</th>
                    <td><?= $torcedor->getCidade(); ?></td>
                </tr>
                <tr>
                    <th>UF</th>
                    <td><?= $torcedor->getUF(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>