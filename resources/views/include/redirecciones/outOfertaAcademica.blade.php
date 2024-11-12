<script>
    function calculadoraHeader() {

        utm_source = "{{ session('utm_source') }}";
        utm_medium = "{{ session('utm_medium') }}";
        utm_campaign = "{{ session('utm_campaign') }}";
        utm_term = "{{ session('utm_term') }}";
        utm_content = "{{ session('utm_content') }}";

        console.log(utm_medium);
        


        if (utm_medium == null || utm_medium == "") {
            utm_source = "Website Metro";
            utm_medium = "Organico";
            utm_campaign = "Home+header";
            utm_term = "Menu+Calculadora";
            utm_content = "Calculadora";
        }


        let rutaRedireccionCalculadora = setUrlBase() +
            `calcula-tu-cuota?utm_source=${utm_source}&utm_medium=${utm_medium}&utm_campaign=${utm_campaign}&utm_term=${utm_term}&utm_content=${utm_content}`;

        console.log(rutaRedireccionCalculadora);

        window.open(rutaRedireccionCalculadora, '_blank'); 
    }

    function preinscripcionHeader() {

        utm_source = "{{ session('utm_source') }}";
        utm_medium = "{{ session('utm_medium') }}";
        utm_campaign = "{{ session('utm_campaign') }}";
        utm_term = "{{ session('utm_term') }}";
        utm_content = "{{ session('utm_content') }}";

        if (utm_medium == null || utm_medium == "") {
            utm_source = "Website Metro";
            utm_medium = "Organico";
            utm_campaign = "Home+header";
            utm_term = "Menu+Preinscrip";
            utm_content = "Preinscrip";
        }

        let rutaRedireccionPreinscripcion = setUrlBase() +
            `App/Preinscripcion-online?utm_source=${utm_source}&utm_medium=${utm_medium}&utm_campaign=${utm_campaign}&utm_term=${utm_term}&utm_content=${utm_content}`;
        window.open(rutaRedireccionPreinscripcion, '_blank');
    }
</script>
