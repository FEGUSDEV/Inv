const open_ = document.getElementById('open');
const modal_container = document.getElementById('modal_container');
const close_ = document.getElementById('close');

open_.addEventListener('click', () => {
    modal_container.classList.add('show');
})

close_.addEventListener('click', () => {
    modal_container.classList.remove('show');
})