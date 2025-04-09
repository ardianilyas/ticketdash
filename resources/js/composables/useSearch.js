// resources/js/Composables/useSearch.js
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash';

export function useSearch(routeName, initialValue = '') {
  const searchQuery = ref(initialValue);

  // Debounced function to perform the search
  const performSearch = debounce((query) => {
    router.get(
      route(routeName),
      { search: query },
      {
        preserveState: true,
        preserveScroll: true,
        replace: true,
      }
    );
  }, 800);

  // Watch for changes in searchQuery and trigger search
  watch(searchQuery, (newValue) => {
    performSearch(newValue);
  });

  return {
    searchQuery,
  };
}