document.addEventListener("DOMContentLoaded", () => { 

    const botao = document.getElementById("btn-explicacao");
    const popup = document.getElementById("explicacao-box");

    botao.addEventListener("click", () => {

        popup.innerHTML = `
            <h3>Como funciona?</h3>
            <p>A equação geral da reta é:</p>
            <p><strong>Ax + By + C = 0</strong></p>

            <p>Para verificar se um ponto <strong>(x₀, y₀)</strong> pertence à reta,  
            basta substituir suas coordenadas na equação:</p>

            <pre>
A·x₀ + B·y₀ + C = resultado
            </pre>

            <p>✔ Se o resultado for <strong>0</strong>, o ponto pertence.</p>
            <p>✘ Se for diferente de 0, não pertence.</p>

            <button id="fechar-explicacao">Fechar</button>
        `;

        popup.style.display = "block";

        document.getElementById("fechar-explicacao").addEventListener("click", () => {
            popup.style.display = "none";
        });
    });
});
