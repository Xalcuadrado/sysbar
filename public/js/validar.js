function validar() 
{
	var n_documento, name, apellido, telefono, email, password, password_confirmation, expresionemail, expresiontelefono;
	n_documento = document.getElementById("n_documento").value;	
	name = document.getElementById("name").value;	
	apellido = document.getElementById("apellido").value;	
	email = document.getElementById("email").value;	
	telefono = document.getElementById("telefono").value;	
	password = document.getElementById("password").value;	
	password_confirmation = document.getElementById("password_confirmation").value;	
	expresionemail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	expresiontelefono = /\++\d+\ +\d+\ +\d/;


	if(name === "" || n_documento === "" || apellido === "" || email === "" || telefono === "" || password === "" || password_confirmation === "" )
	{
		alert("Todos los campos son obligatorios");
		return false;
	}
	else if(name.length>15)
	{
		alert("El nombre es muy largo");
		return false;
	}
	else if(n_documento.length>12)
	{
		alert("Número del documento es muy largo");
		return false;
	}
	else if(apellido.length>15)
	{
		alert("el apellido es muy largo");
		return false;
	}
	else if(telefono.length>14)
	{
		alert("telefono es muy largo");
		return false;
	}
	else if(email.length>100)
	{
		alert("El correo electrónico es muy largo");
		return false;
	}
	else if(password.length>17)
	{
		alert("La contraseña debe tener como máximo 16 caracteres");
		return false;
	}
	else if(password.length<7)
	{
		alert("La contraseña debe tener como mínimo 8 caracteres");
		return false;
	}
	else if(isNaN(n_documento))
	{
		alert("El número del documento deben ser sólo dígitos");
		return false;
	}
	else if(!expresionemail.test(email))
	{
		alert("El correo ingresado no es válido");
		return false;
	}
	else if(!expresiontelefono.test(telefono))
	{
		alert("Escriba según el ejemplo: +56 9 45455454");
		return false;
	}

	if($("#identificacion option:selected").val() == 0) {
    alert("Debe Seleccionar el tipo del documento");
    return false;
}

}