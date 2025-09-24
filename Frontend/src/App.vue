<template>
  <!-- Layout area (no footer here) -->
  <div class="layout">
    <aside class="sidebar">
      <MainMenu :sections="sections" :active-id="activeId" />
    </aside>

    <main class="content">
      <HomeSection id="home" />
      <AboutSection id="about" />
      <ExperienceSection id="experience" />
      <ProjectsSection id="projects" />
    </main>
  </div>

  <!-- Footer lives outside the layout so sticky stops above it -->
  <SiteFooter />
</template>


<script setup>
import { onMounted, onBeforeUnmount, ref } from 'vue'
import MainMenu from './components/MainMenu.vue'
import HomeSection from './sections/HomeSection.vue'
import AboutSection from './sections/AboutSection.vue'
import ExperienceSection from './sections/ExperienceSection.vue'
import ProjectsSection from './sections/ProjectsSection.vue'
import SiteFooter from './components/SiteFooter.vue'


const sections = [
  { id: 'home', label: 'Home', icon: 'fa-house' },
  { id: 'about', label: 'About Me', icon: 'fa-user' },
  { id: 'experience', label: 'Experience', icon: 'fa-book' },
  { id: 'projects', label: 'Projects', icon: 'fa-code' },
]


const activeId = ref('home')
let observer


onMounted(() => {
  const options = { root: null, rootMargin: '0px 0px -60%', threshold: 0.25 }
  observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => { if (entry.isIntersecting) activeId.value = entry.target.id })
  }, options)
  sections.forEach(s => document.getElementById(s.id) && observer.observe(document.getElementById(s.id)))
})


onBeforeUnmount(() => observer?.disconnect())
</script>
