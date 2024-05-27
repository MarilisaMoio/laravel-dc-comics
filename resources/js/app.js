import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const allButtons = document.querySelectorAll('.js-delete');

allButtons.forEach((btn) => {
    btn.addEventListener('click', function(event){
        event.preventDefault();

        const definitiveDeleteBtn = document.getElementById('deleteModal')
        const definitiveDeleteModal = document.getElementById('defDelModal')
        const defDelModal = new bootstrap.Modal(definitiveDeleteModal);

        const comicName = this.dataset.comicName;
        document.querySelector('#defDelModal p').innerHTML = `Stai per eliminare ${comicName}`
        defDelModal.show()

        definitiveDeleteBtn.addEventListener('click', function(){
            btn.parentElement.submit()
        })

    })
})
