import _ from 'lodash';
import axios from 'axios';
// import moment from 'moment';
// import moment from 'moment-timezone';
import {Bus} from './bus.js';

export default {
    computed: {
        Spa() {
            return Spa;
        }
    },


    methods: {
        /**
         * Determine if the given date is in the future.
         */
        // dateInTheFuture(date) {
        //     return moment().diff(moment(date).tz("Indian/Maldives").local(), 'minutes') < 0;
        // },


        /**
         * Show the time ago format for the given time.
         */
        // timeAgo(time) {
        //     // return moment(time + ' Z').utc().local().fromNow();
        //     return moment(time).tz("Indian/Maldives").local().fromNow();
        // },


        /**
         * Show the time in local time.
         */
        // localTime(time) {
        //     // return moment(time + ' Z').utc().local().format('MMMM Do YYYY, h:mm:ss A');
        //     return moment(time).tz("Indian/Maldives").local().format('MMMM Do YYYY, h:mm:ss A');
        // },


        /**
         * Truncate the given string.
         */
        truncate(string, length = 70) {
            return _.truncate(string, {
                'length': length,
                'separator': /,? +/,
                'omission': ''
            });
        },


        /**
         * Creates a debounced function that delays invoking a callback.
         */
        debouncer: _.debounce(callback => callback(), 500),


        /**
         * Convert string to slug.
         *
         * src: https://gist.github.com/mathewbyrne/1280286
         */
        slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-');
        },


        /**
         * Create an instance of axios.
         */
        http() {
            let instance = axios.create();

            instance.defaults.baseURL = '/';
            // instance.defaults.baseURL = '/' + Spa.path;

            instance.interceptors.response.use(
                response => response,
                error => {
                    switch (error.response.status) {
                        case 500:
                            Bus.$emit('httpError', error.response.data.message);
                            break;

                        case 401:
                            window.location.href = '/logout';
                            // window.location.href = '/' + Spa.path + '/logout';
                            break;
                    }

                    return Promise.reject(error);
                }
            );

            return instance;
        },


        /**
         * Show an error message.
         */
        alertError(message) {
            this.$root.alert.type = 'error';
            this.$root.alert.autoClose = false;
            this.$root.alert.message = message;
        },


        /**
         * Show confirmation message.
         */
        alertConfirm(message, success, failure) {
            this.$root.alert.type = 'confirmation';
            this.$root.alert.autoClose = false;
            this.$root.alert.message = message;
            this.$root.alert.confirmationProceed = success;
            this.$root.alert.confirmationCancel = failure;
        },


        /**
         * Show a success message.
         */
        notifySuccess(message, autoClose) {
            this.$root.notification.type = 'success';
            this.$root.notification.autoClose = autoClose;
            this.$root.notification.message = message;
        },
    }
};
