<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mãos que Ajudam</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./public/css/home.css">
  <link rel="stylesheet" href="./public/css/style.css">
</head>

<body>
  <!-- Header -->
  <?php include 'src/components/header.php'; ?>


  <!-- Carrossel -->
  <div id="carouselMaosQueAjudam" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item active position-relative">
        <div class="carousel-overlay"></div>
        <img src="public/imagens/logo/camisa.azul.png" class="d-block w-100" alt="Imagem 1">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
          <a href="/Maos_Que_Ajudam/index.php" class="text-white text-decoration-none">
            <h2 class="fw-bold">Quem Somos - Mãos que Ajudam</h2>
          </a>
          <h3>Unindo mãos para transformar vidas.</h3>
          <p>
            A ONG Mãos que Ajudam nasceu com o propósito de levar solidariedade, empatia e esperança a quem mais
            precisa. Acreditamo
            s que pequenas atitudes podem gerar grandes transformações. Nosso compromisso é ajudar
            pessoas de todas as idades e realidades, oferecendo oportunidades, acolhimento e apoio humano. Aqui, cada
            gesto conta — porque juntos, somos mais fortes.</p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item position-relative">
        <div class="carousel-overlay"></div>
        <img src="public/imagens/logo/doacoes/doacoes_carrossel.png" class="d-block w-100" alt="Imagem 2">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
          <a href="/Maos_Que_Ajudam/src/views/doacoes.php" class="text-white text-decoration-none color-white">
            <h2 class="fw-bold">Doações</h2>
          </a>
          <h3>Sua contribuição transforma o futuro.</h3>
          <p>Doe amor, doe esperança, doe o que puder.
A sua contribuição faz a diferença! Na Mãos que Ajudam, você pode doar qualquer valor de forma única ou
aderir a um plano mensal de contribuição, garantindo que nossos projetos continuem mudando vidas todos os
dias. Cada real doado é convertido em oportunidades, alimentos, cursos e sorrisos. Participe, sua
generosidade é o primeiro passo para um futuro melhor.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item position-relative">
        <div class="carousel-overlay"></div>
        <img src="public/imagens/logo/projetos/projetos.sala.png" class="d-block w-100" alt="Imagem 3">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
          <a href="/Maos_Que_Ajudam/src/views/projetos.php" class="text-white text-decoration-none">
            <h2 class="fw-bold"> Projetos – Educação e oportunidades para todos</h2>
          </a>
          <h3>Educar é semear o amanhã.</h3>
          <p>Nossos projetos sociais têm como foco oferecer cursos gratuitos para crianças do ensino fundamental,
adolescentes do ensino médio e adultos que buscam uma nova chance de aprendizado. Levamos educação e
capacitação a locais onde o acesso ainda é limitado, promovendo a inclusão social e o desenvolvimento
pessoal. Aqui, cada curso é uma porta aberta para o futuro, e o conhecimento é o caminho da
transformação.</p>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="carousel-item position-relative">
        <div class="carousel-overlay"></div>
        <img src="public/imagens/logo/voluntarios/voluntarios.azul.png" class="d-block w-100" alt="Imagem 4">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
          <a href="/Maos_Que_Ajudam/src/views/cadastro_voluntario.php" class="text-white text-decoration-none">
            <h2 class="fw-bold">Seja um Voluntário – Junte-se a nós</h2>
          </a>
          <h3>Mudar o mundo começa com uma atitude.</h3>
          <p>Você pode fazer parte dessa corrente do bem! A Mãos que Ajudam conta com o apoio de voluntários
dedicados que doam tempo, energia e amor para transformar vidas. Seja ajudando em eventos, organizando campanhas ou participando dos projetos, seu trabalho faz a diferença. Cadastre-se e venha viver essa
experiência que muda você e o mundo ao seu redor. </p>
        </div>
      </div>

      <!-- Slide 5 -->
      <div class="carousel-item position-relative">
        <div class="carousel-overlay"></div>
        <img src="public/imagens/logo/parcerias/parcerias.azul.png" class="d-block w-100" alt="Imagem 4">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
          <a href="" class="text-white text-decoration-none">
            <h2 class="fw-bold"> Contribuições e Parcerias – Juntos somos mais fortes</h2>
          </a>
          <h3>Parcerias que inspiram transformação.</h3>
          <p>Acreditamos no poder da união! A Mãos que Ajudam tem o orgulho de contar com parcerias sólidas que
fortalecem nosso impacto social — entre elas, as prefeituras de Ferraz de Vasconcelos, Suzano e
Itaquaquecetuba, o time do Corinthians e a Escola Objetivo. Essas alianças nos permitem alcançar mais
pessoas, ampliar nossos projetos e multiplicar o bem. Porque quando caminhamos juntos, chegamos mais
longe.</p>
        </div>
      </div>

    </div>

    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMaosQueAjudam" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselMaosQueAjudam" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Próximo</span>
    </button>

    <!-- Indicadores -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselMaosQueAjudam" data-bs-slide-to="0" class="active"
        aria-current="true"></button>
      <button type="button" data-bs-target="#carouselMaosQueAjudam" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#carouselMaosQueAjudam" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#carouselMaosQueAjudam" data-bs-slide-to="3"></button>
      <button type="button" data-bs-target="#carouselMaosQueAjudam" data-bs-slide-to="4"></button>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'src/components/footer.php'; ?>

  

</body>

</html>
