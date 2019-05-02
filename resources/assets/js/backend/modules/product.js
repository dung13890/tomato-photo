// @flow
'use strict';

import Datatable from './../partials/datatable';
import Uploadfile from './../partials/uploadfile';
class Product {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'name', name: 'name'},
      { data: 'image_before_src',
        name: 'image_before_src',
        render:(data, type, row) => {
          return `<img src=${row.image_before_src} class="img-thumbnail" />`;
        }
      },
      { data: 'image_after_src',
        name: 'image_after_src',
        render:(data, type, row) => {
          return `<img src=${row.image_after_src} class="img-thumbnail" />`;
        }
      },
      { data: 'category', name: 'category'},
      { data: 'locked',
        name: 'locked',
        render:function (data, type, row) {
          return row.locked == 1 ? '<span class="label label-default">OFF</span>' : '<span class="label label-primary">ON</span>';
        }
      },
    ];
    let searches = {
      data: function (d) {
        d.keywords = _$('input[name=keywords]').val();
        d.category_id = _$('select[name=category_id]').val();
      }
    };
    var datatable = new Datatable('product', columns, searches);
    datatable.init();

    _$('#search-form').on('click', function (e) {
      e.preventDefault();
      datatable.refresh();
    });

    _$('#reset-form').on('click', function (e) {
      e.preventDefault();
      _$('input').val('');
      _$('select').prop('selectedIndex', 0);
      datatable.refresh();
    });
  }

  form () {
    var _$ = window.jQuery;
    var uploadfileBf = new Uploadfile('#image_before_src', '#image_bf-upload');
    uploadfileBf.init();
    var uploadfileAf = new Uploadfile('#image_after_src', '#image_af-upload');
    uploadfileAf.init();
  }
}

export default window.product = new Product();
