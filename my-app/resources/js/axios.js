import axios from 'axios';

function getAuthToken() {
  return localStorage.getItem('auth_token');
}

const instance = axios.create({
  baseURL: '/',
  headers: {
    'Content-Type': 'application/json',
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': `Bearer ${getAuthToken()}`,
  },
});

export default instance;
