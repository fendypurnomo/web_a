$(document).ready(function(){
	$("#login").validate({
		rules: {
			nama: "required",
			sandi: "required",
		},
		messages: {
			nama: "Nama pengguna atau email harus di isi!",
			sandi: "Kata sandi harus di isi!",
		},
		errorPlacement: function(error,element){
			error.addClass("invalid-feedback");
			if(element.prop("type") === "checkbox"){
				error.insertAfter(element.parent("label"));
			} else {
				error.insertAfter(element);
			}
		},
		submitHandler: function(form){
			var action = $("#login").attr("action");
			$.ajax({
				url: action,
				data: $(form).serialize(),
				type: "post",
				dataType: "html",
				cache: false,
				success: function(message){
					if(message == 'berhasil'){
						$("#masuk").html("<span class='spinner-border spinner-border-sm'></span>Sedang diproses..");
						window.location.href = 'beranda';
					} else if (message == 'sandi_salah'){
						$("#sandi").focus();
						$("#error-password").show();
						$("#error-password").html("<small class='form-text text-danger'>Sandi yang Anda masukkan salah!</div>");
					} else if (message == 'diblokir'){
						$("#nama").focus();
						$(".form-control").val("");
						$("#error").html("<div class='alert alert-dismissible fade show row text-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><small>Maaf, Akun Anda sedang diblokir. Silahkan hubungi Administrator!</small></div>");
					} else if (message == 'belum_aktivasi'){
						$("#nama").focus();
						$(".form-control").val("");
						$("#error").html("<div class='alert alert-dismissible fade show row text-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><small>Maaf, Anda belum melakukan proses aktivasi. Silahkan hubungi Administrator!</small></div>");
					} else {
						$("#nama").focus();
						$(".form-control").val("");
						$("#error-username").show();
						$("#error-username").html("<small class='form-text text-danger'>Nama atau email yang Anda masukkan tidak terdaftar!</div>");
					}
				}
			}); return false;
		}
	});
});

$("#nama").on("blur",function(){
	$("#error-username").hide();
});

$("#sandi").on("blur",function(){
	$("#error-password").hide();
});
