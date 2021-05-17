<template>
  <div class="mt-5 pb-5 shadow">
    <DataTable 
      :value="residents" 
      :paginator="true" 
      :rows="10"
      :filters="filters"
      dataKey="id" 
      :rowHover="true"
      :loading="loading"
      paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown" 
      :rowsPerPageOptions="[10,25,50]"
      currentPageReportTemplate="Showing {first} to {last} of {totalRecords} entries"
      :selection.sync="selectedResidents"
      ref="table"
      > 

        <template #header>
            <div class="table-header pt-2 pb-2">
              <div class="p-d-flex p-jc-between p-ai-center">
                <div>
                  <h2 class="title">Residentes</h2>
                </div>                
                <div>
                  <a href="/residents/create" class="add-resident p-mr-2 d-inline-block">
                    <i class="pi pi-plus"></i>
                    Agregar
                  </a>
                  <Button label="Borrar seleccionados" icon="pi pi-trash" class="p-button-danger p-button-outlined p-mr-2" @click="confirmDeleteSelected" />
                  <Button label="Exportar" icon="pi pi-upload" class="p-button-help p-button-outlined p-mr-2" @click="exportCSV($event)"  />
                  <span class="p-input-icon-left">
                      <i class="pi pi-search" />
                      <InputText v-model="filters['global']" placeholder="Buscar por cualquier campo" />
                  </span>
                </div>
              </div>
            </div>
        </template>
        <template #loading>
          Loading customers data. Please wait.
        </template>

        <Column selectionMode="multiple" headerStyle="width: 3em"></Column>
        <Column header="Imagen">
          <template #body="slotProps">
              <Avatar 
                :image="slotProps.data.photo"
                size="xlarge"
              />

          </template>
        </Column>
        <Column field="identification" header="Identificación"></Column>
        <Column field="name" header="Nombre" :sortable="true"></Column>
        <Column field="surname" header="Apellido" :sortable="true"></Column>
        <Column field="admission_date" header="Fecha de admisión"></Column>
        <Column>
            <template #body="slotProps">
                <Button icon="pi pi-eye" class="p-button-rounded p-button-primary p-mr-2" @click="showResident(slotProps.data)" />
                <Button icon="pi pi-pencil" class="p-button-rounded p-button-success p-mr-2" @click="editResident(slotProps.data)" />
                <Button icon="pi pi-trash" class="p-button-rounded p-button-warning" @click="deleteResident(slotProps.data, slotProps.index)" />
            </template>
        </Column>
    </DataTable>

    <Toast position="top-right" />
    <ConfirmDialog></ConfirmDialog>
  </div>
</template>

<script>
export default {
    name: "Resident",
    data(){
      return {
        residents: [],
        loading: false,
        filters: {},
        isDialogEdit: false,
        selectedResidents: null,
      }
    },
    created(){
      this.getData()
    },
    methods:{
      async getData(){
        try {
          const residents = await axios.get('/residents/getData');
          this.residents = await residents.data;
        } catch (error) {
          console.log(error);
        }
      },
      async confirmDeleteSelected(){
        this.$confirm.require({
            message: `Estás seguro de eliminar varios registros`,
            header: 'Confirmar',
            icon: 'pi pi-exclamation-triangle',
            accept: async () => {
                try {
                  const residentsToDelete = this.selectedResidents.map((resident) => {
                    const { id } = resident;
                    return id;
                  })
                  const result = await axios.delete(`/residents/destroySeveralRecords/${residentsToDelete}`);
                  const indexes = this.selectedResidents.filter( (resident) => {
                    const index = this.residents.indexOf(resident);
                    if (index >= 0) {
                      this.residents.splice(index,1);
                    }
                    return this.residents.indexOf(resident) >= 0
                  })
                  this.$toast.add({severity:'success', summary: 'Operación exitosa', detail:'Residente eliminado', life: 3000});
                } catch (error) {
                  console.log(error);
                }
            },
            reject: () => {
                console.log("No pasa nada");
            }
        });
        
      },
      editResident(arg){
        console.log(arg);
          window.location = location.origin + "/residents/edit/"+arg.id;

      },
      showResident(arg){
        console.log(arg);
          window.location = location.origin + "/residents/show/"+arg.id;
      },
      deleteResident(resident, index){
        this.$confirm.require({
            message: `Estás seguro de eliminar a ${resident.name} ${resident.surname}`,
            header: 'Confirmar',
            icon: 'pi pi-exclamation-triangle',
            accept: async () => {
                try {
                  const result = await axios.delete(`/residents/destroy/${resident.id}`);          
                  this.$toast.add({severity:'success', summary: 'Operación exitosa', detail:'Residente eliminado', life: 3000})
                  this.getData();
                } catch (error) {
                  console.log(error);
                }
            },
            reject: () => {
                console.log("No pasa nada");
            }
        });
      },
      exportCSV(){
        this.$refs.table.exportCSV();
      },
    },
    computed: {
      loadModal(){
        return this.isDialogEdit;
      }
    }
}
</script>

<style scoped>
  .add-resident{
    text-decoration: none;
    color: #689F38;
    border: 1px solid;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    transition: background-color 0.2s, color 0.2s, border-color 0.2s, box-shadow 0.2s;
    border-radius: 3px;
    align-items: center;
    vertical-align: bottom;
    text-align: center;
    overflow: hidden;
    position: relative;
    font-weight: normal;
  }
</style>