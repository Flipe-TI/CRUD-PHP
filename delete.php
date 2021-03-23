<?php

require_once 'config.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['name']) ? $_POST['name'] : null;
$idade = isset($_POST['idade']) ? $_POST['idade'] : null;


if(empty($id)){
    echo "informe um ID!";
    header('Location:formdel.html');
}

$mysqli = new mysqli("localhost", "root", "", "system");
$query = $mysqli->query("select * from user where id_user = '$id';");
$resultado = mysqli_fetch_array($query,MYSQLI_ASSOC);
$numRegistros = $query->num_rows;


if( $numRegistros == 0){
    echo "Nenhum usuario com este id encontrado, por favor informe um cadastro valido!";
    header('Location:formdel.html');
}else{   
    

    if ($resultado["name"] == $nome && $resultado["age"] == $idade){
        $PDO = conecta_bd();
        $sql = 'CALL `delete`(:id)';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $id);


        if ($stmt->execute()){
            header('Location:redirecionamento.php');
        } else {
            echo "Ocorreu um erro na inclusão de registro";
            print_r($stmt->errorInfo());
        }
    }else{
        echo "As informações passadas não conferem com os dados do banco!";
        exit;
    }
}
?>