! function(t, e) {
    "function" == typeof define && define.amd ? define(["jquery"], function(n) {
        return e(t, n)
    }) : "object" == typeof exports ? e(t, require("jquery")) : e(t, t.jQuery)
}("undefined" != typeof window ? window : this, function(t, e) {
    "use strict";

    function n(t, e) {
        for (var n = t.length; --n;)
            if (+t[n] !== +e[n]) return !1;
        return !0
    }

    function i(t) {
        var n = {
            range: !0,
            animate: !0
        };
        return "boolean" == typeof t ? n.animate = t : e.extend(n, t), n
    }

    function s(t, n, i, s, o, a, r, h, c) {
        this.elements = "array" === e.type(t) ? [+t[0], +t[2], +t[4], +t[1], +t[3], +t[5], 0, 0, 1] : [t, n, i, s, o, a, r || 0, h || 0, c || 1]
    }

    function o(t, e, n) {
        this.elements = [t, e, n]
    }

    function a(t, n) {
        if (!(this instanceof a)) return new a(t, n);
        1 !== t.nodeType && e.error("Panzoom called on non-Element node"), e.contains(u, t) || e.error("Panzoom element must be attached to the document");
        var i = e.data(t, m);
        if (i) return i;
        this.options = n = e.extend({}, a.defaults, n), this.elem = t;
        var s = this.$elem = e(t);
        this.$set = n.$set && n.$set.length ? n.$set : s, this.$doc = e(t.ownerDocument || u), this.$parent = s.parent(), this.isSVG = v.test(t.namespaceURI) && "svg" !== t.nodeName.toLowerCase(), this.panning = !1, this._buildTransform(), this._transform = !this.isSVG && e.cssProps.transform.replace(g, "-$1").toLowerCase(), this._buildTransition(), this.resetDimensions();
        var o = e(),
            r = this;
        e.each(["$zoomIn", "$zoomOut", "$zoomRange", "$reset"], function(t, e) {
            r[e] = n[e] || o
        }), this.enable(), e.data(t, m, this)
    }
    var r = "over out down up move enter leave cancel".split(" "),
        h = e.extend({}, e.event.mouseHooks),
        c = {};
    if (t.PointerEvent) e.each(r, function(t, n) {
        e.event.fixHooks[c[n] = "pointer" + n] = h
    });
    else {
        var l = h.props;
        h.props = l.concat(["touches", "changedTouches", "targetTouches", "altKey", "ctrlKey", "metaKey", "shiftKey"]), h.filter = function(t, e) {
            var n, i = l.length;
            if (!e.pageX && e.touches && (n = e.touches[0]))
                for (; i--;) t[l[i]] = n[l[i]];
            return t
        }, e.each(r, function(t, n) {
            if (2 > t) c[n] = "mouse" + n;
            else {
                var i = "touch" + ("down" === n ? "start" : "up" === n ? "end" : n);
                e.event.fixHooks[i] = h, c[n] = i + " mouse" + n
            }
        })
    }
    e.pointertouch = c;
    var u = t.document,
        m = "__pz__",
        f = Array.prototype.slice,
        p = !!t.PointerEvent,
        d = function() {
            var t = u.createElement("input");
            return t.setAttribute("oninput", "return"), "function" == typeof t.oninput
        }(),
        g = /([A-Z])/g,
        v = /^http:[\w\.\/]+svg$/,
        b = /^inline/,
        _ = "(\\-?[\\d\\.e]+)",
        y = "\\,?\\s*",
        $ = new RegExp("^matrix\\(" + _ + y + _ + y + _ + y + _ + y + _ + y + _ + "\\)$");
    return s.prototype = {
        x: function(t) {
            var e = t instanceof o,
                n = this.elements,
                i = t.elements;
            return e && 3 === i.length ? new o(n[0] * i[0] + n[1] * i[1] + n[2] * i[2], n[3] * i[0] + n[4] * i[1] + n[5] * i[2], n[6] * i[0] + n[7] * i[1] + n[8] * i[2]) : i.length === n.length ? new s(n[0] * i[0] + n[1] * i[3] + n[2] * i[6], n[0] * i[1] + n[1] * i[4] + n[2] * i[7], n[0] * i[2] + n[1] * i[5] + n[2] * i[8], n[3] * i[0] + n[4] * i[3] + n[5] * i[6], n[3] * i[1] + n[4] * i[4] + n[5] * i[7], n[3] * i[2] + n[4] * i[5] + n[5] * i[8], n[6] * i[0] + n[7] * i[3] + n[8] * i[6], n[6] * i[1] + n[7] * i[4] + n[8] * i[7], n[6] * i[2] + n[7] * i[5] + n[8] * i[8]) : !1
        },
        inverse: function() {
            var t = 1 / this.determinant(),
                e = this.elements;
            return new s(t * (e[8] * e[4] - e[7] * e[5]), t * -(e[8] * e[1] - e[7] * e[2]), t * (e[5] * e[1] - e[4] * e[2]), t * -(e[8] * e[3] - e[6] * e[5]), t * (e[8] * e[0] - e[6] * e[2]), t * -(e[5] * e[0] - e[3] * e[2]), t * (e[7] * e[3] - e[6] * e[4]), t * -(e[7] * e[0] - e[6] * e[1]), t * (e[4] * e[0] - e[3] * e[1]))
        },
        determinant: function() {
            var t = this.elements;
            return t[0] * (t[8] * t[4] - t[7] * t[5]) - t[3] * (t[8] * t[1] - t[7] * t[2]) + t[6] * (t[5] * t[1] - t[4] * t[2])
        }
    }, o.prototype.e = s.prototype.e = function(t) {
        return this.elements[t]
    }, a.rmatrix = $, a.events = e.pointertouch, a.defaults = {
        eventNamespace: ".panzoom",
        transition: !0,
        cursor: "move",
        disablePan: !1,
        disableZoom: !1,
        increment: .5,
        minScale: 1,
        maxScale: 2,
        rangeStep: .5,
        duration: 200,
        easing: "ease-in-out",
        contain: !1
    }, a.prototype = {
        constructor: a,
        instance: function() {
            return this
        },
        enable: function() {
            this._initStyle(), this._bind(), this.disabled = !1
        },
        disable: function() {
            this.disabled = !0, this._resetStyle(), this._unbind()
        },
        isDisabled: function() {
            return this.disabled
        },
        destroy: function() {
            this.disable(), e.removeData(this.elem, m)
        },
        resetDimensions: function() {
            var t = this.$parent;
            this.container = {
                width: t.innerWidth(),
                height: t.innerHeight()
            };
            var n, i = t.offset(),
                s = this.elem,
                o = this.$elem;
            this.isSVG ? (n = s.getBoundingClientRect(), n = {
                left: n.left - i.left,
                top: n.top - i.top,
                width: n.width,
                height: n.height,
                margin: {
                    left: 0,
                    top: 0
                }
            }) : n = {
                left: e.css(s, "left", !0) || 0,
                top: e.css(s, "top", !0) || 0,
                width: o.innerWidth(),
                height: o.innerHeight(),
                margin: {
                    top: e.css(s, "marginTop", !0) || 0,
                    left: e.css(s, "marginLeft", !0) || 0
                }
            }, n.widthBorder = e.css(s, "borderLeftWidth", !0) + e.css(s, "borderRightWidth", !0) || 0, n.heightBorder = e.css(s, "borderTopWidth", !0) + e.css(s, "borderBottomWidth", !0) || 0, this.dimensions = n
        },
        reset: function(t) {
            t = i(t);
            var e = this.setMatrix(this._origTransform, t);
            t.silent || this._trigger("reset", e)
        },
        resetZoom: function(t) {
            t = i(t);
            var e = this.getMatrix(this._origTransform);
            t.dValue = e[3], this.zoom(e[0], t)
        },
        resetPan: function(t) {
            var e = this.getMatrix(this._origTransform);
            this.pan(e[4], e[5], i(t))
        },
        setTransform: function(t) {
            for (var n = this.isSVG ? "attr" : "style", i = this.$set, s = i.length; s--;) e[n](i[s], "transform", t)
        },
        getTransform: function(t) {
            var n = this.$set,
                i = n[0];
            return t ? this.setTransform(t) : t = e[this.isSVG ? "attr" : "style"](i, "transform"), "none" === t || $.test(t) || this.setTransform(t = e.css(i, "transform")), t || "none"
        },
        getMatrix: function(t) {
            var e = $.exec(t || this.getTransform());
            return e && e.shift(), e || [1, 0, 0, 1, 0, 0]
        },
        setMatrix: function(t, n) {
            if (!this.disabled) {
                n || (n = {}), "string" == typeof t && (t = this.getMatrix(t));
                var i, s, o, a, r, h, c, l, u, m, f = +t[0],
                    p = this.$parent,
                    d = "undefined" != typeof n.contain ? n.contain : this.options.contain;
                return d && (i = this._checkDims(), s = this.container, u = i.width + i.widthBorder, m = i.height + i.heightBorder, o = (u * Math.abs(f) - s.width) / 2, a = (m * Math.abs(f) - s.height) / 2, c = i.left + i.margin.left, l = i.top + i.margin.top, "invert" === d ? (r = u > s.width ? u - s.width : 0, h = m > s.height ? m - s.height : 0, o += (s.width - u) / 2, a += (s.height - m) / 2, t[4] = Math.max(Math.min(t[4], o - c), -o - c - r), t[5] = Math.max(Math.min(t[5], a - l), -a - l - h + i.heightBorder)) : (a += i.heightBorder / 2, r = s.width > u ? s.width - u : 0, h = s.height > m ? s.height - m : 0, "center" === p.css("textAlign") && b.test(e.css(this.elem, "display")) ? r = 0 : o = a = 0, t[4] = Math.min(Math.max(t[4], o - c), -o - c + r), t[5] = Math.min(Math.max(t[5], a - l), -a - l + h))), "skip" !== n.animate && this.transition(!n.animate), n.range && this.$zoomRange.val(f), this.setTransform("matrix(" + t.join(",") + ")"), n.silent || this._trigger("change", t), t
            }
        },
        isPanning: function() {
            return this.panning
        },
        transition: function(t) {
            if (this._transition)
                for (var n = t || !this.options.transition ? "none" : this._transition, i = this.$set, s = i.length; s--;) e.style(i[s], "transition") !== n && e.style(i[s], "transition", n)
        },
        pan: function(t, e, n) {
            if (!this.options.disablePan) {
                n || (n = {});
                var i = n.matrix;
                i || (i = this.getMatrix()), n.relative && (t += +i[4], e += +i[5]), i[4] = t, i[5] = e, this.setMatrix(i, n), n.silent || this._trigger("pan", i[4], i[5])
            }
        },
        zoom: function(t, n) {
            "object" == typeof t ? (n = t, t = null) : n || (n = {});
            var i = e.extend({}, this.options, n);
            if (!i.disableZoom) {
                var a = !1,
                    r = i.matrix || this.getMatrix();
                "number" != typeof t && (t = +r[0] + i.increment * (t ? -1 : 1), a = !0), t > i.maxScale ? t = i.maxScale : t < i.minScale && (t = i.minScale);
                var h = i.focal;
                if (h && !i.disablePan) {
                    var c = this._checkDims(),
                        l = h.clientX,
                        u = h.clientY;
                    this.isSVG || (l -= (c.width + c.widthBorder) / 2, u -= (c.height + c.heightBorder) / 2);
                    var m = new o(l, u, 1),
                        f = new s(r),
                        p = this.parentOffset || this.$parent.offset(),
                        d = new s(1, 0, p.left - this.$doc.scrollLeft(), 0, 1, p.top - this.$doc.scrollTop()),
                        g = f.inverse().x(d.inverse().x(m)),
                        v = t / r[0];
                    f = f.x(new s([v, 0, 0, v, 0, 0])), m = d.x(f.x(g)), r[4] = +r[4] + (l - m.e(0)), r[5] = +r[5] + (u - m.e(1))
                }
                r[0] = t, r[3] = "number" == typeof i.dValue ? i.dValue : t, this.setMatrix(r, {
                    animate: "boolean" == typeof i.animate ? i.animate : a,
                    range: !i.noSetRange
                }), i.silent || this._trigger("zoom", r[0], i)
            }
        },
        option: function(t, n) {
            var i;
            if (!t) return e.extend({}, this.options);
            if ("string" == typeof t) {
                if (1 === arguments.length) return void 0 !== this.options[t] ? this.options[t] : null;
                i = {}, i[t] = n
            } else i = t;
            this._setOptions(i)
        },
        _setOptions: function(t) {
            e.each(t, e.proxy(function(t, n) {
                switch (t) {
                    case "disablePan":
                        this._resetStyle();
                    case "$zoomIn":
                    case "$zoomOut":
                    case "$zoomRange":
                    case "$reset":
                    case "disableZoom":
                    case "onStart":
                    case "onChange":
                    case "onZoom":
                    case "onPan":
                    case "onEnd":
                    case "onReset":
                    case "eventNamespace":
                        this._unbind()
                }
                switch (this.options[t] = n, t) {
                    case "disablePan":
                        this._initStyle();
                    case "$zoomIn":
                    case "$zoomOut":
                    case "$zoomRange":
                    case "$reset":
                        this[t] = n;
                    case "disableZoom":
                    case "onStart":
                    case "onChange":
                    case "onZoom":
                    case "onPan":
                    case "onEnd":
                    case "onReset":
                    case "eventNamespace":
                        this._bind();
                        break;
                    case "cursor":
                        e.style(this.elem, "cursor", n);
                        break;
                    case "minScale":
                        this.$zoomRange.attr("min", n);
                        break;
                    case "maxScale":
                        this.$zoomRange.attr("max", n);
                        break;
                    case "rangeStep":
                        this.$zoomRange.attr("step", n);
                        break;
                    case "startTransform":
                        this._buildTransform();
                        break;
                    case "duration":
                    case "easing":
                        this._buildTransition();
                    case "transition":
                        this.transition();
                        break;
                    case "$set":
                        n instanceof e && n.length && (this.$set = n, this._initStyle(), this._buildTransform())
                }
            }, this))
        },
        _initStyle: function() {
            var t = {
                "backface-visibility": "hidden",
                "transform-origin": this.isSVG ? "0 0" : "50% 50%"
            };
            this.options.disablePan || (t.cursor = this.options.cursor), this.$set.css(t);
            var n = this.$parent;
            n.length && !e.nodeName(n[0], "body") && (t = {
                overflow: "hidden"
            }, "static" === n.css("position") && (t.position = "relative"), n.css(t))
        },
        _resetStyle: function() {
            this.$elem.css({
                cursor: "",
                transition: ""
            }), this.$parent.css({
                overflow: "",
                position: ""
            })
        },
        _bind: function() {
            var t = this,
                n = this.options,
                i = n.eventNamespace,
                s = p ? "pointerdown" + i : "touchstart" + i + " mousedown" + i,
                o = p ? "pointerup" + i : "touchend" + i + " click" + i,
                r = {},
                h = this.$reset,
                c = this.$zoomRange;
            if (e.each(["Start", "Change", "Zoom", "Pan", "End", "Reset"], function() {
                    var t = n["on" + this];
                    e.isFunction(t) && (r["panzoom" + this.toLowerCase() + i] = t)
                }), n.disablePan && n.disableZoom || (r[s] = function(e) {
                    var i;
                    ("touchstart" === e.type ? !(i = e.touches) || (1 !== i.length || n.disablePan) && 2 !== i.length : n.disablePan || 1 !== e.which) || (e.preventDefault(), e.stopPropagation(), t._startMove(e, i))
                }), this.$elem.on(r), h.length && h.on(o, function(e) {
                    e.preventDefault(), t.reset()
                }), c.length && c.attr({
                    step: n.rangeStep === a.defaults.rangeStep && c.attr("step") || n.rangeStep,
                    min: n.minScale,
                    max: n.maxScale
                }).prop({
                    value: this.getMatrix()[0]
                }), !n.disableZoom) {
                var l = this.$zoomIn,
                    u = this.$zoomOut;
                l.length && u.length && (l.on(o, function(e) {
                    e.preventDefault(), t.zoom()
                }), u.on(o, function(e) {
                    e.preventDefault(), t.zoom(!0)
                })), c.length && (r = {}, r[(p ? "pointerdown" : "mousedown") + i] = function() {
                    t.transition(!0)
                }, r[(d ? "input" : "change") + i] = function() {
                    t.zoom(+this.value, {
                        noSetRange: !0
                    })
                }, c.on(r))
            }
        },
        _unbind: function() {
            this.$elem.add(this.$zoomIn).add(this.$zoomOut).add(this.$reset).off(this.options.eventNamespace)
        },
        _buildTransform: function() {
            return this._origTransform = this.getTransform(this.options.startTransform)
        },
        _buildTransition: function() {
            if (this._transform) {
                var t = this.options;
                this._transition = this._transform + " " + t.duration + "ms " + t.easing
            }
        },
        _checkDims: function() {
            var t = this.dimensions;
            return t.width && t.height || this.resetDimensions(), this.dimensions
        },
        _getDistance: function(t) {
            var e = t[0],
                n = t[1];
            return Math.sqrt(Math.pow(Math.abs(n.clientX - e.clientX), 2) + Math.pow(Math.abs(n.clientY - e.clientY), 2))
        },
        _getMiddle: function(t) {
            var e = t[0],
                n = t[1];
            return {
                clientX: (n.clientX - e.clientX) / 2 + e.clientX,
                clientY: (n.clientY - e.clientY) / 2 + e.clientY
            }
        },
        _trigger: function(t) {
            "string" == typeof t && (t = "panzoom" + t), this.$elem.triggerHandler(t, [this].concat(f.call(arguments, 1)))
        },
        _startMove: function(t, i) {
            var s, o, a, r, h, c, l, m, f = this,
                d = this.options,
                g = d.eventNamespace,
                v = this.getMatrix(),
                b = v.slice(0),
                _ = +b[4],
                y = +b[5],
                $ = {
                    matrix: v,
                    animate: "skip"
                };
            p ? (o = "pointermove", a = "pointerup") : "touchstart" === t.type ? (o = "touchmove", a = "touchend") : (o = "mousemove", a = "mouseup"), o += g, a += g, this.transition(!0), this.panning = !0, this._trigger("start", t, i), i && 2 === i.length ? (r = this._getDistance(i), h = +v[0], c = this._getMiddle(i), s = function(t) {
                t.preventDefault();
                var e = f._getMiddle(i = t.touches),
                    n = f._getDistance(i) - r;
                f.zoom(n * (d.increment / 100) + h, {
                    focal: e,
                    matrix: v,
                    animate: !1
                }), f.pan(+v[4] + e.clientX - c.clientX, +v[5] + e.clientY - c.clientY, $), c = e
            }) : (l = t.pageX, m = t.pageY, s = function(t) {
                t.preventDefault(), f.pan(_ + t.pageX - l, y + t.pageY - m, $)
            }), e(u).off(g).on(o, s).on(a, function(t) {
                t.preventDefault(), e(this).off(g), f.panning = !1, t.type = "panzoomend", f._trigger(t, v, !n(v, b))
            })
        }
    }, e.Panzoom = a, e.fn.panzoom = function(t) {
        var n, i, s, o;
        return "string" == typeof t ? (o = [], i = f.call(arguments, 1), this.each(function() {
            n = e.data(this, m), n ? "_" !== t.charAt(0) && "function" == typeof(s = n[t]) && void 0 !== (s = s.apply(n, i)) && o.push(s) : o.push(void 0)
        }), o.length ? 1 === o.length ? o[0] : o : this) : this.each(function() {
            new a(this, t)
        })
    }, a
});