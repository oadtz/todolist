angular.module('todolist', ['ngMaterial', 'ngResource', 'angular-inview'])
    .config(['$mdThemingProvider', function($mdThemingProvider) {

        $mdThemingProvider.theme('default')
            .primaryPalette('blue-grey')
            .accentPalette('orange');

    }])
    .factory('Item', ['$resource', function($resource) {
        return $resource('/api/item/:id', null, {
            'check': { method: 'PUT', params: { id: '@_id', status: 1 } },
            'uncheck': { method: 'PUT', params: { id: '@_id', status: 0 } }
        });
    }])
    .filter('countdown', [function() {
        return function(dt) {
            return moment.utc(dt).fromNow();
        };
    }])

.controller('TodolistController', ['$scope', '$rootScope', '$mdSidenav', '$mdDialog', 'Item', function($scope, $rootScope, $mdSidenav, $mdDialog, Item) {

        $scope.init = function() {
            $scope.items = [];
            $scope.menu = [
                { name: 'Pending', icon: 'watch_later', view: 0 },
                { name: 'Done', icon: 'check', view: 1 }
            ];

            $scope.selectMenu($scope.menu[0]);
        }

        $scope.selectMenu = function(menu) {
            $scope.items = [];
            $scope.$done = false;
            $scope.currentMenu = menu;
            $scope.getItems();
        }

        $scope.openMenu = function() {
            $mdSidenav('menu').toggle();
        }

        $scope.getItems = function() {
            $scope.$loading = true;

            var limit = null,
                view = null;
            if ($scope.items.length > 0) {
                limit = $scope.items[$scope.items.length - 1]._id;
            }
            view = $scope.currentMenu.view || 0;

            var items = Item.query({ is_done: view, limit: limit }, function() {
                if (items.length == 0)
                    $scope.$done = true;
                $scope.items = $scope.items.concat(items);
                $scope.$loading = false;
            });
        }

        $scope.editItem = function(item) {
            $mdDialog.show({
                    controller: 'EditController',
                    templateUrl: '/item',
                    parent: angular.element(document.body),
                    locals: {
                        item: item
                    },
                    clickOutsideToClose: true,
                    fullscreen: false // Only for -xs, -sm breakpoints.
                })
                .then(function(item) {
                    for (i = 0; i < $scope.items.length; i++) {
                        if ($scope.items[i]._id == item._id) {
                            $scope.items[i] = item;
                            break;
                        }
                    }
                }, function() {
                    // User cancel
                });
        }

        $scope.deleteItem = function(item) {
            $mdDialog.show($mdDialog.confirm()
                    .title('Delete?')
                    .textContent('Please confirm to delete this item.')
                    .ariaLabel('Delete Item')
                    .ok('OK')
                    .cancel('Cancel'))
                .then(function() {
                    item.$delete({ id: item._id });
                });
        }

        $scope.checkItem = function(item) {
            $mdDialog.show($mdDialog.confirm()
                    .title(item.is_done ? 'Set as done?' : 'Set as not done?')
                    .textContent('Please confirm to change the status of this item.')
                    .ariaLabel('Change Status of Item')
                    .ok('OK')
                    .cancel('Cancel'))
                .then(function() {
                    if (item.is_done) {
                        item.$check();
                    } else {
                        item.$uncheck();
                    }
                }, function() {
                    item.is_done = !item.is_done;
                });
        }

        $scope.newItem = function(ev) {
            $mdDialog.show({
                    controller: 'CreateController',
                    templateUrl: '/item',
                    parent: angular.element(document.body),
                    targetEvent: ev,
                    clickOutsideToClose: true,
                    fullscreen: false // Only for -xs, -sm breakpoints.
                })
                .then(function(item) {
                    $rootScope.lastCreatedItem = item;
                }, function() {
                    // User cancel
                });
        }

        $rootScope.$watch('lastCreatedItem', function(newVal, oldVal) {
            if (newVal && newVal !== oldVal) {
                if ($scope.$view == 1) {
                    $scope.$view = 0;
                    $scope.changeView();
                } else {
                    $scope.items.unshift(newVal);
                }
            }
        });
    }])
    .controller('CreateController', ['$scope', '$mdDialog', 'Item', function($scope, $mdDialog, Item) {
        $scope.init = function() {
            $scope.item = new Item;
        }

        $scope.hide = function() {
            $mdDialog.hide();
        };

        $scope.cancel = function() {
            $mdDialog.cancel();
        };

        $scope.saveItem = function() {
            if ($scope.due_date)
                $scope.item.due_date = moment($scope.due_date).format('YYYY-MM-DD 23:59:59');

            $scope.item.$save(function(response) {
                $mdDialog.hide(response);
            });
        };
    }])
    .controller('EditController', ['$scope', '$mdDialog', 'item', function($scope, $mdDialog, item) {
        $scope.init = function() {
            $scope.item = angular.copy(item);

            if ($scope.item.due_date)
                $scope.due_date = new Date($scope.item.due_date);
        }

        $scope.hide = function() {
            $mdDialog.hide();
        };

        $scope.cancel = function() {
            $mdDialog.cancel();
        };

        $scope.saveItem = function() {
            if ($scope.due_date)
                $scope.item.due_date = moment($scope.due_date).format('YYYY-MM-DD 23:59:59');

            $scope.item.$save(function(response) {
                $mdDialog.hide(response);
            });
        };
    }])