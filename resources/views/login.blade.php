
<!doctype html>
<html ng-app="todolist" lang="en">
    <head>
        <title>To Do List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="/">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    </head>
	<body layout="row" ng-cloak ng-controller="LoginController">
		<div layout="column" flex id="content" role="main"><div role="dialog" aria-label="Login" layout="column" layout-align="center center">
            <md-toolbar>
                <div class="md-toolbar-tools">
                <h2>To Do List / Login</h2>
                </div>
            </md-toolbar>

            <md-content layout="column" layout-padding>
                <md-button class="md-warn" ng-click="login('google')">Login with Google+</md-button>
                <md-button class="md-primary" ng-click="login('facebook')">Login with facebook</md-button>
            </md-content>
		</div>

        <script src="{{ elixir('js/app.js') }}"></script>
	</body>
</html>