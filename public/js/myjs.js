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
			document.getElementById('modify').action='http://127.0.0.1:8000/profesores/'+success.teacher.id
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

			if (success.teacher.emails.length == 2 ) {
				for( let i = 0; i < success.teacher.emails.length; i++ ) {
					$('#email'+i).val(success.teacher.emails[i].email)
				}
			}
			else {
				$('#emailuno').val(success.teacher.emails[0].email)
			}

			$('#countrie_option').val(success.teacher.countrie_id)
			$('#headquarter_option').val(success.teacher.headquarter_id)
			$('#classification_option').val(success.teacher.classification_id)
			$('#status_option').val(success.teacher.status)
			$('#observaciones').text(success.teacher.observation)
		})

		.fail((error) => {
			console.log(error)
		})
	}),

	$('.delete').click(function () {
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
			var form = document.getElementById('delete')
			form.setAttribute('action','http://127.0.0.1:8000/profesores/'+success.teacher.id)
			form.setAttribute('name','destroy'+success.teacher.id)
		})

		.fail((error) => {
			console.log(error)
		})
	})

})