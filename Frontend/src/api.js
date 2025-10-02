import axios from 'axios'

export const api = axios.create({
	baseURL: 'https://mysite-bl5n.onrender.com', // your Laravel URL
	headers: { Accept: 'application/json' },
})