<template>
  <div>
      <Menubar :model="items" class="shadow-sm">
         <template #start>
            <span class="p-mr-2">LOGO</span>
         </template>
      </Menubar>
  </div>
</template>

<script>
export default {
    name: 'MenuTop',    
    data(){
        return {
            items: 
            [
                {
                   label:'Residentes',
                   icon:'pi pi-fw pi-users',
                   items:[
                      {
                         label:'Agregar',
                         url: '/residents/create',
                         icon:'pi pi-fw pi-plus'                         
                      },
                      {
                         label:'Ver listado',
                         url: '/residents',
                         icon:'pi pi-fw pi-search'
                      },
                      {
                         separator:true
                      },
                      {
                         label:'Export',
                         icon:'pi pi-fw pi-external-link'
                      }
                   ]
                },
                {
                   label:'Miembros',
                   icon:'pi pi-fw pi-user',
                   items:[
                      {
                         label:'Agregar',
                         url: '/members/create',
                      
                         icon:'pi pi-fw pi-plus'                         
                      },
                      {
                         label:'Ver todos',
                        url: '/members',
                         icon:'pi pi-fw pi-search'
                      },
                   ]
                },
                {
                   label:'Reportes',
                   icon:'pi pi-fw pi-chart-bar',
                   items:[
                      {
                         label:'IAFA',
                         icon:'pi pi-fw pi-external-link'                         
                      },
                      {
                         label:'Iternos',
                         icon:'pi pi-fw pi-external-link'
                      },
                   ]
                },
                {
                   label:'Salir',
                   url: '/logout',
                   icon:'pi pi-fw pi-power-off',
                }
                
            ]
        }
    }
}
</script>

<style>

</style>