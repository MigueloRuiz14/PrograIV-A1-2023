<template>
    <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">REGISTRO DE MATERIA</div>
                    <div class="card-body">
                        <form id="frmMateria" @reset.prevent="nuevaMateria" v-on:submit.prevent="guardarMateria">
                            <div class="row p-1">
                                <div class="col-3 col-md-2">
                                    <label>CODIGO MATERIA:</label>
                                </div>
                                <div class="col-3 col-md-5">
                                    <input required pattern="[0-9]{3}" 
                                        title="Ingrese un codigo de materia de 3 digitos"
                                            v-model="materia.codigo" type="text" class="form-control" name="txtCodigoMateria" id="txtCodigoMateria">
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="col col-md-2">NOMBRE MATERIA:</div>
                                <div class="col-3 col-md-5">
                                    <input 
                                            v-model="materia.nombre" type="text" class="form-control" name="txtNombreMateria" id="txtNombreMateria">
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="col-3 col-md-2">
                                    <label for="txtDocente">DOCENTE:</label>
                                </div>
                                <div class="col-3 col-md-5">
                                    <input 
                                            v-model="materia.docente" type="text" class="form-control" name="txtNombreDocente" id="txtNombreDocente">
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="col-3 col-md-3">
                                    <input class="btn btn-primary" type="submit" 
                                        value="Guardar">
                                </div>
                                <div class="col-3 col-md-3">
                                    <input class="btn btn-warning" type="reset" value="Nuevo">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">LISTADO DE MATRICULAS</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>BUSCAR:</th>
                                    <th colspan="3"><input type="text" class="form-control" v-model="buscar"
                                        @keyup="listar()"
                                        placeholder="Buscar por codigo o nombre"></th>
                                </tr>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th colspan="3">Docente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="materia in materias" :key="materia.idMateria" @click="modificarMateria(materia)" >
                                    <td>{{ materia.codigo }}</td> 
                                    <td>{{ materia.nombre }}</td>
                                    <td>{{ materia.docente }}</td>
                                    <td><button class="btn btn-danger" @click="eliminarMateria(materia)">ELIMINAR</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>

import axios from 'axios';
import alertifyjs from 'alertifyjs';

    export default{
        props:['form'],
        data() {
        return {
            accion:'nuevo',
            buscar: '',
            materias: [],
            materia:{
                idMateria  : '',
                codigo    : '',
                nombre    : '',
                docente    : '',
            }
        }
    },
    methods:{
        async guardarMateria(){
            this.listar();
            let method = 'POST';
            if(this.accion==='nuevo'){
                this.materia.idMateria = new Date().getTime().toString(16);
                this.materias.push( JSON.parse( JSON.stringify(this.materia) ) );
                method = 'POST';
            }else if(this.accion==='modificar'){
                let index = this.materias.findIndex(materia=>materia.idMateria==this.materia.idMateria);
                this.materias[index] = JSON.parse( JSON.stringify(this.materia) );
                method = 'PUT';
            }else if(this.accion==='eliminar'){
                let index = this.materias.findIndex(materia=>materia.idMateria==this.materia.idMateria);
                this.materias.splice(index,1);
                method = 'DELETE';
            }
            localStorage.setItem("materias", JSON.stringify(this.materias) );
            await axios ({
            url: '/materias',
            method,
            data: this.materia
        }).then(resp=>{
            let msgDelete = 'Materia eliminada con exito';
            let msgPut = 'Materia actualizada con exito';
            let msgPost = 'Materia registrada con exito';
            if( resp.data.msg=='ok' ){
                if (method=='DELETE'){
                    alertifyjs.success(msgDelete);
                } else if (method=='PUT'){
                    alertifyjs.success(msgPut);
                } else if (method=='POST'){
                    alertifyjs.success(msgPost);
                };
            }else{
                alertifyjs.error('El registro del alumno fallo, por favor revise');
            }
            console.log('exito', resp);
        }).catch(err=>{
            console.log('error',err);
        });
            this.nuevaMateria();
        },
        eliminarMateria(materia){
            if( confirm(`Esta seguro de eliminar a ${materia.nombre}?`) ){
                this.accion='eliminar';
                this.materia=materia;
                this.guardarMateria();
            }
        },
        nuevaMateria(){
            this.accion = 'nuevo';
            this.materia.idMateria = '';
            this.materia.codigo = '';
            this.materia.nombre = '';
            this.materia.docente = '';
        },
        modificarMateria(materia){
            this.accion = 'modificar';
            this.materia = materia;
        },
        listar(){
            this.materias = JSON.parse( localStorage.getItem('materias') || "[]" )
                .filter(materia=>materia.nombre.toLowerCase().indexOf(this.buscar.toLowerCase())>-1);
        }
    },
    mounted() {
            axios.get('/materias')
            .then(response => {
                this.materias = response.data;
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },
    }
</script>