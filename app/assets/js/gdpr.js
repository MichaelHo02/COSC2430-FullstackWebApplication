const GDPR = document.querySelector(".gdpr-wrapper");
const GDPRBtn = document.querySelector(".gdpr-btn");

if (localStorage.getItem('gdpr') == undefined) {
    localStorage.setItem('gdpr', 'true');
}

// localStorage.setItem('gdpr', 'true')
if (localStorage.getItem('gdpr') == 'false') {
    GDPR.style.display = 'none';
}

GDPRBtn.addEventListener('click', () => {
    localStorage.setItem('gdpr', 'false');
    GDPR.style.display = 'none';

});