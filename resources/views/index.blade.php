
<!DOCTYPE html>
<html lang="en" ng-app="zenrooms">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Thanapat Pirmphol">

    <title>ZenRooms Room Management</title>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body ng-controller="IndexController" ng-init="init()" ng-cloak>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ url('/') }}">ZenRooms</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Bulk Operations</legend>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Room Type</label>
                            <div class="col-sm-3">
                                <select class="form-control" ng-model="filter.roomType" ng-options="t.id as t.name for t in roomTypes">
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-default" ng-click="newRoomType()"><i class="glyphicon glyphicon-plus"></i> New room type...</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Date Range</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" ng-model="filter.startDate" uib-datepicker-popup>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.container -->

    <script type="text/ng-template" id="roomtype">
        <form class="form-horizontal" ng-submit="saveRoomType()" ng-init="init()">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title">New Room Type</h3>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label control-label-required">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" ng-model="roomType.name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label control-label-required">Rate(THB)</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" ng-model="roomType.rate">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label control-label-required">Inventory</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" ng-model="roomType.inventory">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-default" type="button" ng-click="close()">Cancel</button>
            </div>
        </form>
    </script>

    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
  </body>
</html>
