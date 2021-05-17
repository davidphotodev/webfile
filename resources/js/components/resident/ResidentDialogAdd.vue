<template>
  <div>

    <div class="container h-center">
        <div class="m-5 p-5 border border-5 shadow white">

            <!-- Residentes -->
            <div>
                <div class="container">
                    <div class="text-center">
                        <h2>Agregar Residente</h2>
                    </div>
                </div>
                <div class="mb-3">
                    <strong class="text-18">Datos Generales</strong>
                </div>
                
                <div style="display:flex;align-items: center;justify-content: center;" class="mb-3">

                    <input type="file" id="image" placeholder="Imagen corporativa" @change="getImage" accept="image/*" ref="image" class="common-input">
                    <img v-if="!!form.image" :src="form.image" class="avatar" alt="Image" width="50px">
                </div>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <InputText v-model="form.name" name="name" id="name" type="text" placeholder="Nombre"  v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('name')}" />
                        <label for="name" class="p-sr-only">Nombre</label>
                    </div>
                    <div class="p-field p-col">
                        <label for="surname" class="p-sr-only">Apellido</label>
                        <InputText v-model="form.surname" id="surname" name="surname" type="text" placeholder="Apellido" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('surname')}" />
                    </div>
                    <div class="p-field p-col">
                        <label for="second_surname" class="p-sr-only">Segundo Apellido</label>
                        <InputText v-model="form.second_surname" id="second_surname" name="second_surname" type="text" placeholder="Segundo Apellido"/>
                    </div>
                </div>
                
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <Dropdown 
                            v-model="form.nationality" 
                            :options="countries" 
                            placeholder="Nacionalidad" />
                    </div>
                    <div class="p-field p-col">
                        <label for="identification" class="p-sr-only">Identificación</label>
                        <InputText v-model="form.identification" id="identification" type="text" placeholder="Identificación"  name="identification"/>
                    </div>
                    <div class="p-field p-col">
                        <Dropdown 
                            v-model="form.genre" 
                            :options="generes"       
                            name="generes"               
                            placeholder="Sexo" />
                    </div>
                </div>
                
                <div class="p-fluid p-formgrid p-grid">
           
                    <div class="p-field p-col">
                        <label for="firstname5" class="p-sr-only">Número de expediente</label>
                        <InputNumber v-model="form.record" :format="false" id="record" placeholder="Número de expediente" name="record" />
                        <!-- <input type="hidden"  v-model="form.record"  placeholder="Número de expediente" name="record" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('record')}" > -->
                    </div>
               
                    <div class="p-field p-col">
                        <label for="lastname5" class="p-sr-only">Edad</label>
                        <InputNumber v-model="form.age" :format="false" :min="0" :max="100" id="age" placeholder="Edad" name="age"/>
                        <!-- <input  type="hidden" v-model="form.age" :format="false" :min="0" :max="100" placeholder="Edad" name="age" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('age')}"  /> -->
                    </div>
                    <div class="p-field p-col">
                        <label for="lastname5" class="p-sr-only">Creencia Religiosa</label>
                        <InputText v-model="form.religion" id="religion" type="text" placeholder="Creencia Religiosa"  name="religion"/>
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="date_birth" class="p-sr-only">Fecha de Nacimiento</label>
                        <Calendar 
                            v-model="form.date_birth"
                            dateFormat="dd-mm-yy"
                            :showIcon="true" 
                            :yearNavigator="true"
                            :yearRange="yearRange"
                            id="date_birth"
                            placeholder="Fecha de Nacimiento" />

                        <!-- <input type="hidden" 
                            v-model="form.date_birth"
                            name="date_birth" 
                            placeholder="Fecha de Nacimiento" /> -->
                    </div>
                    <div class="p-field p-col">
                        <label for="origin" class="p-sr-only">Procedencia</label>
                        <Dropdown 
                            v-model="form.origin" 
                            :options="origins" 
                            name="origin" 
                            placeholder="Procedencia" />
                    </div>
                    <div class="p-field p-col">
                        <label for="status" class="p-sr-only">Estatus</label>
                        <Dropdown 
                            v-model="form.status" 
                            :options="statusList" 
                            name="status" 
                            placeholder="Estatus" />
                    </div>
                </div>
            </div>

            <!-- Datos de Ingreso -->

            <div>
                <div class="mb-3">
                    <strong class="text-18">Datos de ingreso</strong>
                </div>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="admission_date" class="p-sr-only">Fecha de Nacimiento</label>
                        <Calendar 
                            v-model="form.admission_date" 
                            :showIcon="true" 
                            id="admission_date"
                            name="admission_date" 
                            placeholder="Fecha de ingreso" />

                        <input type="hidden" 
                            v-model="form.admission_date"
                            name="admission_date" 
                            placeholder="Fecha de Nacimiento" />
                    </div>
                    <div class="p-field p-col">
                        <label for="egress_date" class="p-sr-only">Fecha de Egreso</label>
                        <Calendar 
                            v-model="form.egress_date" 
                            :showIcon="true" 
                            id="egress_date"
                            name="egress_date" 
                            placeholder="Fecha de egreso" />

                        <input type="hidden" 
                            v-model="form.egress_date"
                            name="egress_date" 
                            placeholder="Fecha de Nacimiento" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="admission_date" class="p-sr-only">Hora de Nacimiento</label>
                        <Calendar 
                            v-model="form.entry_hour" 
                            :showIcon="true"
                            :timeOnly="true" 
                            hourFormat="12" 
                            id="entry_hour"
                            name="entry_hour" 
                            placeholder="Hora de ingreso" />
                    </div>
                    <div class="p-field p-col">
                        <label for="egress_date" class="p-sr-only">Hora de Egreso</label>
                        <Calendar 
                            v-model="form.egress_hour" 
                            :showIcon="true"
                            :timeOnly="true" 
                            hourFormat="12"
                            id="egress_hour"
                            name="egress_hour" 
                            placeholder="Hora de egreso" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="first_treatment" class="p-sr-only">¿Primer tratamiento?</label>
                        <Dropdown 
                            v-model="form.first_treatment" 
                            :options="yesOrNot" 
                            name="first_treatment" 
                            placeholder="¿Primer tratamiento?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-sr-only">¿Ingresó a otro centro este año?</label>
                        <Dropdown 
                            v-model="form.another_center_entered" 
                            :options="yesOrNot" 
                            name="another_center_entered" 
                            placeholder="¿Ingresó a otro centro este año?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="times_he_entered" class="p-sr-only">Cantidad de veces</label>
                        <InputNumber v-model="form.times_he_entered" id="times_he_entered" placeholder="Ingrese la cantidad"
                            name="times_he_entered" 
                        />
                    </div>
                </div>
            </div>

            <!-- Datos Sociodemógraficos -->
            <div>
                <div class="mb-3">
                    <strong class="text-18">Datos Sociodemógraficos</strong>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="marital_status" class="p-sr-only">Estado Civil</label>
                        <Dropdown 
                            v-model="form.marital_status" 
                            :options="marital_status" 
                            name="marital_status" 
                            placeholder="Estado Civil" />
                    </div>
                    <div class="p-field p-col">
                        <label for="have_children" class="p-sr-only">¿Tiene hijos?</label>
                        <Dropdown 
                            v-model="form.have_children" 
                            :options="yesOrNot" 
                            name="have_children" 
                            placeholder="¿Tiene hijos?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="children_number" class="p-sr-only">Cantidad de hijos</label>
                        <InputNumber v-model="form.children_number" id="children_number" placeholder="Cantidad de hijos" name="children_number"/>
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="job" class="p-sr-only">¿Trabajo remunerado?</label>
                        <Dropdown 
                            v-model="form.job" 
                            :options="yesOrNot" 
                            name="job" 
                            placeholder="¿Trabajo remunerado?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="occupation" class="p-sr-only">Ocupación</label>
                        <Dropdown 
                            v-model="form.occupation" 
                            :options="occupation" 
                            name="occupation"  
                            placeholder="Ocupación" />
                    </div>
                    <div class="p-field p-col">
                        <label for="job" class="p-sr-only">¿Estudia?</label>
                        <Dropdown 
                            v-model="form.study" 
                            :options="yesOrNot" 
                            name="study" 
                            placeholder="¿Estudia?" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="educational_level" class="p-sr-only">Máximo nivel de estudio</label>
                        <Dropdown 
                            v-model="form.educational_level" 
                            :options="educational_level" 
                            name="educational_level" 
                            placeholder="Máximo nivel de estudio" />
                    </div>
                    <div class="p-field p-col">
                        <label for="kind_resident" class="p-sr-only">Tipo de residencia</label>
                        <Dropdown 
                            v-model="form.kind_resident" 
                            :options="kind_resident" 
                            name="kind_resident" 
                            placeholder="Tipo de residencia" />
                    </div>
                    <div class="p-field p-col">
                        <label for="cellphone" class="p-sr-only">Número de teléfono</label>
                        <InputNumber v-model="form.cellphone" :format="false" id="cellphone" placeholder="Número de teléfono"  name="cellphone"/>
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="on_street" class="p-sr-only">Se encuentra en calle</label>
                        <Dropdown 
                            v-model="form.on_street" 
                            :options="yesOrNot" 
                            name="on_street" 
                            placeholder="Se encuentra en calle" />
                    </div>
                    <div class="p-field p-col">
                        <label for="on_street" class="p-sr-only">¿De que CAID viene referido?</label>
                        <Dropdown 
                            v-model="form.referral_from_cai" 
                            :options="referral_from_cai" 
                            name="referral_from_cai" 
                            placeholder="¿De que CAID viene referido?" />
                    </div>
                </div>

                 <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="educational_level" class="p-sr-only">Con destino</label>
                        <Dropdown 
                            v-model="form.destiny" 
                            :options="destiny"
                            name="destiny" 
                            placeholder="Con destino" />
                    </div>
                    <div class="p-field p-col">
                        <label for="destiny_reason" class="p-sr-only">Razón</label>
                        <InputText v-model="form.destiny_reason" id="destiny_reason" placeholder="Razón"  name="destiny_reason"/>
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="province" class="p-sr-only">Provincia</label>
                        <Dropdown 
                            v-model="province" 
                            :options="provinces"
                            optionLabel=""
                            placeholder="Provincia" />
                    </div>
                    <div class="p-field p-col">
                        <label for="canton" class="p-sr-only">Cantón</label>
                        <Dropdown 
                            v-model="canton" 
                            :options="listCanton" 
                            optionLabel=""
                            placeholder="Cantón" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="address" class="p-sr-only">Dirección</label>
                        <InputText v-model="form.address" id="address" placeholder="Dirección" name="address"/>
                    </div>
                </div>
            </div>

            <!-- Datos de Consumo -->
            <div>
                <div class="mb-3">
                    <strong class="text-18">Datos de consumo</strong>
                </div>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="psychiatric_diagnosis" class="p-sr-only">Diagnóstico psiquiátrico</label>
                        <InputText v-model="form.psychiatric_diagnosis" id="psychiatric_diagnosis" placeholder="Diagnóstico psiquiátrico"  name="psychiatric_diagnosis"/>
                    </div>
                    <div class="p-field p-col">
                        <label for="drug_dependence_diagnosis" class="p-sr-only">Diagnóstico farmacodependencia</label>
                        <InputText v-model="form.drug_dependence_diagnosis" id="drug_dependence_diagnosis" placeholder="Diagnóstico farmacodependencia"   name="drug_dependence_diagnosis"/>
                    </div>
                </div>

                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sustancia</th>
                                <th>Año Inicio</th>
                                <th>Frecuencia de consumo los último 30 días</th>
                                <th>Dósis diaria habitual</th>
                                <th>Vía habitual de administración de <br>los últimos 30 días</th>
                                <th>Última fecha de consumo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in consumption_data_table" :key="index">
                                <td> 
                                    <InputText v-model="item.substance" class="form-control" type="text" :name="'substance'+index" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('substance'+index)}"/>
                                </td>
                                <td> 
                                    <Dropdown v-model="item.start_year" :options="years" :name="'start_year'+index" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('start_year'+index)}"/>
                                </td>
                                <td> 
                                    <InputText v-model="item.frequency_consumption" class="form-control" type="text" :name="'frequency_consumption'+index" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('frequency_consumption'+index)}"/>
                                </td>
                                <td> 
                                    <InputText v-model="item.usual_dose" class="form-control" type="text" :name="'usual_dose'+index" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('usual_dose'+index)}"/>
                                </td>
                                <td> 
                                    <InputText v-model="item.usual_administratio_way" class="form-control" type="text" :name="'usual_administratio_way'+index" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('usual_administratio_way'+index)}"/>
                                </td>
                                <td> 
                                    <Calendar 
                                        v-model="item.last_consumption_date" 
                                        :showIcon="true" 
                                        id="last_consumption_date"
                                        :name="'last_consumption_date'+index" 
                                        v-validate data-vv-rules="required" 
                                        :class="{'p-invalid': errors.has('last_consumption_date'+index)}"
                                    />
                                    <input type="hidden" 
                                    v-model="item.last_consumption_date"
                                    :name="'last_consumption_date'+index" 
                                    v-validate 
                                    data-vv-rules="required" 
                                    :class="{'p-invalid': errors.has('last_consumption_date'+index)}"
                                    />
                                </td>
                                <td>
                                    <Button @click="deleteRow(index)" icon="pi pi-times" class="p-button-rounded p-button-help p-button-outlined" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <Button @click="addRow" icon="pi pi-plus" label="Agregar fila" class="p-button-sm p-button-outlined"></Button>
                    </div>
                </div>

            </div>

            <!-- Situación Legal -->
            <div>
                <div class="mb-3">
                    <strong class="text-18">Situación legal</strong>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="pending_cases" class="p-sr-only">¿Tiene casos pendientes por infringir las leyes?</label>
                        <Dropdown 
                            v-model="form.pending_cases" 
                            :options="yesOrNot"
                            name="pending_cases" 
                            placeholder="¿Tiene casos pendientes por infringir las leyes?" 
                        />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-sr-only">Egreso</label>
                        <Dropdown 
                            v-model="form.egress" 
                            :options="yesOrNot" 
                            name="egress" 
                            placeholder="Egreso" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-sr-only">Motivo</label>
                        <Dropdown 
                            v-model="form.egress_reason_law" 
                            :options="egress_reason_law" 
                            name="egress_reason_law" 
                            placeholder="Motivo" />
                    </div>
                </div>

                <div class="mb-3">
                    <span class="text-18">¿Tipo de infracción por la que tiene caso pendiente con la justicia?</span>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="pending_cases" class="p-sr-only">Asociadas a las drogas</label>
                        <Dropdown 
                            v-model="form.drugs" 
                            :options="yesOrNot"
                            name="drugs" 
                            placeholder="Asociadas a las drogas" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-sr-only">De índole sexual</label>
                        <Dropdown 
                            v-model="form.sexual_nature" 
                            :options="yesOrNot"
                            name="sexual_nature"  
                            placeholder="De índole sexual" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-sr-only">Contra la propiedad</label>
                        <Dropdown 
                            v-model="form.against_property" 
                            :options="yesOrNot"
                            name="against_property"   
                            placeholder="Contra la propiedad" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="pending_cases" class="p-sr-only">Contra la vida</label>
                        <Dropdown 
                            v-model="form.against_life" 
                            :options="yesOrNot"
                            name="against_life" 
                            placeholder="Contra la vida" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-sr-only">Otros</label>
                        <Dropdown 
                            v-model="form.others_law" 
                            :options="yesOrNot"
                            name="others_law" 
                            placeholder="Otros" />
                    </div>
                </div>


                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="commentaries" class="p-sr-only">Comentarios internos</label>
                        <InputText v-model="form.commentaries" id="commentaries" placeholder="Comentarios internos" />
                    </div>
                </div>
                
            </div>

            <div class="text-center">
                <Button  @click="validateForm()"  label="Guardar"></Button>
            </div>

            
        </div>
    </div>
    <Toast position="top-right" />
  </div>
</template>

<script>
import { Field } from 'vee-validate';
import  {cantonesData} from '../../utils/cantones.js';

export default {
    name: 'ResidentDialogAdd',
    props: {
        isActive: {
            type: Boolean,
            default: false,
        }
    },
     components: {
        Field,
    },
    data(){
        return{
            localState: null,
            countries: ['Perú', 'Venezuela'],
            generes: ['Masculino', 'Femenino', 'Otro'],
            origins: ['Programa IAFA', 'Residente'],
            statusList: ['Activo', 'Abandono', 'Egreso técnico', 'Expulsado o Movilizado', 'Culminó el programa'],
            yesOrNot: ['Si', 'No'],
            marital_status: ['Casado', 'Soltero', 'Unión Libre', 'Divorciado', 'Separado', 'Viudo'],
            educational_level: ['Básico', 'Bachiller', 'Universidad'],
            destiny: ['Familia', 'Familiares', 'Otro Centro', 'Religiosa', 'Otras Ayudas', 'Sin destino'],
            provinces: [],
            cantones: [],
            years: [],
            province: '',
            canton: '',
            listCanton: [],
            cantonesData: cantonesData,
            consumption_data_table: [
                {
                    substance: '', 
                    start_year: '', 
                    frequency_consumption: '',
                    usual_dose: '',
                    usual_administratio_way: '',
                    last_consumption_date: ''
                }
            ],
            egress_reason_law: ['Cumplió', 'Abandonó o Fuga', 'Expulsión', 'Traslado', 'Otro'],
            form: {
                name: null,
                surname: null,
                second_surname: null,
                identification: null,
                nationality: 'Perú',
                genre: null,
                image: '',
                record: null,
                age: null,
                religion: null,
                date_birth: null,
                origin: null,
                status: null,
                admission_date: null,
                egress_date: null,
                entry_hour: null,
                egress_hour: null,
                egress_reason: null,
                first_treatment: null,
                another_center_entered: null,
                times_he_entered: null,
                marital_status: null,
                have_children: null,
                children_number: null,
                job: null,
                occupation: null,
                study: null,
                educational_level: null,
                kind_resident: null,
                cellphone: null,
                on_street: null,
                referral_from_cai: null,
                destiny: null,
                destiny_reason: null,
                province: null,
                canton: null,
                address: null,
                psychiatric_diagnosis: null,
                drug_dependence_diagnosis: null,
                consumption_data_table: null,
                pending_cases: null,
                egress: null,
                egress_reason_law: null,
                drugs: null,
                sexual_nature: null,
                against_property: null,
                against_life: null,
                others_law: null,
                bath: null,
                clothe: null,
                listens: null,
                bedroom: null,
                breakfast: null,
                morning_snack: null,
                lunch: null,
                afternoon_snack: null,
                dinner: null,
                psychology: null,
                social_work: null,
                medicine: null,
                counseling: null,
                occupational_therapy: null,
                group_sessions: null,
                others: null,
                commentaries: null,
            },

            occupation: ['Administrador','Agricultor','Amo de Casa','Área Salud','Bodeguero','Call Center','Chofer',
            'Cocinero','Construcción','Dependiente','Electricista','Guarda','Ingeniero','Lava Carros','Mecánico',
            'Mensajero','Peón','Policía','Propietario','Soldador','Taxista','Técnico','Venta Ambulante','Otro'],
            kind_resident: ['Propia', 'Alquilada', 'Familiar o conocido', 'Precario', 'Vía pública', 
            'Centro internamiento', 'Otro'],
            referral_from_cai: ['Occidente/San Ramón','Pacífico Central/Puntarenas','Pacífico Central/Quepos',
            'Región Brunca/Coto Brus','Región Chorotega/Santa Cruz','Región Huetar Atlántica/Limón',
            'Región Central Norte/San Carlos','Región Central Este/Cartago'],

        }
    },
    async mounted(){

        console.log(cantonesData)
        this.localState = this.isActive;
        const year = new Date().getFullYear();
        for (let index = year; index >= 1970 ; index--) {
            this.years.push(index)
        }

        this.provinces = ['San José', 'Alajuela', 'Cartago','Heredia','Guanacaste','Puntarenas','Limón'];
    },
    methods: {
        async getCanton(index){
            // 
            try {
                let result = await axios.get(`https://ubicaciones.paginasweb.cr/provincia/${index}/cantones.json`);
                this.cantones = await result.data;
            } catch (error) {
                this.$toast.add({severity:'error', summary: 'Hay un error con el sitema, contacte a soporte', detail:'No se pueden cargar las provincias', life: 3000});
            }
        },
        addRow(){
            this.consumption_data_table.push(
                {
                    substance: '', 
                    start_year: '', 
                    frequency_consumption: '',
                    usual_dose: '',
                    usual_administratio_way: '',
                    last_consumption_date: ''
                }
            )
        },
        deleteRow(index){
            if (this.consumption_data_table.length > 1) {
                this.consumption_data_table.splice(index, 1);
            }
        },

        validateForm: function () {
            this.$validator.validateAll().then((res) => {
                console.log(res)
                if (res) {
                    this.save();
                }
            });
        },
        save(){
            // this.form.consumption_data_table = JSON.stringify(this.consumption_data_table);
            const result = Object.entries(this.form);

            result.forEach(([key, value], index) => {
                const model = new Date();
                if (value && Object.getPrototypeOf(value) === Object.getPrototypeOf(model) ){
                    let month = (value.getMonth()+1) < 10 ? `0${value.getMonth()+1}` : value.getMonth()+1;
                    let day = (value.getDate()) < 10 ? `0${value.getDate()}` : value.getDate();
                    let date = `${value.getFullYear()}-${month}-${day}`;
                    console.log(key,date);
                    this.form[key] = date;
                }
            })            

            this.form.province = this.province;
            this.form.canton = this.canton;
    
            this.form.consumption_data_table = this.consumption_data_table;

            console.log(this.province)
            console.log(this.canton)
            console.log(this.form);

            axios
                .post("/residents/add-resident", this.form)
                .then(response => {
                    console.log(response)
                    // this.$toast.add({severity:'success', summary: 'Operación exitosa', detail:'Residente Registrado', life: 3000});
                    this.clearForm();
                    window.location = location.origin + "/residents";
                })
                .catch(error => {
              
                });
        },
        clearForm(){
            this.form = {
                name: null,
                surname: null,
                second_surname: null,
                identification: null,
                nationality: 'Perú',
                genre: null,
                record: null,
                age: null,
                religion: null,
                date_birth: null,
                origin: null,
                status: null,
                admission_date: null,
                egress_date: null,
                entry_hour: null,
                egress_hour: null,
                egress_reason: null,
                first_treatment: null,
                another_center_entered: null,
                times_he_entered: null,
                marital_status: null,
                have_children: null,
                children_number: null,
                job: null,
                occupation: null,
                study: null,
                educational_level: null,
                kind_resident: null,
                cellphone: null,
                on_street: null,
                referral_from_cai: null,
                destiny: null,
                destiny_reason: null,
                province: null,
                canton: null,
                address: null,
                psychiatric_diagnosis: null,
                drug_dependence_diagnosis: null,
                consumption_data_table: null,
                pending_cases: null,
                egress: null,
                egress_reason_law: null,
                drugs: null,
                sexual_nature: null,
                against_property: null,
                against_life: null,
                others_law: null,
                bath: null,
                clothe: null,
                listens: null,
                bedroom: null,
                breakfast: null,
                morning_snack: null,
                lunch: null,
                afternoon_snack: null,
                dinner: null,
                psychology: null,
                social_work: null,
                medicine: null,
                counseling: null,
                occupational_therapy: null,
                group_sessions: null,
                others: null,
                commentaries: null,
                image: '',
             }
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
      yearRange(){
          const years = `1940:${new Date().getFullYear()}`
          return years;
      }
    },
    watch: {
        async province(newValue){
			if (newValue == 'San José') {
				 this.listCanton = this.cantonesData[0].catones;
			}
			if (newValue == 'Alajuela') {
				 this.listCanton = this.cantonesData[1].catones;
			}
			if (newValue == 'Cartago') {
				 this.listCanton = this.cantonesData[2].catones;
			}
			if (newValue == 'Heredia') {
				 this.listCanton = this.cantonesData[3].catones;
			}
			if (newValue == 'Guanacaste') {
				 this.listCanton = this.cantonesData[4].catones;
			}
			if (newValue == 'Puntarenas') {
				 this.listCanton = this.cantonesData[5].catones;
			}
			if (newValue == 'Limón') {
				 this.listCanton = this.cantonesData[6].catones;
			}
        }

    }
}
</script>

<style>

</style>