<?php
    include "acao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <title>Cadastro de Novo Contato</title>

</head>
<body class='container'>
    <div class='row'>
        <div class='col'>
            <section id="formulario-cadastro">
                <form  method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Dados do Contato</legend>
                        <div>
                            <label class="col-sm-2 col-form-label" for="nome">Id:</label>
                            <input readonly class="form-control-plaintext" type="text" id="id" name="id"  value=<?=isset($contato)?$contato['id']:''?> >
                        </div>
                        <div>
                            <label class="form-label" for="nome">Nome:</label>
                            <input class="form-control" type="text" id="nome" name="nome" placeholder="Digite aqui seu nome..."  value= <?=isset($contato)?$contato['nome']:''?> >
                        </div>
                        <div>
                            <label class="form-label" for="sobrenome">Sobrenome:</label>
                            <input type="text"  class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite aqui seu sobrenome..."  value=<?=isset($contato)?$contato['sobrenome']:''?>>
                        </div>
                        <div>
                            <label class="form-label" for="dtnasc">Data de Nascimento:</label>
                            <input type="date"  class="form-control" id="dtnasc" name="dtnasc" value=<?=isset($contato)?$contato['dtnasc']:''?>>
                        </div>
                        <div>
                            <label class="form-label" for="email">E-mail:</label>
                            <input type="email"  class="form-control"  id="email" name="email" value=<?=isset($contato)?$contato['email']:''?>>
                        </div>
                        <div>
                            <label class="form-label" for="telefone">Telefone:</label>
                            <input type="tel"  class="form-control"  id="telefone" name="telefone" value=<?=isset($contato)?$contato['telefone']:''?>>
                        </div>
                        <div>
                            <input type="radio"  class="form-check-input"   id="sexofeminino" name="sexo" value="1" <?php if(isset($contato) and $contato['sexo']=='1') echo 'checked'; ?> >
                            <label class="form-check-label" for="sexofeminino">Feminino:</label>
                            <input type="radio" class="form-check-input"   id="sexomasculino" name="sexo" value="2" <?php if(isset($contato) and $contato['sexo']=='2') echo 'checked'; ?> >
                            <label class="form-check-label" for="sexomasculino">Masculino:</label>
                        </div>
                        <div>
                            <input type="checkbox" class="form-check-input"  id="parente" name="parente" <?php if(isset($contato) and $contato['parente']) echo 'checked'?> > 
                            <label class="form-check-label"  for="parente">Parente ?</label>
                        </div>
                        <div>
                            <label class="form-label" for="foto">Foto:</label>
                            <input type="file"  class="form-control"  id="foto" name="foto" value=<?=isset($contato)?$contato['foto']:''?>>
                        </div>
                        <div>
                            <label for="origem">Origem:</label>
                            <select  class="form-select"  name="origem" id="origem">
                                <option value="0">Selecione</option>
                                <option value="1"  <?php if(isset($contato) and $contato['origem'] == 1) echo 'selected'; ?>>Trabalho</option>
                                <option value="2"  <?php if(isset($contato) and $contato['origem'] == 2) echo 'selected'; ?>>Escola</option>
                                <option value="3"  <?php if(isset($contato) and $contato['origem'] == 3) echo 'selected'; ?>>Internet</option>
                                <option value="4"  <?php if(isset($contato) and $contato['origem'] == 4) echo 'selected'; ?>>Night</option>
                            </select>
                        </div>
                        <div>
                            <label  class="form-label"for="rede">Rede Social:</label>
                            <input  class="form-control"  type="text" id="rede" name="rede" placeholder="@..." value=<?=isset($contato)?$contato['rede']:''?>>
                        </div>
                        <div>
                            <label for="estado">Estado:</label>
                            <select  class="form-select"  name="estado" id="estado">
                                <option value="0">Selecione</option>
                                <option value="1" <?php if(isset($contato) and $contato['estado'] == 1) echo 'selected'; ?>>Acre</option>
                                <option value="2" <?php if(isset($contato) and $contato['estado'] == 2) echo 'selected'; ?>>Paraná</option>
                                <option value="3" <?php if(isset($contato) and $contato['estado'] == 3) echo 'selected'; ?>>Rio Grande do Sul</option>
                                <option value="4" <?php if(isset($contato) and $contato['estado'] == 4) echo 'selected'; ?>>Santa Catarina</option>
                                <option value="5" <?php if(isset($contato) and $contato['estado'] == 5) echo 'selected'; ?>>São Paulo</option>
                            </select>
                        </div>
                        <div>
                            <label for="cidade">Cidade:</label>
                            <select  class="form-select" name="cidade" id="cidade" value=<?=isset($contato)?$contato['cidade']:''?>>
                                <option value="0">Selecione</option>
                                <option value="1" <?php if(isset($contato) and $contato['cidade'] == 1) echo 'selected'; ?>>Joinville</option>
                                <option value="2" <?php if(isset($contato) and $contato['cidade'] == 2) echo 'selected'; ?>>Florianópolis</option>
                                <option value="3" <?php if(isset($contato) and $contato['cidade'] == 3) echo 'selected'; ?>>Itajaí</option>
                                <option value="4" <?php if(isset($contato) and $contato['cidade'] == 4) echo 'selected'; ?>>Blumenau</option>
                                <option value="5" <?php if(isset($contato) and $contato['cidade'] == 5) echo 'selected'; ?>>Rio do Sul</option>
                            </select>
                        </div>
                        <div>
                            <textarea  class="form-control"  name="descricao" id="descricao" cols="30" rows="10" placeholder="Descreva seu contato, adicione demais informações"><?=isset($contato)?$contato['descricao']:''?></textarea>
                        </div>
                        <div>
                            <button  class="btn btn-primary"  type="submit" name="acao" value="salvar">Salvar</button>
                            <input  class="btn btn-cancel"  type="reset" name="cancelar" value="Cancelar" onclick='window.location.href="index.php"'>
                        </div>
                    </fieldset>
                </form>
            </section>
        </div>
    </div>
</body>
</html>