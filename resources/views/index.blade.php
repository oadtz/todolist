<!DOCTYPE html>
<html lang="en" ng-app="todolist">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />

    <title>To Do List</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body ng-cloak layout="column" ng-controller="MainController">
  
    <md-toolbar layout="row">
      <md-button class="menu" hide-gt-sm ng-click="ul.toggleList()" aria-label="Show User List">
        <md-icon md-svg-icon="menu" ></md-icon>
      </md-button>
      <h1>Angular Material - Starter App</h1>
    </md-toolbar>

    <div flex layout="row">

   <md-sidenav
        class="md-sidenav-left"
        md-component-id="left"
        md-is-locked-open="$mdMedia('gt-md')"
        md-whiteframe="4">

      <md-toolbar class="md-theme-indigo">
        <h1 class="md-toolbar-tools">Sidenav Left</h1>
      </md-toolbar>
      <md-content layout-padding>
        <md-button ng-click="close()" class="md-primary" hide-gt-md>
          Close Sidenav Left
        </md-button>
        <p hide show-gt-md>
          This sidenav is locked open on your device. To go back to the default behavior,
          narrow your display.
        </p>
      </md-content>

    </md-sidenav>

    <md-content flex layout-padding>

      <div layout="column" layout-align="top center">
        <p>
          Developers can also disable the backdrop of the sidenav.<br/>
          This will disable the functionality to click outside to close the sidenav.
        </p>

        <div>
          <md-button ng-click="toggleLeft()" class="md-raised">
            Toggle Sidenav
          </md-button>
        </div>

      </div>

    </md-content>

    </div>
  <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>