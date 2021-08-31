<template>
<div>
<button type="button" @click="editAuditoria(auditoria.id)" class ="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Editar
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="Maquina">Maquina</label>
    <input type="text" v-model="edit_au_maquina" class="form-control" id="au_maquina" aria-describedby="emailHelp" placeholder="Maquina">
  </div>
  <div class="form-group">
    <label for="Sistema Operativo">Sistema Operativo</label>
    <input type="text" v-model="edit_au_so" class="form-control" id="au_so" placeholder="OS">
  </div>
  <div class="form-group">
    <label for="IP">I.P.</label>
    <input type="text" v-model="edit_au_ip" class="form-control" id="au_ip" placeholder="I.P.">
  </div>
    <div class="form-group">
    <label for="Navegador">Navegador</label>
    <input type="text" v-model="edit_au_navegador" class="form-control" id="au_navegador" placeholder="Navegador">
  </div>
<div class="form-group">
    <label for="Fecha">Fecha</label>
    <input type="date" v-model="edit_au_fecha" id="au_fecha" class="form-control" autofocus>
</div>
  <button @click.prevent="actualizarAuditoria" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
            au_fecha : '',
            edit_au_maquina : '',
            edit_au_so : '',
            edit_au_ip : '',
            edit_au_navegador : '',
            edit_au_fecha : ''
          }
        },
        methods : {
            editAuditoria(id){
               axios.get('edit_auditoria/'+id)
                .then(response => {
                    console.log(response);
            this.id = response.data.id;
            this.edit_au_maquina = response.data.au_maquina;
            this.edit_au_so = response.data.au_so;
            this.edit_au_ip = response.data.au_ip;
            this.edit_au_navegador = response.data.au_navegador;
            this.edit_au_fecha = response.data.au_fecha;
                });
            },
            actualizarAuditoria(){
                axios.put('update_auditoria', {
                    id : this.id,
                    au_maquina : this.edit_au_maquina,
                    au_so : this.edit_au_so,
                    au_ip : this.edit_au_ip,
                    au_navegador : this.edit_au_navegador,
                    au_fecha : this.edit_au_fecha,
                })
                .then(response => console.log(response))
            }
        }
}
</script>

<style>

</style>