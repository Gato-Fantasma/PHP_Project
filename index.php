<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastramento de Rotina</title>
    <link rel="stylesheet" href="Csspagprinc.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <!-- Adicione itens de navegação aqui -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Roti
            </a>
        </div>
    </nav>
    <!-- Seção inicial -->
    <div id="inicio">
        <h1 class="mascara">.</h1>
        <h1 class="mascara">.</h1>  <!-- Texto principal com efeito de máscara -->
        <p class="subtexto">"Não existe falta de tempo, existe falta de priorização"</p> <!-- Frase sem efeito -->
        <button onclick="location.href='Telalogin.html'">Vamos começar?</button> <!-- Botão que redireciona -->
    </div>
      <!-- Div de transição com degradê -->
      <div class="gradient-transition"></div>

    <!-- Curva SVG abaixo da seção -->
    <div class="wave-container">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="url(#gradient)" fill-opacity="1" d="M0,224L60,213.3C120,203,240,181,360,165.3C480,149,600,139,720,160C840,181,960,235,1080,224C1200,213,1320,139,1380,101.3L1440,64L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
            <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" style="stop-color:#d4af37;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#00c4cc;stop-opacity:1" />
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="social-media">
        <a href="https://www.instagram.com/seu_perfil" class="social-link">
            <div class="social-item">
                <i class="bi bi-instagram"></i>
                <span>Instagram</span>
            </div>
        </a>
        <a href="https://www.youtube.com/seu_canal" class="social-link">
            <div class="social-item">
                <i class="bi bi-youtube"></i>
                <span>YouTube</span>
            </div>
        </a>
    </div>


    
    </div>
</body>
</html>