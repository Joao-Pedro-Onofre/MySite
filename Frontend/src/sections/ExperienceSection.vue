<template>
	<section class="progress-section glass-section" id="experience">
		<div class="container px-4 px-lg-5">
			<h2 class="custom-h2 text-white mb-4">Experience</h2>

			<!-- Tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item" role="presentation">
					<button
						class="nav-link active"
						id="education-tab"
						data-bs-toggle="tab"
						data-bs-target="#education-pane"
						type="button"
						role="tab"
						aria-controls="education-pane"
						aria-selected="true">
						<i class="fa-solid fa-graduation-cap"></i> Education
					</button>
				</li>
				<li class="nav-item" role="presentation">
					<button
						class="nav-link"
						id="professional-tab"
						data-bs-toggle="tab"
						data-bs-target="#professional-pane"
						type="button"
						role="tab"
						aria-controls="professional-pane"
						aria-selected="false">
						<i class="fa-solid fa-briefcase"></i> Professional
					</button>
				</li>
			</ul>

			<!-- Panels -->
			<div class="tab-content mt-4">
				<!-- Education -->
				<div
					class="tab-pane fade show active"
					id="education-pane"
					role="tabpanel"
					aria-labelledby="education-tab"
					tabindex="0">
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
				<div
					class="tab-pane fade"
					id="professional-pane"
					role="tabpanel"
					aria-labelledby="professional-tab"
					tabindex="0">
					<ExpCard
						v-for="(item, i) in professional"
						:key="`pro-${i}`"
						:time="item.time"
						:title="item.title"
						:course="item.course"
						:points="item.points"
						:tags="item.tags" />
				</div>
			</div>
		</div>
	</section>
</template>

<script setup lang="ts">
import ExpCard from '@/components/ExpCard.vue'

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

const professional: ExpItem[] = [
	{
		time: '2021 (3 Months)',
		title: 'Internship at Trigénius',
		course: 'Web Development Department',
		points: [
			'Developed Trigénius Website',
			'Helped design team make decisions',
		],
		tags: ['HTML', 'CSS', 'JavaScript', 'Laravel', 'PyroCMS', 'Twig', 'JQuery', 'MySQL', 'Prestashop']
	}
]
</script>
