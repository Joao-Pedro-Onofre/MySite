<template>
	<header class="masthead d-flex align-items-center justify-content-center" id="home">
		<div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
			<div class="d-flex justify-content-center">
				<div class="text-center">
					<h1 class="mx-auto my-0 text-uppercase">João Pedro Onofre</h1>
					<h2 class="text-white-50 mx-auto mt-2 mb-5">Full-stack developer crafting web, backend, and business solutions with clean code and creative ideas</h2>
					<a class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact Me!</a>
					<a class="btn btn-primary m-3" href="#CV">Get my CV!</a>
				</div>
			</div>
		</div>
	</header>

	<ContactModal />
</template>


<script setup>
import ContactModal from '@/components/ContactModal.vue'
</script>