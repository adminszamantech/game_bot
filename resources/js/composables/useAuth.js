import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

export function useAuth() {
  const { props } = usePage();
  return computed(() => props.auth || null);
}
