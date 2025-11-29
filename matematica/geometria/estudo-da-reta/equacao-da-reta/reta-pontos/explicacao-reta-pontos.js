document.addEventListener("DOMContentLoaded", () => {

    const botao = document.getElementById("btn-explicacao");
    const caixa = document.getElementById("explicacao-box");

    botao.addEventListener("click", () => {

        if (caixa.style.display === "none" || caixa.style.display === "") {
            caixa.style.display = "block";
        } else {
            caixa.style.display = "none";
        }
    });
});
