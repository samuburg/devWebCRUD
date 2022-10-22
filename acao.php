<?php
// verificar dados enviados
// echo 'Dados enviados:<br>';
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
define('JSON','https://635451efccce2f8c02071d50.mockapi.io/api/v1/contatos'); //API mock, atividade 22/10/22

function carregaDadosFormParaVetor(){
    $destino = '';
    if (isset($_FILES['foto'])){    
        // define a pasta destino do arquivo feito upload
        $destino = 'imagens/'.$_FILES['foto']['name'];
        // move o arquivo para a pasta destino
        move_uploaded_file($_FILES['foto']['tmp_name'],$destino);
    }

    // pega informação enviada via post e guarda no vetor dados   
    $dados = array( 'id' => isset($_POST['id'])?$_POST['id']:'',  // teste ISSET é para verificar se os dados foram enviados
                    'nome' => isset($_POST['nome'])?$_POST['nome']:'',
                    'sobrenome' => isset($_POST['sobrenome'])?$_POST['sobrenome']:'',
                    'dtnasc' => isset($_POST['dtnasc'])?$_POST['dtnasc']:'',
                    'email' => isset($_POST['email'])?$_POST['email']:'',
                    'telefone' => isset($_POST['telefone'])?$_POST['telefone']:'',
                    'sexo' => isset($_POST['sexo'])?$_POST['sexo']:'',
                    'parente' => isset($_POST['parente'])?$_POST['parente']:'',
                    'origem' => isset($_POST['origem'])?$_POST['origem']:'',
                    'rede' => isset($_POST['rede'])?$_POST['rede']:'',
                    'estado' => isset($_POST['estado'])?$_POST['estado']:'',
                    'cidade' => isset($_POST['cidade'])?$_POST['cidade']:'',
                    'descricao' => isset($_POST['descricao'])?$_POST['descricao']:'',
                    'foto'=>$destino
                ); 
    return $dados; 

}


function inserir($novocontato){ // atualiza arquivo com todos os dados
    $dados = carregaDoArquivoParaVetor();
    // $novocontato = carregaDadosFormParaVetor();
    $novocontato['id'] = nextID($dados);
    if (validaDados($novocontato)){
        if ($dados){ 
            array_push($dados,$novocontato);
        }else{
            $dados[] = $novocontato;
        }
        salvaDadosNoArquivo($dados);
        return true;
    }
    return false;
}

function salvaDadosNoArquivo($dados){
    file_put_contents(JSON,json_encode($dados));    
}

function nextID($dados){
    $id = 0;
    if ($dados)
        $id = intval($dados[count($dados)-1]['id']);
    return ++$id;
}

function carregaDoArquivoParaVetor(){
    if (file_exists(JSON)){
        $conteudo = file_get_contents(JSON);
        $contatos = json_decode($conteudo,true);
        return $contatos;
    }
    return null;

}

function validaDados($dados){

    foreach($dados as $campo){  // apenas verifica se tem algum campo em branco
        if ($campo == '')
            return false;
    }
    return true;
}

//*PROFESSORA
function excluir($id){
    $dados = carregaDoArquivoParaVetor();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1);
    salvaDadosNoArquivo($dados);
}
/*

function excluir($id){
    $dados = carregaDoArquivoParaVetor();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id']==$id){
            break;
        }else{
            $i++;
        }
    }
    array_splice($dados,$i,1);
    salvaDadosNoArquivo($dados);

}
*/

function buscaContato($id){
    $dados = carregaDoArquivoParaVetor();
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            return $contato;
    }
}


//*PROFESSORA
function alterar($alterado){
    $dados = carregaDoArquivoParaVetor();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $alterado['id'])
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1,array($alterado));
    salvaDadosNoArquivo($dados);  
}
/*

function alterar($alterado){
    $dados = carregaDoArquivoParaVetor();
    $i = 0;
    foreach ($dados as $contato){
        if ($contato['id'] ==$alterado['id']){
            break;
        }else {
            $i++;
        }
    }
    
}

$acao = isset($_POST['acao'])?$_POST['acao']:'';
if ($acao == 'salvar'){
    $contato = carregaDadosFormParaVetor();
    if ($contato['id'] == 0) {
        if(inserir($contato))
            header('location: index.php');
        
    }
    else {
        alterar($contato);
        header('location: index.php');
    }
}else {
    $acao = isset($_GET['acao'])?$_GET['acao']:'';
    $id = isset($_GET['id'])?$_GET['id']:'';
    if ($acao=='excluir'){
        excluir($id);
    }else if($acao =='editar'){
        $contato=buscaContato($id);
    }
}
*/


//PROFESSORA
$acao = isset($_POST['acao'])?$_POST['acao']:'';

if ($acao =='salvar'){

    $contato = carregaDadosFormParaVetor();
    if ($contato['id'] == 0){
        if (inserir($contato))
            header('location: index.php');
    }else{    
        alterar($contato);
        header('location: index.php');

    }
}
else{

    $acao = isset($_GET['acao'])?$_GET['acao']:'';
    $id = isset($_GET['id'])?$_GET['id']:'';
    
    if ($acao == 'excluir'){
        excluir($id);
    }else if($acao == 'editar'){
        $contato = buscaContato($id);
        
        
    }
}

?> 