// Abrir Modal para Hábito
document.getElementById('addHabitBtn').onclick = function () {
    document.getElementById('habitModal').style.display = 'flex';
};

// Abrir Modal para Meta
document.getElementById('addGoalBtn').onclick = function () {
    document.getElementById('goalModal').style.display = 'flex';
};

// Fechar Modais
document.querySelectorAll('.close-btn').forEach(btn => {
    btn.onclick = function () {
        btn.closest('.modal').style.display = 'none';
    };
});

// Fechar Modal ao clicar fora
window.onclick = function (event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
};
