<template>
  <div class="mt-5 mb-5">
    <h3 class="my-5">Crear Instrumento</h3>

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
      <button class="btn mb-5 btn-success" @click="enviarForm">Crear</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "crear",
  props: ['rol'],
  data() {
    return {
        title: "",
        rolForm: this.rol, 
        editorData: '<p>Content of the editor.</p>',
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
      let form = {
          'rol' : this.rolForm,
          'title' : this.title,
          'content' : this.editorData,
      }

      axios.post('/instruments/store', form)
            .then(response => {
                console.log(response)
                // this.clearForm();
                window.location = "/instruments/gestionar";
            })
            .catch(error => {
                
            });
    },
    atras(){
      window.location = "/instruments/gestionar";
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
