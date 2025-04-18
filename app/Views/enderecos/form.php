<h2>Novo Endereço</h2>
<form method="post" action="<?= site_url('enderecos/store') ?>">
    <input type="hidden" name="usuario_id" value="<?= esc($usuario_id) ?>">

    <label>Logradouro:</label>
    <input type="text" name="logradouro" required><br>

    <label>Número:</label>
    <input type="text" name="numero"><br>

    <label>Bairro:</label>
    <input type="text" name="bairro"><br>

    <label>Complemento:</label>
    <input type="text" name="complemento"><br>

    <label>CEP:</label>
    <input type="text" name="cep"><br>

    <label>Cidade:</label>
    <select name="cidade_id">
        <?php foreach ($cidades as $cidade): ?>
            <option value="<?= $cidade['id'] ?>"><?= esc($cidade['nome']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>É o endereço principal?</label>
    <input type="checkbox" name="is_principal" value="1"><br>

    <button type="submit">Salvar Endereço</button>
</form>
