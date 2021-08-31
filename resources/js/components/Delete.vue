<template>
  <div>
      <!-- Button trigger modal -->
<button type="button" @click="deleteAuditoria(auditoria.id)" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">
  Eliminacion
</button>

  </div>
</template>

<script>
export default {
        mounted() {
            console.log('Component mounted.')
          
        },
        data(){
          return{
            auditoria : {},
            id: '',
            au_maquina : '',
            au_so : '',
            au_ip : '',
            au_navegador : '',
            au_fecha : ''
          }
        },
        methods : {
            deleteAuditoria(id){
                //alert(id);
                axios.delete('delete_auditoria/'+id)
                .then(response => console.log(response))
            }
        }
}
</script>

<style>

</style>