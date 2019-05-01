(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"},{"host":null,"methods":["DELETE"],"uri":"_debugbar\/cache\/{key}\/{tags?}","name":"debugbar.cache.delete","action":"Barryvdh\Debugbar\Controllers\CacheController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\Frontend\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"about","name":"about","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"contact","name":"contact","action":"Closure"},{"host":null,"methods":["POST"],"uri":"home\/contact","name":"home.store.contact","action":"App\Http\Controllers\Frontend\HomeController@storeContact"},{"host":null,"methods":["GET","HEAD"],"uri":"blog","name":"blog","action":"App\Http\Controllers\Frontend\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"blog\/{slug}","name":"blog.show","action":"App\Http\Controllers\Frontend\PostController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"category\/{slug}","name":"category.show","action":"App\Http\Controllers\Frontend\CategoryController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Backend\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Backend\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Backend\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Backend\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Backend\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Backend\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Backend\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Backend\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"password.update","action":"App\Http\Controllers\Backend\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"backend","name":"backend.home.index","action":"App\Http\Controllers\Backend\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/home\/{contact}\/edit","name":"backend.home.edit","action":"App\Http\Controllers\Backend\HomeController@edit"},{"host":null,"methods":["PATCH"],"uri":"backend\/home\/{contact}","name":"backend.home.update","action":"App\Http\Controllers\Backend\HomeController@update"},{"host":null,"methods":["DELETE"],"uri":"backend\/home\/{contact}","name":"backend.home.destroy","action":"App\Http\Controllers\Backend\HomeController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/contact\/create","name":"backend.home.create","action":"App\Http\Controllers\Backend\HomeController@create"},{"host":null,"methods":["POST"],"uri":"backend\/contact","name":"backend.home.store","action":"App\Http\Controllers\Backend\HomeController@store"},{"host":null,"methods":["POST"],"uri":"backend\/summernote\/image","name":"backend.summernote.image","action":"App\Http\Controllers\Backend\HomeController@summernoteImage"},{"host":null,"methods":["POST"],"uri":"backend\/collection\/{category}","name":"backend.home.store.collection","action":"App\Http\Controllers\Backend\HomeController@storeCollection"},{"host":null,"methods":["DELETE"],"uri":"backend\/collection\/{id}","name":"backend.home.delete.collection","action":"App\Http\Controllers\Backend\HomeController@deleteCollection"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user","name":"backend.user.index","action":"App\Http\Controllers\Backend\UserController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user\/create","name":"backend.user.create","action":"App\Http\Controllers\Backend\UserController@create"},{"host":null,"methods":["POST"],"uri":"backend\/user","name":"backend.user.store","action":"App\Http\Controllers\Backend\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user\/{user}","name":"backend.user.show","action":"App\Http\Controllers\Backend\UserController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user\/{user}\/edit","name":"backend.user.edit","action":"App\Http\Controllers\Backend\UserController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/user\/{user}","name":"backend.user.update","action":"App\Http\Controllers\Backend\UserController@update"},{"host":null,"methods":["DELETE"],"uri":"backend\/user\/{user}","name":"backend.user.destroy","action":"App\Http\Controllers\Backend\UserController@destroy"},{"host":null,"methods":["POST"],"uri":"backend\/category","name":"backend.category.store","action":"App\Http\Controllers\Backend\CategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/category\/{category}\/edit","name":"backend.category.edit","action":"App\Http\Controllers\Backend\CategoryController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/category\/{category}","name":"backend.category.update","action":"App\Http\Controllers\Backend\CategoryController@update"},{"host":null,"methods":["DELETE"],"uri":"backend\/category\/{category}","name":"backend.category.destroy","action":"App\Http\Controllers\Backend\CategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/category\/type\/{type}","name":"backend.category.type","action":"App\Http\Controllers\Backend\CategoryController@type"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/category\/{category}\/collection","name":"backend.category.collection","action":"App\Http\Controllers\Backend\CategoryController@collection"},{"host":null,"methods":["PATCH"],"uri":"backend\/category\/{category}\/collection","name":"backend.category.update.collection","action":"App\Http\Controllers\Backend\CategoryController@updateCollection"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post","name":"backend.post.index","action":"App\Http\Controllers\Backend\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post\/create","name":"backend.post.create","action":"App\Http\Controllers\Backend\PostController@create"},{"host":null,"methods":["POST"],"uri":"backend\/post","name":"backend.post.store","action":"App\Http\Controllers\Backend\PostController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post\/{post}","name":"backend.post.show","action":"App\Http\Controllers\Backend\PostController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post\/{post}\/edit","name":"backend.post.edit","action":"App\Http\Controllers\Backend\PostController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/post\/{post}","name":"backend.post.update","action":"App\Http\Controllers\Backend\PostController@update"},{"host":null,"methods":["DELETE"],"uri":"backend\/post\/{post}","name":"backend.post.destroy","action":"App\Http\Controllers\Backend\PostController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product","name":"backend.product.index","action":"App\Http\Controllers\Backend\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product\/create","name":"backend.product.create","action":"App\Http\Controllers\Backend\ProductController@create"},{"host":null,"methods":["POST"],"uri":"backend\/product","name":"backend.product.store","action":"App\Http\Controllers\Backend\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product\/{product}","name":"backend.product.show","action":"App\Http\Controllers\Backend\ProductController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product\/{product}\/edit","name":"backend.product.edit","action":"App\Http\Controllers\Backend\ProductController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/product\/{product}","name":"backend.product.update","action":"App\Http\Controllers\Backend\ProductController@update"},{"host":null,"methods":["DELETE"],"uri":"backend\/product\/{product}","name":"backend.product.destroy","action":"App\Http\Controllers\Backend\ProductController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide","name":"backend.slide.index","action":"App\Http\Controllers\Backend\SlideController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide\/create","name":"backend.slide.create","action":"App\Http\Controllers\Backend\SlideController@create"},{"host":null,"methods":["POST"],"uri":"backend\/slide","name":"backend.slide.store","action":"App\Http\Controllers\Backend\SlideController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide\/{slide}","name":"backend.slide.show","action":"App\Http\Controllers\Backend\SlideController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide\/{slide}\/edit","name":"backend.slide.edit","action":"App\Http\Controllers\Backend\SlideController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/slide\/{slide}","name":"backend.slide.update","action":"App\Http\Controllers\Backend\SlideController@update"},{"host":null,"methods":["DELETE"],"uri":"backend\/slide\/{slide}","name":"backend.slide.destroy","action":"App\Http\Controllers\Backend\SlideController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/menu","name":"backend.menu.index","action":"App\Http\Controllers\Backend\MenuController@index"},{"host":null,"methods":["POST"],"uri":"backend\/menu","name":"backend.menu.store","action":"App\Http\Controllers\Backend\MenuController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/menu\/{menu}\/edit","name":"backend.menu.edit","action":"App\Http\Controllers\Backend\MenuController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/menu\/{menu}","name":"backend.menu.update","action":"App\Http\Controllers\Backend\MenuController@update"},{"host":null,"methods":["DELETE"],"uri":"backend\/menu\/{menu}","name":"backend.menu.destroy","action":"App\Http\Controllers\Backend\MenuController@destroy"},{"host":null,"methods":["POST"],"uri":"backend\/menu\/serialize","name":"backend.menu.serialize","action":"App\Http\Controllers\Backend\MenuController@serialize"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/config","name":"backend.config.index","action":"App\Http\Controllers\Backend\ConfigController@index"},{"host":null,"methods":["POST"],"uri":"backend\/config","name":"backend.config.store","action":"App\Http\Controllers\Backend\ConfigController@store"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

