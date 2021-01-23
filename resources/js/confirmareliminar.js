const confirmareliminar = new Vue({
    el: '#confirmareliminar',
    data: {
        urlaeliminar: '',
        nombrecategoria: ''
    },
    methods: {
        deseas_eliminar(id){
            this.urlaeliminar = document.getElementById('urlbase').innerHTML+'/'+id;
            // alert(this.urlaeliminar);
            $('#modalEliminar').modal('show');
        }
    }
});
