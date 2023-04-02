<?php

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = strtoupper($_POST["nome"]);
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]); #md5 é pra criptografar a senha. deve ser fácil de hackear.
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc) values (
        '{$nome}', '{$email}', '{$senha}', '{$data_nasc}')";

        $res = $conn->query($sql);

        if($res){
            print "<script> alert('Cadastro realizado com sucesso!'); </script>";
            print "<script> location.href='?page=listar;' </script>";
        }else{
            print "<script> alert('Não foi possível cadastrar'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;
    
    case 'editar':
        $nome = strtoupper($_POST["nome"]);
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuarios SET
        nome='{$nome}',
        email='{$email}',
        senha='{$senha}',
        dataNasc='{$data_nasc}'
        WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res){
            print "<script> alert('Alterado com sucesso!'); </script>";
            print "<script> location.href='?page=listar;' </script>";
        }else{
            print "<script> alert('Não foi possível alterar'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;
    
    case 'excluir':

        $sql = "DELETE from usuarios WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res){
            print "<script> alert('Excluído com sucesso!'); </script>";
            print "<script> location.href='?page=listar;' </script>";
        }else{
            print "<script> alert('Não foi possível excluir'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;

    default:
        print "<script> alter('We are sorry but this isn't working...') </script>";
        break;
}