
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
            <h3>To Do List</h3>
        </md-heading>
    </md-toolbar>
    <md-content class="site-menu">
        <md-list>
            <md-list-item ng-repeat="m in menu">
                <md-icon>@{{m.icon}}</md-icon>
                <md-list-item-text>
                    <a href ng-click="selectMenu(m)">@{{m.name}}</a>
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
            <span class="md-breadcrumb-page">
              <span class="hide-gt-sm">To Do List / </span>
              <md-icon>@{{currentMenu.icon}}</md-icon>
              @{{currentMenu.name}}
            </span>
          </h2>

          <span flex></span> <!-- use up the empty space -->
        </div>
      </div>

    </md-toolbar>

    <md-content md-scroll-y layout="column" flex>
          <md-list>
              <md-list-item ng-repeat="item in items" flex>
                  <div class="md-list-item-text">
                      <h3>
                          @{{item.subject| limitTo:100}}
                          <span ng-if="item.subject.length > 100">...</span>
                      </h3>
                      <p ng-if="item.due_date" ng-style="{ color: item.is_overdue ? 'red' : '' }">
                          <md-icon>date_range</md-icon> @{{item.due_date|limitTo:10}}
                          ●
                          <span ng-if="item.is_overdue">Overdue @{{item.due_date|countdown}}</span>
                          <span ng-if="!item.is_overdue">To due date @{{item.due_date|countdown}}</span>
                      </p>
                  </div>
                  <md-checkbox class="md-secondary" ng-model="item.is_done" md-aria="Set as Done" ng-change="checkItem(item)">
                      @{{item.is_done ? 'Done' : 'Not done'}}
                  </md-checkbox>
                  <md-button class="md-secondary md-icon-button" ng-click="editItem(item)"><md-icon>edit</md-icon></md-button>
                  <md-button class="md-secondary md-icon-button" ng-click="deleteItem(item)"><md-icon>delete</md-icon></md-button>
                  <md-divider ng-if="!$last"></md-divider>
              </md-list-item>
          </md-list>
          <md-button
              ng-show="!$done"
              ng-click="getItems()" 
              in-view="getItems()" 
              ng-style="{ visibility: $loading ? 'hidden' : 'visible' }">
              Load more...
          </md-button>
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
