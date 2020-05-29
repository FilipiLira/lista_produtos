function validarFormulario(){
		$('.valor').each((i, input)=>{
			const inputJ = $(input)
			const valor  = inputJ.attr('placeholder')

			if(inputJ.attr('value') === ''){
               inputJ.attr('value', valor)
               $('#alert-a').css('display', 'block')
			} //else {
               //$('#alert-b').css('display', 'block')
			//}
		})

		setInterval(()=>{
            $('form').off('submit').trigger('submit')
		}, 2000)
		
	}
$('form').submit((e)=>{
	validarFormulario()
	e.preventDefault()
})