
var app = angular.module('qoa', ['ngMaterial', 'ngMessages']);
app.config(function($mdThemingProvider) {
    $mdThemingProvider.theme('default').primaryPalette('pink').accentPalette('orange');
});
app.controller('AppCtrl', ['$scope', '$mdSidenav', function($scope, $mdSidenav) {
        $scope.toggleSidenav = function(menuId) {
            $mdSidenav(menuId).toggle();
        };

    
}]);