const root = document.body;
const toggle = document.querySelector('[data-theme-toggle]');
const storedTheme = localStorage.getItem('theme_preference');

if (storedTheme) {
  root.dataset.theme = storedTheme;
}

if (toggle) {
  toggle.addEventListener('click', () => {
    const nextTheme = root.dataset.theme === 'dark' ? 'light' : 'dark';
    root.dataset.theme = nextTheme;
    localStorage.setItem('theme_preference', nextTheme);
  });
}
