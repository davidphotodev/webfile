require('./bootstrap');

window.Vue = require('vue');
import VeeValidate from 'vee-validate';
import CKEditor from 'ckeditor4-vue';

Vue.use(VeeValidate);
Vue.use( CKEditor );

import Vue from 'vue';

// CSS from PrimeVue
import 'primeflex/primeflex.css';

// Components from PrimeVue
import Calendar from 'primevue/calendar';
import FileUpload from 'primevue/fileupload';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Dropdown from 'primevue/dropdown';

import PrimeVue from 'primevue/config';
import Menubar from 'primevue/menubar';
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';  
import Toolbar from 'primevue/toolbar';
import Dialog from 'primevue/dialog';
import Sidebar from 'primevue/sidebar';
import ToastService from 'primevue/toastservice';
import Toast from 'primevue/toast';
import ConfirmDialog from 'primevue/confirmdialog';
import Avatar from 'primevue/avatar';
import ConfirmationService from 'primevue/confirmationservice';



Vue.component('InputNumber', InputNumber);
Vue.component('InputText', InputText);
Vue.component('Calendar', Calendar);
Vue.component('Dropdown', Dropdown);

Vue.component('Button', Button);
Vue.component('Menubar', Menubar);
Vue.component('DataTable', DataTable);
Vue.component('Column', Column);
Vue.component('ColumnGroup', ColumnGroup);
Vue.component('Toolbar', Toolbar);
Vue.component('Dialog', Dialog);
Vue.component('Sidebar', Sidebar);
Vue.component('Toast', Toast);
Vue.component('Avatar', Avatar);
Vue.component('ConfirmDialog', ConfirmDialog);
Vue.component('FileUpload', FileUpload);

Vue.use(ConfirmationService);
Vue.use(ToastService);
Vue.use(PrimeVue);

// API service
import axios from 'axios';
Vue.use(axios)

// Local Components 
Vue.component('menu-top', require('./components/shared/MenuTop.vue').default);
Vue.component('resident', require('./components/resident/Resident.vue').default);
Vue.component('resident-dialog-add', require('./components/resident/ResidentDialogAdd.vue').default);
Vue.component('resident-dialog-edit', require('./components/resident/ResidentDialogEdit.vue').default);
Vue.component('resident-dialog-detail', require('./components/resident/ResidentDialogDetail.vue').default);

Vue.component('miembros', require('./components/members/Members.vue').default);
Vue.component('member-create', require('./components/members/MemberCreate.vue').default);
Vue.component('member-edit', require('./components/members/MemberEdit.vue').default);

Vue.component('aplicar-instrumento', require('./components/instrumento/Aplicar.vue').default);
Vue.component('create-instrumento', require('./components/instrumento/Create.vue').default);
Vue.component('gestion-instrumento', require('./components/instrumento/Gestionar.vue').default);
Vue.component('editar-instrumento', require('./components/instrumento/Editar.vue').default);
Vue.component('llenar-instrumento', require('./components/instrumento/Llenar.vue').default);
Vue.component('ver-instrumento', require('./components/instrumento/Show.vue').default);

const app = new Vue({
    el: '#app',
});
