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
		!function(e,t){"function"==typeof define&&define.amd?define("sifter",t):"object"==typeof exports?module.exports=t():e.Sifter=t()}(this,function(){var e=function(e,t){this.items=e,this.settings=t||{diacritics:!0}};e.prototype.tokenize=function(e){if(!(e=o(String(e||"").toLowerCase()))||!e.length)return[];var t,n,i,r,l=[],p=e.split(/ +/);for(t=0,n=p.length;t<n;t++){if(i=s(p[t]),this.settings.diacritics)for(r in a)a.hasOwnProperty(r)&&(i=i.replace(new RegExp(r,"g"),a[r]));l.push({string:p[t],regex:new RegExp(i,"i")})}return l},e.prototype.iterator=function(e,t){(r(e)?Array.prototype.forEach||function(e){for(var t=0,n=this.length;t<n;t++)e(this[t],t,this)}:function(e){for(var t in this)this.hasOwnProperty(t)&&e(this[t],t,this)}).apply(e,[t])},e.prototype.getScoreFunction=function(e,t){var n,o,s,r;e=this.prepareSearch(e,t),o=e.tokens,n=e.options.fields,s=o.length,r=e.options.nesting;var a,l=function(e,t){var n,i;return e?-1===(i=(e=String(e||"")).search(t.regex))?0:(n=t.string.length/e.length,0===i&&(n+=.5),n):0},p=(a=n.length)?1===a?function(e,t){return l(i(t,n[0],r),e)}:function(e,t){for(var o=0,s=0;o<a;o++)s+=l(i(t,n[o],r),e);return s/a}:function(){return 0};return s?1===s?function(e){return p(o[0],e)}:"and"===e.options.conjunction?function(e){for(var t,n=0,i=0;n<s;n++){if((t=p(o[n],e))<=0)return 0;i+=t}return i/s}:function(e){for(var t=0,n=0;t<s;t++)n+=p(o[t],e);return n/s}:function(){return 0}},e.prototype.getSortFunction=function(e,n){var o,s,r,a,l,p,u,d,c,h,g;if(g=!(e=(r=this).prepareSearch(e,n)).query&&n.sort_empty||n.sort,c=function(e,t){return"$score"===e?t.score:i(r.items[t.id],e,n.nesting)},l=[],g)for(o=0,s=g.length;o<s;o++)(e.query||"$score"!==g[o].field)&&l.push(g[o]);if(e.query){for(h=!0,o=0,s=l.length;o<s;o++)if("$score"===l[o].field){h=!1;break}h&&l.unshift({field:"$score",direction:"desc"})}else for(o=0,s=l.length;o<s;o++)if("$score"===l[o].field){l.splice(o,1);break}for(d=[],o=0,s=l.length;o<s;o++)d.push("desc"===l[o].direction?-1:1);return(p=l.length)?1===p?(a=l[0].field,u=d[0],function(e,n){return u*t(c(a,e),c(a,n))}):function(e,n){var i,o,s;for(i=0;i<p;i++)if(s=l[i].field,o=d[i]*t(c(s,e),c(s,n)))return o;return 0}:null},e.prototype.prepareSearch=function(e,t){if("object"==typeof e)return e;var i=(t=n({},t)).fields,o=t.sort,s=t.sort_empty;return i&&!r(i)&&(t.fields=[i]),o&&!r(o)&&(t.sort=[o]),s&&!r(s)&&(t.sort_empty=[s]),{options:t,query:String(e||"").toLowerCase(),tokens:this.tokenize(e),total:0,items:[]}},e.prototype.search=function(e,t){var n,i,o,s,r=this;return i=this.prepareSearch(e,t),t=i.options,e=i.query,s=t.score||r.getScoreFunction(i),e.length?r.iterator(r.items,function(e,o){n=s(e),(!1===t.filter||n>0)&&i.items.push({score:n,id:o})}):r.iterator(r.items,function(e,t){i.items.push({score:1,id:t})}),(o=r.getSortFunction(i,t))&&i.items.sort(o),i.total=i.items.length,"number"==typeof t.limit&&(i.items=i.items.slice(0,t.limit)),i};var t=function(e,t){return"number"==typeof e&&"number"==typeof t?e>t?1:e<t?-1:0:(e=l(String(e||"")))>(t=l(String(t||"")))?1:t>e?-1:0},n=function(e,t){var n,i,o,s;for(n=1,i=arguments.length;n<i;n++)if(s=arguments[n])for(o in s)s.hasOwnProperty(o)&&(e[o]=s[o]);return e},i=function(e,t,n){if(e&&t){if(!n)return e[t];for(var i=t.split(".");i.length&&(e=e[i.shift()]););return e}},o=function(e){return(e+"").replace(/^\s+|\s+$|/g,"")},s=function(e){return(e+"").replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1")},r=Array.isArray||"undefined"!=typeof $&&$.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)},a={a:"[aḀḁĂăÂâǍǎȺⱥȦȧẠạÄäÀàÁáĀāÃãÅåąĄÃąĄ]",b:"[b␢βΒB฿𐌁ᛒ]",c:"[cĆćĈĉČčĊċC̄c̄ÇçḈḉȻȼƇƈɕᴄＣｃ]",d:"[dĎďḊḋḐḑḌḍḒḓḎḏĐđD̦d̦ƉɖƊɗƋƌᵭᶁᶑȡᴅＤｄð]",e:"[eÉéÈèÊêḘḙĚěĔĕẼẽḚḛẺẻĖėËëĒēȨȩĘęᶒɆɇȄȅẾếỀềỄễỂểḜḝḖḗḔḕȆȇẸẹỆệⱸᴇＥｅɘǝƏƐε]",f:"[fƑƒḞḟ]",g:"[gɢ₲ǤǥĜĝĞğĢģƓɠĠġ]",h:"[hĤĥĦħḨḩẖẖḤḥḢḣɦʰǶƕ]",i:"[iÍíÌìĬĭÎîǏǐÏïḮḯĨĩĮįĪīỈỉȈȉȊȋỊịḬḭƗɨɨ̆ᵻᶖİiIıɪＩｉ]",j:"[jȷĴĵɈɉʝɟʲ]",k:"[kƘƙꝀꝁḰḱǨǩḲḳḴḵκϰ₭]",l:"[lŁłĽľĻļĹĺḶḷḸḹḼḽḺḻĿŀȽƚⱠⱡⱢɫɬᶅɭȴʟＬｌ]",n:"[nŃńǸǹŇňÑñṄṅŅņṆṇṊṋṈṉN̈n̈ƝɲȠƞᵰᶇɳȵɴＮｎŊŋ]",o:"[oØøÖöÓóÒòÔôǑǒŐőŎŏȮȯỌọƟɵƠơỎỏŌōÕõǪǫȌȍՕօ]",p:"[pṔṕṖṗⱣᵽƤƥᵱ]",q:"[qꝖꝗʠɊɋꝘꝙq̃]",r:"[rŔŕɌɍŘřŖŗṘṙȐȑȒȓṚṛⱤɽ]",s:"[sŚśṠṡṢṣꞨꞩŜŝŠšŞşȘșS̈s̈]",t:"[tŤťṪṫŢţṬṭƮʈȚțṰṱṮṯƬƭ]",u:"[uŬŭɄʉỤụÜüÚúÙùÛûǓǔŰűŬŭƯưỦủŪūŨũŲųȔȕ∪]",v:"[vṼṽṾṿƲʋꝞꝟⱱʋ]",w:"[wẂẃẀẁŴŵẄẅẆẇẈẉ]",x:"[xẌẍẊẋχ]",y:"[yÝýỲỳŶŷŸÿỸỹẎẏỴỵɎɏƳƴ]",z:"[zŹźẐẑŽžŻżẒẓẔẕƵƶ]"},l=function(){var e,t,n,i,o="",s={};for(n in a)if(a.hasOwnProperty(n))for(o+=i=a[n].substring(2,a[n].length-1),e=0,t=i.length;e<t;e++)s[i.charAt(e)]=n;var r=new RegExp("["+o+"]","g");return function(e){return e.replace(r,function(e){return s[e]}).toLowerCase()}}();return e}),function(e,t){"function"==typeof define&&define.amd?define("microplugin",t):"object"==typeof exports?module.exports=t():e.MicroPlugin=t()}(this,function(){var e={mixin:function(e){e.plugins={},e.prototype.initializePlugins=function(e){var n,i,o,s=[];if(this.plugins={names:[],settings:{},requested:{},loaded:{}},t.isArray(e))for(n=0,i=e.length;n<i;n++)"string"==typeof e[n]?s.push(e[n]):(this.plugins.settings[e[n].name]=e[n].options,s.push(e[n].name));else if(e)for(o in e)e.hasOwnProperty(o)&&(this.plugins.settings[o]=e[o],s.push(o));for(;s.length;)this.require(s.shift())},e.prototype.loadPlugin=function(t){var n=this.plugins,i=e.plugins[t];if(!e.plugins.hasOwnProperty(t))throw new Error('Unable to find "'+t+'" plugin');n.requested[t]=!0,n.loaded[t]=i.fn.apply(this,[this.plugins.settings[t]||{}]),n.names.push(t)},e.prototype.require=function(e){var t=this.plugins;if(!this.plugins.loaded.hasOwnProperty(e)){if(t.requested[e])throw new Error('Plugin has circular dependency ("'+e+'")');this.loadPlugin(e)}return t.loaded[e]},e.define=function(t,n){e.plugins[t]={name:t,fn:n}}}},t={isArray:Array.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)}};return e}),function(e,t){"function"==typeof define&&define.amd?define("selectize",["jquery","sifter","microplugin"],t):"object"==typeof exports?module.exports=t(require("jquery"),require("sifter"),require("microplugin")):e.Selectize=t(e.jQuery,e.Sifter,e.MicroPlugin)}(this,function(e,t,n){"use strict";var i=function(e,t){if("string"!=typeof t||t.length){var n="string"==typeof t?new RegExp(t,"i"):t,i=function(e){var t=0;if(3===e.nodeType){var o=e.data.search(n);if(o>=0&&e.data.length>0){var s=e.data.match(n),r=document.createElement("span");r.className="highlight";var a=e.splitText(o),l=(a.splitText(s[0].length),a.cloneNode(!0));r.appendChild(l),a.parentNode.replaceChild(r,a),t=1}}else if(1===e.nodeType&&e.childNodes&&!/(script|style)/i.test(e.tagName)&&("highlight"!==e.className||"SPAN"!==e.tagName))for(var p=0;p<e.childNodes.length;++p)p+=i(e.childNodes[p]);return t};return e.each(function(){i(this)})}};e.fn.removeHighlight=function(){return this.find("span.highlight").each(function(){this.parentNode.firstChild.nodeName;var e=this.parentNode;e.replaceChild(this.firstChild,this),e.normalize()}).end()};var o=function(){};o.prototype={on:function(e,t){this._events=this._events||{},this._events[e]=this._events[e]||[],this._events[e].push(t)},off:function(e,t){var n=arguments.length;return 0===n?delete this._events:1===n?delete this._events[e]:(this._events=this._events||{},void(e in this._events!=!1&&this._events[e].splice(this._events[e].indexOf(t),1)))},trigger:function(e){if(this._events=this._events||{},e in this._events!=!1)for(var t=0;t<this._events[e].length;t++)this._events[e][t].apply(this,Array.prototype.slice.call(arguments,1))}},o.mixin=function(e){for(var t=["on","off","trigger"],n=0;n<t.length;n++)e.prototype[t[n]]=o.prototype[t[n]]};var s=/Mac/.test(navigator.userAgent),r=s?91:17,a=s?18:17,l=!/android/i.test(window.navigator.userAgent)&&!!document.createElement("input").validity,p=function(e){return void 0!==e},u=function(e){return void 0===e||null===e?null:"boolean"==typeof e?e?"1":"0":e+""},d=function(e){return(e+"").replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;")},c={before:function(e,t,n){var i=e[t];e[t]=function(){return n.apply(e,arguments),i.apply(e,arguments)}},after:function(e,t,n){var i=e[t];e[t]=function(){var t=i.apply(e,arguments);return n.apply(e,arguments),t}}},h=function(e,t,n){var i,o=e.trigger,s={};e.trigger=function(){var n=arguments[0];if(-1===t.indexOf(n))return o.apply(e,arguments);s[n]=arguments},n.apply(e,[]),e.trigger=o;for(i in s)s.hasOwnProperty(i)&&o.apply(e,s[i])},g=function(e){var t={};if("selectionStart"in e)t.start=e.selectionStart,t.length=e.selectionEnd-t.start;else if(document.selection){e.focus();var n=document.selection.createRange(),i=document.selection.createRange().text.length;n.moveStart("character",-e.value.length),t.start=n.text.length-i,t.length=i}return t},f=function(t){var n=null,i=function(i,o){var s,r,a,l,p,u,d,c,h,f;(i=i||window.event||{},o=o||{},i.metaKey||i.altKey)||(o.force||!1!==t.data("grow"))&&(s=t.val(),i.type&&"keydown"===i.type.toLowerCase()&&(a=(r=i.keyCode)>=48&&r<=57||r>=65&&r<=90||r>=96&&r<=111||r>=186&&r<=222||32===r,46===r||8===r?(c=g(t[0])).length?s=s.substring(0,c.start)+s.substring(c.start+c.length):8===r&&c.start?s=s.substring(0,c.start-1)+s.substring(c.start+1):46===r&&void 0!==c.start&&(s=s.substring(0,c.start)+s.substring(c.start+1)):a&&(u=i.shiftKey,d=String.fromCharCode(i.keyCode),s+=d=u?d.toUpperCase():d.toLowerCase())),l=t.attr("placeholder"),!s&&l&&(s=l),f=t,(p=((h=s)?(v.$testInput||(v.$testInput=e("<span />").css({position:"absolute",top:-99999,left:-99999,width:"auto",padding:0,whiteSpace:"pre"}).appendTo("body")),v.$testInput.text(h),function(e,t,n){var i,o,s={};if(n)for(i=0,o=n.length;i<o;i++)s[n[i]]=e.css(n[i]);else s=e.css();t.css(s)}(f,v.$testInput,["letterSpacing","fontSize","fontFamily","fontWeight","textTransform"]),v.$testInput.width()):0)+4)!==n&&(n=p,t.width(p),t.triggerHandler("resize")))};t.on("keydown keyup update blur",i),i()},v=function(n,i){var o,s,r,a,l=this;(a=n[0]).selectize=l;var p,u,d,c=window.getComputedStyle&&window.getComputedStyle(a,null);if(r=(r=c?c.getPropertyValue("direction"):a.currentStyle&&a.currentStyle.direction)||n.parents("[dir]:first").attr("dir")||"",e.extend(l,{order:0,settings:i,$input:n,tabIndex:n.attr("tabindex")||"",tagType:"select"===a.tagName.toLowerCase()?1:2,rtl:/rtl/i.test(r),eventNS:".selectize"+ ++v.count,highlightedValue:null,isBlurring:!1,isOpen:!1,isDisabled:!1,isRequired:n.is("[required]"),isInvalid:!1,isLocked:!1,isFocused:!1,isInputHidden:!1,isSetup:!1,isShiftDown:!1,isCmdDown:!1,isCtrlDown:!1,ignoreFocus:!1,ignoreBlur:!1,ignoreHover:!1,hasOptions:!1,currentResults:null,lastValue:"",caretPos:0,loading:0,loadedSearches:{},$activeOption:null,$activeItems:[],optgroups:{},options:{},userOptions:{},items:[],renderCache:{},onSearchChange:null===i.loadThrottle?l.onSearchChange:(p=l.onSearchChange,u=i.loadThrottle,function(){var e=this,t=arguments;window.clearTimeout(d),d=window.setTimeout(function(){p.apply(e,t)},u)})}),l.sifter=new t(this.options,{diacritics:i.diacritics}),l.settings.options){for(o=0,s=l.settings.options.length;o<s;o++)l.registerOption(l.settings.options[o]);delete l.settings.options}if(l.settings.optgroups){for(o=0,s=l.settings.optgroups.length;o<s;o++)l.registerOptionGroup(l.settings.optgroups[o]);delete l.settings.optgroups}l.settings.mode=l.settings.mode||(1===l.settings.maxItems?"single":"multi"),"boolean"!=typeof l.settings.hideSelected&&(l.settings.hideSelected="multi"===l.settings.mode),l.initializePlugins(l.settings.plugins),l.setupCallbacks(),l.setupTemplates(),l.setup()};return o.mixin(v),void 0!==n?n.mixin(v):function(e,t){t||(t={});console.error("Selectize: "+e),t.explanation&&(console.group&&console.group(),console.error(t.explanation),console.group&&console.groupEnd())}("Dependency MicroPlugin is missing",{explanation:'Make sure you either: (1) are using the "standalone" version of Selectize, or (2) require MicroPlugin before you load Selectize.'}),e.extend(v.prototype,{setup:function(){var t,n,i,o,p,u,d,c,h,g,v,m,y,w,O=this,$=O.settings,C=O.eventNS,b=e(window),x=e(document),S=O.$input;if(d=O.settings.mode,c=S.attr("class")||"",t=e("<div>").addClass($.wrapperClass).addClass(c).addClass(d),n=e("<div>").addClass($.inputClass).addClass("items").appendTo(t),i=e('<input type="text" autocomplete="off" />').appendTo(n).attr("tabindex",S.is(":disabled")?"-1":O.tabIndex),u=e($.dropdownParent||t),o=e("<div>").addClass($.dropdownClass).addClass(d).hide().appendTo(u),p=e("<div>").addClass($.dropdownContentClass).appendTo(o),(g=S.attr("id"))&&(i.attr("id",g+"-selectized"),e("label[for='"+g+"']").attr("for",g+"-selectized")),O.settings.copyClassesToDropdown&&o.addClass(c),t.css({width:S[0].style.width}),O.plugins.names.length&&(h="plugin-"+O.plugins.names.join(" plugin-"),t.addClass(h),o.addClass(h)),(null===$.maxItems||$.maxItems>1)&&1===O.tagType&&S.attr("multiple","multiple"),O.settings.placeholder&&i.attr("placeholder",$.placeholder),!O.settings.splitOn&&O.settings.delimiter){var I=O.settings.delimiter.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");O.settings.splitOn=new RegExp("\\s*"+I+"+\\s*")}S.attr("autocorrect")&&i.attr("autocorrect",S.attr("autocorrect")),S.attr("autocapitalize")&&i.attr("autocapitalize",S.attr("autocapitalize")),i[0].type=S[0].type,O.$wrapper=t,O.$control=n,O.$control_input=i,O.$dropdown=o,O.$dropdown_content=p,o.on("mouseenter mousedown click","[data-disabled]>[data-selectable]",function(e){e.stopImmediatePropagation()}),o.on("mouseenter","[data-selectable]",function(){return O.onOptionHover.apply(O,arguments)}),o.on("mousedown click","[data-selectable]",function(){return O.onOptionSelect.apply(O,arguments)}),m="mousedown",y="*:not(input)",w=function(){return O.onItemSelect.apply(O,arguments)},(v=n).on(m,y,function(e){for(var t=e.target;t&&t.parentNode!==v[0];)t=t.parentNode;return e.currentTarget=t,w.apply(this,[e])}),f(i),n.on({mousedown:function(){return O.onMouseDown.apply(O,arguments)},click:function(){return O.onClick.apply(O,arguments)}}),i.on({mousedown:function(e){e.stopPropagation()},keydown:function(){return O.onKeyDown.apply(O,arguments)},keyup:function(){return O.onKeyUp.apply(O,arguments)},keypress:function(){return O.onKeyPress.apply(O,arguments)},resize:function(){O.positionDropdown.apply(O,[])},blur:function(){return O.onBlur.apply(O,arguments)},focus:function(){return O.ignoreBlur=!1,O.onFocus.apply(O,arguments)},paste:function(){return O.onPaste.apply(O,arguments)}}),x.on("keydown"+C,function(e){O.isCmdDown=e[s?"metaKey":"ctrlKey"],O.isCtrlDown=e[s?"altKey":"ctrlKey"],O.isShiftDown=e.shiftKey}),x.on("keyup"+C,function(e){e.keyCode===a&&(O.isCtrlDown=!1),16===e.keyCode&&(O.isShiftDown=!1),e.keyCode===r&&(O.isCmdDown=!1)}),x.on("mousedown"+C,function(e){if(O.isFocused){if(e.target===O.$dropdown[0]||e.target.parentNode===O.$dropdown[0])return!1;O.$control.has(e.target).length||e.target===O.$control[0]||O.blur(e.target)}}),b.on(["scroll"+C,"resize"+C].join(" "),function(){O.isOpen&&O.positionDropdown.apply(O,arguments)}),b.on("mousemove"+C,function(){O.ignoreHover=!1}),this.revertSettings={$children:S.children().detach(),tabindex:S.attr("tabindex")},S.attr("tabindex",-1).hide().after(O.$wrapper),e.isArray($.items)&&(O.setValue($.items),delete $.items),l&&S.on("invalid"+C,function(e){e.preventDefault(),O.isInvalid=!0,O.refreshState()}),O.updateOriginalInput(),O.refreshItems(),O.refreshState(),O.updatePlaceholder(),O.isSetup=!0,S.is(":disabled")&&O.disable(),O.on("change",this.onChange),S.data("selectize",O),S.addClass("selectized"),O.trigger("initialize"),!0===$.preload&&O.onSearchChange("")},setupTemplates:function(){var t=this.settings.labelField,n=this.settings.optgroupLabelField,i={optgroup:function(e){return'<div class="optgroup">'+e.html+"</div>"},optgroup_header:function(e,t){return'<div class="optgroup-header">'+t(e[n])+"</div>"},option:function(e,n){return'<div class="option">'+n(e[t])+"</div>"},item:function(e,n){return'<div class="item">'+n(e[t])+"</div>"},option_create:function(e,t){return'<div class="create">Add <strong>'+t(e.input)+"</strong>&hellip;</div>"}};this.settings.render=e.extend({},i,this.settings.render)},setupCallbacks:function(){var e,t,n={initialize:"onInitialize",change:"onChange",item_add:"onItemAdd",item_remove:"onItemRemove",clear:"onClear",option_add:"onOptionAdd",option_remove:"onOptionRemove",option_clear:"onOptionClear",optgroup_add:"onOptionGroupAdd",optgroup_remove:"onOptionGroupRemove",optgroup_clear:"onOptionGroupClear",dropdown_open:"onDropdownOpen",dropdown_close:"onDropdownClose",type:"onType",load:"onLoad",focus:"onFocus",blur:"onBlur"};for(e in n)n.hasOwnProperty(e)&&(t=this.settings[n[e]])&&this.on(e,t)},onClick:function(e){this.isFocused&&this.isOpen||(this.focus(),e.preventDefault())},onMouseDown:function(t){var n=this,i=t.isDefaultPrevented();e(t.target);if(n.isFocused){if(t.target!==n.$control_input[0])return"single"===n.settings.mode?n.isOpen?n.close():n.open():i||n.setActiveItem(null),!1}else i||window.setTimeout(function(){n.focus()},0)},onChange:function(){this.$input.trigger("change")},onPaste:function(t){var n=this;n.isFull()||n.isInputHidden||n.isLocked?t.preventDefault():n.settings.splitOn&&setTimeout(function(){var t=n.$control_input.val();if(t.match(n.settings.splitOn))for(var i=e.trim(t).split(n.settings.splitOn),o=0,s=i.length;o<s;o++)n.createItem(i[o])},0)},onKeyPress:function(e){if(this.isLocked)return e&&e.preventDefault();var t=String.fromCharCode(e.keyCode||e.which);return this.settings.create&&"multi"===this.settings.mode&&t===this.settings.delimiter?(this.createItem(),e.preventDefault(),!1):void 0},onKeyDown:function(e){e.target,this.$control_input[0];var t=this;if(t.isLocked)9!==e.keyCode&&e.preventDefault();else{switch(e.keyCode){case 65:if(t.isCmdDown)return void t.selectAll();break;case 27:return void(t.isOpen&&(e.preventDefault(),e.stopPropagation(),t.close()));case 78:if(!e.ctrlKey||e.altKey)break;case 40:if(!t.isOpen&&t.hasOptions)t.open();else if(t.$activeOption){t.ignoreHover=!0;var n=t.getAdjacentOption(t.$activeOption,1);n.length&&t.setActiveOption(n,!0,!0)}return void e.preventDefault();case 80:if(!e.ctrlKey||e.altKey)break;case 38:if(t.$activeOption){t.ignoreHover=!0;var i=t.getAdjacentOption(t.$activeOption,-1);i.length&&t.setActiveOption(i,!0,!0)}return void e.preventDefault();case 13:return void(t.isOpen&&t.$activeOption&&(t.onOptionSelect({currentTarget:t.$activeOption}),e.preventDefault()));case 37:return void t.advanceSelection(-1,e);case 39:return void t.advanceSelection(1,e);case 9:return t.settings.selectOnTab&&t.isOpen&&t.$activeOption&&(t.onOptionSelect({currentTarget:t.$activeOption}),t.isFull()||e.preventDefault()),void(t.settings.create&&t.createItem()&&e.preventDefault());case 8:case 46:return void t.deleteSelection(e)}!t.isFull()&&!t.isInputHidden||(s?e.metaKey:e.ctrlKey)||e.preventDefault()}},onKeyUp:function(e){var t=this;if(t.isLocked)return e&&e.preventDefault();var n=t.$control_input.val()||"";t.lastValue!==n&&(t.lastValue=n,t.onSearchChange(n),t.refreshOptions(),t.trigger("type",n))},onSearchChange:function(e){var t=this,n=t.settings.load;n&&(t.loadedSearches.hasOwnProperty(e)||(t.loadedSearches[e]=!0,t.load(function(i){n.apply(t,[e,i])})))},onFocus:function(e){var t=this,n=t.isFocused;if(t.isDisabled)return t.blur(),e&&e.preventDefault(),!1;t.ignoreFocus||(t.isFocused=!0,"focus"===t.settings.preload&&t.onSearchChange(""),n||t.trigger("focus"),t.$activeItems.length||(t.showInput(),t.setActiveItem(null),t.refreshOptions(!!t.settings.openOnFocus)),t.refreshState())},onBlur:function(e,t){var n=this;if(n.isFocused&&(n.isFocused=!1,!n.ignoreFocus)){if(!n.ignoreBlur&&document.activeElement===n.$dropdown_content[0])return n.ignoreBlur=!0,void n.onFocus(e);var i=function(){n.close(),n.setTextboxValue(""),n.setActiveItem(null),n.setActiveOption(null),n.setCaret(n.items.length),n.refreshState(),t&&t.focus&&t.focus(),n.isBlurring=!1,n.ignoreFocus=!1,n.trigger("blur")};n.isBlurring=!0,n.ignoreFocus=!0,n.settings.create&&n.settings.createOnBlur?n.createItem(null,!1,i):i()}},onOptionHover:function(e){this.ignoreHover||this.setActiveOption(e.currentTarget,!1)},onOptionSelect:function(t){var n,i,o=this;t.preventDefault&&(t.preventDefault(),t.stopPropagation()),(i=e(t.currentTarget)).hasClass("create")?o.createItem(null,function(){o.settings.closeAfterSelect&&o.close()}):void 0!==(n=i.attr("data-value"))&&(o.lastQuery=null,o.setTextboxValue(""),o.addItem(n),o.settings.closeAfterSelect?o.close():!o.settings.hideSelected&&t.type&&/mouse/.test(t.type)&&o.setActiveOption(o.getOption(n)))},onItemSelect:function(e){this.isLocked||"multi"===this.settings.mode&&(e.preventDefault(),this.setActiveItem(e.currentTarget,e))},load:function(e){var t=this,n=t.$wrapper.addClass(t.settings.loadingClass);t.loading++,e.apply(t,[function(e){t.loading=Math.max(t.loading-1,0),e&&e.length&&(t.addOption(e),t.refreshOptions(t.isFocused&&!t.isInputHidden)),t.loading||n.removeClass(t.settings.loadingClass),t.trigger("load",e)}])},setTextboxValue:function(e){var t=this.$control_input;t.val()!==e&&(t.val(e).triggerHandler("update"),this.lastValue=e)},getValue:function(){return 1===this.tagType&&this.$input.attr("multiple")?this.items:this.items.join(this.settings.delimiter)},setValue:function(e,t){h(this,t?[]:["change"],function(){this.clear(t),this.addItems(e,t)})},setActiveItem:function(t,n){var i,o,s,r,a,l,p,u,d=this;if("single"!==d.settings.mode){if(!(t=e(t)).length)return e(d.$activeItems).removeClass("active"),d.$activeItems=[],void(d.isFocused&&d.showInput());if("mousedown"===(i=n&&n.type.toLowerCase())&&d.isShiftDown&&d.$activeItems.length){for(u=d.$control.children(".active:last"),(r=Array.prototype.indexOf.apply(d.$control[0].childNodes,[u[0]]))>(a=Array.prototype.indexOf.apply(d.$control[0].childNodes,[t[0]]))&&(p=r,r=a,a=p),o=r;o<=a;o++)l=d.$control[0].childNodes[o],-1===d.$activeItems.indexOf(l)&&(e(l).addClass("active"),d.$activeItems.push(l));n.preventDefault()}else"mousedown"===i&&d.isCtrlDown||"keydown"===i&&this.isShiftDown?t.hasClass("active")?(s=d.$activeItems.indexOf(t[0]),d.$activeItems.splice(s,1),t.removeClass("active")):d.$activeItems.push(t.addClass("active")[0]):(e(d.$activeItems).removeClass("active"),d.$activeItems=[t.addClass("active")[0]]);d.hideInput(),this.isFocused||d.focus()}},setActiveOption:function(t,n,i){var o,s,r,a,l,u=this;u.$activeOption&&u.$activeOption.removeClass("active"),u.$activeOption=null,(t=e(t)).length&&(u.$activeOption=t.addClass("active"),!n&&p(n)||(o=u.$dropdown_content.height(),s=u.$activeOption.outerHeight(!0),n=u.$dropdown_content.scrollTop()||0,a=r=u.$activeOption.offset().top-u.$dropdown_content.offset().top+n,l=r-o+s,r+s>o+n?u.$dropdown_content.stop().animate({scrollTop:l},i?u.settings.scrollDuration:0):r<n&&u.$dropdown_content.stop().animate({scrollTop:a},i?u.settings.scrollDuration:0)))},selectAll:function(){var e=this;"single"!==e.settings.mode&&(e.$activeItems=Array.prototype.slice.apply(e.$control.children(":not(input)").addClass("active")),e.$activeItems.length&&(e.hideInput(),e.close()),e.focus())},hideInput:function(){this.setTextboxValue(""),this.$control_input.css({opacity:0,position:"absolute",left:this.rtl?1e4:-1e4}),this.isInputHidden=!0},showInput:function(){this.$control_input.css({opacity:1,position:"relative",left:0}),this.isInputHidden=!1},focus:function(){var e=this;e.isDisabled||(e.ignoreFocus=!0,e.$control_input[0].focus(),window.setTimeout(function(){e.ignoreFocus=!1,e.onFocus()},0))},blur:function(e){this.$control_input[0].blur(),this.onBlur(null,e)},getScoreFunction:function(e){return this.sifter.getScoreFunction(e,this.getSearchOptions())},getSearchOptions:function(){var e=this.settings,t=e.sortField;return"string"==typeof t&&(t=[{field:t}]),{fields:e.searchField,conjunction:e.searchConjunction,sort:t,nesting:e.nesting}},search:function(t){var n,i,o,s=this,r=s.settings,a=this.getSearchOptions();if(r.score&&"function"!=typeof(o=s.settings.score.apply(this,[t])))throw new Error('Selectize "score" setting must be a function that returns a function');if(t!==s.lastQuery?(s.lastQuery=t,i=s.sifter.search(t,e.extend(a,{score:o})),s.currentResults=i):i=e.extend(!0,{},s.currentResults),r.hideSelected)for(n=i.items.length-1;n>=0;n--)-1!==s.items.indexOf(u(i.items[n].id))&&i.items.splice(n,1);return i},refreshOptions:function(t){var n,o,s,r,a,l,p,d,c,h,g,f,v,m,y,w;void 0===t&&(t=!0);var O,$,C=this,b=e.trim(C.$control_input.val()),x=C.search(b),S=C.$dropdown_content,I=C.$activeOption&&u(C.$activeOption.attr("data-value"));for(r=x.items.length,"number"==typeof C.settings.maxOptions&&(r=Math.min(r,C.settings.maxOptions)),a={},l=[],n=0;n<r;n++)for(p=C.options[x.items[n].id],d=C.render("option",p),c=p[C.settings.optgroupField]||"",o=0,s=(h=e.isArray(c)?c:[c])&&h.length;o<s;o++)c=h[o],C.optgroups.hasOwnProperty(c)||(c=""),a.hasOwnProperty(c)||(a[c]=document.createDocumentFragment(),l.push(c)),a[c].appendChild(d);for(this.settings.lockOptgroupOrder&&l.sort(function(e,t){return(C.optgroups[e].$order||0)-(C.optgroups[t].$order||0)}),g=document.createDocumentFragment(),n=0,r=l.length;n<r;n++)c=l[n],C.optgroups.hasOwnProperty(c)&&a[c].childNodes.length?((f=document.createDocumentFragment()).appendChild(C.render("optgroup_header",C.optgroups[c])),f.appendChild(a[c]),g.appendChild(C.render("optgroup",e.extend({},C.optgroups[c],{html:(O=f,$=void 0,$=document.createElement("div"),$.appendChild(O.cloneNode(!0)),$.innerHTML),dom:f})))):g.appendChild(a[c]);if(S.html(g),C.settings.highlight&&(S.removeHighlight(),x.query.length&&x.tokens.length))for(n=0,r=x.tokens.length;n<r;n++)i(S,x.tokens[n].regex);if(!C.settings.hideSelected)for(n=0,r=C.items.length;n<r;n++)C.getOption(C.items[n]).addClass("selected");(v=C.canCreate(b))&&(S.prepend(C.render("option_create",{input:b})),w=e(S[0].childNodes[0])),C.hasOptions=x.items.length>0||v,C.hasOptions?(x.items.length>0?((y=I&&C.getOption(I))&&y.length?m=y:"single"===C.settings.mode&&C.items.length&&(m=C.getOption(C.items[0])),m&&m.length||(m=w&&!C.settings.addPrecedence?C.getAdjacentOption(w,1):S.find("[data-selectable]:first"))):m=w,C.setActiveOption(m),t&&!C.isOpen&&C.open()):(C.setActiveOption(null),t&&C.isOpen&&C.close())},addOption:function(t){var n,i,o,s=this;if(e.isArray(t))for(n=0,i=t.length;n<i;n++)s.addOption(t[n]);else(o=s.registerOption(t))&&(s.userOptions[o]=!0,s.lastQuery=null,s.trigger("option_add",o,t))},registerOption:function(e){var t=u(e[this.settings.valueField]);return void 0!==t&&null!==t&&!this.options.hasOwnProperty(t)&&(e.$order=e.$order||++this.order,this.options[t]=e,t)},registerOptionGroup:function(e){var t=u(e[this.settings.optgroupValueField]);return!!t&&(e.$order=e.$order||++this.order,this.optgroups[t]=e,t)},addOptionGroup:function(e,t){t[this.settings.optgroupValueField]=e,(e=this.registerOptionGroup(t))&&this.trigger("optgroup_add",e,t)},removeOptionGroup:function(e){this.optgroups.hasOwnProperty(e)&&(delete this.optgroups[e],this.renderCache={},this.trigger("optgroup_remove",e))},clearOptionGroups:function(){this.optgroups={},this.renderCache={},this.trigger("optgroup_clear")},updateOption:function(t,n){var i,o,s,r,a,l,p,d=this;if(t=u(t),s=u(n[d.settings.valueField]),null!==t&&d.options.hasOwnProperty(t)){if("string"!=typeof s)throw new Error("Value must be set in option data");p=d.options[t].$order,s!==t&&(delete d.options[t],-1!==(r=d.items.indexOf(t))&&d.items.splice(r,1,s)),n.$order=n.$order||p,d.options[s]=n,a=d.renderCache.item,l=d.renderCache.option,a&&(delete a[t],delete a[s]),l&&(delete l[t],delete l[s]),-1!==d.items.indexOf(s)&&(i=d.getItem(t),o=e(d.render("item",n)),i.hasClass("active")&&o.addClass("active"),i.replaceWith(o)),d.lastQuery=null,d.isOpen&&d.refreshOptions(!1)}},removeOption:function(e,t){var n=this;e=u(e);var i=n.renderCache.item,o=n.renderCache.option;i&&delete i[e],o&&delete o[e],delete n.userOptions[e],delete n.options[e],n.lastQuery=null,n.trigger("option_remove",e),n.removeItem(e,t)},clearOptions:function(){var t=this;t.loadedSearches={},t.userOptions={},t.renderCache={};var n=t.options;e.each(t.options,function(e,i){-1==t.items.indexOf(e)&&delete n[e]}),t.options=t.sifter.items=n,t.lastQuery=null,t.trigger("option_clear")},getOption:function(e){return this.getElementWithValue(e,this.$dropdown_content.find("[data-selectable]"))},getAdjacentOption:function(t,n){var i=this.$dropdown.find("[data-selectable]"),o=i.index(t)+n;return o>=0&&o<i.length?i.eq(o):e()},getElementWithValue:function(t,n){if(void 0!==(t=u(t))&&null!==t)for(var i=0,o=n.length;i<o;i++)if(n[i].getAttribute("data-value")===t)return e(n[i]);return e()},getItem:function(e){return this.getElementWithValue(e,this.$control.children())},addItems:function(t,n){this.buffer=document.createDocumentFragment();for(var i=this.$control[0].childNodes,o=0;o<i.length;o++)this.buffer.appendChild(i[o]);for(var s=e.isArray(t)?t:[t],r=(o=0,s.length);o<r;o++)this.isPending=o<r-1,this.addItem(s[o],n);var a=this.$control[0];a.insertBefore(this.buffer,a.firstChild),this.buffer=null},addItem:function(t,n){h(this,n?[]:["change"],function(){var i,o,s,r,a,l=this,p=l.settings.mode;t=u(t),-1===l.items.indexOf(t)?l.options.hasOwnProperty(t)&&("single"===p&&l.clear(n),"multi"===p&&l.isFull()||(i=e(l.render("item",l.options[t])),a=l.isFull(),l.items.splice(l.caretPos,0,t),l.insertAtCaret(i),(!l.isPending||!a&&l.isFull())&&l.refreshState(),l.isSetup&&(s=l.$dropdown_content.find("[data-selectable]"),l.isPending||(o=l.getOption(t),r=l.getAdjacentOption(o,1).attr("data-value"),l.refreshOptions(l.isFocused&&"single"!==p),r&&l.setActiveOption(l.getOption(r))),!s.length||l.isFull()?l.close():l.isPending||l.positionDropdown(),l.updatePlaceholder(),l.trigger("item_add",t,i),l.isPending||l.updateOriginalInput({silent:n})))):"single"===p&&l.close()})},removeItem:function(t,n){var i,o,s,r=this;i=t instanceof e?t:r.getItem(t),t=u(i.attr("data-value")),-1!==(o=r.items.indexOf(t))&&(i.remove(),i.hasClass("active")&&(s=r.$activeItems.indexOf(i[0]),r.$activeItems.splice(s,1)),r.items.splice(o,1),r.lastQuery=null,!r.settings.persist&&r.userOptions.hasOwnProperty(t)&&r.removeOption(t,n),o<r.caretPos&&r.setCaret(r.caretPos-1),r.refreshState(),r.updatePlaceholder(),r.updateOriginalInput({silent:n}),r.positionDropdown(),r.trigger("item_remove",t,i))},createItem:function(t,n){var i=this,o=i.caretPos;t=t||e.trim(i.$control_input.val()||"");var s=arguments[arguments.length-1];if("function"!=typeof s&&(s=function(){}),"boolean"!=typeof n&&(n=!0),!i.canCreate(t))return s(),!1;i.lock();var r,a,l="function"==typeof i.settings.create?this.settings.create:function(e){var t={};return t[i.settings.labelField]=e,t[i.settings.valueField]=e,t},p=(r=function(e){if(i.unlock(),!e||"object"!=typeof e)return s();var t=u(e[i.settings.valueField]);if("string"!=typeof t)return s();i.setTextboxValue(""),i.addOption(e),i.setCaret(o),i.addItem(t),i.refreshOptions(n&&"single"!==i.settings.mode),s(e)},a=!1,function(){a||(a=!0,r.apply(this,arguments))}),d=l.apply(this,[t,p]);return void 0!==d&&p(d),!0},refreshItems:function(){this.lastQuery=null,this.isSetup&&this.addItem(this.items),this.refreshState(),this.updateOriginalInput()},refreshState:function(){this.refreshValidityState(),this.refreshClasses()},refreshValidityState:function(){if(!this.isRequired)return!1;var e=!this.items.length;this.isInvalid=e,this.$control_input.prop("required",e),this.$input.prop("required",!e)},refreshClasses:function(){var t=this,n=t.isFull(),i=t.isLocked;t.$wrapper.toggleClass("rtl",t.rtl),t.$control.toggleClass("focus",t.isFocused).toggleClass("disabled",t.isDisabled).toggleClass("required",t.isRequired).toggleClass("invalid",t.isInvalid).toggleClass("locked",i).toggleClass("full",n).toggleClass("not-full",!n).toggleClass("input-active",t.isFocused&&!t.isInputHidden).toggleClass("dropdown-active",t.isOpen).toggleClass("has-options",!e.isEmptyObject(t.options)).toggleClass("has-items",t.items.length>0),t.$control_input.data("grow",!n&&!i)},isFull:function(){return null!==this.settings.maxItems&&this.items.length>=this.settings.maxItems},updateOriginalInput:function(e){var t,n,i,o,s=this;if(e=e||{},1===s.tagType){for(i=[],t=0,n=s.items.length;t<n;t++)o=s.options[s.items[t]][s.settings.labelField]||"",i.push('<option value="'+d(s.items[t])+'" selected="selected">'+d(o)+"</option>");i.length||this.$input.attr("multiple")||i.push('<option value="" selected="selected"></option>'),s.$input.html(i.join(""))}else s.$input.val(s.getValue()),s.$input.attr("value",s.$input.val());s.isSetup&&(e.silent||s.trigger("change",s.$input.val()))},updatePlaceholder:function(){if(this.settings.placeholder){var e=this.$control_input;this.items.length?e.removeAttr("placeholder"):e.attr("placeholder",this.settings.placeholder),e.triggerHandler("update",{force:!0})}},open:function(){var e=this;e.isLocked||e.isOpen||"multi"===e.settings.mode&&e.isFull()||(e.focus(),e.isOpen=!0,e.refreshState(),e.$dropdown.css({visibility:"hidden",display:"block"}),e.positionDropdown(),e.$dropdown.css({visibility:"visible"}),e.trigger("dropdown_open",e.$dropdown))},close:function(){var e=this,t=e.isOpen;"single"===e.settings.mode&&e.items.length&&(e.hideInput(),e.isBlurring||e.$control_input.blur()),e.isOpen=!1,e.$dropdown.hide(),e.setActiveOption(null),e.refreshState(),t&&e.trigger("dropdown_close",e.$dropdown)},positionDropdown:function(){var e=this.$control,t="body"===this.settings.dropdownParent?e.offset():e.position();t.top+=e.outerHeight(!0),this.$dropdown.css({width:e[0].getBoundingClientRect().width,top:t.top,left:t.left})},clear:function(e){var t=this;t.items.length&&(t.$control.children(":not(input)").remove(),t.items=[],t.lastQuery=null,t.setCaret(0),t.setActiveItem(null),t.updatePlaceholder(),t.updateOriginalInput({silent:e}),t.refreshState(),t.showInput(),t.trigger("clear"))},insertAtCaret:function(e){var t=Math.min(this.caretPos,this.items.length),n=e[0],i=this.buffer||this.$control[0];0===t?i.insertBefore(n,i.firstChild):i.insertBefore(n,i.childNodes[t]),this.setCaret(t+1)},deleteSelection:function(t){var n,i,o,s,r,a,l,p,u,d=this;if(o=t&&8===t.keyCode?-1:1,s=g(d.$control_input[0]),d.$activeOption&&!d.settings.hideSelected&&(l=d.getAdjacentOption(d.$activeOption,-1).attr("data-value")),r=[],d.$activeItems.length){for(u=d.$control.children(".active:"+(o>0?"last":"first")),a=d.$control.children(":not(input)").index(u),o>0&&a++,n=0,i=d.$activeItems.length;n<i;n++)r.push(e(d.$activeItems[n]).attr("data-value"));t&&(t.preventDefault(),t.stopPropagation())}else(d.isFocused||"single"===d.settings.mode)&&d.items.length&&(o<0&&0===s.start&&0===s.length?r.push(d.items[d.caretPos-1]):o>0&&s.start===d.$control_input.val().length&&r.push(d.items[d.caretPos]));if(!r.length||"function"==typeof d.settings.onDelete&&!1===d.settings.onDelete.apply(d,[r]))return!1;for(void 0!==a&&d.setCaret(a);r.length;)d.removeItem(r.pop());return d.showInput(),d.positionDropdown(),d.refreshOptions(!0),l&&(p=d.getOption(l)).length&&d.setActiveOption(p),!0},advanceSelection:function(e,t){var n,i,o,s,r,a=this;0!==e&&(a.rtl&&(e*=-1),n=e>0?"last":"first",i=g(a.$control_input[0]),a.isFocused&&!a.isInputHidden?(s=a.$control_input.val().length,(e<0?0===i.start&&0===i.length:i.start===s)&&!s&&a.advanceCaret(e,t)):(r=a.$control.children(".active:"+n)).length&&(o=a.$control.children(":not(input)").index(r),a.setActiveItem(null),a.setCaret(e>0?o+1:o)))},advanceCaret:function(e,t){var n,i,o=this;0!==e&&(n=e>0?"next":"prev",o.isShiftDown?(i=o.$control_input[n]()).length&&(o.hideInput(),o.setActiveItem(i),t&&t.preventDefault()):o.setCaret(o.caretPos+e))},setCaret:function(t){var n,i,o,s,r=this;if(t="single"===r.settings.mode?r.items.length:Math.max(0,Math.min(r.items.length,t)),!r.isPending)for(n=0,i=(o=r.$control.children(":not(input)")).length;n<i;n++)s=e(o[n]).detach(),n<t?r.$control_input.before(s):r.$control.append(s);r.caretPos=t},lock:function(){this.close(),this.isLocked=!0,this.refreshState()},unlock:function(){this.isLocked=!1,this.refreshState()},disable:function(){this.$input.prop("disabled",!0),this.$control_input.prop("disabled",!0).prop("tabindex",-1),this.isDisabled=!0,this.lock()},enable:function(){var e=this;e.$input.prop("disabled",!1),e.$control_input.prop("disabled",!1).prop("tabindex",e.tabIndex),e.isDisabled=!1,e.unlock()},destroy:function(){var t=this,n=t.eventNS,i=t.revertSettings;t.trigger("destroy"),t.off(),t.$wrapper.remove(),t.$dropdown.remove(),t.$input.html("").append(i.$children).removeAttr("tabindex").removeClass("selectized").attr({tabindex:i.tabindex}).show(),t.$control_input.removeData("grow"),t.$input.removeData("selectize"),0==--v.count&&v.$testInput&&(v.$testInput.remove(),v.$testInput=void 0),e(window).off(n),e(document).off(n),e(document.body).off(n),delete t.$input[0].selectize},render:function(t,n){var i,o,s="",r=!1,a=this;return"option"!==t&&"item"!==t||(r=!!(i=u(n[a.settings.valueField]))),r&&(p(a.renderCache[t])||(a.renderCache[t]={}),a.renderCache[t].hasOwnProperty(i))?a.renderCache[t][i]:(s=e(a.settings.render[t].apply(this,[n,d])),"option"===t||"option_create"===t?n[a.settings.disabledField]||s.attr("data-selectable",""):"optgroup"===t&&(o=n[a.settings.optgroupValueField]||"",s.attr("data-group",o),n[a.settings.disabledField]&&s.attr("data-disabled","")),"option"!==t&&"item"!==t||s.attr("data-value",i||""),r&&(a.renderCache[t][i]=s[0]),s[0])},clearCache:function(e){void 0===e?this.renderCache={}:delete this.renderCache[e]},canCreate:function(e){if(!this.settings.create)return!1;var t=this.settings.createFilter;return e.length&&("function"!=typeof t||t.apply(this,[e]))&&("string"!=typeof t||new RegExp(t).test(e))&&(!(t instanceof RegExp)||t.test(e))}}),v.count=0,v.defaults={options:[],optgroups:[],plugins:[],delimiter:",",splitOn:null,persist:!0,diacritics:!0,create:!1,createOnBlur:!1,createFilter:null,highlight:!0,openOnFocus:!0,maxOptions:1e3,maxItems:null,hideSelected:null,addPrecedence:!1,selectOnTab:!1,preload:!1,allowEmptyOption:!1,closeAfterSelect:!1,scrollDuration:60,loadThrottle:300,loadingClass:"loading",dataAttr:"data-data",optgroupField:"optgroup",valueField:"value",labelField:"text",disabledField:"disabled",optgroupLabelField:"label",optgroupValueField:"value",lockOptgroupOrder:!1,sortField:"$order",searchField:["text"],searchConjunction:"and",mode:null,wrapperClass:"selectize-control",inputClass:"selectize-input",dropdownClass:"selectize-dropdown",dropdownContentClass:"selectize-dropdown-content",dropdownParent:null,copyClassesToDropdown:!0,render:{}},e.fn.selectize=function(t){var n=e.fn.selectize.defaults,i=e.extend({},n,t),o=i.dataAttr,s=i.labelField,r=i.valueField,a=i.disabledField,l=i.optgroupField,p=i.optgroupLabelField,d=i.optgroupValueField;return this.each(function(){if(!this.selectize){var c=e(this),h=this.tagName.toLowerCase(),g=c.attr("placeholder")||c.attr("data-placeholder");g||i.allowEmptyOption||(g=c.children('option[value=""]').text());var f={placeholder:g,options:[],optgroups:[],items:[]};"select"===h?function(t,n){var c,h,g,f,v=n.options,m={},y=function(e){var t=o&&e.attr(o);return"string"==typeof t&&t.length?JSON.parse(t):null},w=function(t,o){t=e(t);var p=u(t.val());if(p||i.allowEmptyOption)if(m.hasOwnProperty(p)){if(o){var d=m[p][l];d?e.isArray(d)?d.push(o):m[p][l]=[d,o]:m[p][l]=o}}else{var c=y(t)||{};c[s]=c[s]||t.text(),c[r]=c[r]||p,c[a]=c[a]||t.prop("disabled"),c[l]=c[l]||o,m[p]=c,v.push(c),t.is(":selected")&&n.items.push(p)}},O=function(t){var i,o,s,r,l;for((s=(t=e(t)).attr("label"))&&((r=y(t)||{})[p]=s,r[d]=s,r[a]=t.prop("disabled"),n.optgroups.push(r)),i=0,o=(l=e("option",t)).length;i<o;i++)w(l[i],s)};for(n.maxItems=t.attr("multiple")?null:1,c=0,h=(f=t.children()).length;c<h;c++)"optgroup"===(g=f[c].tagName.toLowerCase())?O(f[c]):"option"===g&&w(f[c])}(c,f):function(t,n){var a,l,p,u,d=t.attr(o);if(d)for(n.options=JSON.parse(d),a=0,l=n.options.length;a<l;a++)n.items.push(n.options[a][r]);else{var c=e.trim(t.val()||"");if(!i.allowEmptyOption&&!c.length)return;for(a=0,l=(p=c.split(i.delimiter)).length;a<l;a++)(u={})[s]=p[a],u[r]=p[a],n.options.push(u);n.items=p}}(c,f),new v(c,e.extend(!0,{},n,f,t))}})},e.fn.selectize.defaults=v.defaults,e.fn.selectize.support={validity:l},v.define("drag_drop",function(t){if(!e.fn.sortable)throw new Error('The "drag_drop" plugin requires jQuery UI "sortable".');if("multi"===this.settings.mode){var n,i,o,s=this;s.lock=(n=s.lock,function(){var e=s.$control.data("sortable");return e&&e.disable(),n.apply(s,arguments)}),s.unlock=(i=s.unlock,function(){var e=s.$control.data("sortable");return e&&e.enable(),i.apply(s,arguments)}),s.setup=(o=s.setup,function(){o.apply(this,arguments);var t=s.$control.sortable({items:"[data-value]",forcePlaceholderSize:!0,disabled:s.isLocked,start:function(e,n){n.placeholder.css("width",n.helper.css("width")),t.css({overflow:"visible"})},stop:function(){t.css({overflow:"hidden"});var n=s.$activeItems?s.$activeItems.slice():null,i=[];t.children("[data-value]").each(function(){i.push(e(this).attr("data-value"))}),s.setValue(i),s.setActiveItem(n)}})})}}),v.define("dropdown_header",function(t){var n,i=this;t=e.extend({title:"Untitled",headerClass:"selectize-dropdown-header",titleRowClass:"selectize-dropdown-header-title",labelClass:"selectize-dropdown-header-label",closeClass:"selectize-dropdown-header-close",html:function(e){return'<div class="'+e.headerClass+'"><div class="'+e.titleRowClass+'"><span class="'+e.labelClass+'">'+e.title+'</span><a href="javascript:void(0)" class="'+e.closeClass+'">&times;</a></div></div>'}},t),i.setup=(n=i.setup,function(){n.apply(i,arguments),i.$dropdown_header=e(t.html(t)),i.$dropdown.prepend(i.$dropdown_header)})}),v.define("optgroup_columns",function(t){var n,i=this;t=e.extend({equalizeWidth:!0,equalizeHeight:!0},t),this.getAdjacentOption=function(t,n){var i=t.closest("[data-group]").find("[data-selectable]"),o=i.index(t)+n;return o>=0&&o<i.length?i.eq(o):e()},this.onKeyDown=(n=i.onKeyDown,function(e){var t,o,s,r;return!this.isOpen||37!==e.keyCode&&39!==e.keyCode?n.apply(this,arguments):(i.ignoreHover=!0,t=(r=this.$activeOption.closest("[data-group]")).find("[data-selectable]").index(this.$activeOption),void((o=(s=(r=37===e.keyCode?r.prev("[data-group]"):r.next("[data-group]")).find("[data-selectable]")).eq(Math.min(s.length-1,t))).length&&this.setActiveOption(o)))});var o=function(){var e,t=o.width,n=document;return void 0===t&&((e=n.createElement("div")).innerHTML='<div style="width:50px;height:50px;position:absolute;left:-50px;top:-50px;overflow:auto;"><div style="width:1px;height:100px;"></div></div>',e=e.firstChild,n.body.appendChild(e),t=o.width=e.offsetWidth-e.clientWidth,n.body.removeChild(e)),t},s=function(){var n,s,r,a,l,p,u;if((s=(u=e("[data-group]",i.$dropdown_content)).length)&&i.$dropdown_content.width()){if(t.equalizeHeight){for(r=0,n=0;n<s;n++)r=Math.max(r,u.eq(n).height());u.css({height:r})}t.equalizeWidth&&(p=i.$dropdown_content.innerWidth()-o(),a=Math.round(p/s),u.css({width:a}),s>1&&(l=p-a*(s-1),u.eq(s-1).css({width:l})))}};(t.equalizeHeight||t.equalizeWidth)&&(c.after(this,"positionDropdown",s),c.after(this,"refreshOptions",s))}),v.define("remove_button",function(t){t=e.extend({label:"&times;",title:"Remove",className:"remove",append:!0},t);var n,i,o,s,r;"single"!==this.settings.mode?(s=n=this,r='<a href="javascript:void(0)" class="'+(i=t).className+'" tabindex="-1" title="'+d(i.title)+'">'+i.label+"</a>",n.setup=(o=s.setup,function(){if(i.append){var t=s.settings.render.item;s.settings.render.item=function(e){return i=t.apply(n,arguments),o=r,s=i.search(/(<\/[^>]+>\s*)$/),i.substring(0,s)+o+i.substring(s);var i,o,s}}o.apply(n,arguments),n.$control.on("click","."+i.className,function(t){if(t.preventDefault(),!s.isLocked){var n=e(t.currentTarget).parent();s.setActiveItem(n),s.deleteSelection()&&s.setCaret(s.items.length)}})})):function(t,n){n.className="remove-single";var i,o=t,s='<a href="javascript:void(0)" class="'+n.className+'" tabindex="-1" title="'+d(n.title)+'">'+n.label+"</a>";t.setup=(i=o.setup,function(){if(n.append){var r=e(o.$input.context).attr("id"),a=(e("#"+r),o.settings.render.item);o.settings.render.item=function(n){return i=a.apply(t,arguments),o=s,e("<span>").append(i).append(o);var i,o}}i.apply(t,arguments),t.$control.on("click","."+n.className,function(e){e.preventDefault(),o.isLocked||o.clear()})})}(this,t)}),v.define("restore_on_backspace",function(e){var t,n=this;e.text=e.text||function(e){return e[this.settings.labelField]},this.onKeyDown=(t=n.onKeyDown,function(n){var i,o;return 8===n.keyCode&&""===this.$control_input.val()&&!this.$activeItems.length&&(i=this.caretPos-1)>=0&&i<this.items.length?(o=this.options[this.items[i]],this.deleteSelection(n)&&(this.setTextboxValue(e.text.apply(this,[o])),this.refreshOptions(!0)),void n.preventDefault()):t.apply(this,arguments)})}),v});
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
