$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

/*Estilo Planos*/

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

/*Estilo Categorias*/

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

/*Estilo Perfil*/

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

function setHiddenUsuarioExcluir(id){   
            
    $('#idUsuarioExcluir').val(id);     
   
}

function excluirUsuario(){
     
    var idUsuarioExcluir = $('#idUsuarioExcluir').val(); 

    if(idUsuarioExcluir != ""){        

        $.ajax({
            type: 'post',
            url: 'deletarUsuario/'+idUsuarioExcluir,
            data: {
                '_token' : $('input[name=_token]').val()
            },
            success: function(s){
                
                $("#ModalDeleteUsuario").modal('hide');
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
            title: 'Falhou ao tentar Excluir o Usuário!',
            text: 'Tente novamente em instantes.',
            icon: 'error',
            confirmButtonText: 'Ok!'
          })

    }
         
   
}

function setHiddenPermissaoExcluir(id){   
            
    $('#idPermissaoExcluir').val(id);     
   
}

function excluirPermissao(){    
     
    var idPermissaoExcluir = $('#idPermissaoExcluir').val();     

    if(idPermissaoExcluir != ""){        

        $.ajax({
            type: 'post',
            url: 'deletarPermissao/'+idPermissaoExcluir,
            data: {
                '_token' : $('input[name=_token]').val()
            },
            success: function(s){  
                
                //console.log(s);
                
                $("#ModalDeletePermissao").modal('hide');
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
                        
                        if (result.dismiss === Swal.DismissReason.timer) {                            
                            location.reload();
                        }
                    })
                }

        })

    } else {

        Swal.fire({
            title: 'Falhou ao tentar Excluir a Permissão!',
            text: 'Tente novamente em instantes.',
            icon: 'error',
            confirmButtonText: 'Ok!'
          })

    }
         
   
}
