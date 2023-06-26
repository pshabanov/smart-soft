import {reactive, ref, watch} from 'vue'
import { defineStore } from 'pinia'
import type { UserInfoType } from '@/entities/user/user.model'

export const useUserStore = defineStore('users', () => {
    const isAuth = ref(false)

    const userinfo = ref<UserInfoType>({
        user: {
            id: null,
            username: '',
            firstname: '',
            surname: '',
            lastname: '',
            email: null,
            email_verified_at: null,
            phone: null,
            phone_verified_at: null,
        },
        token: '',
        role: {
            id: 1,
            name: '',
            slug: '',
            permissions: [],
        },
    })

    const token = ref<string>('')

    function setUserInfoAndToken(data: UserInfoType, access_token: string) {
        userinfo.value = data
        token.value = access_token
    }

    function logout() {
        userinfo.value.user.id = null

        isAuth.value = false

        token.value = ''
    }

    watch(token, ()=>{
        localStorage.setItem('token', token.value);
    })

    return {
        isAuth, userinfo, token, setUserInfoAndToken, logout
    }
})

