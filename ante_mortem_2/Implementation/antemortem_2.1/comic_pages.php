<?php
    include_once 'php/db_connection.php';
    session_start();
    
	//Code for displaying comic pages below
    //$sql = "select * from am_pages";
    //$results = $connection -> query($sql);
    
    //$pages = $results -> fetchALL(PDO::FETCH_OBJ);
	
	//$output = "";
	//foreach ($pages as $page) {
	//	$output .= "<h2 style='color: white'>" . $page -> page_id . "</h2>" . "<img src='" . $page -> page_url . "' rel='page_1'/>";
	//}
    
	//Code for inputting comments
	$output_2 = "";
	
	$output_2 .=	"<form id='create_comment' method='POST' action='php/create_comment.php'>
						<input type='text' name='comment' id='comment' placeholder='Comment'>
						<br />

						<input id='submit' type='submit' value='Submit'>
					</form>";
	
	//Code for displaying comments
	$sql = "select * from am_comments";
    $results = $connection -> query($sql);
    
    $comments = $results -> fetchALL(PDO::FETCH_OBJ);
	
	$output_3 = "";
	
	foreach ($comments as $comment) {
		$output_3 .= "<div class='comment'><h2>" . $comment -> username . "</h2> <hr> <p>" . $comment -> comment . "</p></div>";
			
			//Code for editing comments
			if ($_SESSION['admin']) {
				
				//Code for editing comments
				$output_3 .= "<form id='edit_comment' method='POST' action='php/edit_comment.php'>
								<input type='text' name='edit_comment' id='edit_comment' placeholder='Edit'>
								<br />
								
								<input type='hidden' name='comment_id' value='$comment->comment_id' />

								<input id='edit' type='submit' value='Edit'>
							  </form>";
			
				//Code for deleting comments
				$output_3 .= "<form id='edit_comment' method='POST' action='php/delete_comment.php'>
								<input type='hidden' name='comment_id' value='$comment->comment_id' />

								<input id='delete' type='submit' value='Delete'>
							  </form>";
			}
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>AM - Comic Pages</title>
		
		<!-- Viewport tag provides scaling -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/comic_pages.css" media="screen"> 
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
		
		<!-- Imports Google icons -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		
		<!-- Imports jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
		<script type="text/javascript">
			(function(f,g,c,h,e,k,i){/*! Jssor */
			new(function(){});var d={Fc:function(a){return a},Od:function(a){return-a*(a-2)}};var b=new function(){var j=this,xb=/\S+/g,F=1,wb=2,cb=3,bb=4,fb=5,G,r=0,l=0,s=0,Y=0,A=0,I=navigator,kb=I.appName,o=I.userAgent,p=parseFloat;function Fb(){if(!G){G={te:"ontouchstart"in f||"createTouch"in g};var a;if(I.pointerEnabled||(a=I.msPointerEnabled))G.gd=a?"msTouchAction":"touchAction"}return G}function v(i){if(!r){r=-1;if(kb=="Microsoft Internet Explorer"&&!!f.attachEvent&&!!f.ActiveXObject){var e=o.indexOf("MSIE");r=F;s=p(o.substring(e+5,o.indexOf(";",e)));/*@cc_on Y=@_jscript_version@*/;l=g.documentMode||s}else if(kb=="Netscape"&&!!f.addEventListener){var d=o.indexOf("Firefox"),b=o.indexOf("Safari"),h=o.indexOf("Chrome"),c=o.indexOf("AppleWebKit");if(d>=0){r=wb;l=p(o.substring(d+8))}else if(b>=0){var j=o.substring(0,b).lastIndexOf("/");r=h>=0?bb:cb;l=p(o.substring(j+1,b))}else{var a=/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(o);if(a){r=F;l=s=p(a[1])}}if(c>=0)A=p(o.substring(c+12))}else{var a=/(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(o);if(a){r=fb;l=p(a[2])}}}return i==r}function q(){return v(F)}function vb(){return q()&&(l<6||g.compatMode=="BackCompat")}function ab(){return v(cb)}function eb(){return v(fb)}function rb(){return ab()&&A>534&&A<535}function J(){v();return A>537||l>42||r==F&&l>=11}function tb(){return q()&&l<9}function sb(a){var b,c;return function(f){if(!b){b=e;var d=a.substr(0,1).toUpperCase()+a.substr(1);n([a].concat(["WebKit","ms","Moz","O","webkit"]),function(g,e){var b=a;if(e)b=g+d;if(f.style[b]!=i)return c=b})}return c}}function qb(b){var a;return function(c){a=a||sb(b)(c)||b;return a}}var K=qb("transform");function jb(a){return{}.toString.call(a)}var gb={};n(["Boolean","Number","String","Function","Array","Date","RegExp","Object"],function(a){gb["[object "+a+"]"]=a.toLowerCase()});function n(b,d){var a,c;if(jb(b)=="[object Array]"){for(a=0;a<b.length;a++)if(c=d(b[a],a,b))return c}else for(a in b)if(c=d(b[a],a,b))return c}function D(a){return a==h?String(a):gb[jb(a)]||"object"}function hb(a){for(var b in a)return e}function B(a){try{return D(a)=="object"&&!a.nodeType&&a!=a.window&&(!a.constructor||{}.hasOwnProperty.call(a.constructor.prototype,"isPrototypeOf"))}catch(b){}}function u(a,b){return{x:a,y:b}}function nb(b,a){setTimeout(b,a||0)}function H(b,d,c){var a=!b||b=="inherit"?"":b;n(d,function(c){var b=c.exec(a);if(b){var d=a.substr(0,b.index),e=a.substr(b.index+b[0].length+1,a.length-1);a=d+e}});a=c+(!a.indexOf(" ")?"":" ")+a;return a}function pb(b,a){if(l<9)b.style.filter=a}j.ie=Fb;j.hd=q;j.ee=ab;j.be=J;sb("transform");j.nd=function(){return l};j.Xc=nb;function V(a){a.constructor===V.caller&&a.Vc&&a.Vc.apply(a,V.caller.arguments)}j.Vc=V;j.jb=function(a){if(j.Yd(a))a=g.getElementById(a);return a};function t(a){return a||f.event}j.qc=t;j.Ob=function(b){b=t(b);var a=b.target||b.srcElement||g;if(a.nodeType==3)a=j.rc(a);return a};j.uc=function(a){a=t(a);return{x:a.pageX||a.clientX||0,y:a.pageY||a.clientY||0}};function w(c,d,a){if(a!==i)c.style[d]=a==i?"":a;else{var b=c.currentStyle||c.style;a=b[d];if(a==""&&f.getComputedStyle){b=c.ownerDocument.defaultView.getComputedStyle(c,h);b&&(a=b.getPropertyValue(d)||b[d])}return a}}function X(b,c,a,d){if(a!==i){if(a==h)a="";else d&&(a+="px");w(b,c,a)}else return p(w(b,c))}function m(c,a){var d=a?X:w,b;if(a&4)b=qb(c);return function(e,f){return d(e,b?b(e):c,f,a&2)}}function Ab(b){if(q()&&s<9){var a=/opacity=([^)]*)/.exec(b.style.filter||"");return a?p(a[1])/100:1}else return p(b.style.opacity||"1")}function Cb(b,a,f){if(q()&&s<9){var h=b.style.filter||"",i=new RegExp(/[\s]*alpha\([^\)]*\)/g),e=c.round(100*a),d="";if(e<100||f)d="alpha(opacity="+e+") ";var g=H(h,[i],d);pb(b,g)}else b.style.opacity=a==1?"":c.round(a*100)/100}var L={X:["rotate"],S:["rotateX"],Q:["rotateY"],Ib:["skewX"],yb:["skewY"]};if(!J())L=C(L,{u:["scaleX",2],s:["scaleY",2],G:["translateZ",1]});function M(d,a){var c="";if(a){if(q()&&l&&l<10){delete a.S;delete a.Q;delete a.G}b.f(a,function(d,b){var a=L[b];if(a){var e=a[1]||0;if(N[b]!=d)c+=" "+a[0]+"("+d+(["deg","px",""])[e]+")"}});if(J()){if(a.W||a.ab||a.G!=i)c+=" translate3d("+(a.W||0)+"px,"+(a.ab||0)+"px,"+(a.G||0)+"px)";if(a.u==i)a.u=1;if(a.s==i)a.s=1;if(a.u!=1||a.s!=1)c+=" scale3d("+a.u+", "+a.s+", 1)"}}d.style[K(d)]=c}j.Dc=m("transformOrigin",4);j.Re=m("backfaceVisibility",4);j.Qe=m("transformStyle",4);j.Pe=m("perspective",6);j.Oe=m("perspectiveOrigin",4);j.Ne=function(a,b){if(q()&&s<9||s<10&&vb())a.style.zoom=b==1?"":b;else{var c=K(a),f="scale("+b+")",e=a.style[c],g=new RegExp(/[\s]*scale\(.*?\)/g),d=H(e,[g],f);a.style[c]=d}};j.Ub=function(b,a){return function(c){c=t(c);var e=c.type,d=c.relatedTarget||(e=="mouseout"?c.toElement:c.fromElement);(!d||d!==a&&!j.Le(a,d))&&b(c)}};j.a=function(a,d,b,c){a=j.jb(a);if(a.addEventListener){d=="mousewheel"&&a.addEventListener("DOMMouseScroll",b,c);a.addEventListener(d,b,c)}else if(a.attachEvent){a.attachEvent("on"+d,b);c&&a.setCapture&&a.setCapture()}};j.C=function(a,c,d,b){a=j.jb(a);if(a.removeEventListener){c=="mousewheel"&&a.removeEventListener("DOMMouseScroll",d,b);a.removeEventListener(c,d,b)}else if(a.detachEvent){a.detachEvent("on"+c,d);b&&a.releaseCapture&&a.releaseCapture()}};j.Cb=function(a){a=t(a);a.preventDefault&&a.preventDefault();a.cancel=e;a.returnValue=k};j.Te=function(a){a=t(a);a.stopPropagation&&a.stopPropagation();a.cancelBubble=e};j.D=function(d,c){var a=[].slice.call(arguments,2),b=function(){var b=a.concat([].slice.call(arguments,0));return c.apply(d,b)};return b};j.Rc=function(a,b){if(b==i)return a.textContent||a.innerText;var c=g.createTextNode(b);j.Rb(a);a.appendChild(c)};j.Fb=function(d,c){for(var b=[],a=d.firstChild;a;a=a.nextSibling)(c||a.nodeType==1)&&b.push(a);return b};function ib(a,c,e,b){b=b||"u";for(a=a?a.firstChild:h;a;a=a.nextSibling)if(a.nodeType==1){if(S(a,b)==c)return a;if(!e){var d=ib(a,c,e,b);if(d)return d}}}j.o=ib;function Q(a,d,f,b){b=b||"u";var c=[];for(a=a?a.firstChild:h;a;a=a.nextSibling)if(a.nodeType==1){S(a,b)==d&&c.push(a);if(!f){var e=Q(a,d,f,b);if(e.length)c=c.concat(e)}}return c}j.ye=Q;function db(a,c,d){for(a=a?a.firstChild:h;a;a=a.nextSibling)if(a.nodeType==1){if(a.tagName==c)return a;if(!d){var b=db(a,c,d);if(b)return b}}}j.xe=db;j.ue=function(b,a){return b.getElementsByTagName(a)};function C(){var e=arguments,d,c,b,a,g=1&e[0],f=1+g;d=e[f-1]||{};for(;f<e.length;f++)if(c=e[f])for(b in c){a=c[b];if(a!==i){a=c[b];var h=d[b];d[b]=g&&(B(h)||B(a))?C(g,{},h,a):a}}return d}j.Z=C;function W(f,g){var d={},c,a,b;for(c in f){a=f[c];b=g[c];if(a!==b){var e;if(B(a)&&B(b)){a=W(a,b);e=!hb(a)}!e&&(d[c]=a)}}return d}j.Kc=function(a){return D(a)=="function"};j.Yd=function(a){return D(a)=="string"};j.wd=function(a){return!isNaN(p(a))&&isFinite(a)};j.f=n;function P(a){return g.createElement(a)}j.lb=function(){return P("DIV")};j.td=function(){return P("SPAN")};j.Pc=function(){};function T(b,c,a){if(a==i)return b.getAttribute(c);b.setAttribute(c,a)}function S(a,b){return T(a,b)||T(a,"data-"+b)}j.n=T;j.g=S;function y(b,a){if(a==i)return b.className;b.className=a}j.Sc=y;function mb(b){var a={};n(b,function(b){if(b!=i)a[b]=b});return a}function ob(b,a){return b.match(a||xb)}function O(b,a){return mb(ob(b||"",a))}j.Sd=ob;function Z(b,c){var a="";n(c,function(c){a&&(a+=b);a+=c});return a}function E(a,c,b){y(a,Z(" ",C(W(O(y(a)),O(c)),O(b))))}j.rc=function(a){return a.parentNode};j.M=function(a){j.L(a,"none")};j.V=function(a,b){j.L(a,b?"none":"")};j.Ld=function(b,a){b.removeAttribute(a)};j.yd=function(){return q()&&l<10};j.Ad=function(d,a){if(a)d.style.clip="rect("+c.round(a.j||a.p||0)+"px "+c.round(a.B)+"px "+c.round(a.A)+"px "+c.round(a.l||a.q||0)+"px)";else if(a!==i){var g=d.style.cssText,f=[new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i),new RegExp(/[\s]*cliptop: .*?[;]?/i),new RegExp(/[\s]*clipright: .*?[;]?/i),new RegExp(/[\s]*clipbottom: .*?[;]?/i),new RegExp(/[\s]*clipleft: .*?[;]?/i)],e=H(g,f,"");b.rb(d,e)}};j.I=function(){return+new Date};j.E=function(b,a){b.appendChild(a)};j.Gb=function(b,a,c){(c||a.parentNode).insertBefore(b,a)};j.Eb=function(b,a){a=a||b.parentNode;a&&a.removeChild(b)};j.vd=function(a,b){n(a,function(a){j.Eb(a,b)})};j.Rb=function(a){j.vd(j.Fb(a,e),a)};j.rd=function(a,b){var c=j.rc(a);b&1&&j.H(a,(j.k(c)-j.k(a))/2);b&2&&j.F(a,(j.m(c)-j.m(a))/2)};j.xd=function(b,a){return parseInt(b,a||10)};j.Ke=p;j.Le=function(b,a){var c=g.body;while(a&&b!==a&&c!==a)try{a=a.parentNode}catch(d){return k}return b===a};function U(d,c,b){var a=d.cloneNode(!c);!b&&j.Ld(a,"id");return a}j.sb=U;j.fb=function(d,f){var a=new Image;function b(e,d){j.C(a,"load",b);j.C(a,"abort",c);j.C(a,"error",c);f&&f(a,d)}function c(a){b(a,e)}if(eb()&&l<11.6||!d)b(!d);else{j.a(a,"load",b);j.a(a,"abort",c);j.a(a,"error",c);a.src=d}};j.Id=function(d,a,e){var c=d.length+1;function b(b){c--;if(a&&b&&b.src==a.src)a=b;!c&&e&&e(a)}n(d,function(a){j.fb(a.src,b)});b()};j.Hd=function(a,g,i,h){if(h)a=U(a);var c=Q(a,g);if(!c.length)c=b.ue(a,g);for(var f=c.length-1;f>-1;f--){var d=c[f],e=U(i);y(e,y(d));b.rb(e,d.style.cssText);b.Gb(e,d);b.Eb(d)}return a};function Db(a){var l=this,p="",r=["av","pv","ds","dn"],e=[],q,k=0,f=0,d=0;function h(){E(a,q,e[d||k||f&2||f]);b.K(a,"pointer-events",d?"none":"")}function c(){k=0;h();j.C(g,"mouseup",c);j.C(g,"touchend",c);j.C(g,"touchcancel",c)}function o(a){if(d)j.Cb(a);else{k=4;h();j.a(g,"mouseup",c);j.a(g,"touchend",c);j.a(g,"touchcancel",c)}}l.Qd=function(a){if(a===i)return f;f=a&2||a&1;h()};l.zb=function(a){if(a===i)return!d;d=a?0:3;h()};l.J=a=j.jb(a);var m=b.Sd(y(a));if(m)p=m.shift();n(r,function(a){e.push(p+a)});q=Z(" ",e);e.unshift("");j.a(a,"mousedown",o);j.a(a,"touchstart",o)}j.bc=function(a){return new Db(a)};j.K=w;j.Ab=m("overflow");j.F=m("top",2);j.H=m("left",2);j.k=m("width",2);j.m=m("height",2);j.ac=m("marginLeft",2);j.ec=m("marginTop",2);j.z=m("position");j.L=m("display");j.v=m("zIndex",1);j.Zb=function(b,a,c){if(a!=i)Cb(b,a,c);else return Ab(b)};j.rb=function(a,b){if(b!=i)a.style.cssText=b;else return a.style.cssText};j.Fe=function(b,a){if(a===i){a=w(b,"backgroundImage")||"";var c=/\burl\s*\(\s*["']?([^"'\r\n,]+)["']?\s*\)/gi.exec(a)||[];return c[1]}w(b,"backgroundImage",a?"url('"+a+"')":"")};var R={qb:j.Zb,j:j.F,l:j.H,Kb:j.k,xb:j.m,ob:j.z,df:j.L,nb:j.v};function x(f,l){var e=tb(),b=J(),d=rb(),g=K(f);function k(b,d,a){var e=b.eb(u(-d/2,-a/2)),f=b.eb(u(d/2,-a/2)),g=b.eb(u(d/2,a/2)),h=b.eb(u(-d/2,a/2));b.eb(u(300,300));return u(c.min(e.x,f.x,g.x,h.x)+d/2,c.min(e.y,f.y,g.y,h.y)+a/2)}function a(d,a){a=a||{};var n=a.G||0,p=(a.S||0)%360,q=(a.Q||0)%360,u=(a.X||0)%360,l=a.u,m=a.s,f=a.cf;if(l==i)l=1;if(m==i)m=1;if(f==i)f=1;if(e){n=0;p=0;q=0;f=0}var c=new zb(a.W,a.ab,n);c.S(p);c.Q(q);c.Ed(u);c.Td(a.Ib,a.yb);c.Yb(l,m,f);if(b){c.pb(a.q,a.p);d.style[g]=c.Jd()}else if(!Y||Y<9){var o="",h={x:0,y:0};if(a.N)h=k(c,a.N,a.db);j.ec(d,h.y);j.ac(d,h.x);o=c.Ud();var s=d.style.filter,t=new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g),r=H(s,[t],o);pb(d,r)}}x=function(e,c){c=c||{};var g=c.q,k=c.p,f;n(R,function(a,b){f=c[b];f!==i&&a(e,f)});j.Ad(e,c.c);if(!b){g!=i&&j.H(e,(c.md||0)+g);k!=i&&j.F(e,(c.kd||0)+k)}if(c.zd)if(d)nb(j.D(h,M,e,c));else a(e,c)};j.mb=M;if(d)j.mb=x;if(e)j.mb=a;else if(!b)a=M;j.O=x;x(f,l)}j.mb=x;j.O=x;function zb(j,k,o){var d=this,b=[1,0,0,0,0,1,0,0,0,0,1,0,j||0,k||0,o||0,1],i=c.sin,g=c.cos,l=c.tan;function f(a){return a*c.PI/180}function n(a,b){return{x:a,y:b}}function m(c,e,l,m,o,r,t,u,w,z,A,C,E,b,f,k,a,g,i,n,p,q,s,v,x,y,B,D,F,d,h,j){return[c*a+e*p+l*x+m*F,c*g+e*q+l*y+m*d,c*i+e*s+l*B+m*h,c*n+e*v+l*D+m*j,o*a+r*p+t*x+u*F,o*g+r*q+t*y+u*d,o*i+r*s+t*B+u*h,o*n+r*v+t*D+u*j,w*a+z*p+A*x+C*F,w*g+z*q+A*y+C*d,w*i+z*s+A*B+C*h,w*n+z*v+A*D+C*j,E*a+b*p+f*x+k*F,E*g+b*q+f*y+k*d,E*i+b*s+f*B+k*h,E*n+b*v+f*D+k*j]}function e(c,a){return m.apply(h,(a||b).concat(c))}d.Yb=function(a,c,d){if(a!=1||c!=1||d!=1)b=e([a,0,0,0,0,c,0,0,0,0,d,0,0,0,0,1])};d.pb=function(a,c,d){b[12]+=a||0;b[13]+=c||0;b[14]+=d||0};d.S=function(c){if(c){a=f(c);var d=g(a),h=i(a);b=e([1,0,0,0,0,d,h,0,0,-h,d,0,0,0,0,1])}};d.Q=function(c){if(c){a=f(c);var d=g(a),h=i(a);b=e([d,0,-h,0,0,1,0,0,h,0,d,0,0,0,0,1])}};d.Ed=function(c){if(c){a=f(c);var d=g(a),h=i(a);b=e([d,h,0,0,-h,d,0,0,0,0,1,0,0,0,0,1])}};d.Td=function(a,c){if(a||c){j=f(a);k=f(c);b=e([1,l(k),0,0,l(j),1,0,0,0,0,1,0,0,0,0,1])}};d.eb=function(c){var a=e(b,[1,0,0,0,0,1,0,0,0,0,1,0,c.x,c.y,0,1]);return n(a[12],a[13])};d.Jd=function(){return"matrix3d("+b.join(",")+")"};d.Ud=function(){return"progid:DXImageTransform.Microsoft.Matrix(M11="+b[0]+", M12="+b[4]+", M21="+b[1]+", M22="+b[5]+", SizingMethod='auto expand')"}}new function(){var a=this;function b(d,g){for(var j=d[0].length,i=d.length,h=g[0].length,f=[],c=0;c<i;c++)for(var k=f[c]=[],b=0;b<h;b++){for(var e=0,a=0;a<j;a++)e+=d[c][a]*g[a][b];k[b]=e}return f}a.u=function(b,c){return a.Ec(b,c,0)};a.s=function(b,c){return a.Ec(b,0,c)};a.Ec=function(a,c,d){return b(a,[[c,0],[0,d]])};a.eb=function(d,c){var a=b(d,[[c.x],[c.y]]);return u(a[0][0],a[1][0])}};var N={md:0,kd:0,q:0,p:0,bb:1,u:1,s:1,X:0,S:0,Q:0,W:0,ab:0,G:0,Ib:0,yb:0};j.Rd=function(c,d){var a=c||{};if(c)if(b.Kc(c))a={P:a};else if(b.Kc(c.c))a.c={P:c.c};a.P=a.P||d;if(a.c)a.c.P=a.c.P||d;return a};j.qd=function(l,m,x,q,z,A,n){var a=m;if(l){a={};for(var g in m){var B=A[g]||1,w=z[g]||[0,1],f=(x-w[0])/w[1];f=c.min(c.max(f,0),1);f=f*B;var u=c.floor(f);if(f!=u)f-=u;var j=q.P||d.Fc,k,C=l[g],o=m[g];if(b.wd(o)){j=q[g]||j;var y=j(f);k=C+o*y}else{k=b.Z({Bb:{}},l[g]);var v=q[g]||{};b.f(o.Bb||o,function(d,a){j=v[a]||v.P||j;var c=j(f),b=d*c;k.Bb[a]=b;k[a]+=b})}a[g]=k}var t=b.f(m,function(b,a){return N[a]!=i});t&&b.f(N,function(c,b){if(a[b]==i&&l[b]!==i)a[b]=l[b]});if(t){if(a.bb)a.u=a.s=a.bb;a.N=n.N;a.db=n.db;a.zd=e}}if(m.c&&n.pb){var p=a.c.Bb,s=(p.j||0)+(p.A||0),r=(p.l||0)+(p.B||0);a.l=(a.l||0)+r;a.j=(a.j||0)+s;a.c.l-=r;a.c.B-=r;a.c.j-=s;a.c.A-=s}if(a.c&&b.yd()&&!a.c.j&&!a.c.l&&!a.c.p&&!a.c.q&&a.c.B==n.N&&a.c.A==n.db)a.c=h;return a}};function m(){var a=this,d=[];function i(a,b){d.push({Vb:a,Tb:b})}function h(a,c){b.f(d,function(b,e){b.Vb==a&&b.Tb===c&&d.splice(e,1)})}a.hb=a.addEventListener=i;a.removeEventListener=h;a.i=function(a){var c=[].slice.call(arguments,1);b.f(d,function(b){b.Vb==a&&b.Tb.apply(f,c)})}}var l=function(z,E,g,K,N,M){z=z||0;var a=this,q,o,p,u,B=0,H,I,G,C,y=0,j=0,m=0,F,l,i,d,n,D,w=[],x;function P(a){i+=a;d+=a;l+=a;j+=a;m+=a;y+=a}function t(p){var f=p;if(n)if(!D&&(f>=d||f<i)||D&&f>=n)f=((f-i)%n+n)%n+i;if(!F||u||j!=f){var h=c.min(f,d);h=c.max(h,i);if(!F||u||h!=m){if(M){var k=(h-l)/(E||1);if(g.Ce)k=1-k;var o=b.qd(N,M,k,H,G,I,g);if(x)b.f(o,function(b,a){x[a]&&x[a](K,b)});else b.O(K,o)}a.cc(m-l,h-l);var r=m,q=m=h;b.f(w,function(b,c){var a=f<=j?w[w.length-c-1]:b;a.R(m-y)});j=f;F=e;a.Lb(r,q)}}}function A(a,b,e){b&&a.Pb(d);if(!e){i=c.min(i,a.Qc()+y);d=c.max(d,a.Mb()+y)}w.push(a)}var r=f.requestAnimationFrame||f.webkitRequestAnimationFrame||f.mozRequestAnimationFrame||f.msRequestAnimationFrame;if(b.ee()&&b.nd()<7)r=h;r=r||function(a){b.Xc(a,g.yc)};function J(){if(q){var d=b.I(),e=c.min(d-B,g.wc),a=j+e*p;B=d;if(a*p>=o*p)a=o;t(a);if(!u&&a*p>=o*p)L(C);else r(J)}}function s(f,g,h){if(!q){q=e;u=h;C=g;f=c.max(f,i);f=c.min(f,d);o=f;p=o<j?-1:1;a.vc();B=b.I();r(J)}}function L(b){if(q){u=q=C=k;a.Wc();b&&b()}}a.sc=function(a,b,c){s(a?j+a:d,b,c)};a.fd=s;a.cb=L;a.je=function(a){s(a)};a.U=function(){return j};a.bd=function(){return o};a.ib=function(){return m};a.R=t;a.pb=function(a){t(j+a)};a.od=function(){return q};a.Ae=function(a){n=a};a.Pb=P;a.Jc=function(a,b){A(a,0,b)};a.Sb=function(a){A(a,1)};a.Qc=function(){return i};a.Mb=function(){return d};a.Lb=a.vc=a.Wc=a.cc=b.Pc;a.Wb=b.I();g=b.Z({yc:16,wc:50},g);n=g.Xb;D=g.Md;x=g.Dd;i=l=z;d=z+E;I=g.sd||{};G=g.ze||{};H=b.Rd(g.tb)};new(function(){});var j=function(q,fc){var o=this;function Bc(){var a=this;l.call(a,-1e8,2e8);a.ke=function(){var b=a.ib(),d=c.floor(b),f=t(d),e=b-c.floor(b);return{Y:f,le:d,ob:e}};a.Lb=function(b,a){var d=c.floor(a);if(d!=a&&a>b)d++;Tb(d,e);o.i(j.me,t(a),t(b),a,b)}}function Ac(){var a=this;l.call(a,0,0,{Xb:r});b.f(A,function(b){D&1&&b.Ae(r);a.Sb(b);b.Pb(kb/bc)})}function zc(){var a=this,b=Ub.J;l.call(a,-1,2,{tb:d.Fc,Dd:{ob:Zb},Xb:r},b,{ob:1},{ob:-2});a.Qb=b}function mc(n,m){var b=this,d,f,g,i,c;l.call(b,-1e8,2e8,{wc:100});b.vc=function(){O=e;R=h;o.i(j.oe,t(w.U()),w.U())};b.Wc=function(){O=k;i=k;var a=w.ke();o.i(j.pe,t(w.U()),w.U());!a.ob&&Dc(a.le,s)};b.Lb=function(j,h){var b;if(i)b=c;else{b=f;if(g){var e=h/g;b=a.qe(e)*(f-d)+d}}w.R(b)};b.Jb=function(a,e,c,h){d=a;f=e;g=c;w.R(a);b.R(0);b.fd(c,h)};b.re=function(a){i=e;c=a;b.sc(a,h,e)};b.se=function(a){c=a};w=new Bc;w.Jc(n);w.Jc(m)}function oc(){var c=this,a=Xb();b.v(a,0);b.K(a,"pointerEvents","none");c.J=a;c.Hb=function(){b.M(a);b.Rb(a)}}function xc(n,f){var d=this,q,N,v,i,y=[],x,C,W,H,S,F,g,w,p;l.call(d,-u,u+1,{});function E(a){q&&q.ad();T(n,a,0);F=e;q=new J.T(n,J,b.Ke(b.g(n,"idle"))||lc,!I);q.R(0)}function Z(){q.Wb<J.Wb&&E()}function O(p,r,n){if(!H){H=e;if(i&&n){var g=n.width,c=n.height,m=g,l=c;if(g&&c&&a.wb){if(a.wb&3&&(!(a.wb&4)||g>L||c>K)){var h=k,q=L/K*c/g;if(a.wb&1)h=q>1;else if(a.wb&2)h=q<1;m=h?g*K/c:L;l=h?K:c*L/g}b.k(i,m);b.m(i,l);b.F(i,(K-l)/2);b.H(i,(L-m)/2)}b.z(i,"absolute");o.i(j.Wd,f)}}b.M(r);p&&p(d)}function Y(b,c,e,g){if(g==R&&s==f&&I)if(!Cc){var a=t(b);B.ce(a,f,c,d,e);c.Ie();U.Pb(a-U.Qc()-1);U.R(a);z.Jb(b,b,0)}}function bb(b){if(b==R&&s==f){if(!g){var a=h;if(B)if(B.Y==f)a=B.ge();else B.Hb();Z();g=new vc(n,f,a,q);g.Zc(p)}!g.od()&&g.dc()}}function G(e,i,l){if(e==f){if(e!=i)A[i]&&A[i].pc();else!l&&g&&g.Ee();p&&p.zb();var m=R=b.I();d.fb(b.D(h,bb,m))}else{var k=c.min(f,e),j=c.max(f,e),o=c.min(j-k,k+r-j),n=u+a.Bd-1;(!S||o<=n)&&d.fb()}}function db(){if(s==f&&g){g.cb();p&&p.Nd();p&&p.pd();g.cd()}}function eb(){s==f&&g&&g.cb()}function ab(a){!P&&o.i(j.Ue,f,a)}function Q(){p=w.pInstance;g&&g.Zc(p)}d.fb=function(c,a){a=a||v;if(y.length&&!H){b.V(a);if(!W){W=e;o.i(j.Vd,f);b.f(y,function(a){if(!b.n(a,"src")){a.src=b.g(a,"src2")||"";b.L(a,a["display-origin"])}})}b.Id(y,i,b.D(h,O,c,a))}else O(c,a)};d.Je=function(){var j=f;if(a.Yc<0)j-=r;var e=j+a.Yc*tc;if(D&2)e=t(e);if(!(D&1)&&!ib)e=c.max(0,c.min(e,r-u));if(e!=f){if(B){var g=B.Zd(r);if(g){var k=R=b.I(),i=A[t(e)];return i.fb(b.D(h,Y,e,i,g,k),v)}}cb(e)}else if(a.vb){d.pc();G(f,f)}};d.nc=function(){G(f,f,e)};d.pc=function(){p&&p.Nd();p&&p.pd();d.dd();g&&g.ne();g=h;E()};d.Ie=function(){b.M(n)};d.dd=function(){b.V(n)};d.ae=function(){p&&p.zb()};function T(a,c,d){if(b.n(a,"jssor-slider"))return;if(!F){if(a.tagName=="IMG"){y.push(a);if(!b.n(a,"src")){S=e;a["display-origin"]=b.L(a);b.M(a)}}var f=b.Fe(a);if(f){var g=new Image;b.g(g,"src2",f);y.push(g)}if(d){b.v(a,(b.v(a)||0)+1);b.ec(a,b.ec(a)||0);b.ac(a,b.ac(a)||0);b.mb(a,{G:0})}}var h=b.Fb(a);b.f(h,function(f){var h=f.tagName,j=b.g(f,"u");if(j=="player"&&!w){w=f;if(w.pInstance)Q();else b.a(w,"dataavailable",Q)}if(j=="caption"){if(c){b.Dc(f,b.g(f,"to"));b.Re(f,b.g(f,"bf"));b.g(f,"3d")&&b.Qe(f,"preserve-3d")}else if(!b.hd()){var g=b.sb(f,k,e);b.Gb(g,f,a);b.Eb(f,a);f=g;c=e}}else if(!F&&!d&&!i){if(h=="A"){if(b.g(f,"u")=="image")i=b.xe(f,"IMG");else i=b.o(f,"image",e);if(i){x=f;b.L(x,"block");b.O(x,V);C=b.sb(x,e);b.z(x,"relative");b.Zb(C,0);b.K(C,"backgroundColor","#000")}}else if(h=="IMG"&&b.g(f,"u")=="image")i=f;if(i){i.border=0;b.O(i,V)}}T(f,c,d+1)})}d.cc=function(c,b){var a=u-b;Zb(N,a)};d.Y=f;m.call(d);b.Pe(n,b.g(n,"p"));b.Oe(n,b.g(n,"po"));var M=b.o(n,"thumb",e);if(M){b.sb(M);b.M(M)}b.V(n);v=b.sb(gb);b.v(v,1e3);b.a(n,"click",ab);E(e);d.de=i;d.Nc=C;d.Qb=N=n;b.E(N,v);o.hb(203,G);o.hb(28,eb);o.hb(24,db)}function vc(y,f,p,q){var a=this,m=0,u=0,g,h,d,c,i,t,r,n=A[f];l.call(a,0,0);function v(){b.Rb(N);cc&&i&&n.Nc&&b.E(N,n.Nc);b.V(N,!i&&n.de)}function w(){a.dc()}function x(b){r=b;a.cb();a.dc()}a.dc=function(){var b=a.ib();if(!C&&!O&&!r&&s==f){if(!b){if(g&&!i){i=e;a.cd(e);o.i(j.Xd,f,m,u,g,c)}v()}var k,p=j.xc;if(b!=c)if(b==d)k=c;else if(b==h)k=d;else if(!b)k=h;else k=a.bd();o.i(p,f,b,m,h,d,c);var l=I&&(!E||F);if(b==c)(d!=c&&!(E&12)||l)&&n.Je();else(l||b!=d)&&a.fd(k,w)}};a.Ee=function(){d==c&&d==a.ib()&&a.R(h)};a.ne=function(){B&&B.Y==f&&B.Hb();var b=a.ib();b<c&&o.i(j.xc,f,-b-1,m,h,d,c)};a.cd=function(a){p&&b.Ab(lb,a&&p.jd.af?"":"hidden")};a.cc=function(b,a){if(i&&a>=g){i=k;v();n.dd();B.Hb();o.i(j.he,f,m,u,g,c)}o.i(j.ve,f,a,m,h,d,c)};a.Zc=function(a){if(a&&!t){t=a;a.hb($JssorPlayer$.Be,x)}};p&&a.Sb(p);g=a.Mb();a.Sb(q);h=g+q.zc;c=a.Mb();d=I?g+q.Ac:c}function Kb(a,c,d){b.H(a,c);b.F(a,d)}function Zb(c,b){var a=x>0?x:fb,d=zb*b*(a&1),e=Ab*b*(a>>1&1);Kb(c,d,e)}function Pb(){qb=O;Ib=z.bd();G=w.U()}function gc(){Pb();if(C||!F&&E&12){z.cb();o.i(j.He)}}function ec(f){if(!C&&(F||!(E&12))&&!z.od()){var d=w.U(),b=c.ceil(G);if(f&&c.abs(H)>=a.Cc){b=c.ceil(d);b+=jb}if(!(D&1))b=c.min(r-u,c.max(b,0));var e=c.abs(b-d);e=1-c.pow(1-e,5);if(!P&&qb)z.je(Ib);else if(d==b){tb.ae();tb.nc()}else z.Jb(d,b,e*Vb)}}function Hb(a){!b.g(b.Ob(a),"nodrag")&&b.Cb(a)}function rc(a){Yb(a,1)}function Yb(a,c){a=b.qc(a);var i=b.Ob(a);if(!M&&!b.g(i,"nodrag")&&sc()&&(!c||a.touches.length==1)){C=e;yb=k;R=h;b.a(g,c?"touchmove":"mousemove",Bb);b.I();P=0;gc();if(!qb)x=0;if(c){var f=a.touches[0];ub=f.clientX;vb=f.clientY}else{var d=b.uc(a);ub=d.x;vb=d.y}H=0;hb=0;jb=0;o.i(j.we,t(G),G,a)}}function Bb(d){if(C){d=b.qc(d);var f;if(d.type!="mousemove"){var l=d.touches[0];f={x:l.clientX,y:l.clientY}}else f=b.uc(d);if(f){var j=f.x-ub,k=f.y-vb;if(c.floor(G)!=G)x=x||fb&M;if((j||k)&&!x){if(M==3)if(c.abs(k)>c.abs(j))x=2;else x=1;else x=M;if(ob&&x==1&&c.abs(k)-c.abs(j)>3)yb=e}if(x){var a=k,i=Ab;if(x==1){a=j;i=zb}if(!(D&1)){if(a>0){var g=i*s,h=a-g;if(h>0)a=g+c.sqrt(h)*5}if(a<0){var g=i*(r-u-s),h=-a-g;if(h>0)a=-g-c.sqrt(h)*5}}if(H-hb<-2)jb=0;else if(H-hb>2)jb=-1;hb=H;H=a;sb=G-H/i/(Y||1);if(H&&x&&!yb){b.Cb(d);if(!O)z.re(sb);else z.se(sb)}}}}}function bb(){qc();if(C){C=k;b.I();b.C(g,"mousemove",Bb);b.C(g,"touchmove",Bb);P=H;z.cb();var a=w.U();o.i(j.Se,t(a),a,t(G),G);E&12&&Pb();ec(e)}}function jc(c){if(P){b.Te(c);var a=b.Ob(c);while(a&&v!==a){a.tagName=="A"&&b.Cb(c);try{a=a.parentNode}catch(d){break}}}}function Jb(a){A[s];s=t(a);tb=A[s];Tb(a);return s}function Dc(a,b){x=0;Jb(a);o.i(j.Me,t(a),b)}function Tb(a,c){wb=a;b.f(S,function(b){b.fc(t(a),a,c)})}function sc(){var b=j.Gc||0,a=X;if(ob)a&1&&(a&=1);j.Gc|=a;return M=a&~b}function qc(){if(M){j.Gc&=~X;M=0}}function Xb(){var a=b.lb();b.O(a,V);b.z(a,"absolute");return a}function t(a){return(a%r+r)%r}function kc(b,d){if(d)if(!D){b=c.min(c.max(b+wb,0),r-u);d=k}else if(D&2){b=t(b+wb);d=k}cb(b,a.mc,d)}function xb(){b.f(S,function(a){a.lc(a.Db.Ze<=F)})}function hc(){if(!F){F=1;xb();if(!C){E&12&&ec();E&3&&A[s]&&A[s].nc()}}}function Ec(){if(F){F=0;xb();C||!(E&12)||gc()}}function ic(){V={Kb:L,xb:K,j:0,l:0};b.f(T,function(a){b.O(a,V);b.z(a,"absolute");b.Ab(a,"hidden");b.M(a)});b.O(gb,V)}function ab(b,a){cb(b,a,e)}function cb(g,f,l){if(Rb&&(!C&&(F||!(E&12))||a.Oc)){O=e;C=k;z.cb();if(f==i)f=Vb;var d=Cb.ib(),b=g;if(l){b=d+g;if(g>0)b=c.ceil(b);else b=c.floor(b)}if(D&2)b=t(b);if(!(D&1))b=c.max(0,c.min(b,r-u));var j=(b-d)%r;b=d+j;var h=d==b?0:f*c.abs(j);h=c.min(h,f*u*1.5);z.Jb(d,b,h||1)}}o.sc=function(){if(!I){I=e;A[s]&&A[s].nc()}};function W(){return b.k(y||q)}function nb(){return b.m(y||q)}o.N=W;o.db=nb;function Eb(c,d){if(c==i)return b.k(q);if(!y){var a=b.lb(g);b.Sc(a,b.Sc(q));b.rb(a,b.rb(q));b.L(a,"block");b.z(a,"relative");b.F(a,0);b.H(a,0);b.Ab(a,"visible");y=b.lb(g);b.z(y,"absolute");b.F(y,0);b.H(y,0);b.k(y,b.k(q));b.m(y,b.m(q));b.Dc(y,"0 0");b.E(y,a);var h=b.Fb(q);b.E(q,y);b.K(q,"backgroundImage","");b.f(h,function(c){b.E(b.g(c,"noscale")?q:a,c);b.g(c,"autocenter")&&Lb.push(c)})}Y=c/(d?b.m:b.k)(y);b.Ne(y,Y);var f=d?Y*W():c,e=d?c:Y*nb();b.k(q,f);b.m(q,e);b.f(Lb,function(a){var c=b.xd(b.g(a,"autocenter"));b.rd(a,c)})}o.Cd=Eb;m.call(o);o.J=q=b.jb(q);var a=b.Z({wb:0,Bd:1,gc:1,oc:0,ed:k,vb:1,kb:e,Oc:e,Yc:1,Bc:3e3,Lc:1,mc:500,qe:d.Od,Cc:20,Ic:0,ub:1,Hc:0,De:1,kc:1,Tc:1},fc);a.kb=a.kb&&b.be();if(a.ld!=i)a.Bc=a.ld;if(a.fe!=i)a.Hc=a.fe;var fb=a.kc&3,tc=(a.kc&4)/-4||1,mb=a.bf,J=b.Z({T:p,kb:a.kb},a.Ye);J.Nb=J.Nb||J.Ve;var Fb=a.Ge,Z=a.ud,eb=a.Xe,Q=!a.De,y,v=b.o(q,"slides",Q),gb=b.o(q,"loading",Q)||b.lb(g),Nb=b.o(q,"navigator",Q),dc=b.o(q,"arrowleft",Q),ac=b.o(q,"arrowright",Q),Mb=b.o(q,"thumbnavigator",Q),pc=b.k(v),nc=b.m(v),V,T=[],uc=b.Fb(v);b.f(uc,function(a){a.tagName=="DIV"&&!b.g(a,"u")&&T.push(a);b.v(a,(b.v(a)||0)+1)});var s=-1,wb,tb,r=T.length,L=a.Pd||pc,K=a.Kd||nc,Wb=a.Ic,zb=L+Wb,Ab=K+Wb,bc=fb&1?zb:Ab,u=c.min(a.ub,r),lb,x,M,yb,S=[],Qb,Sb,Ob,cc,Cc,I,E=a.Lc,lc=a.Bc,Vb=a.mc,rb,ib,kb,Rb=u<r,D=Rb?a.vb:0,X,P,F=1,O,C,R,ub=0,vb=0,H,hb,jb,Cb,w,U,z,Ub=new oc,Y,Lb=[];if(r){if(a.kb)Kb=function(a,c,d){b.mb(a,{W:c,ab:d})};I=a.ed;o.Db=fc;ic();b.n(q,"jssor-slider",e);b.v(v,b.v(v)||0);b.z(v,"absolute");lb=b.sb(v,e);b.Gb(lb,v);if(mb){cc=mb.We;rb=mb.T;ib=u==1&&r>1&&rb&&(!b.hd()||b.nd()>=8)}kb=ib||u>=r||!(D&1)?0:a.Hc;X=(u>1||kb?fb:-1)&a.Tc;var Gb=v,A=[],B,N,Db=b.ie(),ob=Db.te,G,qb,Ib,sb;Db.gd&&b.K(Gb,Db.gd,([h,"pan-y","pan-x","none"])[X]||"");U=new zc;if(ib)B=new rb(Ub,L,K,mb,ob);b.E(lb,U.Qb);b.Ab(v,"hidden");N=Xb();b.K(N,"backgroundColor","#000");b.Zb(N,0);b.Gb(N,Gb.firstChild,Gb);for(var db=0;db<T.length;db++){var wc=T[db],yc=new xc(wc,db);A.push(yc)}b.M(gb);Cb=new Ac;z=new mc(Cb,U);b.a(v,"click",jc,e);b.a(q,"mouseout",b.Ub(hc,q));b.a(q,"mouseover",b.Ub(Ec,q));if(X){b.a(v,"mousedown",Yb);b.a(v,"touchstart",rc);b.a(v,"dragstart",Hb);b.a(v,"selectstart",Hb);b.a(g,"mouseup",bb);b.a(g,"touchend",bb);b.a(g,"touchcancel",bb);b.a(f,"blur",bb)}E&=ob?10:5;if(Nb&&Fb){Qb=new Fb.T(Nb,Fb,W(),nb());S.push(Qb)}if(Z&&dc&&ac){Z.vb=D;Z.ub=u;Sb=new Z.T(dc,ac,Z,W(),nb());S.push(Sb)}if(Mb&&eb){eb.oc=a.oc;Ob=new eb.T(Mb,eb);S.push(Ob)}b.f(S,function(a){a.hc(r,A,gb);a.hb(n.ic,kc)});b.K(q,"visibility","visible");Eb(W());xb();a.gc&&b.a(g,"keydown",function(b){if(b.keyCode==37)ab(-a.gc);else b.keyCode==39&&ab(a.gc)});var pb=a.oc;if(!(D&1))pb=c.max(0,c.min(pb,r-u));z.Jb(pb,pb,0)}};j.Ue=21;j.we=22;j.Se=23;j.oe=24;j.pe=25;j.Vd=26;j.Wd=27;j.He=28;j.me=202;j.Me=203;j.Xd=206;j.he=207;j.ve=208;j.xc=209;var n={ic:1},q=function(d,C){var f=this;m.call(f);d=b.jb(d);var s,A,z,r,l=0,a,o,j,w,x,i,g,q,p,B=[],y=[];function v(a){a!=-1&&y[a].Qd(a==l)}function t(a){f.i(n.ic,a*o)}f.J=d;f.fc=function(a){if(a!=r){var d=l,b=c.floor(a/o);l=b;r=a;v(d);v(b)}};f.lc=function(a){b.V(d,a)};var u;f.hc=function(D){if(!u){s=c.ceil(D/o);l=0;var n=q+w,r=p+x,m=c.ceil(s/j)-1;A=q+n*(!i?m:j-1);z=p+r*(i?m:j-1);b.k(d,A);b.m(d,z);for(var f=0;f<s;f++){var C=b.td();b.Rc(C,f+1);var k=b.Hd(g,"numbertemplate",C,e);b.z(k,"absolute");var v=f%(m+1);b.H(k,!i?n*v:f%j*n);b.F(k,i?r*v:c.floor(f/(m+1))*r);b.E(d,k);B[f]=k;a.jc&1&&b.a(k,"click",b.D(h,t,f));a.jc&2&&b.a(k,"mouseover",b.Ub(b.D(h,t,f),k));y[f]=b.bc(k)}u=e}};f.Db=a=b.Z({Uc:10,Mc:10,tc:1,jc:1},C);g=b.o(d,"prototype");q=b.k(g);p=b.m(g);b.Eb(g,d);o=a.id||1;j=a.Fd||1;w=a.Uc;x=a.Mc;i=a.tc-1;a.Yb==k&&b.n(d,"noscale",e);a.gb&&b.n(d,"autocenter",a.gb)},r=function(a,g,i){var c=this;m.call(c);var r,d,f,j;b.k(a);b.m(a);var p,o;function l(a){c.i(n.ic,a,e)}function t(c){b.V(a,c);b.V(g,c)}function s(){p.zb(i.vb||d>0);o.zb(i.vb||d<r-i.ub)}c.fc=function(b,a,c){if(c)d=a;else{d=b;s()}};c.lc=t;var q;c.hc=function(c){r=c;d=0;if(!q){b.a(a,"click",b.D(h,l,-j));b.a(g,"click",b.D(h,l,j));p=b.bc(a);o=b.bc(g);q=e}};c.Db=f=b.Z({id:1},i);j=f.id;if(f.Yb==k){b.n(a,"noscale",e);b.n(g,"noscale",e)}if(f.gb){b.n(a,"autocenter",f.gb);b.n(g,"autocenter",f.gb)}};function p(e,d,c){var a=this;l.call(a,0,c);a.ad=b.Pc;a.zc=0;a.Ac=c}jssor_1_slider_init=function(){var e={ld:2e3,ud:{T:r},Ge:{T:q}},d=new j("jssor_1",e);function g(){var e=b.ye(d.J,"slides");if(e){var c=e[1];if(c){var a=b.o(c,"add");if(!a){a=b.lb();b.rb(a,"position:absolute;top:0px;right:0px;width:80px;height:20px;background-color:rgba(255,255,140,0.5);font-size:12px;line-height:20px;text-align:center;z-index:1000;");b.Rc(a,"Jssor Slider");b.E(c,a)}}}}g();function a(){var b=d.J.parentNode.clientWidth;if(b){b=c.min(b,600);d.Cd(b)}else f.setTimeout(a,30)}a();b.a(f,"load",a);b.a(f,"resize",a);b.a(f,"orientationchange",a)}})(window,document,Math,null,true,false)
		</script>
		
		<style>
			.jssorb02{position:absolute}.jssorb02 div,.jssorb02 div:hover,.jssorb02 .av{position:absolute;width:21px;height:21px;text-align:center;line-height:21px;color:#fff;font-size:12px;background:url('img/b02.png') no-repeat;overflow:hidden;cursor:pointer}.jssorb02 div{background-position:-5px -5px}.jssorb02 div:hover,.jssorb02 .av:hover{background-position:-35px -5px}.jssorb02 .av{background-position:-65px -5px}.jssorb02 .dn,.jssorb02 .dn:hover{background-position:-95px -5px}.jssora13l,.jssora13r{display:block;position:absolute;width:40px;height:50px;cursor:pointer;background:url('img/a13.png') no-repeat;overflow:hidden}.jssora13l{background-position:-10px -35px}.jssora13r{background-position:-70px -35px}.jssora13l:hover{background-position:-130px -35px}.jssora13r:hover{background-position:-190px -35px}.jssora13l.jssora13ldn{background-position:-250px -35px}.jssora13r.jssora13rdn{background-position:-310px -35px}.jssora13l.jssora13lds{background-position:-10px -35px;opacity:.3;pointer-events:none}.jssora13r.jssora13rds{background-position:-70px -35px;opacity:.3;pointer-events:none}
		</style>
	</head>

	<body>
		<div id="header">
			<img src="img/banner_1.png" alt="Banner" id="banner">
			
			<button class="hamburger"><i class="material-icons">menu</i></button>
			
			<button class="cross"><i class="material-icons">close</i></button>
		</div>
		
		<div class="menu">
			<ul>
				<a href="index.php"><li>HOMEPAGE</li></a>
				<a href="description.php"><li>DESCRIPTION</li></a>
				<!-- <a href="comic_pages.php"><li>COMIC PAGES</li></a> -->
				<!-- <a href="comic_pages_2.php"><li>COMIC PAGES</li></a> -->
				<a href="biography.php"><li>BIOGRAPHY</li></a>
				<?php
					session_start();
				
					if (!$_SESSION['loggedIn']) {
						echo "<a href='register.php'><li>REGISTER</li></a>";
						echo "<a href='login.php'><li>LOGIN</li></a>";
					} else {
						echo "<a href='php/logout.php'><li>LOGOUT</li></a>";
					}
				?>
			</ul>
		</div>
		
		<script src="js\hamburger.js"></script>
		
		<div id="container">
			<div id="content">
				<!-- #region Jssor Slider Begin -->
				<!-- Generator: Jssor Slider Maker -->
				<!-- Source: http://www.jssor.com/slbquista/test.slider -->
				<!-- This is deep minimized code which works independently. -->
				
				<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:800px;height:1131px;overflow:hidden;visibility:hidden;">
					<!-- Loading Screen -->
					<div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
						<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
						<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
					</div>
					
					<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:800px;height:1131px;overflow:hidden;">
						<img data-u="add" title="Jssor Slider" style="display:block;position:absolute;top:0;right:0;width:16px;height:16px;z-index:1000;" src="img/icon-16.png" /> <!-- Jssor icon -->
						
						<div>
							<img data-u="image" src="img/page_1.png" />
						</div>
						
						<div>
							<img data-u="image" src="img/page_2.png" />
						</div>
						
						<div>
							<img data-u="image" src="img/page_3.jpg" />
						</div>
						
						<div>
							<img data-u="image" src="img/page_4.png" />
						</div>
						
						<div>
							<img data-u="image" src="img/page_5.png" />
						</div>
						
						<div>
							<img data-u="image" src="img/page_6.png" />
						</div>
					</div>
					
					<!-- Bullet Navigator -->
					<div data-u="navigator" class="jssorb02" style="bottom:16px;right:16px;">
						<div data-u="prototype" style="width:21px;height:21px;">
							<div data-u="numbertemplate"></div>
						</div>
					</div>
					
					<!-- Arrow Navigator -->
					<span data-u="arrowleft" class="jssora13l" style="top:0px;left:8px;width:40px;height:50px;" data-autocenter="2"></span>
					<span data-u="arrowright" class="jssora13r" style="top:0px;right:8px;width:40px;height:50px;" data-autocenter="2"></span>
				</div>
				
				<script type="text/javascript">jssor_1_slider_init();</script>
				<!-- #endregion Jssor Slider End -->
			</div>
			
			<div id="comments">
				<?php
					if ($_SESSION['loggedIn']) {
						echo $output_3;
						
						echo $output_2;
					} else {
						echo "<p style='color: white'>Sorry you're not logged in</p>";
					}
				?>
			</div>
		</div>
		
		<div id="footer">
			<p>
				Website by Finn Turnbull </br>
				Artwork by Aisling Allan.
			</p>
		</div>
	</body>
</html>