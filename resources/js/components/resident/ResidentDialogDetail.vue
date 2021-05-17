<template>
  <div>

    <div class="container h-center">
        <div class="m-5 p-5 border border-5 shadow white">

            <!-- Residentes -->
            <div>
                <div class="container">
                    <div class="text-center">
                        <h2>Detalle Residente</h2>
                    </div>
                </div>
                <div class="mb-3">
                    <strong class="text-18">Datos Generales</strong>
                </div>

                <div style="display:flex;align-items: center;justify-content: center;" class="mb-3">
                        <Avatar 
                            :image="form.image"
                            size="xlarge"
                        />
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                    <label for="name" class="p-field">Nombre</label>
                        <InputText disabled v-model="form.name" name="name" id="name" type="text" placeholder="Nombre"  v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('name')}" disabled />
                    </div>
                    <div class="p-field p-col">
                        <label for="surname" class="p-field">Apellido</label>
                        <InputText disabled v-model="form.surname" id="surname" name="surname" type="text" placeholder="Apellido" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('surname')}" />
                    </div>
                    <div class="p-field p-col">
                        <label for="second_surname" class="p-field">Segundo Apellido</label>
                        <InputText disabled v-model="form.second_surname" id="second_surname" name="second_surname" type="text" placeholder="Segundo Apellido"  v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('second_surname')}"/>
                    </div>
                </div>
                
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="identification" class="p-field">Nacionalida</label>
                        <Dropdown
                            disabled 
                            v-model="form.nationality" 
                            :options="countries" 
                            placeholder="Nacionalidad" />
                    </div>
                    <div class="p-field p-col">
                        <label for="identification" class="p-field">Identificación</label>
                        <InputText disabled v-model="form.identification" id="identification" type="text" placeholder="Identificación"  name="identification" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('identification')}"/>
                    </div>
                    <div class="p-field p-col">
                        <label for="identification" class="p-field">Sexo</label>
                        <Dropdown
                            disabled 
                            v-model="form.genre" 
                            :options="generes"       
                            name="generes" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('generes')}"                         
                            placeholder="Sexo" />
                    </div>
                </div>
                
                <div class="p-fluid p-formgrid p-grid">
           
                    <div class="p-field p-col">
                        <label for="firstname5" class="p-field">Número de expediente</label>
                        <InputNumber disabled v-model="form.record" :format="false" id="record" placeholder="Número de expediente" name="record" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('record')}" />
                        <input type="hidden"  v-model="form.record"  placeholder="Número de expediente" name="record" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('record')}" >
                    </div>
               
                    <div class="p-field p-col">
                        <label for="lastname5" class="p-field">Edad</label>
                        <InputNumber disabled v-model="form.age" :format="false" :min="0" :max="100" id="age" placeholder="Edad" name="age" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('age')}"  />
                        <input  type="hidden" v-model="form.age" :format="false" :min="0" :max="100" placeholder="Edad" name="age" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('age')}"  />
                    </div>
                    <div class="p-field p-col">
                        <label for="lastname5" class="p-field">Creencia Religiosa</label>
                        <InputText disabled v-model="form.religion" id="religion" type="text" placeholder="Creencia Religiosa"  name="religion" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('religion')}"  />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="date_birth" class="p-field">Fecha de Nacimiento</label>
                        <Calendar
                            disabled 
                            v-model="form.date_birth"
                            dateFormat="dd-mm-yy"
                            :showIcon="true" 
                            id="date_birth"
                            name="date_birth" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('date_birth')}"
                            placeholder="Fecha de Nacimiento" />

                        <input type="hidden" 
                            v-model="form.date_birth"
                            name="date_birth" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('date_birth')}"
                            placeholder="Fecha de Nacimiento" />
                    </div>
                    <div class="p-field p-col">
                        <label for="origin" class="p-field">Procedencia</label>
                        <Dropdown
                            disabled 
                            v-model="form.origin" 
                            :options="origins" 
                            name="origin" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('origin')}"
                            placeholder="Procedencia" />
                    </div>
                    <div class="p-field p-col">
                        <label for="status" class="p-field">Estatus</label>
                        <Dropdown
                            disabled 
                            v-model="form.status" 
                            :options="statusList" 
                            name="status" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('status')}"      
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
                        <label for="admission_date" class="p-field">Fecha de Nacimiento</label>
                        <Calendar
                            disabled 
                            v-model="form.admission_date" 
                            :showIcon="true" 
                            id="admission_date"
                            name="admission_date" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('admission_date')}"
                            placeholder="Fecha de ingreso" />

                        <input type="hidden" 
                            v-model="form.admission_date"
                            name="admission_date" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('admission_date')}"
                            placeholder="Fecha de Nacimiento" />
                    </div>
                    <div class="p-field p-col">
                        <label for="egress_date" class="p-field">Fecha de Egreso</label>
                        <Calendar
                            disabled 
                            v-model="form.egress_date" 
                            :showIcon="true" 
                            id="egress_date"
                            name="egress_date" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('egress_date')}"
                            placeholder="Fecha de egreso" />

                        <input type="hidden" 
                            v-model="form.egress_date"
                            name="egress_date" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('egress_date')}"
                            placeholder="Fecha de Nacimiento" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="admission_date" class="p-field">Hora de Nacimiento</label>
                        <Calendar
                            disabled 
                            v-model="form.entry_hour" 
                            :showIcon="true"
                            :timeOnly="true" 
                            hourFormat="12" 
                            id="entry_hour"
                            name="entry_hour" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('entry_hour')}"
                            placeholder="Hora de ingreso" />

                        <input type="hidden" 
                            v-model="form.entry_hour"
                            name="entry_hour" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('entry_hour')}"
                            placeholder="Fecha de Nacimiento" />
                    </div>
                    <div class="p-field p-col">
                        <label for="egress_date" class="p-field">Hora de Egreso</label>
                        <Calendar
                            disabled 
                            v-model="form.egress_hour" 
                            :showIcon="true"
                            :timeOnly="true" 
                            hourFormat="12"
                            id="egress_hour"
                            name="egress_hour" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('egress_hour')}"
                            placeholder="Hora de egreso" />


                        <input type="hidden" 
                            v-model="form.egress_hour"
                            name="egress_hour" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('egress_hour')}"
                            placeholder="Fecha de Nacimiento" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="first_treatment" class="p-field">¿Primer tratamiento?</label>
                        <Dropdown
                            disabled 
                            v-model="form.first_treatment" 
                            :options="yesOrNot" 
                            name="first_treatment" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('first_treatment')}"   
                            placeholder="¿Primer tratamiento?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-field">¿Ingresó a otro centro este año?</label>
                        <Dropdown
                            disabled 
                            v-model="form.another_center_entered" 
                            :options="yesOrNot" 
                            name="another_center_entered" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('another_center_entered')}"   
                            placeholder="¿Ingresó a otro centro este año?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="times_he_entered" class="p-field">Cantidad de veces</label>
                        <InputNumber disabled v-model="form.times_he_entered" id="times_he_entered" placeholder="Ingrese la cantidad"
                            name="times_he_entered" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('times_he_entered')}"/>
                        <input type="hidden" v-model="form.times_he_entered" id="times_he_entered" placeholder="Ingrese la cantidad"
                            name="times_he_entered" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('times_he_entered')}"/>
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
                        <label for="marital_status" class="p-field">Estado Civil</label>
                        <Dropdown
                            disabled 
                            v-model="form.marital_status" 
                            :options="marital_status" 
                            name="marital_status" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('marital_status')}"  
                            placeholder="Estado Civil" />
                    </div>
                    <div class="p-field p-col">
                        <label for="have_children" class="p-field">¿Tiene hijos?</label>
                        <Dropdown
                            disabled 
                            v-model="form.have_children" 
                            :options="yesOrNot" 
                            name="have_children" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('have_children')}"  
                            placeholder="¿Tiene hijos?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="children_number" class="p-field">Cantidad de hijos</label>
                        <InputNumber disabled v-model="form.children_number" id="children_number" placeholder="Cantidad de hijos" name="children_number" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('children_number')}" />
                        <input type="hidden" v-model="form.children_number" placeholder="Cantidad de hijos" name="children_number" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('children_number')}" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="job" class="p-field">¿Trabajo remunerado?</label>
                        <Dropdown
                            disabled 
                            v-model="form.job" 
                            :options="yesOrNot" 
                            name="job" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('job')}"  
                            placeholder="¿Trabajo remunerado?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="occupation" class="p-field">Ocupación</label>
                        <Dropdown
                            disabled 
                            v-model="form.occupation" 
                            :options="occupation" 
                            name="occupation" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('occupation')}"  
                            placeholder="Ocupación" />
                    </div>
                    <div class="p-field p-col">
                        <label for="job" class="p-field">¿Estudia?</label>
                        <Dropdown
                            disabled 
                            v-model="form.study" 
                            :options="yesOrNot" 
                            name="study" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('study')}"  
                            placeholder="¿Estudia?" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="educational_level" class="p-field">Máximo nivel de estudio</label>
                        <Dropdown
                            disabled 
                            v-model="form.educational_level" 
                            :options="educational_level" 
                            name="educational_level" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('educational_level')}" 
                            placeholder="Máximo nivel de estudio" />
                    </div>
                    <div class="p-field p-col">
                        <label for="kind_resident" class="p-field">Tipo de residencia</label>
                        <Dropdown
                            disabled 
                            v-model="form.kind_resident" 
                            :options="kind_resident" 
                            name="kind_resident" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('kind_resident')}" 
                            placeholder="Tipo de residencia" />
                    </div>
                    <div class="p-field p-col">
                        <label for="cellphone" class="p-field">Número de teléfono</label>
                        <InputNumber disabled v-model="form.cellphone" :format="false" id="cellphone" placeholder="Número de teléfono"  name="cellphone" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('cellphone')}"/>
                        <input type="hidden" v-model="form.cellphone" :format="false"  placeholder="Número de teléfono"  name="cellphone" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('cellphone')}"/>
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="on_street" class="p-field">Se encuentra en calle</label>
                        <Dropdown
                            disabled 
                            v-model="form.on_street" 
                            :options="yesOrNot" 
                            name="on_street" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('on_street')}" 
                            placeholder="Se encuentra en calle" />
                    </div>
                    <div class="p-field p-col">
                        <label for="on_street" class="p-field">¿De que CAID viene referido?</label>
                        <Dropdown
                            disabled 
                            v-model="form.referral_from_cai" 
                            :options="referral_from_cai" 
                            name="referral_from_cai" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('referral_from_cai')}" 
                            placeholder="¿De que CAID viene referido?" />
                    </div>
                </div>

                 <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="educational_level" class="p-field">Con destino</label>
                        <Dropdown
                            disabled 
                            v-model="form.destiny" 
                            :options="destiny"
                            name="destiny" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('destiny')}" 
                            placeholder="Con destino" />
                    </div>
                    <div class="p-field p-col">
                        <label for="destiny_reason" class="p-field">Razón</label>
                        <InputText disabled v-model="form.destiny_reason" id="destiny_reason" placeholder="Razón"  name="destiny_reason" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('destiny_reason')}"/>
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="province" class="p-field">Provincia</label>
                        <Dropdown
                            disabled 
                            v-model="form.province" 
                            :options="provinces"
                            optionLabel=""
                            placeholder="Provincia" />
                    </div>
                    <div class="p-field p-col">
                        <label for="canton" class="p-field">Cantón</label>
                        <Dropdown
                            disabled 
                            v-model="form.canton" 
                            :options="listCanton" 
                            optionLabel=""
                            placeholder="Cantón" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="address" class="p-field">Dirección</label>
                        <InputText disabled v-model="form.address" id="address" placeholder="Dirección" name="address" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('address')}" />
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
                        <label for="psychiatric_diagnosis" class="p-field">Diagnóstico psiquiátrico</label>
                        <InputText disabled v-model="form.psychiatric_diagnosis" id="psychiatric_diagnosis" placeholder="Diagnóstico psiquiátrico"   name="psychiatric_diagnosis" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('psychiatric_diagnosis')}"/>
                    </div>
                    <div class="p-field p-col">
                        <label for="drug_dependence_diagnosis" class="p-field">Diagnóstico farmacodependencia</label>
                        <InputText disabled v-model="form.drug_dependence_diagnosis" id="drug_dependence_diagnosis" placeholder="Diagnóstico farmacodependencia"   name="drug_dependence_diagnosis" v-validate data-vv-rules="required" :class="{'p-invalid': errors.has('drug_dependence_diagnosis')}" />
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
                                <th>Vía habitual de administración de los últimos 30 días</th>
                                <th>Última fecha de consumo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in this.form.consumption_data_table" :key="index">
                                <td> 
                                    <input v-model="item.substance" class="form-control" type="text" disabled>
                                </td>
                                <td> 
                                    <!-- <Dropdown
                                        disabled v-model="item.start_year" :options="years" /> -->
                                        <input v-model="item.start_year" class="form-control" type="text" disabled>
                                </td>
                                <td> 
                                    <input v-model="item.frequency_consumption" class="form-control" type="text" disabled>
                                </td>
                                <td> 
                                    <input v-model="item.usual_dose" class="form-control" type="text" disabled>
                                </td>
                                <td> 
                                    <input v-model="item.usual_administratio_way" class="form-control" type="text" disabled>
                                </td>
                                <td> 
                                    <!-- <Calendar
                                        disabled 
                                        v-model="form.last_consumption_date" 
                                        :showIcon="true" 
                                        id="last_consumption_date"/> -->
                                    <input v-model="item.last_consumption_date" class="form-control" type="text" disabled>

                                </td>
                                <!-- <td>
                                    <Button @click="deleteRow(index)" icon="pi pi-times" class="p-button-rounded p-button-help p-button-outlined" />
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                    <!-- <div class="d-flex justify-content-end">
                        <Button @click="addRow" icon="pi pi-plus" label="Agregar fila" class="p-button-sm p-button-outlined"></Button>
                    </div> -->
                </div>

            </div>

            <!-- Situación Legal -->
            <div>
                <div class="mb-3">
                    <strong class="text-18">Situación legal</strong>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="pending_cases" class="p-field">¿Tiene casos pendientes por infringir las leyes?</label>
                        <Dropdown
                            disabled 
                            v-model="form.pending_cases" 
                            :options="yesOrNot"
                            name="pending_cases" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('pending_cases')}" 
                            placeholder="¿Tiene casos pendientes por infringir las leyes?" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-field">Egreso</label>
                        <Dropdown
                            disabled 
                            v-model="form.egress" 
                            :options="yesOrNot" 
                            name="egress" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('egress')}" 
                            placeholder="Egreso" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-field">Motivo</label>
                        <Dropdown
                            disabled 
                            v-model="form.egress_reason_law" 
                            :options="egress_reason_law" 
                            name="egress_reason_law" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('egress_reason_law')}" 
                            placeholder="Motivo" />
                    </div>
                </div>

                <div class="mb-3">
                    <span class="text-18">¿Tipo de infracción por la que tiene caso pendiente con la justicia?</span>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="pending_cases" class="p-field">Asociadas a las drogas</label>
                        <Dropdown
                            disabled 
                            v-model="form.drugs" 
                            :options="yesOrNot"
                            name="drugs" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('drugs')}" 
                            placeholder="Asociadas a las drogas" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-field">De índole sexual</label>
                        <Dropdown
                            disabled 
                            v-model="form.sexual_nature" 
                            :options="yesOrNot"
                            name="sexual_nature" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('sexual_nature')}"  
                            placeholder="De índole sexual" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-field">Contra la propiedad</label>
                        <Dropdown
                            disabled 
                            v-model="form.against_property" 
                            :options="yesOrNot"
                            name="against_property" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('against_property')}"  
                            placeholder="Contra la propiedad" />
                    </div>
                </div>

                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="pending_cases" class="p-field">Contra la vida</label>
                        <Dropdown
                            disabled 
                            v-model="form.against_life" 
                            :options="yesOrNot"
                            name="against_life" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('against_life')}"  
                            placeholder="Contra la vida" />
                    </div>
                    <div class="p-field p-col">
                        <label for="another_center_entered" class="p-field">Otros</label>
                        <Dropdown
                            disabled 
                            v-model="form.others_law" 
                            :options="yesOrNot"
                            name="others_law" 
                            v-validate 
                            data-vv-rules="required" 
                            :class="{'p-invalid': errors.has('others_law')}"   
                            placeholder="Otros" />
                    </div>
                </div>


                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col">
                        <label for="commentaries" class="p-field">Comentarios internos</label>
                        <InputText disabled v-model="form.commentaries" id="commentaries" placeholder="Comentarios internos" />
                    </div>
                </div>
                
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
    name: 'ResidentDialogDetail',
    props: ['resident'],
    components: {
        Field,
    },
    data(){
        return{
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
            province: {},
            canton: {},
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
                name: this.resident.name,
                surname: this.resident.surname,
                second_surname: this.resident.second_surname,
                identification: this.resident.identification,
                nationality: 'Perú',
                genre: this.resident.genre,
                record: Number(this.resident.record),
                age: Number(this.resident.age),
                religion: this.resident.religion,
                date_birth: this.resident.date_birth,
                origin: this.resident.origin,
                status: this.resident.status,
                admission_date: this.resident.admission_date,
                egress_date: this.resident.egress_date,
                entry_hour: this.resident.entry_hour,
                egress_hour: this.resident.egress_hour,
                egress_reason: this.resident.egress_reason,
                first_treatment: this.resident.first_treatment,
                another_center_entered: this.resident.another_center_entered,
                times_he_entered: Number(this.resident.times_he_entered),
                marital_status: this.resident.marital_status,
                have_children: this.resident.have_children,
                children_number: Number(this.resident.children_number),
                job: this.resident.job,
                occupation: this.resident.occupation,
                study: this.resident.study,
                educational_level: this.resident.educational_level,
                kind_resident: this.resident.kind_resident,
                cellphone: Number(this.resident.cellphone),
                on_street: this.resident.on_street,
                referral_from_cai: this.resident.referral_from_cai,
                destiny: this.resident.destiny,
                destiny_reason: this.resident.destiny_reason,
                province: this.resident.province,
                canton: this.resident.canton,
                address: this.resident.address,
                psychiatric_diagnosis: this.resident.psychiatric_diagnosis,
                drug_dependence_diagnosis: this.resident.drug_dependence_diagnosis,
                consumption_data_table: JSON.parse(this.resident.consumption_data_table),
                pending_cases: this.resident.pending_cases,
                egress: this.resident.egress,
                egress_reason_law: this.resident.egress_reason_law,
                drugs: this.resident.drugs,
                sexual_nature: this.resident.sexual_nature,
                against_property: this.resident.against_property,
                against_life: this.resident.against_life,
                others_law: this.resident.others_law,
                bath: this.resident.bath,
                clothe: this.resident.clothe,
                listens: this.resident.listens,
                bedroom: this.resident.bedroom,
                breakfast: this.resident.breakfast,
                morning_snack: this.resident.morning_snack,
                lunch: this.resident.lunch,
                afternoon_snack: this.resident.afternoon_snack,
                dinner: this.resident.dinner,
                psychology: this.resident.psychology,
                social_work: this.resident.social_work,
                medicine: this.resident.medicine,
                counseling: this.resident.counseling,
                occupational_therapy: this.resident.occupational_therapy,
                group_sessions: this.resident.group_sessions,
                others: this.resident.others,
                commentaries: this.resident.commentaries,
                image: this.resident.photo,
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
        console.log(
            JSON.parse(this.resident.consumption_data_table)
        )
        this.provinces = ['San José', 'Alajuela', 'Cartago','Heredia','Guanacaste','Puntarenas','Limón'];
        if (this.form.province == 'San José') {
                this.listCanton = this.cantonesData[0].catones;
        }
        if (this.form.province == 'Alajuela') {
                this.listCanton = this.cantonesData[1].catones;
        }
        if (this.form.province == 'Cartago') {
                this.listCanton = this.cantonesData[2].catones;
        }
        if (this.form.province == 'Heredia') {
                this.listCanton = this.cantonesData[3].catones;
        }
        if (this.form.province == 'Guanacaste') {
                this.listCanton = this.cantonesData[4].catones;
        }
        if (this.form.province == 'Puntarenas') {
                this.listCanton = this.cantonesData[5].catones;
        }
        if (this.form.province == 'Limón') {
                this.listCanton = this.cantonesData[6].catones;
        }
    },

    computed: {
        yearRange(){
            const years = `1940:${new Date().getFullYear()}`
            return years;
        }
    },
}
</script>

<style>

</style>