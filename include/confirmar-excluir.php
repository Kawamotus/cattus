<div class="principal bg-white shadow d-flex flex-column align-items-center justify-content-center">
<form method='post' class="mt-5 d-flex flex-column align-items-center justify-content-center">

    <div class='form-group'>
        <p> Você deseja realmente excluir o Pet <strong><?=$obAnimal->Nome_Animal ?></strong>?</p>

        </div>

    <div class='form-group'>

        <a href='listarAnimais.php'>
            <button type='button' class="btn text-dark border border-dark" style="background-color: #f1f1f1;">Cancelar</button>
        </a>

        <button type='submit' class='btn text-light border border-dark' name='excluir'>Excluir</button>
    </div>

    </form>
</div>
</main>