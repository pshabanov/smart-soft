<script lang="ts" setup>

import {ref, watch} from "vue";

const BASE_URL = import.meta.env.VITE_BASE_URL;

const closePopup = () => {
    document.querySelector('.popup__form')?.classList.remove('__active')
}

const phone = ref<string>('');
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
const isSended = ref<boolean>(false);
const isDisabled = ref<boolean>(true);

watch(phone, () => {
    isDisabled.value = phone.value.length < 6 || phone.value.length > 18
})

const sendPhone = (e) => {
    e.preventDefault()
    if (isDisabled){
        let myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

        let urlencoded = new URLSearchParams();
        urlencoded.append("phone", phone.value);
        urlencoded.append("_token", csrf);

        let requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
            redirect: 'follow'
        };

        fetch(`/send_phone`, requestOptions)
            .then(response => response.text())
            .then(result => {
                if (result) {
                    isSended.value = true
                }
            })
            .catch(error => console.log('error', error));
    }
}
</script>

<template>
    <div class="popup__wrapper">
        <div v-if="!isSended">
            <div class="text-center text-xl font-semibold">Оставьте свой телефон</div>
            <input
                class="bg-gray-200 py-4 px-6 rounded-md w-full mt-6 outline-1 outline-gray-300"
                type="text"
                placeholder="+996(700) 00-00-00"
                v-model="phone"
            >
        </div>
        <div v-if="isSended" class="message">Ваше сообщение успешно отправлено</div>
        <div v-if="!isSended" class="btn" @click="sendPhone" :disabled="isDisabled">Отправить</div>
        <div v-if="isSended" class="btn" @click="closePopup" >ОК</div>
        <div class="close" @click="closePopup">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
    </div>
</template>
