// @flow
'use strict';

import Datatable from './../partials/datatable';
import Uploadfile from './../partials/uploadfile';
class Slide {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'title', name: 'title'},
      { data: 'description', name: 'description'},
      { data: 'image_src',
        name: 'image_src',
        render:(data, type, row) => {
          return `<img src=${row.image_src} class="img-thumbnail" />`;
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
    var datatable = new Datatable('slide', columns, searches);
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
    var uploadfile = new Uploadfile();
    uploadfile.init();
  }
}

export default window.slide = new Slide();
