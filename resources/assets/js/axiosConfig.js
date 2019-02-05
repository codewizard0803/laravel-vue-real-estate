import axios from 'axios';

axios.defaults.baseURL = '/api';
axios.defaults.headers.common['Authorization'] = 'Bearer ' + USER_API_TOKEN;
