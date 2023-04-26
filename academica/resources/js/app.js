import './bootstrap';
import { createApp } from 'vue';
import alertifyjs from 'alertifyjs';

window.db = "";

import docente from './components/DocenteComponent.vue';
import alumno from './components/AlumnoComponent.vue';
import materia from './components/MateriaComponent.vue';
import matricula from './components/MatriculaComponent.vue';
import inscripcion from './components/InscripcionComponent.vue';

const app = createApp({
    components:{
        docente,
        alumno,
        materia,
        matricula,
        inscripcion
    },
    data() {
        return{
            forms:{
                docente     : {mostrar:false},
                alumno      : {mostrar:false},
                materia     : {mostrar:false},
                matricula   : {mostrar:false},
                inscripcion : {mostrar:false},
            }
        }
    },
    methods:{
        abrirFormulario(form){
            this.forms[form].mostrar = !this.forms[form].mostrar;
            //this.$refs[form].listar();
        },
        abrirBD(){
            let indexDB = indexedDB.open('db_sistema_academico',1);
            indexDB.onupgradeneeded=e=>{
                let req = e.target.result,
                    tbldocente = req.createObjectStore('tbldocentes', {keyPath:'idDocente'}),
                    tblalumno = req.createObjectStore('tblalumnos',{keyPath:'idAlumno'}),
                    tblmateria = req.createObjectStore('tblmaterias',{keyPath:'idMateria'}),
                    tblmatricula = req.createObjectStore('tblmatriculas',{keyPath:'idMatricula'}),
                    tblinscripcion = req.createObjectStore('tblinscripciones',{keyPath:'idInscripcion'});

                tbldocente.createIndex('idDocente', 'idDocente', {unique:true});
                tblalumno.createIndex('idAlumno', 'idAlumno', {unique:true});
                tblmateria.createIndex('idMateria', 'idMateria', {unique:true});
                tblmatricula.createIndex('idMatricula', 'idMatricula', {unique:true});
                tblinscripcion.createIndex('idInscripcion', 'idInscripcion', {unique:true});
            };
            indexDB.onsuccess= e=>{
                db = e.target.result;
                alertifyjs.success('Sistema LISTO.');
            };
            indexDB.onerror= e=>{
                console.error( e.message );
                alertifyjs.error('Error: ' + e.message);
            };
        }, 
    },
    created() {
        this.abrirBD();
    }
});
app.mount("#app");
