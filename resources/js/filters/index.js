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
