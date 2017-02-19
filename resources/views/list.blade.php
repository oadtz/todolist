<div ng-init="init()">
    <md-subheader class="md-primary" layout="row" flex="100">
        <md-select ng-model="$view" ng-change="changeView()">
            <md-option value="0">Show pending</md-option>
            <md-option value="1">Show done</md-option>
        </md-select>
    </md-subheader>
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
</div>