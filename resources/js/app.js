require('./bootstrap');

window.Vue = require('vue');
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);


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


const app = new Vue({
    el: '#app',
});
