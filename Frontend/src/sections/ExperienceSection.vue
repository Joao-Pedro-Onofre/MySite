<template>
	<section class="progress-section glass-section" id="experience">
		<div class="container px-4 px-lg-5">
			<h2 class="custom-h2 text-white mb-4">Experience</h2>

			<!-- Tabs -->
			<div class="nav nav-tabs" role="tablist">
				<button class="nav-link" :class="{ active: tab === 'education' }" @click="tab = 'education'" type="button">
					<i class="fa-solid fa-graduation-cap"></i> Education
				</button>
				<button class="nav-link" :class="{ active: tab === 'professional' }" @click="tab = 'professional'" type="button">
					<i class="fa-solid fa-briefcase"></i> Professional
				</button>
			</div>

			<!-- Panels -->
			<div class="tab-content mt-4">
				<!-- Education -->
				<div v-show="tab === 'education'" class="tab-pane fade show active">
					<ExpCard
						v-for="(item, i) in education"
						:key="`edu-${i}`"
						:time="item.time"
						:title="item.title"
						:course="item.course"
						:points="item.points"
						:tags="item.tags" />
				</div>

				<!-- Professional -->
				<div v-show="tab === 'professional'" class="tab-pane fade">
					<template v-if="professional.length">
						<ExpCard
							v-for="(item, i) in professional"
							:key="`pro-${i}`"
							:time="item.time"
							:title="item.title"
							:course="item.course"
							:points="item.points"
							:tags="item.tags" />
					</template>
					<template v-else>
						<div class="exp-card">
							<div class="exp-header"><span class="exp-time">None (Yet)</span></div>
						</div>
					</template>
				</div>
			</div>
		</div>
	</section>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import ExpCard from '@/components/ExpCard.vue'

type TabKey = 'education' | 'professional'
const tab = ref<TabKey>('education')

type ExpItem = {
	time: string
	title: string
	course?: string
	points: string[]
	tags: string[]
}

const education: ExpItem[] = [
	{
		time: '2021 — Current',
		title: 'IPL(ESTG) - Escola Superior de Tecnologia e Gestão',
		course: 'Computer Engineering',
		points: [
			'Web Development',
			'Desktop Business Apps',
			'Database and Backend Development',
			'Networks',
			'Artificial Intelligence',
			'Low-level Programming Languages',
			'Object-oriented programming'
		],
		tags: ['HTML', 'CSS', 'Vue', 'Bootstrap', 'JavaScript', 'JQuery', 'PHP', 'Laravel', 'MySQL', 'Oracle', 'C', 'C (Linux)', 'C#', 'Figma']
	},
	{
		time: '2019 — 2021',
		title: 'IPL(ESTG) - Escola Superior de Tecnologia e Gestão',
		course: 'Desenvolvimento Web e Multimédia',
		points: [
			'Web Development',
			'Database and Backend Development',
			'Graphic and Web Design',
			'Multimedia Development'
		],
		tags: ['HTML', 'CSS', 'Bootstrap', 'JavaScript', 'JQuery', 'PHP', 'Laravel', 'MySQL', 'Adobe Apps', 'Figma']
	},
	{
		time: '2015 — 2018',
		title: 'ESCO - Escola de Serviços e Comércio do Oeste',
		course: 'Programação de Sistemas Informáticos',
		points: [
			'Web Development',
			'Desktop Business Apps',
			'Android Apps',
			'Database and Backend Development'
		],
		tags: ['HTML', 'CSS', 'Bootstrap', 'JavaScript', 'PHP', 'SQL Server', 'MySQL', 'Java', 'C#', 'ASP.Net']
	}
]

// Fill this when you have roles
const professional: ExpItem[] = []
</script>
