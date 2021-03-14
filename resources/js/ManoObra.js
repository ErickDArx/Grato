MicroModal.init({
    onShow: modal => console.info(`${modal.id} is shown`), // [1]
    onClose: modal => console.info(`${modal.id} is hidden`), // [2]

});

var button = document.querySelector('.Operario');
button.addEventListener('click', function () {
    MicroModal.show('modal-1');
});

var button = document.querySelector('.Eliminar');
button.addEventListener('click', function () {
    MicroModal.show('modal-2');
});

var button = document.querySelector('.ActualizarLabores');
button.addEventListener('click', function () {
    MicroModal.show('modal-4');
});

