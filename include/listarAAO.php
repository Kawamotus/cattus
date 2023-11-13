</main>
<?php
$mensagem = '';
    if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'success':
                $mensagem = "<div class='alert alert-success'> Ação executada com sucesso</div>";

            break;

            case 'error':
                $mensagem = "<div class='alert alert-danger'> Ação não executada</div>";
            break;
        }
    }
?>
<main class="d-flex justify-content-center">
      <!--Principal-->
      <div
        class="principal bg-white shadow d-flex flex-column align-items-center"
      ><br>
      <?= $mensagem ?>
      <div class="linha1 d-flex flex-row align-items-center justify-content-between w-100 pr-5 pl-5">
        <h1 class="mt-5 mb-5">Pets cadastrados ordenados por ID</h1>      
        
      <form class="d-flex flex-row" action='listarAnimais.php'>
              <a style="text-decoration: none" href='listarAnimais.php'>
                <button class="btn mb-2 text-white d-flex align-items-center justify-content-center"style="background-color: #aa0000; border: hidden">Voltar</button>
              </a>
          </form>
      </div>

        <!--Linha 1 de pets-->
        
        <div class="cards w-100 d-flex flex-row justify-content-start pt-3 flex-wrap">
        <?php
        for($i= 0;$i< $numero; $i++){
          $algOrd = $ordenacao->getAnimais2("ID_Animal = ".$vetorId[$i], null, null);
        ?>

          <a class="text-body m-5" href="animal.php?id=<?=$algOrd[0]->ID_Animal?>">
            <div class="card rounded-3 bg-white d-flex flex-column align-items-center shadowzinho" style="width: 20rem; height: 28rem">
              <div style="width: 20rem; height: 20rem">
                <img style="object-fit: cover;" class="rounded-2 shadowzinho" src="files/animais/<?=$algOrd[0]->Img_Animal?>" alt=""/>
              </div>
              <div class="nome w-100 d-flex align-items-center justify-content-center border-bottom border-dark bd-highlight bg-white"  style="height: 4rem">
                <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                  <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                    <circle cx="24" cy="11" r="7" />
                    <path d="M4 41c0-8.837 8.059-16 18-16m9 17l10-10l-4-4l-10 10v4h4Z"/>
                  </g>
                </svg>
                <h3 class="d-flex align-items-center justify-content-center w-100 flex-grow-1"> <?=$algOrd[0]->Nome_Animal?> </h3>
                <div class="w-100"></div>
              </div>
              <div class="sexo w-100 d-flex align-items-center justify-content-center bd-highlight bg-white rounded-4" style="height: 4rem">
                <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                  <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M17.546 15.48a7 7 0 1 0 4.372 5.454a1 1 0 1 1 1.977-.304a9 9 0 1 1-5.622-7.014a1 1 0 1 1-.727 1.863Z"/>
                    <path d="M14 39v-8a1 1 0 1 1 2 0v8a1 1 0 1 1-2 0Z" />
                    <path d="M11 34a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Zm17.902-18.737a7 7 0 0 0-8.853 7.562a1 1 0 1 1-1.986.236a9 9 0 1 1 5.375 7.204a1 1 0 0 1 .791-1.837a7 7 0 1 0 4.673-13.165Z"/>
                    <path d="M32.793 17.207a1 1 0 0 1 0-1.414l7.5-7.5a1 1 0 1 1 1.414 1.414l-7.5 7.5a1 1 0 0 1-1.414 0Z"/>
                    <path d="M40.924 15a1 1 0 0 1-.987-1.013l.05-3.974l-3.974.05a1 1 0 1 1-.026-2l6.026-.076l-.076 6.026a1 1 0 0 1-1.013.987Z"/>
                  </g>
                </svg>
                <h3 class="d-flex align-items-center justify-content-center w-100 flex-grow-1"> <?=($algOrd[0]->Sexo_Animal == "1" ? "Fêmea" : "Macho")?></h3>
                <div class="w-100"></div>
            </div></div>
        </a>

<?php } ?>

        </div>
        <section>
        
    </section>
        </div>
      </div>
    </main>