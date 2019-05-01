// @flow
'use strict';

import Datatable from './../partials/datatable';
import Uploadfile from './../partials/uploadfile';
class Post {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'name', name: 'name' },
      { data: 'ceo_title', name: 'ceo_title'},
      { data: 'ceo_keywords', name: 'ceo_keywords'},
      { data: 'ceo_description', name: 'ceo_description'},
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
    var datatable = new Datatable('post', columns, searches);
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
    var _$ = window.$;
    var uploadfile = new Uploadfile();
    uploadfile.init();
    _$('.grid-editor').gridEditor({
      new_row_layouts: [[4,4,4], [6,6], [9,3]],
      content_types: ['summernote'],
    });
    _$('.textarea-summernote').summernote({
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture','video', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['mybutton', ['layout']],
        ['help', ['help']]
      ],
      height:600,
      buttons: {
        layout: this.insertLayout
      },
      callbacks: {
        onImageUpload: function(files) {
          uploadfile.sendImage(files[0], laroute.route('backend.summernote.image'), _$(this));
        }
      }
    });
  }

  insertLayout (context) {
    var _$ = window.$;
    var ui = _$.summernote.ui;

    // create button
    var button = ui.button({
      contents: '<i class="ion-archive"/>',
      tooltip: 'insert layout',
      click: function () {
        var node = _$(_$('.grid-editor').gridEditor('getHtml'))[0];
        if (!node) {
          return;
        }
        context.invoke('editor.insertNode', node);
      }
    });

    return button.render();
  }
}

export default window.post = new Post();
