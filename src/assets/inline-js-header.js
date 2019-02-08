!function ( t, o ) {
    "use strict";
    t.wp = t.wp || {}, t.wp.hooks = t.wp.hooks || new function () {
        function t( t, o, i, n )
        {
            var e, r, p;
            if (a[t][o] ) { if (i ) { if (e = a[t][o], n ) { for ( p = e.length; p--; ) {(r = e[p]).callback === i && r.context === n && e.splice(p, 1); } } else { for ( p = e.length; p--; ) { e[p].callback === i && e.splice(p, 1); } } } else { a[t][o] = []
            }
            }
        }

        function o( t, o, i, n, e )
        {
            var r = { callback: i, priority: n, context: e }, p = a[t][o];
            p ? (p.push(r), p = function ( t ) {
                for ( var o, i, n, e = 1, a = t.length; e < a; e++ ) {
                    for ( o = t[e], i = e; (n = t[i - 1]) && n.priority > o.priority; ) { t[i] = t[i - 1], --i;
                    }
                    t[i] = o
                }
                return t
            }( p )) : p = [r], a[t][o] = p
        }

        function i( t, o, i )
        {
            var n, e, r = a[t][o];
            if (!r ) { return "filters" === t && i[0];
            }
            if (e = r.length, "filters" === t ) { for ( n = 0; n < e; n++ ) { i[0] = r[n].callback.apply(r[n].context, i); } } else { for ( n = 0; n < e; n++ ) { r[n].callback.apply(r[n].context, i);
            }
            }
            return "filters" !== t || i[0]
        }

        var n = Array.prototype.slice, e = {
            removeFilter: function ( o, i ) {
                return "string" == typeof o && t("filters", o, i), e
            }, applyFilters: function () {
                var t = n.call(arguments), o = t.shift();
                return "string" == typeof o ? i("filters", o, t) : e
            }, addFilter: function ( t, i, n, a ) {
                return "string" == typeof t && "function" == typeof i && o("filters", t, i, n = parseInt(n || 10, 10), a), e
            }, removeAction: function ( o, i ) {
                return "string" == typeof o && t("actions", o, i), e
            }, doAction: function () {
                var t = n.call(arguments), o = t.shift();
                return "string" == typeof o && i("actions", o, t), e
            }, addAction: function ( t, i, n, a ) {
                return "string" == typeof t && "function" == typeof i && o("actions", t, i, n = parseInt(n || 10, 10), a), e
            }
        }, a = { actions: {}, filters: {} };
        return e
    }
}( window ), jQuery(document).ready(
    function ( t ) {
            var o;
            wp.hooks.addAction("wpopPreInit", p), wp.hooks.addAction("wpopInit", r, 5), wp.hooks.addAction("wpopFooterScripts", c), wp.hooks.addAction("wpopInit", l), wp.hooks.addAction("wpopInit", f), wp.hooks.addAction("wpopInit", e, 100), wp.hooks.addAction("wpopSectionNav", n), wp.hooks.addAction("wpopPwdClear", d), wp.hooks.addAction("wpopImgUpload", u), wp.hooks.addAction("wpopImgRemove", w), wp.hooks.addAction("wpopSubmit", a), wp.hooks.doAction("wpopPreInit");

            var i = wp.template("wpop-media-stats");

        function n( o, i )
        {
            i.preventDefault();
            var n = t(t(o).attr("href")).addClass("active"),
            e = t(t(o).attr("href") + "-nav").addClass("active wp-ui-primary opn");
            return window.location.hash = t(o).attr("href"), window.scrollTo(0, 0), t(n).siblings().removeClass("active"), t(e).siblings().removeClass("active wp-ui-primary opn"), !1
        }

        function e()
        {
            t("#panel-loader-positioning-wrap").fadeOut(345)
        }

        function a()
        {
            t("#panel-loader-positioning-wrap").fadeIn(345)
        }

        function r()
        {
            (hash = window.location.hash) ? t(hash + "-nav a").trigger("click") : t("#wpopNav li:first a").trigger("click")
        }

        function p()
        {
            t("html, body").animate({ scrollTop: 0 })
        }

        function c()
        {
            t('[data-part="color"]').iris(
                {
                    width: 215, hide: !1, border: !1, create: function () {
                         "" !== t(this).attr("value") && s(t(this).attr("name"), t(this).attr("value"), new Color(t(this).attr("value")).getMaxContrastColor())
                    }, change: function ( o, i ) {
                        s(t(this).attr("name"), i.color.toString(), new Color(i.color.toString()).getMaxContrastColor())
                    }
                } 
            )
        }

        function l()
        {
            t("[data-select]").selectize(
                {
                    allowEmptyOption: !1,
                    placeholder: t(this).attr("data-placeholder")
                } 
            ), t("[data-multiselect]").selectize({ plugins: ["restore_on_backspace", "remove_button", "drag_drop", "optgroup_columns"] })
        }

        function s( o, i, n )
        {
            t("#" + o).css("background-color", i).css("color", n)
        }

        function d( o, i )
        {
            i.preventDefault(), t(o).prev().val(null)
        }

        function f()
        {
            t('[data-part="media"]').each(
                function () {
                    if ("" !== t(this).attr("value") ) {
                        var o = t(this).closest(".wpop-option");
                        wp.media.attachment(t(this).attr("value")).fetch().then(
                            function ( t ) {
                                o.find(".img-remove").after(i(t))
                            } 
                        )
                    }
                } 
            )
        }

        function u( n, e )
        {
            e.preventDefault();
            var a = t(n).data();
            o || (o = wp.media.frames.wpModal || wp.media(
                {
                    title: a.title,
                    button: { text: a.button },
                    library: { type: "image" },
                    multiple: !1
                } 
            )).on(
                "select", function () {
                        var e = o.state().get("selection").first().toJSON();
                    if ("object" == typeof e ) {
                        console.log(e);
                        var a = t(n).closest(".wpop-option");
                        a.find('[type="hidden"]').val(e.id), a.find("img").attr("src", e.sizes.thumbnail.url).show(), t(n).attr("value", "Replace " + t(n).attr("data-media-label")), a.find(".img-remove").show().after(i(e))
                    }
                } 
            ), o.open()
        }

        function w( o, i )
        {
            if (i.preventDefault(), confirm("Remove " + t(o).attr("data-media-label") + "?") ) {
                var n = t(o).closest(".wpop-option"), e = n.find(".blank-img").html();
                n.find('[type="hidden"]').val(null), n.find("img").attr("src", e), n.find(".button-hero").val("Set Image"), n.find(".media-stats").remove(), t(o).hide()
            }
        }

            t("#wpopNav li a").click(
                function ( t ) {
                    wp.hooks.doAction("wpopSectionNav", this, t)
                } 
            ), wp.hooks.doAction("wpopInit"), t('input[type="submit"]').click(
                function ( t ) {
                    wp.hooks.doAction("wpopSubmit", this, t)
                } 
            ), t(".pwd-clear").click(
                function ( t ) {
                    wp.hooks.doAction("wpopPwdClear", this, t)
                } 
            ), t(".img-upload").on(
                "click", function ( t ) {
                    wp.hooks.doAction("wpopImgUpload", this, t)
                } 
            ), t(".img-remove").on(
                "click", function ( t ) {
                    wp.hooks.doAction("wpopImgRemove", this, t)
                } 
            )
    } 
);