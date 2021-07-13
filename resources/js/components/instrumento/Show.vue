<template>
  <div class="mt-5 mb-5">
    <h3 class="my-5">Detalle Instrumento</h3>

    <div>
      <label for="">Titulo</label><br>
      <input type="text" disabled v-model="title" class="form-control">
    </div>
    <div class="my-4">
       <label for="">Preguntas</label><br>
       <ckeditor v-model="editorData"  :config="editorConfig"></ckeditor>

    </div>
    <div class="d-flex justify-content-between">
        <button class="btn mb-5 btn-info text-light" @click="atras">Atras</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "show",
  props: ['rol','instrumento'],
  data() {
    return {
        title: this.instrumento.title,
        rolForm: this.rol, 
        editorData: this.instrumento.content,
        editorConfig: {
            height: 500,
            readOnly : true,
        }
    };
  },
  created() {
    console.log(this.rol);
  },
  methods: {

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
