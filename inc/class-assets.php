<?php

namespace WPOP\V_4_1;

class Assets {
	/**
	 * Inline Stylesheet (printed below header but above panel in <body>)
	 */
	public static function inline_css() {
		?>
		<style type="text/css">
			@-webkit-keyframes wp-core-spinner {
				from {
					-webkit-transform: rotate(0);
					transform: rotate(0)
				}
				to {
					-webkit-transform: rotate(360deg);
					transform: rotate(360deg)
				}
			}

			@keyframes wp-core-spinner {
				from {
					-webkit-transform: rotate(0);
					transform: rotate(0)
				}
				to {
					-webkit-transform: rotate(360deg);
					transform: rotate(360deg)
				}
			}

			.wpcore-spin {
				position: relative;
				width: 20px;
				height: 20px;
				border-radius: 20px;
				background: #A6A6A6;
				-webkit-animation: wp-core-spinner 1.04s linear infinite;
				animation: wp-core-spinner 1.04s linear infinite
			}

			.wpcore-spin:after {
				content: "";
				position: absolute;
				top: 2px;
				left: 50%;
				width: 4px;
				height: 4px;
				border-radius: 4px;
				margin-left: -2px;
				background: #fff
			}

			#panel-loader-positioning-wrap {
				background: #fff;
				display: flex;
				align-items: center;
				justify-content: center;
				height: 100%;
				min-height: 10vw;
				position: absolute !important;
				width: 99%;
				max-width: 1600px;
				z-index: 50
			}

			#panel-loader-box {
				max-width: 50%
			}

			#panel-loader-box .wpcore-spin {
				width: 60px;
				height: 60px;
				border-radius: 60px
			}

			#panel-loader-box .wpcore-spin:after {
				top: 6px;
				width: 12px;
				height: 12px;
				border-radius: 12px;
				margin-left: -6px
			}

			.onOffSwitch-inner, .onOffSwitch-switch {
				transition: all .5s cubic-bezier(1, 0, 0, 1)
			}

			.onOffSwitch {
				position: relative;
				width: 110px;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				margin-left: auto;
				margin-right: 12px
			}

			input.onOffSwitch-checkbox {
				display: none !important;
			}

			.onOffSwitch-label {
				display: block;
				overflow: hidden;
				cursor: pointer;
				border: 2px solid #EEE;
				border-radius: 28px
			}

			.onOffSwitch-inner {
				display: block;
				width: 200%;
				margin-left: -100%
			}

			.onOffSwitch-inner:after, .onOffSwitch-inner:before {
				display: block;
				float: left;
				width: 50%;
				height: 40px;
				padding: 0;
				line-height: 40px;
				font-size: 17px;
				font-family: Trebuchet, Arial, sans-serif;
				font-weight: 700;
				box-sizing: border-box
			}

			.onOffSwitch-inner:before {
				content: "ON";
				padding-left: 10px;
				background-color: #21759B;
				color: #FFF
			}

			.onOffSwitch-inner:after {
				content: "OFF";
				padding-right: 10px;
				background-color: #EEE;
				color: #BCBCBC;
				text-align: right
			}

			.onOffSwitch-switch {
				display: block;
				width: 28px;
				margin: 6px;
				background: #BCBCBC;
				position: absolute;
				top: 0;
				bottom: 0;
				right: 66px;
				border: 2px solid #EEE;
				border-radius: 20px
			}

			.pure-menu-link .part-count, .radio-wrap {
				float: right
			}

			.pure-menu-link .part-count {
				float: right;
				position: relative;
				top: -6px;
				padding: .33rem .66rem;
				border-radius: 50%;
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				background: #aaa;
				color: #222
			}

			.cb, .cb-wrap, .desc:after, .pwd-clear, .radio-wrap, .save-all, span.menu-icon, span.page-icon:before, span.spacer {
				position: relative
			}

			.onOffSwitch-checkbox:checked + .onOffSwitch-label .onOffSwitch-inner {
				margin-left: 0
			}

			.onOffSwitch-checkbox:checked + .onOffSwitch-label .onOffSwitch-switch {
				right: 0;
				background-color: #D54E21
			}

			.radio-wrap {
				top: -1rem
			}

			.cb, .save-all, .wpop-option.color .iris-picker {
				float: right;
				position: relative;
				top: -30px
			}

			.wpop-option .selectize-control.multi .selectize-input:after {
				content: 'Select one or more options...'
			}

			li.wpop-option.color input[type=text] {
				height: 50px
			}

			.wpop-option.media h4.label {
				margin-bottom: .33rem
			}

			.wpop-form {
				margin-bottom: 0
			}

			#wpop {
				max-width: 1600px;
				margin: 0 auto 0 0 !important
			}

			#wpopMain {
				background: #fff
			}

			#wpopOptNavUl {
				margin-top: 0
			}

			.wpop-options-menu {
				margin-bottom: 8em
			}

			#wpopContent {
				background: #F1F1F1;
				width: 100% !important;
				border-top: 1px solid #D8D8D8
			}

			.pure-g [class*=pure-u] {
				font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif
			}

			.pure-form select {
				min-width: 320px
			}

			.selectize-control {
				max-width: 98.5%
			}

			.pure-menu-disabled, .pure-menu-heading, .pure-menu-link {
				padding: 1.3em 2em
			}

			.pure-menu-active > .pure-menu-link, .pure-menu-link:focus, .pure-menu-link:hover {
				background: inherit
			}

			#wpopOptions header {
				overflow: hidden;
				max-height: 88px
			}

			#wpopNav li.pure-menu-item {
				height: 55px
			}

			#wpopNav p.submit input {
				width: 100%
			}

			#wpop {
				border: 1px solid #D8D8D8;
				background: #fff
			}

			.opn a.pure-menu-link {
				color: #fff !important
			}

			.opn a.pure-menu-link:focus {
				box-shadow: none;
				-webkit-box-shadow: none
			}

			#wpopContent .section {
				display: none;
				width: 100%
			}

			#wpopContent .section.active {
				display: inline-block
			}

			span.page-icon {
				margin: 0 1.5rem 0 0
			}

			span.menu-icon {
				left: -.5rem
			}

			span.page-icon:before {
				font-size: 2.5rem;
				top: -4px;
				right: 4px;
				color: #777
			}

			.clear {
				clear: both
			}

			.section {
				padding: 0 0 5px
			}

			.section h3 {
				margin: 0 0 10px;
				padding: 2rem 1.5rem
			}

			.section h4.label {
				margin: 0;
				display: table-cell;
				border: 1px solid #e9e9e9;
				background: #f1f1f1;
				padding: .33rem .66rem .5rem;
				font-weight: 500;
				font-size: 16px
			}

			.section ul li:nth-child(even) h4.label {
				background: #ddd
			}

			.section li.wpop-option {
				margin: 1rem 1rem 1.25rem
			}

			.twothirdfat {
				width: 66.6%
			}

			span.spacer {
				display: block;
				width: 100%;
				border: 0;
				height: 0;
				border-top: 1px solid rgba(0, 0, 0, .1);
				border-bottom: 1px solid rgba(255, 255, 255, .3)
			}

			li.even.option {
				background-color: #ccc
			}

			input[disabled=disabled] {
				background-color: #CCC
			}

			.cb {
				right: 20px
			}

			.card-wrap {
				width: 100%
			}

			.fullwidth {
				width: 100% !important;
				max-width: 100% !important
			}

			.wpop-head {
				background: #f1f1f1
			}

			.wpop-head > .inner {
				padding: 1rem 1.5rem 0
			}

			.save-all {
				top: -2.5rem
			}

			.desc {
				margin: .5rem 0 0 .25rem;
				font-weight: 300;
				font-size: 12px;
				line-height: 16px;
				color: #888
			}

			.desc:after {
				display: block;
				width: 98%;
				border-top: 1px solid rgba(0, 0, 0, .1);
				border-bottom: 1px solid rgba(255, 255, 255, .3)
			}

			.wpop-option input[type=email], .wpop-option input[type=number], .wpop-option input[type=password], .wpop-option input[type=range], .wpop-option input[type=text], .wpop-option input[type=url] {
				width: 90%
			}

			.wpop-option input[data-part=color] {
				width: 25%
			}

			li[data-part=markdown] {
				padding: 1rem
			}

			li[data-part=markdown] + span.spacer {
				display: none
			}

			li[data-part=markdown] p {
				margin: 0 !important
			}

			li[data-part=markdown] ol, li[data-part=markdown] p, li[data-part=markdown] ul {
				font-size: 1rem
			}

			[data-part=markdown] h1 {
				padding-top: 1.33rem;
				padding-bottom: .33rem
			}

			[data-part=markdown] h1:first-of-type {
				padding-top: .33rem;
				padding-bottom: .33rem
			}

			[data-part=markdown] h1,
			[data-part=markdown] h2,
			[data-part=markdown] h3,
			[data-part=markdown] h4,
			[data-part=markdown] h5,
			[data-part=markdown] h6 {
				padding-left: 0 !important
			}

			input[data-assigned] {
				width: 100% !important
			}

			.add-button {
				margin: 3em auto;
				display: block;
				width: 100%;
				text-align: center
			}

			.img-preview {
				max-width: 320px;
				display: block;
				margin: 0 0 1rem
			}

			.media-stats, .wpop-option .wp-editor-wrap {
				margin-top: .5rem
			}

			.img-remove {
				border: 2px solid #cd1713 !important;
				background: #f1f1f1 !important;
				color: #cd1713 !important;
				box-shadow: none;
				-webkit-box-shadow: none;
				margin-left: 1rem !important
			}

			.pwd-clear {
				margin-left: .5rem !important;
				top: 1px
			}

			.pure-form footer {
				background: #f1f1f1;
				border-top: 1px solid #D8D8D8
			}

			.pure-form footer div div > * {
				padding: 1rem .33rem
			}

			.wpop-option.color input {
				width: 50%
			}

			.cb-wrap {
				display: block;
				right: 1.33rem;
				max-width: 110px;
				margin-left: auto;
				top: -1.66rem
			}
		</style>
		<?php
	}

	/**
	 * Inline JavaScript above </head> close tag
	 */
	public static function inline_js_header() {
		?>
		<script type="text/javascript">
			!function( t, o ) {
				"use strict";
				t.wp = t.wp || {}, t.wp.hooks = t.wp.hooks || new function() {
					function t( t, o, i, n ) {
						var e, r, p;
						if ( a[t][o] ) if ( i ) if ( e = a[t][o], n ) for ( p = e.length; p--; ) (r = e[p]).callback === i && r.context === n && e.splice( p, 1 ); else for ( p = e.length; p--; ) e[p].callback === i && e.splice( p, 1 ); else a[t][o] = []
					}

					function o( t, o, i, n, e ) {
						var r = { callback: i, priority: n, context: e }, p = a[t][o];
						p ? (p.push( r ), p = function( t ) {
							for ( var o, i, n, e = 1, a = t.length; e < a; e++ ) {
								for ( o = t[e], i = e; (n = t[i - 1]) && n.priority > o.priority; ) t[i] = t[i - 1], --i;
								t[i] = o
							}
							return t
						}( p )) : p = [r], a[t][o] = p
					}

					function i( t, o, i ) {
						var n, e, r = a[t][o];
						if ( !r ) return "filters" === t && i[0];
						if ( e = r.length, "filters" === t ) for ( n = 0; n < e; n++ ) i[0] = r[n].callback.apply( r[n].context, i ); else for ( n = 0; n < e; n++ ) r[n].callback.apply( r[n].context, i );
						return "filters" !== t || i[0]
					}

					var n = Array.prototype.slice, e = {
						removeFilter: function( o, i ) {
							return "string" == typeof o && t( "filters", o, i ), e
						}, applyFilters: function() {
							var t = n.call( arguments ), o = t.shift();
							return "string" == typeof o ? i( "filters", o, t ) : e
						}, addFilter: function( t, i, n, a ) {
							return "string" == typeof t && "function" == typeof i && o( "filters", t, i, n = parseInt( n || 10, 10 ), a ), e
						}, removeAction: function( o, i ) {
							return "string" == typeof o && t( "actions", o, i ), e
						}, doAction: function() {
							var t = n.call( arguments ), o = t.shift();
							return "string" == typeof o && i( "actions", o, t ), e
						}, addAction: function( t, i, n, a ) {
							return "string" == typeof t && "function" == typeof i && o( "actions", t, i, n = parseInt( n || 10, 10 ), a ), e
						}
					}, a = { actions: {}, filters: {} };
					return e
				}
			}( window ), jQuery( document ).ready( function( t ) {
				var o;
				wp.hooks.addAction( "wpopPreInit", p ), wp.hooks.addAction( "wpopInit", r, 5 ), wp.hooks.addAction( "wpopFooterScripts", c ), wp.hooks.addAction( "wpopInit", l ), wp.hooks.addAction( "wpopInit", f ), wp.hooks.addAction( "wpopInit", e, 100 ), wp.hooks.addAction( "wpopSectionNav", n ), wp.hooks.addAction( "wpopPwdClear", d ), wp.hooks.addAction( "wpopImgUpload", u ), wp.hooks.addAction( "wpopImgRemove", w ), wp.hooks.addAction( "wpopSubmit", a ), wp.hooks.doAction( "wpopPreInit" );

				var i = wp.template( "wpop-media-stats" );

				function n( o, i ) {
					i.preventDefault();
					var n = t( t( o ).attr( "href" ) ).addClass( "active" ),
						e = t( t( o ).attr( "href" ) + "-nav" ).addClass( "active wp-ui-primary opn" );
					return window.location.hash = t( o ).attr( "href" ), window.scrollTo( 0, 0 ), t( n ).siblings().removeClass( "active" ), t( e ).siblings().removeClass( "active wp-ui-primary opn" ), !1
				}

				function e() {
					t( "#panel-loader-positioning-wrap" ).fadeOut( 345 )
				}

				function a() {
					t( "#panel-loader-positioning-wrap" ).fadeIn( 345 )
				}

				function r() {
					(hash = window.location.hash) ? t( hash + "-nav a" ).trigger( "click" ) : t( "#wpopNav li:first a" ).trigger( "click" )
				}

				function p() {
					t( "html, body" ).animate( { scrollTop: 0 } )
				}

				function c() {
					t( '[data-part="color"]' ).iris( {
						width: 215, hide: !1, border: !1, create: function() {
							"" !== t( this ).attr( "value" ) && s( t( this ).attr( "name" ), t( this ).attr( "value" ), new Color( t( this ).attr( "value" ) ).getMaxContrastColor() )
						}, change: function( o, i ) {
							s( t( this ).attr( "name" ), i.color.toString(), new Color( i.color.toString() ).getMaxContrastColor() )
						}
					} )
				}

				function l() {
					t( "[data-select]" ).selectize( {
						allowEmptyOption: !1,
						placeholder: t( this ).attr( "data-placeholder" )
					} ), t( "[data-multiselect]" ).selectize( { plugins: ["restore_on_backspace", "remove_button", "drag_drop", "optgroup_columns"] } )
				}

				function s( o, i, n ) {
					t( "#" + o ).css( "background-color", i ).css( "color", n )
				}

				function d( o, i ) {
					i.preventDefault(), t( o ).prev().val( null )
				}

				function f() {
					t( '[data-part="media"]' ).each( function() {
						if ( "" !== t( this ).attr( "value" ) ) {
							var o = t( this ).closest( ".wpop-option" );
							wp.media.attachment( t( this ).attr( "value" ) ).fetch().then( function( t ) {
								o.find( ".img-remove" ).after( i( t ) )
							} )
						}
					} )
				}

				function u( n, e ) {
					e.preventDefault();
					var a = t( n ).data();
					o || (o = wp.media.frames.wpModal || wp.media( {
						title: a.title,
						button: { text: a.button },
						library: { type: "image" },
						multiple: !1
					} )).on( "select", function() {
						var e = o.state().get( "selection" ).first().toJSON();
						if ( "object" == typeof e ) {
							console.log( e );
							var a = t( n ).closest( ".wpop-option" );
							a.find( '[type="hidden"]' ).val( e.id ), a.find( "img" ).attr( "src", e.sizes.thumbnail.url ).show(), t( n ).attr( "value", "Replace " + t( n ).attr( "data-media-label" ) ), a.find( ".img-remove" ).show().after( i( e ) )
						}
					} ), o.open()
				}

				function w( o, i ) {
					if ( i.preventDefault(), confirm( "Remove " + t( o ).attr( "data-media-label" ) + "?" ) ) {
						var n = t( o ).closest( ".wpop-option" ), e = n.find( ".blank-img" ).html();
						n.find( '[type="hidden"]' ).val( null ), n.find( "img" ).attr( "src", e ), n.find( ".button-hero" ).val( "Set Image" ), n.find( ".media-stats" ).remove(), t( o ).hide()
					}
				}

				t( "#wpopNav li a" ).click( function( t ) {
					wp.hooks.doAction( "wpopSectionNav", this, t )
				} ), wp.hooks.doAction( "wpopInit" ), t( 'input[type="submit"]' ).click( function( t ) {
					wp.hooks.doAction( "wpopSubmit", this, t )
				} ), t( ".pwd-clear" ).click( function( t ) {
					wp.hooks.doAction( "wpopPwdClear", this, t )
				} ), t( ".img-upload" ).on( "click", function( t ) {
					wp.hooks.doAction( "wpopImgUpload", this, t )
				} ), t( ".img-remove" ).on( "click", function( t ) {
					wp.hooks.doAction( "wpopImgRemove", this, t )
				} )
			} );
		</script>
		<?php
	}

	/**
	 * Inline JavaScript above </body> close tag
	 */
	public static function inline_js_footer() {
		?>
		<script type="text/html" id="tmpl-wpop-media-stats">
			<div class="pure-g media-stats">
				<div class="pure-u-1 pure-u-sm-18-24">
					<table class="widefat striped">
						<thead>
						<tr>
							<td colspan="2"><span class="dashicons dashicons-format-image"></span>
								<a href="{{ data.url }}">{{ data.filename }}</a>
								<a href="{{ data.editLink }}" class="button" style="float:right;">Edit Image</a>
							</td>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>uploaded</td>
							<td>{{ data.dateFormatted }}</td>
						</tr>
						<tr>
							<td>orientation</td>
							<td>{{ data.orientation }}</td>
						</tr>
						<tr>
							<td>size</td>
							<td>{{ data.width }}x{{ data.height }} {{ data.filesizeHumanReadable }}</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="pure-u-sm-1-24"></div>
				<div class="pure-u-1 pure-u-sm-5-24">
					<img src="{{ data.sizes.thumbnail.url }}" class="img-preview"/>
				</div>
			</div>
		</script>
		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) {
				wp.hooks.doAction( 'wpopFooterScripts' );
			} );
		</script>
		<?php
	}
}
