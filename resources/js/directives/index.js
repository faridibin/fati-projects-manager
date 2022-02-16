import Vue from 'vue'

Vue.directive('tooltip', function (el, binding) {
    $(el).tooltip({
        title: binding.value || 'N/A',
        placement: binding.arg,
        trigger: 'hover',
        boundary: 'window',
        container: 'body'
    })
})
