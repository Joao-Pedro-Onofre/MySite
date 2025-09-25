<template>
	<section class="projects-section glass-section" id="projects">
		<div class="container px-4 px-lg-5">
			<nav>
				<h2 class="custom-h2 text-white mb-4">Projects</h2>
			</nav>


			<div class="row gx-4 gx-lg-5 mt-5 justify-content-center">
				<div v-for="p in projects" :key="p.title" class="col-md-4 mb-3 mb-md-0 mt-5">
					<div class="card h-100">
						<div class="card-body">
							<div class="card-image">
								<img class="project-image img-fluid" :src="p.img" :alt="p.title" loading="lazy" />
							</div>
							<div class="card-text mt-2">
								<h3 class="project-title">
									<a v-if="p.link" :href="p.link" target="_blank" rel="noopener">{{ p.title }}</a>
									<span v-else>{{ p.title }}</span>
								</h3>
								<p class="project-text">{{ p.text }}</p>
							</div>
							<div class="card-tags">
								<span v-for="t in p.tags" :key="t" class="badge rounded-pill">{{ t }}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>


<script setup>
import { projects } from '../data/projects'
</script>