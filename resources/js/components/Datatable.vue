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
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
    </tr>
  </tbody>
</table>
<pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
</div>
</template>

<script>
export default {

	data() {
		return {
			// Our data object that holds the Laravel paginator data
			laravelData: {},
		}
	},

	mounted() {
		// Fetch initial results
		this.getResults();
	},

	methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('auditoria/getData?page=' + page)
				.then(response => {
                    console.log(response)
					this.laravelData = response.data;
				});
		}
	}

}
</script>

<style>

</style>