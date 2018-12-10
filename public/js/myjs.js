$(() => {

	$('.edit').click(function() {

		var row = $(this).parent().parent()
		var td  = row.children()

		var cedula = td[1].innerHTML

		$.ajax({
			method : 'get',
			url : 'http://127.0.0.1:8000/profesores/'+cedula+'/edit',
			// dataType: 'text',
			data : $.param({ cedula: cedula })
		})

		.done((success) => {
			console.log(success.teacher)

			$('#cedula').val(success.teacher.identity)
			$('#nombre').val(success.teacher.first_name)
			$('#apellido').val(success.teacher.last_name)

			if (success.teacher.phones.length == 2 ) {
				for( let i = 0; i < success.teacher.phones.length; i++ ) {
					$('#phones'+i).val(success.teacher.phones[i].number)
				}
			}
			else {
				$('#numerouno').val(success.teacher.phones[0].number)
			}

			$('#birthdate').val(success.teacher.birthdate)
			$('#direccion').val(success.teacher.address)

			if (success.emails.length == 2 ) {
				for( let i = 0; i < success.teacher.emails.length; i++ ) {
					$('#email'+i).val(success.teacher.emails[i].email)
				}
			}
			else {
				$('#email').val(success.teacher.email[0].email)
			}
		})

		.fail((error) => {
			console.log(error)
		})
	})

})