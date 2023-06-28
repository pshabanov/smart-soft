import { useUserStore } from '@/stores/user.store'
import router from '@/router'
import { PAGES } from '@/model'
import type { UserInfoType } from '@/entities/user/user.model'
import {UserService} from "@/services/user.service";


export function token() {
    let token = useUserStore().token

    if (!token) useUserStore().logout()
    else return token
}

export class authenticate {

    async getUserInfoFromLS() {
        if (localStorage.getItem('token')) {
            useUserStore().token = localStorage.getItem('token') || ''
            const result:any  = await UserService().checkToken()
            if (result?.id){
                useUserStore().isAuth = true
            }
        }
    }

    async logout() {
        useUserStore().logout()
        localStorage.removeItem('USER_DATA')
        await router.push(PAGES.LOGIN)
    }
}

