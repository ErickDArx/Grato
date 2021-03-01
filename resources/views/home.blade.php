<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/Grato/resources/js/micromodal.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <div>
            <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                <h6 class="text-gray mt-3">Mi correo electronico</h6>
                <div class="">
                    <div class="mb-2 col-sm-auto row mt-2 d-flex align-items-center">
                        <div class="col-sm-6 font-weight-bold">
                            Correo
                        </div>
                        <div class="col-sm-6">
                            <div class="form-control m-0">
                                gratocr@gmail.com
                            </div>
                        </div>
                    </div>
                    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                            <div class="modal__container" role="dialog" aria-modal="true"
                                aria-labelledby="modal-1-title">
                                <header class="modal__header">
                                    <div class="">
                                        <div class="">
                                            <p class="h4 font-weight-normal mb-2" id="modal-1-title">
                                                ¿Desea guardar estos cambios?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="modal__close shadow-sm" aria-label="Close modal"
                                            data-micromodal-close></button>
                                    </div>
                                </header>
                                <main class="modal__content" id="modal-1-content">
                                    <p>
                                        Todos lo cambios realizados seran guardados si selecciona aceptar
                                    </p>
                                </main>
                                <footer class="modal__footer">
                                    <button class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                                    <button class="modal__btn col-3" data-micromodal-close
                                        aria-label="Close this dialog window ">Cerrar</button>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="myButton col-sm-12 btn btn-dark rounded mt-2"
                        data-micromodal-trigger="modal-1">Actualizar mi
                        correo</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script>
    MicroModal.init({
        onShow: modal => console.info(`${modal.id} is shown`), // [1]
        onClose: modal => console.info(`${modal.id} is hidden`), // [2]
        openTrigger: 'data-custom-open', // [3]
        closeTrigger: 'data-custom-close', // [4]
        openClass: 'is-open', // [5]
        disableScroll: true, // [6]
        disableFocus: false, // [7]
        awaitOpenAnimation: false, // [8]
        awaitCloseAnimation: false, // [9]
        debugMode: false // [10]
    });

    var button = document.querySelector('.myButton');
    button.addEventListener('click', function () {
        MicroModal.show('modal-1');
    });
</script>
</html>




