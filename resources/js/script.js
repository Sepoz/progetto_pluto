const navbarToggler = document.querySelector('#navbarToggler')
const navbarTogglerIcon = document.querySelector('#navbarToggler .fa-solid.fa-ellipsis-vertical')

navbarToggler.addEventListener('click', () => {
    navbarTogglerIcon.classList.toggle('fa-rotate-90')
})

const navbar = document.querySelector('.up-navbar')

window.addEventListener('scroll' , () => {
    if(window.pageYOffset > window.innerHeight){
        navbar.classList.add('bg-white')
        navbar.classList.add('shadow')
    } else {
        navbar.classList.remove('bg-white')
        navbar.classList.remove('shadow')
    }
})