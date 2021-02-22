/**
 * 
 */
var app=angular.module("app",[]);
  
//function PruebaController($scope) {
//
app.controller("PruebaController",function($scope){
  //1ra Leccion
  $scope.mensaje="Hola Mundo";
  
  //2da Leccion
  $scope.cambiarMensaje=function() {
      if($scope.mensaje ==="Hola Mundo"){
          $scope.mensaje="Adios mundo cruel";
      }else{
          $scope.mensaje="Hola Mundo";
      }        
  }
});
  
  //3raLección
  //function SeguroController($scope) {
 app.controller("SeguroController",function($scope){ 
$scope.seguro={
    nif:"",
    nombre:"",
    ape1:"",
    edad:undefined,
    sexo:"",
    casado:false,
    numHijos:undefined,
    embarazada:false,
    coberturas: {
      oftalmologia:false,
      dental:false,
      fecundacionInVitro:false
    },
    enfermedades:{
      corazon:false,
      estomacal:false,
      rinyones:false,
      alergia:false,
      nombreAlergia:""
    },
    fechaCreacion:new Date()
  }
});

//Leccion 4
//Crear y obtener modulo
var moduloAA = angular.module("AA",[]);

//Leccion 5
var moduloA=angular.module("A",[]);
var moduloB=angular.module("B",[]);
// Agregar A y B como dependencias de app2
var app=angular.module("app2",["A","B"]);