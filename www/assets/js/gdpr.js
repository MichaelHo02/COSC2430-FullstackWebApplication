const GDPR = document.querySelector(".gdpr-wrapper");
const GDPRBtn = document.querySelector(".gdpr-btn");

if (localStorage.getItem('gdpr') == undefined) {
    localStorage.setItem('gdpr', 'false');
    GDPR.style.display = 'block';
}

if (localStorage.getItem('gdpr') == 'false') {
    GDPR.style.display = 'block';
}

GDPRBtn.addEventListener('click', () => {
    localStorage.setItem('gdpr', 'true');
    GDPR.style.display = 'none';
});