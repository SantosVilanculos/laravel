import Swal from 'sweetalert2';
import './bootstrap.js';

document.addEventListener('livewire:init', () => {
    Livewire.on('Swal', ({ titleText = undefined, text = undefined, icon = undefined }) => {
        // titleText?: string | undefined
        // text?: string | undefined
        // icon?: string<'success' | 'error' | 'warning' | 'info' | 'question'> | undefined

        Swal.fire({
            titleText,
            text,
            icon,
            toast: true,
            position: 'top-end',
            timer: 3_000,
            timerProgressBar: true,
            showConfirmButton: false,
            didOpen: popup => {
                popup.onmouseenter = Swal.stopTimer;
                popup.onmouseleave = Swal.resumeTimer;
            }
        });
    });
});
