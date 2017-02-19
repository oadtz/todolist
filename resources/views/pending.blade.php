<div ng-init="init()">
    <md-list>
        <md-list-item ng-repeat="item in items|filter: {is_done: false}" flex>
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
            <md-button class="md-secondary md-icon-button" ng-click="editItem(item)"><md-icon>edit</md-icon></md-button>
            <md-button class="md-secondary md-icon-button" ng-click="deleteItem(item)"><md-icon>delete</md-icon></md-button>
            <md-divider ng-if="!$last"></md-divider>
        </md-list-item>
    </md-list>
    <md-button
        ng-show="!$done"
        ng-click="getItems(limit)" 
        in-view="getItems(limit)" 
        ng-style="{ visibility: $loading ? 'hidden' : 'visible' }">
        Load more...
    </md-button>
</div>