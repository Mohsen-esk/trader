// تنظیم تم اولیه
const theme = localStorage.getItem('theme') || 'light';
document.documentElement.setAttribute('data-theme', theme);
updateThemeUI(theme);

// تابع تغییر تم
function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateThemeUI(newTheme);
    
    // بروزرسانی تم نمودار
    widget.setTheme(newTheme);
}

// بروزرسانی UI تم
function updateThemeUI(theme) {
    const icon = document.getElementById('theme-icon');
    const text = document.getElementById('theme-text');
    
    if (theme === 'dark') {
        icon.className = 'fas fa-sun';
        text.textContent = 'تم روشن';
    } else {
        icon.className = 'fas fa-moon';
        text.textContent = 'تم تیره';
    }
}