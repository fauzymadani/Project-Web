document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector(".form-control");
    const contentContainer = document.querySelector(".container");

    searchInput.addEventListener("input", function() {
        const query = searchInput.value.toLowerCase();
        const textNodes = contentContainer.querySelectorAll("p, h1, h2, h3, h4, h5, h6, li, a, span");

        textNodes.forEach((node) => {
            let text = node.textContent;
            if (!query) {
                node.innerHTML = text;
                return;
            }

            let regex = new RegExp(`(${query})`, "gi");
            let newText = text.replace(regex, `<span class="highlight">$1</span>`);
            node.innerHTML = newText;
        });
    });
});
