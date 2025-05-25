<!DOCTYPE html>
<html lang="pt">

<head>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <meta charset="UTF-8">
  <title>FAQ
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css?v=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>






<body class="body-faq">

  <?php include_once('nav_bar_menus.php'); ?>

  <ul class="nav nav-tabs-faq botoes-faq" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link-faq" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">Questões Frequentes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link-faq active" id="contactos-tab" data-toggle="tab" href="#contactos" role="tab" aria-controls="contactos" aria-selected="true">Contacte-nos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link-faq" id="lojas-tab" data-toggle="tab" href="#lojas" role="tab" aria-controls="lojas" aria-selected="false">Lojas</a>
    </li>
        <li class="nav-item">
      <a class="nav-link-faq" id="equipa-tab" data-toggle="tab" href="#equipa" role="tab" aria-controls="equipa" aria-selected="false">Equipa</a>
    </li>
  </ul>


  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
      <div class="container-faq">
        <div class="max-w-xl">
          <h2 class="text-4xl font-extrabold pb-4 text-center text-white">Questões Frequentes</h2>
          <div class="space-y-6">
            <!-- Item 1 -->
            <div class="shadow-md rounded-lg">
              <button
                class="w-full flex items-center justify-between p-4 focus:outline-none "
                onclick="toggleItem(1)"
                aria-expanded="false"
                aria-controls="content-1"
                id="faq-button-1">
                <span class="text-lg text-white font-semibold espaco">
                  Qual o prazo máximo para entrega após o aluguer de um filme?
                </span>
                <svg
                  id="icon-plus-1"
                  class="w-6 h-6 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20">
             
                  <path
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                </svg>
                <svg
                  id="icon-minus-1"
                  class="w-6 h-6 text-white hidden"
                  fill="currentColor"
                  viewBox="0 0 20 20">
             
                  <path
                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" />
                </svg>
              </button>
              <div
                id="content-1"
                class="text-white overflow-hidden max-h-0 transition-all duration-500"
                role="region"
                aria-labelledby="faq-button-1">
                <p class="p-4 texto">
                  Após a aquisição do filme previamente reservado, o cliente irá ter um prazo máximo de 72h
                  para fazer a devolução do mesmo. A entrega terá de ser feita na mesma loja à qual fez a aquisição.
                </p>
              </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-gray-800 shadow-md rounded-lg">
              <button
                class="w-full flex items-center justify-between p-4 focus:outline-none"
                onclick="toggleItem(2)"
                aria-expanded="false"
                aria-controls="content-2"
                id="faq-button-2">
                <span class="text-lg font-semibold espaco text-white">
                  Em caso de reserva, esta será disponibilizada no próprio dia?</span>
                <svg
                  id="icon-plus-2"
                  class="w-6 h-6 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20">
                  
                  <path
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                </svg>
                <svg
                  id="icon-minus-2"
                  class="w-6 h-6 text-white hidden"
                  fill="currentColor"
                  viewBox="0 0 20 20">
               
                  <path
                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" />
                </svg>
              </button>
              <div
                id="content-2"
                class="text-white overflow-hidden max-h-0 transition-all duration-500"
                role="region"
                aria-labelledby="faq-button-2">
                <p class="p-4 texto"> Sim, iremos assegurar a maior eficácia para a boa continuidade dos nossos clientes, de modo que após 15 minutos poderá estar
                  presente na loja para fazer o levantamento do filme resevado.</p>
              </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-gray-800 shadow-md rounded-lg">
              <button
                class="w-full flex items-center justify-between p-4 focus:outline-none"
                onclick="toggleItem(3)"
                aria-expanded="false"
                aria-controls="content-3"
                id="faq-button-3">
                <span class="text-lg font-semibold espaco text-white">
                  Caso não haja disponibilidade, é necessário ser o próprio a ir buscar à loja o filme reservado?</span>
                <svg
                  id="icon-plus-3"
                  class="w-6 h-6 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20">
                
                  <path
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                </svg>
                <svg
                  id="icon-minus-3"
                  class="w-6 h-6 text-white hidden"
                  fill="currentColor"
                  viewBox="0 0 20 20">
                 
                  <path
                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" />
                </svg>
              </button>
              <div
                id="content-3"
                class="text-white overflow-hidden max-h-0 transition-all duration-500"
                role="region"
                aria-labelledby="faq-button-3">
                <p class="p-4 texto">Desde que a pessoa tenha os dados necessários para fazer o levantamento da entrega, então não será necessário a presença do próprio.</p>
              </div>
            </div>


            <!-- Item 4 -->
            <div class="bg-gray-800 shadow-md rounded-lg">
              <button
                class="w-full flex items-center justify-between p-4 focus:outline-none"
                onclick="toggleItem(4)"
                aria-expanded="false"
                aria-controls="content-4"
                id="faq-button-2">
                <span class="text-lg font-semibold espaco text-white">
                  Qual a janela temporal, entre o lançamento dos filmes e a disponibilidade para aluguer?</span>
                <svg
                  id="icon-plus-4"
                  class="w-6 h-6 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20">
                  <!-- Plus Icon Path -->
                  <path
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                </svg>
                <svg
                  id="icon-minus-4"
                  class="w-6 h-6 text-white hidden"
                  fill="currentColor"
                  viewBox="0 0 20 20">
                  <!-- Minus Icon Path -->
                  <path
                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" />
                </svg>
              </button>
              <div
                id="content-4"
                class="text-white overflow-hidden max-h-0  transition-all duration-500"
                role="region"
                aria-labelledby="faq-button-4">
                <p class="p-4 texto">Estamos em constante atualização com os filmes que saem na atualidade, grantindo assim a maior eficácio e a possibilidade de
                  visualizar os filmes atuais no conforto da sua casa.</p>
              </div>
            </div>

            <!-- Add more items as needed -->
          </div>
        </div>
      </div>
    </div>


    <div class="tab-pane fade show active" id="contactos" role="tabpanel" aria-labelledby="contactos-tab">
      <div class="container-faq">
        <div class="max-w-xl">
          <h2 class="text-4xl font-extrabold pb-4 text-center text-white">Formulário de Contacto</h2>
          <section class="formulario-contacto">
            <form id="formulario" novalidate>

              <label>Nome </label><text style="color:red;">*</text>
              <input type="text" name="nome" class="form-control" required="">

              <label>Email </label><text style="color:red;">*</text>
              <input type="email" name="email" class="form-control" required>

              <label for="message">Mensagem <span style="color:red;">*</span></label>
              <textarea id="message" name="mensagem" class="form-control" rows="5" placeholder="Escreva a sua mensagem" required></textarea>
              <p style="color:red;">* Campos Obrigatórios</p>

              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </section>

        </div>
      </div>
    </div>




    <div class="tab-pane fade" id="lojas" role="tabpanel" aria-labelledby="lojas-tab">
      <div class="container-contactos">
        <div class="largura-contactos">
          <div class="container-loja">
            <h2 class="text-4xl font-extrabold py-4 text-center text-white">Castelo Branco</h2>
            <div class="row text-center">
              <div class="col-md-4 mb-3">
                <h5>Morada</h5>
                <p>Campus da Talagueira<br>Avenida do Empresário<br>6000-767 Castelo Branco</p>
              </div>
              <div class="col-md-4 mb-3">
                <h5>Contactos</h5>
                <p>Telefone: (+351) 272 339 300<br>
                <a href="mailto:contato@exemplo.com">loja.cbranco@codivideo.com</a></p>
              </div>
              <div class="col-md-4 mb-3">
                <h5>Horário</h5>
                <p>Todos os dias <br>08H00-22H00 </p>
              </div>
            </div>
            <iframe class="mapa" 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d766.1104525106266!2d-7.512379!3d39.819511!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3d5ea6bb2280e1%3A0x1c460157bc4b46c8!2sEscola%20Superior%20de%20Tecnologia%20-%20Instituto%20Polit%C3%A9cnico%20de%20Castelo%20Branco!5e0!3m2!1spt-PT!2spt!4v1715260155466!5m2!1spt-PT!2spt"
                width="100%" height="350px"></iframe>
          </div>


          <div class="container-loja">
            <h2 class="text-4xl font-extrabold mt-5 text-center text-white">Covilha</h2>
            <div class="row text-center">
              <div class="col-md-4 mb-3">
                <h5>Morada</h5>
                  <p>Campus da Talagueira<br>Avenida do Empresário<br>6000-767 Castelo Branco</p>
              </div>
              <div class="col-md-4 mb-3">
                <h5>Contactos</h5>
                <p>Telefone: (+351) 272 339 300<br>
                 <a href="mailto:contato@exemplo.com">loja.covilha@codivideo.com</a></p>
              </div>
              <div class="col-md-4 mb-3">
                <h5>Horário</h5>
                <p>Todos os dias <br>08H00-22H00 </p>
              </div>
            </div>
            <iframe class="mapa" 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d766.1104525106266!2d-7.512379!3d39.819511!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3d5ea6bb2280e1%3A0x1c460157bc4b46c8!2sEscola%20Superior%20de%20Tecnologia%20-%20Instituto%20Polit%C3%A9cnico%20de%20Castelo%20Branco!5e0!3m2!1spt-PT!2spt!4v1715260155466!5m2!1spt-PT!2spt"
                width="100%" height="350px"></iframe>
          </div>
          <div class="container-loja">
            <h2 class="text-4xl font-extrabold mt-5 text-center text-white">Coimbra</h2>
            <div class="row text-center">
              <div class="col-md-4 mb-3">
                <h5>Morada</h5>
                <p>Campus da Talagueira<br>Avenida do Empresário<br>6000-767 Castelo Branco</p>
              </div>
              <div class="col-md-4 mb-3">
                <h5>Contactos</h5>
                     <p>Telefone: (+351) 272 339 300<br>
              <a href="mailto:contato@exemplo.com">loja.coimbra@codivideo.com</a></p>
              </div>
              <div class="col-md-4 mb-3">
                <h5>Horário</h5>
                <p>Todos os dias <br>08H00-22H00 </p>
              </div>
            </div>
            <iframe class="mapa" 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d766.1104525106266!2d-7.512379!3d39.819511!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3d5ea6bb2280e1%3A0x1c460157bc4b46c8!2sEscola%20Superior%20de%20Tecnologia%20-%20Instituto%20Polit%C3%A9cnico%20de%20Castelo%20Branco!5e0!3m2!1spt-PT!2spt!4v1715260155466!5m2!1spt-PT!2spt"
                width="100%" height="350px"></iframe>
          </div>
        </div>
      </div>
    </div>



      <div class="tab-pane fade" id="equipa" role="tabpanel" aria-labelledby="equipa-tab">
      <div class="container-faq">
        <div class="max-w-xl">
          <h2 class="pb-4 text-center equipa">Equipa Técnica</h2>

           <h5 class="equipa">Luís Laia 20181127</h5>
            <h5 class="equipa">Nuno Matos 20231632 </h5>
           <h5 class="equipa">Tiago Mendes 20221685</h5>
           <h5 class="equipa">Rodrigo Lopes 20230321 </h5>
           <h5 class="equipa">Marcelo Esteves 62006091 </h5>
          <h5>
        </div>
      </div>
    </div>


    <!-- Modal HTML -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Informação</h5>
          </div>
          <div class="modal-body">
            Assim que possível, respondemos à sua mensagem.<br>
            Ao fechar, vai ser redirecionado para a página inicial.<br>
            Obrigado pelo contacto.
          </div>
          <div class="modal-footer">
            <button type="button" id="fecharBtn" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>


    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('formulario');
        const myModalEl = document.getElementById('myModal');
        const myModal = new bootstrap.Modal(myModalEl);

        form.addEventListener('submit', (event) => {
          event.preventDefault();

          if (form.checkValidity()) {
            myModal.show();
          } else {
            form.reportValidity();
          }
        });

        fecharBtn.addEventListener('click', () => {
          window.location.href = './pagina_inicial.php';
        });

      });
    </script>

    <style type="text/css">
      .tab-pane.fade {
        transition: all 0.3s;
        transform: translateY(1rem);
      }

      .tab-pane.fade.show {
        transform: translateY(0rem);
      }
    </style>


    <script>
      function toggleItem(id) {
        const content = document.getElementById(`content-${id}`);
        const iconPlus = document.getElementById(`icon-plus-${id}`);
        const iconMinus = document.getElementById(`icon-minus-${id}`);

        const isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";

        if (isOpen) {
          content.style.maxHeight = null;
          iconPlus.classList.remove("hidden");
          iconMinus.classList.add("hidden");
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
          iconPlus.classList.add("hidden");
          iconMinus.classList.remove("hidden");
        }
      }
    </script>
    <?php include "./footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>