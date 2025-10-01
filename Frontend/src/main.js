// src/main.js
import { createApp } from 'vue'
import App from './App.vue'
// Now import YOUR global CSS (bundled by Vite)
import './styles/styles.css'
import './styles/MyStyles.css'

/* -------------------------------------------------
   Small helpers to inject CDN assets
------------------------------------------------- */
function loadStyle(href, attrs = {}) {
	return new Promise((resolve, reject) => {
		if (document.querySelector(`link[data-href="${href}"]`)) return resolve()
		const link = document.createElement('link')
		link.rel = 'stylesheet'
		link.href = href
		link.setAttribute('data-href', href)
		Object.entries(attrs).forEach(([k, v]) => link.setAttribute(k, v))
		link.onload = () => resolve()
		link.onerror = () => reject(new Error(`Failed to load CSS: ${href}`))
		document.head.appendChild(link)
	})
}

function loadScript(src, attrs = {}) {
	return new Promise((resolve, reject) => {
		if (document.querySelector(`script[data-src="${src}"]`)) return resolve()
		const s = document.createElement('script')
		s.src = src
		s.async = true
		s.defer = true
		s.setAttribute('data-src', src)
		Object.entries(attrs).forEach(([k, v]) => s.setAttribute(k, v))
		s.onload = () => resolve()
		s.onerror = () => reject(new Error(`Failed to load JS: ${src}`))
		document.head.appendChild(s)
	})
}

/* -------------------------------------------------
   CDN URLs you asked for
------------------------------------------------- */
const CDN = {
	// Bootstrap 5
	bootstrapCSS: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
	bootstrapJS: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',

	// Font Awesome 6
	fontAwesomeCSS: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',

	// Google Fonts
	gfVarela: 'https://fonts.googleapis.com/css?family=Varela+Round',
	gfNunito: 'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',

	// StartBootstrap Forms (optional, loads only if needed)
	sbForms: 'https://cdn.startbootstrap.com/sb-forms-latest.js',
}

/* -------------------------------------------------
   Load 3rd-party CSS FIRST so our CSS can override it
   (Top-level await works in Vite ESM)
------------------------------------------------- */
await Promise.all([
	loadStyle(CDN.bootstrapCSS),
	loadStyle(CDN.fontAwesomeCSS),
	loadStyle(CDN.gfVarela),
	loadStyle(CDN.gfNunito),
])

/* -------------------------------------------------
   Create & mount the Vue app
------------------------------------------------- */
const app = createApp(App)
app.mount('#app')

/* -------------------------------------------------
   After mount: load Bootstrap JS and SB Forms (if needed)
------------------------------------------------- */
try {
	await loadScript(CDN.bootstrapJS)
	if (document.querySelector('form[data-sb-form-api-token]')) {
		await loadScript(CDN.sbForms)
	}
} catch (e) {
	console.warn('[CDN loader]', e?.message || e)
}
