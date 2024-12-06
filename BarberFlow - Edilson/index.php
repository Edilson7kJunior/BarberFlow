<?php
session_start(); // Iniciar a sessão no início da página
?>

<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BarberFlow - Agende seu corte</title>

    <!-- Icons -->
    <link rel="stylesheet" href="assets/fonts/style.css" />

    <!-- Swiper -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- Styles -->
    <link rel="stylesheet" href="style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <style>
        /* Estilização do container do formulário */
        .form-container {
          display: flex;
          justify-content: center; /* Centralizar o formulário */
          width: 100%;
        }

        .form-agendamento {
          background-color: #ffffff;
          border-radius: 8px;
          padding: 40px;
          box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
          width: 100%;
          max-width: 600px; /* Aumentando a largura máxima para acomodar inline */
        }

        .form-agendamento form {
          display: flex;
          flex-wrap: wrap; /* Permitir que os itens se movam para a próxima linha */
          gap: 15px; /* Espaçamento entre os elementos */
        }

        .form-agendamento label {
          font-weight: bold;
          font-size: 1.1rem;
          color: #333;
          flex-basis: 100%; /* Cada label ocupará toda a largura */
          margin-bottom: 5px; /* Espaçamento entre label e campo */
        }

        .form-agendamento input[type="text"],
        .form-agendamento input[type="date"],
        .form-agendamento input[type="time"],
        .form-agendamento select {
          flex: 1; /* Permitir que os campos se expandam */
          padding: 12px 15px;
          font-size: 1rem;
          border: 1px solid #ccc;
          border-radius: 4px;
          background-color: #f9f9f9;
          transition: all 0.3s ease;
        }

        .form-agendamento input[type="text"]:focus,
        .form-agendamento input[type="date"]:focus,
        .form-agendamento input[type="time"]:focus,
        .form-agendamento select:focus {
          border-color: #007bff;
          outline: none;
          background-color: #fff;
        }

        .form-agendamento input[type="submit"] {
          padding: 12px;
          background-color: var(--base-color);
          color: #ffffff;
          font-size: 1.1rem;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        .form-agendamento input[type="submit"]:hover {
          background-color: #0056b3;
        }
       .form-agendamento form {
            flex-direction: column; /* Colocar em coluna em telas menores */
          }
        
    </style>
  </head>
  <body>
    <header id="header">
      <nav class="container">
        <a class="logo" href="#"
          ><i class="icon-barber-shop"></i> Barber<span>Flow</span>.</a
        >
        <!-- MENU -->
        <div class="menu">
          <ul class="grid">
            <li><a class="title" href="#home">Início</a></li>
            <li><a class="title" href="#about">Fidelidade</a></li>
            <li><a class="title" href="#services">Serviços</a></li>
            <li><a class="title" href="#testimonials">Depoimentos</a></li>
            <li><a class="title" href="#contact">Contato</a></li>
          </ul>
        </div>

        
        <!-- Botão Entrar/Registrar ou Olá, (Nome) -->
        <div class="auth-button">
            <?php if (isset($_SESSION['nome_usuario'])): ?>
                <span style="color: white; font-weight: bold;">Olá, <?php echo htmlspecialchars($_SESSION['nome_usuario']); ?></span>
                <a class="button sair-button" href="./registro-login/logout.php" style="margin-left: 15px;">Sair</a>
            <?php else: ?>
                <a class="button" href="./registro-login/registro-login.php">Entrar/Registrar</a>
            <?php endif; ?>
        </div>
        <div class="toggle icon-menu"></div>
        <div class="toggle icon-close"></div>
      </nav>
    </header>
    <main>
      <!-- HOME -->
      <section class="section" id="home">
        <div class="container grid">
          <div class="image">
          <img
            src="https://i.imgur.com/3Ibj7IE.jpeg"
            alt="Homem cortando o cabelo"
          />
          </div>
          <div class="text">
              <h1 class="title">
                Barber<span style="color: hsl(220, 60%, 30%);">Flow</span>.
              </h1>
          <p style="text-align: justify; font-size: 1.1em; line-height: 1.5">
              Transforme seu visual com estilo e elegância! Venha nos visitar e descubra nossos serviços de qualidade, onde cada corte é uma obra-prima.
          </p>
            <?php if (isset($_SESSION['nome_usuario'])): ?>
            <a
              class="button"
              href="#agendamentos"
              >Agendamento</a
            >
            <?php endif; ?>
          </div>
        </div>
      </section>

      <div class="divider-1"></div>

      <!-- ABOUT -->
      <section class="section" id="about">
        <div class="container grid">
          <div class="image">
          <img
            src="https://i.imgur.com/Lzs6UpA.jpeg"
            alt="Cartão fidelidade"
            style="width: 300px; height: auto;"
          />

          </div>
          <div class="text">
            <h2 class="title">Fidelidade</h2>
            <p>
              Faça parte do clube de clientes fiéis e desfrute de um atendimento personalizado, ofertas especiais e muito mais.
            </p>
            <br>
            <p>
              Seja fiél a nossa barbearia e aproveite benefícios exclusivos na Barber<span style="color: hsl(220, 60%, 30%);">Flow</span>! A cada corte ou serviço realizado, você acumula pontos que podem ser trocados por descontos, brindes e serviços gratuitos. Quanto mais você nos visita, mais vantagens você ganha!
            </p>
          </div>
        </div>
      </section>

      <div class="divider-2"></div>

      <!-- SERVICES -->
      <section class="section" id="services">
        <div class="container grid">
          <header>
            <h2 class="title">Serviços</h2>
            <p class="subtitle">
              Com mais de 10 anos no mercado, o Barber<span style="color: hsl(220, 60%, 30%);">Flow</span> já conquistou clientes de inúmeros países com seus cortes de cabelo inovadores e tratamentos totalmente naturais e exclusivos.
            </p>
          </header>
          <div class="cards grid">
            <div class="card">
              <i class="icon-trim"></i>
              <h3 class="title">Cabelo</h3>
              <p>
                A nossa equipe é repleta de profissionais renomados e famosos
                por lançarem tendências com cortes diferenciados e clássicos.
              </p>
            </div>

            <div class="card">
              <i class="icon-razor"></i>
              <h3 class="title">Barba</h3>
              <p>
                Uma barbearia não é um barbearia se não tiver um bom serviço de
                barba, por isso a navalha é a nossa amiga.
              </p>
            </div>
            <div class="card">
              <i class="icon-eyebrow"></i>
              <h3 class="title">Sobrancelha</h3>
              <p>
                Design de sobrancelha feito pelos melhores profissionais do
                Brasil que utilizam métodos estrangeiros e próprios.
              </p>
            <!--
            </div>
            <div class="card">
              <i class="icon-nail-clipper"></i>
              <h3 class="title">Manicure</h3>
              <p>
                Os cuidados com as mãos e os pés não devem ficar de lado, ainda
                mais para um homem moderno que deseja se cuidar.
              </p>
            </div>
            <div class="card">
              <i class="icon-tattoo-machine"></i>
              <h3 class="title">Tatuagem</h3>
              <p>
                Estúdio de tatuagem com profissionais altamente capacitados que
                vão fazer você ficar com um melhor visual!
              </p>
            </div>
            <div class="card">
              <i class="icon-cosmetic"></i>
              <h3 class="title">Tratamentos</h3>
              <p>
                O barbershop também conta com diversos outros tratamentos
                naturais e totalmente veganos, para qualquer tipo de cabelo.
              </p>
            </div> -->
          </div>
        </div>
      </section>

      <div class="divider-1"></div>

      <!-- TESTIMONIALS -->
      <section class="section" id="testimonials">
        <div class="container">
          <header>
            <h2 class="title">Depoimentos de quem já passou por aqui</h2>
          </header>
          <div class="testimonials swiper-container">
            <div class="swiper-wrapper">
              <div class="testimonials swiper-slide">
                <blockquote>
                  <p>
                    <span>&ldquo;</span>
                    O BarberFlow mudou completamente a maneira como gerencio minha barbearia. Agora meus clientes podem agendar cortes online com facilidade, e o sistema de gestão é super intuitivo.
                  </p>
                  <cite>
                    <img
                      src="assets/photos/1.jpg"
                      alt="Foto de Eduardo Santos"
                    />
                    Eduardo Santos 
                  </cite>
                </blockquote>
              </div>

              <div class="testimonials swiper-slide">
                <blockquote>
                  <p>
                    <span>&ldquo;</span>
                    O design moderno e a interface simples do BarberFlow são incríveis. Meus clientes adoram a facilidade de agendar um horário pelo site, e a equipe conseguiu se adaptar super rápido. Com certeza elevou o nível do nosso atendimento.
                  </p>
                  <cite>
                    <img src="assets/photos/2.jpg" alt="Foto de Junior Costa" />
                    Maria
                  </cite>
                </blockquote>
              </div>
              <div class="testimonials swiper-slide">
                <blockquote>
                  <p>
                    <span>&ldquo;</span>
                    Com o BarberFlow, tudo ficou mais organizado, e o suporte técnico é ótimo! Sempre que tive uma dúvida, o atendimento foi rápido e eficiente. Estou muito satisfeito com o sistema. Parabéns a equipe!
                  </p>
                  <cite>
                    <img
                      src="assets/photos/3.jpg"
                      alt="Foto de Matheus Silva"
                    />
                    Matheus Silva
                  </cite>
                </blockquote>
              </div>
              <div class="testimonials swiper-slide">
                <blockquote>
                  <p>
                    <span>&ldquo;</span>
                    Não tenho o que reclamar dessa barbearia! O atendimento é
                    excelente e o ambiente é melhor ainda, mas o que mais me
                    chamou atenção foi a qualidade dos serviços oferecidos.
                  </p>
                  <cite>
                    <img
                      src="assets/photos/4.jpg"
                      alt="Foto de Gabriel Almeida"
                    />
                    Gabriel Almeida
                  </cite>
                </blockquote>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <div class="divider-2"></div>
      <?php if (isset($_SESSION['nome_usuario'])): ?>
      <section class="section" id="agendamentos">
        <div class="container grid">
          <div class="text">
            <h2 class="title">Agendamentos</h2>
            <p>
              Faça o seu agendamento online de forma prática e rápida! Escolha o serviço, selecione o horário e garanta o seu atendimento preferencial na BarberFlow.
            </p>
            <br>
            <p>
              Nossa equipe está sempre pronta para te atender da melhor forma possível, garantindo qualidade em cada serviço. Agende agora e aproveite a experiência!
            </p>
          </div>

           <div class="form-agendamento">
            <!-- Ação direcionada ao FormSubmit para enviar o e-mail -->
            <form action="https://formsubmit.co/daviemanuel19y@gmail.com" method="post">
              <!-- Campo oculto para evitar spam -->
              <input type="hidden" name="_captcha" value="false">

              <label for="nome">Nome:</label>
              <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

              <label for="servico">Serviço:</label>
              <select id="servico" name="servico" required>
                <option value="">Selecione um serviço</option>
                <option value="Corte de cabelo">Corte de cabelo</option>
                <option value="Barba">Barba</option>
                <option value="Sobrancelha">Sobrancelha</option>
              </select>

              <label for="barbeiro">Barbeiro:</label>
              <select id="barbeiro" name="barbeiro" required>
                <option value="">Selecione um barbeiro</option>
                <option value="joao">João</option>
                <option value="mario">Mário</option>
                <option value="pedro">Pedro</option>
              </select>

              <div id="foto-barbeiro-container">
                <img id="foto-barbeiro" src="" alt="Foto do barbeiro" style="display: none;">
              </div>

              <label for="data">Data:</label>
              <select id="data" name="data" required>
                <option value="">Selecione uma data</option>
              </select>

              <label for="hora">Horário:</label>
              <select id="hora" name="hora" required>
                <option value="">Selecione um horário</option>
              </select>

              <input type="submit" value="Agendar" class="button">
            </form>
          </div>

          <style>
            #foto-barbeiro-container {
              margin-top: 10px;
            }

            #foto-barbeiro {
              width: 150px;
              height: 150px;
              border-radius: 50%;
              object-fit: cover; /* Mantém a proporção da imagem e corta o excesso */
              border: 2px solid hsl(220, 60%, 30%); /* Opcional: borda ao redor da imagem */
            }
          </style>

          <script>
            document.addEventListener("DOMContentLoaded", function() {
              const dataSelect = document.getElementById("data");
              const horaSelect = document.getElementById("hora");
              const barbeiroSelect = document.getElementById("barbeiro");
              const fotoBarbeiro = document.getElementById("foto-barbeiro");

              // Lista de barbeiros e URLs das fotos
              const fotosBarbeiros = {
                joao: "https://i.imgur.com/VWUMwFQ.jpeg", // Substitua por URL da foto do João
                mario: "https://i.imgur.com/Q4NwAt8.jpeg", // Substitua por URL da foto do Mário
                pedro: "https://i.imgur.com/N1BFw4L.jpeg"  // Substitua por URL da foto do Pedro
              };

              // Função para mostrar a foto do barbeiro selecionado
              barbeiroSelect.addEventListener("change", function() {
                const barbeiroSelecionado = barbeiroSelect.value;
                if (fotosBarbeiros[barbeiroSelecionado]) {
                  fotoBarbeiro.src = fotosBarbeiros[barbeiroSelecionado];
                  fotoBarbeiro.style.display = "block";
                } else {
                  fotoBarbeiro.style.display = "none";
                }
              });

              // Função para gerar as datas de 01/11 até 11/11 com os dias da semana
              function gerarDatas() {
                const dataInicio = new Date(2024, 10, 1);
                const dataFim = new Date(2024, 10, 11);
                const diasDaSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];

                while (dataInicio <= dataFim) {
                  const option = document.createElement("option");
                  const diaSemana = diasDaSemana[dataInicio.getDay()];
                  const dataFormatada = dataInicio.toLocaleDateString('pt-BR');

                  option.value = dataFormatada;
                  option.textContent = `${dataFormatada} - ${diaSemana}`;
                  dataSelect.appendChild(option);

                  dataInicio.setDate(dataInicio.getDate() + 1);
                }
              }

              // Função para definir os horários disponíveis
              function atualizarHorarios() {
                horaSelect.innerHTML = '<option value="">Selecione um horário</option>';
                const horariosDisponiveis = [];
                const inicio = 10;
                const fim = 17;
                const intervalo = 45;

                for (let hora = inicio; hora < fim; hora++) {
                  for (let min = 0; min < 60; min += intervalo) {
                    const horario = `${String(hora).padStart(2, '0')}:${String(min).padStart(2, '0')}`;
                    horariosDisponiveis.push(horario);
                  }
                }

                horariosDisponiveis.forEach(horario => {
                  const option = document.createElement("option");
                  option.value = horario;
                  option.textContent = horario;
                  horaSelect.appendChild(option);
                });
              }

              gerarDatas();
              dataSelect.addEventListener("change", atualizarHorarios);
            });
          </script>

      <?php endif; ?>
    <div class="divider-1"></div>
    <!-- CONTACT -->
    <section class="section" id="contact">
      <div class="container grid">
        <div class="text">
          <h2 class="title">Entre em contato com a gente!</h2>
          <p>
            Entre em contato com o Barber<span style="color: hsl(220, 60%, 30%);">Flow</span>, queremos tirar suas dúvidas,
            ouvir suas críticas e sugestões.
          </p>
          <a
            href="https://api.whatsapp.com/send?phone=+5584991821619&text=Olá! Gostaria de agendar um horário."
            class="button"
            target="_blank"
            ><i class="icon-whatsapp"></i> Entrar em contato</a
          >
        </div>

        <div class="links">
          <ul class="grid">
            <!--<li><i class="icon-phone"></i>+55 (84) 99182-1619</li> -->
            <li><i class="icon-map-pin"></i>R. Parelhas - Cidade da Esperança, Natal - RN, 59070-270</li>
            <!--<li><i class="icon-mail"></i>contato@barberflow.com</li> -->
          </ul>

          <!-- Mapa da Barbearia -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.2230203010736!2d-35.237369699999995!3d-5.824144299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b25515c8a56ad9%3A0xbcf1e09560edc997!2sBarbearia%209513!5e0!3m2!1spt-PT!2sbr!4v1729600932484!5m2!1spt-PT!2sbr"
            width="100%"
            height="300"
            style="border:0; margin-top: 20px;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </section>

      <div class="divider-1"></div>
    </main>

<!-- FOOTER -->
<footer class="section">
  <div class="container grid" style="display: flex; justify-content: space-between; align-items: center;">
    <div class="brand" style="flex: 1; text-align: left; margin-left: 20px;"> <!-- Ajusta a margem à esquerda -->
      <a class="logo logo-alt" href="#home">
        <img src="https://i.imgur.com/Kedy78E.png" alt="BarberFlow Logo" style="width: 65px; height: auto;"> <!-- Diminuí a largura da logo -->
      </a>
    </div>
    <div class="social-networks">
      <a href="https://www.instagram.com" target="_blank">
        <i class="icon-instagram"></i>
      </a>
      <a href="https://pt-br.facebook.com" target="_blank">
        <i class="icon-facebook"></i>
      </a>
      <a href="https://www.youtube.com" target="_blank">
        <i class="icon-youtube"></i>
      </a>
    </div>
  </div>
</footer>

<!-- BUTTON BACK TO TOP -->
<a href="#home" class="back-to-top"><i class="icon-arrow-thin-up"></i></a>

<!-- Swiper -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- ScrollReveal -->
<script src="https://unpkg.com/scrollreveal"></script>

<!-- main.js -->
<script src="main.js"></script>


  </body>
</html>