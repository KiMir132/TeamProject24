document.addEventListener("DOMContentLoaded", () => {
    const existing = document.querySelector(".nav-zoom");
    if (existing) return;

    const mount = document.getElementById("zoom-controls-mount");
    if (!mount) return;

    const box = document.createElement("div");
    box.className = "nav-zoom";

    box.innerHTML = `
        <button class="nav-zoom-btn" id="zoom-out" type="button">−</button>
        <span class="nav-zoom-level" id="zoom-level">100%</span>
        <button class="nav-zoom-btn" id="zoom-in" type="button">+</button>
    `;

    mount.appendChild(box);

    const zoomInButton = document.getElementById("zoom-in");
    const zoomOutButton = document.getElementById("zoom-out");
    const label = document.getElementById("zoom-level");

    let zoomLevel = 100;

    function applyZoom() {
        document.body.style.zoom = zoomLevel + "%";
        label.textContent = zoomLevel + "%";
    }

    zoomInButton.addEventListener("click", () => {
        if (zoomLevel < 200) {
            zoomLevel += 10;
            applyZoom();
        }
    });

    zoomOutButton.addEventListener("click", () => {
        if (zoomLevel > 50) {
            zoomLevel -= 10;
            applyZoom();
        }
    });

    applyZoom();
});