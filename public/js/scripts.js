$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

<<<<<<< HEAD

/**Excluir Planos**/

=======
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
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
<<<<<<< HEAD
                $('.modal-backdrop').remove();

                /* Swal.fire({
                    title: 'Registro Excluído com Sucesso!',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'Ok!'
                  }) */
=======
                $('.modal-backdrop').remove();               
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17

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

<<<<<<< HEAD

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
=======
function setHiddenCategoriaExcluir(id){   
            
    $('#idCategoriaExcluir').val(id);     
   
}

function excluirCategoria(){
     
    var idCategoriaExcluir = $('#idCategoriaExcluir').val(); 

    if(idCategoriaExcluir != ""){        

        $.ajax({
            type: 'post',
            url: 'deletarCategoria/'+idCategoriaExcluir,
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
            data: {
                '_token' : $('input[name=_token]').val()
            },
            success: function(s){
                
<<<<<<< HEAD
                $("#ModalDeleteProfile").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                /* Swal.fire({
                    title: 'Registro Excluído com Sucesso!',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'Ok!'
                  }) */
=======
                $("#ModalDeleteCategoria").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();               
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17

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
<<<<<<< HEAD
            title: 'Falhou ao tentar Excluir o Perfil!',
=======
            title: 'Falhou ao tentar Excluir a Categoria!',
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
            text: 'Tente novamente em instantes.',
            icon: 'error',
            confirmButtonText: 'Ok!'
          })

    }
         
   
}