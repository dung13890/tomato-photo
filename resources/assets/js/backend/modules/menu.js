// @flow
'use strict';

import '../../../bower/jqTree/build/tree.jquery';
import Notification from './../partials/notification';

class Menu {
  index (items, item) {
    var notification = new Notification();
    this.jqTree(items, item);
    this.getUrlFromSelect();
    this.serializeMenu(notification);

    notification.destroyRow(null, 'li');
    notification.flashMessage();
  }

  serializeMenu (notification) {
    var _$ = window.$;
    _$('#save-serialize').on('click', function (e) {
      e.preventDefault();
      var serialize = _$('#list').tree('toJson');
      _$.post(window.laroute.route('backend.menu.serialize'), {serialize})
      .done(function (response) {
        notification.alertNotification(response.message, true);
      })
      .fail(function(response) {
        notification.alertNotification(response.responseJSON.message, false);
      });
    });
  }

  getUrlFromSelect () {
    var _$ = window.$;
    _$('select[name=category_id]').on('change', function () {
      let url = this.value;
      let name = $(this).find("option:selected").text();
      _$('input[name=name]').val(name);
      _$('input[name=url]').val(url);
    });
  }


  jqTree (items, item, selector = '#list') {
    var _$ = window.$;
    _$(selector).tree({
      closedIcon: _$('<i class="ion-plus"></i>'),
      openedIcon: _$('<i class="ion-minus"></i>'),
      data: items,
      dragAndDrop: true,
      autoOpen: false,
      selectable: false,
      onCanMoveTo: function(moved_node, target_node, position) {
        if (position == 'inside' && !moved_node.children.length && !target_node.parent.id) {
          return true;
        }
        if (position == 'after') {
          return true;
        }
      },
      onCreateLi: function(node, $li) {
        if (item != 0 && item.id == node.id) {
          return false;
        }

        if (node.locked) {
          return false;
        }
        $li.find('.jqtree-element')
          .append('<div class="btn-group pull-right tools">\
            <a href="'+laroute.route('backend.menu.edit', {menu: node.id})+'" class="btn btn-default btn-xs"><i class="ion-edit"></i></a> \
            <a href="'+laroute.route('backend.menu.destroy', {menu: node.id})+'" class="btn btn-xs btn-danger delete-action"><i class="ion-close-circled"></i></a>\
            </div>');
        }
    });
  }
}

export default window.menu = new Menu();
