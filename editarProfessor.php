<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar professor</title>
</head>
<body>
    <h1>Edição de professor</h1>
    <?php
        require './Pessoa.php';
        require './Professor.php';

        $professor = new Professor($_GET['email']);
        
        if(isset($_POST['editarProfessor'])){
            $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $professor = new Professor($formData['email']);
            $professorDados = $professor->editarProfessor($formData);
            
            if ($professorDados) {
                echo "Professor editado com sucesso!";
            } else {
                echo "Falha ao editar Professor!";
            }
        }else {
            $professorDados = $professor->verProfessor(); 
    ?>

            <form name="editarProfessor" action="" method="POST" >
                <input type="hidden" name="id" value="<?=$professorDados->id?>">
                <p>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required value="<?=$professorDados->nome?>">
                </p>
                <p>
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" value="<?=$professorDados->telefone?>">
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?=$professorDados->email?>">
                </p>
                <p>
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input type="text" name="data_nascimento" value="<?=$professorDados->data_nascimento?>">
                </p>
                <p>
                    <label for="salario">Salario</label>
                    <input type="text" name="salario" value="<?=$professorDados->salario?>">
                </p>
                <p>
                    <label for="especialidade">Especialidade</label>
                    <input type="text" name="especialidade" value="<?=$professorDados->especialidade?>">
                </p>
                <input type="submit" value="Editar" name="editarProfessor" >
            </form>
        <?php
        } ?>
        <a href="index.php">Voltar</a>
</body>
</html>