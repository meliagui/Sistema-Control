function advertencia (e){
	e.preventDefault();
	var url=e.currentTarget.getAttribute('href');

	Swal.fire({
		title: '¡ATENCIÓN!',
		text: '¿Estas seguro de eliminar el  registro ?',
		icon: 'warning',	/*icono que va mostrar success-error-info-warning-question*/
		showCancelButton: true,
		confirmButtonColor: '#2898ee',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si',
		cancelButtonText: 'No',
		reverseButtons: true,
		//width:'300px',
		padding: '20px',
		//background: 'rgb(70,200,255)',
		backdrop: true,	/* color oscuro de la pagina true-false */

		position: 'top',	/* posicion de ubicacion top--bottom--center top-end bottom-end top-start */
		/* bottom-start center-start center-end */

		allowOutsideClick: true,	/* para NO salir con un click */
		allowEscapeKey: true,	/* para SI salir con un escape */
		allowEnterKey: false,	/* para SI salir con un enter */

	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
		  //this.submit();
		  window.location.href=url;
		}
})
}

