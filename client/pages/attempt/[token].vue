<template>
  <div class="flex items-center justify-center w-screen h-screen">
    <icon icon="eos-icons:loading" class="w-12 h-12" />
  </div>
</template>
<script lang="ts" setup>
import { useRoute, useRouter } from 'vue-router'
import { Icon } from '@iconify/vue'

const { $api, $utils } = useNuxtApp()
const route = useRoute()
const router = useRouter()
const verify = async () => {
  const redirect = await $api.login(await $api.attempt(route.params.token))
  await $utils.sleep(400)
  await router.push(redirect)
}
useHead({ title: 'Authenticating..' })
if (getCurrentInstance()) onMounted(verify)
</script>

<script lang="ts">
export default { layout: 'public' }
</script>
