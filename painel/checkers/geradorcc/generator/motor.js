function fillter(){
	var bin = document.console.ccp.value;
	for(var i=bin.length;i<16;i++){
		bin+="x";
	}
	document.console.ccp.value=bin;
	setCookie(bin);
}

function rnd(frN,toN){
	var rN=Math.floor(Math.random()*(toN+1-frN))+frN;
	return rN;
}

function unilenS(aS,ul,fc,p){
	var rS=""+aS; ul*=1.0;
	if(fc=="" || fc==null){fc="0";}
	if(p=="" || p==null){p=0;}
	var rL=rS.length;
	if(rL<ul){
		for(var i=1;i<=ul-rL;i++){
			if(p==0){
				rS=""+fc+rS;
			}else{
				rS+=""+fc;
			}
		}
	}
	return rS;
}

function init(){
	undefined="Indefinida";
	mkCClist();
}

function ccchk(cdi){
	document.console.output1.value="";
	if(cdi!="" && cdi!=null){
		document.console.output1.value="Procesando...";
		var cf=sbtString(cdi," -/abcdefghijklmnopqrstuvwyzABCDEFGHIJLMNOPQRSTUVWYZ|\#()[]{}£$%&=!?+*.,;:'");
		var cn=chkCard(cf);
		var clcd=chkLCD(cf);
		var clcdt="Incorrecto"; 
		if(clcd){
			clcdt="Correcto";
		}
		var ccck=chkCCCksum(cf,cn);
		var ccckt="Incorrecto";
		if(ccck){
			ccckt="Correcto";
		}
		var cjd="Número de tarjeta invalido"; 
		if(clcd && ccck){
			cjd="El número de tarjeta es válido.";
		}
		var out="";
		out+="Tipo de tarjeta: "+cn+"\n";
		out+="Bin: "+ccckt+"\n";
		out+="Serie de tarjeta: "+clcdt+"\n";
		out+=cjd;
		document.console.output1.value=out;
	}
}

function namsogo(p1,tr){
	tr*=1.0; if(tr<1 || tr==null){
		tr=1;
	}
	document.console.output2.value="";
	var ccghm=document.console.ccghm.value;
	if(ccghm<1){
		ccghm=1;
	}else if(ccghm>1000){
		ccghm=1000;
	}
	document.console.ccghm.value=ccghm;
	if(p1!="" && p1!=null){
		var out='';
		for(var jou=0;jou<=3;jou++){
			if(document.console.ccoudatfmt.options[jou].selected){break;}
		}
		if(jou==2){
			var out=out+"<xml>\n";
		}
		if(jou==3){
			var out=out+"{\n";
		}
		for(var k=1;k<=ccghm;k++){
			if(p1=='rnd'){
				p=c[Math.floor(Math.random()*(mxcards+1-2))+2];
			}else{
				p=p1;
			}
			var cn=chkCard(p);
			for(var i=tr;i>=1;i--){
				document.console.output2.value="Procesando..."+i;
				var cdi=sbtStringSpRnd(p,"x","0123456789");
				var cf=sbtString(cdi," -/abcdefghijklmnopqrstuvwyzABCDEFGHIJLMNOPQRSTUVWYZ");
				var clcd=chkLCD(cf);
				var ccck=chkCCCksum(cf,cn);
				if(clcd && ccck){
					break;
				}
			}
			if(clcd && ccck){
				var cn=chkCard(cdi);
				var ccnspc="";
				var j;
				for(j=0;j<=3;j++){
					if(document.console.ccnsp.options[j].selected){break;}
				}
				if(j==1){
					ccnspc=" ";
				}else if(j==2){
					ccnspc="-";
				}
				var cdif="";
				for(var i=1;i<=cdi.length;i++){
					var aS=midS(cdi,i,1); 
					if(aS==" "){
						aS=ccnspc;
					}
					cdif+=aS;
				}
				if(document.console.ccexpdat.checked){
					var dnow=new Date();
					var ccexp=(dnow.getFullYear()+rnd(2,3))+'/'+unilenS(rnd(1,12),2,'0',0);
				}else{
					var ccexp='';
				}
				if(document.console.esp.checked){
					if(document.console.eccv.value=='rnd'){ var eccv=(Math.floor(Math.random() * (998 - 112 + 1)) + 112);}
						else {var eccv=document.console.eccv.value;}
					if(document.console.emeses.value=='rnd'){ var mes=unilenS(rnd(1,12),2,'0',0);}
						else {var mes=document.console.emeses.value;}
					if(document.console.eyear.value=='rnd'){var dnowi=new Date(); var year=(dnowi.getFullYear()+rnd(2,3));}
						else {var year=document.console.eyear.value;}
				}
				if(jou==0){
					var out=out+=cdif;
					if(document.console.ccexpdat.checked){
						var out=out+="|"+(unilenS(rnd(1,12),2,'0',0)+'|'+(dnow.getFullYear()+rnd(2,5)));
					}else if(document.console.esp.checked){
						var out=out+="|"+mes+'|'+year;
					}
					if(document.console.ccvi.checked){
						var out=out+="|"+(Math.floor(Math.random() * (998 - 112 + 1)) + 112);
					}else if(document.console.esp.checked){
						var out=out+="|"+eccv;
					}
					if(document.console.ccbank.checked){
						var out=out+="|"+cn+"\n";
					}else{
						var out=out+="\n";
					}
				}else if(jou==1){
					var out=out+=cdif;
					if(document.console.ccvi.checked){
						var out=out+=", "+(Math.floor(Math.random() * (998 - 112 + 1)) + 112);
					}else if(document.console.esp.checked){
						var out=out+=", "+eccv;
					}
					if(document.console.ccexpdat.checked){
						var out=out+=", "+ccexp;
					}else if(document.console.esp.checked){
						var out=out+=", "+mes+'/'+year;
					}
					if(document.console.ccbank.checked){
						var out=out+=", "+cn+"\n";
					}else{
						var out=out+="\n";
					}
				}else if(jou==2){
					var out=out+"<CreditCard>\n";
					if(document.console.ccbank.checked){
						var out=out+"<CardNetwork>"+cn+"<\/CardNetwork>\n";
					}
					var out=out+"<CardNumber>"+cdif+"<\/CardNumber>\n";
					if(document.console.ccvi.checked){
						var out=out+"<CardCCV2>"+(Math.floor(Math.random() * (998 - 112 + 1)) + 112)+"<\/CardCCV2>\n";
					}else if(document.console.esp.checked){
						var out=out+"<CardCCV2>"+eccv+"<\/CardCCV2>\n";
					}
					if(document.console.ccexpdat.checked){
						var out=out+"<CardExpDate>"+ccexp+"<\/CardExpDate>\n";
					}else if(document.console.esp.checked){
						var out=out+"<CardExpDate>"+mes+"/"+year+"<\/CardExpDate>\n";
					}
					var out=out+"<\/CreditCard>\n";
				}else if(jou==3){
					var out=out+"{\n";
					var out=out+"\"CreditCard\":{\n";
					if(document.console.ccbank.checked){
						var out=out+"\"CardNetwork\": \""+cn+"\"\n";
					}
					var out=out+"\"CardNumber\": \""+cdif+"\"\n";
					if(document.console.ccvi.checked){
						var out=out+"\"CardCCV2\": \""+(Math.floor(Math.random() * (998 - 112 + 1)) + 112)+"\"\n";
					}else if(document.console.esp.checked){
						var out=out+"\"CardCCV2\": \""+eccv+"\"\n";
					}
					if(document.console.ccexpdat.checked){
						var out=out+"\"CardExpDate\": \""+ccexp+"\"\n";
					}else if(document.console.esp.checked){
						var out=out+"\"CardExpDate\": \""+mes+"/"+year+"\"\n";
					}
					var out=out+"}\n";
					var out=out+"}";
					if(k<ccghm){
						var out=out+",";
					}
					var out=out+"\n";
				}
			}else{
			var out="No se encontraron tarjetas para este bin";
			}
		}
		if(jou==2){
			var out=out+"</xml>";
		}
		if(jou==3){
			var out=out+"}";
		}
		document.console.output2.value=out;
	}
}

function chgccp(){
	mkCClist();
	for(var j=0;j<=tw-1;j++){
		if(document.console.ccpp.options[j].selected){
			break;
		}
	}
	document.console.ccp.value=c[j+1];
}

function chkCard(cdi){
	cdi+="";
	if(c[1]==undefined || c[1]==null || c[1]==""){
		mkCClist();
	}
	var ccn=0; var cn="Desconocido"
	var cf=sbtString(cdi," -/abcdefghijklmnopqrstuvwyzABCDEFGHIJLMNOPQRSTUVWYZ");
	if(leftS(cf,1)=="4"){
		cf=leftS(cf,8);
	}
	for(var i=1;i<=tw;i++){
		var cct=sbtString(c[i]," -/abcdefghijklmnopqrstuvwyzABCDEFGHIJLMNOPQRSTUVWYZ");
		if(leftS(cf,1)=="4"){
			cct=leftS(cct,8);
		}
		var ccc=cmpPattern(cf,cct);
		if(ccc){
			ccn=i; break;
		}
	}
	if(ccn>0){
		cn=cd[i];
	}
	return cn;
}

function chkCCCksum(cf,cn){
	var r=false;
	var w="21";
	var ml="";
	var j=1;
	for(var i=1;i<=cf.length-1;i++){
		var m=midS(cf,i,1)*midS(w,j,1);
		m=sumDigits(m);
		ml+=""+m;
		j++; 
		if(j>w.length){
			j=1;
		}
	}
	var ml2=sumDigits(ml,-1); 
	var ml1=(sumDigits(ml2,-1)*10-ml2)%10;
	if(ml1==rightS(cf,1)){
		r=true;
	}
	return r;
}

function chkLCD(cf){
	var r=false; cf+="";
	var bl=isdiv(cf.length,2);
	var ctd=0;
	for(var i=1;i<=cf.length;i++){
		var cdg=midS(cf,i,1);
		if(isdiv(i,2)!=bl){
			cdg*=2; if(cdg>9){
				cdg-=9;
			}
		}
		ctd+=cdg*1.0;
	}
	if(isdiv(ctd,10)){
		r=true;
	}
	return r;
}

function mkCClist(){
	tw=187;
	c=new makeArray(tw); 
	cd=new makeArray(tw);
	var i=1;
	c[i]=""; cd[i]="Escolha uma de nossas Bins!"; i++;
	c[i]="5512 3804 9xxx xxxx"; cd[i]="Azteca MasterCard"; i++;
	c[i]="37xx xxxxxx xxxxx"; cd[i]="AmEx"; i++;
	c[i]="3782 xxxxxx xxxxx"; cd[i]="AmEx Small Corporate Card"; i++;
	c[i]="3787 xxxxxx xxxxx"; cd[i]="AmEx Small Corporate Card"; i++;
	c[i]="37x8 xxxxxx xxxxx"; cd[i]="AmEx Gold"; i++;
	c[i]="37x3 7xxxxx xxxxx"; cd[i]="AmEx Platinum"; i++;
	c[i]="37xx xxxxxx 11xxx"; cd[i]="AmEx issued since 1995"; i++;
	c[i]="3xxxxx xxxxxxxx xxxxxxxx"; cd[i]="AmEx Gold"; i++;
	c[i]="30xxx xxxx xxxxx"; cd[i]="Diners Club"; i++;
	c[i]="31xxx xxxx xxxxx"; cd[i]="Diners Club"; i++;
	c[i]="35xxx xxxx xxxxx"; cd[i]="Diners Club"; i++;
	c[i]="36xxx xxxx xxxxx"; cd[i]="Diners Club"; i++;
	c[i]="38xxx xxxx xxxxx"; cd[i]="Carte Blanche"; i++;
	c[i]="35xx xxxx xxxx xxxx"; cd[i]="JCB (Japanese Credit Bureau)"; i++;
	c[i]="4003 14xx xxxx xxxx"; cd[i]="Visa Debit-Banca Monte Dei Paschi Di Siena (Italy)"; i++;
	c[i]="4003 15xx xxxx xxxx"; cd[i]="Visa-Banca Monte Dei Paschi Di Siena (Italy)"; i++;
	c[i]="4024 0238 xxxx xxxx"; cd[i]="Visa Gold-Bank of America"; i++;
	c[i]="4019 xxxx xxxx xxxx"; cd[i]="Visa CV/Gold-Bank of America"; i++;
	c[i]="4024 xxxx xxxx xxxx"; cd[i]="Visa PV-Bank of America"; i++;
	c[i]="4040 xxxx xxxx xxxx"; cd[i]="Visa CV-Wells Fargo"; i++;
	c[i]="4048 xxxx xxxx xxxx"; cd[i]="Visa CV"; i++;
	c[i]="4024 0071 xxxx xxxx"; cd[i]="Visa-Wells Fargo"; i++;
	c[i]="4013 xxxx xxxx xxxx"; cd[i]="Visa-Citibank"; i++;
	c[i]="4019 xxxx xxxx xxxx"; cd[i]="Visa-Bank of America"; i++;
	c[i]="4023 60xx xxxx xxxx"; cd[i]="Visa Electron Prepaid-Poste Italiane (Italy)"; i++;
	c[i]="4024 xxxx xxxx xxxx"; cd[i]="Visa-Bank of America"; i++;
	c[i]="4027 xxxx xxxx xxxx"; cd[i]="Visa-Rockwell Federal Credit Union"; i++;
	c[i]="4032 xxxx xxxx xxxx"; cd[i]="Visa-Household Bank"; i++;
	c[i]="4052 xxxx xxxx xxxx"; cd[i]="Visa-First Cincinnati"; i++;
	c[i]="4060 xxxx xxxx xxxx"; cd[i]="Visa-Associates National Bank"; i++;
	c[i]="4070 xxxx xxxx xxxx"; cd[i]="Visa-Security Pacific"; i++;
	c[i]="4071 xxxx xxxx xxxx"; cd[i]="Visa-Colonial National Bank"; i++;
	c[i]="4094 xxxx xxxx xxxx"; cd[i]="Visa-A.M.C. Federal Credit Union"; i++;
	c[i]="4113 xxxx xxxx xxxx"; cd[i]="Visa-Valley National Bank"; i++;
	c[i]="4114 xxxx xxxx xxxx"; cd[i]="Visa-Chemical Bank"; i++;
	c[i]="4121 xxxx xxxx xxxx"; cd[i]="Visa-Pennsylvania State Employees Credit Union"; i++; 
	c[i]="4121 xxxx xxxx xxxx"; cd[i]="Visa CV-Signet Bank"; i++;
	c[i]="4122 xxxx xxxx xxxx"; cd[i]="Visa-Union Trust"; i++;
	c[i]="4125 xxxx xxxx xxxx"; cd[i]="Visa-Marine Midland"; i++;
	c[i]="4128 xxx xxx xxx"; cd[i]="Visa CV-Citibank"; i++;
	c[i]="4128 xxxx xxxx xxxx"; cd[i]="Visa CV-Citibank"; i++;
	c[i]="4131 xxxx xxxx xxxx"; cd[i]="Visa-State Street Bank"; i++;
	c[i]="4225 xxxx xxxx xxxx"; cd[i]="Visa-Chase Manhattan Bank"; i++;
	c[i]="4226 xxxx xxxx xxxx"; cd[i]="Visa-Chase Manhattan Bank"; i++;
	c[i]="4231 xxxx xxxx xxxx"; cd[i]="Visa-Chase Lincoln First Classic"; i++;
	c[i]="4232 xxxx xxxx xxxx"; cd[i]="Visa-Chase Lincoln First Classic"; i++;
	c[i]="4239 xxxx xxxx xxxx"; cd[i]="Visa-Corestates"; i++;
	c[i]="4241 xxxx xxxx xxxx"; cd[i]="Visa-National Westminster Bank"; i++;
	c[i]="4250 xxxx xxxx xxxx"; cd[i]="Visa-First Chicago Bank"; i++;
	c[i]="4253 xxxx xxxx xxxx"; cd[i]="Visa-Consumers Edge"; i++;
	c[i]="4254 5123 xxxx xxxx"; cd[i]="Visa Premier card-Security First"; i++;
	c[i]="4254 xxxx xxxx xxxx"; cd[i]="Visa-Security First"; i++;
	c[i]="4271 382x xxxx xxxx"; cd[i]="Visa PV-Citibank"; i++;
	c[i]="4271 xxxx xxxx xxxx"; cd[i]="Visa-Citibank/Citicorp"; i++;
	c[i]="4301 xxxx xxxx xxxx"; cd[i]="Visa-Monogram Bank"; i++;
	c[i]="4302 xxxx xxxx xxxx"; cd[i]="Visa-H.H.B.C."; i++;
	c[i]="4311 xxxx xxxx xxxx"; cd[i]="Visa-First National Bank of Louisville"; i++;
	c[i]="4317 xxxx xxxx xxxx"; cd[i]="Visa-Gold Dome"; i++;
	c[i]="4327 xxxx xxxx xxxx"; cd[i]="Visa-First Atlanta"; i++;
	c[i]="4332 xxxx xxxx xxxx"; cd[i]="Visa-First American Bank"; i++;
	c[i]="4339 xxxx xxxx xxxx"; cd[i]="Visa-Primerica Bank"; i++;
	c[i]="4342 xxxx xxxx xxxx"; cd[i]="Visa-N.C.M.B. / Nations Bank"; i++;
	c[i]="4356 xxxx xxxx xxxx"; cd[i]="Visa-National Bank of Delaware"; i++;
	c[i]="4368 xxxx xxxx xxxx"; cd[i]="Visa-National West"; i++;
	c[i]="4387 xxxx xxxx xxxx"; cd[i]="Visa-Bank One"; i++;
	c[i]="4388 xxxx xxxx xxxx"; cd[i]="Visa-First Signature Bank & Trust"; i++;
	c[i]="4401 xxxx xxxx xxxx"; cd[i]="Visa-Gary-Wheaton Bank"; i++;
	c[i]="4413 xxxx xxxx xxxx"; cd[i]="Visa-Firstier Bank Lincoln"; i++;
	c[i]="4418 xxxx xxxx xxxx"; cd[i]="Visa-Bank of Omaha"; i++;
	c[i]="4421 xxxx xxxx xxxx"; cd[i]="Visa-Indiana National Bank"; i++;
	c[i]="4424 xxxx xxxx xxxx"; cd[i]="Visa-Security Pacific National Bank"; i++;
	c[i]="4428 xxxx xxxx xxxx"; cd[i]="Visa-Bank of Hoven"; i++;
	c[i]="4436 xxxx xxxx xxxx"; cd[i]="Visa-Security Bank & Trust"; i++;
	c[i]="4443 xxxx xxxx xxxx"; cd[i]="Visa-Merril Lynch Bank & Trust"; i++;
	c[i]="4447 xxxx xxxx xxxx"; cd[i]="Visa-AmeriTrust"; i++;
	c[i]="4448 020 xxx xxx"; cd[i]="Visa Premier card"; i++;
	c[i]="4452 xxxx xxxx xxxx"; cd[i]="Visa-Empire Affiliates Federal Credit Union"; i++;
	c[i]="4498 xxxx xxxx xxxx"; cd[i]="Visa-Republic Savings"; i++;
	c[i]="4502 xxxx xxxx xxxx"; cd[i]="Visa-C.I.B.C."; i++;
	c[i]="4503 xxxx xxxx xxxx"; cd[i]="Visa-Canadian Imperial Bank"; i++;
	c[i]="4506 xxxx xxxx xxxx"; cd[i]="Visa-Belgium A.S.L.K."; i++;
	c[i]="4510 xxxx xxxx xxxx"; cd[i]="Visa-Royal Bank of Canada"; i++;
	c[i]="4520 xxxx xxxx xxxx"; cd[i]="Visa-Toronto Dominion of Canada"; i++;
	c[i]="4537 xxxx xxxx xxxx"; cd[i]="Visa-Bank of Nova Scotia"; i++;
	c[i]="4538 xxxx xxxx xxxx"; cd[i]="Visa-Bank of Nova Scotia"; i++;
	c[i]="4539 xxxx xxxx xxxx"; cd[i]="Visa-Barclays (UK)"; i++;
	c[i]="4543 xxxx xxxx xxxx"; cd[i]="Visa-First Direct"; i++;
	c[i]="4544 xxxx xxxx xxxx"; cd[i]="Visa-T.S.B. Bank"; i++;
	c[i]="4556 xxxx xxxx xxxx"; cd[i]="Visa-Citibank"; i++;
	c[i]="4564 xxxx xxxx xxxx"; cd[i]="Visa-Bank of Queensland"; i++;
	c[i]="4673 xxxx xxxx xxxx"; cd[i]="Visa-First Card"; i++;
	c[i]="4678 xxxx xxxx xxxx"; cd[i]="Visa-Home Federal"; i++;
	c[i]="4707 xxxx xxxx xxxx"; cd[i]="Visa-Tompkins County Trust"; i++;
	c[i]="4712 1250 xxxx xxxx"; cd[i]="Visa-IBM Credit Union"; i++;
	c[i]="4719 xxxx xxxx xxxx"; cd[i]="Visa-Rocky Mountain"; i++;
	c[i]="4721 xxxx xxxx xxxx"; cd[i]="Visa-First Security"; i++;
	c[i]="4722 xxxx xxxx xxxx"; cd[i]="Visa-West Bank"; i++;
	c[i]="4726 xxxx xxxx xxxx"; cd[i]="Visa CV-Wells Fargo"; i++;
	c[i]="4783 xxxx xxxx xxxx"; cd[i]="Visa-AT&T's Universal Card"; i++;
	c[i]="4784 xxxx xxxx xxxx"; cd[i]="Visa-AT&T's Universal Card"; i++;
	c[i]="4800 xxxx xxxx xxxx"; cd[i]="Visa-M.B.N.A. North America"; i++;
	c[i]="4811 xxxx xxxx xxxx"; cd[i]="Visa-Bank of Hawaii"; i++;
	c[i]="4819 xxxx xxxx xxxx"; cd[i]="Visa-Macom Federal Credit Union"; i++;
	c[i]="4820 xxxx xxxx xxxx"; cd[i]="Visa-IBM Mid America Federal Credit Union"; i++;
	c[i]="4833 xxxx xxxx xxxx"; cd[i]="Visa-U.S. Bank"; i++;
	c[i]="4842 xxxx xxxx xxxx"; cd[i]="Visa-Security Pacific Washington"; i++;
	c[i]="4897 xxxx xxxx xxxx"; cd[i]="Visa-Village Bank of Chicago"; i++;
	c[i]="4921 xxxx xxxx xxxx"; cd[i]="Visa-Hong Kong National Bank"; i++;
	c[i]="4929 xxxx xxxx xxxx"; cd[i]="Visa CV-Barclay Card (UK)"; i++;
	c[i]="4539 9710 xxxx xxxx"; cd[i]="Visa-Banco di Napoli (Italy)"; i++;
	c[i]="4557 xxxx xxxx xxxx"; cd[i]="Visa-BNL (Italy)"; i++;
	c[i]="4908 xxxx xxxx xxxx"; cd[i]="Visa-Carta Moneta-CARIPLO/Intesa (Italy)"; i++;
	c[i]="4xxx 9x60 4015 xxxx"; cd[i]="Visa-Carta Sì-Unipol Banca (Italy)"; i++;
	c[i]="4xxx 9x14 4046 xxxx"; cd[i]="Visa-Carta Sì-Banco di Sardegna (Italy)"; i++;
	c[i]="4xxx 9xxx 40xx xxxx"; cd[i]="Visa-Carta Sì (Italy)"; i++;
	c[i]="4532 xxxx xxxx xxxx"; cd[i]="Visa-Credito Italiano (Italy)"; i++;
	c[i]="4547 5900 xxxx xxxx"; cd[i]="Visa Gold-bank ganadero BBV (Colombia)"; i++;
	c[i]="4916 xxxx xxxx xxxx"; cd[i]="Visa-MBNA Bank"; i++;
	c[i]="4xxx xxx xxx xxxx"; cd[i]="Visa"; i++;
	c[i]="4xxx xxxx xxxx xxxx"; cd[i]="Visa"; i++;
	c[i]="5031 xxxx xxxx xxxx"; cd[i]="MasterCard-Maryland of North America"; i++;
	c[i]="5100 xxxx xxxx xxxx"; cd[i]="MasterCard-Southwestern States Bankard Association"; i++;
	c[i]="5110 xxxx xxxx xxxx"; cd[i]="MasterCard-Universal Travel Voucher"; i++;
	c[i]="5120 xxxx xxxx xxxx"; cd[i]="MasterCard-Western States Bankard Association"; i++;
	c[i]="5130 xxxx xxxx xxxx"; cd[i]="MasterCard-Eurocard France"; i++;
	c[i]="5140 xxxx xxxx xxxx"; cd[i]="MasterCard-Mountain States Bankard Association"; i++;
	c[i]="5150 xxxx xxxx xxxx"; cd[i]="MasterCard-Credit Systems Inc."; i++;
	c[i]="5160 xxxx xxxx xxxx"; cd[i]="MasterCard-Westpac Banking Corporation"; i++;
	c[i]="5170 xxxx xxxx xxxx"; cd[i]="MasterCard-Midamerica Bankard Association"; i++;
	c[i]="5172 xxxx xxxx xxxx"; cd[i]="MasterCard-First Bank Card Center"; i++;
	c[i]="518x xxxx xxxx xxxx"; cd[i]="MasterCard-Computer Communications of America"; i++;
	c[i]="519x xxxx xxxx xxxx"; cd[i]="MasterCard-Bank of Montreal"; i++;
	c[i]="5201 xxxx xxxx xxxx"; cd[i]="MasterCard-Mellon Bank N.A."; i++;
	c[i]="5202 xxxx xxxx xxxx"; cd[i]="MasterCard-Central Trust Company N.A."; i++;
	c[i]="5204 xxxx xxxx xxxx"; cd[i]="MasterCard-Security Pacific National Bank"; i++;
	c[i]="5205 xxxx xxxx xxxx"; cd[i]="MasterCard-Promocion y Operacion S.A."; i++;
	c[i]="5206 xxxx xxxx xxxx"; cd[i]="MasterCard-Banco Nacional do Mexico"; i++;
	c[i]="5207 xxxx xxxx xxxx"; cd[i]="MasterCard-New England Bankard Association"; i++;
	c[i]="5208 xxxx xxxx xxxx"; cd[i]="MasterCard-Million Card Service Co. Ltd."; i++;
	c[i]="5209 xxxx xxxx xxxx"; cd[i]="MasterCard-The Citizens & Southern National Bank"; i++;
	c[i]="5210 xxxx xxxx xxxx"; cd[i]="MasterCard-Kokunai Shinpan Company Ltd."; i++;
	c[i]="5211 xxxx xxxx xxxx"; cd[i]="MasterCard-Chemical Bank Delaware"; i++;
	c[i]="5212 xxxx xxxx xxxx"; cd[i]="MasterCard-F.C.C. National Bank"; i++;
	c[i]="5213 xxxx xxxx xxxx"; cd[i]="MasterCard-The Bankcard Association Inc."; i++;
	c[i]="5215 xxxx xxxx xxxx"; cd[i]="MasterCard-Marine Midland Bank N.A."; i++;
	c[i]="5216 xxxx xxxx xxxx"; cd[i]="MasterCard-Old Kent Bank & Trust Co."; i++;
	c[i]="5217 xxxx xxxx xxxx"; cd[i]="MasterCard-Union Trust"; i++;
	c[i]="5218 xxxx xxxx xxxx"; cd[i]="MasterCard-Citibank/Citicorp"; i++;
	c[i]="5219 xxxx xxxx xxxx"; cd[i]="MasterCard-Central Finance Co. Ltd."; i++;
	c[i]="5220 xxxx xxxx xxxx"; cd[i]="MasterCard-Sovran Bank/Central South"; i++;
	c[i]="5221 xxxx xxxx xxxx"; cd[i]="MasterCard-Standard Bank of South Africa Ltd."; i++;
	c[i]="5222 xxxx xxxx xxxx"; cd[i]="MasterCard-Security Bank & Trust Company"; i++;
	c[i]="5223 xxxx xxxx xxxx"; cd[i]="MasterCard-Trustmark National Bank"; i++;
	c[i]="5224 xxxx xxxx xxxx"; cd[i]="MasterCard-Midland Bank"; i++;
	c[i]="5225 xxxx xxxx xxxx"; cd[i]="MasterCard-First Pennsylvania Bank N.A."; i++;
	c[i]="5226 xxxx xxxx xxxx"; cd[i]="MasterCard-Eurocard Ab"; i++;
	c[i]="5227 xxxx xxxx xxxx"; cd[i]="MasterCard-Rocky Mountain Bankcard System Inc."; i++;
	c[i]="5228 xxxx xxxx xxxx"; cd[i]="MasterCard-First Union National Bank of North Carolina"; i++;
	c[i]="5229 xxxx xxxx xxxx"; cd[i]="MasterCard-Sunwest Bank of Albuquerque N.A."; i++;
	c[i]="5230 xxxx xxxx xxxx"; cd[i]="MasterCard-Harris Trust & Savings Bank"; i++;
	c[i]="5231 xxxx xxxx xxxx"; cd[i]="MasterCard-Badische Beamtenbank EG"; i++;
	c[i]="5232 xxxx xxxx xxxx"; cd[i]="MasterCard-Eurocard Deutschland"; i++;
	c[i]="5233 xxxx xxxx xxxx"; cd[i]="MasterCard-Computer Systems Association Inc."; i++;
	c[i]="5234 xxxx xxxx xxxx"; cd[i]="MasterCard-Citibank Arizona"; i++;
	c[i]="5235 xxxx xxxx xxxx"; cd[i]="MasterCard-Financial Transaction System Inc."; i++;
	c[i]="5236 xxxx xxxx xxxx"; cd[i]="MasterCard-First Tennessee Bank N.A."; i++;
	c[i]="5254 xxxx xxxx xxxx"; cd[i]="MasterCard-Bank of America"; i++;
	c[i]="5273 xxxx xxxx xxxx"; cd[i]="MasterCard(can be Gold)-Bank of America"; i++;
	c[i]="5286 xxxx xxxx xxxx"; cd[i]="MasterCard-Home Federal"; i++;
	c[i]="5291 xxxx xxxx xxxx"; cd[i]="MasterCard-Signet Bank"; i++;
	c[i]="5329 xxxx xxxx xxxx"; cd[i]="MasterCard-Maryland of North America"; i++;
	c[i]="5338 75xx xxxx xxxx"; cd[i]="MasterCard Prepaid-PayPal / Lottomaticard (Italy)"; i++;
	c[i]="5410 xxxx xxxx xxxx"; cd[i]="MasterCard-Wells Fargo"; i++;
	c[i]="5412 xxxx xxxx xxxx"; cd[i]="MasterCard-Wells Fargo"; i++;
	c[i]="5419 xxxx xxxx xxxx"; cd[i]="MasterCard-Bank of Hoven"; i++;
	c[i]="5424 xxxx xxxx xxxx"; cd[i]="MasterCard-Citibank/Citicorp"; i++;
	c[i]="5430 13xx xxxx xxxx"; cd[i]="MasterCard-BNL/BNP Paribas (Italy)"; i++;
	c[i]="5434 xxxx xxxx xxxx"; cd[i]="MasterCard-National Westminster Bank"; i++;
	c[i]="5465 xxxx xxxx xxxx"; cd[i]="MasterCard-Chase Manhattan"; i++;
	c[i]="5255 0114 xxxx xxxx"; cd[i]="MasterCard-Banco di Sardegna (Italy)"; i++;
	c[i]="5306 93xx xxxx xxxx"; cd[i]="MasterCard-Bancolombia Cadenalco (Colombia)"; i++;
	c[i]="5406 251x xxxx xxxx"; cd[i]="MasterCard-Banco de Occidente (Colombia)"; i++;
	c[i]="5426 xxxx xxxx xxxx"; cd[i]="MasterCard-Granahorrar (Colombia)"; i++;
	c[i]="5406 xxxx xxxx xxxx"; cd[i]="MasterCard-Granahorrar (Colombia)"; i++;
	c[i]="5811 49xx xxxx xxxx"; cd[i]="Maestro-BNL/BNP Paribas (Italy)"; i++;
	c[i]="5xxx xxxx xxxx xxxx"; cd[i]="MasterCard/Access/Eurocard"; i++;
	c[i]="6013 xxxx xxxx xxxx"; cd[i]="Discover-MBNA Bank"; i++;
	c[i]="60xx xxxx xxxx xxxx"; cd[i]="Discover"; i++;
	mxcards=i-1;
}

// Powered by NamsoSoluciones

function leftS(aS,n){
	aS+="";
	var rS="";
	if(n>=1){
		rS=aS.substring(0,n);
	}
	return rS;
}

function rightS(aS,n){
	aS+="";
	var rS="";
	if(n>=1){
		rS=aS.substring(aS.length-n,aS.length);
	}
	return rS;
}

function midS(aS,n,n2){
	aS+="";
	var rS="";
	if(n2==null || n2==""){
		n2=aS.length;
	}
	n*=1; n2*=1;
	if(n<0){
		n++;
	}
	rS=aS.substring(n-1,n-1+n2);
	return rS;
}

function linstr(aS,bS){
	aS+=""; bS+="";
	var r=false;
	if(leftS(aS,bS.length)==bS){
		r=true;
	}
	return r;
}

function sbtString(s1,s2){
	var ous=""; s1+=""; s2+="";
	for(var i=1;i<=s1.length;i++){
		var c1=s1.substring(i-1,i);
		var c2=s2.indexOf(c1);
		if(c2==-1){
			ous+=c1;
		}
	}
	return ous;
}

function sbtStringSpRnd(s1,s2,bS){
	if(bS==null || bS==""){bS="0123456789";}
	var ous="";
	bS+="";
	for(var i=1;i<=s1.length;i++){
		var c1=s1.substring(i-1,i);
		var c2=s2.indexOf(c1);
		if(c2==-1){
			ous+=c1;
		}else{
			ous+=midS(bS,Math.floor(Math.random()*(bS.length-1))+1,1);
		}
	}
	return ous;
}

function cmpPattern(a,p,x){
	if(x=="" || x==null){
		x="x";
	}
	if(x=="X"){
		x="x";
	}
	x=""+x.substring(0,1); a+=""; p+="";
	r=false; mc=0;
	if(a.length==p.length){
		for(var i=1;i<=a.length;i++){
			a1=midS(a,i,1); p1=midS(p,i,1);
			if(a1==p1 || p1==x){
				mc++;
			}
		}
	}
	if(mc==a.length){
		r=true;
	}
	return r;
}

function isdiv(a,b){
	if(b==null){
		b=2;
	}
	a*=1.0; b*=1.0;
	var r=false;
	if(a/b==Math.floor(a/b)){
		r=true;
	}
	return r;
}

function sumDigits(n,m){
	if(m==0 || m==null){
		m=1;
	}
	n+="";
	if(m>0){
		while (n.length>m){
			var r=0;
			for(var i=1;i<=n.length;i++){
				r+=1.0*midS(n,i,1);
			}
			n=""+r;
		}
	}else{
		for(var j=1;j<=Math.abs(m);j++){
			var r=0;
			for(var i=1;i<=n.length;i++){
				r+=1.0*midS(n,i,1);
			}
			n=""+r;
		}
	}
	r=n;
	return r;
}

function makeArray(n){
	this.length=n;
	for(var i=1;i<=n;i++){
		this[i]=0;
	}
	return this;
}
init();