<template>
  <div>
    <div class="row mb-3">
      <div class="col-md-6">
        <h2>Asignaturas</h2>
      </div>
      <div class="col-md-6 text-right">
        <router-link :to="{ name: 'AsignaturaCreate' }" class="btn btn-primary">Crear Asignatura</router-link>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mb-3" v-for="asignatura in asignaturas" :key="asignatura.id">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ asignatura.nombre }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Semestre {{ asignatura.semestre }}</h6>
            <p class="card-text">Créditos: {{ asignatura.creditos }}</p>
            <router-link :to="{ name: 'AsignaturaDetail', params: { id: asignatura.id } }" class="btn btn-primary">Ver Detalles</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      asignaturas: [],
    };
  },
 
