<template>
  <div class="mt-5">
        <div class="my-5 mx-2 d-flex justify-content-between">
           <h3>Instrumentos {{rol}}</h3>
           <div>
                <a href="/instruments/aplicar" class="btn btn-info text-light mr-5">Back</a>
                <a href="/instruments/create" class="btn btn-success text-light">Crear</a>
            </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titulo</th>
              <th scope="col">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            
            <tr v-for="(item, i) in instrumentosMy" :key="item.id"> 
              <th scope="row">{{i+1}}</th>
              <td>{{item.title}}</td>
              <td>
                <a @click="editar(item.id)" class="btn btn-primary btn-sm text-light mr-5">Editar</a>
                <a @click="deleteInstrument(item.id)" class="btn btn-danger  btn-sm text-black mr-5">Eliminar</a>
              </td>
            </tr>
          </tbody>
        </table>
        <ConfirmDialog></ConfirmDialog>

  </div>
</template>

<script>
export default {
    name: "Gestionar",
    props: ['instrumentos', 'rol'],
    data(){
      return {
        query: "",
        queryClient: "",
        results: [],   
        instrumentosMy: [],   
      }
    },
    mounted(){
      this.loadInstrument();
    },
    methods:{
      editar(id){
        window.location = "/instruments/editar/"+id;
      },

      loadInstrument() {
        axios.get("/instruments/my").then((response) => {
          this.instrumentosMy = response.data;
        });
      },
      deleteInstrument(id){
        this.$confirm.require({
            message: `Estás seguro de eliminar el Instrumento`,
            header: 'Confirmar',
            icon: 'pi pi-exclamation-triangle',
            accept: async () => {
                try {
                  const result = await axios.delete(`/instruments/destroy/${id}`);       
                  this.loadInstrument();
                } catch (error) {
                  console.log(error);
                }
            },
            reject: () => {
                // console.log("No pasa nada");
            }
        });
      },
    },
    computed: {
      loadModal(){
        return this.isDialogEdit;
      }
    }
}
</script>

<style scoped>
 
</style>