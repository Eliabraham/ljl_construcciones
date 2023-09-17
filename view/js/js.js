class Information{
    get_data(campos,gatillo){
		let valores={};  let faltantes=[]
		$.each(campos, function (i, elem){ 
			let collection=$(`.${elem}`);
			$.each(collection, function (ii, componente){
                let req = "no";
				if($(componente).hasClass('required')){req = "si";}
				if ($(componente).prop(`name`).substring(0,3)=="val"){
					valores[$(componente).prop(`name`).substring(3)]=$(componente).val();
				}
				else{
					if ($(componente).prop(`name`).substring(0,3)=="chk"){
						if($(componente).prop('checked')){
							if (valores[$(con).prop("name").substring(3)]!=undefined){valores[$(con).prop("name").substring(3)]+=`:::${$(con).val()}`}
							else{valores[$(con).prop("name").substring(3)]=$(con).val();}
						}
					}
				}
				if(req=="si" && (valores[$(componente).prop(`name`).substring(3)]==undefined) || (valores[$(componente).prop(`name`).substring(3)]==""))
                {faltantes.push($(componente).prop(`id`));}
			});
		});
		return {action:gatillo.id, controller:gatillo.name, written:valores, err:faltantes};
	}
	get_data_table(tabla){
		let infotabla=[];
		let encabezadotabla=$(`#${tabla}>thead`).find(`tr`);
		let filas=$(encabezadotabla[0]).find(`th`);
		let campos=[];
		for(let i=0;i<filas.length-1;i++){
			campos.push($(filas[i]).text().trim());
		}
		let cuerpotabla=$(`#${tabla}>tbody`).find(`tr`);
		for(let i=0;i<cuerpotabla.length;i++){
			let detalles=$(cuerpotabla[i]).find(`td`);
			let inf={};
			for(let ii=0;ii<detalles.length-1;ii++){
				inf[campos[ii]]=$(detalles[ii]).text();
			}
			infotabla.push(inf);
		}
		return infotabla;
	}
	request_missing_data(faltantes){
		$(`.message`).remove();
		if(faltantes!=""){
			$.notify(`Debe ingresar los siguientes campos:\n ${faltantes.join('\n')}`, `warn`);
			throw `ejecución detenida por datos vacios`;
		}
	}
	show_message(mensage){
		$(`.message`).remove();
		$(`body`).append(`
			<div class='message'>
				<button type="button" class="close" onclick="info.parent_remove(this)"></button>
				<div class='message-head'>Respuesta de Pagina</div>
				<div class='message-body'>					
					${mensage}
				</div>
			</div>`
		);
	}
    parent_remove(elemento){
		$(elemento).parent().remove();
	}
    sent_data(datos){
		$.ajax({
			type: "POST",
			Cache:false,
			url: `../../controller/${datos.controller}_controller.php`,
			data: {'action':datos.action, 'valores': JSON.stringify(datos.written)},
		})
		.done(function(resp){
			respuesta = resp;
			edo = 200;
		})
		.fail(function(jqXHR, textStatus){
			edo=textStatus;
			formato.error_ajax(jqXHR, textStatus)
		});
		return respuesta;
	}
	clear_data(campos){
		$.each(campos, function (i, elem){ 
			let collection=$(`.${elem}`);
			$.each(collection, function (ii, componente){
				if ($(componente).prop(`name`).substring(0,3)=="val"){$(componente).val("");}
				if ($(componente).prop(`name`).substring(0,3)=="chk"){$(componente).prop('checked',"");}
			});
		});
	}
	/*show_data(campos,data){
		let lista=document.getElementsByClassName(campos);
		for(let i=0; i < lista.length; i++){
			if ($(lista[i]).prop(`name`).substring(0,3)=="val"){
				$(lista[i]).val(data[0][$(lista[i]).prop(`name`).substring(3)]);
			}
		}
	}
	show_message(message){
		$(`body`).append(`
			<div class='message'>
				<button type="button" class="close"></button>
				<div class='message-head'>Solicitud de informacióm</div>
				<div class='message-body'>					
					 <br> ${message}
				</div>
			</div>`);
		setTimeout(function(){
			$(`.message`).remove();
		},4000);
	}
	*/
}
class Formats{
    required_marker(){
		let a=$(`.required-mark`);
		for(let i=0;i<a.length;i++){
			a[i].childNodes[0].nodeValue=`${a[i].childNodes[0].nodeValue}*`;
		}
    }
    error_ajax(jqXHR, textStatus){
		if (jqXHR.status === 0) {alert(`Conexión fallida: error en la red (0)`);}
		else if (jqXHR.status == 404) {alert(`controlador o modelo no encontrado (404)`);}
		else if (jqXHR.status == 500) {alert('Error 500 de servidor ajax');}
		else if (textStatus === 'parsererror') {alert(`falla en el parset jsom`);}
		else if (textStatus === 'timeout') {alert(`tiempo maximo excedido`);}
		else if (textStatus === 'abort') {alert('ajax abotado');}
		else{alert('error desconocido:\n' + jqXHR.responseText);}
	}
	only_letter(e){
		let key = e.keyCode || e.which;
      	let tecla = e.key.toLowerCase();
      	let letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      	let especiales = [8, 37, 39, 46];
      	let tecla_especial = false;
	    for (var i in especiales) {
      		if (key == especiales[i]) {
        		tecla_especial = true;
        		break;
      		}
    	}
	    if (letras.indexOf(tecla) == -1 && !tecla_especial){return false;}
	}
	mayini(e){//mayuscula inicial de cada palabra en un texto
		let a=e.split("");
		let t="";
		for(let i=0;i<a.length;i++){
			if((i==0)||(a[i-1]==" ")){t+=(a[i]).toUpperCase();}
			else{t+=(a[i]).toLowerCase();}
		}
		return t;
	}
}
class Table{
	add_row(tabla, datos){
		let estructura=`<tr>`;
		$.each(datos, function (i, elem){
			estructura =`${estructura}<td>${elem}</td>`;
		});
		estructura =`${estructura}<td><button class='btn btn-danger btn-sm' onclick='tabla.remove_row(this)'>-</td>`;
		estructura =`${estructura}</tr>`;
		$(`#${tabla}>tbody`).append(estructura);
	}
	remove_row(elemento){
		if(confirm("¿CONFIRMA ELIMINAR ESTE ITEM?")){
			$($(elemento).parent().parent()).remove();
		}
	}
}
function previewImage(event, querySelector){
	const input = event.target;
	file = input.files[0];
	objectURL = URL.createObjectURL(file);
	ni=$(`#${querySelector}`).find('img').length;
	while($(`#foto${ni}`).length > 0){
		ni++;
	}
	ima=`<div class="container_img col-xxl-4 col-xl-4 col-lg-5 col-lg-5 col-sm-10">
		<input type="hidden" name='valfoto${ni}' id='foto${ni}' value='${objectURL}' class='rut_ima' />
		<button class="cerrar-imagen" onclick="delphoto(this)"></button>
		<img id="imgPreview${ni}" src="${objectURL}" class="col-12"></img>
		</div>`;
	$(`#${querySelector}`).append(ima);
}
function imagenstandart(event, querySelector){
	const input = event.target;
	file = input.files[0];
	objectURL = URL.createObjectURL(file);
	ni=$(`#${querySelector}`).find('img').length;
	while($(`#foto${ni}`).length > 0){
		ni++;
	}
	ima=`<div class="container_img col-4">
		<input type="hidden" name='valfoto${ni}' id='foto${ni}' value='${objectURL}' class='rut_ima' />
		<button class="cerrar-imagen" onclick="delphoto(this)"></button>
		<img id="imgPreview${ni}" src="${objectURL}" class="col-12"></img>
		</div>`;
	$(`#${querySelector}`).append(ima);
}
function delphoto(a){
    if(confirm("¿desea eliminar esta imagen?")){
        $($(a).parent()).remove();
    }
}

/*	
	only_number(n){
		key = n.keyCode || n.which;
		if(((key<48) || (key>57))&&(key!=44)){return false;}
	}
	for_ema(a){//validar el formato para un campo tipo email
		if(a.value.length>0){
			c=0; b=a.value.split("");
			for(i=0;i<b.length;i++){if(b[i]=="@"){c++;}}
			if((b[b.length-3]==".")||(b[b.length-4]==".")){
				c++;
			}
			if(c!=2){
				l99k(L)L>:)mensaje("debe ingresar un correo électronico valido","observacion");				a.focus();
			}
		}
	}
	minusculas(a){
		a=a.toLowerCase();
		return a;
	}
}*/
info = new Information;
formato = new Formats;
tabla = new Table;