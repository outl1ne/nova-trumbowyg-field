<template>
  <DefaultField :field="currentField" :errors="errors" :show-help-text="showHelpText">
    <template #field>
      <div :class="[errorClasses, errorClasses.length ? 'o1-border' : '', 'o1-mb-4']" @keydown.stop>
        <Trumbowyg v-model="value" :config="field.options" />
      </div>

      <p v-if="hasError" class="o1-my-2 o1-text-red-500">
        {{ firstError }}
      </p>
    </template>
  </DefaultField>
</template>

<script>
import { DependentFormField, HandlesValidationErrors } from 'laravel-nova';
import Trumbowyg from 'vue-trumbowyg';

export default {
  mixins: [HandlesValidationErrors, DependentFormField],

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

<style lang="scss">
.trumbowyg-dark .trumbowyg-editor {
  background: #1a1a1a !important;
  color: #f4f7fa !important;

  h1,
  h2,
  h3,
  h4,
  blockquote {
    color: #f4f7fa !important;
  }
}
</style>
