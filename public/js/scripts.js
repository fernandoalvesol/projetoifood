$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

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

function setHiddenCategoriaExcluir(id){   
            
    $('#idCategoriaExcluir').val(id);     
   
}

function excluirCategoria(){
     
    var idCategoriaExcluir = $('#idCategoriaExcluir').val(); 

    if(idCategoriaExcluir != ""){        

        $.ajax({
            type: 'post',
            url: 'deletarCategoria/'+idCategoriaExcluir,
            data: {
                '_token' : $('input[name=_token]').val()
            },
            success: function(s){
                
                $("#ModalDeleteCategoria").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();               

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
            title: 'Falhou ao tentar Excluir a Categoria!',
            text: 'Tente novamente em instantes.',
            icon: 'error',
            confirmButtonText: 'Ok!'
          })

    }
         
   
}