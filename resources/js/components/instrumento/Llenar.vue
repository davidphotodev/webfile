<template>
  <div class="mt-5 mb-5">
    <h3 class="my-5">Llenando Instrumento</h3>

    <div>
      <label for="">Titulo</label><br>
      <input type="text" v-model="title" class="form-control">
    </div>
    <div class="my-4">
       <label for="">Preguntas</label><br>
       <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>

    </div>
    <div class="d-flex justify-content-between">
        <button class="btn mb-5 btn-info text-light" @click="atras">Atras</button>
        <button class="btn mb-5 btn-success" @click="enviarForm">Finalizado</button>
    </div>
  </div>
</template>

<script>

export default {
  name: "editar",
  props: ['rol','instrumento'],
  data() {
    return {
        title: this.instrumento.title,
        rolForm: this.rol, 
        editorData: this.instrumento.content,
        editorConfig: {
            height: 500,
        }
    };
  },
  created() {
    console.log(this.rol);
  },
  methods: {
    enviarForm(){
      console.log(this.editorData)
      console.log(this.title)
      console.log(this.rolForm)

      let form = {
          'rol' : this.rolForm,
          'title' : this.title,
          'content' : this.editorData,
      }

      axios.post('/instruments/llenar-update/'+this.instrumento.id, form)
            .then(response => {
                console.log(response)
                window.location = "/instruments/aplicar";
            })
            .catch(error => {
                
            });
    },
    atras(){
      window.location = "/instruments/aplicar";
    }
  },
  computed: {

  },
};
</script>

<style scoped>

  .ck-editor__editable {
    min-height: 500px;
   }
   
</style>
