<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class UtmController extends Controller
{

    public $dataUTM = [];

    /**
     * esta funcion determina una por una cada utm 
     */
    public function initUtmSource()
    {
        if (isset($_REQUEST['utm_source'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_source'])) { //! determina si la variable esta vacia
                session(["utm_source" => $_REQUEST['utm_source']]);
            }
        } else { //? decision si la variable no se encuentra en la cadena
            session(["utm_source" => null]);
        }


        if (isset($_REQUEST['utm_medium'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_medium'])) { //! determina si la variable esta vacia
                session(["utm_medium" => $_REQUEST['utm_medium']]);
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            session(["utm_medium" => "Organico"]);
        }

        if (isset($_REQUEST['utm_campaign'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_campaign'])) { //! determina si la variable esta vacia
                session(["utm_campaign" => $_REQUEST['utm_campaign']]);
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            session(["utm_campaign" => null]);
        }

        if (isset($_REQUEST['utm_term'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_term'])) { //! determina si la variable esta vacia
                session(["utm_term" => $_REQUEST['utm_term']]);
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            session(["utm_term" => null]);
        }

        if (isset($_REQUEST['utm_content'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_content'])) { //! determina si la variable esta vacia
                session(["utm_content" => $_REQUEST['utm_content']]);
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            session(["utm_content" => null]);
        }

        if (isset($_REQUEST['gad_source'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['gad_source'])) { //! determina si la variable esta vacia
                session(["gad_source" => $_REQUEST['gad_source']]);
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            session(["gad_source" => 0]);
        }
    }

    public function iniciarUtmSource()
    {
        $dataUTM = [];

        if (isset($_REQUEST['utm_source'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_source'])) { //! determina si la variable esta vacia
                $dataUTM["utm_source"]  = $_REQUEST["utm_source"];
                session(["utm_source" => $_REQUEST['utm_source']]);
            } else {
                if (session()->has("utm_source") == true) {
                    //$dataUTM['utm_source'] = session("utm_source");
                } else {
                    $dataUTM["utm_source"] = $_REQUEST['utm_source'];
                    session(["utm_source" => $_REQUEST['utm_source']]);
                }
            }
        } else { //? decision si la variable no se encuentra en la cadena
            if (session()->has("utm_source") == true) {
                //$dataUTM['utm_source'] = session("utm_source");
                $dataUTM['utm_source'] = null;
                session(["utm_source" => null]);
            } else {
                $dataUTM["utm_source"] = null;
                session(["utm_source" => null]);
            }
        }


        if (isset($_REQUEST['utm_medium'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_medium'])) { //! determina si la variable esta vacia
                $dataUTM["utm_medium"]  = $_REQUEST["utm_medium"];
                session(["utm_medium" => $_REQUEST['utm_medium']]);
            } else {
                if (session()->has("utm_medium") == true) {
                    //$dataUTM['utm_medium'] = session("utm_medium");
                } else {
                    $dataUTM["utm_medium"] = $_REQUEST['utm_medium'];
                    session(["utm_medium" => $_REQUEST['utm_medium']]);
                }
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            if (session()->has("utm_medium") == true) {
                //$dataUTM['utm_medium'] = session("utm_medium");
                $dataUTM['utm_medium'] = null;
                session(["utm_medium" => null]);
            } else {
                $dataUTM["utm_medium"] = null;
                session(["utm_medium" => null]);
            }
        }

        if (isset($_REQUEST['utm_campaign'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_campaign'])) { //! determina si la variable esta vacia
                $dataUTM["utm_campaign"]  = $_REQUEST["utm_campaign"];
                session(["utm_campaign" => $_REQUEST['utm_campaign']]);
            } else {
                if (session()->has("utm_campaign") == true) {
                    //$dataUTM['utm_campaign'] = session("utm_campaign");
                } else {
                    $dataUTM["utm_campaign"] = $_REQUEST['utm_campaign'];
                    session(["utm_campaign" => $_REQUEST['utm_campaign']]);
                }
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            if (session()->has("utm_campaign") == true) {
                //$dataUTM['utm_campaign'] = session("utm_campaign");
                $dataUTM['utm_campaign'] = null;
                session(["utm_campaign" => null]);
            } else {
                $dataUTM["utm_campaign"] = null;
                session(["utm_campaign" => null]);
            }
        }

        if (isset($_REQUEST['utm_term'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_term'])) { //! determina si la variable esta vacia
                $dataUTM["utm_term"]  = $_REQUEST["utm_term"];
                session(["utm_term" => $_REQUEST['utm_term']]);
            } else {
                if (session()->has("utm_term") == true) {
                    //$dataUTM['utm_term'] = session("utm_term");
                } else {
                    $dataUTM["utm_term"] = $_REQUEST['utm_term'];
                    session(["utm_term" => $_REQUEST['utm_term']]);
                }
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            if (session()->has("utm_term") == true) {
                //$dataUTM['utm_term'] = session("utm_term");
                $dataUTM['utm_term'] = null;
                session(["utm_term" => null]);
            } else {
                $dataUTM["utm_term"] = null;
                session(["utm_term" => null]);
            }
        }

        if (isset($_REQUEST['utm_content'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['utm_content'])) { //! determina si la variable esta vacia

                $dataUTM["utm_content"]  = $_REQUEST["utm_content"];
                session(["utm_content" => $_REQUEST['utm_content']]);
            } else {
                if (session()->has("utm_content") == true) {
                    //$dataUTM['utm_content'] = session("utm_content");
                } else {
                    $dataUTM["utm_content"] = $_REQUEST['utm_content'];
                    session(["utm_content" => $_REQUEST['utm_content']]);
                }
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url
            if (session()->has("utm_content") == true) {
                //$dataUTM['utm_content'] = session("utm_content");
                $dataUTM['utm_content'] = null;
                session(["utm_content" => null]);
            } else {
                $dataUTM["utm_content"] = null;
                session(["utm_content" => null]);
            }
        }

        if (isset($_REQUEST['gad_source'])) { //*determina si la url contiene la variable
            if (!empty($_REQUEST['gad_source'])) { //! determina si la variable esta vacia
                $dataUTM["gad_source"]  = $_REQUEST["gad_source"];
                session(["gad_source" => $_REQUEST['gad_source']]);
            } else {
                if (session()->has("gad_source") == true) {
                    //$dataUTM['gad_source'] = session("gad_source");
                } else {
                    $dataUTM["gad_source"] = $_REQUEST['gad_source'];
                    session(["gad_source" => $_REQUEST['gad_source']]);
                }
            }
        } else { //? decision si la variable no se encuentra en la cadena de la url

            if (session()->has("gad_source") == true) {
                //$dataUTM['gad_source'] = session("gad_source");
                $dataUTM['gad_source'] = null;
                session(["gad_source" => null]);
            } else {
                $dataUTM["gad_source"] = null;
                session(["gad_source" => null]);
            }
        }

        return $dataUTM;
    }

    public function comprobarSessiones()
    {

        $arraySessiones = [
            "utm_source",
            "utm_medium",
            "utm_campaign",
            "utm_term",
            "utm_content"
        ];

        for ($i = 0; $i < sizeof($arraySessiones); $i++) {
            if (session()->has($arraySessiones[$i]) == true) {
                return true;
                break;
            } else {
                return false;
            }
        }
    }

    public function comprobacionUtmMedium()
    {
        if (session("utm_medium") == "organico" || session("utm_medium") == "ORGANICO" || session("utm_medium") == "Organico") {
            return false;
        } else {
            return true;
        }
    }

    /*  public function comprovacionOrigen()
    {
        //var_dump(session('utm_medium'));
        //var_dump($_REQUEST['utm_medium']);

        if (isset($_REQUEST['utm_medium'])) {
            if (!empty($_REQUEST['utm_medium'])) {

                //var_dump(session('utm_medium'));
                //var_dump($_REQUEST['utm_medium']);

                if (session()->has("utm_medium") == true) {
                    $utm_sourceRequestFormat1 = strtolower($_REQUEST['utm_medium']);
                    $utm_sourceRequestFormat2 = str_replace(" ", "", $utm_sourceRequestFormat1);

                    $utm_sourceSessionFormat1 = strtolower(session('utm_medium'));
                    $utm_sourceSessionFormat2 = str_replace(" ", "", $utm_sourceSessionFormat1);

                    if ($utm_sourceRequestFormat2 == $utm_sourceSessionFormat2) {
                        //var_dump("la utm_medium de request es igual a la que se tiene guardada en session");
                        if ($utm_sourceRequestFormat2 == "organico") {
                            // todo se mantiene organico
                            return 1;
                        } else {
                            // todo son utm de campaña
                            return 2;
                        }
                    } else {
                        //var_dump("la utm_medium de request es diferente a la que se tiene guardada en session");
                        if ($utm_sourceRequestFormat2 == "organico") {
                            // todo se mantiene organico
                            return 1;
                        } else {
                            // todo son utm de campaña
                            return 2;
                        }
                    }
                } else {
                    //var_dump("no existe una utm_medium en session guardada");
                }
            } else {
                //var_dump("la utm_medium existe pero esta vacia");
            }
        } else {
            //var_dump("la utm_medium no existe");
            return 0;
        }
    } */

    public function comprovacionOrigen()
    {
        if (isset($_REQUEST['origen'])) {
            if (!empty($_REQUEST['origen'])) {
                $origenObtenido = $_REQUEST['origen'];
            } else {
                $origenObtenido = null;
            }
        } else {
            $origenObtenido = null;
        }
        return $origenObtenido;
    }
}
