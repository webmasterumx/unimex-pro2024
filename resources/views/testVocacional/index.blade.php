@extends('layouts.layoutTestVocacional')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-white">
                <h1>
                    Test Vocacional UNIMEX
                </h1>
                <p>
                    Elegir una carrera profesional es una decisión muy importante y conocerte mejor es un elemento clave
                    para elegirla. Es por ello que se ha diseñado este test especialmente para ti con el propósito de
                    que identifiques tus intereses y habilidades vocacionales.
                </p>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">REGISTRARME</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: rgba(190, 192, 194, 0.8);">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Aspirantes UNIMEX</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="fw-light">
                        <b>Llena correctamente los siguientes campos.</b>
                    </p>
                    <form action="" class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno"
                                placeholder="Apellido Paterno">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno"
                                placeholder="Apellido Materno">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <input type="text" class="form-control" id="celular" name="celular"
                                placeholder="Celular (Mínimo 10 dígitos)">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Email">
                        </div>
                        <div class="col-12 mb-3 mx-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    He leído y acepto el <a href="{{ route('aviso_de_privacidad') }}" target="__blank">Aviso
                                        de privacidad</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-secondary">INICIAR TEST</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
