import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

export function useAuth() {
  return computed(() => usePage().props.user || null);
}
