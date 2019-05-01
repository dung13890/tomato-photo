// @flow
'use strict';

import swal from 'sweetalert2';
class Notification {
  constructor () {
    this._text = '';
  }

  setText (text) {
    this._text = text;
  }

  destroyRow (datatable = null, remove = null, selector) {
    var _$ = window.$;
    var self = this;
    var el = selector || 'a.delete-action';
    _$(document).on('click', el, function (e) {
      var $this = _$(this);
      e.preventDefault();
      var deleteUrl = _$(this).attr('href');
      swal({
        title: window.lang.get('repositories.sweetalert.question'),
        text: self._text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: window.lang.get('repositories.sweetalert.ok'),
        cancelButtonText: window.lang.get('repositories.sweetalert.cancel')
      }).then(function () {
        _$.ajax({
          type: 'DELETE',
          url: deleteUrl,
          success: function (response) {
            self.alertNotification(response.message, true);
            if (datatable) {
              datatable.refresh();
            }
            if (!datatable && remove) {
              $this.closest(remove).fadeOut(400, function() {
                $this.remove();
              });
            }
          },
          error: function (response) {
            self.alertNotification(response.responseJSON.message, false);
          }
        });
      }, function (dismiss) {
        return false;
      });
    });
  }

  alertNotification (message, status = true, delay = 3000) {
    var _$ = window.$;
    let alertType = status ? 'alert-success' : 'alert-danger';
    _$('#notification .alert-content').html('');
    _$(message).each(function (index, element) {
      _$('#notification .alert-content').append('<strong>' + element + '</strong><br>');
    });
    _$('#notification').toggleClass('hidden').removeClass('alert-success alert-danger').addClass(alertType).delay(delay).show(function () {
      _$(this).toggleClass('hidden');
    });
  }

  flashMessage () {
    var message = window.flash_message;
    if (typeof message.status !== 'undefined') {
      var e = message;
      this.alertNotification(e.message, e.status);
    }
  }
}

export default Notification;
