'use strict';

//
// Here is how to define your module
// has dependent on mobile-angular-ui
//
var app = angular.module('MyMoney', [
  'ngRoute',
  'mobile-angular-ui',

  // touch/drag feature: this is from 'mobile-angular-ui.gestures.js'.
  // This is intended to provide a flexible, integrated and and
  // easy to use alternative to other 3rd party libs like hammer.js, with the
  // final pourpose to integrate gestures into default ui interactions like
  // opening sidebars, turning switches on/off ..
  'mobile-angular-ui.gestures',
  '720kb.datepicker'

]);

app.run(function($transform) {
  window.$transform = $transform;
});

app.controller('MenuController',function($scope){
    
    $scope.menu_img = 'https://angular.io/resources/images/logos/angular2/angular.svg';
    
    $scope.menus = [
                    {
                        link : '',
                        name : 'Home'
                    },
                    {
                        link : '/memo',
                        name : 'Memo'
                    },
                    {
                        link : '/report',
                        name : 'Report'
                    }
                  ]

});


app.controller('MainController',function($rootScope,$scope,$http){
    //-select
    $http.get("proc/category").success(function(response) {
               $scope.select = response;
    });
               $scope.data = { type : 1 }
    $http.get("proc/today").success(function(response) {
               $scope.data.date = response;
    });
    
                        
    //-save button                    
    $scope.save = function() {
    
        if(confirm('Save?')){
            $rootScope.loading = true;
            var sendData = this.data;
            
            $http.post("proc/save",
            sendData
            ).success(function(response) {
                console.log( response );
                $rootScope.loading = false;
                alert(response);
            });
        }
    };

    // Needed for the loading screen
    $rootScope.$on('$routeChangeStart', function() {
    $rootScope.loading = true;
    });

    $rootScope.$on('$routeChangeSuccess', function() {
    $rootScope.loading = false;
    });

});

//
// You can configure ngRoute as always, but to take advantage of SharedState location
// feature (i.e. close sidebar on backbutton) you should setup 'reloadOnSearch: false'
// in order to avoid unwanted routing.
//

app.config(function($routeProvider,$locationProvider) {//
     
  $routeProvider.when('/', {templateUrl: 'partials/Home.html', reloadOnSearch: false});
  $routeProvider.when('/memo', {templateUrl: 'partials/Memo.html', reloadOnSearch: false});
  $routeProvider.when('/report', {templateUrl: 'partials/Report.html', reloadOnSearch: false});

// use the HTML5 History API
$locationProvider.html5Mode(true);
  
});
