@extends('layouts.layout')

@section('titulo')
    Error de Registro | UNIMEX
@endsection

@section('content')
    <section class="container-fluid px-5 py-5">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                <h2 class="underlined-head">
                    ¡ERROR DE REGISTRO!
                </h2>
            </div>
            <div class="col-12 col-md-9 col-lg-10 text-justify">
                <p class="text-center">
                    <img style="width: 60px;" src="{{ asset('assets/img/bad.png') }}" alt="Registro Fallido"> <br> <br>
                    Lo sentimos, hubo un problema en el registro inténtalo nuevamente o comunícate al plantel de tu interés
                    para recibir información a través de uno de nuestros asesores.
                </p>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center">Planteles</th>
                        </tr>
                        <tr>
                            <td class="w-25 text-center">
                                <a class="link-underline-dark link-dark" href="{{ route('plantel', 'izcalli') }}">
                                    Izcalli
                                </a>
                            </td>
                            <td class="w-25 fw-light">
                                Av. Del Vidrio No. 15, Col. Plaza Dorada, Centro Urbano (Frente a la FES Cuautitlán) Campo
                                1, C.P. 54760 Cuautitlán Izcalli, Estado de México.
                            </td>
                            <td class="w-25 fw-light">
                                5864 9660 <br>
                                5873 9444
                            </td>
                            <td class="w-25 fw-light">
                                umizc_resprelaciones@unimex.edu.mx
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25 text-center">
                                <a class="link-underline-dark link-dark" href="{{ route('plantel', 'satelite') }}">
                                    Satélite
                                </a>
                            </td>
                            <td class="w-25 fw-light">
                                Circuito Poetas No. 37 (frente a Circuito Novelistas No. 41) Cd. Satélite C.P. 53100
                                Naucalpan de Juárez, Estado de México.
                            </td>
                            <td class="w-25 fw-light">
                                5393 1326 <br>
                                5562 2259 <br>
                                5562 6347 <br>
                                5562 4852 <br>
                            </td>
                            <td class="w-25 fw-light">
                                umsat_coorrelaciones@unimex.edu.mx
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25 text-center">
                                <a class="link-underline-dark link-dark" href="{{ route('plantel', 'polanco') }}">
                                    Polanco
                                </a>
                            </td>
                            <td class="w-25 fw-light">
                                Emilio Castelar No. 63, esq. Eugenio Sue, (Polanco o Auditorio). Col. Polanco-Chapultepec,
                                C.P.11560, México D.F.
                            </td>
                            <td class="w-25 fw-light">
                                9138 0060
                            </td>
                            <td class="w-25 fw-light">
                                umpol_coorrelaciones@unimex.edu.mx
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25 text-center">
                                <a class="link-underline-dark link-dark" href="{{ route('plantel', 'veracruz') }}">
                                    Veracruz
                                </a>
                            </td>
                            <td class="w-25 fw-light">
                                Av. 20 de noviembre esq. Juan Enríquez No. 1004 Veracruz, Ver.
                            </td>
                            <td class="w-25 fw-light">
                                (01 229) 9323916 <br>
                                (01 229) 9231300
                            </td>
                            <td class="w-25 fw-light">
                                umver_relaciones@unimex.edu.mx
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@include('include.redirecciones.outOfertaAcademica')
