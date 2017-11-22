(function (g, d) {

    // TODO: выпилить
    /*! promise-polyfill 2.0.1 */
    !function(a) {
        function b(a, b) {
            return function() {
                a.apply(b, arguments)
            }
        }
        function c(a) {
            if ("object" != typeof this)
                throw new TypeError("Promises must be constructed via new");
            if ("function" != typeof a)
                throw new TypeError("not a function");
            this._state = null, this._value = null, this._deferreds = [], i(a, b(e, this), b(f, this))
        }
        function d(a) {
            var b = this;
            return null === this._state ? void this._deferreds.push(a) : void j(function() {
                var c = b._state ? a.onFulfilled: a.onRejected;
                if (null === c)
                    return void(b._state ? a.resolve : a.reject)(b._value);
                var d;
                try {
                    d = c(b._value)
                } catch (e) {
                    return void a.reject(e)
                }
                a.resolve(d)
            })
        }
        function e(a) {
            try {
                if (a === this)
                    throw new TypeError("A promise cannot be resolved with itself.");
                if (a && ("object" == typeof a || "function" == typeof a)) {
                    var c = a.then;
                    if ("function" == typeof c)
                        return void i(b(c, a), b(e, this), b(f, this))
                }
                this._state=!0, this._value = a, g.call(this)
            } catch (d) {
                f.call(this, d)
            }
        }
        function f(a) {
            this._state=!1, this._value = a, g.call(this)
        }
        function g() {
            for (var a = 0, b = this._deferreds.length; b > a; a++)
                d.call(this, this._deferreds[a]);
            this._deferreds = null
        }
        function h(a, b, c, d) {
            this.onFulfilled = "function" == typeof a ? a : null, this.onRejected = "function" == typeof b ? b : null, this.resolve = c, this.reject = d
        }
        function i(a, b, c) {
            var d=!1;
            try {
                a(function(a) {
                    d || (d=!0, b(a))
                }, function(a) {
                    d || (d=!0, c(a))
                })
            } catch (e) {
                if (d)
                    return;
                d=!0, c(e)
            }
        }
        var j = c.immediateFn || "function" == typeof setImmediate && setImmediate || function(a) {
            setTimeout(a, 1)
        }, k = Array.isArray || function(a) {
            return "[object Array]" === Object.prototype.toString.call(a)
        };
        c.prototype["catch"] = function(a) {
            return this.then(null, a)
        }, c.prototype.then = function(a, b) {
            var e = this;
            return new c(function(c, f) {
                d.call(e, new h(a, b, c, f))
            })
        }, c.all = function() {
            var a = Array.prototype.slice.call(1 === arguments.length && k(arguments[0]) ? arguments[0] : arguments);
            return new c(function(b, c) {
                function d(f, g) {
                    try {
                        if (g && ("object" == typeof g || "function" == typeof g)) {
                            var h = g.then;
                            if ("function" == typeof h)
                                return void h.call(g, function(a) {
                                d(f, a)
                            }, c)
                        }
                        a[f] = g, 0===--e && b(a)
                    } catch (i) {
                        c(i)
                    }
                }
                if (0 === a.length)
                    return b([]);
                for (var e = a.length, f = 0; f < a.length; f++)
                    d(f, a[f])
            })
        }, c.resolve = function(a) {
            return a && "object" == typeof a && a.constructor === c ? a : new c(function(b) {
                b(a)
            })
        }, c.reject = function(a) {
            return new c(function(b, c) {
                c(a)
            })
        }, c.race = function(a) {
            return new c(function(b, c) {
                for (var d = 0, e = a.length; e > d; d++)
                    a[d].then(b, c)
            })
        }, "undefined" != typeof module && module.exports ? module.exports = c : a.Promise || (a.Promise = c)
    }(this);

    // region helpers

    //console.log
    var log = d.querySelector('#console');

    ['log', 'warn', 'error'].forEach(function (verb) {
        console[verb] = (function (method, verb, log) {
            return function (text) {
                method(text);
                // handle distinguishing between methods any way you'd like
                var msg = document.createElement('code');
                msg.classList.add(verb);
                msg.textContent = new Date + ' - ' + verb + ': ' + text;
                log.insertBefore(msg, log.firstChild);
            };
        })(console[verb].bind(console), verb, log);
    });

    function getScript(url, success) {
        var script = document.createElement('script');
        script.src = url;
        console.log('Loading: ', url);
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function () {
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }

    // endregion helpers

    // region loading RequireJS and SockJS promise
    //TODO: разбораться с promise, т.к. он видимо нативный и поддерживается не всеми браузерами
    var loadRequirePromise = new Promise(function (resolve, reject) {
        getScript('//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.17/require.min.js', function () {
            console.log('Requirejs loaded');
            if (require) {
                resolve({
                    require: require
                })
            } else {
                reject(Error("Error while load resources"));
            }
        });

    });
    // endregion loading RequireJS and SockJS promise

    /* Main code */
    //
    g.OptionLift = g.OptionLift || {};
    g.OptionLift.loaded = false;


    g.OptionLift.App = function (args) {
        this.init(args);
        console.log('Load app', g.OptionLift.args.staticUrl + '/requireLoader.js');
        getScript(g.OptionLift.args.staticUrl + '/requireLoader.js', function () {
            if (g.OptionLift.loaded) {
                console.log('App loaded');
            } else {
                throw "App not loaded!"
            }
        });
    };

    g.OptionLift.App.prototype.init = function (args) {
        console.log('Init src');
        console.log('Args: ', args);
        console.log('Require js version: ', g.OptionLift._require.version);
        g.OptionLift.args = args;
    };
    /* End Main code */

    loadRequirePromise
    .then(function (result) {
        g.OptionLift._require = result.require;
        //g.OptionLift._sockjs = result.SockJS;
        for (var callback in this.optionlift_callbacks) {
            this.optionlift_callbacks[callback]();
        }
    }, function (err) {
        console.log(err);
    });

})(this, this.document);

