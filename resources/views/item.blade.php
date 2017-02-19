<md-dialog flex="75" ng-init="init()">
  <form ng-cloak ng-submit="saveItem()">
    <md-toolbar>
      <div class="md-toolbar-tools">
        <h2>@{{item._id ? 'Edit Item' : 'New Item'}}</h2>
        <span flex></span>
        <md-button class="md-icon-button" ng-click="cancel()">
          <md-icon aria-label="Close dialog">close</md-icon>
        </md-button>
      </div>
    </md-toolbar>

    <md-dialog-content>
      <div class="md-dialog-content" layout-padding>
        <div layout-gt-sm="column">
            <md-input-container class="md-block">
              <label>Subject</label>
              <input type="text" ng-model="item.subject" required>
              <div ng-messages="item.subject.$error" multiple md-auto-hide="true">
                <div ng-message="required">
                  Subject is required.
                </div>
              </div>
            </md-input-container>

            </md-input-container>
            <md-input-container class="md-block">
              <label>Description</label>
              <textarea ng-model="item.description" md-maxlength="150" rows="3"></textarea>
            </md-input-container>
            <md-input-container>
              <label>Due date</label>
              <md-datepicker ng-model="due_date"></md-datepicker>
            </md-input-container>
            <md-input-container class="md-block" ng-if="item._id">
              <md-checkbox ng-model="item.is_done">
                This to do is done.
              </md-checkbox>
            </md-input-container>
        </div>
      </div>
    </md-dialog-content>

    <md-dialog-actions layout="row">
      <span flex></span>
      <md-button ng-click="cancel()">
        Cancel
      </md-button>
      <md-button type="submit">
       Save
      </md-button>
    </md-dialog-actions>
  </form>
</md-dialog>