document.addEventListener("DOMContentLoaded", function() {
    let rickrollLink = document.querySelector('a[href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"]');
    if (rickrollLink) {
        rickrollLink.addEventListener("click", function(event) {
            event.preventDefault();
            rickrollLink.innerText = "Loading...";
            setTimeout(() => {
                window.location.href = rickrollLink.href;
            }, 2000);
        });
    }

    // 🔹 Doom Mode (Trigger: tekan "dd")
    let keyPressed = [];
    let chaosActive = false;
    document.addEventListener("keydown", function(event) {
        keyPressed.push(event.key.toLowerCase());
        if (keyPressed.slice(-2).join("") === "dd" && !chaosActive) {
            chaosActive = true;
            activateDoomMode();
        }
        setTimeout(() => (keyPressed = []), 1000);
    });

    function activateDoomMode() {
        document.body.classList.add("doom-mode");
        document.querySelectorAll("h1, h2, h3, p, a, .card").forEach((el) => {
            el.classList.add("shake");
        });

        let doomMusic = new Audio("https://doom2.net/doomdepot/music/snes%20doom/e1m1%20-%20at%20doom's%20gate.mp3");
        doomMusic.loop = true;
        doomMusic.play();

        setTimeout(() => {
            document.body.classList.remove("doom-mode");
            document.querySelectorAll(".shake").forEach((el) => el.classList.remove("shake"));
            doomMusic.pause();
            doomMusic.currentTime = 0;
            chaosActive = false;
        }, 15000);
    }

    const slider = document.querySelector(".testimoni-slider");
    const leftBtn = document.querySelector(".scroll-btn.left");
    const rightBtn = document.querySelector(".scroll-btn.right");
    let scrollAmount = 0;
    const cardWidth = 320; // Ukuran tiap kartu (termasuk margin)

    function scrollLeft() {
        if (scrollAmount > 0) {
            scrollAmount -= cardWidth;
            slider.style.transform = `translateX(-${scrollAmount}px)`;
        }
    }

    function scrollRight() {
        const maxScroll = slider.scrollWidth - document.querySelector(".testimoni-wrapper").clientWidth;
        if (scrollAmount < maxScroll) {
            scrollAmount += cardWidth;
            slider.style.transform = `translateX(-${scrollAmount}px)`;
        }
    }

    leftBtn.addEventListener("click", scrollLeft);
    rightBtn.addEventListener("click", scrollRight);
});
