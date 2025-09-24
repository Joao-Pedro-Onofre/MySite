<template>
	<nav class="main-menu" aria-label="Primary">
		<ul>
			<li v-for="s in sections" :key="s.id">
				<a :href="`#${s.id}`" :class="{ active: activeId === s.id }">
					<i :class="`fa-solid ${s.icon} nav-icon`" aria-hidden="true"></i>
					<span class="nav-text">{{ s.label }}</span>
				</a>
			</li>
		</ul>
	</nav>
</template>


<script setup>
defineProps({
	sections: { type: Array, required: true },
	activeId: { type: String, required: true }
})
</script>