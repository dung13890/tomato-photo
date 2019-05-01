// @flow
'use strict';

import Uploadfile from './../partials/uploadfile';
import Notification from './../partials/notification';
class Config {
  form () {
    var notification = new Notification();
    notification.flashMessage();
    var _$ = window.jQuery;
    var uploadfile = new Uploadfile();
    uploadfile.init();
    var uploadblog = new Uploadfile('#blog_banner', '#blog_banner-upload');
    uploadblog.init();
    var uploadAbout = new Uploadfile('#about_banner', '#about_banner-upload');
    uploadAbout.init();
    var uploadContactBanner = new Uploadfile('#contact_banner', '#contact_banner-upload');
    uploadContactBanner.init();
    var uploadContactBanner1 = new Uploadfile('#contact_banner_1', '#contact_banner_1-upload');
    uploadContactBanner1.init();
    var uploadContactBanner2 = new Uploadfile('#contact_banner_2', '#contact_banner_2-upload');
    uploadContactBanner2.init();
  }
}

export default window.config = new Config();
