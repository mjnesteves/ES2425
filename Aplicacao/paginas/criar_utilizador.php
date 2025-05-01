<!DOCTYPE html>
<html lang="pt">

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <meta charset="UTF-8">
    <title>Criar Utilizador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

    <?php include "./nav_bar_menus.php"; ?>


    <section class="section-form-login-criar">
        <div class="container-login-criar">
            <h1 class="mb-4">Novo Utilizador</h1>
            <form method="GET" id="formulario" action="./adicionarUtilizador.php">
                <?php
                if (isset($tipoUtilizador) && $tipoUtilizador == 1) {
                    listaTipoUtilizadorAdmin($tipoUtilizador);
                }
                ?>

                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>

                <label>Email</label>
                <input type="email" name="email" class="form-control" required>

                <label>Password</label>
                <input type="password" name="password" class="form-control" required>

                <label>Data de Nascimento</label>
                <input type="date" name="dataNascimento" class="form-control" required>

                <label>Morada</label>
                <input type="text" name="morada" class="form-control" required>

                <label>Contacto</label>
                <input type="tel" name="telefone" class="form-control" required>

                <button type="submit" class="btn btn-primary">Registar</button>


                <a href="javascript:history.back()" class="btn btn-primary mt-3">Voltar</a>
            </form>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="mostra_modal" tabindex="-1" role="dialog" aria-labelledby="mostra_modal"
        aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mt-1">
                    <h3 class="font-weight-bold text-secondary text-center" id=info>Informação</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="font-weight-bold text-secondary text-center" id="criar_utilizador"> </h3>

                </div>
                <div class="modal-footer mx-auto">
                    <button id="ajaxButton" class="btn btn-primary" data-toggle="modal" data-dismiss="modal">ok</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var mensagem;

        $("#formulario").on("submit", function (e) {
            var serializeData = $('#formulario').serialize();
            e.preventDefault();
            $.ajax({
                url: './adicionarUtilizador.php',
                type: 'GET',
                data: serializeData,
                success: function (data) {
                    mensagem = JSON.parse(data);
                    const screenToShow = document.getElementById('criar_utilizador')
                    mensagem.forEach(erro => {
                        const linha = document.createElement('p')
                        linha.innerText = erro
                        screenToShow.append(linha);
                    })
                    $("#mostra_modal").modal('show');
                },
                error: function (data) {
                    alert("error");
                }
            });
        });


        $('#ajaxButton').on('click', function () {
            // Send Ajax request
            $.ajax({
                success: function (response) {
                    if (mensagem[0] === 'Conta criada. Faça login!') {
                        window.location.href = 'login.php';
                    } else {
                        location.reload()
                    }
                },
                error: function (xhr, status, error) {
                    alert('Something went wrong!');
                }
            });
        });
    </script>
    <?php include "./footer.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>