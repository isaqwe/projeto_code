<h2>Endereços do Usuário</h2>

<ul>
    <?php foreach ($enderecos as $endereco): ?>
        <li>
            <?= esc($endereco['enderecos_logradouro']) ?>, <?= esc($endereco['enderecos_numero']) ?> - <?= esc($endereco['enderecos_bairro']) ?>
            <?php if ($endereco['enderecos_status']): ?>
                <strong>(Principal)</strong>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<a href="<?= site_url('enderecos/create/' . $enderecos[$i]->usuario_id_id) ?>">Novo Endereço</a>
