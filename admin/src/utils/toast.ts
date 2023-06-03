import { createToastInterface } from 'vue-toastification'
// @ts-ignore
export default createToastInterface({
    transition: 'Vue-Toastification__fade',
    maxToasts: 5,
    newestOnTop: true,
    position: 'top-right',
    timeout: 3000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    closeButton: 'button',
    icon: true,
    rtl: false,
})

