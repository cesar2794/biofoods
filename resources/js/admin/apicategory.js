const apicategory = new Vue({
    el: '#apicategory',
    data: {
        nombre: '',
        slug: '',
        div_mensaje_slug: 'El Slug ya existe',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton: 1
    },
    computed: {
        generarSlugP: function () {
            var char = {
                "á": "a", "é": "e", "í": "i", "ó": "o", "ú": "u",
                "Á": "A", "É": "E", "Í": "I", "Ó": "O", "Ú": "U",
                "ñ": "n", "Ñ": "N", " ": "-", "_": "-", "@": "-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_@ ]/g;

            this.slug = this.nombre.trim().replace(expr, function (e) {
                return char[e]
            }).toLowerCase()

            // return this.nombre.trim().replace(/ /g, '-').toLowerCase()

            return this.slug;
        }
    },
    methods: {
        getCategory() {

            if(this.slug){
                let url = '/api/category/' + this.slug;
                axios.get(url).then(response => {
                    this.div_mensaje_slug = response.data;
                    if (this.div_mensaje_slug === "Slug disponible") {
                        this.div_clase_slug = 'badge badge-success';
                        this.deshabilitar_boton = 0;
                    } else {
                        this.div_clase_slug = 'badge badge-danger';
                        this.deshabilitar_boton = 1;
                    }

                    this.div_aparecer = true;
                })
            }else{
                this.div_clase_slug = 'badge badge-warning';
                this.div_mensaje_slug = "Debes escribir una categoría";
                this.deshabilitar_boton = 1;
                this.div_aparecer = true;
            }

        }
    },
    mounted(){
        if(document.getElementById('editar')){
            this.nombre = document.getElementById('nombretemp').innerHTML;
            this.deshabilitar_boton = 0;
        }
    }
});
