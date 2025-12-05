document.addEventListener("DOMContentLoaded", () => {
    const existing = document.getElementById("zoom-controls");
    if (existing) return;

    const box = document.createElement("div");
    box.id = "zoom-controls";

    box.style.position = "fixed";
    box.style.top = "6px";
    box.style.right = "10px";
    box.style.background = "#263145ff";
    box.style.color = "#ffffff";
    box.style.padding = "4px 12px";
    box.style.borderRadius = "999px";
    box.style.display = "flex";
    box.style.alignItems = "center";
    box.style.gap = "6px";
    box.style.fontSize = "12px";
    box.style.border = "1px solid rgba(0,0,0,0.3)";
    box.style.boxShadow = "0 2px 8px rgba(0,0,0,0.25)";
    box.style.zIndex = "9999";

    box.innerHTML = `
        <button id="zoom-out">−</button>
        <span id="zoom-level" style="min-width:40px; text-align:center;">100%</span>
        <button id="zoom-in">+</button>
    `;

    document.body.appendChild(box);

    const zoomInButton = document.getElementById("zoom-in");
    const zoomOutButton = document.getElementById("zoom-out");
    const label = document.getElementById("zoom-level");

    [zoomInButton, zoomOutButton].forEach(button => {
        button.style.border = "1px solid rgba(255,255,255,0.6)";
        button.style.background = "transparent";
        button.style.color = "#ffffff";
        button.style.borderRadius = "999px";
        button.style.padding = "2px 7px";
        button.style.cursor = "pointer";
        button.style.fontSize = "12px";
        button.style.minWidth = "22px";
        button.style.height = "20px";
        button.style.display = "flex";
        button.style.alignItems = "center";
        button.style.justifyContent = "center";
        button.style.transition = "background 0.15s ease, border-color 0.15s ease";
    });

    function onHover(e) {
        e.target.style.background = "rgba(255,255,255,0.16)";
        e.target.style.borderColor = "rgba(255,255,255,0.9)";
    }

    function offHover(e) {
        e.target.style.background = "transparent";
        e.target.style.borderColor = "rgba(255,255,255,0.6)";
    }

    zoomInButton.addEventListener("mouseenter", onHover);
    zoomInButton.addEventListener("mouseleave", offHover);
    zoomOutButton.addEventListener("mouseenter", onHover);
    zoomOutButton.addEventListener("mouseleave", offHover);

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
