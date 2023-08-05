<template>
  <div>
    <Head title="Organizations" />
    <h1 class="mb-8 text-3xl font-bold">Project Name: Matina Building</h1>
    <!-- <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <Link class="btn-indigo" href="/organizations/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Organization</span>
      </Link>
    </div> -->
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Item</th>
            <!-- <th class="pb-4 pt-6 px-6">Cost</th> -->
            <th class="pb-4 pt-6 px-6">Plan</th>
            <th class="pb-4 pt-6 px-6">Actual</th>
            <th class="pb-4 pt-6 px-6">Usage</th>
            <th class="pb-4 pt-6" align="center">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="material in materials" :key="material.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
                <span class="flex items-center px-6 py-4 focus:text-indigo-500">
                  {{ material.name }}
                </span>
            </td>
            <td class="border-t">
              <span class="flex items-center px-6 py-4 focus:text-indigo-500">
                {{ material.budget_qty }} {{ material.unit}}
              </span>  
            </td>
            <td class="border-t">
              <span class="flex items-center px-6 py-4 focus:text-indigo-500">
                {{ material.actual_qty }} {{ material.unit}}
              </span>  
            </td>
            <td class="border-t">
              <span class="flex items-center px-6 py-4 focus:text-indigo-500">
                {{ (material.actual_qty/material.budget_qty * 100).toFixed(2) }}%
                </span>
            </td>
            <td class="border-t" align="center">
              
                <Link style="display:inline-block" class="pr-2" :href="`/organizations/${material.id}/add`" tabindex="-1">
                <icon name="plus" class="" />
                </Link>
              
                <Link style="display:inline-block" class="" :href="`/organizations/${material.id}/add`" tabindex="-1">
                <icon name="minus" class="" />
                </Link>
              
              
              <!-- <button @click="addItem(material.id)"><icon name="plus" class="pr-2" /></button>
              <button><icon name="minus" class="" /></button> -->
            </td>
            <!-- <td class="w-px border-t">
              <Link class="flex items-center px-4" :href="`/organizations/${project.id}/edit`" tabindex="-1">
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
            </td> -->
          </tr>
          <!-- <tr v-if="project.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>
          </tr> -->
        </tbody>
      </table>
    </div>
    <!-- <pagination class="mt-6" :links="organizations.links" /> -->
    
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
// import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    // SearchFilter,
  },
  layout: Layout,
  props: {
    qty: {
      type: Number,
      default: 0
    },
    id: Number,
    organizations: Object,
  },
  data() {
    return {
      materials: [
        {id: 1, name: 'Holcim Cement', cost: 255, budget_qty: 1000, unit: 'sk', actual_qty: 750 },
        {id: 2, name: 'Roofing (Rib Type)', cost: 805, budget_qty: 50, unit: 'sh', actual_qty: 46},	
        {id: 3, name: '12mm Def. Bar', cost: 650, budget_qty: 300, unit: 'ln', actual_qty: 100}
      ]
    }
  },
  async mounted() {
    if(this.$props.qty > 0){
        this.materials = await this.materials.map(
        (material) =>  
        {
          console.log('map', material.id, this.$props.id);
          if (material.id == this.$props.id){
            console.log( { ...material, actual_qty: material.actual_qty + this.$props.qty })
            return { ...material, actual_qty: (material.actual_qty * 1) + (this.$props.qty * 1)}
          } else {
            return { ...material }
          }
        }
        );
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/organizations', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    addItem(id){
      console.log('add item', id)
    }
  },
}
</script>
<style scoped>
.orange {
  color: orange;
  font-weight: bold;
}
.red {
  color: red;
  font-weight: bold;
}
.green {
  color: green;
  font-weight: bold;
}

</style>