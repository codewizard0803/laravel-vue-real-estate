import axios from 'axios';

export const fetchLists = ({ country = '', isOnSale = '', priceLessThan = '' }) => {
    return axios.get(`/lists?country=${country}&isOnSale=${isOnSale}&priceLessThan=${priceLessThan}`)
        .then(response => response.data);
};