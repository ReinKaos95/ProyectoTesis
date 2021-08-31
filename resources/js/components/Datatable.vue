<template>
<div>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Maquina</th>
      <th scope="col">O.S.</th>
      <th scope="col">I.P.</th>
      <th scope="col">Navegador</th>
      <th scope="col">Fecha</th>
      <th scope="col">Acciones.</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(auditoria,id) in auditoria.data" :key="auditoria.id">
      <td>{{id}}</td>
      <td>{{auditoria.au_maquina}}</td>
      <td>{{auditoria.au_so}}</td>
      <td>{{auditoria.au_ip}}</td>
      <td>{{auditoria.au_navegador}}</td>
      <td>{{auditoria.au_fecha}}</td>
      <td><edit/> / eliminar</td>
    </tr>
  </tbody>
</table>
<pagination :data="auditoria" @pagination-change-page="getResults"></pagination>
</div>
</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
            this.getResults();
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
		getResults(page = 1) {
			axios.get('auditoria/getData?page=' + page)
				.then(response => {
          console.log(response.data)
					this.auditoria = response.data;
				});
		}
        }
    }
    
</script>


<style>

</style>