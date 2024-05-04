<?php

    if(!empty($_GET['id']))
    {
      

        include_once('config.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usuarios WHERE id = $id";

        $result = $conexao->query($sqlSelect);
         if($result->num_rows > 0)
         {
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $senha = $user_data['senha'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $data_nasc = $user_data['data_nasc'];
                $cidade = $user_data['cidade'];
                $estado = $user_data['estado'];
                $endereco = $user_data['endereco'];
            }
         
            

        }
    
        else
        {
            header('Location: sistema.php');
        }
           
    }
    else
    {
        header('Location: sistema.php');
    }  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="styleEdit.css">
</head>
<body>
<a class="voltar" href="sistema.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome?>"  required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="email" id="email" 
                    class="inputUser" value="<?php echo $email?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $senha?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="telefone" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone?>" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>

                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero"
                value="feminino" <?php echo $sexo == 'feminino' ? 'checked' : ''?> required>
                <label for="feminino">Feminino</label>
                <br>

                <input type="radio" id="masculino" name="genero"
                value="masculino"  <?php echo $sexo == 'masculino' ? 'checked' : ''?> required>
                <label for="masculino">Masculino</label>
                <br>

                <input type="radio" id="outro" name="genero"
                value="outro" <?php echo $sexo == 'outro' ? 'checked' : ''?> required>
                <label for="outro">Outro</label>
                <br><br>

                <label for="data_nasc" ><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $data_nasc?>" required>
                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" value="<?php echo $cidade?>" class="inputUser" required>
                    <label for="cidade" class="labelInput"><b>Cidade</b></label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="estado" id="estado" value="<?php echo $estado?>" class="inputUser" required>
                    <label for="estado" class="labelInput"><b>Estado</b></label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="endereco" name="endereco" id="endereco" value="<?php echo $endereco?>" class="inputUser" required>
                    <label for="endereco" class="labelInput"><b>Endereço</b></label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
                


            </fieldset>
        </form>
    </div>
</body>
</html>