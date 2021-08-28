<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestão acadêmica</title>
</head>
<body>

    <?php
    require './Pessoa.php';
    require './Estudante.php';
    require './Professor.php';
    require './Disciplina.php';
    ?>
    
    <br><hr>
    
    <h2> Professores / <a href="./CadastroProfessor.php">Novo professor</a></h2>
    <?php
        $conexao = new Conn();
        $professores = $conexao->listarProfessores();
        foreach ($professores as $key => $value) {
            echo $value['nome'].' - '."<a href='editarProfessor.php?email={$value["email"]}'>Editar</a> <br>";
        }
    ?>

<br><hr>

    <h2> Estudantes / <a href="./CadastroEstudante.php">Novo estudante</a></h2>
    
    <?php
        $conexao = new Conn();
        $estudantes = $conexao->listarEstudantes();
        foreach ($estudantes as $key => $value) {
            echo $value['nome'].' - '."<a href='editarEstudante.php?email={$value["email"]}'>Editar</a> <br>";
        }
    ?>

<br><hr>

<h2> Estudante </h2>
    <?php
        $estudante = new Estudante('mariana@mariana.com.br');
        $estudanteDados = $estudante->verEstudante();
        echo "Nome: {$estudanteDados->nome} <br>";
        echo "Telefone: {$estudanteDados->telefone} <br>";
        echo "Email: {$estudanteDados->email} <br>";
        echo "Idade: {$estudante->calculaIdade($estudanteDados->data_nascimento)} <br>";
        echo "Ira: {$estudanteDados->ira} <br>";
        echo "Matrícula: {$estudanteDados->matricula} <br>";
        echo "Avaliação: {$estudante->calculaAvaliacao()} <br>";
        echo "Disciplinas: {$estudante->disciplinasMatriculadas()} <br>";
        echo "Atualizar Ira: {$estudante->atualizaIRA(8)} <br>";
    ?>

<br><hr>

    <h2>Disciplinas</h2>
    <?php 
        $disciplinaMatematica = new Disciplina();
        $disciplinaMatematica->nome = 'Matemática';
        $disciplinaMatematica->setCodigo('MATI');
        $disciplinaMatematica->creditos = 4;
        Disciplina::ministrarDisciplina();
        $matematica = $disciplinaMatematica->verDisciplina();
        echo $matematica.PHP_EOL;
    ?>

    <br>

    <h2>Disciplinas</h2>
    <?php 
        $disciplinaPortugues = new Disciplina();
        $disciplinaPortugues->nome = 'Português';
        $disciplinaPortugues->setCodigo('PORT');
        $disciplinaPortugues->creditos = 4;
        Disciplina::ministrarDisciplina();
        $portugues = $disciplinaPortugues->verDisciplina();
        echo $portugues.PHP_EOL;
    ?>

</body>
</html>