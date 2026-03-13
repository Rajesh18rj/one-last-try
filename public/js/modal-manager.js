(function(){

    const ModalManager = {

        activeModal:null,

        open(id){

            const modal = document.getElementById(id);

            if(!modal) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.body.style.overflow='hidden';

            this.activeModal = modal;

        },

        close(id){

            const modal = document.getElementById(id);

            if(!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');

            document.body.style.overflow='auto';

            this.activeModal = null;

        },

        closeActive(){

            if(this.activeModal){

                this.close(this.activeModal.id);

            }

        }

    };

    window.ModalManager = ModalManager;

    /* OPEN BUTTON */

    document.addEventListener('click', function(e){

        const openBtn = e.target.closest('[data-modal-open]');

        if(openBtn){

            const id = openBtn.dataset.modalOpen;

            ModalManager.open(id);

        }

    });

    /* CLOSE BUTTON */

    document.addEventListener('click', function(e){

        const closeBtn = e.target.closest('[data-modal-close]');

        if(closeBtn){

            const id = closeBtn.dataset.modalClose;

            ModalManager.close(id);

        }

    });

    /* OUTSIDE CLICK */

    document.addEventListener('click', function(e){

        const modal = e.target.closest('.modal');

        if(!modal) return;

        if(e.target === modal){

            ModalManager.close(modal.id);

        }

    });

    /* ESC CLOSE */

    document.addEventListener('keydown', function(e){

        if(e.key === "Escape"){

            ModalManager.closeActive();

        }



    });

    document.querySelector('.save-btn').disabled=true;

})();
