<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1><?php echo ucfirst($form). ' '.$titulo ?></h1>

    <form action="<?= base_url('cidades/create') ?>" method="post">
        <div>
            <label for="cidades_nome"> Cidade</label>
            <input type="text" name="cidades_nome" id="cidades_nome" 
            value="<?= $cidade['cidade'] ?>" required>
        </div>

        <div>
            <label for="cidades_uf"> Estado</label>
            <input type="text" name="cidades_uf" id="cidades_uf" value= "<?= $cidade['uf'] ?>" required>
        </div>

        <input type="hidden" name="cidades_id" value= "<?= $cidade['id'] ?>" > 

        <div>
            <button type="submit"><?= ucfirst($form) ?></button>
        </div>

    </form>
</body>
</html>