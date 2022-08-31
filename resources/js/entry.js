import IndexField from './components/IndexField';
import DetailField from './components/DetailField';
import FormField from './components/FormField';

Nova.booting((Vue, router) => {
  new MutationObserver(() => {
    const cls = document.documentElement.classList;
    const isDarkMode = cls.contains('dark');

    if (isDarkMode && !cls.contains('trumbowyg-dark')) {
      cls.add('o1-dark', 'trumbowyg-dark');
    } else if (!isDarkMode && cls.contains('trumbowyg-dark')) {
      cls.remove('o1-dark', 'trumbowyg-dark');
    }
  }).observe(document.documentElement, {
    attributes: true,
    attributeOldValue: true,
    attributeFilter: ['class'],
  });

  Vue.component('index-o1-trumbowyg-field', IndexField);
  Vue.component('detail-o1-trumbowyg-field', DetailField);
  Vue.component('form-o1-trumbowyg-field', FormField);
});
