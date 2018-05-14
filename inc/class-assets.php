<?php
/**
 * Assets
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_4_1;

/**
 * Class Assets
 */
class Assets {
	/**
	 * Pure v1.0.0
	 * Copyright 2013 Yahoo!
	 *
	 * @license BSD License.
	 * @see https://github.com/yahoo/pure/blob/master/LICENSE.md
	 *
	 * normalize.css v^3.0 | MIT License | git.io/normalize
	 * Copyright (c) Nicolas Gallagher and Jonathan Neal
	 */
	public static function yahoo_purecss() {
		?>
		.pure-button:focus,a:active,a:hover{outline:0}.pure-table,table{border-collapse:collapse;border-spacing:0}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}abbr[title]{border-bottom:1px dotted}b,optgroup,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}pre,textarea{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}.pure-button,input{line-height:normal}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;box-sizing:content-box}.pure-button,.pure-form input:not([type]),.pure-menu{box-sizing:border-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend,td,th{padding:0}legend{border:0}.hidden,[hidden]{display:none!important}.pure-img{max-width:100%;height:auto;display:block}.pure-g{letter-spacing:-.31em;text-rendering:optimizespeed;font-family:FreeSans,Arimo,"Droid Sans",Helvetica,Arial,sans-serif;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-flow:row wrap;-ms-flex-flow:row wrap;flex-flow:row wrap;-webkit-align-content:flex-start;-ms-flex-line-pack:start;align-content:flex-start}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){table .pure-g{display:block}}.opera-only :-o-prefocus,.pure-g{word-spacing:-.43em}.pure-u,.pure-u-1,.pure-u-1-1,.pure-u-1-12,.pure-u-1-2,.pure-u-1-24,.pure-u-1-3,.pure-u-1-4,.pure-u-1-5,.pure-u-1-6,.pure-u-1-8,.pure-u-10-24,.pure-u-11-12,.pure-u-11-24,.pure-u-12-24,.pure-u-13-24,.pure-u-14-24,.pure-u-15-24,.pure-u-16-24,.pure-u-17-24,.pure-u-18-24,.pure-u-19-24,.pure-u-2-24,.pure-u-2-3,.pure-u-2-5,.pure-u-20-24,.pure-u-21-24,.pure-u-22-24,.pure-u-23-24,.pure-u-24-24,.pure-u-3-24,.pure-u-3-4,.pure-u-3-5,.pure-u-3-8,.pure-u-4-24,.pure-u-4-5,.pure-u-5-12,.pure-u-5-24,.pure-u-5-5,.pure-u-5-6,.pure-u-5-8,.pure-u-6-24,.pure-u-7-12,.pure-u-7-24,.pure-u-7-8,.pure-u-8-24,.pure-u-9-24{letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto;display:inline-block;zoom:1}.pure-g [class*=pure-u]{font-family:sans-serif}.pure-u-1-24{width:4.1667%}.pure-u-1-12,.pure-u-2-24{width:8.3333%}.pure-u-1-8,.pure-u-3-24{width:12.5%}.pure-u-1-6,.pure-u-4-24{width:16.6667%}.pure-u-1-5{width:20%}.pure-u-5-24{width:20.8333%}.pure-u-1-4,.pure-u-6-24{width:25%}.pure-u-7-24{width:29.1667%}.pure-u-1-3,.pure-u-8-24{width:33.3333%}.pure-u-3-8,.pure-u-9-24{width:37.5%}.pure-u-2-5{width:40%}.pure-u-10-24,.pure-u-5-12{width:41.6667%}.pure-u-11-24{width:45.8333%}.pure-u-1-2,.pure-u-12-24{width:50%}.pure-u-13-24{width:54.1667%}.pure-u-14-24,.pure-u-7-12{width:58.3333%}.pure-u-3-5{width:60%}.pure-u-15-24,.pure-u-5-8{width:62.5%}.pure-u-16-24,.pure-u-2-3{width:66.6667%}.pure-u-17-24{width:70.8333%}.pure-u-18-24,.pure-u-3-4{width:75%}.pure-u-19-24{width:79.1667%}.pure-u-4-5{width:80%}.pure-u-20-24,.pure-u-5-6{width:83.3333%}.pure-u-21-24,.pure-u-7-8{width:87.5%}.pure-u-11-12,.pure-u-22-24{width:91.6667%}.pure-u-23-24{width:95.8333%}.pure-u-1,.pure-u-1-1,.pure-u-24-24,.pure-u-5-5{width:100%}.pure-button{display:inline-block;zoom:1;white-space:nowrap;vertical-align:middle;text-align:center;cursor:pointer;-webkit-user-drag:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.pure-button::-moz-focus-inner{padding:0;border:0}.pure-button-group{letter-spacing:-.31em;text-rendering:optimizespeed}.opera-only :-o-prefocus,.pure-button-group{word-spacing:-.43em}.pure-button{font-family:inherit;font-size:100%;padding:.5em 1em;color:#444;color:rgba(0,0,0,.8);border:1px solid #999;border:transparent;background-color:#E6E6E6;text-decoration:none;border-radius:2px}.pure-button-hover,.pure-button:focus,.pure-button:hover{filter:alpha(opacity=90);background-image:-webkit-linear-gradient(transparent,rgba(0,0,0,.05) 40%,rgba(0,0,0,.1));background-image:linear-gradient(transparent,rgba(0,0,0,.05) 40%,rgba(0,0,0,.1))}.pure-button-active,.pure-button:active{box-shadow:0 0 0 1px rgba(0,0,0,.15) inset,0 0 6px rgba(0,0,0,.2) inset;border-color:#000\9}.pure-button-disabled,.pure-button-disabled:active,.pure-button-disabled:focus,.pure-button-disabled:hover,.pure-button[disabled]{border:none;background-image:none;filter:alpha(opacity=40);opacity:.4;cursor:not-allowed;box-shadow:none;pointer-events:none}.pure-button-hidden{display:none}.pure-button-primary,.pure-button-selected,a.pure-button-primary,a.pure-button-selected{background-color:#0078e7;color:#fff}.pure-button-group .pure-button{letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto;margin:0;border-radius:0;border-right:1px solid #111;border-right:1px solid rgba(0,0,0,.2)}.pure-button-group .pure-button:first-child{border-top-left-radius:2px;border-bottom-left-radius:2px}.pure-button-group .pure-button:last-child{border-top-right-radius:2px;border-bottom-right-radius:2px;border-right:none}.pure-form input[type=password],.pure-form input[type=email],.pure-form input[type=url],.pure-form input[type=date],.pure-form input[type=month],.pure-form input[type=time],.pure-form input[type=datetime],.pure-form input[type=datetime-local],.pure-form input[type=week],.pure-form input[type=tel],.pure-form input[type=color],.pure-form input[type=number],.pure-form input[type=search],.pure-form input[type=text],.pure-form select,.pure-form textarea{padding:.5em .6em;display:inline-block;border:1px solid #ccc;box-shadow:inset 0 1px 3px #ddd;border-radius:4px;vertical-align:middle;box-sizing:border-box}.pure-form input:not([type]){padding:.5em .6em;display:inline-block;border:1px solid #ccc;box-shadow:inset 0 1px 3px #ddd;border-radius:4px}.pure-form input[type=color]{padding:.2em .5em}.pure-form input:not([type]):focus,.pure-form input[type=password]:focus,.pure-form input[type=email]:focus,.pure-form input[type=url]:focus,.pure-form input[type=date]:focus,.pure-form input[type=month]:focus,.pure-form input[type=time]:focus,.pure-form input[type=datetime]:focus,.pure-form input[type=datetime-local]:focus,.pure-form input[type=week]:focus,.pure-form input[type=tel]:focus,.pure-form input[type=color]:focus,.pure-form input[type=number]:focus,.pure-form input[type=search]:focus,.pure-form input[type=text]:focus,.pure-form select:focus,.pure-form textarea:focus{outline:0;border-color:#129FEA}.pure-form input[type=file]:focus,.pure-form input[type=checkbox]:focus,.pure-form input[type=radio]:focus{outline:#129FEA auto 1px}.pure-form .pure-checkbox,.pure-form .pure-radio{margin:.5em 0;display:block}.pure-form input:not([type])[disabled],.pure-form input[type=password][disabled],.pure-form input[type=email][disabled],.pure-form input[type=url][disabled],.pure-form input[type=date][disabled],.pure-form input[type=month][disabled],.pure-form input[type=time][disabled],.pure-form input[type=datetime][disabled],.pure-form input[type=datetime-local][disabled],.pure-form input[type=week][disabled],.pure-form input[type=tel][disabled],.pure-form input[type=color][disabled],.pure-form input[type=number][disabled],.pure-form input[type=search][disabled],.pure-form input[type=text][disabled],.pure-form select[disabled],.pure-form textarea[disabled]{cursor:not-allowed;background-color:#eaeded;color:#cad2d3}.pure-form input[readonly],.pure-form select[readonly],.pure-form textarea[readonly]{background-color:#eee;color:#777;border-color:#ccc}.pure-form input:focus:invalid,.pure-form select:focus:invalid,.pure-form textarea:focus:invalid{color:#b94a48;border-color:#e9322d}.pure-form input[type=file]:focus:invalid:focus,.pure-form input[type=checkbox]:focus:invalid:focus,.pure-form input[type=radio]:focus:invalid:focus{outline-color:#e9322d}.pure-form select{height:2.25em;border:1px solid #ccc;background-color:#fff}.pure-form select[multiple]{height:auto}.pure-form label{margin:.5em 0 .2em}.pure-form fieldset{margin:0;padding:.35em 0 .75em;border:0}.pure-form legend{display:block;width:100%;padding:.3em 0;margin-bottom:.3em;color:#333;border-bottom:1px solid #e5e5e5}.pure-form-stacked input:not([type]),.pure-form-stacked input[type=password],.pure-form-stacked input[type=email],.pure-form-stacked input[type=url],.pure-form-stacked input[type=date],.pure-form-stacked input[type=month],.pure-form-stacked input[type=time],.pure-form-stacked input[type=datetime],.pure-form-stacked input[type=datetime-local],.pure-form-stacked input[type=week],.pure-form-stacked input[type=tel],.pure-form-stacked input[type=color],.pure-form-stacked input[type=file],.pure-form-stacked input[type=number],.pure-form-stacked input[type=search],.pure-form-stacked input[type=text],.pure-form-stacked label,.pure-form-stacked select,.pure-form-stacked textarea{display:block;margin:.25em 0}.pure-form-aligned .pure-help-inline,.pure-form-aligned input,.pure-form-aligned select,.pure-form-aligned textarea,.pure-form-message-inline{display:inline-block;vertical-align:middle}.pure-form-aligned textarea{vertical-align:top}.pure-form-aligned .pure-control-group{margin-bottom:.5em}.pure-form-aligned .pure-control-group label{text-align:right;display:inline-block;vertical-align:middle;width:10em;margin:0 1em 0 0}.pure-form-aligned .pure-controls{margin:1.5em 0 0 11em}.pure-form .pure-input-rounded,.pure-form input.pure-input-rounded{border-radius:2em;padding:.5em 1em}.pure-form .pure-group fieldset{margin-bottom:10px}.pure-form .pure-group input,.pure-form .pure-group textarea{display:block;padding:10px;margin:0 0 -1px;border-radius:0;position:relative;top:-1px}.pure-form .pure-group input:focus,.pure-form .pure-group textarea:focus{z-index:3}.pure-form .pure-group input:first-child,.pure-form .pure-group textarea:first-child{top:1px;border-radius:4px 4px 0 0;margin:0}.pure-form .pure-group input:first-child:last-child,.pure-form .pure-group textarea:first-child:last-child{top:1px;border-radius:4px;margin:0}.pure-form .pure-group input:last-child,.pure-form .pure-group textarea:last-child{top:-2px;border-radius:0 0 4px 4px;margin:0}.pure-form .pure-group button{margin:.35em 0}.pure-form .pure-input-1{width:100%}.pure-form .pure-input-3-4{width:75%}.pure-form .pure-input-2-3{width:66%}.pure-form .pure-input-1-2{width:50%}.pure-form .pure-input-1-3{width:33%}.pure-form .pure-input-1-4{width:25%}.pure-form .pure-help-inline,.pure-form-message-inline{display:inline-block;padding-left:.3em;color:#666;vertical-align:middle;font-size:.875em}.pure-form-message{display:block;color:#666;font-size:.875em}@media only screen and (max-width :480px){.pure-form button[type=submit]{margin:.7em 0 0}.pure-form input:not([type]),.pure-form input[type=password],.pure-form input[type=email],.pure-form input[type=url],.pure-form input[type=date],.pure-form input[type=month],.pure-form input[type=time],.pure-form input[type=datetime],.pure-form input[type=datetime-local],.pure-form input[type=week],.pure-form input[type=tel],.pure-form input[type=color],.pure-form input[type=number],.pure-form input[type=search],.pure-form input[type=text],.pure-form label{margin-bottom:.3em;display:block}.pure-group input:not([type]),.pure-group input[type=password],.pure-group input[type=email],.pure-group input[type=url],.pure-group input[type=date],.pure-group input[type=month],.pure-group input[type=time],.pure-group input[type=datetime],.pure-group input[type=datetime-local],.pure-group input[type=week],.pure-group input[type=tel],.pure-group input[type=color],.pure-group input[type=number],.pure-group input[type=search],.pure-group input[type=text]{margin-bottom:0}.pure-form-aligned .pure-control-group label{margin-bottom:.3em;text-align:left;display:block;width:100%}.pure-form-aligned .pure-controls{margin:1.5em 0 0}.pure-form .pure-help-inline,.pure-form-message,.pure-form-message-inline{display:block;font-size:.75em;padding:.2em 0 .8em}}.pure-menu-fixed{position:fixed;left:0;top:0;z-index:3}.pure-menu-item,.pure-menu-list{position:relative}.pure-menu-list{list-style:none;margin:0;padding:0}.pure-menu-item{padding:0;margin:0;height:100%}.pure-menu-heading,.pure-menu-link{display:block;text-decoration:none;white-space:nowrap}.pure-menu-horizontal{width:100%;white-space:nowrap}.pure-menu-horizontal .pure-menu-list{display:inline-block}.pure-menu-horizontal .pure-menu-heading,.pure-menu-horizontal .pure-menu-item,.pure-menu-horizontal .pure-menu-separator{display:inline-block;zoom:1;vertical-align:middle}.pure-menu-item .pure-menu-item{display:block}.pure-menu-children{display:none;position:absolute;left:100%;top:0;margin:0;padding:0;z-index:3}.pure-menu-horizontal .pure-menu-children{left:0;top:auto;width:inherit}.pure-menu-active>.pure-menu-children,.pure-menu-allow-hover:hover>.pure-menu-children{display:block;position:absolute}.pure-menu-has-children>.pure-menu-link:after{padding-left:.5em;content:"\25B8";font-size:small}.pure-menu-horizontal .pure-menu-has-children>.pure-menu-link:after{content:"\25BE"}.pure-menu-scrollable{overflow-y:scroll;overflow-x:hidden}.pure-menu-scrollable .pure-menu-list{display:block}.pure-menu-horizontal.pure-menu-scrollable .pure-menu-list{display:inline-block}.pure-menu-horizontal.pure-menu-scrollable{white-space:nowrap;overflow-y:hidden;overflow-x:auto;-ms-overflow-style:none;-webkit-overflow-scrolling:touch;padding:.5em 0}.pure-menu-horizontal.pure-menu-scrollable::-webkit-scrollbar{display:none}.pure-menu-horizontal .pure-menu-children .pure-menu-separator,.pure-menu-separator{background-color:#ccc;height:1px;margin:.3em 0}.pure-menu-horizontal .pure-menu-separator{width:1px;height:1.3em;margin:0 .3em}.pure-menu-horizontal .pure-menu-children .pure-menu-separator{display:block;width:auto}.pure-menu-heading{text-transform:uppercase;color:#565d64}.pure-menu-link{color:#777}.pure-menu-children{background-color:#fff}.pure-menu-disabled,.pure-menu-heading,.pure-menu-link{padding:.5em 1em}.pure-menu-disabled{opacity:.5}.pure-menu-disabled .pure-menu-link:hover{background-color:transparent}.pure-menu-active>.pure-menu-link,.pure-menu-link:focus,.pure-menu-link:hover{background-color:#eee}.pure-menu-selected .pure-menu-link,.pure-menu-selected .pure-menu-link:visited{color:#000}.pure-table{empty-cells:show;border:1px solid #cbcbcb}.pure-table caption{color:#000;font:italic 85%/1 arial,sans-serif;padding:1em 0;text-align:center}.pure-table td,.pure-table th{border-left:1px solid #cbcbcb;border-width:0 0 0 1px;font-size:inherit;margin:0;overflow:visible;padding:.5em 1em}.pure-table td:first-child,.pure-table th:first-child{border-left-width:0}.pure-table thead{background-color:#e0e0e0;color:#000;text-align:left;vertical-align:bottom}.pure-table td{background-color:transparent}.pure-table-odd td,.pure-table-striped tr:nth-child(2n-1) td{background-color:#f2f2f2}.pure-table-bordered td{border-bottom:1px solid #cbcbcb}.pure-table-bordered tbody>tr:last-child>td{border-bottom-width:0}.pure-table-horizontal td,.pure-table-horizontal th{border-width:0 0 1px;border-bottom:1px solid #cbcbcb}.pure-table-horizontal tbody>tr:last-child>td{border-bottom-width:0}
		<?php
	}

	/**
	 * Pure v1.0.0
	 * Copyright 2013 Yahoo!
	 *
	 * @license BSD License.
	 * @see https://github.com/yahoo/pure/blob/master/LICENSE.md
	 */
	public static function yahoo_purecss_responsive_grid() {
		?>
		@media screen and (min-width:35.5em){.pure-u-sm-1,.pure-u-sm-1-1,.pure-u-sm-1-12,.pure-u-sm-1-2,.pure-u-sm-1-24,.pure-u-sm-1-3,.pure-u-sm-1-4,.pure-u-sm-1-5,.pure-u-sm-1-6,.pure-u-sm-1-8,.pure-u-sm-10-24,.pure-u-sm-11-12,.pure-u-sm-11-24,.pure-u-sm-12-24,.pure-u-sm-13-24,.pure-u-sm-14-24,.pure-u-sm-15-24,.pure-u-sm-16-24,.pure-u-sm-17-24,.pure-u-sm-18-24,.pure-u-sm-19-24,.pure-u-sm-2-24,.pure-u-sm-2-3,.pure-u-sm-2-5,.pure-u-sm-20-24,.pure-u-sm-21-24,.pure-u-sm-22-24,.pure-u-sm-23-24,.pure-u-sm-24-24,.pure-u-sm-3-24,.pure-u-sm-3-4,.pure-u-sm-3-5,.pure-u-sm-3-8,.pure-u-sm-4-24,.pure-u-sm-4-5,.pure-u-sm-5-12,.pure-u-sm-5-24,.pure-u-sm-5-5,.pure-u-sm-5-6,.pure-u-sm-5-8,.pure-u-sm-6-24,.pure-u-sm-7-12,.pure-u-sm-7-24,.pure-u-sm-7-8,.pure-u-sm-8-24,.pure-u-sm-9-24{display:inline-block;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-sm-1-24{width:4.1667%}.pure-u-sm-1-12,.pure-u-sm-2-24{width:8.3333%}.pure-u-sm-1-8,.pure-u-sm-3-24{width:12.5%}.pure-u-sm-1-6,.pure-u-sm-4-24{width:16.6667%}.pure-u-sm-1-5{width:20%}.pure-u-sm-5-24{width:20.8333%}.pure-u-sm-1-4,.pure-u-sm-6-24{width:25%}.pure-u-sm-7-24{width:29.1667%}.pure-u-sm-1-3,.pure-u-sm-8-24{width:33.3333%}.pure-u-sm-3-8,.pure-u-sm-9-24{width:37.5%}.pure-u-sm-2-5{width:40%}.pure-u-sm-10-24,.pure-u-sm-5-12{width:41.6667%}.pure-u-sm-11-24{width:45.8333%}.pure-u-sm-1-2,.pure-u-sm-12-24{width:50%}.pure-u-sm-13-24{width:54.1667%}.pure-u-sm-14-24,.pure-u-sm-7-12{width:58.3333%}.pure-u-sm-3-5{width:60%}.pure-u-sm-15-24,.pure-u-sm-5-8{width:62.5%}.pure-u-sm-16-24,.pure-u-sm-2-3{width:66.6667%}.pure-u-sm-17-24{width:70.8333%}.pure-u-sm-18-24,.pure-u-sm-3-4{width:75%}.pure-u-sm-19-24{width:79.1667%}.pure-u-sm-4-5{width:80%}.pure-u-sm-20-24,.pure-u-sm-5-6{width:83.3333%}.pure-u-sm-21-24,.pure-u-sm-7-8{width:87.5%}.pure-u-sm-11-12,.pure-u-sm-22-24{width:91.6667%}.pure-u-sm-23-24{width:95.8333%}.pure-u-sm-1,.pure-u-sm-1-1,.pure-u-sm-24-24,.pure-u-sm-5-5{width:100%}}@media screen and (min-width:48em){.pure-u-md-1,.pure-u-md-1-1,.pure-u-md-1-12,.pure-u-md-1-2,.pure-u-md-1-24,.pure-u-md-1-3,.pure-u-md-1-4,.pure-u-md-1-5,.pure-u-md-1-6,.pure-u-md-1-8,.pure-u-md-10-24,.pure-u-md-11-12,.pure-u-md-11-24,.pure-u-md-12-24,.pure-u-md-13-24,.pure-u-md-14-24,.pure-u-md-15-24,.pure-u-md-16-24,.pure-u-md-17-24,.pure-u-md-18-24,.pure-u-md-19-24,.pure-u-md-2-24,.pure-u-md-2-3,.pure-u-md-2-5,.pure-u-md-20-24,.pure-u-md-21-24,.pure-u-md-22-24,.pure-u-md-23-24,.pure-u-md-24-24,.pure-u-md-3-24,.pure-u-md-3-4,.pure-u-md-3-5,.pure-u-md-3-8,.pure-u-md-4-24,.pure-u-md-4-5,.pure-u-md-5-12,.pure-u-md-5-24,.pure-u-md-5-5,.pure-u-md-5-6,.pure-u-md-5-8,.pure-u-md-6-24,.pure-u-md-7-12,.pure-u-md-7-24,.pure-u-md-7-8,.pure-u-md-8-24,.pure-u-md-9-24{display:inline-block;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-md-1-24{width:4.1667%}.pure-u-md-1-12,.pure-u-md-2-24{width:8.3333%}.pure-u-md-1-8,.pure-u-md-3-24{width:12.5%}.pure-u-md-1-6,.pure-u-md-4-24{width:16.6667%}.pure-u-md-1-5{width:20%}.pure-u-md-5-24{width:20.8333%}.pure-u-md-1-4,.pure-u-md-6-24{width:25%}.pure-u-md-7-24{width:29.1667%}.pure-u-md-1-3,.pure-u-md-8-24{width:33.3333%}.pure-u-md-3-8,.pure-u-md-9-24{width:37.5%}.pure-u-md-2-5{width:40%}.pure-u-md-10-24,.pure-u-md-5-12{width:41.6667%}.pure-u-md-11-24{width:45.8333%}.pure-u-md-1-2,.pure-u-md-12-24{width:50%}.pure-u-md-13-24{width:54.1667%}.pure-u-md-14-24,.pure-u-md-7-12{width:58.3333%}.pure-u-md-3-5{width:60%}.pure-u-md-15-24,.pure-u-md-5-8{width:62.5%}.pure-u-md-16-24,.pure-u-md-2-3{width:66.6667%}.pure-u-md-17-24{width:70.8333%}.pure-u-md-18-24,.pure-u-md-3-4{width:75%}.pure-u-md-19-24{width:79.1667%}.pure-u-md-4-5{width:80%}.pure-u-md-20-24,.pure-u-md-5-6{width:83.3333%}.pure-u-md-21-24,.pure-u-md-7-8{width:87.5%}.pure-u-md-11-12,.pure-u-md-22-24{width:91.6667%}.pure-u-md-23-24{width:95.8333%}.pure-u-md-1,.pure-u-md-1-1,.pure-u-md-24-24,.pure-u-md-5-5{width:100%}}@media screen and (min-width:64em){.pure-u-lg-1,.pure-u-lg-1-1,.pure-u-lg-1-12,.pure-u-lg-1-2,.pure-u-lg-1-24,.pure-u-lg-1-3,.pure-u-lg-1-4,.pure-u-lg-1-5,.pure-u-lg-1-6,.pure-u-lg-1-8,.pure-u-lg-10-24,.pure-u-lg-11-12,.pure-u-lg-11-24,.pure-u-lg-12-24,.pure-u-lg-13-24,.pure-u-lg-14-24,.pure-u-lg-15-24,.pure-u-lg-16-24,.pure-u-lg-17-24,.pure-u-lg-18-24,.pure-u-lg-19-24,.pure-u-lg-2-24,.pure-u-lg-2-3,.pure-u-lg-2-5,.pure-u-lg-20-24,.pure-u-lg-21-24,.pure-u-lg-22-24,.pure-u-lg-23-24,.pure-u-lg-24-24,.pure-u-lg-3-24,.pure-u-lg-3-4,.pure-u-lg-3-5,.pure-u-lg-3-8,.pure-u-lg-4-24,.pure-u-lg-4-5,.pure-u-lg-5-12,.pure-u-lg-5-24,.pure-u-lg-5-5,.pure-u-lg-5-6,.pure-u-lg-5-8,.pure-u-lg-6-24,.pure-u-lg-7-12,.pure-u-lg-7-24,.pure-u-lg-7-8,.pure-u-lg-8-24,.pure-u-lg-9-24{display:inline-block;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-lg-1-24{width:4.1667%}.pure-u-lg-1-12,.pure-u-lg-2-24{width:8.3333%}.pure-u-lg-1-8,.pure-u-lg-3-24{width:12.5%}.pure-u-lg-1-6,.pure-u-lg-4-24{width:16.6667%}.pure-u-lg-1-5{width:20%}.pure-u-lg-5-24{width:20.8333%}.pure-u-lg-1-4,.pure-u-lg-6-24{width:25%}.pure-u-lg-7-24{width:29.1667%}.pure-u-lg-1-3,.pure-u-lg-8-24{width:33.3333%}.pure-u-lg-3-8,.pure-u-lg-9-24{width:37.5%}.pure-u-lg-2-5{width:40%}.pure-u-lg-10-24,.pure-u-lg-5-12{width:41.6667%}.pure-u-lg-11-24{width:45.8333%}.pure-u-lg-1-2,.pure-u-lg-12-24{width:50%}.pure-u-lg-13-24{width:54.1667%}.pure-u-lg-14-24,.pure-u-lg-7-12{width:58.3333%}.pure-u-lg-3-5{width:60%}.pure-u-lg-15-24,.pure-u-lg-5-8{width:62.5%}.pure-u-lg-16-24,.pure-u-lg-2-3{width:66.6667%}.pure-u-lg-17-24{width:70.8333%}.pure-u-lg-18-24,.pure-u-lg-3-4{width:75%}.pure-u-lg-19-24{width:79.1667%}.pure-u-lg-4-5{width:80%}.pure-u-lg-20-24,.pure-u-lg-5-6{width:83.3333%}.pure-u-lg-21-24,.pure-u-lg-7-8{width:87.5%}.pure-u-lg-11-12,.pure-u-lg-22-24{width:91.6667%}.pure-u-lg-23-24{width:95.8333%}.pure-u-lg-1,.pure-u-lg-1-1,.pure-u-lg-24-24,.pure-u-lg-5-5{width:100%}}@media screen and (min-width:80em){.pure-u-xl-1,.pure-u-xl-1-1,.pure-u-xl-1-12,.pure-u-xl-1-2,.pure-u-xl-1-24,.pure-u-xl-1-3,.pure-u-xl-1-4,.pure-u-xl-1-5,.pure-u-xl-1-6,.pure-u-xl-1-8,.pure-u-xl-10-24,.pure-u-xl-11-12,.pure-u-xl-11-24,.pure-u-xl-12-24,.pure-u-xl-13-24,.pure-u-xl-14-24,.pure-u-xl-15-24,.pure-u-xl-16-24,.pure-u-xl-17-24,.pure-u-xl-18-24,.pure-u-xl-19-24,.pure-u-xl-2-24,.pure-u-xl-2-3,.pure-u-xl-2-5,.pure-u-xl-20-24,.pure-u-xl-21-24,.pure-u-xl-22-24,.pure-u-xl-23-24,.pure-u-xl-24-24,.pure-u-xl-3-24,.pure-u-xl-3-4,.pure-u-xl-3-5,.pure-u-xl-3-8,.pure-u-xl-4-24,.pure-u-xl-4-5,.pure-u-xl-5-12,.pure-u-xl-5-24,.pure-u-xl-5-5,.pure-u-xl-5-6,.pure-u-xl-5-8,.pure-u-xl-6-24,.pure-u-xl-7-12,.pure-u-xl-7-24,.pure-u-xl-7-8,.pure-u-xl-8-24,.pure-u-xl-9-24{display:inline-block;zoom:1;letter-spacing:normal;word-spacing:normal;vertical-align:top;text-rendering:auto}.pure-u-xl-1-24{width:4.1667%}.pure-u-xl-1-12,.pure-u-xl-2-24{width:8.3333%}.pure-u-xl-1-8,.pure-u-xl-3-24{width:12.5%}.pure-u-xl-1-6,.pure-u-xl-4-24{width:16.6667%}.pure-u-xl-1-5{width:20%}.pure-u-xl-5-24{width:20.8333%}.pure-u-xl-1-4,.pure-u-xl-6-24{width:25%}.pure-u-xl-7-24{width:29.1667%}.pure-u-xl-1-3,.pure-u-xl-8-24{width:33.3333%}.pure-u-xl-3-8,.pure-u-xl-9-24{width:37.5%}.pure-u-xl-2-5{width:40%}.pure-u-xl-10-24,.pure-u-xl-5-12{width:41.6667%}.pure-u-xl-11-24{width:45.8333%}.pure-u-xl-1-2,.pure-u-xl-12-24{width:50%}.pure-u-xl-13-24{width:54.1667%}.pure-u-xl-14-24,.pure-u-xl-7-12{width:58.3333%}.pure-u-xl-3-5{width:60%}.pure-u-xl-15-24,.pure-u-xl-5-8{width:62.5%}.pure-u-xl-16-24,.pure-u-xl-2-3{width:66.6667%}.pure-u-xl-17-24{width:70.8333%}.pure-u-xl-18-24,.pure-u-xl-3-4{width:75%}.pure-u-xl-19-24{width:79.1667%}.pure-u-xl-4-5{width:80%}.pure-u-xl-20-24,.pure-u-xl-5-6{width:83.3333%}.pure-u-xl-21-24,.pure-u-xl-7-8{width:87.5%}.pure-u-xl-11-12,.pure-u-xl-22-24{width:91.6667%}.pure-u-xl-23-24{width:95.8333%}.pure-u-xl-1,.pure-u-xl-1-1,.pure-u-xl-24-24,.pure-u-xl-5-5{width:100%}}
<?php
	}

	/**
	 * Selectize Plugin
	 *
	 * @see selectize.js Version 0.12.4 | https://github.com/selectize/selectize.js | Apache License (v2).
	 */
	public static function selectize_js() {
		?>
		!function(a,b){"function"==typeof define&&define.amd?define("sifter",b):"object"==typeof exports?module.exports=b():a.Sifter=b()}(this,function(){var a=function(a,b){this.items=a,this.settings=b||{diacritics:!0}};a.prototype.tokenize=function(a){if(a=e(String(a||"").toLowerCase()),!a||!a.length)return[];var b,c,d,g,i=[],j=a.split(/ +/);for(b=0,c=j.length;b<c;b++){if(d=f(j[b]),this.settings.diacritics)for(g in h)h.hasOwnProperty(g)&&(d=d.replace(new RegExp(g,"g"),h[g]));i.push({string:j[b],regex:new RegExp(d,"i")})}return i},a.prototype.iterator=function(a,b){var c;c=g(a)?Array.prototype.forEach||function(a){for(var b=0,c=this.length;b<c;b++)a(this[b],b,this)}:function(a){for(var b in this)this.hasOwnProperty(b)&&a(this[b],b,this)},c.apply(a,[b])},a.prototype.getScoreFunction=function(a,b){var c,e,f,g,h;c=this,a=c.prepareSearch(a,b),f=a.tokens,e=a.options.fields,g=f.length,h=a.options.nesting;var i=function(a,b){var c,d;return a?(a=String(a||""),d=a.search(b.regex),d===-1?0:(c=b.string.length/a.length,0===d&&(c+=.5),c)):0},j=function(){var a=e.length;return a?1===a?function(a,b){return i(d(b,e[0],h),a)}:function(b,c){for(var f=0,g=0;f<a;f++)g+=i(d(c,e[f],h),b);return g/a}:function(){return 0}}();return g?1===g?function(a){return j(f[0],a)}:"and"===a.options.conjunction?function(a){for(var b,c=0,d=0;c<g;c++){if(b=j(f[c],a),b<=0)return 0;d+=b}return d/g}:function(a){for(var b=0,c=0;b<g;b++)c+=j(f[b],a);return c/g}:function(){return 0}},a.prototype.getSortFunction=function(a,c){var e,f,g,h,i,j,k,l,m,n,o;if(g=this,a=g.prepareSearch(a,c),o=!a.query&&c.sort_empty||c.sort,m=function(a,b){return"$score"===a?b.score:d(g.items[b.id],a,c.nesting)},i=[],o)for(e=0,f=o.length;e<f;e++)(a.query||"$score"!==o[e].field)&&i.push(o[e]);if(a.query){for(n=!0,e=0,f=i.length;e<f;e++)if("$score"===i[e].field){n=!1;break}n&&i.unshift({field:"$score",direction:"desc"})}else for(e=0,f=i.length;e<f;e++)if("$score"===i[e].field){i.splice(e,1);break}for(l=[],e=0,f=i.length;e<f;e++)l.push("desc"===i[e].direction?-1:1);return j=i.length,j?1===j?(h=i[0].field,k=l[0],function(a,c){return k*b(m(h,a),m(h,c))}):function(a,c){var d,e,f;for(d=0;d<j;d++)if(f=i[d].field,e=l[d]*b(m(f,a),m(f,c)))return e;return 0}:null},a.prototype.prepareSearch=function(a,b){if("object"==typeof a)return a;b=c({},b);var d=b.fields,e=b.sort,f=b.sort_empty;return d&&!g(d)&&(b.fields=[d]),e&&!g(e)&&(b.sort=[e]),f&&!g(f)&&(b.sort_empty=[f]),{options:b,query:String(a||"").toLowerCase(),tokens:this.tokenize(a),total:0,items:[]}},a.prototype.search=function(a,b){var c,d,e,f,g=this;return d=this.prepareSearch(a,b),b=d.options,a=d.query,f=b.score||g.getScoreFunction(d),a.length?g.iterator(g.items,function(a,e){c=f(a),(b.filter===!1||c>0)&&d.items.push({score:c,id:e})}):g.iterator(g.items,function(a,b){d.items.push({score:1,id:b})}),e=g.getSortFunction(d,b),e&&d.items.sort(e),d.total=d.items.length,"number"==typeof b.limit&&(d.items=d.items.slice(0,b.limit)),d};var b=function(a,b){return"number"==typeof a&&"number"==typeof b?a>b?1:a<b?-1:0:(a=i(String(a||"")),b=i(String(b||"")),a>b?1:b>a?-1:0)},c=function(a,b){var c,d,e,f;for(c=1,d=arguments.length;c<d;c++)if(f=arguments[c])for(e in f)f.hasOwnProperty(e)&&(a[e]=f[e]);return a},d=function(a,b,c){if(a&&b){if(!c)return a[b];for(var d=b.split(".");d.length&&(a=a[d.shift()]););return a}},e=function(a){return(a+"").replace(/^\s+|\s+$|/g,"")},f=function(a){return(a+"").replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1")},g=Array.isArray||"undefined"!=typeof $&&$.isArray||function(a){return"[object Array]"===Object.prototype.toString.call(a)},h={a:"[aḀḁĂăÂâǍǎȺⱥȦȧẠạÄäÀàÁáĀāÃãÅåąĄÃąĄ]",b:"[b␢βΒB฿𐌁ᛒ]",c:"[cĆćĈĉČčĊċC̄c̄ÇçḈḉȻȼƇƈɕᴄＣｃ]",d:"[dĎďḊḋḐḑḌḍḒḓḎḏĐđD̦d̦ƉɖƊɗƋƌᵭᶁᶑȡᴅＤｄð]",e:"[eÉéÈèÊêḘḙĚěĔĕẼẽḚḛẺẻĖėËëĒēȨȩĘęᶒɆɇȄȅẾếỀềỄễỂểḜḝḖḗḔḕȆȇẸẹỆệⱸᴇＥｅɘǝƏƐε]",f:"[fƑƒḞḟ]",g:"[gɢ₲ǤǥĜĝĞğĢģƓɠĠġ]",h:"[hĤĥĦħḨḩẖẖḤḥḢḣɦʰǶƕ]",i:"[iÍíÌìĬĭÎîǏǐÏïḮḯĨĩĮįĪīỈỉȈȉȊȋỊịḬḭƗɨɨ̆ᵻᶖİiIıɪＩｉ]",j:"[jȷĴĵɈɉʝɟʲ]",k:"[kƘƙꝀꝁḰḱǨǩḲḳḴḵκϰ₭]",l:"[lŁłĽľĻļĹĺḶḷḸḹḼḽḺḻĿŀȽƚⱠⱡⱢɫɬᶅɭȴʟＬｌ]",n:"[nŃńǸǹŇňÑñṄṅŅņṆṇṊṋṈṉN̈n̈ƝɲȠƞᵰᶇɳȵɴＮｎŊŋ]",o:"[oØøÖöÓóÒòÔôǑǒŐőŎŏȮȯỌọƟɵƠơỎỏŌōÕõǪǫȌȍՕօ]",p:"[pṔṕṖṗⱣᵽƤƥᵱ]",q:"[qꝖꝗʠɊɋꝘꝙq̃]",r:"[rŔŕɌɍŘřŖŗṘṙȐȑȒȓṚṛⱤɽ]",s:"[sŚśṠṡṢṣꞨꞩŜŝŠšŞşȘșS̈s̈]",t:"[tŤťṪṫŢţṬṭƮʈȚțṰṱṮṯƬƭ]",u:"[uŬŭɄʉỤụÜüÚúÙùÛûǓǔŰűŬŭƯưỦủŪūŨũŲųȔȕ∪]",v:"[vṼṽṾṿƲʋꝞꝟⱱʋ]",w:"[wẂẃẀẁŴŵẄẅẆẇẈẉ]",x:"[xẌẍẊẋχ]",y:"[yÝýỲỳŶŷŸÿỸỹẎẏỴỵɎɏƳƴ]",z:"[zŹźẐẑŽžŻżẒẓẔẕƵƶ]"},i=function(){var a,b,c,d,e="",f={};for(c in h)if(h.hasOwnProperty(c))for(d=h[c].substring(2,h[c].length-1),e+=d,a=0,b=d.length;a<b;a++)f[d.charAt(a)]=c;var g=new RegExp("["+e+"]","g");return function(a){return a.replace(g,function(a){return f[a]}).toLowerCase()}}();return a}),function(a,b){"function"==typeof define&&define.amd?define("microplugin",b):"object"==typeof exports?module.exports=b():a.MicroPlugin=b()}(this,function(){var a={};a.mixin=function(a){a.plugins={},a.prototype.initializePlugins=function(a){var c,d,e,f=this,g=[];if(f.plugins={names:[],settings:{},requested:{},loaded:{}},b.isArray(a))for(c=0,d=a.length;c<d;c++)"string"==typeof a[c]?g.push(a[c]):(f.plugins.settings[a[c].name]=a[c].options,g.push(a[c].name));else if(a)for(e in a)a.hasOwnProperty(e)&&(f.plugins.settings[e]=a[e],g.push(e));for(;g.length;)f.require(g.shift())},a.prototype.loadPlugin=function(b){var c=this,d=c.plugins,e=a.plugins[b];if(!a.plugins.hasOwnProperty(b))throw new Error('Unable to find "'+b+'" plugin');d.requested[b]=!0,d.loaded[b]=e.fn.apply(c,[c.plugins.settings[b]||{}]),d.names.push(b)},a.prototype.require=function(a){var b=this,c=b.plugins;if(!b.plugins.loaded.hasOwnProperty(a)){if(c.requested[a])throw new Error('Plugin has circular dependency ("'+a+'")');b.loadPlugin(a)}return c.loaded[a]},a.define=function(b,c){a.plugins[b]={name:b,fn:c}}};var b={isArray:Array.isArray||function(a){return"[object Array]"===Object.prototype.toString.call(a)}};return a}),function(a,b){"function"==typeof define&&define.amd?define("selectize",["jquery","sifter","microplugin"],b):"object"==typeof exports?module.exports=b(require("jquery"),require("sifter"),require("microplugin")):a.Selectize=b(a.jQuery,a.Sifter,a.MicroPlugin)}(this,function(a,b,c){"use strict";var d=function(a,b){if("string"!=typeof b||b.length){var c="string"==typeof b?new RegExp(b,"i"):b,d=function(a){var b=0;if(3===a.nodeType){var e=a.data.search(c);if(e>=0&&a.data.length>0){var f=a.data.match(c),g=document.createElement("span");g.className="highlight";var h=a.splitText(e),i=(h.splitText(f[0].length),h.cloneNode(!0));g.appendChild(i),h.parentNode.replaceChild(g,h),b=1}}else if(1===a.nodeType&&a.childNodes&&!/(script|style)/i.test(a.tagName))for(var j=0;j<a.childNodes.length;++j)j+=d(a.childNodes[j]);return b};return a.each(function(){d(this)})}};a.fn.removeHighlight=function(){return this.find("span.highlight").each(function(){this.parentNode.firstChild.nodeName;var a=this.parentNode;a.replaceChild(this.firstChild,this),a.normalize()}).end()};var e=function(){};e.prototype={on:function(a,b){this._events=this._events||{},this._events[a]=this._events[a]||[],this._events[a].push(b)},off:function(a,b){var c=arguments.length;return 0===c?delete this._events:1===c?delete this._events[a]:(this._events=this._events||{},void(a in this._events!=!1&&this._events[a].splice(this._events[a].indexOf(b),1)))},trigger:function(a){if(this._events=this._events||{},a in this._events!=!1)for(var b=0;b<this._events[a].length;b++)this._events[a][b].apply(this,Array.prototype.slice.call(arguments,1))}},e.mixin=function(a){for(var b=["on","off","trigger"],c=0;c<b.length;c++)a.prototype[b[c]]=e.prototype[b[c]]};var f=/Mac/.test(navigator.userAgent),g=65,h=13,i=27,j=37,k=38,l=80,m=39,n=40,o=78,p=8,q=46,r=16,s=f?91:17,t=f?18:17,u=9,v=1,w=2,x=!/android/i.test(window.navigator.userAgent)&&!!document.createElement("input").validity,y=function(a){return"undefined"!=typeof a},z=function(a){return"undefined"==typeof a||null===a?null:"boolean"==typeof a?a?"1":"0":a+""},A=function(a){return(a+"").replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;")},B={};B.before=function(a,b,c){var d=a[b];a[b]=function(){return c.apply(a,arguments),d.apply(a,arguments)}},B.after=function(a,b,c){var d=a[b];a[b]=function(){var b=d.apply(a,arguments);return c.apply(a,arguments),b}};var C=function(a){var b=!1;return function(){b||(b=!0,a.apply(this,arguments))}},D=function(a,b){var c;return function(){var d=this,e=arguments;window.clearTimeout(c),c=window.setTimeout(function(){a.apply(d,e)},b)}},E=function(a,b,c){var d,e=a.trigger,f={};a.trigger=function(){var c=arguments[0];return b.indexOf(c)===-1?e.apply(a,arguments):void(f[c]=arguments)},c.apply(a,[]),a.trigger=e;for(d in f)f.hasOwnProperty(d)&&e.apply(a,f[d])},F=function(a,b,c,d){a.on(b,c,function(b){for(var c=b.target;c&&c.parentNode!==a[0];)c=c.parentNode;return b.currentTarget=c,d.apply(this,[b])})},G=function(a){var b={};if("selectionStart"in a)b.start=a.selectionStart,b.length=a.selectionEnd-b.start;else if(document.selection){a.focus();var c=document.selection.createRange(),d=document.selection.createRange().text.length;c.moveStart("character",-a.value.length),b.start=c.text.length-d,b.length=d}return b},H=function(a,b,c){var d,e,f={};if(c)for(d=0,e=c.length;d<e;d++)f[c[d]]=a.css(c[d]);else f=a.css();b.css(f)},I=function(b,c){if(!b)return 0;var d=a("<test>").css({position:"absolute",top:-99999,left:-99999,width:"auto",padding:0,whiteSpace:"pre"}).text(b).appendTo("body");H(c,d,["letterSpacing","fontSize","fontFamily","fontWeight","textTransform"]);var e=d.width();return d.remove(),e},J=function(a){var b=null,c=function(c,d){var e,f,g,h,i,j,k,l;c=c||window.event||{},d=d||{},c.metaKey||c.altKey||(d.force||a.data("grow")!==!1)&&(e=a.val(),c.type&&"keydown"===c.type.toLowerCase()&&(f=c.keyCode,g=f>=97&&f<=122||f>=65&&f<=90||f>=48&&f<=57||32===f,f===q||f===p?(l=G(a[0]),l.length?e=e.substring(0,l.start)+e.substring(l.start+l.length):f===p&&l.start?e=e.substring(0,l.start-1)+e.substring(l.start+1):f===q&&"undefined"!=typeof l.start&&(e=e.substring(0,l.start)+e.substring(l.start+1))):g&&(j=c.shiftKey,k=String.fromCharCode(c.keyCode),k=j?k.toUpperCase():k.toLowerCase(),e+=k)),h=a.attr("placeholder"),!e&&h&&(e=h),i=I(e,a)+4,i!==b&&(b=i,a.width(i),a.triggerHandler("resize")))};a.on("keydown keyup update blur",c),c()},K=function(a){var b=document.createElement("div");return b.appendChild(a.cloneNode(!0)),b.innerHTML},L=function(a,b){b||(b={});var c="Selectize";console.error(c+": "+a),b.explanation&&(console.group&&console.group(),console.error(b.explanation),console.group&&console.groupEnd())},M=function(c,d){var e,f,g,h,i=this;h=c[0],h.selectize=i;var j=window.getComputedStyle&&window.getComputedStyle(h,null);if(g=j?j.getPropertyValue("direction"):h.currentStyle&&h.currentStyle.direction,g=g||c.parents("[dir]:first").attr("dir")||"",a.extend(i,{order:0,settings:d,$input:c,tabIndex:c.attr("tabindex")||"",tagType:"select"===h.tagName.toLowerCase()?v:w,rtl:/rtl/i.test(g),eventNS:".selectize"+ ++M.count,highlightedValue:null,isOpen:!1,isDisabled:!1,isRequired:c.is("[required]"),isInvalid:!1,isLocked:!1,isFocused:!1,isInputHidden:!1,isSetup:!1,isShiftDown:!1,isCmdDown:!1,isCtrlDown:!1,ignoreFocus:!1,ignoreBlur:!1,ignoreHover:!1,hasOptions:!1,currentResults:null,lastValue:"",caretPos:0,loading:0,loadedSearches:{},$activeOption:null,$activeItems:[],optgroups:{},options:{},userOptions:{},items:[],renderCache:{},onSearchChange:null===d.loadThrottle?i.onSearchChange:D(i.onSearchChange,d.loadThrottle)}),i.sifter=new b(this.options,{diacritics:d.diacritics}),i.settings.options){for(e=0,f=i.settings.options.length;e<f;e++)i.registerOption(i.settings.options[e]);delete i.settings.options}if(i.settings.optgroups){for(e=0,f=i.settings.optgroups.length;e<f;e++)i.registerOptionGroup(i.settings.optgroups[e]);delete i.settings.optgroups}i.settings.mode=i.settings.mode||(1===i.settings.maxItems?"single":"multi"),"boolean"!=typeof i.settings.hideSelected&&(i.settings.hideSelected="multi"===i.settings.mode),i.initializePlugins(i.settings.plugins),i.setupCallbacks(),i.setupTemplates(),i.setup()};return e.mixin(M),"undefined"!=typeof c?c.mixin(M):L("Dependency MicroPlugin is missing",{explanation:'Make sure you either: (1) are using the "standalone" version of Selectize, or (2) require MicroPlugin before you load Selectize.'}),a.extend(M.prototype,{setup:function(){var b,c,d,e,g,h,i,j,k,l,m=this,n=m.settings,o=m.eventNS,p=a(window),q=a(document),u=m.$input;if(i=m.settings.mode,j=u.attr("class")||"",b=a("<div>").addClass(n.wrapperClass).addClass(j).addClass(i),c=a("<div>").addClass(n.inputClass).addClass("items").appendTo(b),d=a('<input type="text" autocomplete="off" />').appendTo(c).attr("tabindex",u.is(":disabled")?"-1":m.tabIndex),h=a(n.dropdownParent||b),e=a("<div>").addClass(n.dropdownClass).addClass(i).hide().appendTo(h),g=a("<!--suppress CheckDtdRefs -->
<div>").addClass(n.dropdownContentClass).appendTo(e),(l=u.attr("id"))&&(d.attr("id",l+"-selectized"),a("label[for='"+l+"']").attr("for",l+"-selectized")),m.settings.copyClassesToDropdown&&e.addClass(j),b.css({width:u[0].style.width}),m.plugins.names.length&&(k="plugin-"+m.plugins.names.join(" plugin-"),b.addClass(k),e.addClass(k)),(null===n.maxItems||n.maxItems>1)&&m.tagType===v&&u.attr("multiple","multiple"),m.settings.placeholder&&d.attr("placeholder",n.placeholder),!m.settings.splitOn&&m.settings.delimiter){var w=m.settings.delimiter.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");m.settings.splitOn=new RegExp("\\s*"+w+"+\\s*")}u.attr("autocorrect")&&d.attr("autocorrect",u.attr("autocorrect")),u.attr("autocapitalize")&&d.attr("autocapitalize",u.attr("autocapitalize")),m.$wrapper=b,m.$control=c,m.$control_input=d,m.$dropdown=e,m.$dropdown_content=g,e.on("mouseenter","[data-selectable]",function(){return m.onOptionHover.apply(m,arguments)}),e.on("mousedown click","[data-selectable]",function(){return m.onOptionSelect.apply(m,arguments)}),F(c,"mousedown","*:not(input)",function(){return m.onItemSelect.apply(m,arguments)}),J(d),c.on({mousedown:function(){return m.onMouseDown.apply(m,arguments)},click:function(){return m.onClick.apply(m,arguments)}}),d.on({mousedown:function(a){a.stopPropagation()},keydown:function(){return m.onKeyDown.apply(m,arguments)},keyup:function(){return m.onKeyUp.apply(m,arguments)},keypress:function(){return m.onKeyPress.apply(m,arguments)},resize:function(){m.positionDropdown.apply(m,[])},blur:function(){return m.onBlur.apply(m,arguments)},focus:function(){return m.ignoreBlur=!1,m.onFocus.apply(m,arguments)},paste:function(){return m.onPaste.apply(m,arguments)}}),q.on("keydown"+o,function(a){m.isCmdDown=a[f?"metaKey":"ctrlKey"],m.isCtrlDown=a[f?"altKey":"ctrlKey"],m.isShiftDown=a.shiftKey}),q.on("keyup"+o,function(a){a.keyCode===t&&(m.isCtrlDown=!1),a.keyCode===r&&(m.isShiftDown=!1),a.keyCode===s&&(m.isCmdDown=!1)}),q.on("mousedown"+o,function(a){if(m.isFocused){if(a.target===m.$dropdown[0]||a.target.parentNode===m.$dropdown[0])return!1;m.$control.has(a.target).length||a.target===m.$control[0]||m.blur(a.target)}}),p.on(["scroll"+o,"resize"+o].join(" "),function(){m.isOpen&&m.positionDropdown.apply(m,arguments)}),p.on("mousemove"+o,function(){m.ignoreHover=!1}),this.revertSettings={$children:u.children().detach(),tabindex:u.attr("tabindex")},u.attr("tabindex",-1).hide().after(m.$wrapper),a.isArray(n.items)&&(m.setValue(n.items),delete n.items),x&&u.on("invalid"+o,function(a){a.preventDefault(),m.isInvalid=!0,m.refreshState()}),m.updateOriginalInput(),m.refreshItems(),m.refreshState(),m.updatePlaceholder(),m.isSetup=!0,u.is(":disabled")&&m.disable(),m.on("change",this.onChange),u.data("selectize",m),u.addClass("selectized"),m.trigger("initialize"),n.preload===!0&&m.onSearchChange("")},setupTemplates:function(){var b=this,c=b.settings.labelField,d=b.settings.optgroupLabelField,e={optgroup:function(a){return'<div class="optgroup">'+a.html+"</div>"},optgroup_header:function(a,b){return'<div class="optgroup-header">'+b(a[d])+"</div>"},option:function(a,b){return'<div class="option">'+b(a[c])+"</div>"},item:function(a,b){return'<div class="item">'+b(a[c])+"</div>"},option_create:function(a,b){return'<div class="create">Add <strong>'+b(a.input)+"</strong>&hellip;</div>"}};b.settings.render=a.extend({},e,b.settings.render)},setupCallbacks:function(){var a,b,c={initialize:"onInitialize",change:"onChange",item_add:"onItemAdd",item_remove:"onItemRemove",clear:"onClear",option_add:"onOptionAdd",option_remove:"onOptionRemove",option_clear:"onOptionClear",optgroup_add:"onOptionGroupAdd",optgroup_remove:"onOptionGroupRemove",optgroup_clear:"onOptionGroupClear",dropdown_open:"onDropdownOpen",dropdown_close:"onDropdownClose",type:"onType",load:"onLoad",focus:"onFocus",blur:"onBlur"};for(a in c)c.hasOwnProperty(a)&&(b=this.settings[c[a]],b&&this.on(a,b))},onClick:function(a){var b=this;b.isFocused||(b.focus(),a.preventDefault())},onMouseDown:function(b){var c=this,d=b.isDefaultPrevented();a(b.target);if(c.isFocused){if(b.target!==c.$control_input[0])return"single"===c.settings.mode?c.isOpen?c.close():c.open():d||c.setActiveItem(null),!1}else d||window.setTimeout(function(){c.focus()},0)},onChange:function(){this.$input.trigger("change")},onPaste:function(b){var c=this;return c.isFull()||c.isInputHidden||c.isLocked?void b.preventDefault():void(c.settings.splitOn&&setTimeout(function(){var b=c.$control_input.val();if(b.match(c.settings.splitOn))for(var d=a.trim(b).split(c.settings.splitOn),e=0,f=d.length;e<f;e++)c.createItem(d[e])},0))},onKeyPress:function(a){if(this.isLocked)return a&&a.preventDefault();var b=String.fromCharCode(a.keyCode||a.which);return this.settings.create&&"multi"===this.settings.mode&&b===this.settings.delimiter?(this.createItem(),a.preventDefault(),!1):void 0},onKeyDown:function(a){var b=(a.target===this.$control_input[0],this);if(b.isLocked)return void(a.keyCode!==u&&a.preventDefault());switch(a.keyCode){case g:if(b.isCmdDown)return void b.selectAll();break;case i:return void(b.isOpen&&(a.preventDefault(),a.stopPropagation(),b.close()));case o:if(!a.ctrlKey||a.altKey)break;case n:if(!b.isOpen&&b.hasOptions)b.open();else if(b.$activeOption){b.ignoreHover=!0;var c=b.getAdjacentOption(b.$activeOption,1);c.length&&b.setActiveOption(c,!0,!0)}return void a.preventDefault();case l:if(!a.ctrlKey||a.altKey)break;case k:if(b.$activeOption){b.ignoreHover=!0;var d=b.getAdjacentOption(b.$activeOption,-1);d.length&&b.setActiveOption(d,!0,!0)}return void a.preventDefault();case h:return void(b.isOpen&&b.$activeOption&&(b.onOptionSelect({currentTarget:b.$activeOption}),a.preventDefault()));case j:return void b.advanceSelection(-1,a);case m:return void b.advanceSelection(1,a);case u:return b.settings.selectOnTab&&b.isOpen&&b.$activeOption&&(b.onOptionSelect({currentTarget:b.$activeOption}),b.isFull()||a.preventDefault()),void(b.settings.create&&b.createItem()&&a.preventDefault());case p:case q:return void b.deleteSelection(a)}return!b.isFull()&&!b.isInputHidden||(f?a.metaKey:a.ctrlKey)?void 0:void a.preventDefault()},onKeyUp:function(a){var b=this;if(b.isLocked)return a&&a.preventDefault();var c=b.$control_input.val()||"";b.lastValue!==c&&(b.lastValue=c,b.onSearchChange(c),b.refreshOptions(),b.trigger("type",c))},onSearchChange:function(a){var b=this,c=b.settings.load;c&&(b.loadedSearches.hasOwnProperty(a)||(b.loadedSearches[a]=!0,b.load(function(d){c.apply(b,[a,d])})))},onFocus:function(a){var b=this,c=b.isFocused;return b.isDisabled?(b.blur(),a&&a.preventDefault(),!1):void(b.ignoreFocus||(b.isFocused=!0,"focus"===b.settings.preload&&b.onSearchChange(""),c||b.trigger("focus"),b.$activeItems.length||(b.showInput(),b.setActiveItem(null),b.refreshOptions(!!b.settings.openOnFocus)),b.refreshState()))},onBlur:function(a,b){var c=this;if(c.isFocused&&(c.isFocused=!1,!c.ignoreFocus)){if(!c.ignoreBlur&&document.activeElement===c.$dropdown_content[0])return c.ignoreBlur=!0,void c.onFocus(a);var d=function(){c.close(),c.setTextboxValue(""),c.setActiveItem(null),c.setActiveOption(null),c.setCaret(c.items.length),c.refreshState(),b&&b.focus&&b.focus(),c.ignoreFocus=!1,c.trigger("blur")};c.ignoreFocus=!0,c.settings.create&&c.settings.createOnBlur?c.createItem(null,!1,d):d()}},onOptionHover:function(a){this.ignoreHover||this.setActiveOption(a.currentTarget,!1)},onOptionSelect:function(b){var c,d,e=this;b.preventDefault&&(b.preventDefault(),b.stopPropagation()),d=a(b.currentTarget),d.hasClass("create")?e.createItem(null,function(){e.settings.closeAfterSelect&&e.close()}):(c=d.attr("data-value"),"undefined"!=typeof c&&(e.lastQuery=null,e.setTextboxValue(""),e.addItem(c),e.settings.closeAfterSelect?e.close():!e.settings.hideSelected&&b.type&&/mouse/.test(b.type)&&e.setActiveOption(e.getOption(c))))},onItemSelect:function(a){var b=this;b.isLocked||"multi"===b.settings.mode&&(a.preventDefault(),b.setActiveItem(a.currentTarget,a))},load:function(a){var b=this,c=b.$wrapper.addClass(b.settings.loadingClass);b.loading++,a.apply(b,[function(a){b.loading=Math.max(b.loading-1,0),a&&a.length&&(b.addOption(a),b.refreshOptions(b.isFocused&&!b.isInputHidden)),b.loading||c.removeClass(b.settings.loadingClass),b.trigger("load",a)}])},setTextboxValue:function(a){var b=this.$control_input,c=b.val()!==a;c&&(b.val(a).triggerHandler("update"),this.lastValue=a)},getValue:function(){return this.tagType===v&&this.$input.attr("multiple")?this.items:this.items.join(this.settings.delimiter)},setValue:function(a,b){var c=b?[]:["change"];E(this,c,function(){this.clear(b),this.addItems(a,b)})},setActiveItem:function(b,c){var d,e,f,g,h,i,j,k,l=this;if("single"!==l.settings.mode){if(b=a(b),!b.length)return a(l.$activeItems).removeClass("active"),l.$activeItems=[],void(l.isFocused&&l.showInput());if(d=c&&c.type.toLowerCase(),"mousedown"===d&&l.isShiftDown&&l.$activeItems.length){for(k=l.$control.children(".active:last"),g=Array.prototype.indexOf.apply(l.$control[0].childNodes,[k[0]]),h=Array.prototype.indexOf.apply(l.$control[0].childNodes,[b[0]]),g>h&&(j=g,g=h,h=j),e=g;e<=h;e++)i=l.$control[0].childNodes[e],l.$activeItems.indexOf(i)===-1&&(a(i).addClass("active"),l.$activeItems.push(i));c.preventDefault()}else"mousedown"===d&&l.isCtrlDown||"keydown"===d&&this.isShiftDown?b.hasClass("active")?(f=l.$activeItems.indexOf(b[0]),l.$activeItems.splice(f,1),b.removeClass("active")):l.$activeItems.push(b.addClass("active")[0]):(a(l.$activeItems).removeClass("active"),l.$activeItems=[b.addClass("active")[0]]);l.hideInput(),this.isFocused||l.focus()}},setActiveOption:function(b,c,d){var e,f,g,h,i,j=this;j.$activeOption&&j.$activeOption.removeClass("active"),j.$activeOption=null,b=a(b),b.length&&(j.$activeOption=b.addClass("active"),!c&&y(c)||(e=j.$dropdown_content.height(),f=j.$activeOption.outerHeight(!0),c=j.$dropdown_content.scrollTop()||0,g=j.$activeOption.offset().top-j.$dropdown_content.offset().top+c,h=g,i=g-e+f,g+f>e+c?j.$dropdown_content.stop().animate({scrollTop:i},d?j.settings.scrollDuration:0):g<c&&j.$dropdown_content.stop().animate({scrollTop:h},d?j.settings.scrollDuration:0)))},selectAll:function(){var a=this;"single"!==a.settings.mode&&(a.$activeItems=Array.prototype.slice.apply(a.$control.children(":not(input)").addClass("active")),a.$activeItems.length&&(a.hideInput(),a.close()),a.focus())},hideInput:function(){var a=this;a.setTextboxValue(""),a.$control_input.css({opacity:0,position:"absolute",left:a.rtl?1e4:-1e4}),a.isInputHidden=!0},showInput:function(){this.$control_input.css({opacity:1,position:"relative",left:0}),this.isInputHidden=!1},focus:function(){var a=this;a.isDisabled||(a.ignoreFocus=!0,a.$control_input[0].focus(),window.setTimeout(function(){a.ignoreFocus=!1,a.onFocus()},0))},blur:function(a){this.$control_input[0].blur(),this.onBlur(null,a)},getScoreFunction:function(a){return this.sifter.getScoreFunction(a,this.getSearchOptions())},getSearchOptions:function(){var a=this.settings,b=a.sortField;return"string"==typeof b&&(b=[{field:b}]),{fields:a.searchField,conjunction:a.searchConjunction,sort:b}},search:function(b){var c,d,e,f=this,g=f.settings,h=this.getSearchOptions();if(g.score&&(e=f.settings.score.apply(this,[b]),"function"!=typeof e))throw new Error('Selectize "score" setting must be a function that returns a function');if(b!==f.lastQuery?(f.lastQuery=b,d=f.sifter.search(b,a.extend(h,{score:e})),f.currentResults=d):d=a.extend(!0,{},f.currentResults),g.hideSelected)for(c=d.items.length-1;c>=0;c--)f.items.indexOf(z(d.items[c].id))!==-1&&d.items.splice(c,1);return d},refreshOptions:function(b){var c,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s;"undefined"==typeof b&&(b=!0);var t=this,u=a.trim(t.$control_input.val()),v=t.search(u),w=t.$dropdown_content,x=t.$activeOption&&z(t.$activeOption.attr("data-value"));for(g=v.items.length,"number"==typeof t.settings.maxOptions&&(g=Math.min(g,t.settings.maxOptions)),h={},i=[],c=0;c<g;c++)for(j=t.options[v.items[c].id],k=t.render("option",j),l=j[t.settings.optgroupField]||"",m=a.isArray(l)?l:[l],e=0,f=m&&m.length;e<f;e++)l=m[e],t.optgroups.hasOwnProperty(l)||(l=""),h.hasOwnProperty(l)||(h[l]=document.createDocumentFragment(),i.push(l)),h[l].appendChild(k);for(this.settings.lockOptgroupOrder&&i.sort(function(a,b){var c=t.optgroups[a].$order||0,d=t.optgroups[b].$order||0;return c-d}),n=document.createDocumentFragment(),c=0,g=i.length;c<g;c++)l=i[c],t.optgroups.hasOwnProperty(l)&&h[l].childNodes.length?(o=document.createDocumentFragment(),o.appendChild(t.render("optgroup_header",t.optgroups[l])),o.appendChild(h[l]),n.appendChild(t.render("optgroup",a.extend({},t.optgroups[l],{html:K(o),dom:o})))):n.appendChild(h[l]);if(w.html(n),t.settings.highlight&&v.query.length&&v.tokens.length)for(w.removeHighlight(),c=0,g=v.tokens.length;c<g;c++)d(w,v.tokens[c].regex);if(!t.settings.hideSelected)for(c=0,g=t.items.length;c<g;c++)t.getOption(t.items[c]).addClass("selected");p=t.canCreate(u),p&&(w.prepend(t.render("option_create",{input:u})),s=a(w[0].childNodes[0])),t.hasOptions=v.items.length>0||p,t.hasOptions?(v.items.length>0?(r=x&&t.getOption(x),r&&r.length?q=r:"single"===t.settings.mode&&t.items.length&&(q=t.getOption(t.items[0])),q&&q.length||(q=s&&!t.settings.addPrecedence?t.getAdjacentOption(s,1):w.find("[data-selectable]:first"))):q=s,t.setActiveOption(q),b&&!t.isOpen&&t.open()):(t.setActiveOption(null),b&&t.isOpen&&t.close())},addOption:function(b){var c,d,e,f=this;if(a.isArray(b))for(c=0,d=b.length;c<d;c++)f.addOption(b[c]);else(e=f.registerOption(b))&&(f.userOptions[e]=!0,f.lastQuery=null,f.trigger("option_add",e,b))},registerOption:function(a){var b=z(a[this.settings.valueField]);return"undefined"!=typeof b&&null!==b&&!this.options.hasOwnProperty(b)&&(a.$order=a.$order||++this.order,this.options[b]=a,b)},registerOptionGroup:function(a){var b=z(a[this.settings.optgroupValueField]);return!!b&&(a.$order=a.$order||++this.order,this.optgroups[b]=a,b)},addOptionGroup:function(a,b){b[this.settings.optgroupValueField]=a,(a=this.registerOptionGroup(b))&&this.trigger("optgroup_add",a,b)},removeOptionGroup:function(a){this.optgroups.hasOwnProperty(a)&&(delete this.optgroups[a],this.renderCache={},this.trigger("optgroup_remove",a))},clearOptionGroups:function(){this.optgroups={},this.renderCache={},this.trigger("optgroup_clear")},updateOption:function(b,c){var d,e,f,g,h,i,j,k=this;if(b=z(b),f=z(c[k.settings.valueField]),null!==b&&k.options.hasOwnProperty(b)){if("string"!=typeof f)throw new Error("Value must be set in option data");j=k.options[b].$order,f!==b&&(delete k.options[b],g=k.items.indexOf(b),g!==-1&&k.items.splice(g,1,f)),c.$order=c.$order||j,k.options[f]=c,h=k.renderCache.item,i=k.renderCache.option,h&&(delete h[b],delete h[f]),i&&(delete i[b],delete i[f]),k.items.indexOf(f)!==-1&&(d=k.getItem(b),e=a(k.render("item",c)),d.hasClass("active")&&e.addClass("active"),d.replaceWith(e)),k.lastQuery=null,k.isOpen&&k.refreshOptions(!1)}},removeOption:function(a,b){var c=this;a=z(a);var d=c.renderCache.item,e=c.renderCache.option;d&&delete d[a],e&&delete e[a],delete c.userOptions[a],delete c.options[a],c.lastQuery=null,c.trigger("option_remove",a),c.removeItem(a,b)},clearOptions:function(){var a=this;a.loadedSearches={},a.userOptions={},a.renderCache={},a.options=a.sifter.items={},a.lastQuery=null,a.trigger("option_clear"),a.clear()},getOption:function(a){return this.getElementWithValue(a,this.$dropdown_content.find("[data-selectable]"))},getAdjacentOption:function(b,c){var d=this.$dropdown.find("[data-selectable]"),e=d.index(b)+c;return e>=0&&e<d.length?d.eq(e):a()},getElementWithValue:function(b,c){if(b=z(b),"undefined"!=typeof b&&null!==b)for(var d=0,e=c.length;d<e;d++)if(c[d].getAttribute("data-value")===b)return a(c[d]);return a()},getItem:function(a){return this.getElementWithValue(a,this.$control.children())},addItems:function(b,c){for(var d=a.isArray(b)?b:[b],e=0,f=d.length;e<f;e++)this.isPending=e<f-1,this.addItem(d[e],c)},addItem:function(b,c){var d=c?[]:["change"];E(this,d,function(){var d,e,f,g,h,i=this,j=i.settings.mode;return b=z(b),i.items.indexOf(b)!==-1?void("single"===j&&i.close()):void(i.options.hasOwnProperty(b)&&("single"===j&&i.clear(c),"multi"===j&&i.isFull()||(d=a(i.render("item",i.options[b])),h=i.isFull(),i.items.splice(i.caretPos,0,b),i.insertAtCaret(d),(!i.isPending||!h&&i.isFull())&&i.refreshState(),i.isSetup&&(f=i.$dropdown_content.find("[data-selectable]"),i.isPending||(e=i.getOption(b),g=i.getAdjacentOption(e,1).attr("data-value"),i.refreshOptions(i.isFocused&&"single"!==j),g&&i.setActiveOption(i.getOption(g))),!f.length||i.isFull()?i.close():i.positionDropdown(),i.updatePlaceholder(),i.trigger("item_add",b,d),i.updateOriginalInput({silent:c})))))})},removeItem:function(b,c){var d,e,f,g=this;d=b instanceof a?b:g.getItem(b),b=z(d.attr("data-value")),e=g.items.indexOf(b),e!==-1&&(d.remove(),d.hasClass("active")&&(f=g.$activeItems.indexOf(d[0]),g.$activeItems.splice(f,1)),g.items.splice(e,1),g.lastQuery=null,!g.settings.persist&&g.userOptions.hasOwnProperty(b)&&g.removeOption(b,c),e<g.caretPos&&g.setCaret(g.caretPos-1),g.refreshState(),g.updatePlaceholder(),g.updateOriginalInput({silent:c}),g.positionDropdown(),g.trigger("item_remove",b,d))},createItem:function(b,c){var d=this,e=d.caretPos;b=b||a.trim(d.$control_input.val()||"");var f=arguments[arguments.length-1];if("function"!=typeof f&&(f=function(){}),"boolean"!=typeof c&&(c=!0),!d.canCreate(b))return f(),!1;d.lock();var g="function"==typeof d.settings.create?this.settings.create:function(a){var b={};return b[d.settings.labelField]=a,b[d.settings.valueField]=a,b},h=C(function(a){if(d.unlock(),!a||"object"!=typeof a)return f();var b=z(a[d.settings.valueField]);return"string"!=typeof b?f():(d.setTextboxValue(""),d.addOption(a),d.setCaret(e),d.addItem(b),d.refreshOptions(c&&"single"!==d.settings.mode),void f(a))}),i=g.apply(this,[b,h]);return"undefined"!=typeof i&&h(i),!0},refreshItems:function(){this.lastQuery=null,this.isSetup&&this.addItem(this.items),this.refreshState(),this.updateOriginalInput()},refreshState:function(){this.refreshValidityState(),this.refreshClasses()},refreshValidityState:function(){if(!this.isRequired)return!1;var a=!this.items.length;this.isInvalid=a,this.$control_input.prop("required",a),this.$input.prop("required",!a)},refreshClasses:function(){var b=this,c=b.isFull(),d=b.isLocked;b.$wrapper.toggleClass("rtl",b.rtl),b.$control.toggleClass("focus",b.isFocused).toggleClass("disabled",b.isDisabled).toggleClass("required",b.isRequired).toggleClass("invalid",b.isInvalid).toggleClass("locked",d).toggleClass("full",c).toggleClass("not-full",!c).toggleClass("input-active",b.isFocused&&!b.isInputHidden).toggleClass("dropdown-active",b.isOpen).toggleClass("has-options",!a.isEmptyObject(b.options)).toggleClass("has-items",b.items.length>0),b.$control_input.data("grow",!c&&!d)},isFull:function(){return null!==this.settings.maxItems&&this.items.length>=this.settings.maxItems},updateOriginalInput:function(a){var b,c,d,e,f=this;if(a=a||{},f.tagType===v){for(d=[],b=0,c=f.items.length;b<c;b++)e=f.options[f.items[b]][f.settings.labelField]||"",d.push('<option value="'+A(f.items[b])+'" selected="selected">'+A(e)+"</option>");d.length||this.$input.attr("multiple")||d.push('<option value="" selected="selected"></option>'),
f.$input.html(d.join(""))}else f.$input.val(f.getValue()),f.$input.attr("value",f.$input.val());f.isSetup&&(a.silent||f.trigger("change",f.$input.val()))},updatePlaceholder:function(){if(this.settings.placeholder){var a=this.$control_input;this.items.length?a.removeAttr("placeholder"):a.attr("placeholder",this.settings.placeholder),a.triggerHandler("update",{force:!0})}},open:function(){var a=this;a.isLocked||a.isOpen||"multi"===a.settings.mode&&a.isFull()||(a.focus(),a.isOpen=!0,a.refreshState(),a.$dropdown.css({visibility:"hidden",display:"block"}),a.positionDropdown(),a.$dropdown.css({visibility:"visible"}),a.trigger("dropdown_open",a.$dropdown))},close:function(){var a=this,b=a.isOpen;"single"===a.settings.mode&&a.items.length&&(a.hideInput(),a.$control_input.blur()),a.isOpen=!1,a.$dropdown.hide(),a.setActiveOption(null),a.refreshState(),b&&a.trigger("dropdown_close",a.$dropdown)},positionDropdown:function(){var a=this.$control,b="body"===this.settings.dropdownParent?a.offset():a.position();b.top+=a.outerHeight(!0),this.$dropdown.css({width:a.outerWidth(),top:b.top,left:b.left})},clear:function(a){var b=this;b.items.length&&(b.$control.children(":not(input)").remove(),b.items=[],b.lastQuery=null,b.setCaret(0),b.setActiveItem(null),b.updatePlaceholder(),b.updateOriginalInput({silent:a}),b.refreshState(),b.showInput(),b.trigger("clear"))},insertAtCaret:function(b){var c=Math.min(this.caretPos,this.items.length);0===c?this.$control.prepend(b):a(this.$control[0].childNodes[c]).before(b),this.setCaret(c+1)},deleteSelection:function(b){var c,d,e,f,g,h,i,j,k,l=this;if(e=b&&b.keyCode===p?-1:1,f=G(l.$control_input[0]),l.$activeOption&&!l.settings.hideSelected&&(i=l.getAdjacentOption(l.$activeOption,-1).attr("data-value")),g=[],l.$activeItems.length){for(k=l.$control.children(".active:"+(e>0?"last":"first")),h=l.$control.children(":not(input)").index(k),e>0&&h++,c=0,d=l.$activeItems.length;c<d;c++)g.push(a(l.$activeItems[c]).attr("data-value"));b&&(b.preventDefault(),b.stopPropagation())}else(l.isFocused||"single"===l.settings.mode)&&l.items.length&&(e<0&&0===f.start&&0===f.length?g.push(l.items[l.caretPos-1]):e>0&&f.start===l.$control_input.val().length&&g.push(l.items[l.caretPos]));if(!g.length||"function"==typeof l.settings.onDelete&&l.settings.onDelete.apply(l,[g])===!1)return!1;for("undefined"!=typeof h&&l.setCaret(h);g.length;)l.removeItem(g.pop());return l.showInput(),l.positionDropdown(),l.refreshOptions(!0),i&&(j=l.getOption(i),j.length&&l.setActiveOption(j)),!0},advanceSelection:function(a,b){var c,d,e,f,g,h,i=this;0!==a&&(i.rtl&&(a*=-1),c=a>0?"last":"first",d=G(i.$control_input[0]),i.isFocused&&!i.isInputHidden?(f=i.$control_input.val().length,g=a<0?0===d.start&&0===d.length:d.start===f,g&&!f&&i.advanceCaret(a,b)):(h=i.$control.children(".active:"+c),h.length&&(e=i.$control.children(":not(input)").index(h),i.setActiveItem(null),i.setCaret(a>0?e+1:e))))},advanceCaret:function(a,b){var c,d,e=this;0!==a&&(c=a>0?"next":"prev",e.isShiftDown?(d=e.$control_input[c](),d.length&&(e.hideInput(),e.setActiveItem(d),b&&b.preventDefault())):e.setCaret(e.caretPos+a))},setCaret:function(b){var c=this;if(b="single"===c.settings.mode?c.items.length:Math.max(0,Math.min(c.items.length,b)),!c.isPending){var d,e,f,g;for(f=c.$control.children(":not(input)"),d=0,e=f.length;d<e;d++)g=a(f[d]).detach(),d<b?c.$control_input.before(g):c.$control.append(g)}c.caretPos=b},lock:function(){this.close(),this.isLocked=!0,this.refreshState()},unlock:function(){this.isLocked=!1,this.refreshState()},disable:function(){var a=this;a.$input.prop("disabled",!0),a.$control_input.prop("disabled",!0).prop("tabindex",-1),a.isDisabled=!0,a.lock()},enable:function(){var a=this;a.$input.prop("disabled",!1),a.$control_input.prop("disabled",!1).prop("tabindex",a.tabIndex),a.isDisabled=!1,a.unlock()},destroy:function(){var b=this,c=b.eventNS,d=b.revertSettings;b.trigger("destroy"),b.off(),b.$wrapper.remove(),b.$dropdown.remove(),b.$input.html("").append(d.$children).removeAttr("tabindex").removeClass("selectized").attr({tabindex:d.tabindex}).show(),b.$control_input.removeData("grow"),b.$input.removeData("selectize"),a(window).off(c),a(document).off(c),a(document.body).off(c),delete b.$input[0].selectize},render:function(b,c){var d,e,f="",g=!1,h=this;return"option"!==b&&"item"!==b||(d=z(c[h.settings.valueField]),g=!!d),g&&(y(h.renderCache[b])||(h.renderCache[b]={}),h.renderCache[b].hasOwnProperty(d))?h.renderCache[b][d]:(f=a(h.settings.render[b].apply(this,[c,A])),"option"===b||"option_create"===b?f.attr("data-selectable",""):"optgroup"===b&&(e=c[h.settings.optgroupValueField]||"",f.attr("data-group",e)),"option"!==b&&"item"!==b||f.attr("data-value",d||""),g&&(h.renderCache[b][d]=f[0]),f[0])},clearCache:function(a){var b=this;"undefined"==typeof a?b.renderCache={}:delete b.renderCache[a]},canCreate:function(a){var b=this;if(!b.settings.create)return!1;var c=b.settings.createFilter;return a.length&&("function"!=typeof c||c.apply(b,[a]))&&("string"!=typeof c||new RegExp(c).test(a))&&(!(c instanceof RegExp)||c.test(a))}}),M.count=0,M.defaults={options:[],optgroups:[],plugins:[],delimiter:",",splitOn:null,persist:!0,diacritics:!0,create:!1,createOnBlur:!1,createFilter:null,highlight:!0,openOnFocus:!0,maxOptions:1e3,maxItems:null,hideSelected:null,addPrecedence:!1,selectOnTab:!1,preload:!1,allowEmptyOption:!1,closeAfterSelect:!1,scrollDuration:60,loadThrottle:300,loadingClass:"loading",dataAttr:"data-data",optgroupField:"optgroup",valueField:"value",labelField:"text",optgroupLabelField:"label",optgroupValueField:"value",lockOptgroupOrder:!1,sortField:"$order",searchField:["text"],searchConjunction:"and",mode:null,wrapperClass:"selectize-control",inputClass:"selectize-input",dropdownClass:"selectize-dropdown",dropdownContentClass:"selectize-dropdown-content",dropdownParent:null,copyClassesToDropdown:!0,render:{}},a.fn.selectize=function(b){var c=a.fn.selectize.defaults,d=a.extend({},c,b),e=d.dataAttr,f=d.labelField,g=d.valueField,h=d.optgroupField,i=d.optgroupLabelField,j=d.optgroupValueField,k=function(b,c){var h,i,j,k,l=b.attr(e);if(l)for(c.options=JSON.parse(l),h=0,i=c.options.length;h<i;h++)c.items.push(c.options[h][g]);else{var m=a.trim(b.val()||"");if(!d.allowEmptyOption&&!m.length)return;for(j=m.split(d.delimiter),h=0,i=j.length;h<i;h++)k={},k[f]=j[h],k[g]=j[h],c.options.push(k);c.items=j}},l=function(b,c){var k,l,m,n,o=c.options,p={},q=function(a){var b=e&&a.attr(e);return"string"==typeof b&&b.length?JSON.parse(b):null},r=function(b,e){b=a(b);var i=z(b.val());if(i||d.allowEmptyOption)if(p.hasOwnProperty(i)){if(e){var j=p[i][h];j?a.isArray(j)?j.push(e):p[i][h]=[j,e]:p[i][h]=e}}else{var k=q(b)||{};k[f]=k[f]||b.text(),k[g]=k[g]||i,k[h]=k[h]||e,p[i]=k,o.push(k),b.is(":selected")&&c.items.push(i)}},s=function(b){var d,e,f,g,h;for(b=a(b),f=b.attr("label"),f&&(g=q(b)||{},g[i]=f,g[j]=f,c.optgroups.push(g)),h=a("option",b),d=0,e=h.length;d<e;d++)r(h[d],f)};for(c.maxItems=b.attr("multiple")?null:1,n=b.children(),k=0,l=n.length;k<l;k++)m=n[k].tagName.toLowerCase(),"optgroup"===m?s(n[k]):"option"===m&&r(n[k])};return this.each(function(){if(!this.selectize){var e,f=a(this),g=this.tagName.toLowerCase(),h=f.attr("placeholder")||f.attr("data-placeholder");h||d.allowEmptyOption||(h=f.children('option[value=""]').text());var i={placeholder:h,options:[],optgroups:[],items:[]};"select"===g?l(f,i):k(f,i),e=new M(f,a.extend(!0,{},c,i,b))}})},a.fn.selectize.defaults=M.defaults,a.fn.selectize.support={validity:x},M.define("drag_drop",function(b){if(!a.fn.sortable)throw new Error('The "drag_drop" plugin requires jQuery UI "sortable".');if("multi"===this.settings.mode){var c=this;c.lock=function(){var a=c.lock;return function(){var b=c.$control.data("sortable");return b&&b.disable(),a.apply(c,arguments)}}(),c.unlock=function(){var a=c.unlock;return function(){var b=c.$control.data("sortable");return b&&b.enable(),a.apply(c,arguments)}}(),c.setup=function(){var b=c.setup;return function(){b.apply(this,arguments);var d=c.$control.sortable({items:"[data-value]",forcePlaceholderSize:!0,disabled:c.isLocked,start:function(a,b){b.placeholder.css("width",b.helper.css("width")),d.css({overflow:"visible"})},stop:function(){d.css({overflow:"hidden"});var b=c.$activeItems?c.$activeItems.slice():null,e=[];d.children("[data-value]").each(function(){e.push(a(this).attr("data-value"))}),c.setValue(e),c.setActiveItem(b)}})}}()}}),M.define("dropdown_header",function(b){var c=this;b=a.extend({title:"Untitled",headerClass:"selectize-dropdown-header",titleRowClass:"selectize-dropdown-header-title",labelClass:"selectize-dropdown-header-label",closeClass:"selectize-dropdown-header-close",html:function(a){return'<div class="'+a.headerClass+'"><div class="'+a.titleRowClass+'"><span class="'+a.labelClass+'">'+a.title+'</span><a href="javascript:void(0)" class="'+a.closeClass+'">&times;</a></div></div>'}},b),c.setup=function(){var d=c.setup;return function(){d.apply(c,arguments),c.$dropdown_header=a(b.html(b)),c.$dropdown.prepend(c.$dropdown_header)}}()}),M.define("optgroup_columns",function(b){var c=this;b=a.extend({equalizeWidth:!0,equalizeHeight:!0},b),this.getAdjacentOption=function(b,c){var d=b.closest("[data-group]").find("[data-selectable]"),e=d.index(b)+c;return e>=0&&e<d.length?d.eq(e):a()},this.onKeyDown=function(){var a=c.onKeyDown;return function(b){var d,e,f,g;return!this.isOpen||b.keyCode!==j&&b.keyCode!==m?a.apply(this,arguments):(c.ignoreHover=!0,g=this.$activeOption.closest("[data-group]"),d=g.find("[data-selectable]").index(this.$activeOption),g=b.keyCode===j?g.prev("[data-group]"):g.next("[data-group]"),f=g.find("[data-selectable]"),e=f.eq(Math.min(f.length-1,d)),void(e.length&&this.setActiveOption(e)))}}();var d=function(){var a,b=d.width,c=document;return"undefined"==typeof b&&(a=c.createElement("div"),a.innerHTML='<div style="width:50px;height:50px;position:absolute;left:-50px;top:-50px;overflow:auto;"><div style="width:1px;height:100px;"></div></div>',a=a.firstChild,c.body.appendChild(a),b=d.width=a.offsetWidth-a.clientWidth,c.body.removeChild(a)),b},e=function(){var e,f,g,h,i,j,k;if(k=a("[data-group]",c.$dropdown_content),f=k.length,f&&c.$dropdown_content.width()){if(b.equalizeHeight){for(g=0,e=0;e<f;e++)g=Math.max(g,k.eq(e).height());k.css({height:g})}b.equalizeWidth&&(j=c.$dropdown_content.innerWidth()-d(),h=Math.round(j/f),k.css({width:h}),f>1&&(i=j-h*(f-1),k.eq(f-1).css({width:i})))}};(b.equalizeHeight||b.equalizeWidth)&&(B.after(this,"positionDropdown",e),B.after(this,"refreshOptions",e))}),M.define("remove_button",function(b){b=a.extend({label:"&times;",title:"Remove",className:"remove",append:!0},b);var c=function(b,c){c.className="remove-single";var d=b,e='<a href="javascript:void(0)" class="'+c.className+'" tabindex="-1" title="'+A(c.title)+'">'+c.label+"</a>",f=function(a,b){return a+b};b.setup=function(){var g=d.setup;return function(){if(c.append){var h=a(d.$input.context).attr("id"),i=(a("#"+h),d.settings.render.item);d.settings.render.item=function(a){return f(i.apply(b,arguments),e)}}g.apply(b,arguments),b.$control.on("click","."+c.className,function(a){a.preventDefault(),d.isLocked||d.clear()})}}()},d=function(b,c){var d=b,e='<a href="javascript:void(0)" class="'+c.className+'" tabindex="-1" title="'+A(c.title)+'">'+c.label+"</a>",f=function(a,b){var c=a.search(/(<\/[^>]+>\s*)$/);return a.substring(0,c)+b+a.substring(c)};b.setup=function(){var g=d.setup;return function(){if(c.append){var h=d.settings.render.item;d.settings.render.item=function(a){return f(h.apply(b,arguments),e)}}g.apply(b,arguments),b.$control.on("click","."+c.className,function(b){if(b.preventDefault(),!d.isLocked){var c=a(b.currentTarget).parent();d.setActiveItem(c),d.deleteSelection()&&d.setCaret(d.items.length)}})}}()};return"single"===this.settings.mode?void c(this,b):void d(this,b)}),M.define("restore_on_backspace",function(a){var b=this;a.text=a.text||function(a){return a[this.settings.labelField]},this.onKeyDown=function(){var c=b.onKeyDown;return function(b){var d,e;return b.keyCode===p&&""===this.$control_input.val()&&!this.$activeItems.length&&(d=this.caretPos-1,d>=0&&d<this.items.length)?(e=this.options[this.items[d]],this.deleteSelection(b)&&(this.setTextboxValue(a.text.apply(this,[e])),this.refreshOptions(!0)),void b.preventDefault()):c.apply(this,arguments)}}()}),M});
		<?php
	}

	/**
	 * CSS selectize.css (v0.12.4)
	 * Copyright (c) 2013–2015 Brian Reavis & contributors
	 *
	 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this
	 * file except in compliance with the License. You may obtain a copy of the License at:
	 * http://www.apache.org/licenses/LICENSE-2.0
	 *
	 * Unless required by applicable law or agreed to in writing, software distributed under
	 * the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF
	 * ANY KIND, either express or implied. See the License for the specific language
	 * governing permissions and limitations under the License.
	 *
	 * @author Brian Reavis <brian@thirdroute.com>
	 */
	public static function selectize_css() {
		?>
		.selectize-control.plugin-drag_drop.multi > .selectize-input > div.ui-sortable-placeholder {
		visibility: visible !important;
		background: #f2f2f2 !important;
		background: rgba(0, 0, 0, 0.06) !important;
		border: 0 none !important;
		-webkit-box-shadow: inset 0 0 12px 4px #ffffff;
		box-shadow: inset 0 0 12px 4px #ffffff;
		}
		.selectize-control.plugin-drag_drop .ui-sortable-placeholder::after {
		content: '!';
		visibility: hidden;
		}
		.selectize-control.plugin-drag_drop .ui-sortable-helper {
		-webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		}
		.selectize-dropdown-header {
		position: relative;
		padding: 5px 8px;
		border-bottom: 1px solid #d0d0d0;
		background: #f8f8f8;
		-webkit-border-radius: 3px 3px 0 0;
		-moz-border-radius: 3px 3px 0 0;
		border-radius: 3px 3px 0 0;
		}
		.selectize-dropdown-header-close {
		position: absolute;
		right: 8px;
		top: 50%;
		color: #303030;
		opacity: 0.4;
		margin-top: -12px;
		line-height: 20px;
		font-size: 20px !important;
		}
		.selectize-dropdown-header-close:hover {
		color: #000000;
		}
		.selectize-dropdown.plugin-optgroup_columns .optgroup {
		border-right: 1px solid #f2f2f2;
		border-top: 0 none;
		float: left;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		}
		.selectize-dropdown.plugin-optgroup_columns .optgroup:last-child {
		border-right: 0 none;
		}
		.selectize-dropdown.plugin-optgroup_columns .optgroup:before {
		display: none;
		}
		.selectize-dropdown.plugin-optgroup_columns .optgroup-header {
		border-top: 0 none;
		}
		.selectize-control.plugin-remove_button [data-value] {
		position: relative;
		padding-right: 24px !important;
		}
		.selectize-control.plugin-remove_button [data-value] .remove {
		z-index: 1;
		/* fixes ie bug (see #392) */
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		width: 17px;
		text-align: center;
		font-weight: bold;
		font-size: 12px;
		color: inherit;
		text-decoration: none;
		vertical-align: middle;
		display: inline-block;
		padding: 2px 0 0 0;
		border-left: 1px solid #d0d0d0;
		-webkit-border-radius: 0 2px 2px 0;
		-moz-border-radius: 0 2px 2px 0;
		border-radius: 0 2px 2px 0;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		}
		.selectize-control.plugin-remove_button [data-value] .remove:hover {
		background: rgba(0, 0, 0, 0.05);
		}
		.selectize-control.plugin-remove_button [data-value].active .remove {
		border-left-color: #cacaca;
		}
		.selectize-control.plugin-remove_button .disabled [data-value] .remove:hover {
		background: none;
		}
		.selectize-control.plugin-remove_button .disabled [data-value] .remove {
		border-left-color: #ffffff;
		}
		.selectize-control.plugin-remove_button .remove-single {
		position: absolute;
		right: 28px;
		top: 6px;
		font-size: 23px;
		}
		.selectize-control {
		position: relative;
		}
		.selectize-dropdown,
		.selectize-input,
		.selectize-input input {
		color: #303030;
		font-family: inherit;
		font-size: 13px;
		line-height: 18px;
		-webkit-font-smoothing: inherit;
		}
		.selectize-input,
		.selectize-control.single .selectize-input.input-active {
		background: #ffffff;
		cursor: text;
		display: inline-block;
		}
		.selectize-input {
		border: 1px solid #d0d0d0;
		padding: 8px 8px;
		display: inline-block;
		width: 100%;
		overflow: hidden;
		position: relative;
		z-index: 1;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		}
		.selectize-control.multi .selectize-input.has-items {
		padding: 6px 8px 3px;
		}
		.selectize-input.full {
		background-color: #ffffff;
		}
		.selectize-input.disabled,
		.selectize-input.disabled * {
		cursor: default !important;
		}
		.selectize-input.focus {
		-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15);
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15);
		}
		.selectize-input.dropdown-active {
		-webkit-border-radius: 3px 3px 0 0;
		-moz-border-radius: 3px 3px 0 0;
		border-radius: 3px 3px 0 0;
		}
		.selectize-input > * {
		vertical-align: baseline;
		display: -moz-inline-stack;
		display: inline-block;
		zoom: 1;
		*display: inline;
		}
		.selectize-control.multi .selectize-input > div {
		cursor: pointer;
		margin: 0 3px 3px 0;
		padding: 2px 6px;
		background: #f2f2f2;
		color: #303030;
		border: 0 solid #d0d0d0;
		}
		.selectize-control.multi .selectize-input > div.active {
		background: #e8e8e8;
		color: #303030;
		border: 0 solid #cacaca;
		}
		.selectize-control.multi .selectize-input.disabled > div,
		.selectize-control.multi .selectize-input.disabled > div.active {
		color: #7d7d7d;
		background: #ffffff;
		border: 0 solid #ffffff;
		}
		.selectize-input > input {
		display: inline-block !important;
		padding: 0 !important;
		min-height: 0 !important;
		max-height: none !important;
		max-width: 100% !important;
		margin: 0 2px 0 0 !important;
		text-indent: 0 !important;
		border: 0 none !important;
		background: none !important;
		line-height: inherit !important;
		-webkit-user-select: auto !important;
		-webkit-box-shadow: none !important;
		box-shadow: none !important;
		}
		.selectize-input > input::-ms-clear {
		display: none;
		}
		.selectize-input > input:focus {
		outline: none !important;
		}
		.selectize-input::after {
		content: ' ';
		display: block;
		clear: left;
		}
		.selectize-input.dropdown-active::before {
		content: ' ';
		display: block;
		position: absolute;
		background: #f0f0f0;
		height: 1px;
		bottom: 0;
		left: 0;
		right: 0;
		}
		.selectize-dropdown {
		position: absolute;
		z-index: 10;
		border: 1px solid #d0d0d0;
		background: #ffffff;
		margin: -1px 0 0 0;
		border-top: 0 none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		-webkit-border-radius: 0 0 3px 3px;
		-moz-border-radius: 0 0 3px 3px;
		border-radius: 0 0 3px 3px;
		}
		.selectize-dropdown [data-selectable] {
		cursor: pointer;
		overflow: hidden;
		}
		.selectize-dropdown [data-selectable] .highlight {
		background: rgba(125, 168, 208, 0.2);
		-webkit-border-radius: 1px;
		-moz-border-radius: 1px;
		border-radius: 1px;
		}
		.selectize-dropdown [data-selectable],
		.selectize-dropdown .optgroup-header {
		padding: 5px 8px;
		}
		.selectize-dropdown .optgroup:first-child .optgroup-header {
		border-top: 0 none;
		}
		.selectize-dropdown .optgroup-header {
		color: #303030;
		background: #ffffff;
		cursor: default;
		}
		.selectize-dropdown .active {
		background-color: #f5fafd;
		color: #495c68;
		}
		.selectize-dropdown .active.create {
		color: #495c68;
		}
		.selectize-dropdown .create {
		color: rgba(48, 48, 48, 0.5);
		}
		.selectize-dropdown-content {
		overflow-y: auto;
		overflow-x: hidden;
		max-height: 200px;
		-webkit-overflow-scrolling: touch;
		}
		.selectize-control.single .selectize-input,
		.selectize-control.single .selectize-input input {
		cursor: pointer;
		}
		.selectize-control.single .selectize-input.input-active,
		.selectize-control.single .selectize-input.input-active input {
		cursor: text;
		}
		.selectize-control.single .selectize-input:after {
		content: ' ';
		display: block;
		position: absolute;
		top: 50%;
		right: 15px;
		margin-top: -3px;
		width: 0;
		height: 0;
		border-style: solid;
		border-width: 5px 5px 0 5px;
		border-color: #808080 transparent transparent transparent;
		}
		.selectize-control.single .selectize-input.dropdown-active:after {
		margin-top: -4px;
		border-width: 0 5px 5px 5px;
		border-color: transparent transparent #808080 transparent;
		}
		.selectize-control.rtl.single .selectize-input:after {
		left: 15px;
		right: auto;
		}
		.selectize-control.rtl .selectize-input > input {
		margin: 0 4px 0 -2px !important;
		}
		.selectize-control .selectize-input.disabled {
		opacity: 0.5;
		background-color: #fafafa;
		}
		<?php
	}

	/**
	 * Inline Stylesheet (printed below header but above panel in <body>)
	 */
	public static function inline_css() {
		?>
		<style type="text/css">
			<?php
				self::yahoo_purecss();
				self::yahoo_purecss_responsive_grid();
				self::selectize_css();
			?>
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
				top: -1rem;
				clear: both;
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
				margin: 0 0.75rem 0 0 !important
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
			<?php self::selectize_js(); ?>
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
			jQuery( document ).ready( function() {
				wp.hooks.doAction( 'wpopFooterScripts' );
			} );
		</script>
		<?php
	}
}
