<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Estudante</title>
</head>
<body>
    <h1>Cadastro de estudante</h1>
    <?php
        require './Pessoa.php';
        require './Estudante.php';

        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($formData)) {
            $estudante = new Estudante($formData['email']);
            $cadastro = $estudante->criarEstudante($formData);
            var_dump($cadastro);
            if ($cadastro) {
                echo 'Estudante Cadastrado com Sucesso';
            } else {
                echo 'Problema ao Cadastrar estudante';
            }
        }
    ?>
    <form name="CadastroEstudante" action="" method="POST" >
        <p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" required id="">
        </p>
        <p>
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" id="">
        </p>
        <p>
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="text" name="data_nascimento" id="">
        </p>
        <p>
            <label for="matricula">Matrícula</label>
            <input type="text" name="matricula" id="">
        </p>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="./index.php">Voltar</a>
</body>
</html>