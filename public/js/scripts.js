$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


/**Excluir Planos**/

function setHiddenPlanExcluir(id){
            
    $('#idPlanExcluir').val(id);     
   
}

function excluirPlan(){
     
    var idPlanExcluir = $('#idPlanExcluir').val(); 

    if(idPlanExcluir != ""){        

        $.ajax({
            type: 'post',
            url: 'deletarPlan/'+idPlanExcluir,
            data: {
                '_token' : $('input[name=_token]').val()
            },
            success: function(s){
                
                $("#ModalDeletePlan").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                /* Swal.fire({
                    title: 'Registro Excluído com Sucesso!',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'Ok!'
                  }) */

                  let timerInterval;

                    Swal.fire({
                    title: 'Registro Excluído com Sucesso!',
                    html: 'Fechando em <b></b> milissegundos.',
                    timer: 3000,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        const content = Swal.getContent()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                            b.textContent = Swal.getTimerLeft()
                            }
                        }
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            //console.log('I was closed by the timer')
                            location.reload();
                        }
                    })
                }

        })

    } else {

        Swal.fire({
            title: 'Falhou ao tentar Excluir o Plano!',
            text: 'Tente novamente em instantes.',
            icon: 'error',
            confirmButtonText: 'Ok!'
          })

    }
         
   
}


/**Excluir Perfis**/

function setHiddenProfileExcluir(id){
            
    $('#idProfileExcluir').val(id);     
   
}


function excluirProfile(){
     
    var idProfileExcluir = $('#idProfileExcluir').val(); 

    if(idProfileExcluir != ""){        

        $.ajax({
            type: 'post',
            url: 'deletarProfile/'+idProfileExcluir,
            data: {
                '_token' : $('input[name=_token]').val()
            },
            success: function(s){
                
                $("#ModalDeleteProfile").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                /* Swal.fire({
                    title: 'Registro Excluído com Sucesso!',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'Ok!'
                  }) */

                  let timerInterval;

                    Swal.fire({
                    title: 'Registro Excluído com Sucesso!',
                    html: 'Fechando em <b></b> milissegundos.',
                    timer: 3000,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        const content = Swal.getContent()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                            b.textContent = Swal.getTimerLeft()
                            }
                        }
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            //console.log('I was closed by the timer')
                            location.reload();
                        }
                    })
                }

        })

    } else {

        Swal.fire({
            title: 'Falhou ao tentar Excluir o Perfil!',
            text: 'Tente novamente em instantes.',
            icon: 'error',
            confirmButtonText: 'Ok!'
          })

    }
         
   
}