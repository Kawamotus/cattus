<div class="principal bg-white shadow d-flex flex-column align-items-center">
  <h1 class="mt-5 mb-5">Dados de <?=$animal[0]->Nome_Animal?></h1>
  <!--Foto e Form-->
  <div class="dados d-flex flex-row align-items-start justify-content-around w-100">
    <!--Foto do petzão-->
    <div class="pr-5 ml-5 shadowzinho" style="width: 400px; height: 400px; border-radius: 20px">
      <img class="rounded-3" style="width: 400px; height: 400px; object-fit: cover;"
        src="files/animais/<?=$animal[0]->Img_Animal?>" alt="Tibico" />
    </div>
    <!--Formzinho-->
    <div class="formzinho flex-grow-1 mb-5">
      <form method="post">
        <div class="form-group">
          <label>Nome:</label><br>
          <input class="form-control col-9" type="text" value="<?=$animal[0]->Nome_Animal?>" name='Nome_Animal' />
        </div>
        <div class="form-group">
          <label>Espécie:</label><br>
          <?php
                  if($animal[0]->Especie_Animal == 1){
                    echo '
                    <select class="form-control col-9" name="Especie_Animal">
                      <option value="1">Cachorro</option>
                      <option value="2">Gato</option>
                    </select>';
                  }
                  else if($animal[0]->Especie_Animal == 2){
                    echo '
                    <select class="form-control col-9" name="Especie_Animal">
                      <option value="2">Gato</option>
                      <option value="1">Cachorro</option>
                    </select>';
                  }
                ?>
        </div>
        <div class="form-group">
          <label>Sexo:</label>
          <?php
                /*($animal[0]->Sexo_Animal)*/
                if($animal[0]->Sexo_Animal == 1){
                  echo "
                  <select class='form-control col-9' name='Sexo_Animal'>
                    <option value='1'>Fêmea</option>
                    <option value='2'>Macho</option>
                  </select>";
                }
                else if($animal[0]->Sexo_Animal == 2){
                  echo "
                  <select class='form-control col-9' name='Sexo_Animal'>
                    <option value='2'>Macho</option>  
                    <option value='1'>Fêmea</option>
                  </select>
                  ";
                }
                ?>

        </div>
        <div class="form-group">
          <label>Idade:</label>
          <input class="form-control col-9" type="text" value="<?=$animal[0]->Idade_Animal?>" name='Idade_Animal' />
        </div>
        <div class="form-group">
          <label>Porte:</label>
          <?php
                  if($animal[0]->Porte_Animal == 1){
                    echo '
                    <select class="form-control col-9" name="Porte_Animal">
                      <option value="1">Pequeno</option>
                      <option value="2">Médio</option>
                      <option value="3">Grande</option>
                    </select>';
                  }
                  else if($animal[0]->Porte_Animal == 2){
                    echo '
                    <select class="form-control col-9" name="Porte_Animal">
                      <option value="2">Médio</option>
                      <option value="1">Pequeno</option>
                      <option value="3">Grande</option>
                    </select>';
                  }
                  else if($animal[0]->Porte_Animal == 3){
                    echo '
                    <select class="form-control col-9" name="Porte_Animal">
                      <option value="3">Grande</option>
                      <option value="1">Pequeno</option>
                      <option value="2">Médio</option>
                    </select>';
                  }
                ?>
        </div>
        <div class="form-group">
          <label>Data de Admissão:</label>
          <input class="form-control col-9" type="text" value="<?=$animal[0]->DtAdmissao_Animal?>"
            name='DtAdmissao_Animal' readonly />
        </div>

        <button type='submit' class='btn text-light'>Enviar</button>

        <a class="btn text-light" href="listarAnimais.php">
          voltar
        </a>
        <a class="btn text-light" href="excluirAnimal.php?id=<?=$animal[0]->ID_Animal?>">
          excluir
        </a>
      </form>
    </div>
    <div class="tabela mr-5">
      <!-- AQUI VAI A TABELA -->
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Tipo de Atividade</th>
            <th scope="col">Início</th>
            <th scope="col">Fim</th>
            <th scope="col">Câmera</th>
          </tr>
        </thead>
        <tbody>
          <?php
                    foreach($atividadeAnimal as $atividade){
                  ?>
          <tr>
            <td scope="row">
              <?php
                        if($atividade->Tipo_Atividade == 1){
                          echo "Comer";
                        }
                        else if($atividade->Tipo_Atividade == 2){
                          echo "Água";
                        }
                        else if($atividade->Tipo_Atividade == 3){
                          echo "Dormir";
                        }
                        else if($atividade->Tipo_Atividade == 4){
                          echo "Urina/Fezes";
                        }
                        ?>
            </td>
            <td><?=$atividade->Inicio_Atividade?></td>
            <td><?=$atividade->Termino_Atividade?></td>
            <td><?=$atividade->ID_Camera?></td>
          </tr>
          <?php }; ?>
        </tbody>

      </table>
    </div>
  </div>
  </main>
  </main>