<div
        class="body d-flex flex-row align-items-center justify-content-center bg-white shadow"
      >
      <!--div do lado do form, onde vai a foto-->
      <div class="sectionzinha w-50 h-100">
          <img src="imgs/paçoca.jpg" alt="Cachorro Paçoca" style="object-fit: cover;">
        </div>
        <!--Div do form-->
        <div class="formzinho w-50 h-100 bg-white d-flex flex-column justify-content-center position-relative shadow">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
              <label class="mt-1">Nome: </label>
              <input class="form-control" type="text" name="Nome_Animal" />
              <label class="mt-1">Espécie: </label>
              <select class="form-control" name="Especie_Animal">
                <option value="1">Cachorro</option>
                <option value="2">Gato</option>
              </select>
              <label class="mt-1">Sexo: </label>
              <select class="form-control" name="Sexo_Animal">
                <option value="1">Fêmea</option>
                <option value="2">Macho</option>
              </select>
              <label class="mt-1">Idade (em anos): </label>
              <input class="form-control" type="number" name="Idade_Animal" />
              <label class="mt-1">Porte: </label>
              <select class="form-control" name="Porte_Animal">
                <option value="1">Pequeno</option>
                <option value="2">Médio</option>
                <option value="3">Grande</option>
              </select>
              <label class="mt-1">Data de Admissão: </label>
              <input class="form-control" type="date" name="DtAdmissao_Animal" />
              <label class="mt-1">Upload de foto: </label><br />
              <input class="form-control-file" type="file" name="Img_Animal" accept="image/*">
              <br>
              <button type='submit' class='btn mb-2 text-white' style="background-color: #aa0000; border: hidden" name="enviar" value='cadastrar'>Cadastrar Pet</button>
            </div>
          </form>
        </div>
      </div>
    </main>