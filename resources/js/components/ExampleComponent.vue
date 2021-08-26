<template>
<div class="card" style="width: 18rem;">
  <div class="card-body">
<form>
  <div class="form-group">
    <label for="Maquina">Maquina</label>
    <input type="text" v-model="au_maquina" class="form-control" id="au_maquina" aria-describedby="emailHelp" placeholder="Maquina">
  </div>
  <div class="form-group">
    <label for="Sistema Operativo">Sistema Operativo</label>
    <input type="text" v-model="au_so" class="form-control" id="au_so" placeholder="OS">
  </div>
  <div class="form-group">
    <label for="IP">I.P.</label>
    <input type="text" v-model="au_ip" class="form-control" id="au_ip" placeholder="I.P.">
  </div>
    <div class="form-group">
    <label for="Navegador">Navegador</label>
    <input type="text" v-model="au_navegador" class="form-control" id="au_navegador" placeholder="Navegador">
  </div>
<div class="form-group">
    <label for="Fecha">Fecha</label>
    <input type="date" v-model="au_fecha" id="au_fecha" class="form-control" autofocus>
</div>
  <button @click.prevent="registrarAuditoria" class="btn btn-primary">Submit</button>
</form>
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
            au_maquina : '',
            au_so : '',
            au_ip : '',
            au_navegador : '',
            au_fecha : ''
          }
        },
        methods : {
         registrarAuditoria(){
           axios.post('store', {
            au_maquina : this.au_maquina,
            au_so : this.au_so,
            au_ip : this.au_ip,
            au_navegador : this.au_navegador,
            au_fecha : this.au_fecha
           })
           .then(response => console.log(response));
         }
        }
    }
    
</script>
