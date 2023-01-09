$(function(){
	$('.ajax').ajaxForm({
		dataType:'json',
		beforeSend:function(){
			$('.ajax').animate({'opacity':'0.6'});
			$('#loading').show();
    		$('#button').hide();
		},
		success: function(data){
			$('.ajax').animate({'opacity':'1'});
			$('#loading').hide();
    		$('#button').show();
    		$('.alert').remove();
    		if(data.success){
    			$('.content').prepend('<div class="col-md-12 text-center"><div class="box-alert success">'+data.message+'</div></div>');
    			if($('.ajax').attr('update') == undefined)
					$('.ajax')[0].reset();
    		}else {
    			$('.content').prepend('<div class="col-md-12 text-center"><div class="box-alert error">'+data.message+'</div></div>');
    		}
			console.log(data);
		}
	})

	$('.btn.delete').click(function(e){
		e.preventDefault();
		var txt;
		var r = confirm("Tem certeza que deseja excluir o material? A ação não pode ser desfeita.");
		if (r == true) {
			var item_id = $(this).attr('item_id');
			var el = $(this).parent().parent();
			$.ajax({
				url:include_path+'/forms/forms.php',
				data:{id:item_id,type_action:'delete-material'},
				method:'post'
			}).done(function(){
				el.fadeOut();	
			})
		} else {
			return false;
		}
	})

})