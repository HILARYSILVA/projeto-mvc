<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Cadastro de Pessoa</title>
    <style>
        label, input { display: block;}
    </style>
   
</head>
<body>
    <form action="/Funcionarios/save" method="post">
        <fieldset>
            <legend>Cadastro de Pessoa</legend>

            <input type="hidden" value="<?= $model->id ?>" name="id" />

            <label for="nome">nome:</label>
            <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" />

            <label for="cargo">cargo:</label>
            <input id="cargo" name="cargo" value="<?= $model->cargo ?>" type="text" />

        

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>