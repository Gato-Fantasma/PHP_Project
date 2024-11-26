// Seleciona os elementos relacionados ao modal de meta
const modal = document.getElementById("modal"); // Modal para adicionar meta
const openModalButton = document.getElementById("add-btn"); // Botão para abrir o modal de meta
const closeModalButton = document.getElementById("close-modal"); // Botão para fechar o modal de meta

// Função para abrir o modal de meta ao clicar no botão
openModalButton.addEventListener("click", () => {
  modal.classList.remove("hidden"); // Remove a classe "hidden" para exibir o modal
});

// Função para fechar o modal de meta ao clicar no botão
closeModalButton.addEventListener("click", () => {
  modal.classList.add("hidden"); // Adiciona a classe "hidden" para esconder o modal
});

// Seleciona os elementos relacionados ao modal de hábito
const modalHabito = document.getElementById("modal-habito"); // Modal para adicionar hábito
const openModalHabitoButton = document.getElementById("add-hbt-btn"); // Botão para abrir o modal de hábito
const closeModalHabitoButton = document.getElementById("close-modal-hbt"); // Botão para fechar o modal de hábito

// Função para abrir o modal de hábito ao clicar no botão
openModalHabitoButton.addEventListener("click", () => {
  modalHabito.classList.remove("hidden"); // Remove a classe "hidden" para exibir o modal
});

// Função para fechar o modal de hábito ao clicar no botão
closeModalHabitoButton.addEventListener("click", () => {
  modalHabito.classList.add("hidden"); // Adiciona a classe "hidden" para esconder o modal
});

    // Seleciona o botão e a mensagem
    const botao = document.getElementById("mostrar-mensagem");
    const mensagem = document.getElementById("mensagem");

    // Adiciona evento ao botão
    botao.addEventListener("click", () => {
      mensagem.style.display = "block"; // Exibe a mensagem
      setTimeout(() => {
        mensagem.style.display = "none"; // Esconde após 3 segundos
      }, 3000); // Tempo em milissegundos
    });
 // Lista inicial de frases
 let frases = [
  "Seja a mudança que você deseja ver no mundo.",
  "A persistência é o caminho do êxito.",
  "O sucesso é a soma de pequenos esforços repetidos diariamente.",
  "Acredite em si mesmo e em tudo o que você é."
];

// Seleciona os elementos
const mensagem = document.getElementById("mensagem");
const botaoAdicionar = document.getElementById("adicionar-frase");

// Função para exibir uma frase aleatória
function exibirFraseAleatoria() {
  const fraseAleatoria = frases[Math.floor(Math.random() * frases.length)];
  mensagem.textContent = fraseAleatoria; // Define o texto da mensagem
  mensagem.style.display = "block"; // Exibe a mensagem
  setTimeout(() => {
    mensagem.style.display = "none"; // Esconde após 3 segundos
  }, 3000); // Tempo em milissegundos
}

// Exibe uma frase ao carregar a página
window.onload = exibirFraseAleatoria;

// Adiciona nova frase na lista
botaoAdicionar.addEventListener("click", () => {
  const novaFrase = prompt("Digite uma nova frase:");
  if (novaFrase) {
    frases.push(novaFrase); // Adiciona a nova frase ao array
    alert("Frase adicionada com sucesso!");
  }
});