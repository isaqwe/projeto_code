<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2 class="border-bottom border-2 border-primary mt-3 mb-4"><?= $title ?></h2>

    <?php if (isset($msg)) echo $msg; ?>

    <form action="<?= base_url('enderecos/update/' . $endereco->id) ?>" method="post">

        <?= csrf_field() ?>

        <!-- Campo CEP -->
        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="<?= esc($endereco->cep) ?>" required>
        </div>

        <!-- Campo Rua -->
        <div class="mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" value="<?= esc($endereco->rua) ?>" required>
        </div>

        <!-- Campo Número -->
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= esc($endereco->numero) ?>" required>
        </div>

        <!-- Campo Complemento -->
        <div class="mb-3">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" value="<?= esc($endereco->complemento) ?>" required>
        </div>

        <!-- Campo Bairro -->
        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= esc($endereco->bairro) ?>" required>
        </div>

        <!-- Selecionar Cidade -->
        <div class="mb-3">
            <label for="cidade_id" class="form-label">Cidade</label>
            <select class="form-select" id="cidade_id" name="cidade_id" required>
                <option value="">Selecione a cidade</option>
                <?php foreach ($cidades as $cidade): ?>
                    <option value="<?= $cidade->cidades_id ?>" <?= $cidade->cidades_id == $endereco->cidade_id ? 'selected' : '' ?>>
                        <?= esc($cidade->cidades_nome) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Não é necessário incluir usuario_id no formulário, pois é capturado diretamente do controlador -->
        <input type="hidden" name="usuario_id" value="<?= session()->get('usuario_id'); ?>">

        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

<?= $this->endSection() ?>
