
<!doctype html>
<html ng-app="todolist" lang="en">
<head>
  <title>To Do List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="/">
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body layout="row" ng-cloak ng-controller="TodolistController" ng-init="init()">

  <md-sidenav class="site-sidenav md-sidenav-left md-whiteframe-z2"
              md-component-id="menu"
              md-is-locked-open="$mdMedia('gt-sm')">

    <md-toolbar md-scroll-shrink>
        <md-heading class="menu-heading">
            <a ng-href="/" class="logo">
                <img src="https://placehold.it/150x150" class="md-avatar"  alt="" />
            </a>
            <h3>User</h3>
        </md-heading>
    </md-toolbar>
    <md-content class="site-menu">
        <md-list>
            <md-list-item ng-repeat="m in menu">
                <md-icon>@{{m.icon}}</md-icon>
                <md-list-item-text>
                    <a href ng-click="selectMenu(m.href)">@{{m.name}}</a>
                </md-list-item-text>
            </md-list-item>
        </md-list>
    </md-content>

  </md-sidenav>

  <div layout="column" tabIndex="-1" role="main" flex>
    <md-toolbar class="md-whiteframe-glow-z1 site-content-toolbar">

      <div class="md-toolbar-tools docs-toolbar-tools" tabIndex="-1">
        <md-button class="md-icon-button" ng-click="openMenu()" hide-gt-sm aria-label="Toggle Menu">
          <md-icon>menu</md-icon>
        </md-button>
        <div layout="row" flex class="fill-height">
          <h2 class="md-toolbar-item md-breadcrumb md-headline">
            <span class="md-breadcrumb-page">To Do List</span>
          </h2>

          <span flex></span> <!-- use up the empty space -->
        </div>
      </div>

    </md-toolbar>

    <md-content md-scroll-y layout="column" flex>
      <div ng-view></div>
    </md-content>

    <md-button class="md-fab md-fab-bottom-right"
                ng-click="newItem()"
                aria-label="New To Do">
      <md-tooltip md-direction="top">New Item</md-tooltip>
      <md-icon>add</md-icon>
    </md-button>

  </div>

  <script src="{{ elixir('js/app.js') }}"></script>


</body>
</html>
