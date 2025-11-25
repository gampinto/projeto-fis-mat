document.addEventListener("DOMContentLoaded", () => {
    const botao = document.querySelector(".mostrar-resolucao");
    const painel = document.querySelector(".painel-resolucao");

    botao.addEventListener("click", () => {
        painel.classList.toggle("aberto");
    });
});
