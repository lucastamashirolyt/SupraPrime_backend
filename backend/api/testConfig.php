<?php
include_once('config.php');

if (isset($conn)) {
    echo "Conexão com o banco de dados estabelecida com sucesso!";
} else {
    echo "Falha na conexão com o banco de dados.";
}
?>