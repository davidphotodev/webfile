<template>
  <div>

    <div class="container h-center">
        <div class="m-5 p-5 border border-5 shadow white">

            <!-- Residentes -->
            <div>
                <div class="container">
                    <div class="text-center">
                        <h2>Agregar Miembro</h2>
                    </div>
                </div>
                <div class="mb-3">
                    <strong class="text-18">Datos Generales</strong>
                </div>
                
                <div style="display:flex;align-items: center;justify-content: center;" class="mb-3">

                    <input type="file" id="image" placeholder="Imagen corporativa" @change="getImage" accept="image/*" ref="image" class="common-input">
                    <img v-if="!!form.image" :src="form.image" class="avatar" alt="Image" width="50px">
                </div>
                <div class="p-fluid p-formgrid p-grid mt-5">
                    <div class="p-field p-col">
                        <InputText v-model="form.name" name="name" id="name" type="text" placeholder="Nombre"  v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('name')}" />
                        <label for="name" class="p-sr-only">Nombre</label>
                    </div>
                    <div class="p-field p-col">
                        <label for="surname" class="p-sr-only">Email</label>
                        <InputText v-model="form.email"  id="email" name="email" type="text" placeholder="Email" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('email')}" />
                    </div>
                    <div class="p-field p-col">
                        <label for="surname" class="p-sr-only">Password</label>
                        <Password v-model="form.password"  toggleMask id="password" name="password"  placeholder="Password" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('password')}" />
                    </div>
                    <div class="p-field p-col">
                        <label for="surname" class="p-sr-only">ConfirmPassword</label>
                        <Password v-model="form.confirmPassword" toggleMask id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('confirmPassword')}" />
                    </div>

                  
                </div>
                <div class="p-fluid p-formgrid p-grid ">
                    <div class="p-field p-col">
                        <InputNumber v-model="form.phone_number" :format="false" id="phone_number" placeholder="Número de teléfono"  name="phone_number" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('phone_number')}"/>
                        <input type="hidden" v-model="form.phone_number" :format="false" id="phone_number" placeholder="Número de teléfono"  name="phone_number" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('phone_number')}"/>
                    </div>
                    <div class="p-field p-col">

                        <Dropdown 
                            v-model="form.rol" 
                            :options="roles" 
                            optionLabel="name"
                            optionValue="name"
                            placeholder="Tipo de Rol" 
                            name="rol" 
                            v-validate data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('rol')}"/>
                    </div>
                  
                </div>
                
                <div class="text-center">
                    <Button  @click="validateForm()"  label="Guardar"></Button>
                </div>

            </div>
                
        </div>
    </div>
    <Toast position="top-right" />
  </div>
</template>

<script>
import { Field } from 'vee-validate';
import Password from 'primevue/password';

export default {
    name: 'MemberCreate',
     components: {
        Field,
        Password,
    },
    props: ['roles'],
    data(){
        return{
            form: {
                name: null,
                email: null,
                phone_number: null,
                password: null,
                confirmPassword: null,
                rol: null,
            },
            rolesForm : this.roles, 
            confirmPasswordStatus: false,
        }
    },
    async mounted(){

     
    },
    methods: {

        validateForm: function () {
            this.$validator.validateAll().then((res) => {
                console.log(res)
                if (res) {
                    this.save();
                }
            });
        },
        save(){
            if(this.form.password === this.form.confirmPassword){
                this.confirmPasswordStatus = true;
            }
    
            if(this.confirmPasswordStatus){
                axios
                .post("/members/add-member", this.form)
                .then(response => {
                    console.log(response)
                    this.clearForm();
                    window.location = location.origin + "/members";
                })
                .catch(error => {
                    this.$toast.add({severity:'error', summary: 'Operación error', detail: error, life: 3000});

                });
            }
            else{
                this.$toast.add({severity:'error', summary: 'Operación error', detail:'Las contraseñas no coinciden', life: 3000});
            }
        },
        clearForm(){
            this.form = {
                name: null,
                email: null,
                phone_number: null,
                password: null,
            },
            this.confirmPassword = false
        },

        getImage(e) {
            let image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e => {
              this.form.image = e.target.result;
            }
        },
    },
    computed: {
    //   yearRange(){
    //       const years = `1940:${new Date().getFullYear()}`
    //       return years;
    //   }
    },
    watch: {
        async province(newValue){

        }

    }
}
</script>

<style>

</style>