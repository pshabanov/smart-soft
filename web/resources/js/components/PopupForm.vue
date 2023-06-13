<script lang="ts" setup>
const closePopup = ()=>{
    document.querySelector('.popup__form')?.classList.remove('__active')
}
</script>

<template>
   <div class="popup__wrapper">
       <div>
           <div class="text-center text-xl font-semibold">Оставьте свой телефон</div>
           <input
               class="bg-gray-200 py-4 px-6 rounded-md w-full mt-6 outline-1 outline-gray-300"
               type="text"
               placeholder="+996(700) 00-00-00"
           >
       </div>
       <button class="btn">Отправить</button>
       <div class="close" @click="closePopup">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
           </svg>

       </div>
   </div>
</template>
