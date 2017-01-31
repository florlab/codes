//https://tutorials.kode-blog.com/laravel-5-angularjs-tutorial
var app = angular.module('employeeRecords', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})
    .constant('API_URL', 'http://localhost:8080/api/v1/');