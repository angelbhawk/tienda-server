@extends('layouts.general')

@section('titulo', 'Catalogo de Productos')

@section('main')
    @parent
    <main ng-app="catalogoProductosApp" ng-controller="catalogoProductosController">
        <table>
            <title>Catalogo de Productos</title>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Envio</th>
                    <th>Existencia</th>
                    <th>Detalle</th>
                    <th colspan="2"><a class="btnAgregar" href="/productos/alta">Alta</a></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="producto in productos">
                    <td>@{{producto.id}}</td>
                    <td>@{{producto.nombre}}</td>
                    <td>@{{producto.precio}}</td>
                    <td>@{{producto.envio}}</td>
                    <td>@{{producto.existencia}}</td>
                    <td>@{{producto.detalle}}</td>
                    <td><a class="btnModificar" href="/productos/modificar">Modificar</a></td>
                    <td><a class="btnEliminar" ng-click="eliminar(producto.id)">Eliminar</a></td>
                </tr>
            </tbody>
        </table>
        <button ng-click='paginaAnterior()'>&lt</button>@{{pagina}}<button ng-click='paginaSiguiente()'>&gt</button>
    </main>
@endsection

@section('aside')
@endsection

@section('head')
    <script src="/js/angular.min.js"></script>
@endsection

@section('scripts')
<script>
    var app = angular.module('catalogoProductosApp', []);
    app.controller('catalogoProductosController', function($scope, $http) {
        $scope.productos = [];
        $scope.pagina = 1;
        $scope.elementos = 20;
        $scope.getProductos = function(){
            $http.get("/productos/angular/catalogo/show/"+$scope.pagina+"/"+$scope.elementos)
             .then(function (response) {
                $scope.productos = response.data;
            });
        };
        $scope.getProductos();
        $scope.paginaSiguiente = function() {
            //$scope.productos.forEach(element => {
                //element.nombre = "papel";
            //});
            $scope.pagina++;
            $scope.getProductos();
        };
        $scope.paginaAnterior = function() {
            if ($scope.pagina>1)
                $scope.pagina--;
            $scope.getProductos();
        };
        $scope.eliminar = function(id){
            $http.get("/productos/angular/catalogo/eliminar/"+id)
             .then(function (response) {
                $scope.getProductos();
            });
        };
    });
    </script>
@endsection
