<template>
  <div>
    <h2>Asignaturas</h2>
    <div v-if="!loading">
      <div v-for="(asignatura, index) in asignaturas" :key="index" class="card">
        <div class="card-body">
          <h5 class="card-title">{{ asignatura.nombre }}</h5>
          <p class="card-text">Créditos: {{ asignatura.creditos }}</p>
          <p class="card-text">Docente: {{ asignatura.docente }}</p>
          <p class="card-text">Prerrequisito: {{ asignatura.prerrequisito }}</p>
          <p class="card-text">Horas de trabajo autónomo: {{ asignatura.horas_trabajo_autonomo }}</p>
          <p class="card-text">Horas de trabajo dirigido: {{ asignatura.horas_trabajo_dirigido }}</p>
          <button class="btn btn-primary" @click="verDetalle(asignatura)">Ver detalle</button>
        </div>
      </div>
    </div>
    <div v-else>
      <p>Cargando asignaturas...</p>
    </div>
    <div v-if="asignaturaSeleccionada">
      <div class="modal fade" tabindex="-1" role="dialog" ref="modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ asignaturaSeleccionada.nombre }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Créditos: {{ asignaturaSeleccionada.creditos }}</p>
              <p>Docente: {{ asignaturaSeleccionada.docente }}</p>
              <p>Prerrequisito: {{ asignaturaSeleccionada.prerrequisito }}</p>
              <p>Horas de trabajo autónomo: {{ asignaturaSeleccionada.horas_trabajo_autonomo }}</p>
              <p>Horas de trabajo dirigido: {{ asignaturaSeleccionada.horas_trabajo_dirigido }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      asignaturas: [],
      loading: true,
      asignaturaSeleccionada: null
    }
  },
  created() {
    this.listarAsignaturas();
  },
  methods: {
    listarAsignaturas() {
      axios.get('/api/asignaturas')
        .then(response => {
          this.asignaturas = response.data.asignaturas;
          this.loading = false;
        })
        .catch(error => {
          console.log(error);
        });
