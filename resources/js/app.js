import Alpine from "alpinejs";
import "./bootstrap";

window.Alpine = Alpine;
Alpine.start();

let generos = [];

function initGenerosFromDOM() {
    generos = [];
    const inputs = document.querySelectorAll(
        '#generosList input[name="generos[]"]'
    );
    inputs.forEach((input) => {
        const id = parseInt(input.value);
        const li = document.getElementById(`li_genero_${id}`);
        if (li) {
            const nome = li.querySelector("span")?.innerText || "";
            generos.push({ id, nome });
        }
    });
}

function createGeneroInputElement(generoId) {
    const input = document.createElement("input");
    input.type = "hidden";
    input.name = "generos[]";
    input.value = generoId;
    input.id = `input_genero_${generoId}`;
    return input;
}

function createGeneroLiElement(generoId, generoNome) {
    const li = document.createElement("li");
    li.id = `li_genero_${generoId}`;
    li.classList.add(
        "flex",
        "flex-row",
        "justify-between",
        "items-center",
        "text-sm",
        "rounded",
        "font-bold",
        "cursor-pointer",
        "p-1"
    );

    const span = document.createElement("span");
    span.innerText = generoNome;

    const deleteBtn = createGeneroDeleteButton(generoId);

    li.appendChild(span);
    li.appendChild(deleteBtn);

    return li;
}

function createGeneroDeleteButton(generoId) {
    const button = document.createElement("button");
    button.type = "button";
    button.innerText = "Remover";
    button.classList.add(
        "text-xs",
        "text-red-500",
        "hover:bg-red-200",
        "rounded",
        "font-bold",
        "p-2"
    );

    button.addEventListener("click", () => removerGeneroDoLivro(generoId));

    return button;
}

function adicionarGeneroAoLivro(generoId, generoNome) {
    if (generos.some((g) => g.id === generoId)) return;

    const generosElement = document.getElementById("generosList");

    const generoInput = createGeneroInputElement(generoId);
    const generoLi = createGeneroLiElement(generoId, generoNome);

    generos.push({ id: generoId, nome: generoNome });

    generosElement.appendChild(generoInput);
    generosElement.appendChild(generoLi);
}

function removerGeneroDoLivro(generoId) {
    document.getElementById(`li_genero_${generoId}`)?.remove();
    document.getElementById(`input_genero_${generoId}`)?.remove();
    generos = generos.filter((g) => g.id !== generoId);
}

document.addEventListener("DOMContentLoaded", () => {
    initGenerosFromDOM();
    const generoSelectElement = document.getElementById("generoSelect");

    if (generoSelectElement !== null) {
        document
            .getElementById("btnAdicionar")
            .addEventListener("click", () => {
                const selectedOption = generoSelectElement.selectedOptions[0];
                const generoId = parseInt(generoSelectElement.value);
                const generoNome = selectedOption?.textContent?.trim();

                if (!generoId || !generoNome) return;

                adicionarGeneroAoLivro(generoId, generoNome);
            });
    }

    const buttons = document.querySelectorAll(".excluir-btn");

    buttons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault();

            if (
                !confirm(`Tem certeza que deseja excluir o item?\nEsta ação não pode ser desfeita!`)
            ) {
                return;
            }

            const form = button.closest("form");
            if (form) {
                form.submit();
            } else {
                console.error(
                    "Formulário não encontrado para o botão de exclusão."
                );
            }
        });
    });
});

window.removerGeneroDoLivro = removerGeneroDoLivro;
