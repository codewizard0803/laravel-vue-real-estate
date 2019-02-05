import axios from 'axios';

export const fetchLists = ({ country = '', isOnSale = '', priceLessThan = '' }) => {
    return axios.get(`/lists?country=${country}&isOnSale=${isOnSale}&priceLessThan=${priceLessThan}`)
        .then(response => response.data);
};

export const fetchListItem = (id) => {
    return axios.get(`/lists/${id}`)
        .then(response => response.data);
};

export const fetchCountries = () => {
    return axios.get('/cities')
        .then(response => response.data);
};

export const fetchDevelopers = () => {
    return axios.get('/developers')
        .then(response => response.data);
};

export const createItem = (data) => {
    return axios.post('/lists', data)
        .then(response => response.data);
};
