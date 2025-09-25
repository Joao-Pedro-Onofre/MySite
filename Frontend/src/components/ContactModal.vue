<template>
	<!-- Contact Modal -->
	<div class="modal fade dark-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content glass-dark modal-glass"> <!-- glass vibe -->
				<div class="modal-header border-0">
					<h3 class="custom-h2 text-white mb-2">Contact Me</h3>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body pt-0">
					<form id="contactForm" @submit.prevent="submit" novalidate>
						<div class="row g-3">
							<div class="col-md-6">
								<div class="glass-input">
									<input v-model.trim="form.name" type="text" class="form-control" id="name" placeholder="Your Name" required>
								</div>
							</div>

							<div class="col-md-6">
								<div class="glass-input">
									<!-- your backend expects 'address' as email -->
									<input v-model.trim="form.address" type="email" class="form-control" id="email" placeholder="name@email.com" required>
								</div>
							</div>

							<div class="col-12">
								<div class="glass-input">
									<input v-model.trim="form.subject" type="text" class="form-control" id="subject" placeholder="Subject">
								</div>
							</div>

							<div class="col-12">
								<div class="glass-input">
									<textarea v-model.trim="form.message" class="form-control" placeholder="Message" id="message" style="height: 150px" required></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="modal-footer justify-content-center border-0 pt-0">
					<button class="btn btn-primary px-4" :disabled="loading" @click="submit">
						<span v-if="loading" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
						Send
					</button>
				</div>
			</div>
		</div>
	</div>

</template>

<script setup>
import Swal from 'sweetalert2'
import { reactive, ref } from 'vue'
import { api } from '@/api'

// empty fields first (what you wanted)
const form = reactive({
	name: '',
	address: '',   // email
	subject: '',
	message: '',
})
function toast(icon, title) {
	Swal.fire({
		toast: true,
		icon,            // 'success' | 'error' | 'info' | 'warning'
		title,
		position: 'top-end',
		showConfirmButton: false,
		timer: 2000,
		timerProgressBar: true,
	})
}

const loading = ref(false)

async function submit() {
	if (!form.name || !form.address || !form.subject || !form.message) {
		toast('warning', 'Oops, There is still empty fields!')
		return
	}
	loading.value = true
	try {
		// use /api/email if you added routes/api.php; otherwise '/email'
		await api.post('/api/email', { ...form })
		toast('success', 'Message sent!')

		// reset fields
		form.name = form.address = form.subject = form.message = ''

		// close Bootstrap modal (if bootstrap JS is loaded)
		const el = document.getElementById('exampleModal')
		if (window.bootstrap) {
			(bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el)).hide()
		}
	} catch (err) {
		// show first validation error if present
		const data = err?.response?.data
		const first =
			(data?.errors && Object.values(data.errors)[0][0]) ||
			data?.message || 'Failed to send'
		toast('error', first)
	} finally {
		loading.value = false
	}
}
</script>