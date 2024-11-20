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
