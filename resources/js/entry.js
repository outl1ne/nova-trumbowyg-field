import IndexField from './components/IndexField';
import DetailField from './components/DetailField';
import FormField from './components/FormField';

Nova.booting((Vue, router) => {
  Vue.component('index-o1-trumbowyg-field', IndexField);
  Vue.component('detail-o1-trumbowyg-field', DetailField);
  Vue.component('form-o1-trumbowyg-field', FormField);
});
