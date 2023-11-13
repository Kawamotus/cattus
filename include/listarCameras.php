<main class="d-flex justify-content-center w-100">
  <!--Principal-->
  <div class="principal bg-white shadow d-flex flex-column align-items-center">
    <div class="linha1 d-flex flex-row align-items-center justify-content-between w-100 pr-5 pl-5">
      <h1 class="mt-5 mb-5">Câmeras Cadastradas</h1>
    </div>
    <!--Linha 1 de pets-->

    <div class="cards w-100 d-flex flex-row justify-content-start pt-3 flex-wrap">
      <?php
        //echo "<pre>"; print_r($animal);echo"</pre>";
        foreach($listarCamera as $dadosCamera){
        ?>
      <a class="text-body m-5">
        <div class="card rounded-3 bg-white d-flex flex-column align-items-center shadowzinho"
          style="width: 20rem; height: 28rem">
          <div class="foto" style="width: 20rem; height: 20rem">
            <img style="object-fit: cover;" class="rounded-2 shadowzinho" src="imgs/camera.png" alt="" />
          </div>
          <div
            class="nome w-100 d-flex align-items-center justify-content-center border-bottom border-dark bd-highlight bg-white"
            style="height: 4rem">
            <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                <circle cx="24" cy="11" r="7" />
                <path d="M4 41c0-8.837 8.059-16 18-16m9 17l10-10l-4-4l-10 10v4h4Z" />
              </g>
            </svg>
            <h3 class="d-flex align-items-center justify-content-center w-100 flex-grow-1"> <?=$dadosCamera->ID_Camera?>
            </h3>
            <div class="w-100"></div>
          </div>
          <div class="sexo w-100 d-flex align-items-center justify-content-center bd-highlight bg-white rounded-4"
            style="height: 4rem">
            <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
              <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                <path stroke-linecap="round"
                  d="M9.858 32.757C6.238 33.843 4 35.343 4 37c0 3.314 8.954 6 20 6s20-2.686 20-6c0-1.657-2.239-3.157-5.858-4.243" />
                <path d="M24 35s13-8.496 13-18.318C37 9.678 31.18 4 24 4S11 9.678 11 16.682C11 26.504 24 35 24 35Z" />
                <path d="M24 22a5 5 0 1 0 0-10a5 5 0 0 0 0 10Z" />
              </g>
            </svg>
            <h3 class="d-flex align-items-center justify-content-center w-100 flex-grow-1">
              <?=$dadosCamera->Localizacao_Camera?></h3>
            <div class="w-100"></div>
          </div>
        </div>
      </a>

      <?php } ?>

    </div>
  </div>
</main>