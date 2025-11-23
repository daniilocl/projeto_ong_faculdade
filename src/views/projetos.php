<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Iniciativas | [Nome da ONG]</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="projetos.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="/Maos_Que_Ajudam/public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
     
    <?php include __DIR__ . '/../components/header.php'; ?>

    <main class="container">

        <section class="projetos-hero">
            <div class="hero-inner">
                <h1>Projetos que transformam vidas</h1>
                <p>Conheça as iniciativas em andamento e descubra como participar — seja com doações, voluntariado ou divulgação.</p>
                <div class="hero-ctas">
                    <a class="btn btn-primary btn-hero" href="/Maos_Que_Ajudam/src/views/doacoes.php">Contribua Agora</a>
                    <a class="btn btn-outline-secondary btn-ghost" href="#projetos-list">Ver Projetos</a>
                </div>
            </div>
        </section>

        <section id="projetos-list" class="filtro-acoes">
            <p><strong>Filtre por Área:</strong></p>
            <div class="botoes-filtro">
                <button class="btn-filtro active" data-categoria="todos"><i class="fas fa-list"></i> Todos</button>
                <button class="btn-filtro educacao" data-categoria="educacao"><i class="fas fa-graduation-cap"></i> Educação</button>
                <button class="btn-filtro saude" data-categoria="saude"><i class="fas fa-heartbeat"></i> Saúde</button>
                <button class="btn-filtro acolhimento" data-categoria="acolhimento"><i class="fas fa-home"></i> Acolhimento</button>
                <button class="btn-filtro digital" data-categoria="digital"><i class="fas fa-laptop"></i> Digital</button>
            </div>
        </section>

        <section class="projetos-grid">
            <div class="grid">
                <article class="project-card educacao" data-categoria="educacao">
                    <div class="project-media"><img src="/Maos_Que_Ajudam/public/imagens/logo/projetos/projetos.sala.png" alt="Monitoria Colaborativa"></div>
                    <div class="project-body">
                        <h3 class="project-title">Monitoria Colaborativa Digital</h3>
                        <p class="project-area area-educacao"><i class="fas fa-graduation-cap"></i> Educação</p>
                        <p class="project-desc">Apoio online para reforço escolar e inclusão digital dos alunos.</p>
                        <div class="project-meta">
                            <span class="status status-urgente">Em Ação</span>
                            <a href="#monitoria" class="btn-detalhe">Saiba Mais</a>
                        </div>
                    </div>
                </article>

                <article class="project-card saude" data-categoria="saude">
                    <div class="project-media"><img src="/Maos_Que_Ajudam/public/imagens/logo/doacoes/menino_maos_que_ajudam.png" alt="Sorriso Saudável"></div>
                    <div class="project-body">
                        <h3 class="project-title">Campanha Sorriso Saudável</h3>
                        <p class="project-area area-saude"><i class="fas fa-heartbeat"></i> Saúde</p>
                        <p class="project-desc">Ações de prevenção e atendimento odontológico para crianças.</p>
                        <div class="project-meta">
                            <span class="status status-concluido">Concluído</span>
                            <a href="#sorriso" class="btn-detalhe">Ver Relatório</a>
                        </div>
                    </div>
                </article>

                <article class="project-card acolhimento" data-categoria="acolhimento">
                    <div class="project-media"><img src="/Maos_Que_Ajudam/public/imagens/logo/doacoes/impacto_maos_que_ajudam.png" alt="Reforma Aconchego"></div>
                    <div class="project-body">
                        <h3 class="project-title">Reforma do Espaço Aconchego</h3>
                        <p class="project-area area-acolhimento"><i class="fas fa-home"></i> Acolhimento</p>
                        <p class="project-desc">Melhorias no espaço para acolhimento e atendimento social da comunidade.</p>
                        <div class="project-meta">
                            <span class="status status-urgente">Necessita Doações</span>
                            <a href="#reforma" class="btn-detalhe cta-principal">Doar Agora</a>
                        </div>
                    </div>
                </article>

                <article class="project-card digital" data-categoria="digital">
                    <div class="project-media"><img src="/Maos_Que_Ajudam/public/imagens/logo/doacoes/celular_maos_que_ajudam.png" alt="Inclusão Digital"></div>
                    <div class="project-body">
                        <h3 class="project-title">Oficina de Inclusão Digital Jovem</h3>
                        <p class="project-area area-digital"><i class="fas fa-laptop"></i> Digital</p>
                        <p class="project-desc">Capacitação em tecnologias para jovens em situação de vulnerabilidade.</p>
                        <div class="project-meta">
                            <span class="status status-aberto">Inscrições Abertas</span>
                            <a href="#digital" class="btn-detalhe">Inscrever-se</a>
                        </div>
                    </div>
                </article>

                <article class="project-card educacao" data-categoria="educacao">
                    <div class="project-media"><img src="/Maos_Que_Ajudam/public/imagens/logo/doacoes/menina_maos_que_ajudam.png" alt="Mochila do Saber"></div>
                    <div class="project-body">
                        <h3 class="project-title">Projeto Mochila do Saber</h3>
                        <p class="project-area area-educacao"><i class="fas fa-graduation-cap"></i> Educação</p>
                        <p class="project-desc">Distribuição de materiais escolares e atividades educativas para famílias.</p>
                        <div class="project-meta">
                            <span class="status status-aberto">Precisa Voluntários</span>
                            <a href="#mochila" class="btn-detalhe">Quero Ajudar</a>
                        </div>
                    </div>
                </article>

                <article class="project-card saude" data-categoria="saude">
                    <div class="project-media"><img src="/Maos_Que_Ajudam/public/imagens/logo/doacoes/caixas_maos_que_ajudam.png" alt="Cozinha Solidária"></div>
                    <div class="project-body">
                        <h3 class="project-title">Cozinha Solidária Semanal</h3>
                        <p class="project-area area-saude"><i class="fas fa-heartbeat"></i> Saúde</p>
                        <p class="project-desc">Distribuição de refeições e mobilização de doações alimentares.</p>
                        <div class="project-meta">
                            <span class="status status-urgente">Em Ação</span>
                            <a href="#cozinha" class="btn-detalhe cta-principal">Doe Alimentos</a>
                        </div>
                    </div>
                </article>
            </div>
        </section>

    </main>

    <?php include __DIR__ . '/../components/footer.php'; ?>

    <script>
        document.querySelectorAll('.btn-filtro').forEach(button => {
            button.addEventListener('click', () => {
                const categoria = button.getAttribute('data-categoria');

                document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                document.querySelectorAll('.project-card').forEach(card => {
                    const cat = card.getAttribute('data-categoria');
                    if (categoria === 'todos' || categoria === cat) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>

</body>

</html>