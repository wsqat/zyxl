//ͷ����ֲ�� www.toufayizhi.net
(function(){
//-------------------------------------С���ܼ���
window.Fun=
{
	ie:/*@cc_on!@*/false,//�Ƿ�ΪIE
	props:{"class":"className"},
	toarr:function(ul){var ar=[];for(var i=0,n=ul.length;i<n;i++){ar[i]=ul[i];}return ar;},//תΪ����
	copy:function(o,ul){if(o._ex){return o;}else{for(var n in ul){o[n]=ul[n];}o._ex=true;return o;}},//��չ����
	xcopy:function(o,ul){for(var n in ul){reg(n);}function reg(n){o[n]=function(){var c=Fun.toarr(arguments);return ul[n].apply(c.shift(),c);};}}//�������Բ�����һ��������Ϊ�����Ե�this
}
//window.ie=Fun.ie;
//window.xxxA=Fun.toarr;
window.xxx=function(id,tag)  
{
	var re=id&&typeof id!="string"?id:document.getElementById(id)||document;
	if(!tag){return Fun.copy(re,Element);}else{return Dom.find(re,tag);}
}
Element=
{
	find:function(tag)//�������Լ���[��ǩ��Լ�� (�磺li[bb>li]  *[class=bbb]  *[src=a.jpg] li[src=a.jpg]) ]
	{
		var m=/(.+)\[(\w*)(\W+)(.*)\]/.exec(tag);
		if(!m){var re=this.getElementsByTagName(tag);for(var i=0,n=re.length;i<n;i++){Fun.copy(re[i],Element);};return re;}
		else
		{
			var arr=[],re=this.getElementsByTagName(m[1]==""?"*":m[1]);
			if(Fun.ie&&Fun.props[m[2]]){m[2]=Fun.props[m[2]];}
			for(var i=0,n=re.length;i<n;i++)
			{if(m[3]==">"&&re[i].parentNode.id==m[2]||m[3]=="="&&re[i].getAttribute(m[2])==m[4]||m[3]=="!="&&re[i].getAttribute(m[2])!=m[4]){arr.push(Fun.copy(re[i],Element));}}
			m=null;return arr;
		}
	},
	attr:function(key,v){if(Fun.ie&&Fun.props[key]){key=Fun.props[key];}if(v){this.setAttribute(key,v);}else{return this.getAttribute(key);}},//��ȡ�����ýڵ�����
	w:function(v){if(v){this.style.width=v+"px";}else{return this.offsetWidth||this.body.offsetWidth||0;}},	//��ȡ�����ýڵ��
	h:function(v){if(v){this.style.height=v+"px";}else{return this.offsetHeight||this.body.offsetHeight||0;}},	//��ȡ�����ýڵ��
	t:function(v){if(v){this.style.top=v+"px";}else{return this.offsetTop||(this.documentElement.scrollTop||this.body.scrollTop||0);}},	//���û򷵻��ϱ߾�
	l:function(v){if(v){this.style.left=v+"px";}else{return this.offsetLeft||(this.documentElement.scrollLeft||this.body.scrollLeft||0);}},	//���û򷵻���߾�
	v:function(v){if(v){this.innerHTML?this.innerHTML=v:this.value=v;}else{return this.innerHTML||this.value||"";};},	//���û򷵻�ֵ
	op:function(v){if(Fun.ie){this.filters.alpha.opacity=v;}else{this.style.opacity=(v/100);}}	//���ò��͸����
}
//ҳ�湦�ܣ��޷���Խڵ���ִ�е�
window.Dom=Dom=
{	
	addEvent:function(s,fn){this.attachEvent?this.attachEvent('on'+s,fn):this.addEventListener(s,fn,false);return this;},//����¼�[�¼�(Ҫȥ��ǰ���on),����]
	delEvent:function(s,fn){this.detachEvent?this.detachEvent('on'+s,fn):this.removeEventListener(s,fn,false);return this;},//ɾ���¼�[�¼�(Ҫȥ��ǰ���on),����]
	addDom:function(node,tag,first){var o=node.createElement(tag);first?node.insertBefore(o,node.firstChild):node.appendChild(o);return o;},//�����ӽڵ�[�ڵ㣬Ҫ������TAG������λ��]
	delDom:function(node,obj){node.removeChild(obj);},//ɾ���ӽڵ�[���ڵ㣬Ҫɾ���ڵ�]
	addImg:function(url){var img=new Image();img.src=url;return img;},//��������ͼƬ[ͼƬ��ַ]
	winh:function(){return Math.min(document.documentElement.clientHeight,document.body.clientHeight);},//������������ø�
	mouseX:function(event){return (event.pageX || (event.clientX +l(document)));},//��������X����
	mouseY:function(event){return (event.pageY || (event.clientY +t(document)));}//��������Y����
}
Fun.xcopy(Dom,Element);

})();




window.Effect=
{
	//�л�CSS[��������,�ӱ�ǩ��,���е���ʽ,����(Ҫ����2)]
	SwitchCss:function(id,tag,cName,sp){var c=xxx(id,tag);sp=sp||2;for(var i=0,n=c.length;i<n;i+=sp){c[i].className=cName;}},
	//��ǩ�л�Ч��[�������Ԫ��("id/li/_"),���ݿ���Ԫ��("id/li/_"),�¼�(mouseover/click),Ĭ����ʾ�ڼ���(-1��ʾ������Ƴ�ȫ������,�����¼�mouseover��Ч),�ֲ�ʱ��(1��=1000)]
	SwitchTag:function(tit,box,s,show,time)
	{
		var t=tit.split('/'),b=box.split("/"),ts=xxx(t[0],t[1]),bs=xxx(b[0],b[1]),s=s||"onmouseover",now=show=show||0,c;
		for(var i=0,n=ts.length;i<n;i++){ts[i].old=ts[i].className.replace("show","");bs[i].old=bs[i].className.replace("show","");reg(i);}
		init();if(show!=-1&&time){go();}function init(){for(var i=0,n=ts.length;i<n;i++)
		{ts[i].className=ts[i].old;bs[i].className=bs[i].old;}if(now!=-1){ts[now].className+=(t[2]||"")+" show";bs[now].className+=(b[2]||"")+" show";}}
		function reg(i){ts[i][s]=function(){clearInterval(c);now=i;init();};if(show!=-1&&time){bs[i].onmouseover=function(){clearInterval(c);};bs[i].onmouseout=function(){go();};}
		if(show==-1&&s=="onmouseover"){ts[i].onmouseout=function(){now=-1;init();};}}function go(){c=setInterval(function(){(now<ts.length-1)?now++:now=0;init();},time);}
	},
	//��ǿ�[��������,�ӱ�ǩ,����ʱ�ı����ʽ,Ĭ��ѡ��,�����ı����ʽ,�ֲ�֧��]
	SwitchSeal:function(id,tag,cName,show,clickName,time)
	{
		var c=xxx(id,tag),now=(show!=-1)?show:0,o;for(var i=0;i<c.length;i++){c[i].old=c[i].className.replace(cName,"");c[i].seal=false;reg(i);}
		if(show!=-1){init();c[now].className=cName;if(time){go();}}
		function reg(i){if(show!=-1){c[i].onmouseover=function(){clearInterval(o);now=i;init();this.className=this.seal?clickName:cName;};if(time){c[i].onmouseout=function(){go();}}}
		else{c[i].onmouseover=function(){now=i;this.className=this.seal?clickName:cName;};c[i].onmouseout=function(){this.className=this.seal?clickName:this.old;};}
		if(clickName){c[i].onclick=function(){this.seal=!this.seal;this.className=this.seal?clickName:this.old;}}}
		function init(){for(var i=0,n=c.length;i<n;i++){c[i].className=c[i].seal?clickName:c[i].old;}}
		function go(){o=setInterval(function(){(now<c.length-1)?now++:now=0;init();c[now].className=c[now].seal?clickName:cName;},time);}
	},
	//�������ͼ[�л�ʱ��,���ݼ���,��ͼ������id,�л���Ч��,Сͼ������ID,����˵��������ID]
	FocusImg:function(time,foc,fbimg,show,fsimg,ftext)
	{
		var au=xxx(foc,"a"),bimgs=xxx(foc,"img[alt!=simg]"),ba=xxx(fbimg,"dt")[0].find("a")[0],now=1,tm,len=au.length;
		ba.appendChild(Dom.addImg(bimgs[0].src));ba.href=au[0].href;var bi=ba.find("img")[0];bi.alt=bimgs[0].alt;
		var fi=["progid:DXImageTransform.Microsoft.Fade()","progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,motion=forward)",
		"progid:DXImageTransform.Microsoft.RandomDissolve(enable=true)","progid:DXImageTransform.Microsoft.Slide(bands=1,SlideStyle=swap)",
		"progid:DXImageTransform.Microsoft.RandomBars(orientation=vertical)","progid:DXImageTransform.Microsoft.Slide(slidestyle=push,bands=1)"];
		var bp=xxx(fbimg,"dd")[0].find("ul")[0];for(var i=0;i<len;i++){bp.innerHTML+="<li>"+(i+1)+"</li>";}
		var bps=bp.find("li");bps[0].className="show";function pfn(i){bps[i].onclick=function(){go(i);}};for(var i=0;i<len;i++){pfn(i);}
		if(fsimg){var simgs=xxx(foc,"img[alt=simg]"),simg=xxx(fsimg);for(var i=0;i<len;i++){simg.innerHTML+="<dl><dt><img src="+simgs[i].src+" /></dt><dd>"+au[i].title+"</dd></dl>";}
		var sx=xxx(simg,"dl");sx[0].className="show";function sfn(i){sx[i].onclick=function(){go(i);}};for(var i=0;i<len;i++){sfn(i);}}
		if(ftext){var fte=xxx(ftext);fte.innerHTML="<dt><a href="+au[0].href+">"+bimgs[0].alt+"</a></dt><dd>"+au[0].title+"</dd>";}
		function xunhuan(){if(Fun.ie){bi.style.filter=fi[show];bi.filters[0].Apply();bi.filters[0].Play(duration=1);}
		ba.href=au[now].href;bi.src=bimgs[now].src;bi.alt=bimgs[now].alt;for(var i=0;i<len;i++){bps[i].className="";}bps[now].className="show";
		if(fsimg){for(var i=0;i<len;i++){sx[i].className="";}sx[now].className="show";}
		if(ftext){xxx(ftext).innerHTML="<dt><a href="+au[now].href+">"+bimgs[now].alt+"</a></dt><dd>"+au[now].title+"</dd>";}(now<len-1)?now++:now=0;}
		function init(){tm=setInterval(xunhuan,time);}function go(n){clearInterval(tm);now=n;xunhuan();init();}init();
	},
	//����/����Ч����[id,������/������,����,�ٶ�,�ϰ�ť,�°�ť,��ҳ�л�ʱ��,ÿ������������]
	HtmlMove:function(id,tag,path,rate,upbt,downbt,pgtime,lis)
	{
		var c,mous=false,fg=tag.split('/'),o=xxx(id),as=o.find(fg[1]),fx=(path=="scrollRight"||path=="scrollLeft")?"scrollLeft":"scrollTop",ow=fx=="scrollTop"?as[0].h():as[0].w();
		o.onmouseover=function(){mous=true;};o.onmouseout=function(){mous=false;}
		if(pgtime==null)
		{
			var mx=ow*as.length,mi=0,oldra=rate,os=o.find(fg[0])[0];os.innerHTML+=os.innerHTML;
			if(upbt){xxx(upbt).onmousedown=function(){down();rate+=3;};xxx(upbt).onmouseup=function(){rate=oldra;};}
			if(downbt){xxx(downbt).onmousedown=function(){up();rate+=3;};xxx(downbt).onmouseup=function(){rate=oldra;};}
			function up(){clearInterval(c);c=setInterval(function(){if(mous){return;}(o[fx]-rate>0)?(o[fx]-=rate):(o[fx]=mx);},30);}
			function down(){clearInterval(c);c=setInterval(function(){if(mous){return;}(o[fx]+rate<mx)?(o[fx]+=rate):(o[fx]=0);},30);}
			if(path=="scrollTop"||path=="scrollLeft"){down();}else{up();}
		}
		else
		{
			var pw=fx=="scrollTop"?o.h():o.w(),pgli=lis||Math.floor((pw+ow/2)/ow),pg=Math.floor((as.length+(pgli-1))/pgli),pgmx=ow*pgli,now=0,mx,d;
			var os=o.find(fg[0])[0];os.innerHTML+=os.innerHTML;d=setInterval(function(){go_to((path=="scrollTop"||path=="scrollLeft")?true:false);},pgtime);
			if(upbt){xxx(upbt).onmousedown=function(){clearInterval(d);go_to(true);d=setInterval(function(){go_to(true);},pgtime);}}
			if(downbt){xxx(downbt).onmousedown=function(){clearInterval(d);go_to(false);d=setInterval(function(){go_to(false);},pgtime);}}
			if(fg[2]){var pf=o.find(fg[2])[0];};function pfs(vs){if(fg[2]){pf.style.display="block";pf.style.left=vs+"px";}};function pfscl(){if(fg[2]){pf.style.display="none";}}
			function go_to(fxs)
			{
				if(mous){return;};var ex;
				if(fxs){if(now<pg){now++;}else{now=1;o[fx]=0;}pfs((now-1)*pgmx);mx=now*pgmx;ex=setInterval(function(){(o[fx]+rate<mx)?(o[fx]+=rate):o[fx]=mx;if(o[fx]==mx){clearInterval(ex);ex=null;pfscl();}},5);}
				else{if(now>0){now--;}else{now=pg-1;o[fx]=pg*pgmx;}pfs((now+1)*pgmx);mx=now*pgmx;ex=setInterval(function(){(o[fx]-rate>mx)?(o[fx]-=rate):o[fx]=mx;if(o[fx]==mx){clearInterval(ex);ex=null;pfscl();}},5);}
			}
		}
	},
	//flash�������[flash��ַ,���,�߶�]
	Writeswf:function(url,w,h){
		document.write("<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,24,0' width='"+w+"' height='"+h+"'><param name='movie' value='"+url+"'><param name='wmode' value='transparent'><param name='quality' value='high'><param name='menu' value='false'><embed width='"+w+"' height='"+h+"' src='"+url+"' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' wmode='transparent' type='application/x-shockwave-flash'></embed></object>");
	},
	//����¼�����Ч��[id,���ĸ���ǩ�ϴ���,��Ҫ��ʾ�ı�ǩ,����¼�����,topƫ����,leftƫ����]
	Mouse:function(id,tag1,tag2,ms,tpx,lpx){
		var idobj=xxx(id,tag1);
		var idobj2=xxx(id,tag2);
		for(i=0;i<idobj.length;i++){dir(i);}
		function dir(i){
			idobj[i]["onmouseout"]=function(){idobj2[i].style.display='none';}
			idobj[i][ms]=function mousexy(e){
				e= e || window.event; 
				if(document.all){
				x=event.clientX + document.documentElement.scrollLeft - document.documentElement.clientLeft;
				y=event.clientY + document.documentElement.scrollTop - document.documentElement.clientTop;
				}else{x=e.pageX;y=e.pageY;}
				idobj2[i].style.display='block';
				idobj2[i].style.top =y+tpx+'px'; 
				idobj2[i].style.left =x+lpx+'px'; 
			}
		}
	},
	//���壺id��Ҫ���õ�ͼƬID���ڵ��ƶ��ٶȣ�Ҫ�ƶ�����Ŀ��֧�֣�['width:100','height:100','left:100','top:100','opacity:100','scrollTop:100','scrollLeft:100']���ƶ���ɺ�ص���������֧�ֲ�������ѡ
	//����¼�����opacity���ԣ���ҳ����ʽ��Ҫ���壺opacity:0.1;filter:alpha(opacity=10);
	SpaceTo:function(id,slot,mx,fun)
	{
		var o=xxx(id),over=0,ar=Array(),len=mx.length,temp;
		for(var i=0;i<len;i++){ar[i]=mx[i].split(":");ar[i]=ar[i].concat(li(ar[i][0]));ar[i][1]=parseInt(ar[i][1]);ar[i][1]>ar[i][2]&&(ar[i][1]+=(slot-1));ar[i][5]=true;}
		clearInterval(window[id+"spaceTo"]);window[id+"spaceTo"]=setInterval(mov,10);
		function mov()
		{
			for(var i=0;i<len;i++)
			{
				if(ar[i][5])
				{
					ar[i][2]+=(temp=Math.floor((ar[i][1]-ar[i][2])/slot));
					ar[i][3][ar[i][0]]=ar[i][0]=='opacity' && !(/*@cc_on!@*/false)?ar[i][2]*0.01:ar[i][2]+ar[i][6];
					if(temp==0){ar[i][5]=false;over++;}
				}
			}
			if(over==len){clearInterval(window[id+"spaceTo"]);if(fun){fun();}}
		}
		//����Ԫ�ؼ���ʼֵ
		function li(name)
		{
			switch (name)
			{ 
				case "width":return [o.offsetWidth,o.style,"px"];
				case "height":return [o.offsetHeight,o.style,"px"];
				case "left":return [o.offsetLeft,o.style,"px"];
				case "top":return [o.offsetTop,o.style,"px"];
				case "scrollTop":return [o.scrollTop,o,0];
				case "scrollLeft":return [o.scrollLeft,o,0];
				case "opacity":return /*@cc_on!@*/false?[o.filters.alpha.Opacity,o.filters.alpha,0]:[o.style.opacity*100,o.style,0];
			}
		}
	},
	//������棬Ч�ʽϲ�
	FixedMove:function(id,x,y,content)
	{
		document.write("<div id='"+id+"' style='z-index:100;position:absolute;"+x+":0px;top:"+y+"px;'>"+content+"</div>");
		ids=xxx(id);setInterval(plays,10);	
		function plays(){var olds=ids.t(),news=(document.body.scrollTop||document.documentElement.scrollTop)+y;if(olds!=news){var dy=(news-olds)*0.15;dy=(dy>0?1:-1)*Math.ceil(Math.abs(dy));ids.t(olds+dy);}}
	},
	//�����б�
	SelectList:function(id,putid){
		var inbor=xxx(id),indt=xxx(id,"dt")[0],indd=xxx(id,"dd")[0],listi=xxx(id,"li");if(putid){var putid=xxx(putid);}
		indt.onclick=indd.onmouseover=function(){indd.className="show";indt.className="dt2";};
		inbor.onmouseout=indd.onclick=function(){indd.className="";indt.className="";};
		for(var i=0;i<listi.length;i++){isel(i);}
		function isel(i){
			listi[i]["onmouseover"]=function(){listi[i].className="show";}
			listi[i]["onmouseout"]=function(){listi[i].className="";};
			listi[i]["onclick"]=function(){
				if(putid){putid.value=indt.innerHTML=this.innerHTML;}else{indt.innerHTML=xxx(listi[i],"a")[0].innerHTML;}
				for(var num=0;num<listi.length;num++){listi[num].id=(i==num)?"open":"";}
			}
		}
	}


}



