<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudante</title>
</head>
<body>
    <h1>Edição de estudante</h1>
    <?php
        require './Pessoa.php';
        require './Estudante.php';

        $estudante = new Estudante($_GET['email']);
        
        if(isset($_POST['editarEstudante'])){
            $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $estudante = new Estudante($formData['email']);
            $estudanteDados = $estudante->editarEstudante($formData);
            
            if ($estudanteDados) {
                echo "Estudante editado com sucesso!";
            } else {
                echo "Falha ao editar estudante!";
            }
        }else {
            $estudanteDados = $estudante->verEstudante(); 
    ?>

            <form name="EdicaoEstudante" action="" method="POST" >
                <input type="hidden" name="id" value="<?=$estudanteDados->ID?>">
                <p>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required value="<?=$estudanteDados->nome?>">
                </p>
                <p>
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" value="<?=$estudanteDados->telefone?>">
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?=$estudanteDados->email?>">
                </p>
                <p>
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" value="<?=$estudanteDados->data_nascimento?>">
                </p>
                <p>
                    <label for="matricula">Matrícula</label>
                    <input type="text" name="matricula" value="<?=$estudanteDados->matricula?>">
                </p>
                <input type="submit" value="Editar" name="editarEstudante" >
            </form>
        <?php
        } ?>
        <a href="index.php">Voltar</a>
</body>
</html>