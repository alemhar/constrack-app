<template>
  <div>
    <Head title="Organizations" />
    <h1 class="mb-8 text-3xl font-bold">Projects</h1>
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
            <th class="pb-4 pt-6 px-6">Name</th>
            <th class="pb-4 pt-6 px-6">Plan</th>
            <th class="pb-4 pt-6 px-6">Actual</th>
            <th class="pb-4 pt-6 px-6">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="project in projects" :key="project.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/organizations/${project.id}/edit`">
                {{ project.name }}
                <!-- <icon v-if="organization.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" /> -->
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/organizations/${project.id}/edit`" tabindex="-1">
                {{ project.budget }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/organizations/${project.id}/edit`" tabindex="-1">
                {{ project.actual }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/organizations/${project.id}/edit`" tabindex="-1">
                <span :class="project.color">{{ project.status }}</span>
              </Link>
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
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    organizations: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
      projects: [
        {id: 1, name: 'Matina Building', budget: '5.6M', actual: '2.6M', status: '40%', color: 'orange' },
        {id: 2, name: 'Maa Road Widening', budget: '8.0M', actual: '7.4M', status: '60%', color: 'red' },	
        {id: 3, name: 'Prince Mansion', budget: '20.0M', actual: '18.4M', status: '90%', color: 'green'  }
      ]
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
    reset() {
      this.form = mapValues(this.form, () => null)
    },
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