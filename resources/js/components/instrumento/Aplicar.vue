<template>
  <div class="mt-5">
    <input
      type="text"
      placeholder="Buscar Residente"
      v-model="queryClient"
      v-on:keyup="autoComplete2"
      class="form-control"
    />

    <div
      class="panel-footer"
      v-if="resultsResidents.length"
      style="width: 100%;"
    >
      <ul class="list-group">
        <li
          class="list-group-item"
          v-for="result in resultsResidents"
          :key="result.id"
        >
          <div @click="selectResident(result)">
            <span style="font-size:13px">
              {{ result.name }} -
              {{ result.surname }}
            </span>
          </div>
        </li>
      </ul>
    </div>

    <div class="card w-75m mt-5" v-if="selectedResident">
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <Avatar :image="selectedResident.photo" size="xlarge" />
          </div>
          <div class="col-md-2">
            <h5>Name</h5>
            {{ selectedResident.name }}
          </div>
          <div class="col-md-2">
            <h5>Surname</h5>
            {{ selectedResident.surname }}
          </div>
          <div class="col-md-2">
            <h5>Nationality</h5>
            {{ selectedResident.nationality }}
          </div>
          <div class="col-md-3">
            <h5>Address</h5>
            {{ selectedResident.address }}
          </div>
        </div>
      </div>
    </div>

    <div class="my-5"  v-if="selectedResident">
      <div class="row col-md-12">
        <div class="col-md-4">
          <label for="">Establecer estatus del instrumento</label>
          <select class="form-select" aria-label="Default select example" v-model="selectedStatus" @change="onChange()" >
              <option value="En Proceso">En Proceso</option>
              <option value="Completo">Completo</option>
            <option value="No logrados">No logrados</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="">Cantidad de veces atendido</label>
          <select class="form-select" aria-label="Default select example" v-model="selectedCount" @change="onChange()" >
              <option v-for="n in 50" :key="n">{{n}}</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="">Fases</label>
          <select class="form-select" aria-label="Default select example" v-model="selectedFases" @change="onChange()" >
              <option value="Fase 1">Fase 1</option>
              <option value="Fase 2">Fase 2</option>
            <option value="Fase 3">Fase 3</option>
          </select>
        </div>

      </div>
    </div>

    <div v-if="instrumentosAplicados.length > 0">
      <div class="my-5 mx-2 d-flex justify-content-between">
        <h3>Instrumentos Aplicados a : {{selectedResident.name}}</h3>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NAME</th>
            <th scope="col">ROL</th>
            <th scope="col">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, i) in instrumentosAplicados" :key="item.id">
            <th scope="row">{{ i + 1 }}</th>
            <td>{{ item.title }}</td>
            <th scope="row">{{ item.rol }}</th>
            <td>
              <a class="btn btn-primary btn-sm text-light mr-5" @click="ver(item.id, 2)">Ver</a>
              <a
                @click="llenar(item.id)"
                class="btn btn-dark  btn-sm text-light mr-5"
                >Llenar</a
              >
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="my-5 mx-2 d-flex justify-content-between">
      <h3>Instrumentos de {{rol}}</h3>
      <a href="/instruments/gestionar" class="btn btn-info text-light"
        >Gestionar mis Instrumentos</a
      >
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NAME</th>
          <th scope="col">ROL</th>
          <th scope="col">ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, i) in resultstInstruments" :key="item.id">
          <th scope="row">{{ i + 1 }}</th>
          <td>{{ item.title }}</td>
          <th scope="row">{{ item.rol }}</th>
          <td>
            <a href="#" class="btn btn-primary btn-sm text-light mr-5" @click="ver(item.id, 1)">Ver</a>
            <a
              @click="aplicar(item)"
              v-if="selectedResident"
              class="btn btn-success  btn-sm text-light mr-5"
              >Aplicar</a
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "Aplicar",
  props: ["instrumentos", "rol"],
  data() {
    return {
      query: "",
      queryClient: "",
      results: [],
      resultsResidents: [],
      instrumentosAplicados: [],
      selectedResident: null,
      resultstInstruments:[],
      selectedStatus: null,
      selectedCount: null,
      selectedFases: null,
    };
  },
  created() {
    //   this.getData()
  },
  mounted(){
    this.loadInstrument();
  },
  methods: {
    autoComplete2() {
      this.resultsResidents = [];
      if (this.queryClient.length > 1) {
        axios.get("/getResidentJson/" + this.queryClient).then((response) => {
          this.resultsResidents = response.data;
        });
      }
    },
    loadInstrument() {
        axios.get("/instruments/all").then((response) => {
          this.resultstInstruments = response.data;
        });
    },

    selectResident(result) {
      this.loadInstrument();
      this.resultsResidents = [];
      this.selectedResident = result;
      this.resultstInstrument = this.instrumentos
      this.loadInstrumentsResident();
      this.loadInstrumentsStatus();
    },

    loadInstrumentsResident(){
      let form= {
        'id': this.selectedResident.id
      }
      axios
        .post("/instruments/aplicar-resident-get", form)
        .then((response) => {
          this.instrumentosAplicados = response.data
          this.loadNewInstrument();

        })
        .catch((error) => {});
    },

    loadInstrumentsStatus(){
      let form= {
        'id': this.selectedResident.id
      }
      axios
        .post("/instruments/resident-instrument-status", form)
        .then((response) => {

          console.log(response.data)

            if(this.rol == 'Psicología'){
                this.selectedStatus = response.data.s_psicologia; 
                this.selectedCount = response.data.c_psicologia; 
                this.selectedFases = response.data.f_psicologia; 
            }
            if(this.rol == 'Trabajado Social'){
              this.selectedStatus = response.data.s_trabajo_social; 
              this.selectedCount = response.data.c_trabajo_social; 
              this.selectedFases = response.data.f_trabajo_social; 
                
            }
            if(this.rol == 'Enfermería'){
              this.selectedStatus = response.data.s_enfermeria; 
              this.selectedCount = response.data.c_enfermeria; 
              this.selectedFases = response.data.f_enfermeria; 
                
            }
            if(this.rol == 'Doctor'){
              this.selectedStatus = response.data.s_medicina; 
              this.selectedCount = response.data.c_medicina; 
              this.selectedFases = response.data.f_medicina; 
            }
            if(this.rol == 'Consejero'){
              this.selectedStatus = response.data.s_consejeria; 
              this.selectedCount = response.data.c_consejeria; 
              this.selectedFases = response.data.f_consejeria; 
                
            }

        })
        .catch((error) => {});
    },
    
    onChange(){
      let form = {
            status: this.selectedStatus,
            count: this.selectedCount,
            fase: this.selectedFases,
            resident: this.selectedResident.id,
            rol: this.rol,
          };

      axios
        .post("/instruments/aplicar-resident-instrument-status", form)
        .then((response) => {
          console.log(response)

        })
        .catch((error) => {});
    },

    loadNewInstrument(){
      this.instrumentosAplicados.forEach((valor) =>  { 
        for (var i = this.resultstInstruments.length - 1; i >= 0; --i) {
            if (this.resultstInstruments[i].id == valor.instrument_id) {
                this.resultstInstruments.splice(i,1);
            }
        }              
      });
      
    },

    aplicar(instrument) {

      if(!this.selectedResident){
        alert('Seleccione un residente')
        return;
      }
      let form = {
        instrument: instrument,
        resident: this.selectedResident.id,
      };

      axios
        .post("/instruments/aplicar-resident", form)
        .then((response) => {
          this.loadInstrumentsResident();
          window.open("/instruments/llenar/"+response.data.id, '_blank');

        })
        .catch((error) => {});
    },

    ver(id, type){
      window.open("/instruments/ver/"+id+"/"+type, '_blank');

    },
    
    llenar(id){
       window.open("/instruments/llenar/"+id, '_blank');

    }
  },
  computed: {
    loadModal() {
      return this.isDialogEdit;
    },
  },
};
</script>

<style scoped></style>
