<template>
	<footer class="site-footer">
		<div class="container">
			<nav aria-label="Footer">
				<ul class="footer-menu">
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About Me</a></li>
					<li><a href="#experience">Experience</a></li>
					<li><a href="#projects">Projects</a></li>
				</ul>
			</nav>
			<hr />


			<div class="footer-main row align-items-center justify-content-center g-4">
				<div class="col-md-5 d-flex justify-content-center justify-content-md-end">
					<ul class="social-list">
						<li><a class="social-btn" href="https://www.facebook.com/joaopedro.onofre.3?locale=pt_PT" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a></li>
						<li><a class="social-btn" href="https://github.com/Joao-Pedro-Onofre" target="_blank" rel="noopener"><i class="fab fa-github"></i></a></li>
						<li><a class="social-btn" href="https://www.linkedin.com/in/joao-pedro-onofre-82105626a" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a></li>
						<li><a class="social-btn" href="https://www.instagram.com/joao_p_onofre" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a></li>
					</ul>
				</div>


				<div class="col-md-2 d-none d-md-flex justify-content-center">
					<span class="footer-divider" aria-hidden="true"></span>
				</div>


				<div class="col-md-5">
					<h3 class="footer-heading custom-h3">Contact Information</h3>
					<ul class="contact-list">
						<li><i class="fa-solid fa-envelope"></i> <a href="mailto:joao.p.s.onofre@gmail.com" target="_blank">joao.p.s.onofre@gmail.com</a></li>
						<li><i class="fa-solid fa-location-dot"></i> Leiria / Torres Vedras</li>
					</ul>
				</div>
			</div>


			<p class="copy small mt-5 text-center">© {{ year }} João Pedro Onofre — All rights reserved.</p>
		</div>
	</footer>
</template>


<script setup>
import { computed } from 'vue'
const year = computed(() => new Date().getFullYear())
</script>