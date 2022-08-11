<template>
  <DefaultField :field="field" :errors="errors" :show-help-text="showHelpText">
    <template #field>
      <div :class="[errorClasses, errorClasses.length ? 'o1-border' : '']" @keydown.stop>
        <Trumbowyg v-model="value" :config="field.options" />
      </div>

      <p v-if="hasError" class="o1-my-2 o1-text-red-500">
        {{ firstError }}
      </p>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';
import Trumbowyg from 'vue-trumbowyg';
import 'trumbowyg/dist/ui/trumbowyg.css';

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  components: { Trumbowyg },

  methods: {
    setInitialValue() {
      this.value = this.field.value || '';
    },

    fill(formData) {
      formData.append(this.field.attribute, this.value || '');
    },

    handleChange(value) {
      this.value = value;
    },
  },
};
</script>
