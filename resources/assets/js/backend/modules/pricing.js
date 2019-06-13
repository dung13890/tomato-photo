// @flow
'use strict';

import Notification from './../partials/notification';
import 'fontawesome-iconpicker';

class Pricing {
  form () {
    var notification = new Notification();
    notification.flashMessage();
    var _$ = window.jQuery;
    _$('.icon-picker').iconpicker({
        icons: [
            {
                title: "fa fa-pencil",
                searchTerms: ['pencil']
            },
            {
                title: "fa fa-lightbulb-o",
                searchTerms: ['globe']
            },
            {
                title: "ion ion-ios-people",
                searchTerms: ['people']
            },
            {
                title: "ion ion-ios-planet",
                searchTerms: ['planet']
            },
            {
                title: "ion ion-ios-ribbon",
                searchTerms: ['ribbon']
            },
            {
                title: "ion ion-ios-globe",
                searchTerms: ['globe']
            },
            {
                title: "ion ion-ios-unlock",
                searchTerms: ['unlock']
            },
            {
                title: "fa fa-address-card-o",
                searchTerms: ['address']
            },
            {
                title: "fa fa-diamond",
                searchTerms: ['diamond']
            },
            {
                title: "fa fa-envelope-open-o",
                searchTerms: ['envelope']
            },
            {
                title: "fa fa-commenting",
                searchTerms: ['commenting']
            },
            {
                title: "fa fa-rocket",
                searchTerms: ['rocket']
            },
            {
                title: "fa fa-camera-retro",
                searchTerms: ['camera']
            },
            {
                title: "fa fa-file-image-o",
                searchTerms: ['file-image']
            },
            {
                title: "fa fa-television",
                searchTerms: ['television']
            },
            {
                title: "fa fa-handshake-o",
                searchTerms: ['handshake']
            }
        ],
    });
  }
}

export default window.pricing = new Pricing();
