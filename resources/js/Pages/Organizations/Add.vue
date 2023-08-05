<template>
  <div>
    
    <Head title="Add Materials" />
    <h1 class="mb-8 text-3xl font-bold">
      {{ material.name }}
    </h1>
    <!-- <trashed-message v-if="contact.deleted_at" class="mb-6" @restore="restore"> This contact has been deleted. </trashed-message> -->
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.qty" :error="form.errors.qty" class="pb-8 pr-6 w-full lg:w-1/2" label="Qty" />
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <!-- <button v-if="!contact.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Contact</button> -->

          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import TrashedMessage from '@/Shared/TrashedMessage'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Layout,
  props: {
    id: Number
    // contact: Object,
    // organizations: Array,
  },
  remember: 'form',
  computed: {
    material(){
      return this.materials.find( material => material.id == this.$props.id); 
    }
  },
  data() {
    return {
      materials: [
        {id: 1, name: 'Holcim Cement', cost: 255, budget_qty: 1000, unit: 'sk', actual_qty: 750 },
        {id: 2, name: 'Roofing (Rib Type)', cost: 805, budget_qty: 50, unit: 'sh', actual_qty: 46},	
        {id: 3, name: '12mm Def. Bar', cost: 650, budget_qty: 300, unit: 'ln', actual_qty: 100}
      ],
      form: this.$inertia.form({
        qty: ''
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/organizations/${this.$props.id}`)
    },
    // destroy() {
    //   if (confirm('Are you sure you want to delete this contact?')) {
    //     this.$inertia.delete(`/contacts/${this.contact.id}`)
    //   }
    // },
    // restore() {
    //   if (confirm('Are you sure you want to restore this contact?')) {
    //     this.$inertia.put(`/contacts/${this.contact.id}/restore`)
    //   }
    // },
  },
}
</script>
