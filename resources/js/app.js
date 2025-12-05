import './bootstrap';
// ------------- Light / Dark mode logic -------------

function setTheme(theme) {
    // Put the theme on the <html> element
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
}

function initTheme() {
    const saved = localStorage.getItem('theme');
    const prefersDark = window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches;

    const theme = saved || (prefersDark ? 'dark' : 'light');
    setTheme(theme);

    // Update button text if it exists
    const btn = document.getElementById('theme-toggle');
    if (btn) {
        btn.textContent = theme === 'dark' ? '🌙 Dark mode' : '☀️ Light mode';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initTheme();

    const btn = document.getElementById('theme-toggle');
    if (!btn) return;

    btn.addEventListener('click', () => {
        const current = document.documentElement.getAttribute('data-theme') || 'light';
        const next = current === 'dark' ? 'light' : 'dark';
        setTheme(next);
        btn.textContent = next === 'dark' ? '🌙 Dark mode' : '☀️ Light mode';
    });
});
