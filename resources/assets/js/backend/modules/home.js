// @flow
'use strict';

import Datatable from './../partials/datatable';
import Uploadfile from './../partials/uploadfile';
class Home {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'name',
        name: 'name',
        render:function (data, type, row) {
          return row.first_name + ' ' + (row.last_name == null ? '' : row.last_name);
        }
      },
      { data: 'email', name: 'email'},
      { data: 'company', name: 'company'},
      { data: 'message', name: 'message'},
      { data: 'is_home',
        name: 'is_home',
        render:function (data, type, row) {
          return row.is_home == 1 ? '<span class="label label-primary">ON</span>' : '';
        }
      },
    ];
    let searches = {
      data: function (d) {
        d.keywords = _$('input[name=keywords]').val();
      }
    };
    var datatable = new Datatable('home', columns, searches);
    datatable.init();

    _$('#search-form').on('click', function (e) {
      e.preventDefault();
      datatable.refresh();
    });

    _$('#reset-form').on('click', function (e) {
      e.preventDefault();
      _$('input').val('');
      datatable.refresh();
    });
  }

  form () {
    var _$ = window.$;
    var uploadfile = new Uploadfile();
    uploadfile.init();
  }
}

export default window.home = new Home();
