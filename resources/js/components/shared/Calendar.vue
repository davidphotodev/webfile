<template>   
    <div class="row">
        <div class="col s2 input-field d-flex flex-column">
            <label for="fecha_ingreso">Fecha Ingreso</label>
             <Calendar v-model="value1" dateFormat="dd/mm/yy"/>
            <input type="hidden" name="fecha_ingreso" v-model="value1">
        </div>
        <div class="col s2 input-field d-flex flex-column">
            <label for="fecha_ingreso">Fecha Egreso</label>
             <Calendar v-model="value2" dateFormat="dd/mm/yy"/>
            <input type="hidden" name="fecha_egreso" v-model="value2">
        </div>
    </div>
</template>

<script>

import moment from 'moment'

export default {
  name: "MenuTop",
    data() {
        return {
            value1: null,
            value2: null
        };
    },
    watch: {
            value1: function (newValue) {
                this.value1 = moment(newValue).format('YYYY-MM-DD')
            },
            value2: function (newValue) {
                this.value2 =  moment(newValue).format('YYYY-MM-DD')
            }
    }
};
</script>

<style></style>
