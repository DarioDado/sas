import Axios from 'axios';
import constants from '../shared/constants';

const { headers } = constants.headers;

export default {
  async getData(path) {
    const response = await Axios.get(`${constants.rootApiUrl}/${path}`, {
      headers,
    });
    return response;
  },
  async postData(path, data) {
    const response = await Axios.post(`${constants.rootApiUrl}/${path}`, {
      headers,
      data,
    });
    return response;
  },
};
