<template>
	<div class="exp-card">
		<div class="exp-header">
			<span class="exp-time">{{ time }}</span>
			<h4 class="mt-1">{{ title }}</h4>
			<h5 v-if="course" class="text-white-50">{{ course }}</h5>
		</div>

		<p class="mt-3 mb-2 fw-semibold">Highlights:</p>
		<ul class="exp-points">
			<li v-for="p in points" :key="p">{{ p }}</li>
		</ul>

		<div class="card-tags mt-2">
			<span v-for="t in tags" :key="t" class="badge rounded-pill">{{ t }}</span>
		</div>
	</div>
</template>

<script setup lang="ts">
defineProps<{
	time: string
	title: string
	course?: string
	points: string[]
	tags: string[]
}>()
</script>