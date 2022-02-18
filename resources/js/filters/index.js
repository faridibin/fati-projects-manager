import Vue from 'vue'
import moment from 'moment'

Vue.filter('date.humanize', (value) => {
    if (!value) return value

    return moment(value, "YYYY-MM-DD").calendar(
        null, {
            sameDay: "[Today]",
            lastDay: "[Yesterday], MMM D",
            lastWeek: "[Last] dddd, MMM D",
            sameElse: "MMMM D YYYY",
        }
    );
})

Vue.filter('trans', (value = null, key = null, replace = [], locale = 'en') => {
    if (value && key) {
        const [lang, ...options] = key.split('.');
        let languageLines = require(`../lang/${locale}/${lang}`);
        let text = null;

        if (languageLines) {
            options.forEach((option) => {
                languageLines = languageLines[option]
            });

            text = languageLines[value]

            if (replace.length) {
                // TODO: write replace code
            }

            return text
        }
    }

    return value
})
