angular.module('zenrooms', ['ui.bootstrap'])
    .run(['$rootScope', function($rootScope) {
        $rootScope.showError = function(error) {
            var str = 'Operation failed with these messages:\n';

            for (var i in error) {
                str += '- ' + error[i] + '\n';
            }

            alert(str);
        }
    }])
    .controller('IndexController', ['$scope', '$rootScope', '$http', '$uibModal', function($scope, $rootScope, $http, $uibModal) {
        $scope.init = function() {
            $scope.getRoomTypes();
        }

        $scope.getRoomTypes = function() {
            $http.get('api/roomtype')
                .success(function(data) {
                    $scope.roomTypes = data;
                })
                .error(function(response) {
                    console.log(response);
                });
        }

        $scope.newRoomType = function() {
            $rootScope.modal = $uibModal.open({
                templateUrl: 'roomtype',
                controller: 'RoomTypeController',
                size: 'md'
            });

            $rootScope.modal.result.then(function(roomType) {
                $scope.roomTypes.push(roomType);
            });
        }

    }])
    .controller('RoomTypeController', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http) {
        $scope.init = function() {
            $scope.roomType = {};
        }

        $scope.saveRoomType = function() {
            $http.post('api/roomtype', $scope.roomType)
                .success(function(data) {
                    $rootScope.modal.close(data);
                })
                .error(function(error) {
                    $scope.error = error;
                    $rootScope.showError(error);
                });
        }

        $scope.close = function(reason) {
            $rootScope.modal.dismiss(reason);
        }
    }])