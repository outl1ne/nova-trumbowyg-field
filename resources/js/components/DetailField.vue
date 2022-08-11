<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <Excerpt :content="field.value" :plain-text="true" :should-show="field.shouldShow" class="o1-trumbowyg-detail" />
    </template>
  </PanelItem>
</template>

<script>
export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
};
</script>
