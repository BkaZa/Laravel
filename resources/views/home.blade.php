<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <base href="/" />
    <title>My Money V.2</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="apple-mobile-web-app-status-bar-style" content="yes" />
    <link rel="shortcut icon" href="<?= asset('asset/icon/money.png')?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= asset('asset/css/mobile-angular-ui-hover.min.css')?>" />
    <link rel="stylesheet" href="<?= asset('asset/css/mobile-angular-ui-base.min.css')?>" />
    <link rel="stylesheet" href="<?= asset('asset/css/mobile-angular-ui-desktop.min.css')?>" />
    <link href='https://fonts.googleapis.com/css?family=Molle:400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= asset("asset/angularjs-datepicker/src/css/angular-datepicker.css")?>"/>
    <style type="text/css">
        .font_molle {
            font-family: 'Molle', cursive;
        }
        .app-content-loading {
          text-align: center;
          height: 100%;
          width: 100%;
          background: #fff;
          position: relative;
        }
        .loading-spinner {
          position: absolute;
          font-size: 50px;
          left: 50%;
          top: 50%;
          margin-left: -25px;
          margin-top: -25px;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-route.min.js"></script>
    <script src="<?= asset('asset/mobile-angular-ui/dist/js/mobile-angular-ui.min.js')?>"></script>
    <!-- Required to use $touch, $swipe, $drag and $translate services -->
    <script src="<?= asset('asset/js/mobile-angular-ui.gestures.min.js')?>"></script>
    <script src="<?= asset('asset/angularjs-datepicker/src/js/angular-datepicker.js')?>"></script>
    <script src="<?= asset('asset/js/mymoney.js')?>"></script>
  </head>
  <body ng-app="MyMoney" 
        ng-controller="MainController"
        ui-prevent-touchmove-defaults 
  >
      
      
      <!-- Sidebars -->
      <div ng-include="'partials/LeftSidebar.html'" ng-controller="MenuController"
           ui-track-as-search-param="true"
           class="sidebar sidebar-left">
      </div>
      <div class="app"
            ui-swipe-right="Ui.turnOn('uiSidebarLeft')"
            ui-swipe-left="Ui.turnOff('uiSidebarLeft')"
      >

         <!-- Head -->
         <div class="navbar navbar-app navbar-absolute-top">
           <div class="navbar-brand navbar-brand-center font_molle" ui-yield-to="title-Head">
             My Money
           </div>
             
           <div class="btn-group pull-left">
             <div ui-toggle="uiSidebarLeft" class="btn sidebar-toggle">
               <i class="fa fa-bars"></i> Menu
             </div>
           </div>
         </div>

        
         
        <!--Footer-->
        <div class="navbar navbar-app navbar-absolute-bottom">
            <div class="navbar-brand navbar-brand-center font_molle" ui-yield-to="title-Foot">
              BkaZa
            </div>
        </div>
        
        <!-- App Body --> 
        <div class="app-body" ng-class="{loading: loading}" >
            <div ng-show="loading" class="app-content-loading">
              <i class="fa fa-spinner fa-spin loading-spinner"></i>
            </div>
            <div class="app-content">
              <ng-view></ng-view>
            </div>
        </div>

      </div>
      
      
  </body>    
</html>