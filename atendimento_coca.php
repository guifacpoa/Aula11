<?php
//######FILTRO (segurança)
//php.net/filter-input
//#######
$nome_completo = filter_input(INPUT_POST, 'nome', FILTER_UNSAFE_RAW);
$telefone = filter_input(INPUT_POST, 'numero', FILTER_UNSAFE_RAW);
//#####validação#####
//php.net/strlen
//php.net/empty
//php.net/isset
//######
if(!isset($nome_completo)){
    echo "Informe o nome";
}
elseif(empty($nome_completo)){
    echo "O nome é obrigatório";
}
elseif(strlen($nome_completo) <3){
    echo "informe o tamanho minimo";
}
elseif(strlen($nome_completo) > 100){
    echo "Informe um nome limitado a 100";
}
else{
    require_once('banco.php');
    conexao();

    $sql = "insert into participantes(nome, telefone) values('$nome_completo', '$telefone')";
    $resultado = execute($sql);

    if( !$resultado ){
        die('Falha ao inserir');
    }

    $id = busca_id();

    echo "PARABENS, VOCÊ ESTA PARTICIPANDO!!";
}