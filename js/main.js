//Navigation bar effects on scroll
window.addEventListener('scroll', function(){
    const header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 0);
});

//Services section - Modal
const espacoModals = document.querySelectorAll('.espaco-modal');
const learnmoreBtns = document.querySelectorAll('.learn-more-btn');
const modalcloseBtns = document.querySelectorAll('.modal-close-btn');

var modal = function(modalClick){
    espacoModals[modalClick].classList.add('active');
}

learnmoreBtns.forEach((learnmoreBtn, i) => {
    learnmoreBtn.addEventListener('click', () => {
        modal(i);
    });
});

modalcloseBtns.forEach((modalcloseBtn) => {
    modalcloseBtn.addEventListener('click', () => {
        espacoModals.forEach((modalView) => {
            modalView.classList.remove('active');
        });
    });
});


//Portfolio section - Modal
const atracoesModals = document.querySelectorAll('.atracoes-model');
const imgCards = document.querySelectorAll('.img-card');
const atracoesCloseBtns = document.querySelectorAll('.atracoes-close-btn');

var atracoesModal = function(modalClick){
    atracoesModals[modalClick].classList.add('active');
}

imgCards.forEach((imgCard, i) => {
    imgCard.addEventListener('click', () => {
        atracoesModal(i);
    });
});

atracoesCloseBtns.forEach((atracoesCloseBtn) => {
    atracoesCloseBtn.addEventListener('click', () => {
        atracoesModals.forEach((portifolioModalView) => {
            portifolioModalView.classList.remove('active');
        });
    });
});

//Confirmation fale conosco - Modal
const formConfirmation = document.querySelector('.formConfirmation-model');
const formConfirmationBtn = document.querySelector('.formConfirmation-close-btn');
formConfirmationBtn.addEventListener('click', ()=>{
    formConfirmation.classList.remove('active');
});

function loadFormConfirmation() {
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('formStatus');
    if(myParam === 'FALE'){
        formConfirmation.classList.add('active');
        // https://www.vilaplural.com.br/?formStatus=YEAH
    }
    if(myParam === 'EXPOSITOR'){
        formConfirmation.classList.add('active');
        // https://www.vilaplural.com.br/?formStatus=EXPOSITOR
    }

}
loadFormConfirmation();


//Our clients - Swiper

//Website dark/light theme
if(document.querySelector('.theme-btn')){
    const themeBtn = document.querySelector('.theme-btn');
    themeBtn.addEventListener('click', ()=>{
        document.body.classList.toggle('dark-theme');
        themeBtn.classList.toggle('sun');
    
        localStorage.setItem('saved-theme', getCurrentTheme());
        localStorage.setItem('saved-icon', getCurrentIcon());
    });
}

const getCurrentTheme = () => document.body.classList.contains('dark-theme') ? 'dark' : 'light';
const getCurrentIcon = () => document.body.classList.contains('sun') ? 'sun' : 'moon';

const savedTheme = localStorage.getItem('save-theme');
const savedIcon = localStorage.getItem('save-icon');

//Scroll to top button
const scrollTopBtn = document.querySelector('.scrollToTop-btn');
window.addEventListener('scroll',  ()=>{
    scrollTopBtn.classList.toggle('active', window.scrollY > 500);
});

scrollTopBtn.addEventListener('click', ()=>{
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});



//Navigation menu items active on page scroll
window.addEventListener('scroll', ()=>{
    const sections = document.querySelectorAll('section');
    const scrollY = window.scrollY;
    // const scrollY = window.pageYOffset;

    sections.forEach(current => {
        let id = current.getAttribute('id');
        if(document.querySelector('.nav-items a[href*='+id+"]")){
            let sectionHeight = current.offsetHeight;
            let sectionTop = current.offsetTop - 50;
            // console.log(current.getAttribute('id'));
    
            if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
                document.querySelector('.nav-items a[href*='+id+"]").classList.add('active');
            } else {
                document.querySelector('.nav-items a[href*='+id+"]").classList.remove('active');
            }
        }
    });
});

//Responsive navigation menu toggle
const menuBtn = document.querySelector('.nav-menu-btn');
const closeBtn = document.querySelector('.nav-close-btn');
const navigation = document.querySelector('.navigation');
const navItems = document.querySelectorAll('.nav-items a');

menuBtn.addEventListener('click', ()=>{
    console.log('MENU_BTN');
    navigation.classList.add('active');
});

closeBtn.addEventListener('click', ()=>{
    console.log('CLOSEBTN');
    navigation.classList.remove('active');
});

navItems.forEach((navItem) => {
    navItem.addEventListener('click', ()=>{
        navigation.classList.remove('active');
    });
});

//Scroll reveal animations
//Common reveal options to create reveal animations
ScrollReveal({ 
    reset: false,
    distance: '60px',
    duration: 2200,
    delay: 150
});

//Target elements, and specify options to create reveal animations
ScrollReveal().reveal('.section-title-01', { delay: 250, origin: 'left', interval: 100 });
ScrollReveal().reveal('.home .info h2, .section-title-02', { delay: 130, origin: 'left' });
ScrollReveal().reveal('.home .info h3, .home .info p, .about-info .btn', { delay: 200, origin: 'top' });
ScrollReveal().reveal('.home .info .btn', { delay: 180, origin: 'bottom' });
ScrollReveal().reveal('.media-icons i, .contact-left li', { delay: 130, origin: 'left', interval: 60 });
ScrollReveal().reveal('.home-img, .about-img', { delay: 130, origin: 'bottom' });
ScrollReveal().reveal('.about .description, .contact-right', { delay: 200, origin: 'bottom' });
ScrollReveal().reveal('.about .atividades-list li', { delay: 130, origin: 'bottom', interval: 60 });
ScrollReveal().reveal('.expositores-description, .espacos-description, .contact-card, .client-swiper, .contact-left h2 ', { delay: 180, origin: 'left' });
ScrollReveal().reveal('.experience-card, .espaco-card, .education, .atracoes .img-card', { delay: 180, origin: 'bottom', interval: 60 });
ScrollReveal().reveal('footer .group', { delay: 130, origin: 'top', interval: 60 });
