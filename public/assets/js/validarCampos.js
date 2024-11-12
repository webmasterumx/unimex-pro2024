function validarCamposLetrasOnPasteV1(element) {
    $(element).bind('paste', function(event){
        return false
    });
}