// Awal Navbar
const check = document.querySelector('.check');
const navigasi = document.querySelector('.nav-tem');
const user = document.querySelector('.user');
const navbar = document.querySelector('.navbar-tem');
navigasi.style.display = 'none';

check.addEventListener('click', ()=> {

    if(navigasi.style.display === 'none'){
        check.style.transform = 'rotate(90deg)';
        navigasi.style.animation = 'animasi1 1s';
        user.style.animation = 'animasi2 1s';
        navigasi.style.display = 'flex';
        user.style.display = 'flex';
        navigasi.style.opacity = '1';
        user.style.opacity = '1';
        navbar.style.backdropFilter = 'blur(10px)';
        setTimeout(()=> {
            navigasi.style.animation = '';
            user.style.animation = '';
        }, 1000);
    }else if(navigasi.style.display === 'flex'){
        check.style.transform = 'rotate(0deg)';
        navigasi.style.animation = 'animasi1 .5s reverse';
        user.style.animation = 'animasi2 .2s reverse';
        navigasi.style.opacity = '0';
        user.style.opacity = '0';
        navbar.style.backdropFilter = '';
        setTimeout(()=> {
            user.style.display = 'none';
            navigasi.style.display = 'none';
        }, 500);

    }
});

// Akhir Navbar

//Error Mobile (sementara)

function mobile(x) {
    if(x.matches) {
        document.createElement
    }else {

    }
}

const x = window.matchMedia("(max-width: 600px)");
mobile(x)
x.addListener(mobile)
